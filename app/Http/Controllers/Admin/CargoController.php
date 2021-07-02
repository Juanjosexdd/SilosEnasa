<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Models\Log\LogSistema;

class CargoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.cargos.index')->only('index');
        $this->middleware('can:admin.cargos.create')->only('create', 'store');
        $this->middleware('can:admin.cargos.edit')->only('edit', 'update');
        $this->middleware('can:admin.cargos.destroy')->only('destroy');
        $this->middleware('can:admin.cargos.estatucargo')->only('estatucargo');
    }

    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los cargos a las: '
            . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.cargos.index');
    }

    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un cargo nuevo a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.cargos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'slug' => 'required|unique:cargos'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado un nuevo cargo : ' . $request->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $cargo = Cargo::create($request->all());

        return redirect()->route('admin.cargos.edit', $cargo)->with('success', ' ¡Felicidades el cargo se creo con éxito!');
    }

    public function edit(Cargo $cargo)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a editar el cargo : ' . $cargo->nombre . ' a las ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.cargos.edit', compact('cargo'));
    }

    public function update(Request $request, Cargo $cargo)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:cargos,slug,$cargo->id",
            'descripcion' => 'required'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha actualizado el cargo : ' . $cargo->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $cargo->update($request->all());

        return redirect()->route('admin.cargos.edit', $cargo)->with('success', ' ¡Felicidades el cargo se actualizó con éxito!');
    }

    public function destroy(Cargo $cargo)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha eliminado el cargo : ' . $cargo->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $cargo->delete();

        return redirect()->route('admin.cargos.index')->with('success', ' ¡Felicidades el cargo se eliminó con éxito!');
    }

    public function estatucargo(Cargo $cargo)
    {
        if ($cargo->estatus == "1") {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al cargo: ' . $cargo->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $cargo->estatus = '0';
            $cargo->save();
            return redirect()->route('admin.cargos.index')->with('success', 'El cargo està inactivo con exito...!!!');
        } else {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha activado al cargo: ' . $cargo->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $cargo->estatus = '1';
            $cargo->save();
            return redirect()->route('admin.cargos.index')->with('success', 'El cargo se activó con exito...!!!');
        }
    }
}
