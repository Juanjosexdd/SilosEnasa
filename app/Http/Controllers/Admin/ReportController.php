<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biennacional;
use App\Models\Cargo;
use App\Models\Clacificacion;
use App\Models\Departamento;
use App\Models\Egreso;
use App\Models\Empleado;
use App\Models\Ingreso;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.report.index')->only('index');
        
    }
    public function index()
    {

        // $users = DB::table('users')->where('estatus', 1)->pluck('name', 'id');
        $users  = User::where('estatus', 1)->get()->pluck('display_user','id');
        $empleados  = Empleado::where('estatus', 1)->get()->pluck('display_empleado','id');
        $departamentos  = Departamento::where('estatus', 1)->get()->pluck('display_departamento','id');
        $cargos  = Cargo::where('estatus', 1)->get()->pluck('nombre' , 'id');
        $ingresos  = Ingreso::where('estatus', 1)->get()->pluck('correlativo','correlativo');
        $egresos  = Egreso::where('estatus', 1)->get()->pluck('correlativo','correlativo');
        $bienes  = Biennacional::where('estatus', 1)->get()->pluck('codigo','codigo');
        $ubicacions  = Producto::where('estatus', 1)->get()->pluck('ubicacion','ubicacion');
        $clacificaciones  = Clacificacion::where('estatus', 1)->get()->pluck('display_clacificacion','id');
        $biennacionals  = Biennacional::where('estatus', 2)->get()->pluck('display_bienes','id');
        

    	return view('admin.report.index', compact('users','empleados','departamentos','ingresos','egresos','clacificaciones','ubicacions','cargos','bienes','biennacionals'));
    }

    public function reportinventario()
    {

        // $users = DB::table('users')->where('estatus', 1)->pluck('name', 'id');
        $users  = User::where('estatus', 1)->get()->pluck('display_user','id');
        $empleados  = Empleado::where('estatus', 1)->get()->pluck('display_empleado','id');

    	return view('admin.report.reportinventario', compact('users','empleados'));
    }
}
