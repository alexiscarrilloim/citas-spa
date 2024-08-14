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

//rutas para el admin = usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index') ->middleware('auth');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create') ->middleware('auth');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store') ->middleware('auth');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show') ->middleware('auth');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit') ->middleware('auth');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update') ->middleware('auth');
Route::get('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])->name('admin.usuarios.confirm-delete')->middleware('auth');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy') ->middleware('auth');

//Rutas para el admin = secretarias
Route::get('/admin/secretarias', [App\Http\Controllers\SecretariaController::class, 'index'])->name('admin.secretarias.index') ->middleware('auth');
Route::get('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'create'])->name('admin.secretarias.create') ->middleware('auth');
Route::post('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'store'])->name('admin.secretarias.store') ->middleware('auth');
Route::get('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'show'])->name('admin.secretarias.show') ->middleware('auth');
Route::get('/admin/secretarias/{id}/edit', [App\Http\Controllers\SecretariaController::class, 'edit'])->name('admin.secretarias.edit') ->middleware('auth');
Route::put('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'update'])->name('admin.secretarias.update') ->middleware('auth');
Route::get('/admin/secretarias/{id}/confirm-delete', [App\Http\Controllers\SecretariaController::class, 'confirmDelete'])->name('admin.secretarias.confirm-delete')->middleware('auth');
Route::delete('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'destroy'])->name('admin.secretarias.destroy') ->middleware('auth');

//Rutas para el admin = clientes
Route::get('/admin/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('admin.clientes.index') ->middleware('auth');
Route::get('/admin/clientes/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('admin.clientes.create') ->middleware('auth');
Route::post('/admin/clientes/create', [App\Http\Controllers\ClienteController::class, 'store'])->name('admin.clientes.store') ->middleware('auth');
Route::get('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'show'])->name('admin.clientes.show') ->middleware('auth');
Route::get('/admin/clientes/{id}/edit', [App\Http\Controllers\ClienteController::class, 'edit'])->name('admin.clientes.edit') ->middleware('auth');
Route::put('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'update'])->name('admin.clientes.update') ->middleware('auth');
Route::get('/admin/clientes/{id}/confirm-delete', [App\Http\Controllers\ClienteController::class, 'confirmDelete'])->name('admin.clientes.confirm-delete')->middleware('auth');
Route::delete('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('admin.clientes.destroy') ->middleware('auth');

//Rutas para el admin = sucursales
Route::get('/admin/sucursales', [App\Http\Controllers\SucursalController::class, 'index'])->name('admin.sucursales.index') ->middleware('auth');
Route::get('/admin/sucursales/create', [App\Http\Controllers\SucursalController::class, 'create'])->name('admin.sucursales.create') ->middleware('auth');
Route::post('/admin/sucursales/create', [App\Http\Controllers\SucursalController::class, 'store'])->name('admin.sucursales.store') ->middleware('auth');
Route::get('/admin/sucursales/{id}', [App\Http\Controllers\SucursalController::class, 'show'])->name('admin.sucursales.show') ->middleware('auth');
Route::get('/admin/sucursales/{id}/edit', [App\Http\Controllers\SucursalController::class, 'edit'])->name('admin.sucursales.edit') ->middleware('auth');
Route::put('/admin/sucursales/{id}', [App\Http\Controllers\SucursalController::class, 'update'])->name('admin.sucursales.update') ->middleware('auth');
Route::get('/admin/sucursales/{id}/confirm-delete', [App\Http\Controllers\SucursalController::class, 'confirmDelete'])->name('admin.sucursales.confirm-delete')->middleware('auth');
Route::delete('/admin/sucursales/{id}', [App\Http\Controllers\SucursalController::class, 'destroy'])->name('admin.sucursales.destroy') ->middleware('auth');

//Rutas para el admin = empleados
Route::get('/admin/empleados', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('admin.empleados.index') ->middleware('auth');
Route::get('/admin/empleados/create', [App\Http\Controllers\EmpleadoController::class, 'create'])->name('admin.empleados.create') ->middleware('auth');
Route::post('/admin/empleados/create', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('admin.empleados.store') ->middleware('auth');
Route::get('/admin/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'show'])->name('admin.empleados.show') ->middleware('auth');
Route::get('/admin/empleados/{id}/edit', [App\Http\Controllers\EmpleadoController::class, 'edit'])->name('admin.empleados.edit') ->middleware('auth');
Route::put('/admin/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'update'])->name('admin.empleados.update') ->middleware('auth');
Route::get('/admin/empleados/{id}/confirm-delete', [App\Http\Controllers\EmpleadoController::class, 'confirmDelete'])->name('admin.empleados.confirm-delete')->middleware('auth');
Route::delete('/admin/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'destroy'])->name('admin.empleados.destroy') ->middleware('auth');

