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

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/dashboard', function () {
    return view('pages.directeur.add_exemple');
});

Route::get('/', function () {
    return view('index');
});
Route::get('/comptableee', function () {
    $nom_page = "calendier_payement";
    return view('pages.comptable.dashboard', compact('nom_page'));
});
//Liste des Routes


//Absence
Route::resource('etablissement', 'EtablissementController');

//Année Scolaire
Route::resource('annee-scolaire', 'AnneeScolaireController');

//Bulletin
Route::resource('bulletin', 'BulletinController');

//Chat
Route::resource('chat', 'ChatController');

//Classe
Route::resource('classe', 'ClasseController');

/* Ouzy_dev route's */

//Comptable
Route::resource('comptable', 'ComptableController');

//Inscription
Route::resource('inscription', 'InscriptionController');

//Payement
Route::resource('payement', 'PayementController');

//////////////////////////////////////////////////

//Compte User
Route::resource('user', 'CompteUserController');

//Directeur
Route::resource('directeur', 'DirecteurController');

//Eleve
Route::resource('eleve', 'EleveController');

//Emploi du temps
Route::resource('edt', 'EmploiDuTempsController');

//Matière
Route::resource('matiere', 'MatiereController');

//Note
Route::resource('notes', 'NoteController');

//Parent
Route::resource('parent', 'ParentController');

//Professeur
Route::resource('professeur', 'ProfesseurController');

//Statistique
Route::resource('statistique', 'StatistiqueController');

//Surveillant
Route::resource('surveillant', 'SurveillantController');





