<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\Ingreso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {

        // $users = DB::table('users')->where('estatus', 1)->pluck('name', 'id');
        $users  = User::where('estatus', 1)->get()->pluck('display_user','id');
        $empleados  = Empleado::where('estatus', 1)->get()->pluck('display_empleado','id');
        $departamentos  = Departamento::where('estatus', 1)->get()->pluck('display_departamento','id');
        $ingresos  = Ingreso::where('estatus', 1)->get()->pluck('correlativo','correlativo');
        

    	return view('admin.report.index', compact('users','empleados','departamentos','ingresos'));
    }

    public function reportinventario()
    {

        // $users = DB::table('users')->where('estatus', 1)->pluck('name', 'id');
        $users  = User::where('estatus', 1)->get()->pluck('display_user','id');
        $empleados  = Empleado::where('estatus', 1)->get()->pluck('display_empleado','id');

    	return view('admin.report.reportinventario', compact('users','empleados'));
    }
}
