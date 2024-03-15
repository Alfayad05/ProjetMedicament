<?php

use App\Http\Controllers\ListeController;
use App\Http\Controllers\LoginController;
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
    return view('home');
});

Route::post('/login', [LoginController::class, 'signIn']);

Route::get('/formLogin', [LoginController::class, 'getLogin']);

Route::get('/getLogout', [LoginController::class, 'signOut']);

Route::get('/getListeFrais', [ListeController::class, 'getListeMedicaments']);
