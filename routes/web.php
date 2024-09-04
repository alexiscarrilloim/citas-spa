<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('index'); #La ruta en que del archivo index
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para el admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index') ->middleware('auth');

//rutas para el admin = configuraciones
Route::get('/admin/configuraciones', [App\Http\Controllers\ConfiguracioneController::class, 'index'])->name('admin.configuraciones.index') ->middleware('auth','can:admin.configuraciones.index');
Route::post('/admin/configuraciones/create', [App\Http\Controllers\ConfiguracioneController::class, 'store'])->name('admin.configuraciones.create') ->middleware('auth','can:admin.configuraciones.create');
Route::get('/admin/configuraciones/{id}', [App\Http\Controllers\ConfiguracioneController::class, 'show'])->name('admin.configuraciones.show') ->middleware('auth','can:admin.configuraciones.show');
Route::get('/admin/configuraciones/{id}/edit', [App\Http\Controllers\ConfiguracioneController::class, 'edit'])->name('admin.configuraciones.edit') ->middleware('auth','can:admin.configuraciones.edit');
Route::put('/admin/configuraciones/{id}', [App\Http\Controllers\ConfiguracioneController::class, 'update'])->name('admin.configuraciones.update') ->middleware('auth','can:admin.configuraciones.update');
Route::get('/admin/configuraciones/{id}/confirm-delete', [App\Http\Controllers\ConfiguracioneController::class, 'confirmDelete'])->name('admin.configuraciones.confirm-delete')->middleware('auth','can:admin.configuraciones.confirm-delete');
Route::delete('/admin/configuraciones/destroy/{id}', [App\Http\Controllers\ConfiguracioneController::class, 'destroy'])->name('admin.configuraciones.destroy') ->middleware('auth','can:admin.configuraciones.destroy');

//rutas para el admin = usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index') ->middleware('auth','can:admin.usuarios.index');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create') ->middleware('auth','can:admin.usuarios.create');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store') ->middleware('auth','can:admin.usuarios.store');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show') ->middleware('auth','can:admin.usuarios.show');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit') ->middleware('auth','can:admin.usuarios.edit');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update') ->middleware('auth','can:admin.usuarios.update');
Route::get('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])->name('admin.usuarios.confirm-delete')->middleware('auth','can:admin.usuarios.confirm-delete');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy') ->middleware('auth','can:admin.usuarios.destroy');

