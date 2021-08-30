<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Tipodocumento;
use Spatie\Permission\Models\Role;
use App\Models\Log\LogSistema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.create')->only('create', 'store');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
        $this->middleware('can:admin.users.destroy')->only('destroy');
        $this->middleware('can:admin.users.UpdateStatus')->only('UpdateStatus');
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
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha ingresado a ver los usuarios a las: '
            . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $users = User::where('estatus' == 1);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $usuarios)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha ingresado a crear un usuario a las: '
            . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $tipodocumentos  = DB::table('tipodocumentos')->where('estatus', 1)->pluck('abreviado' , 'id');
        $cargos  = DB::table('cargos')->where('estatus', 1)->pluck('nombre' , 'id');
        $departamentos  = DB::table('departamentos')->where('estatus', 1)->pluck('nombre' , 'id');

        $roles = Role::all();

        return view('admin.users.create', compact('usuarios', 'departamentos', 'tipodocumentos', 'cargos', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //return $request;
        $user = User::create($request->all());
        if ($request->roles) {
            $user->roles()->sync($request->get('roles', 'user'));
        }
        if ($request->tipodocumentos) {
            $user->tipodocumento()->attach($request->tipodocumentos);
        }

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha registrado en el sistema al usuario: ' . $request->name . ' ' . $request->last_name . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();


        return redirect()->route('admin.users.index')->with('success', 'El usuario se registro con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha ingresado a editar un usuario a las: '
            . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $tipodocumentos  = DB::table('tipodocumentos')->where('estatus', 1)->pluck('abreviado' , 'id');
        $cargos  = DB::table('cargos')->where('estatus', 1)->pluck('nombre' , 'id');
        $departamentos  = DB::table('departamentos')->where('estatus', 1)->pluck('nombre' , 'id');
        $roles = Role::all();


        return view('admin.users.edit', compact('departamentos', 'tipodocumentos', 'cargos', 'roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha actualizado los datos del usuario: ' . $request->name . ' ' . $request->last_name . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        if ( !empty($request->input('password')) ) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'El usuario se actualizó con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha cambiado el estatus del usuario: ' . $request->name . ' ' . $request->last_name . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'El usuario se eliminó con éxito!');
    }

    public function show(User $user)
    {
        $log = new LogSistema();

        $log->user_id = auth()->user()->id;
        $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha ingresado a ver la ficha del usuario: ' . $user->name . ' ' . $user->last_name . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
        $log->save();

        $departamentos = Departamento::pluck('nombre', 'id');
        $tipodocumentos = Tipodocumento::pluck('abreviado', 'id');
        $cargos = Cargo::pluck('nombre', 'id');
        $roles = Role::all();
        

        $ingresoNotifications = auth()->user()->unreadNotifications;

        return view('admin.users.show', compact('departamentos', 'tipodocumentos','ingresoNotifications', 'cargos', 'roles', 'user'));
    }


    public function UpdateStatus(Request $request, User $user)
    {


        if ($user->estatus == "1") {
            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha inactivado al usuario: ' . $user->name . ' ' . $user->last_name . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();
            $user->estatus = '0';
            $user->save();
            return redirect()->route('admin.users.index')->with('success', 'El usuario está inactivo con éxito!');
        } else {
            $log = new LogSistema();

            $log->user_id = auth()->user()->id;
            $log->tx_descripcion = 'El usuario: ' . auth()->user()->name . ' Ha activado al usuario: ' . $user->name . ' ' . $user->last_name . ' a las: ' . date('H:m:i') . ' del día: ' . date('d/m/Y');
            $log->save();

            $user->estatus = '1';
            $user->save();
            return redirect()->route('admin.users.index')->with('success', 'El usuario se activó con éxito!');
        }
    }
}
