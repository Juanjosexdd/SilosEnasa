<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clacificacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Log\LogSistema;

class ClacificacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.clacificacions.index')->only('index');
        $this->middleware('can:admin.clacificacions.create')->only('create','store');
        $this->middleware('can:admin.clacificacions.edit')->only('edit','update');
        $this->middleware('can:admin.clacificacions.destroy')->only('destroy');
        $this->middleware('can:admin.clacificacions.estatuclacificacion')->only('estatuclacificacion');

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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de las clasificaciones a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.clacificacions.index');
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear una clasificacion nueva a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view ('admin.clacificacions.create');
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
            'abreviado' => 'required',
            'descripcion' => 'required',
            'slug' => 'required|unique:clacificacions'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado una nueva clasificación : ' . $request->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $clacificacion = Clacificacion::create($request->all());

        return redirect()->route('admin.clacificacions.edit', $clacificacion)->with('success', ' ¡Felicidades la clacificacion se creo con éxito!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clacificacion  $clacificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Clacificacion $clacificacion)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a editar la clasificación : ' . $clacificacion->nombre . ' a las ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.clacificacions.edit', compact('clacificacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clacificacion  $clacificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clacificacion $clacificacion)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:clacificacions,slug,$clacificacion->id",
            'abreviado' => 'required',
            'descripcion' => 'required'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha actualizado la clasificacion : ' . $clacificacion->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $clacificacion->update($request->all());
        return redirect()->route('admin.clacificacions.edit', $clacificacion)->with('success', ' ¡Felicidades el clasificacion se actualizó con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clacificacion  $clacificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clacificacion $clacificacion)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha eliminado la clasificacion : ' . $clacificacion->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $clacificacion->delete();

        return redirect()->route('admin.clacificacions.index')->with('success', 'El clacificación se eliminó con exito!');
    }


    public function estatuclacificacion(Clacificacion $clacificacion)
    {
        if($clacificacion->estatus=="1"){

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado la clasificación : ' . $clacificacion->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $clacificacion->estatus= '0';
            $clacificacion->save();
            return redirect()->route('admin.clacificacions.index')->with('success', 'La clasificación se inactivo con éxito!');

       }else{

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha activado la clasificación : ' . $clacificacion->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

            $clacificacion->estatus= '1';
            $clacificacion->save();
            return redirect()->route('admin.clacificacions.index')->with('success', 'La clasificación se activó con éxito!');

        }
    }
}
