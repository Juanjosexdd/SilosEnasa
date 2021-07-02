<?php

namespace App\Http\Controllers\Admin;

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
use App\Models\Producto;
use App\Models\Tipomovimiento;
use App\Models\Log\LogSistema;

class IngresoController extends Controller
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

        $users      = DB::table('users')->where('estatus', 1)->pluck('name', 'id');
        // $proveedors = DB::table('proveedors')->where('estatus', 1)->pluck('nombre' , 'id');
        $almacens   = DB::table('almacens')->where('estatus', 1)->pluck('nombre' , 'id');
        // $productos  = DB::table('productos')->where('estatus', 1)->pluck('nombre' , 'id');
        $productos  = Producto::where('estatus', 1)->get()->pluck('display_producto','id');
        $proveedors  = Proveedor::where('estatus', 1)->get()->pluck('display_proveedor','id');

        return view('admin.ingresos.create', compact('proveedors','users','almacens','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $ingreso=new Ingreso;
            $ingreso->proveedor_id=$request->get('proveedor_id');
            $ingreso->observacion=$request->get('observacion');
            $ingreso->user_id = auth()->user()->id;
            $ingreso->save();

            $producto_id = $request->get('producto_id');
            $almacen_id=$request->get('almacen_id');
            $cantidad = $request->get('cantidad');
            $cont = 0;
            
            while($cont < count($producto_id))
            {
                $detalle = new Detalleingreso();
                $detalle->ingreso_id=$ingreso->id;
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado el ingreso a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        // //return $request;
        // $ingreso= new Ingreso;
        // $ingreso->proveedor_id=$request->proveedor_id;
        // // $ingreso->tipomovimento_id=$request->tipomovimento_id;
        // $ingreso->user_id = auth()->user()->id;
        // $ingreso->save();
        
        // $producto_id = $request->producto_id;
        // $almacen_id = $request->almacen_id;
        // // $cantidad = $request->get('cantidad');
        // $cantidad=$request->cantidad;
        // $cont = 0;

        // while($cont < count($producto_id)){
        //     $detalle = new Detalleingreso();
        //     $detalle->ingreso_id= $ingreso->id;
        //     $detalle->almacen_id= $almacen_id[$cont];
        //     $detalle->producto_id= $producto_id[$cont];
        //     $detalle->cantidad= $cantidad[$cont];
        //     $detalle->save();
        //     $cont=$cont+1;

        // }

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
        $ingreso=Ingreso::findOrFail($id);
        $ingreso->estatus=2;
        $ingreso->update();
        return view('admin.ingresos.index');
    }
}
