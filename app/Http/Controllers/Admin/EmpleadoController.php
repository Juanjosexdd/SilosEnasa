<?php

namespace App\Http\Controllers\Admin;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmpleadoRequest;
use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Tipodocumento;
use App\Models\Log\LogSistema;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.empleados.index')->only('index');
        $this->middleware('can:admin.empleados.create')->only('create', 'store');
        $this->middleware('can:admin.empleados.edit')->only('edit', 'update');
        $this->middleware('can:admin.empleados.destroy')->only('destroy');
        $this->middleware('can:admin.empleados.estatuempleado')->only('estatuempleado');
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los trabajadores a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.empleados.index');
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un trabajador nuevo a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $tipodocumentos  = DB::table('tipodocumentos')->where('estatus', 1)->pluck('abreviado' , 'id');
        $cargos  = DB::table('cargos')->where('estatus', 1)->pluck('nombre' , 'id');
        $departamentos  = DB::table('departamentos')->where('estatus', 1)->pluck('nombre' , 'id');

        return view('admin.empleados.create', compact('tipodocumentos', 'cargos', 'departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoRequest $request)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado al trabajador : ' . $request->nombres . ' ' . $request->apellidos . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $empleado = Empleado::create($request->all());

        return redirect()->route('admin.empleados.index')->with('success', 'El trabajador se registro con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver la ficha del usuario: ' . $empleado->nombres . ' ' . $empleado->apellidos . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $departamentos = Departamento::pluck('nombre', 'id');
        $tipodocumentos = Tipodocumento::pluck('abreviado', 'id');
        $cargos = Cargo::pluck('nombre', 'id');

        return view('admin.empleados.show', compact('departamentos', 'tipodocumentos', 'cargos', 'empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a editar el trabajador : ' . $empleado->nombres . ' ' . $empleado->apellidos . ' a las ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $tipodocumentos  = DB::table('tipodocumentos')->where('estatus', 1)->pluck('abreviado' , 'id');
        $cargos  = DB::table('cargos')->where('estatus', 1)->pluck('nombre' , 'id');
        $departamentos  = DB::table('departamentos')->where('estatus', 1)->pluck('nombre' , 'id');

        return view('admin.empleados.edit', compact('tipodocumentos', 'cargos', 'departamentos', 'empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha actualizado el trabajador : ' . $empleado->nombres . ' ' . $empleado->apellidos . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $empleado->update($request->all());

        return redirect()->route('admin.empleados.index')->with('success', 'El trabajador se actualizó con exito.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha eliminado el trabajador : ' . $empleado->nombres . ' ' . $empleado->apellidos . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $empleado->delete();
        return redirect()->route('admin.empleados.index')->with('success', 'El empleado se eliminó con exito...');
    }

    public function estatuempleado(Empleado $empleado)
    {
        if ($empleado->estatus == "1") {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al trabajador: ' . $empleado->nombres . ' ' . $empleado->apellidos . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $empleado->estatus = '0';
            $empleado->save();
            return redirect()->route('admin.empleados.index')->with('success', 'El trabajador está inactivo con éxito!');
        } else {
            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha activado al trabajador : ' . $empleado->nombres . ' ' . $empleado->apellidos . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $empleado->estatus = '1';
            $empleado->save();
            return redirect()->route('admin.empleados.index')->with('success', 'El trabajador se activó con éxito!');
        }
    }
}
