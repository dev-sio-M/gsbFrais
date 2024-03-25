<?php

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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_connexion;
use App\Http\Controllers\c_connexionComptable;
use App\Http\Controllers\cConsultFichesFrais;
use App\Http\Controllers\comptableConsulterFicheFrais;


/*Accueil*/
Route::get('/', function () {
    return view('v_accueil');
});




/*Visiteur médical*/
Route::get('/visiteurMedical/v_connexion', 'App\Http\Controllers\c_connexion@demandeConnexionVisiteur')->name('demandeConnexionVisiteur');

Route::post('/visiteurMedical/v_connexion', 'App\Http\Controllers\c_connexion@valideConnexionVisiteur')->name('valideConnexionVisiteur');

Route::get('/visiteurMedical/v_sommaire', function () {
    return view('visiteurMedical.v_sommaire');
});


Route::get('/visiteurMedical/consulterFichesFrais', function () {
    return view('visiteurMedical.consulterFichesFrais');
});

Route::post('/validerConsultation', 'App\Http\Controllers\cConsultFichesFrais@validerConsultation')->name('validerConsultation');



/*Comptable*/
Route::get('/comptable/v_connexionComptable', 'App\Http\Controllers\c_connexionComptable@demandeConnexionComptable')->name('demandeConnexionComptable');

Route::post('/comptable/v_connexionComptable', 'App\Http\Controllers\c_connexionComptable@valideConnexionComptable')->name('valideConnexionComptable');

Route::get('/comptable/v_sommaireComptable', function () {
    return view('comptable.v_sommaireComptable');
});

Route::get('/comptable/suivrePaiementFicheFrais', function () {
    return view('comptable.suivrePaiementFicheFrais');
});

Route::post('/validerFicheFrais', 'App\Http\Controllers\comptableConsulterFicheFrais@validerFicheFrais')->name('validerFicheFrais');


/*Deconnexion*/
Route::post('/logout', [c_connexion::class, 'logout'])->name('logout');
