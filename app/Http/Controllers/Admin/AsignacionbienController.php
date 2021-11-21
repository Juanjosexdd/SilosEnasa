<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Asignacionbien;
use App\Models\Biennacional;
use App\Models\Empleado;
use App\Models\Log\LogSistema;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class AsignacionbienController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.asignacions.index')->only('index');
        $this->middleware('can:admin.asignacions.create')->only('create', 'store');
        $this->middleware('can:admin.asignacions.edit')->only('edit', 'update');
        $this->middleware('can:admin.asignacions.destroy')->only('destroy');
        $this->middleware('can:admin.asignacions.estatuasignacion')->only('estatuasignacion');
    }

    public function exportPdf(Request $request)
    {

        if ($request) {

            $empleado = $request->get('empleado_id');
            $user = $request->get('user_id');
            $biennacional = $request->get('biennacional_id');

            $asignacionbiens = Asignacionbien::orWhere('empleado_id', 'LIKE', "%$empleado%")
                ->orWhere('user_id', 'LIKE', "%$user%")
                ->orWhere('bienesnacionales_id', 'LIKE', "%$biennacional%")
                ->get();

            $today = Carbon::now()->format('d/m/Y');
            $pdf = PDF::loadView('admin.pdf.asignacions', compact('asignacionbiens', 'today'))->setPaper('a4', 'landscape');
            return $pdf->stream('listado-asignacions.pdf');
        }
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de las asignaciones de bienes a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.asignacions.index');
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a realizar una asignacion de bienes a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $empleados  = Empleado::where('estatus', 1)->get()->pluck('display_empleado', 'id');
        $biennacionals  = Biennacional::where('estatus', 1)->get()->pluck('display_bienes', 'id');


        return view('admin.asignacions.create', compact('empleados', 'biennacionals'));
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
            'bienesnacionales_id' => 'required|not_in:0',
            'empleado_id' => 'required|not_in:0',
        ]);
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado el solicitud a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $bienesnacionales_id = $request->get('bienesnacionales_id');

        $cont = 0;

        if ($bienesnacionales_id) {
            $p = Biennacional::find($bienesnacionales_id);
            $p->estatus = 2;
            $p->save();
            $cont = $cont + 1;
        }

        // $asignacionbien->user_id = auth()->user()->id;
        $asignacionbien = Asignacionbien::create($request->all());

        return redirect()->route('admin.asignacions.index')->with('success', 'Guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignacionbien  $asignacionbien
     * @return \Illuminate\Http\Response
     */
    public function show(Asignacionbien $asignacionbien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignacionbien  $asignacionbien
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignacionbien $asignacionbien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignacionbien  $asignacionbien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignacionbien $asignacionbien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignacionbien  $asignacionbien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignacionbien $asignacionbien)
    {
        //
    }

    public function estatuasignacion(Asignacionbien $asignacionbien)
    {
        if ($asignacionbien->estatus == "1") {

            $log = new LogSistema();
            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al asignacionbien: ' . $asignacionbien->codigo . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $asignacionbien->estatus = '0';
            $asignacionbien->save();

            if ($asignacionbien->bienesnacionales_id) {
                $b = Biennacional::find($asignacionbien->bienesnacionales_id);
                $b->estatus = 1;
                $b->save();
            }
            return redirect()->route('admin.asignacions.index')->with('success', 'El documento se anuló con éxito!');
        }
    }
}
