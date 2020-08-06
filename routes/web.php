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

Route::post('/loginme', 'Auth.LoginController@login')->name('loginme');

Route::get('/dashboard', function () {
    return view('pages.directeur.add_exemple');
});


Route::get('/', function () {
    return view('index');
});

//Liste des Routes
//Pour tout le monde

//Eleve
Route::resource('eleve', 'EleveController');


///////////////////////////////////////
//Absence
Route::get('etablissement/liste', 'EtablissementController@lister_etablissement')->name('etablissement.liste');
Route::post('etablissement/MAJ', 'EtablissementController@update')->name('etablissement.MAJ');
Route::resource('etablissement', 'EtablissementController');

//Année Scolaire
Route::get('annee-scolaire/liste','AnneeScolaireController@liste_annee')->name('annee-scolaire.liste');
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
Route::get('surveillant/liste', 'SurveillantController@lister_surveillant')->name('surveillant.liste');
Route::resource('surveillant', 'SurveillantController');

//Professeur
Route::get('professeurs/messages','ProfesseurController@messages')->name('professeur.messages');
Route::post('professeurs/classes', 'ProfesseurController@post_classe')->name('professeurs.classes');
Route::get('professeurs/classes', 'ProfesseurController@index_classe')->name('professeurs.classes');
Route::resource('notes','NoteController');
Route::resource('professeurs', 'ProfesseurController');
//Route::get('professeur/messages','ProfesseurController@messages')->name('professeur.messages');
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






