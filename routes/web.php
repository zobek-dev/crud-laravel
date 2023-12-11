<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

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
    return view('welcome');
});

Route::get('/productos',[ProductosController::class, 'index'])->name('producto.index');
Route::get('/productos/crear', [ProductosController::class, 'crear'])->name('producto.crear');
Route::post('/productos', [ProductosController::class, 'guardar'])->name('producto.guardar');
Route::get('/productos/{producto}/editar', [ProductosController::class, 'editar'])->name('producto.editar');
Route::put('/productos/{producto}/actualizar', [ProductosController::class, 'actualizar'])->name('producto.actualizar');
Route::delete('/productos/{producto}/eliminar', [ProductosController::class, 'eliminar'])->name('producto.eliminar');
