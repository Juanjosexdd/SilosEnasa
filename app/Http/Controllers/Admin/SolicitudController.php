<?php

namespace App\Http\Controllers\Admin;

use App\Models\Almacen;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Models\Detallesolicitud;
use App\Models\Tipodocumento;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

use App\Http\Controllers\Controller;
use App\Http\Requests\SolicitudFormRequest;
use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\Producto;
use App\Models\Tipomovimiento;
use App\Models\Log\LogSistema;
use Barryvdh\DomPDF\Facade as PDF;

class SolicitudController extends Controller
{
    public function exportPdf(Request $request){

        if($request){
            $sql=$request->get('desde');
            $sql1=$request->get('hasta');
            $user=$request->get('user_id');
            $estatus=$request->get('estatus');
            $departamento=$request->get('departamento_id');

            $solicitudes=Solicitud::whereBetween('created_at',[$sql, $sql1])
                                  ->departamento($departamento)
                                  ->estatus($estatus)
                                  ->user($user)
                                  ->get();
            $users = User::all();
            $detalles = Detallesolicitud::join('productos', 'detalle_solicituds.producto_id', '=', 'productos.id')
            ->select(
                'productos.nombre as producto',
                'detalle_solicituds.cantidad',
                'detalle_solicituds.observacionp',
                'detalle_solicituds.created_at',
                'detalle_solicituds.updated_at',
            )->orderBy('detalle_solicituds.id', 'desc')->get();
            
            $today = Carbon::now()->format('d/m/Y');
            $pdf = PDF::loadView('admin.pdf.solicitudes', compact('solicitudes','today','users'))->setPaper('a4', 'landscape');
            return $pdf->stream('listado-solicitudes.pdf');
        }
    }
    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los solicituds a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.solicituds.index');
    }

    public function create()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a crear un solicitud nuevo a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $solicituds     = Solicitud::all();
        $users      = DB::table('users')->where('estatus', 1)->pluck('name', 'id');
        $almacens   = DB::table('almacens')->where('estatus', 1)->pluck('nombre', 'id');
        $productos  = Producto::where('estatus', 1)->get()->pluck('display_product', 'id');
        $departamentos  = Departamento::where('estatus', 1)->get()->pluck('display_departamento', 'id');
        $tipodocumentos  = Tipodocumento::where('estatus', 1)->get()->pluck('abreviado', 'id');
        $tipomovimientos = Tipomovimiento::pluck('descripcion', 'id');

        $clacificaciones  = DB::table('clacificacions')->where('estatus', 1)->pluck('abreviado', 'id');


        return view('admin.solicituds.create', compact('solicituds', 'departamentos', 'users', 'almacens', 'productos', 'clacificaciones', 'tipodocumentos', 'tipomovimientos'));
    }

    public function store(Request $request)
    {
        //return dd($request);
        //return $request;

        try {
            DB::beginTransaction();

            $solicitud = new Solicitud();

            $solicitud->departamento_id = auth()->user()->departamento->id;
            $solicitud->observacion = $request->get('observacion');
            $solicitud->user_id = auth()->user()->id;
            $solicitud->save();

            $producto_id = $request->get('producto_id');
            $cantidad = $request->get('cantidad');
            $observacionp = $request->get('observacionp');

            $cont = 0;

            while ($cont < count($producto_id)) {
                $detalle = new Detallesolicitud();
                $detalle->solicitud_id = $solicitud->id;
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha registrado el solicitud a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();


        return redirect()->route('admin.solicituds.index')->with('success', 'Guardado con exito');
    }

    public function show($id)
    {

        $empresa = DB::table('empresas as e')
            ->select('e.id', 'e.nombre', 'e.rif', 'e.descipcion', 'e.direccion');

        $solicitud = Solicitud::find($id);
        $this->authorize('author', $solicitud);

        $detalles = Detallesolicitud::join('productos', 'detalle_solicituds.producto_id', '=', 'productos.id')
            ->select(
                'productos.nombre as producto',
                'detalle_solicituds.cantidad',
                'detalle_solicituds.observacionp',
                'detalle_solicituds.created_at',
                'detalle_solicituds.updated_at',
            )
            ->where('detalle_solicituds.solicitud_id', '=', $id)
            ->orderBy('detalle_solicituds.id', 'desc')->get();
        return view('admin.solicituds.show', compact('solicitud', 'detalles'));
    }

    public function edit(Solicitud $solicitud)
    {
        $this->authorize('author', $solicitud);
    }

    public function update(Request $request, Solicitud $solicitud)
    {
    }

    public function destroy($id)
    {

        $solicitud = Solicitud::findOrFail($id);
        $solicitud->estatus = 2;
        $solicitud->update();
        return view('admin.solicituds.index');
    }

    public function estatusolicitud(Solicitud $solicitud)
    {
        if ($solicitud->estatus == "1") {

            $log = new LogSistema();
            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha inactivado al solicitud: ' . $solicitud->nombre . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $solicitud->estatus = '0';
            $solicitud->save();

            return redirect()->route('admin.solicituds.index')->with('success', 'El documento se anuló con éxito!');
        }
    }
    public function pdf(Request $request, $id)
    {


        $solicitud = Solicitud::find($id);
        $this->authorize('author', $solicitud);

        $detalles = Detallesolicitud::join('productos', 'detalle_solicituds.producto_id', '=', 'productos.id')
            ->select(
                'productos.nombre as producto',
                'detalle_solicituds.cantidad',
                'detalle_solicituds.observacionp',
                'detalle_solicituds.created_at',
                'detalle_solicituds.updated_at',
            )
            ->where('detalle_solicituds.solicitud_id', '=', $id)
            ->orderBy('detalle_solicituds.id', 'desc')->get();

        $numsolicitud = Solicitud::select('id')->where('id', $id)->get();

        $pdf = PDF::loadView('admin/pdf/solicitud', ['solicitud' => $solicitud, 'detalles' => $detalles]);
        return $pdf->stream('admin/solicitud-' . $numsolicitud[0]->id . '.pdf');
        //return $pdf->download('egreso.pdf');
    }
}
