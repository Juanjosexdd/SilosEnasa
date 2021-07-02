<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipodocumento;
use App\Models\Log\LogSistema;

class TipodocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tipodocumentos.index')->only('index');
        $this->middleware('can:admin.tipodocumentos.create')->only('create', 'store');
        $this->middleware('can:admin.tipodocumentos.edit')->only('edit', 'update');
        $this->middleware('can:admin.tipodocumentos.destroy')->only('destroy');
        $this->middleware('can:admin.tipodocumentos.estatutipodocumento')->only('estatutipodocumento');
    }

    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver los tipos de documentos a las: '
            . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.tipodocumentos.index');
    }

    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un tipo de documento a las: '
            . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.tipodocumentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'abreviado' => 'required',
            'slug' => 'required|unique:tipodocumentos'
        ]);
        
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado un nuevo tipo de documento: ' . $request->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $tipodocumento = Tipodocumento::create($request->all());

        return redirect()->route('admin.tipodocumentos.edit', $tipodocumento)->with('success', 'El tipo de documento se creo con exito!');
    }

    public function edit(Tipodocumento $tipodocumento)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a editar el documento : ' . $tipodocumento->nombre . ' a las '. date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.tipodocumentos.edit', compact('tipodocumento'));
    }

    public function update(Request $request, Tipodocumento $tipodocumento)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:tipodocumentos,slug,$tipodocumento->id",
            'abreviado' => 'required'
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha actualizado el tipo de documento : '. $request->nombre .' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $tipodocumento->update($request->all());
        return redirect()->route('admin.tipodocumentos.edit', $tipodocumento)->with('success', 'El tipo de documento se actualizó con exito!');
    }

    public function destroy(Tipodocumento $tipodocumento)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha eliminado el documento : ' . $tipodocumento->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $tipodocumento->delete();
        return redirect()->route('admin.tipodocumentos.index')->with('success', 'El tipo de documento se eliminó con exito!');
    }

    public function estatutipodocumento(Tipodocumento $tipodocumento)
    {
        if ($tipodocumento->estatus == "1") {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al documento: ' . $tipodocumento->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $tipodocumento->estatus = '0';
            $tipodocumento->save();
            return redirect()->route('admin.tipodocumentos.index')->with('success', 'El documento está inactivo con éxito!');
        } else {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha activado al documento: ' . $tipodocumento->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $tipodocumento->estatus = '1';
            $tipodocumento->save();
            return redirect()->route('admin.tipodocumentos.index')->with('success', 'El documento se activó con éxito!');
        }
    }
}
