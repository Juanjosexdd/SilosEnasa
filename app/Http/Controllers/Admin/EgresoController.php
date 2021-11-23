<?php

namespace App\Http\Controllers\Admin;

use App\Models\Almacen;
use App\Models\Egreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Eput;
use App\Models\Detalleegreso;
use App\Models\Proveedor;
use App\Models\Tipodocumento;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

use App\Http\Controllers\Controller;
use App\Http\Requests\EgresoFormRequest;
use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\DetalleInventario;
use App\Models\Empleado;
use App\Models\Inventario;
use App\Models\Producto;
use App\Models\Tipomovimiento;
use App\Models\Log\LogSistema;
use App\Models\Solicitud;
use Barryvdh\DomPDF\Facade as PDF;

class EgresoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.egresos.index')->only('index');
        $this->middleware('can:admin.egresos.create')->only('create', 'store');
        $this->middleware('can:admin.egresos.estatuegresos')->only('estatuegresos');
    }

    public function exportPdf(Request $request)
    {

        if ($request) {
            $sql = $request->get('desde');
            $sql1 = $request->get('hasta');
            $user = $request->get('user_id');
            $estatus = $request->get('estatus');
            $empleados = $request->get('empleados_id');
            $correlativodesde = $request->get('correlativodesde');
            $correlativohasta = $request->get('correlativohasta');

            $egresos = Egreso::whereBetween('created_at', [$sql, $sql1])
                ->orWhere('correlativo', $correlativodesde)
                ->orWhere('correlativo', $correlativohasta)
                ->estatus($estatus)
                ->user($user)
                ->empleados($empleados)
                ->get();
            $users = User::all();

            $today = Carbon::now()->format('d/m/Y');
            $pdf = PDF::loadView('admin.pdf.egresos', compact('egresos', 'today', 'users'))->setPaper('a4', 'landscape');
            return $pdf->stream('listado-egresos.pdf');
        }
    }

    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los egresos a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.egresos.index');
    }

    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un egreso nuevo a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $egresos     = Egreso::all();
        $users      = DB::table('users')->where('estatus', 1)->pluck('name', 'id');
        $almacens   = DB::table('almacens')->where('estatus', 1)->pluck('nombre', 'id');
        //$productos  = Producto::where('stock','>',0 )->where('estatus', 1)->get()->pluck('display_producto','id');
        $empleados  = Empleado::where('estatus', 1)->get()->pluck('display_empleado', 'id');
        $tipodocumentos  = Tipodocumento::where('estatus', 1)->get()->pluck('abreviado', 'id');
        $tipomovimientos = Tipomovimiento::pluck('descripcion', 'id');
        $departamentos  = Departamento::where('estatus', 1)->get()->pluck('display_departamento', 'id');

        $productos = DB::table('productos as prod')
            ->select(DB::raw('CONCAT(prod.nombre) AS producto'), 'prod.id', 'prod.stock')
            ->where('prod.stock', '>', 0)
            ->groupBy('producto', 'prod.id', 'prod.stock')
            ->get();
        $solicituds = Solicitud::join('departamentos', 'solicituds.departamento_id', 'departamentos.id')
            ->select('solicituds.id', 'departamentos.nombre as departamento')
            ->where('solicituds.estatus', '=', '1')
            ->groupBy('solicituds.id', 'departamento')
            ->get();;

        $clacificaciones  = DB::table('clacificacions')->where('estatus', 1)->pluck('abreviado', 'id');


        return view('admin.egresos.create', compact('solicituds', 'egresos', 'empleados', 'departamentos', 'users', 'almacens', 'productos', 'clacificaciones', 'tipodocumentos', 'tipomovimientos'));
    }

    public function store(Request $request)
    {
        //return dd($request);
        //return $request;
        $request->validate([
            'empleado_id' => 'required|not_in:0',
        ]);
        try {
            DB::beginTransaction();
            $egreso = new Egreso;

            //$egreso->departamento_id=$request->get('departamento_id');
            $egreso->tipomovimiento_id = 2;
            if ($request->get('solicitud_id')) {
                $egreso->solicitud_id = $request->get('solicitud_id');
            }
            $egreso->empleado_id = $request->get('empleado_id');
            $egreso->correlativo = $request->get('correlativo');
            $egreso->fecha_original = $request->get('fecha_original');
            $egreso->observacion = $request->get('observacion');
            $egreso->user_id = auth()->user()->id;
            $egreso->save();

            $inventario = new Inventario();
            $inventario->tipo_movimiento = 2;
            $inventario->referencia = $request->get('correlativo');
            $inventario->empleado_id = $request->get('empleado_id');
            $inventario->user_id = auth()->user()->id;
            $inventario->save();



            $producto_id = $request->get('producto_id');
            $cantidad = $request->get('cantidad');
            $observacionp = $request->get('observacionp');
            $cont = 0;

            $solicitud_id = $request->get('solicitud_id');

            if ($solicitud_id) {
                $s = Solicitud::find($solicitud_id);
                $s->estatus = '2';
                $s->save();
            }

            while ($cont < count($producto_id)) {
                $detalle = new Detalleegreso();
                $detalle->egreso_id = $egreso->id;
                $detalle->producto_id = $producto_id[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->observacionp = $observacionp[$cont];
                $detalle->save();

                $detalleinventario = new DetalleInventario();
                $detalleinventario->inventario_id = $inventario->id;
                $detalleinventario->producto_id = $producto_id[$cont];
                $detalleinventario->cantidad = $cantidad[$cont];
                $detalleinventario->save();

                $cont = $cont + 1;
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado el egreso a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();


        return redirect()->route('admin.egresos.index')->with('success', 'Guardado con exito');
    }

    public function show($id)
    {
        $empresa = DB::table('empresas as e')
            ->select('e.id', 'e.nombre', 'e.rif', 'e.descipcion', 'e.direccion');
        $egreso = Egreso::find($id);


        $detalles = Detalleegreso::join('productos', 'detalle_egreso.producto_id', '=', 'productos.id')
            ->select(
                'productos.nombre as producto',
                'detalle_egreso.cantidad',
                'detalle_egreso.observacionp',
                'detalle_egreso.created_at',
                'detalle_egreso.updated_at',
            )
            ->where('detalle_egreso.egreso_id', '=', $id)
            ->orderBy('detalle_egreso.id', 'desc')->get();
        return view('admin.egresos.show', compact('egreso', 'detalles'));
    }

    public function edit(Egreso $egreso)
    {
        //
    }

    public function update(Request $request, Egreso $egreso)
    {
    }

    public function destroy($id)
    {
        $egreso = Egreso::findOrFail($id);
        $egreso->estatus = 2;
        $egreso->update();
        return view('admin.egresos.index');
    }

    public function estatuegreso(Egreso $egreso)
    {
        if ($egreso->estatus == "1") {

            $log = new LogSistema();
            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al egreso: ' . $egreso->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $egreso->estatus = '0';
            $egreso->save();

            return redirect()->route('admin.egresos.index')->with('success', 'El documento se anuló con éxito!');
        }
    }

    public function pdf(Request $request, $id)
    {

        $compra = Cargo::find(1);
        $almacen = Cargo::find(2);

        $egreso = Egreso::find($id);


        $detalles = Detalleegreso::join('productos', 'detalle_egreso.producto_id', '=', 'productos.id')
            ->select(
                'productos.nombre as producto',
                'detalle_egreso.cantidad',
                'detalle_egreso.observacionp',
                'detalle_egreso.created_at',
                'detalle_egreso.updated_at',
            )
            ->where('detalle_egreso.egreso_id', '=', $id)
            ->orderBy('detalle_egreso.id', 'desc')->get();

        $numegreso = Egreso::select('id')->where('id', $id)->get();

        $pdf = PDF::loadView('admin/pdf/egreso', ['egreso' => $egreso, 'detalles' => $detalles, 'compra' => $compra, 'almacen' => $almacen]);
        return $pdf->stream('admin/egreso-' . $numegreso[0]->id . '.pdf');
        //return $pdf->download('egreso.pdf');
    }
}
