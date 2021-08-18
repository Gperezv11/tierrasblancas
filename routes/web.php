<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaClienteController;
use App\Http\Controllers\VetMedicoController;
use App\Http\Controllers\VetMascotaController;
use App\Http\Controllers\VetListaClienteController;
use App\Http\Controllers\VetCalendarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Veterinaria - Clientes/mascotas
Route::resource('macliente', MaClienteController::class);
Route::get('rutFinder', [MaClienteController::class, 'rutFinder']);
Route::get('formatoRut', [MaClienteController::class, 'formatoRut']);
Route::get('findComuna', [MaClienteController::class, 'findComuna']);
Route::resource('vetmascota', VetMascotaController::class);
Route::resource('lvetcliente', VetListaClienteController::class);

//Veterinaria - Medico
Route::resource('vetmedico', VetMedicoController::class);

//Veterinaria - Calendario
Route::resource('calendario', VetCalendarioController::class);
Route::get('calendario/mostrar', [VetCalendarioController::class, 'show']);
Route::post('calendario/agendar', [VetCalendarioController::class, 'store']);
Route::post('calendario/editar/{id}', [VetCalendarioController::class, 'edit']);
Route::post('calendario/actualizar/{evento}', [VetCalendarioController::class, 'update']);
Route::post('calendario/borrar/{id}', [VetCalendarioController::class, 'destroy']);
