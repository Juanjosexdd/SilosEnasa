<?php

namespace App\Http\Controllers\Admin;

use App\Models\Almacen;
use App\Models\Requisicion;
use Illuminate\Http\Request;
use App\Models\Detallerequisicion;
use App\Models\Tipodocumento;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequisicionFormRequest;
use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\Producto;
use App\Models\Tipomovimiento;
use App\Models\Log\LogSistema;
use App\Models\Solicitud;
use Barryvdh\DomPDF\Facade as PDF;


class RequisicionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.requisicions.index')->only('index');
        $this->middleware('can:admin.requisicions.create')->only('create', 'store');
        $this->middleware('can:admin.requisicions.estaturequisicions')->only('estaturequisicions');
    }

    public function exportPdf(Request $request)
    {

        if ($request) {
            $sql = $request->get('desde');
            $sql1 = $request->get('hasta');
            $user = $request->get('user_id');
            $estatus = $request->get('estatus');
            $empleados = $request->get('empleados_id');

            $requisiciones = Requisicion::whereBetween('created_at', [$sql, $sql1])
                ->estatus($estatus)
                ->user($user)
                ->empleados($empleados)
                ->get();
            $users = User::all();
            // $detalles = Detalleingreso::join('productos', 'detalle_solicituds.producto_id', '=', 'productos.id')
            // ->select(
            //     'productos.nombre as producto',
            //     'detalle_solicituds.cantidad',
            //     'detalle_solicituds.observacionp',
            //     'detalle_solicituds.created_at',
            //     'detalle_solicituds.updated_at',
            // )->orderBy('detalle_solicituds.id', 'desc')->get();

            $today = Carbon::now()->format('d/m/Y');
            $pdf = PDF::loadView('admin.pdf.requisiciones', compact('requisiciones', 'today', 'users'))->setPaper('a4', 'landscape');
            return $pdf->stream('listado-requisiciones.pdf');
        }
    }

    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los requisicions a las: ' . date('H:m:i') . ' del d??a: ' . date('d/m/Y');
        $log->save();

        return view('admin.requisicions.index');
    }

    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un requisicion nuevo a las: ' . date('H:m:i') . ' del d??a: ' . date('d/m/Y');
        $log->save();

        $requisicions     = Requisicion::all();
        $users      = DB::table('users')->where('estatus', 1)->pluck('name', 'id');
        $almacens   = DB::table('almacens')->where('estatus', 1)->pluck('nombre', 'id');
        $productos  = Producto::where('estatus', 1)->get()->pluck('display_product', 'id');
        $departamentos  = Departamento::where('estatus', 1)->get()->pluck('display_departamento', 'id');
        $tipodocumentos  = Tipodocumento::where('estatus', 1)->get()->pluck('abreviado', 'id');
        $tipomovimientos = Tipomovimiento::pluck('descripcion', 'id');
        $empleados  = Empleado::where('estatus', 1)->get()->pluck('display_empleado', 'id');

        $clacificaciones  = DB::table('clacificacions')->where('estatus', 1)->pluck('abreviado', 'id');


        $solicituds = Solicitud::join('departamentos', 'solicituds.departamento_id', 'departamentos.id')
            ->join('users', 'solicituds.user_id', 'users.id')
            ->select('solicituds.id', 'departamentos.nombre as departamento', 'users.name as nombre', 'users.last_name as apellido', 'users.cedula as cedula')
            ->where('solicituds.estatus', '=', '1')
            ->groupBy('solicituds.id', 'departamento')
            ->get();


        return view('admin.requisicions.create', compact('empleados', 'solicituds', 'requisicions', 'departamentos', 'users', 'almacens', 'productos', 'clacificaciones', 'tipodocumentos', 'tipomovimientos'));
    }

    public function store(Request $request)
    {
        //return dd($request);
        //return $request;
        // $request->validate([
        //     'empleado_id' => 'required|not_in:0',
        // ]);

        try {
            DB::beginTransaction();

            $requisicion = new Requisicion();
            if ($request->get('solicitud_id')) {
                $requisicion->solicitud_id = $request->get('solicitud_id');
            }
            $requisicion->empleado_id = $request->get('empleado_id');
            $requisicion->departamento_id = $request->get('departamento_id');
            $requisicion->correlativo = $request->get('correlativo');
            $requisicion->observacion = $request->get('observacion');
            $requisicion->user_id = auth()->user()->id;
            $requisicion->save();

            $solicitud_id = $request->get('solicitud_id');

            if ($solicitud_id) {
                $s = Solicitud::find($solicitud_id);
                $s->estatus = '3';
                $s->save();
            }

            $producto_id = $request->get('producto_id');
            $cantidad = $request->get('cantidad');
            $observacionp = $request->get('observacionp');

            $cont = 0;

            while ($cont < count($producto_id)) {
                $detalle = new Detallerequisicion();
                $detalle->requisicion_id = $requisicion->id;
                $detalle->producto_id = $producto_id[$cont];
                $detalle->cantidad = $cantidad[$cont];
                $detalle->observacionp = $observacionp[$cont];

                $detalle->save();

                $cont = $cont + 1;
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }


        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado el requisicion a las: ' . date('H:m:i') . ' del d??a: ' . date('d/m/Y');
        $log->save();


        return redirect()->route('admin.requisicions.index')->with('success', 'Guardado con exito');
    }

    public function show($id)
    {
        $empresa = DB::table('empresas as e')
            ->select('e.id', 'e.nombre', 'e.rif', 'e.descipcion', 'e.direccion');
        $requisicion = Requisicion::find($id);

        $detalles = Detallerequisicion::join('productos', 'detalle_requisicion.producto_id', '=', 'productos.id')
            ->select(
                'productos.nombre as producto',
                'detalle_requisicion.cantidad',
                'detalle_requisicion.observacionp',
                'detalle_requisicion.created_at',
                'detalle_requisicion.updated_at'
            )
            ->where('detalle_requisicion.requisicion_id', '=', $id)
            ->orderBy('detalle_requisicion.id', 'desc')->get();
        return view('admin.requisicions.show', compact('requisicion', 'detalles'));
    }

    public function edit(Requisicion $requisicion)
    {
        //
    }

    public function update(Request $request, Requisicion $requisicion)
    {
    }

    public function destroy($id)
    {
        $requisicion = Requisicion::findOrFail($id);
        $requisicion->delete();
        return view('admin.requisicions.index');
    }

    public function estaturequisicion(Requisicion $requisicion)
    {
        if ($requisicion->estatus == "1") {

            $log = new LogSistema();
            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al requisicion: ' . $requisicion->nombre . ' a las: ' . date('H:m:i') . ' del d??a: ' . date('d/m/Y');
            $log->save();

            $requisicion->estatus = '0';
            $requisicion->save();

            return redirect()->route('admin.requisicions.index')->with('success', 'El documento se anul?? con ??xito!');
        }
    }

    public function pdf(Request $request, $id)
    {


        $requisicion = Requisicion::find($id);

        $detalles = Detallerequisicion::join('productos', 'detalle_requisicion.producto_id', '=', 'productos.id')
            ->select(
                'productos.nombre as producto',
                'detalle_requisicion.cantidad',
                'detalle_requisicion.observacionp',
                'detalle_requisicion.created_at',
                'detalle_requisicion.updated_at'
            )
            ->where('detalle_requisicion.requisicion_id', '=', $id)
            ->orderBy('detalle_requisicion.id', 'desc')->get();

        $numrequisicion = Requisicion::select('id')->where('id', $id)->get();

        $pdf = PDF::loadView('admin/pdf/requisicion', ['requisicion' => $requisicion, 'detalles' => $detalles]);
        return $pdf->stream('admin/requisicion-' . $numrequisicion[0]->id . '.pdf');
        //return $pdf->download('egreso.pdf');
    }
}
