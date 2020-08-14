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

Route::post('/loginme', 'LoginController@login')->name('loginme');

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

//Directeur

//crud Surveillant
Route::get('directeur/surveillant/liste', 'SurveillantController@lister_surveillant')->name('directeur.surveillant.liste');
Route::get('directeur/surveillant/create', 'SurveillantController@create')->name('directeur.surveillant.create');
Route::get('directeur/surveillant/listeActif', 'SurveillantController@lister_surveillants_actifs')->name('directeur.surveillant.listeActif');
Route::get('directeur/surveillant/listeInactif', 'SurveillantController@lister_surveillants_inactifs')->name('directeur.surveillant.listeInactif');
Route::post('directeur/surveillant/update/{surveillant}', 'SurveillantController@update_surveillant')->name('directeur.surveillant.update');
Route::get('directeur/surveillant/show/{surveillant}',  'SurveillantController@show_surveillant')->name('directeur.surveillant.show');
Route::post('directeur/surveillant/storeClasses',  'SurveillantController@store_classes')->name('directeur.surveillant.storeClasses');

// Route::post('directeur/surveillant/destroy/{surveillant}',  'SurveillantController@destroy')->name('directeur.surveillant.destroy');

//crud Comptable
Route::get('directeur/Comptable/liste', 'ComptableController@lister_comptables')->name('directeur.comptable.liste');
Route::get('directeur/Comptable/listeActif', 'ComptableController@lister_comptables_actifs')->name('directeur.comptable.listeActif');
Route::get('directeur/Comptable/listeInactif', 'ComptableController@lister_comptables_inactifs')->name('directeur.comptable.listeInactif');
Route::get('directeur/comptable/create', 'ComptableController@create')->name('directeur.comptable.create');
Route::get('directeur/comptable/show/{comptable}',  'ComptableController@show_comptable')->name('directeur.comptable.show');

    
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
Route::get('surveillant/professeur/create', 'ProfesseurController@create')->name('surveillant.professeur.create');
Route::get('surveillant/professeur/liste', 'ProfesseurController@lister_professeur')->name('surveillant.professeur.liste');
Route::get('surveillant/professeur/listeActif', 'ProfesseurController@lister_professeurs_actifs')->name('surveillant.professeur.listeActif');
Route::get('surveillant/professeur/listeInactif', 'ProfesseurController@lister_professeurs_inactifs')->name('surveillant.professeur.listeInactif');
Route::get('surveillant/professeur/show/{professeur}',  'ProfesseurController@show_professeur')->name('surveillant.professeur.show');
Route::resource('surveillant', 'SurveillantController');

//Professeur
Route::get('professeurs/messages','ProfesseurController@messages')->name('professeur.messages');
Route::post('professeurs/classes', 'ProfesseurController@post_classe')->name('professeurs.classes');
Route::get('professeurs/classes', 'ProfesseurController@index_classe')->name('professeurs.classes');
Route::resource('notes','NoteController');
Route::resource('professeur', 'ProfesseurController');
//Route::get('professeur/messages','ProfesseurController@messages')->name('professeur.messages');
//////////////////////////////////////////////////

//Compte User
Route::resource('user', 'CompteUserController');

//Directeur
Route::post('directeur/liste_eleve', 'DirecteurController@list_eleve')->name('directeur.liste_eleve');
Route::resource('directeur', 'DirecteurController');

//Emploi du temps
Route::resource('edt', 'EmploiDuTempsController');

//Matière
Route::resource('matiere', 'MatiereController');

//Note
Route::resource('notes', 'NoteController');

//Parent
Route::get('parentEleve/voirNote', 'ParentEleveController@voir_note')->name('parentEleve.voirNote');
Route::resource('parent', 'ParentController');
Route::resource('parentEleve', 'ParentEleveController');

//Statistique
Route::resource('statistique', 'StatistiqueController');