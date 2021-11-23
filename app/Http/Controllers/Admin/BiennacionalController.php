<?php

namespace App\Http\Controllers\admin;

use App\Models\Biennacional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Asignacionbien;
use App\Models\Clacificacionbienes;
use App\Models\Log\LogSistema;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class BiennacionalController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.biennacionals.index')->only('index');
        $this->middleware('can:admin.biennacionals.create')->only('create', 'store');
        $this->middleware('can:admin.biennacionals.edit')->only('edit', 'update');
        $this->middleware('can:admin.biennacionals.destroy')->only('destroy');
        $this->middleware('can:admin.biennacionals.estatubiennacional')->only('estatubiennacional');
    }

    public function exportPdf(Request $request)
    {

        if ($request) {
            $sql = $request->get('desde');
            $sql1 = $request->get('hasta');
            $codigodesde = $request->get('codigodesde');
            $codigohasta = $request->get('codigohasta');

            $biennacionals = Biennacional::whereBetween('codigo', [$codigodesde, $codigohasta])
                ->orWhere('fecha_adquisicion', 'LIKE', "%$sql%")
                ->orWhere('fecha_adquisicion', 'LIKE', "%$sql1%")
                ->get();


            $today = Carbon::now()->format('d/m/Y');
            $pdf = PDF::loadView('admin.pdf.biennacionals', compact('biennacionals', 'today'))->setPaper('a4', 'landscape');
            return $pdf->stream('listado-biennacionals.pdf');
        }
    }

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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un bien nacional nuevo a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();


        $clacificacionbienes  = Clacificacionbienes::where('estatus', 1)->get()->pluck('display_clacificacion', 'id');

        return view('admin.biennacionals.create', compact('clacificacionbienes'));
    }

    public function show(Biennacional $biennacional)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver la ficha del usuario: ' . $biennacional->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $asignacion = Asignacionbien::where('bienesnacionales_id', $biennacional)
            ->first();
        // $departamentos = Departamento::pluck('nombre', 'id');
        // $tipodocumentos = Tipodocumento::pluck('abreviado', 'id');
        // $bien nacionals = Cargo::pluck('nombre', 'id');


        return view('admin.biennacionals.show', compact('biennacional', 'asignacion'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:biennacionals',
            'descripcion' => 'required',
            'clacificacionbienes_id' => 'required|not_in:0',
            'codigo' => 'required|unique:biennacionals',
        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado un nuevo bien nacional : ' . $request->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $biennacional = Biennacional::create($request->all());

        return redirect()->route('admin.biennacionals.edit', $biennacional)->with('success', ' ¡Felicidades el bien nacional se creo con éxito!');
    }

    public function edit(Biennacional $biennacional)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a editar el bien nacional : ' . $biennacional->nombre . ' a las ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        $clacificacionbienes  = Clacificacionbienes::where('estatus', 1)->get()->pluck('display_clacificacion', 'id');

        return view('admin.biennacionals.edit', compact('biennacional', 'clacificacionbienes'));
    }

    public function update(Request $request, Biennacional $biennacional)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:biennacionals,slug,$biennacional->id",
            'descripcion' => 'required',

        ]);

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha actualizado el bien nacional : ' . $biennacional->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $biennacional->update($request->all());

        return redirect()->route('admin.biennacionals.edit', $biennacional)->with('success', ' ¡Felicidades el bien nacional se actualizó con éxito!');
    }

    public function destroy(Biennacional $biennacional)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha eliminado el bien nacional : ' . $biennacional->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $biennacional->delete();

        return redirect()->route('admin.biennacionals.index')->with('success', ' ¡Felicidades el bien nacional se eliminó con éxito!');
    }

    public function estatubiennacional(Biennacional $biennacional)
    {
        if ($biennacional->estatus == "1") {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al bien nacional: ' . $biennacional->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $biennacional->estatus = '0';
            $biennacional->save();
            return redirect()->route('admin.biennacionals.index')->with('success', 'El bien nacional està inactivo con exito...!!!');
        } else {

            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha activado al bien nacional: ' . $biennacional->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $biennacional->estatus = '1';
            $biennacional->save();
            return redirect()->route('admin.biennacionals.index')->with('success', 'El bien nacional se activó con exito...!!!');
        }
    }

    public function desincorporar(Biennacional $biennacional)
    {
        $biennacional->estatus = '3';
        $biennacional->save();
        return redirect()->route('admin.biennacionals.index')->with('success', 'El bien nacional se ha desincorporado!');
    }
}
