<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
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
})->name('login');
Route::post('/loginme','Auth.LoginController@login')->name('loginme');

Route::get('/', function () {
    return view('index');
});

Route::get('/info_eleve','EleveController@show_eleve');
//Liste des Routes
//Pour tout le monde

//Eleve
Route::resource('eleve', 'EleveController');


///////////////////////////////////////
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

//SalleClasse
Route::resource('salle_classe', 'SalleClasseController');

/* Ouzy_dev route's */

//Comptable fonctionnalites
Route::resource('comptable', 'ComptableController');

//Inscription
Route::resource('inscription', 'InscriptionController');

//Réinscription
Route::resource('reinscription', 'ReinscriptionController');

//Payement
Route::resource('payement', 'PayementController');

//Surveillant fonctionnalites

//Surveillant
Route::resource('surveillant', 'SurveillantController');

//Professeur
Route::resource('professeur', 'ProfesseurController');

//////////////////////////////////////////////////

//Compte User
Route::resource('user', 'CompteUserController');

//Directeur
Route::resource('directeur', 'DirecteurController');

//Emploi du temps
Route::resource('edt', 'EmploiDuTempsController');

//Matière
Route::resource('matiere', 'MatiereController');

//Note
Route::resource('notes', 'NoteController');

//Parent
Route::resource('parent', 'ParentController');
Route::resource('parentEleve', 'ParentEleveController');


//Statistique
Route::resource('statistique', 'StatistiqueController');






