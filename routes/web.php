<?php

use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\ExameController;
use App\Http\Controllers\Padministrativo;
use App\Http\Controllers\PclinicoController;
use Illuminate\Support\Facades\Route;

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
    return view('admin.dashboard');
});

Route::get('/dashboard/padministrativo', [Padministrativo::class,'index']);

//pessoal clínico
Route::get('/dashboard/pclinico', [PclinicoController::class,'index']);
Route::get('/dashboard/exames', [ExameController::class,'index']);
Route::get('/dashboard/especialidade', [EspecialidadeController::class,'index']);
