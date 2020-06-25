<?php

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

//Pagina a cui si accede quando non si è ancora fatto login
Route::get('/', function () {
    return view('guest.welcome');
})->name('home');

//Rotte di autenticazione
Auth::routes();

//Admin
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth') //il middleware auth controlla se un utente è loggato prima di raggiungere una rotta
    ->group(function() {
        Route::get('/home', 'HomeController@index')->name('admin.home');
    });


