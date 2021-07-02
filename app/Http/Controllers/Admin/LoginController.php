<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Log\LogSistema;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.logins.index')->only('index');
    }
    
    public function index()
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha ingresado a ver los registros de sesión a las: '
            . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();
        return view('admin.logins.index');
    }
}
