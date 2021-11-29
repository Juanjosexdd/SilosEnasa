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
use App\Http\Controllers\Admin\AsignacionbienController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\admin\BiennacionalController;
use App\Http\Controllers\Admin\ClacificacionbienesController;
use App\Http\Controllers\Admin\ClacificacionController;
use App\Http\Controllers\Admin\EgresoController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\ProveedorController;
use App\Http\Controllers\Admin\IngresoController;
use App\Http\Controllers\Admin\RequisicionController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogsistemaController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SolicitudController;
use App\Http\Controllers\Admin\SolicitudesController;
use App\Models\Asignacionbien;
use App\Models\Biennacional;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('tipodocumentos', TipodocumentoController::class)->names('admin.tipodocumentos');
Route::resource('cargos', CargoController::class)->names('admin.cargos');
Route::resource('biennacionals', BiennacionalController::class)->names('admin.biennacionals');
Route::resource('departamentos', DepartamentoController::class)->names('admin.departamentos');
Route::resource('estados', EstadoController::class)->names('admin.estados');
Route::resource('ciudads', CiudadController::class)->names('admin.ciudads');
Route::resource('empleados', EmpleadoController::class)->names('admin.empleados');
Route::resource('empresas', EmpresaController::class)->names('admin.empresas');
Route::resource('almacens', AlmacenController::class)->names('admin.almacens');
Route::resource('clacificacions', ClacificacionController::class)->names('admin.clacificacions');
Route::resource('clacificacionbienes', ClacificacionbienesController::class)->names('admin.clacificacionbienes');
Route::resource('productos', ProductoController::class)->names('admin.productos');
Route::resource('proveedors', ProveedorController::class)->names('admin.proveedors');
Route::resource('ingresos', IngresoController::class)->names('admin.ingresos');
Route::resource('requisicions', RequisicionController::class)->names('admin.requisicions');
Route::resource('solicituds', SolicitudController::class)->names('admin.solicituds');
Route::resource('solicitudes', SolicitudesController::class)->names('admin.solicitudes');
Route::resource('egresos', EgresoController::class)->names('admin.egresos');
Route::resource('logs', LogsistemaController::class)->names('admin.logs');
Route::resource('logins', LoginController::class)->names('admin.logins');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('asignacions', AsignacionbienController::class)->names('admin.asignacions');
Route::resource('respaldos', BackupController::class)->names('admin.respaldos');
Route::resource('report', ReportController::class)->names('admin.report');
Route::resource('reportinventario', ReportController::class)->names('admin.reportinventario');


Route::view('backup', 'laravel_backup_panel::layout');

Route::get('markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');

Route::post('/mark-as-read',[SolicitudController::class, 'markNotification'])->name('markNotification');

Route::resource('storeproductoingreso',   'ProductoController@storeproductoingreso');

