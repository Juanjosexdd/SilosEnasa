<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\Log\LogSistema;

class EstadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.estados.index')->only('index');
        $this->middleware('can:admin.estados.create')->only('create', 'store');
        $this->middleware('can:admin.estados.edit')->only('edit', 'update');
        $this->middleware('can:admin.estados.destroy')->only('destroy');
        $this->middleware('can:admin.estados.estatuestado')->only('estatuestado');
    }

    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los estados a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view('admin.estados.index');
    }

    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un estado nuevo a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view('admin.estados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:estados'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado un nuevo estado : ' . $request->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $estado = Estado::create($request->all());

        return redirect()->route('admin.estados.edit', $estado)->with('success', '¡Felicidades el estado se creó con éxito!');
    }

    public function edit(Estado $estado)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a editar el estado : ' . $estado->nombre . ' a las ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.estados.edit', compact('estado'));
    }

    public function update(Request $request, Estado $estado)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:estados,slug,$estado->id"
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha actualizado el estado : ' . $estado->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $estado->update($request->all());
        return redirect()->route('admin.estados.edit', $estado)->with('success', '¡Felicidades el estado se actualizó con éxito!');
    }

    public function destroy(Estado $estado)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha eliminado el estado : ' . $estado->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $estado->delete();

        return redirect()->route('admin.estados.index')->with('success', '¡Felicidades el estado se Eliminó con éxito!');;
    }

    public function estatuestado(Estado $estado)
    {
        if ($estado->estatus == "1") {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al estado: ' . $estado->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();


            $estado->estatus = '0';
            $estado->save();
            return redirect()->route('admin.estados.index')->with('success', 'El estado se inactivo con éxito!');

        } else {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha activado el estado : ' . $estado->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $estado->estatus = '1';
            $estado->save();
            return redirect()->route('admin.estados.index')->with('success', 'El estado se activó con éxito!');
        }
    }
}
