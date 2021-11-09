<?php

namespace App\Http\Controllers\admin;

use App\Models\Biennacional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clacificacionbienes;
use App\Models\Log\LogSistema;

class BiennacionalController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.biennacionals.index')->only('index');
    //     $this->middleware('can:admin.biennacionals.create')->only('create', 'store');
    //     $this->middleware('can:admin.biennacionals.edit')->only('edit', 'update');
    //     $this->middleware('can:admin.biennacionals.destroy')->only('destroy');
    //     $this->middleware('can:admin.biennacionals.estatucargo')->only('estatucargo');
    // }

    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los biennacionals a las: '
            . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.biennacionals.index');
    }

    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un cargo nuevo a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        $clacificacionbienes  = Clacificacionbienes::where('estatus', 1)->get()->pluck('display_clacificacion','id');

        return view('admin.biennacionals.create', compact('clacificacionbienes'));
    }

    public function show(Biennacional $biennacional)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver la ficha del usuario: ' . $biennacional->nombre .' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        // $departamentos = Departamento::pluck('nombre', 'id');
        // $tipodocumentos = Tipodocumento::pluck('abreviado', 'id');
        // $cargos = Cargo::pluck('nombre', 'id');
        

        return view('admin.biennacionals.show', compact('biennacional'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'slug' => 'required|unique:biennacionals'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado un nuevo cargo : ' . $request->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $biennacional = Biennacional::create($request->all());

        return redirect()->route('admin.biennacionals.edit', $biennacional)->with('success', ' ¡Felicidades el cargo se creo con éxito!');
    }

    public function edit(Biennacional $biennacional)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a editar el cargo : ' . $biennacional->nombre . ' a las ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        $clacificacionbienes  = Clacificacionbienes::where('estatus', 1)->get()->pluck('display_clacificacion','id');

        return view('admin.biennacionals.edit', compact('biennacional','clacificacionbienes'));
    }

    public function update(Request $request, Biennacional $biennacional)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:biennacionals,slug,$biennacional->id",
            'descripcion' => 'required'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha actualizado el cargo : ' . $biennacional->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $biennacional->update($request->all());

        return redirect()->route('admin.biennacionals.edit', $biennacional)->with('success', ' ¡Felicidades el cargo se actualizó con éxito!');
    }

    public function destroy(Biennacional $biennacional)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha eliminado el cargo : ' . $biennacional->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $biennacional->delete();

        return redirect()->route('admin.biennacionals.index')->with('success', ' ¡Felicidades el cargo se eliminó con éxito!');
    }

    public function estatucargo(Biennacional $biennacional)
    {
        if ($biennacional->estatus == "1") {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al cargo: ' . $biennacional->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $biennacional->estatus = '0';
            $biennacional->save();
            return redirect()->route('admin.biennacionals.index')->with('success', 'El cargo està inactivo con exito...!!!');
        } else {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha activado al cargo: ' . $biennacional->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $biennacional->estatus = '1';
            $biennacional->save();
            return redirect()->route('admin.biennacionals.index')->with('success', 'El cargo se activó con exito...!!!');
        }
    }
}