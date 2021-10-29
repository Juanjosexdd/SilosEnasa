<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TipodocumentoController;
use App\Http\Controllers\Admin\CargoController;
use App\Http\Controllers\Admin\DepartamentoController;
use App\Http\Controllers\Admin\EstadoController;
use App\Http\Controllers\Admin\CiudadController;
use App\Http\Controllers\Admin\EmpleadoController;
use App\Http\Controllers\Admin\AlmacenController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\ClacificacionController;
use App\Http\Controllers\Admin\EgresoController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\ProveedorController;
use App\Http\Controllers\Admin\IngresoController;
use App\Http\Controllers\Admin\RequisicionController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogsistemaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SolicitudController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('tipodocumentos', TipodocumentoController::class)->names('admin.tipodocumentos');
Route::resource('cargos', CargoController::class)->names('admin.cargos');
Route::resource('departamentos', DepartamentoController::class)->names('admin.departamentos');
Route::resource('estados', EstadoController::class)->names('admin.estados');
Route::resource('ciudads', CiudadController::class)->names('admin.ciudads');
Route::resource('empleados', EmpleadoController::class)->names('admin.empleados');
Route::resource('empresas', EmpresaController::class)->names('admin.empresas');
Route::resource('almacens', AlmacenController::class)->names('admin.almacens');
Route::resource('clacificacions', ClacificacionController::class)->names('admin.clacificacions');
Route::resource('productos', ProductoController::class)->names('admin.productos');
Route::resource('proveedors', ProveedorController::class)->names('admin.proveedors');
Route::resource('ingresos', IngresoController::class)->names('admin.ingresos');
Route::resource('requisicions', RequisicionController::class)->names('admin.requisicions');
Route::resource('solicituds', SolicitudController::class)->names('admin.solicituds');
Route::resource('egresos', EgresoController::class)->names('admin.egresos');
Route::resource('logs', LogsistemaController::class)->names('admin.logs');
Route::resource('logins', LoginController::class)->names('admin.logins');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('respaldos', BackupController::class)->names('admin.respaldos');
Route::view('backup', 'laravel_backup_panel::layout');

Route::get('markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');

Route::post('/mark-as-read',[IngresoController::class, 'markNotification'])->name('markNotification');

Route::resource('storeproductoingreso',   'ProductoController@storeproductoingreso');


Route::get('UpdateStatus/{user}', [UserController::class, 'UpdateStatus'])->name('admin.users.UpdateStatus');
Route::get('estatuestado/{estado}', [EstadoController::class, 'estatuestado'])->name('admin.estados.estatuestado');
Route::get('estatuproveedor/{proveedor}', [ProveedorController::class, 'estatuproveedor'])->name('admin.proveedors.estatuproveedor');
Route::get('estatuempleado/{empleado}', [EmpleadoController::class, 'estatuempleado'])->name('admin.empleados.estatuempleado');
Route::get('estatuciudad/{ciudad}', [CiudadController::class, 'estatuciudad'])->name('admin.ciudads.estatuciudad');
Route::get('estatucargo/{cargo}', [CargoController::class, 'estatucargo'])->name('admin.cargos.estatucargo');
Route::get('estatudepartamento/{departamento}', [DepartamentoController::class, 'estatudepartamento'])->name('admin.departamentos.estatudepartamento');
Route::get('estatuclacificacion/{clacificacion}', [ClacificacionController::class, 'estatuclacificacion'])->name('admin.clacificacions.estatuclacificacion');
Route::get('estatutipodocumento/{tipodocumento}', [TipodocumentoController::class, 'estatutipodocumento'])->name('admin.tipodocumentos.estatutipodocumento');
Route::get('estatuempleado/{empleado}', [EmpleadoController::class, 'estatuempleado'])->name('admin.empleados.estatuempleado');
Route::get('estatualmacen/{almacen}', [AlmacenController::class, 'estatualmacen'])->name('admin.almacens.estatualmacen');
Route::get('estatuproducto/{producto}', [ProductoController::class, 'estatuproducto'])->name('admin.productos.estatuproducto');
Route::get('estatuingreso/{ingreso}', [IngresoController::class, 'estatuingreso'])->name('admin.ingresos.estatuingreso');
Route::get('estatuegreso/{egreso}', [EgresoController::class, 'estatuegreso'])->name('admin.egresos.estatuegreso');
Route::get('estaturequisicion/{requisicion}', [RequisicionController::class, 'estaturequisicion'])->name('admin.requisicions.estaturequisicion');
Route::get('estatusolicitud/{solicitud}', [SolicitudController::class, 'estatusolicitud'])->name('admin.solicituds.estatusolicitud');

//PDFS

Route::get('pdfIngreso/{ingreso}', [IngresoController::class, 'pdf'])->name('admin.pdfIngreso');
Route::get('pdfEgreso/{ingreso}', [EgresoController::class, 'pdf'])->name('admin.pdfEgreso');
