<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetalleSolicitud;
use App\Models\Log\LogSistema;
use App\Models\Solicitud;
use App\Models\Solicitudes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudesController extends Controller
{
    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->username . ' Ha ingresado a ver el listado de los solicituds a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        return view('admin.solicitudes.index');
    }

    public function show($id)
    {

        $empresa = DB::table('empresas as e')
            ->select('e.id', 'e.nombre', 'e.rif', 'e.descipcion', 'e.direccion');

        $solicitud = Solicitudes::find($id);

        $detalles = DetalleSolicitud::join('productos', 'detalle_solicituds.producto_id', '=', 'productos.id')
            ->select(
                'productos.nombre as producto',
                'detalle_solicituds.cantidad',
                'detalle_solicituds.observacionp',
                'detalle_solicituds.created_at',
                'detalle_solicituds.updated_at',
            )
            ->where('detalle_solicituds.solicitud_id', '=', $id)
            ->orderBy('detalle_solicituds.id', 'desc')->get();
        return view('admin.solicitudes.show', compact('solicitud', 'detalles'));
    }


    public function destroy( $id)
    {
        $solicitud = Solicitudes::findOrFail($id);
        $solicitud->delete();

        return redirect()->route('admin.solicitudes.index')->with('success', 'La solicitud se eliminó con exito!');
    }
}