//Rutas para el admin = secretarias
Route::get('/admin/secretarias', [App\Http\Controllers\SecretariaController::class, 'index'])->name('admin.secretarias.index') ->middleware('auth','can:admin.secretarias.index');
Route::get('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'create'])->name('admin.secretarias.create') ->middleware('auth','can:admin.secretarias.create');
Route::post('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'store'])->name('admin.secretarias.store') ->middleware('auth','can:admin.secretarias.store');
Route::get('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'show'])->name('admin.secretarias.show') ->middleware('auth','can:admin.secretarias.show');
Route::get('/admin/secretarias/{id}/edit', [App\Http\Controllers\SecretariaController::class, 'edit'])->name('admin.secretarias.edit') ->middleware('auth','can:admin.secretarias.edit');
Route::put('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'update'])->name('admin.secretarias.update') ->middleware('auth','can:admin.secretarias.update');
Route::get('/admin/secretarias/{id}/confirm-delete', [App\Http\Controllers\SecretariaController::class, 'confirmDelete'])->name('admin.secretarias.confirm-delete')->middleware('auth','can:admin.secretarias.confirm-delete');
Route::delete('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'destroy'])->name('admin.secretarias.destroy') ->middleware('auth','can:admin.secretarias.destroy');

//Rutas para el admin = clientes
Route::get('/admin/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('admin.clientes.index') ->middleware('auth','can:admin.clientes.index');
Route::get('/admin/clientes/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('admin.clientes.create') ->middleware('auth','can:admin.clientes.create');
Route::post('/admin/clientes/create', [App\Http\Controllers\ClienteController::class, 'store'])->name('admin.clientes.store') ->middleware('auth','can:admin.clientes.store');
Route::get('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'show'])->name('admin.clientes.show') ->middleware('auth','can:admin.clientes.show');
Route::get('/admin/clientes/{id}/edit', [App\Http\Controllers\ClienteController::class, 'edit'])->name('admin.clientes.edit') ->middleware('auth','can:admin.clientes.edit');
Route::put('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'update'])->name('admin.clientes.update') ->middleware('auth','can:admin.clientes.update');
Route::get('/admin/clientes/{id}/confirm-delete', [App\Http\Controllers\ClienteController::class, 'confirmDelete'])->name('admin.clientes.confirm-delete')->middleware('auth','can:admin.clientes.confirm-delete');
Route::delete('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('admin.clientes.destroy') ->middleware('auth','can:admin.clientes.destroy');

//Rutas para el admin = sucursales
Route::get('/admin/sucursales', [App\Http\Controllers\SucursalController::class, 'index'])->name('admin.sucursales.index') ->middleware('auth','can:admin.sucursales.index');
Route::get('/admin/sucursales/create', [App\Http\Controllers\SucursalController::class, 'create'])->name('admin.sucursales.create') ->middleware('auth','can:admin.sucursales.create');
Route::post('/admin/sucursales/create', [App\Http\Controllers\SucursalController::class, 'store'])->name('admin.sucursales.store') ->middleware('auth','can:admin.sucursales.store');
Route::get('/admin/sucursales/{id}', [App\Http\Controllers\SucursalController::class, 'show'])->name('admin.sucursales.show') ->middleware('auth','can:admin.sucursales.show');
Route::get('/admin/sucursales/{id}/edit', [App\Http\Controllers\SucursalController::class, 'edit'])->name('admin.sucursales.edit') ->middleware('auth','can:admin.sucursales.edit');
Route::put('/admin/sucursales/{id}', [App\Http\Controllers\SucursalController::class, 'update'])->name('admin.sucursales.update') ->middleware('auth','can:admin.sucursales.update');
Route::get('/admin/sucursales/{id}/confirm-delete', [App\Http\Controllers\SucursalController::class, 'confirmDelete'])->name('admin.sucursales.confirm-delete')->middleware('auth','can:admin.sucursales.confirm-delete');
Route::delete('/admin/sucursales/{id}', [App\Http\Controllers\SucursalController::class, 'destroy'])->name('admin.sucursales.destroy') ->middleware('auth','can:admin.sucursales.destroy');

//Rutas para el admin = empleados
Route::get('/admin/empleados', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('admin.empleados.index') ->middleware('auth','can:admin.empleados.index');
Route::get('/admin/empleados/create', [App\Http\Controllers\EmpleadoController::class, 'create'])->name('admin.empleados.create') ->middleware('auth','can:admin.empleados.create');
Route::post('/admin/empleados/create', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('admin.empleados.store') ->middleware('auth','can:admin.empleados.store');
Route::get('/admin/empleados/reportes', [App\Http\Controllers\EmpleadoController::class, 'reportes'])->name('admin.empleados.reportes') ->middleware('auth','can:admin.empleados.reportes');
Route::get('/admin/empleados/pdf', [App\Http\Controllers\EmpleadoController::class, 'pdf'])->name('admin.empleados.pdf') ->middleware('auth','can:admin.empleados.pdf');
Route::get('/admin/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'show'])->name('admin.empleados.show') ->middleware('auth','can:admin.empleados.show');
Route::get('/admin/empleados/{id}/edit', [App\Http\Controllers\EmpleadoController::class, 'edit'])->name('admin.empleados.edit') ->middleware('auth','can:admin.empleados.edit');
Route::put('/admin/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'update'])->name('admin.empleados.update') ->middleware('auth','can:admin.empleados.update');
Route::get('/admin/empleados/{id}/confirm-delete', [App\Http\Controllers\EmpleadoController::class, 'confirmDelete'])->name('admin.empleados.confirm-delete')->middleware('auth','can:admin.empleados.confirm-delete');
Route::delete('/admin/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'destroy'])->name('admin.empleados.destroy') ->middleware('auth','can:admin.empleados.destroy');


//Rutas para el admin = horarios
Route::get('/admin/horarios', [App\Http\Controllers\HorarioController::class, 'index'])->name('admin.horarios.index') ->middleware('auth','can:admin.horarios.index');
Route::get('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'create'])->name('admin.horarios.create') ->middleware('auth','can:admin.horarios.create');
Route::post('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'store'])->name('admin.horarios.store') ->middleware('auth','can:admin.horarios.store');
Route::get('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'show'])->name('admin.horarios.show') ->middleware('auth','can:admin.horarios.show');
Route::get('/admin/horarios/{id}/edit', [App\Http\Controllers\HorarioController::class, 'edit'])->name('admin.horarios.edit') ->middleware('auth','can:admin.horarios.edit');
Route::put('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'update'])->name('admin.horarios.update') ->middleware('auth','can:admin.horarios.update');
Route::get('/admin/horarios/{id}/confirm-delete', [App\Http\Controllers\HorarioController::class, 'confirmDelete'])->name('admin.horarios.confirm-delete')->middleware('auth','can:admin.horarios.confirm-delete');
Route::delete('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'destroy'])->name('admin.horarios.destroy') ->middleware('auth','can:admin.horarios.destroy');

//Ajax
Route::get('/admin/horarios/sucursales/{id}', [App\Http\Controllers\HorarioController::class, 'cargar_datos_sucursales'])->name('admin.horarios.cargar_datos_sucursales') ->middleware('auth','can:admin.horarios.cargar_datos_sucursales');

//Rutas para el admin = categorias
Route::get('/admin/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('admin.categorias.index') ->middleware('auth','can:admin.categorias.index');
Route::get('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->name('admin.categorias.create') ->middleware('auth','can:admin.categorias.create');
Route::post('/admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'store'])->name('admin.categorias.store') ->middleware('auth','can:admin.categorias.store');
Route::get('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'show'])->name('admin.categorias.show') ->middleware('auth','can:admin.categorias.show');
Route::get('/admin/categorias/{id}/edit', [App\Http\Controllers\CategoriaController::class, 'edit'])->name('admin.categorias.edit') ->middleware('auth','can:admin.categorias.edit');
Route::put('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'update'])->name('admin.categorias.update') ->middleware('auth','can:admin.categorias.update');
Route::get('/admin/categorias/{id}/confirm-delete', [App\Http\Controllers\CategoriaController::class, 'confirmDelete'])->name('admin.categorias.confirm-delete')->middleware('auth','can:admin.categorias.confirm-delete');
Route::delete('/admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'destroy'])->name('admin.categorias.destroy') ->middleware('auth','can:admin.categorias.destroy');

//Rutas para el admin = servicios
Route::get('/admin/servicios', [App\Http\Controllers\ServicioController::class, 'index'])->name('admin.servicios.index') ->middleware('auth','can:admin.servicios.index');
Route::get('/admin/servicios/create', [App\Http\Controllers\ServicioController::class, 'create'])->name('admin.servicios.create') ->middleware('auth','can:admin.servicios.create');
Route::post('/admin/servicios/create', [App\Http\Controllers\ServicioController::class, 'store'])->name('admin.servicios.store') ->middleware('auth','can:admin.servicios.store');
Route::get('/admin/servicios/{id}', [App\Http\Controllers\ServicioController::class, 'show'])->name('admin.servicios.show') ->middleware('auth','can:admin.servicios.show');
Route::get('/admin/servicios/{id}/edit', [App\Http\Controllers\ServicioController::class, 'edit'])->name('admin.servicios.edit') ->middleware('auth','can:admin.servicios.edit');
Route::put('/admin/servicios/{id}', [App\Http\Controllers\ServicioController::class, 'update'])->name('admin.servicios.update') ->middleware('auth','can:admin.servicios.update');
Route::get('/admin/servicios/destroy/{id}', [App\Http\Controllers\ServicioController::class, 'destroy'])->name('admin.servicios.destroy')->middleware('auth','can:admin.servicios.destroy');

//Rutas para el usuario
//Ajax
Route::get('/servicios/{id}', [App\Http\Controllers\HorarioController::class, 'cargar_datos_servicios'])->name('admin.horarios.cargar_datos_servicios')->middleware('auth','can:admin.horarios.cargar_datos_servicios');
Route::get('/cargar_reserva_empleados/{id}', [App\Http\Controllers\WebController::class, 'cargar_reserva_empleados'])->name('cargar_reserva_empleados')->middleware('auth','can:cargar_reserva_empleados');
Route::get('/admin/ver_reservas/{id}', [App\Http\Controllers\AdminController::class, 'ver_reservas'])->name('ver_reservas')->middleware('auth','can:ver_reservas');
Route::post('/admin/eventos/create', [App\Http\Controllers\EventController::class, 'store'])->name('admin.eventos.create')->middleware('auth','can:admin.eventos.create');
Route::delete('/admin/eventos/destroy/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('admin.eventos.destroy')->middleware('auth','can:admin.eventos.destroy');

//Rutas para las reservas
Route::get('/admin/reservas/reportes', [App\Http\Controllers\EventController::class, 'reportes'])->name('admin.reservas.reportes')->middleware('auth','can:admin.reservas.reportes');
Route::get('/admin/reservas/pdf', [App\Http\Controllers\EventController::class, 'pdf'])->name('admin.reservas.pdf')->middleware('auth','can:admin.reservas.pdf');
Route::get('/admin/reservas/pdf_fechas', [App\Http\Controllers\EventController::class, 'pdf_fechas'])->name('admin.reservas.pdf_fechas')->middleware('auth','can:admin.reservas.pdf_fechas');

//Rutas para el historial
Route::get('/admin/historial', [App\Http\Controllers\HistorialController::class, 'index'])->name('admin.historial.index') ->middleware('auth','can:admin.historial.index');
Route::get('/admin/historial/create', [App\Http\Controllers\HistorialController::class, 'create'])->name('admin.historial.create') ->middleware('auth','can:admin.historial.create');
Route::post('/admin/historial/create', [App\Http\Controllers\HistorialController::class, 'store'])->name('admin.historial.store') ->middleware('auth','can:admin.historial.store');
Route::get('/admin/historial/pdf/{id}', [App\Http\Controllers\HistorialController::class, 'pdf'])->name('admin.historial.pdf') ->middleware('auth','can:admin.historial.pdf');
Route::get('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'show'])->name('admin.historial.show') ->middleware('auth','can:admin.historial.show');
Route::get('/admin/historial/{id}/edit', [App\Http\Controllers\HistorialController::class, 'edit'])->name('admin.historial.edit') ->middleware('auth','can:admin.historial.edit');
Route::put('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'update'])->name('admin.historial.update') ->middleware('auth','can:admin.historial.update');
Route::delete('/admin/historial/destroy/{id}', [App\Http\Controllers\HistorialController::class, 'destroy'])->name('admin.historial.destroy') ->middleware('auth','can:admin.historial.destroy');

