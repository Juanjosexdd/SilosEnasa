<?php

namespace App\Http\Controllers\Admin;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tipodocumento;
use App\Http\Requests\ProveedorRequest;
use App\Models\Log\LogSistema;

class ProveedorController extends Controller
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los proveedores a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.proveedors.index');
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un proveedor nuevo a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $tipodocumentos = Tipodocumento::pluck('abreviado', 'id');
        
        return view('admin.proveedors.create', compact('tipodocumentos'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorRequest $request)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado un nuevo proveedor : ' . $request->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $request->validate([
            'nombre' => 'required|max:45',
            'tipodocumento_id' => 'required|not_in:0',
            'cedularif' => 'required|min:6|max:9',
            'correo' => 'required|email',
        ]);

        //return $request;
        $proveedor = Proveedor::create($request->all());

        return redirect()->route('admin.proveedors.index', $proveedor)->with('success', ' ¡Felicidades el proveedor se creo con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha ingresado a ver la ficha del proveedor: ' . $proveedor->name . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $tipodocumentos = Tipodocumento::pluck('abreviado', 'id');
        return view('admin.proveedors.show' , compact('proveedor','tipodocumentos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a editar el proveeror : ' . $proveedor->nombre . ' a las ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $tipodocumentos = Tipodocumento::pluck('abreviado', 'id');
        return view('admin.proveedors.edit', compact('tipodocumentos','proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha actualizado el proveedor : ' . $proveedor->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $proveedor->update($request->all());
        
        return redirect()->route('admin.proveedors.edit', $proveedor)->with('success', 'El proveedor se actualizó con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha eliminado el proveedor : ' . $proveedor->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $proveedor->delete();

        return redirect()->route('admin.proveedors.index')->with('info', 'El municipio se eliminó con exito...');
    }

    public function estatuproveedor(Proveedor $proveedor)
    {
        if($proveedor->estatus=="1"){

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al proveedor: ' . $proveedor->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $proveedor->estatus= '0';
            $proveedor->save();
            return redirect()->route('admin.proveedors.index')->with('success', 'El proveedor està inactivo con éxito!');

       }else{

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha activado el proveedor : ' . $proveedor->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();


            $proveedor->estatus= '1';
            $proveedor->save();
            return redirect()->route('admin.proveedors.index')->with('success', 'El proveedor se activó con éxito!');

        }
    }
}
