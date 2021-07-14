<?php

namespace App\Http\Controllers\Admin;

use App\Models\Almacen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\Currentpass;
use App\Models\Log\LogSistema;


class AlmacenController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.almacens.index')->only('index');
        $this->middleware('can:admin.almacens.create')->only('create', 'store');
        $this->middleware('can:admin.almacens.edit')->only('edit', 'update');
        $this->middleware('can:admin.almacens.destroy')->only('destroy');
        $this->middleware('can:admin.almacens.estatualmacen')->only('estatualmacen');
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los almacenes a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.almacens.index');
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un almacen nuevo a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.almacens.create');
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
            'slug' => 'required|unique:almacens',

        ]);
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado un nuevo almacen : ' . $request->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $almacen = Almacen::create($request->all());

        return redirect()->route('admin.almacens.index', $almacen)->with('success', ' ¡Felicidades el almacen se creo con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function show(Almacen $almacen)
    {
        if ($almacen->estatus == "1") {

            $almacen->estatus = '0';
            $almacen->save();
            return redirect()->route('admin.almacens.index')->with('success', 'El almacen està inactivo con exito...!!!');
        } else {

            $almacen->estatus = '1';
            $almacen->save();
            return redirect()->route('admin.almacens.index')->with('success', 'El almacen se activó con exito...!!!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function edit(Almacen $almacen)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a editar el almacen : ' . $almacen->nombre . ' a las ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.almacens.edit', compact('almacen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Almacen $almacen)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:almacens,slug,$almacen->id",
            'descripcion' => 'required',
            'current_password' => ['required', new Currentpass],
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha actualizado el almacen : ' . $almacen->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $almacen->update($request->all());
        return redirect()->route('admin.almacens.edit', $almacen)->with('success', ' ¡Felicidades el almacen se actualizó con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Almacen  $almacen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Almacen $almacen)
    {

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha eliminado el almacen : ' . $almacen->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $almacen->delete();

        return redirect()->route('admin.almacens.index')->with('success', 'El almacen se eliminó con exito...');
    }

    public function estatualmacen(Almacen $almacen)
    {
        if ($almacen->estatus == "1") {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado el almacen: ' . $almacen->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $almacen->estatus = '0';
            $almacen->save();
            return redirect()->route('admin.almacens.index')->with('success', 'El almacen se inactivo con éxito!');
        } else {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha activado el almacen : ' . $almacen->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();


            $almacen->estatus = '1';
            $almacen->save();
            return redirect()->route('admin.almacens.index')->with('success', 'El almacen se activó con éxito!');
        }
    }
}
