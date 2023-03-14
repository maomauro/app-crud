<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Auth;

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
/*
Route::get('/persona', function () {
    return view('persona.index');
});
*/
//accedemos a todos los metodos de persona controller

Route::resource('persona',PersonaController::class)->middleware('auth');
Auth::routes(['reset'=>false]);

Route::get('/home', [PersonaController::class, 'index'])->name('home');

Route::group( ['middleware' => 'auth'], function () {
    Route::get('/', [PersonaController::class, 'index'])->name('home');
});
//Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
