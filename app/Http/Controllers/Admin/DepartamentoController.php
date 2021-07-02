<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departamento;
use Illuminate\Support\Facades\Validator;
use App\Models\Log\LogSistema;

class DepartamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.departamentos.index')->only('index');
        $this->middleware('can:admin.departamentos.create')->only('create','store');
        $this->middleware('can:admin.departamentos.edit')->only('edit','update');
        $this->middleware('can:admin.departamentos.destroy')->only('destroy');
        $this->middleware('can:admin.departamentos.estatudepartamento')->only('estatudepartamento');

    }

    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los departamentos a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view ('admin.departamentos.index');
    }

    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un departamento nuevo a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view ('admin.departamentos.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'slug' => 'required|unique:departamentos'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado un nuevo departamento : ' . $request->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $departamento = Departamento::create($request->all());

        return redirect()->route('admin.departamentos.edit', $departamento)->with('success', 'Felicidades el departamento se creo con exito...');
    }

    public function edit(Departamento $departamento)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a editar el departamento : ' . $departamento->nombre . ' a las ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view ('admin.departamentos.edit', compact('departamento'));
        
    }

    public function update(Request $request, Departamento $departamento)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:departamentos,slug,$departamento->id",
            'descripcion' => 'required'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha actualizado el departamento : ' . $request->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $departamento->update($request->all());
        
        return redirect()->route('admin.departamentos.edit', $departamento)->with('success', 'El departamento se actualizó con exito...');
    }

    public function destroy(Departamento $departamento)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha eliminado el departamento : ' . $departamento->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $departamento->delete();

        return redirect()->route('admin.departamentos.index')->with('success', 'El departamento se eliminó con exito...');
    }

    public function estatudepartamento(Departamento $departamento)
    {
        if($departamento->estatus=="1"){

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al departamento: ' . $departamento->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $departamento->estatus= '0';
            $departamento->save();
            return redirect()->route('admin.departamentos.index')->with('success', 'El de departamento se inactivo con éxito!');

        }else{

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha activado al departamento: ' . $departamento->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $departamento->estatus= '1';
            $departamento->save();
            return redirect()->route('admin.departamentos.index')->with('success', 'El de departamento se activó con éxito!');

        }
    }
}
