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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/dashboard', function () {
    return view('pages.directeur.add_exemple');
});

Route::post('/loginme','loginController@index');

//Directeur
Route::resource('etablissement', 'EregistrerEtablisController');//->middleware(ConnectionSession::class);
Route::resource('salleClasse', 'SalleClasseController');//->middleware(ConnectionSession::class);
Route::resource('classe', 'EregistrerClasseController');//->middleware(ConnectionSession::class);
Route::resource('matiere', 'EregistrerMatiereController');//->middleware(ConnectionSession::class);
Route::resource('surveillant', 'EregistrerSurveillantController');//->middleware(ConnectionSession::class);



