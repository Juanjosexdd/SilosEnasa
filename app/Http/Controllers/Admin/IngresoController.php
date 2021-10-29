<?php

namespace App\Http\Controllers\Admin;

use App\Events\IngresoEvent;
use App\Models\Almacen;
use App\Models\Ingreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Models\Detalleingreso;
use App\Models\Proveedor;
use App\Models\Tipodocumento;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

use App\Http\Controllers\Controller;
use App\Http\Requests\IngresoFormRequest;
use App\Models\AlmacenProducto;
use App\Models\Cargo;
use App\Models\Producto;
use App\Models\Tipomovimiento;
use App\Models\Log\LogSistema;
use App\Models\Requisicion;
use App\Notifications\IngresoNotification;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class IngresoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.ingresos.index')->only('index');
        $this->middleware('can:admin.ingresos.create')->only('create', 'store');
        $this->middleware('can:admin.ingresos.estatuingresos')->only('estatuingresos');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los ingresos a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.ingresos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un ingreso nuevo a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $ingresos        = Ingreso::all();
        $requisicions        = Requisicion::all()->where('estatus','=', 1);
        $users           = DB::table('users')->where('estatus', 1)->pluck('name', 'id');
        $almacens        = DB::table('almacens')->where('estatus', 1)->pluck('nombre', 'id');
        // $productos       = Producto::where('estatus', 1)->get()->pluck('display_producto', 'id');
        $proveedors      = Proveedor::where('estatus', 1)->get()->pluck('display_proveedor', 'id');
        $tipodocumentos  = Tipodocumento::where('estatus', 1)->get()->pluck('abreviado', 'id');
        // $requisicions    = Requisicion::where('estatus', 1)->get()->pluck('correlativo', 'id');
        $tipomovimientos = Tipomovimiento::pluck('descripcion', 'id');

        $productos = Producto::join('clacificacions', 'productos.clacificacion_id', 'clacificacions.id')
            ->select('productos.id', 'productos.nombre', 'productos.marca', 'productos.observacionp', 'productos.ubicacion', 'clacificacions.abreviado as abreviado')
            ->where('productos.estatus', '=', '1')
            ->groupBy('productos.id', 'productos.marca', 'productos.observacionp', 'productos.ubicacion', 'abreviado')
            ->get();

        // $requisicions = Requisicion::join('departamentos', 'requisicions.departamento_id', 'departamentos.id')
        // ->join('empleado')
        //     ->select('requisicions.id', 'requisicions.correlativo', 'departamentos.nombre as departamento')
        //     ->where('requisicions.estatus', '=', '1')
        //     ->groupBy('requisicions.id', 'requisicions.correlativo', 'departamento')
        //     ->get();

        $clacificaciones  = DB::table('clacificacions')->where('estatus', 1)->pluck('abreviado', 'id');


        return view('admin.ingresos.create', compact('ingresos', 'requisicions', 'proveedors', 'users', 'almacens', 'productos', 'clacificaciones', 'tipodocumentos', 'tipomovimientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return dd($request);
        $request->validate([
            'proveedor_id' => 'required|not_in:0',
            'correlativo' => 'required'
        ]);
        try {
            DB::beginTransaction();

            $ingreso = new Ingreso;

            $ingreso->tipomovimiento_id = 1;
            if ($request->get('requisicion_id')) {
                $ingreso->requisicion_id = $request->get('requisicion_id');
            }
            $ingreso->proveedor_id = $request->get('proveedor_id');
            $ingreso->correlativo = $request->get('correlativo');
            $ingreso->observacion = $request->get('observacion');
            $ingreso->user_id = auth()->user()->id;
            $ingreso->save();

            $requisicion_id = $request->get('requisicion_id');

            if ($requisicion_id) {
                $r = Requisicion::find($requisicion_id);
                $r->estatus = '2';
                $r->save();
            }


            $producto_id = $request->get('producto_id');
            $marca = $request->get('marca');
            $ubicacion = $request->get('ubicacion');
            $almacen_id = $request->get('almacen_id');
            $cantidad = $request->get('cantidad');
            $observacionp = $request->get('observacionp');
            $cont = 0;

            while ($cont < count($producto_id)) {
                $detalle = new Detalleingreso();
                $detalle->ingreso_id = $ingreso->id;
                $detalle->producto_id = $producto_id[$cont];
                $detalle->almacen_id = $almacen_id[$cont];
                $detalle->ubicacion = $ubicacion[$cont];
                $detalle->observacionp = $observacionp[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->save();


                $almacenProducto = new AlmacenProducto();
                $almacenProducto->producto_id = $producto_id[$cont];
                $almacenProducto->almacen_id = $almacen_id[$cont];
                $almacenProducto->save();

                $p = Producto::find($producto_id[$cont]);
                $p->observacionp = $observacionp[$cont];
                $p->marca = $marca[$cont];
                $p->ubicacion = $ubicacion[$cont];

                if ((AlmacenProducto::where('producto_id', '=', $request->get('producto_id'))) && (AlmacenProducto::where('almacen_id', '=', $request->get('almacen_id')))) {
                    $p->almacenes()->sync($request->almacen_id);
                } else {
                    $p->almacenes()->attach($request->almacen_id);
                }
                $p->save();
                $cont = $cont + 1;
            }


            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado el ingreso a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();


        //$user->notify(new InvoicePaid($invoice));
        //Auth()->user()->notify(new IngresoNotification($ingreso));

        // User::all()->except($ingreso->user_id)
        //            ->each(function(User $user) use ($ingreso){
        //              $user->notify(new IngresoNotification($ingreso));
        //            });

        event(new IngresoEvent($ingreso));


        return redirect()->route('admin.ingresos.index')->with('success', 'Guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $empresa=DB::table('empresas as e')
        //     ->select('e.id','e.nombre','e.rif','e.descipcion','e.direccion');
        $ingreso = Ingreso::find($id);

        $compra = Cargo::find(1);
        $almacen = Cargo::find(2);

        $detalles = Detalleingreso::join('productos', 'detalle_ingreso.producto_id', '=', 'productos.id')
            ->join('almacens', 'detalle_ingreso.almacen_id', '=', 'almacens.id')
            ->select(
                'productos.nombre as producto',
                'productos.unidad_medida as unidad',
                'productos.marca as marca',
                'almacens.nombre as almacen',
                'detalle_ingreso.cantidad',
                'detalle_ingreso.observacionp',
                'detalle_ingreso.created_at',
                'detalle_ingreso.updated_at',
            )
            ->where('detalle_ingreso.ingreso_id', '=', $id)
            ->orderBy('detalle_ingreso.id', 'desc')->get();

        return view('admin.ingresos.show', compact('ingreso', 'detalles', 'compra', 'almacen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingreso $ingreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingreso $ingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->estatus = 2;
        $ingreso->update();
        return view('admin.ingresos.index');
    }

    public function estatuingreso(Ingreso $ingreso)
    {

        if ($ingreso->estatus == "1") {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al ingreso: ' . $ingreso->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $ingreso->estatus = '0';
            $ingreso->save();

            return redirect()->route('admin.ingresos.index')->with('success', 'El documento se anuló con éxito!');
        }
    }

    public function markNotification(Request $request)
    {
        auth()->user()->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })->markAsRead();
        return response()->noContent();
    }


    public function pdf(Request $request,$id){

        $ingreso = Ingreso::find($id);

        $compra = Cargo::find(1);
        $almacen = Cargo::find(2);

        $detalles = Detalleingreso::join('productos', 'detalle_ingreso.producto_id', '=', 'productos.id')
            ->join('almacens', 'detalle_ingreso.almacen_id', '=', 'almacens.id')
            ->select(
                'productos.nombre as producto',
                'productos.unidad_medida as unidad',
                'productos.marca as marca',
                'almacens.nombre as almacen',
                'detalle_ingreso.cantidad',
                'detalle_ingreso.observacionp',
                'detalle_ingreso.created_at',
                'detalle_ingreso.updated_at',
            )
            ->where('detalle_ingreso.ingreso_id', '=', $id)
            ->orderBy('detalle_ingreso.id', 'desc')->get();

        $numingreso=Ingreso::select('id')->where('id',$id)->get();

        $pdf = PDF::loadView('admin/pdf/ingreso',['ingreso'=>$ingreso,'detalles'=>$detalles,'compra'=>$compra,'almacen'=>$almacen]);
        return $pdf->stream('admin/ingreso-'.$numingreso[0]->id.'.pdf');
        //return $pdf->download('ingreso.pdf');
    }
}
