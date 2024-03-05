<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_connexion;
use App\Http\Controllers\c_connexionComptable;
use App\Http\Controllers\cConsultFichesFrais;

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
    return view('v_accueil');
});

/*Visiteur médical*/
Route::get('/visiteurMedical/v_connexion', 'App\Http\Controllers\c_connexion@demandeConnexion')->name('demandeConnexion');

Route::post('/visiteurMedical/v_connexion', 'App\Http\Controllers\c_connexion@valideConnexion')->name('valideConnexion');

Route::get('/visiteurMedical/v_sommaire', function () {
    return view('visiteurMedical.v_sommaire');
});

Route::post('/validerConsultation', 'App\Http\Controllers\cConsultFichesFrais@validerConsultation')->name('validerConsultation');

Route::get('/visiteurMedical/consulterFichesFrais', function () {
    return view('visiteurMedical.consulterFichesFrais');
});


//~ /*Comptable*/
//~ Route::get('/comptable/v_connexionComptable', 'App\Http\Controllers\c_connexionComptable@demandeConnexion')->name('demandeConnexion');

//~ Route::post('/comptable/v_connexionComptable', 'App\Http\Controllers\c_connexionComptable@valideConnexion')->name('valideConnexion');

//~ Route::get('/comptable/v_sommaireComptable', function () {
    //~ return view('comptable.v_sommaireComptable');
//~ });

Route::post('/logout', [c_connexion::class, 'logout'])->name('logout');







