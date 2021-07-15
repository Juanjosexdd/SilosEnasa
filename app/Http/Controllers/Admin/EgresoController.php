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
use App\Models\Empleado;
use App\Models\Producto;
use App\Models\Tipomovimiento;
use App\Models\Log\LogSistema;

class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los egresos a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.egresos.index');
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un egreso nuevo a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $users      = DB::table('users')->where('estatus', 1)->pluck('name', 'id');
        // $proveedors = DB::table('proveedors')->where('estatus', 1)->pluck('nombre' , 'id');
        $almacens   = DB::table('almacens')->where('estatus', 1)->pluck('nombre' , 'id');
        // $productos  = DB::table('productos')->where('estatus', 1)->pluck('nombre' , 'id');
        $productos  = Producto::where('stock','>',0 )->where('estatus', 1)->get()->pluck('display_producto','id');
        $empleados  = Empleado::where('estatus', 1)->get()->pluck('display_empleado','id');
        $tipodocumentos  = Tipodocumento::where('estatus', 1)->get()->pluck('abreviado','id');
        $tipomovimientos = Tipomovimiento::pluck('descripcion', 'id');

        $clacificaciones  = DB::table('clacificacions')->where('estatus', 1)->pluck('abreviado' , 'id');


        return view('admin.egresos.create', compact('empleados','users','almacens','productos','clacificaciones','tipodocumentos','tipomovimientos'));
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
        //return $request;
        try {
            DB::beginTransaction();
            $egreso=new Egreso;
            
            $egreso->empleado_id=$request->get('empleado_id');
            $egreso->correlativo=$request->get('correlativo');
            $egreso->observacion=$request->get('observacion');
            $egreso->user_id = auth()->user()->id;
            $egreso->save();

            $producto_id = $request->get('producto_id');
            $almacen_id=$request->get('almacen_id');
            $cantidad = $request->get('cantidad');
            $cont = 0;
            
            while($cont < count($producto_id))
            {
                $detalle = new Detalleegreso();
                $detalle->egreso_id=$egreso->id;
                $detalle->producto_id=$producto_id[$cont];
                $detalle->almacen_id=$almacen_id[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->save();
                
                $cont = $cont+1;
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa=DB::table('empresas as e')
            ->select('e.id','e.nombre','e.rif','e.descipcion','e.direccion');
        $egreso = Egreso::find($id);

        $detalles = Detalleegreso::join('productos','detalle_egreso.producto_id','=','productos.id')
                                  ->join('almacens' ,'detalle_egreso.almacen_id','=','almacens.id')
             ->select('productos.nombre as producto',
                      'almacens.nombre as almacen',
                      'detalle_egreso.cantidad',
                      'detalle_egreso.created_at',
                      'detalle_egreso.updated_at',)
             ->where('detalle_egreso.egreso_id','=',$id)
             ->orderBy('detalle_egreso.id', 'desc')->get();
        return view('admin.egresos.show', compact('egreso','detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function edit(Egreso $egreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Egreso $egreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $egreso=Egreso::findOrFail($id);
        $egreso->estatus=2;
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

            

            // $cont = 0;
            // while($cont < count($egreso->producto_id)){
            //     $egreso->estatus = '0';
            //     $egreso->save();
            // }

            $egreso->estatus = '0';
            $egreso->save();

            return redirect()->route('admin.egresos.index')->with('success', 'El documento se anuló con éxito!');

        }
    }
}
