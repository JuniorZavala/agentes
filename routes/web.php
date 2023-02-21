<?php

use App\Http\Controllers\AgentesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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
    return view('auth.login');
})->name('admin');

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('dashboard',[AgentesController::class,'mostrarAgentes'])->name('dashboard');
Route::get('agentes/{agente}',[AgentesController::class,'show'])->name('agente-edit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
