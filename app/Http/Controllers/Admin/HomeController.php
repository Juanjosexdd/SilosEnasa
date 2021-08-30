<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $solicituds = Solicitud::all()->where('estatus','=', 1);

        return view('admin.index',compact('solicituds'));
    }
}