//CONTROL DE ESTATUS
Route::get('UpdateStatus/{user}', [UserController::class, 'UpdateStatus'])->name('admin.users.UpdateStatus');
Route::get('estatuestado/{estado}', [EstadoController::class, 'estatuestado'])->name('admin.estados.estatuestado');
Route::get('estatuproveedor/{proveedor}', [ProveedorController::class, 'estatuproveedor'])->name('admin.proveedors.estatuproveedor');
Route::get('estatuempleado/{empleado}', [EmpleadoController::class, 'estatuempleado'])->name('admin.empleados.estatuempleado');
Route::get('estatuciudad/{ciudad}', [CiudadController::class, 'estatuciudad'])->name('admin.ciudads.estatuciudad');
Route::get('estatucargo/{cargo}', [CargoController::class, 'estatucargo'])->name('admin.cargos.estatucargo');
Route::get('estatubiennacional/{biennacional}', [BiennacionalController::class, 'estatubiennacional'])->name('admin.biennacionals.estatubiennacional');
Route::get('desincorporar/{biennacional}', [BiennacionalController::class, 'desincorporar'])->name('admin.biennacionals.desincorporar');
Route::get('estatudepartamento/{departamento}', [DepartamentoController::class, 'estatudepartamento'])->name('admin.departamentos.estatudepartamento');
Route::get('estatuclacificacion/{clacificacion}', [ClacificacionController::class, 'estatuclacificacion'])->name('admin.clacificacions.estatuclacificacion');
Route::get('estatuclacificacionbien/{clacificacionbien}', [ClacificacionbienesController::class, 'estatuclacificacionbien'])->name('admin.clacificacionbienes.estatuclacificacionbien');
Route::get('estatutipodocumento/{tipodocumento}', [TipodocumentoController::class, 'estatutipodocumento'])->name('admin.tipodocumentos.estatutipodocumento');
Route::get('estatuempleado/{empleado}', [EmpleadoController::class, 'estatuempleado'])->name('admin.empleados.estatuempleado');
Route::get('estatualmacen/{almacen}', [AlmacenController::class, 'estatualmacen'])->name('admin.almacens.estatualmacen');
Route::get('estatuproducto/{producto}', [ProductoController::class, 'estatuproducto'])->name('admin.productos.estatuproducto');
Route::get('estatuingreso/{ingreso}', [IngresoController::class, 'estatuingreso'])->name('admin.ingresos.estatuingreso');
Route::get('estatuegreso/{egreso}', [EgresoController::class, 'estatuegreso'])->name('admin.egresos.estatuegreso');
Route::get('estaturequisicion/{requisicion}', [RequisicionController::class, 'estaturequisicion'])->name('admin.requisicions.estaturequisicion');
Route::get('estatusolicitud/{solicitud}', [SolicitudController::class, 'estatusolicitud'])->name('admin.solicituds.estatusolicitud');
Route::get('estatusolicitudes/{solicitudes}', [SolicitudesController::class, 'estatusolicitudes'])->name('admin.solicitudes.estatusolicitudes');
Route::get('estatuasignacion/{asignacionbien}', [AsignacionbienController::class, 'estatuasignacion'])->name('admin.asignacions.estatuasignacion');
Route::get('movilizarbien/{asignacionbien}', [AsignacionbienController::class, 'movilizarbien'])->name('admin.asignacions.movilizarbien');
Route::get('movilizarbien/{asignacionbien}', [AsignacionbienController::class, 'movilizarbien'])->name('admin.asignacions.movilizarbien');

//PDFS

Route::get('pdfIngreso/{ingreso}', [IngresoController::class, 'pdf'])->name('admin.pdfIngreso');
Route::get('pdfEgreso/{egreso}', [EgresoController::class, 'pdf'])->name('admin.pdfEgreso');
Route::get('pdfRequisicion/{requisicion}', [RequisicionController::class, 'pdf'])->name('admin.pdfRequisicion');
Route::get('pdfSolicitud/{solicitud}', [SolicitudController::class, 'pdf'])->name('admin.pdfSolicitud');
Route::get('pdfAsignacionbien/{asignacionbien}', [AsignacionbienController::class, 'pdf'])->name('admin.pdfAsignacionbien');


Route::get('solicitudes-list-pdf',[SolicitudController::class, 'exportPdf'])->name('admin.solicitudes.pdf');
Route::get('ingresos-list-pdf',[IngresoController::class, 'exportPdf'])->name('admin.ingresos.pdf');
Route::get('egresos-list-pdf',[EgresoController::class, 'exportPdf'])->name('admin.egresos.pdf');
Route::get('requisiciones-list-pdf',[RequisicionController::class, 'exportPdf'])->name('admin.requisiciones.pdf');
Route::get('inventarios-list-pdf',[ProductoController::class, 'exportPdf'])->name('admin.inventarios.pdf');
Route::get('trabajadors-list-pdf',[EmpleadoController::class, 'exportPdf'])->name('admin.trabajadors.pdf');
Route::get('biennacionals-list-pdf',[BiennacionalController::class, 'exportPdf'])->name('admin.biennacionals.pdf');
Route::get('asignacions-list-pdf',[ AsignacionbienController::class , 'exportPdf'])->name('admin.asignacions.pdf');


//CONTROL DE REPORTES




