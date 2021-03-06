<?php

namespace App\Http\Controllers\Admin;

use App\Models\Producto;
use App\Models\Clacificacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Log\LogSistema;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.productos.index')->only('index');
        $this->middleware('can:admin.productos.create')->only('create', 'store');
        $this->middleware('can:admin.productos.edit')->only('edit', 'update');
        $this->middleware('can:admin.productos.destroy')->only('destroy');
        $this->middleware('can:admin.productos.estatuproducto')->only('estatuproducto');
    }

    public function exportPdf(Request $request)
    {

        if ($request) {
            $clacificacion = $request->get('clacificacion_id');
            $ubicacion = $request->get('ubicacion');

            $inventarios = Producto::where('clacificacion_id', 'LIKE', "%$clacificacion%")
                ->orWhere('ubicacion', 'LIKE', "%$ubicacion%")
                ->get();


            $today = Carbon::now()->format('d/m/Y');
            $pdf = PDF::loadView('admin.pdf.inventarios', compact('inventarios', 'today'))->setPaper('a4', 'landscape');
            return $pdf->stream('listado-inventarios.pdf');
        }
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los productos a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.productos.index');
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un producto nuevo a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        // $clacificaciones = Clacificacion::pluck('abreviado','id');
        $clacificaciones  = Clacificacion::where('estatus', 1)->get()->pluck('display_clacificacion', 'id');
        $almacens        = DB::table('almacens')->where('estatus', 1)->pluck('nombre', 'id');

        // $clacificaciones  = DB::table('clacificacions')->where('estatus', 1)->pluck('display_clacificacion' , 'id');


        return view('admin.productos.create', compact('clacificaciones','almacens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'slug' => 'required|unique:productos',
            'clacificacion_id' => 'required|not_in:0'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado un nuevo producto : ' . $request->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $producto = Producto::create($request->all());
        
        return redirect()->route('admin.productos.index', $producto)->with('success', ' ¡Felicidades el producto se creo con éxito!');
    }

    public function show(Producto $producto)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha ingresado a ver la ficha del producto: ' . $producto->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        

        // $tipodocumentos = Tipodocumento::pluck('abreviado', 'id');
        return view('admin.productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a editar el producto : ' . $producto->nombre . ' a las ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        // $clacificaciones = Clacificacion::pluck('abreviado','id');
        $clacificaciones  = DB::table('clacificacions')->where('estatus', 1)->pluck('abreviado', 'id');

        return view('admin.productos.edit', compact('producto', 'clacificaciones'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:productos,slug,$producto->id",
            'descripcion' => 'required'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha actualizado el producto : ' . $producto->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $producto->update($request->all());

        return redirect()->route('admin.productos.edit', $producto)->with('success', ' ¡Felicidades el producto se actualizó con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha eliminado el producto : ' . $producto->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $producto->delete();

        return redirect()->route('admin.productos.index')->with('success', 'El producto se eliminó con exito!');
    }

    public function estatuproducto(Producto $producto)
    {
        if ($producto->estatus == "1") {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al producto: ' . $producto->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $producto->estatus = '0';
            $producto->save();
            return redirect()->route('admin.productos.index')->with('success', 'El producto está inactivo con éxito!');
        } else {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha activado el producto : ' . $producto->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $producto->estatus = '1';
            $producto->save();
            return redirect()->route('admin.productos.index')->with('success', 'El producto se activó con éxito!');
        }
    }
}
