<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ciudad;
use App\Models\Estado;
use App\Models\Log\LogSistema;
use Illuminate\Support\Facades\DB;

class CiudadController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.ciudads.index')->only('index');
        $this->middleware('can:admin.ciudads.create')->only('create', 'store');
        $this->middleware('can:admin.ciudads.edit')->only('edit', 'update');
        $this->middleware('can:admin.ciudads.destroy')->only('destroy');
        $this->middleware('can:admin.ciudads.estatuciudad')->only('estatuciudad');
    }

    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los municipios a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $ciudads = Ciudad::with('estado')->get();

        return view('admin.ciudads.index', compact('ciudads'));
    }

    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un municipio nuevo a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $estados  = DB::table('estados')->where('estatus', 1)->pluck('nombre' , 'id');


        return view('admin.ciudads.create', compact('estados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:ciudads',
            'estados_id' => 'required'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado un nuevo municipios : ' . $request->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $ciudad = Ciudad::create($request->all());

        return redirect()->route('admin.ciudads.edit', $ciudad)->with('success', 'El municipio se creo con exito...');
    }

    public function edit(Ciudad $ciudad)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a editar el municipio : ' . $ciudad->nombre . ' a las ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $estados  = DB::table('estados')->where('estatus', 1)->pluck('nombre' , 'id');

        return view('admin.ciudads.edit', compact('ciudad', 'estados'));
    }

    public function update(Request $request, Ciudad $ciudad)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:ciudads,slug,$ciudad->id",
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha actualizado el municipio : ' . $ciudad->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $ciudad->update($request->all());

        return redirect()->route('admin.ciudads.edit', $ciudad)->with('success', 'El municipio se actualizó con exito...');
    }

    public function destroy(Ciudad $ciudad)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha eliminado el municipio : ' . $ciudad->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $ciudad->delete();

        return redirect()->route('admin.ciudads.index')->with('info', 'El municipio se eliminó con exito...');
    }

    public function estatuciudad(Ciudad $ciudad)
    {
        if ($ciudad->estatus == "1") {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al municipio: ' . $ciudad->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $ciudad->estatus = '0';
            $ciudad->save();
            return redirect()->route('admin.ciudads.index')->with('success', 'El municipio se inactivo con éxito!');
        } else {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha activado el municipio : ' . $ciudad->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $ciudad->estatus = '1';
            $ciudad->save();
            return redirect()->route('admin.ciudads.index')->with('success', 'El municipio se activó con éxito!');
        }
    }
}
