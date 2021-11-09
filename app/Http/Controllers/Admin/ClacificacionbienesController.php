<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Clacificacionbienes;
use App\Models\Log\LogSistema;
use Illuminate\Http\Request;

class ClacificacionbienesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.clacificacions.index')->only('index');
    //     $this->middleware('can:admin.clacificacions.create')->only('create','store');
    //     $this->middleware('can:admin.clacificacions.edit')->only('edit','update');
    //     $this->middleware('can:admin.clacificacions.destroy')->only('destroy');
    //     $this->middleware('can:admin.clacificacions.estatuclacificacion')->only('estatuclacificacion');

    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de las clacificaciones de bienes a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.clacificacionbienes.index');
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear una clacificacion de bienes nueva a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view ('admin.clacificacionbienes.create');
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
            'slug' => 'required|unique:clacificacionbienes'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado una nueva clacificación de bienes : ' . $request->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $clacificacionbiene = Clacificacionbienes::create($request->all());

        return redirect()->route('admin.clacificacionbienes.edit', $clacificacionbiene)->with('success', ' ¡Felicidades la clacificacion se creo con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clacificacionbienes  $clacificacionbienes
     * @return \Illuminate\Http\Response
     */
    public function show(Clacificacionbienes $clacificacionbiene)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clacificacionbienes  $clacificacionbienes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clacificacionbienes $clacificacionbiene)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a editar la clacificación de bienes : ' . $clacificacionbiene->nombre . ' a las ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.clacificacionbienes.edit', compact('clacificacionbiene'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clacificacionbienes  $clacificacionbienes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clacificacionbienes $clacificacionbiene)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:clacificacionbienes,slug,$clacificacionbiene->id",
            'abreviado' => 'required',
            'descripcion' => 'required'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha actualizado la clacificacion de bienes : ' . $clacificacionbiene->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $clacificacionbiene->update($request->all());
        return redirect()->route('admin.clacificacionbienes.edit', $clacificacionbiene)->with('success', ' ¡Felicidades el clacificacion se actualizó con éxito!');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clacificacionbienes  $clacificacionbienes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clacificacionbienes $clacificacionbiene)
    {

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha eliminado la clacificacion de bienes : ' . $clacificacionbiene->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $clacificacionbiene->delete();

        return redirect()->route('admin.clacificacionbienes.index')->with('success', 'El clacificación se eliminó con exito!');
    }

    public function estatuclacificacionbien(Clacificacionbienes $clacificacionbiene)
    {
        if($clacificacionbiene->estatus=="1"){

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado la clacificación : ' . $clacificacionbiene->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $clacificacionbiene->estatus= '0';
            $clacificacionbiene->save();
            return redirect()->route('admin.clacificacionbienes.index')->with('success', 'La clacificación se inactivo con éxito!');

       }else{

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha activado la clacificación : ' . $clacificacionbiene->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

            $clacificacionbiene->estatus= '1';
            $clacificacionbiene->save();
            return redirect()->route('admin.clacificacionbienes.index')->with('success', 'La clacificación se activó con éxito!');

        }
    }
}
