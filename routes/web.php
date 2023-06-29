<?php


use App\Http\Controllers\CPDF;
use App\Http\Controllers\CLieu;
use App\Http\Controllers\CTaxe;
use App\Http\Controllers\Cuser;
use App\Http\Controllers\CArtiste;
use App\Http\Controllers\CEvenement;
use App\Http\Controllers\CPlacelieu;
use App\Http\Controllers\CAutreparam;
use App\Http\Controllers\CLogistique;
use App\Http\Controllers\CPlacevendu;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CSonorisation;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\CEvenementlieu;
use App\Http\Controllers\CEvenementartiste;
use App\Http\Controllers\CPrixplaceevenement;
use App\Http\Controllers\CEvenementautreparam;
use App\Http\Controllers\CEvenementlogistique;
use App\Http\Controllers\CEvenementsonorisation;

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

Route::get('/',function () { return view('pagelogin');});
Route::get('/form_users',function () { return view('InsertUsers');});
Route::post('/insert_users',[Cuser::class,'insert_users']);
Route::get('users/logout',[Cuser::class,'logout_users']);
Route::post('users/connect',[Cuser::class,'connect_users']);

Route::get('/List_Artiste',[CArtiste::class,'list']);
Route::post('/Insert_Artiste',[CArtiste::class,'store']);

Route::get('/List_Sonorisation',[CSonorisation::class,'list']);
Route::post('/Insert_Sonorisation',[CSonorisation::class,'store']);

Route::get('/List_Logistique',[CLogistique::class,'list']);
Route::post('/Insert_Logistique',[CLogistique::class,'store']);

Route::get('/List_Autreparam',[CAutreparam::class,'list']);
Route::post('/Insert_Autreparam',[CAutreparam::class,'store']);

Route::get('/List_Lieu',[CLieu::class,'list']);
Route::post('/Insert_Lieu',[CLieu::class,'store']);
Route::get('/List_Placelieu/{lieuid}',[CPlacelieu::class,'list']);
Route::post('Insert_Placelieu',[CPlacelieu::class,'store']);

Route::get('/List_Evenement',[CEvenement::class,'list']);
Route::post('/Insert_Evenement',[CEvenement::class,'store']);

Route::get('/List_Prixplaceevenement/{eventid}',[CPrixplaceevenement::class,'list']);
Route::post('/Insert_Prixplaceevenement',[CPrixplaceevenement::class,'store']);
Route::get('/Destroy_Prixplaceevenement/{prixplaceevenement}',[CPrixplaceevenement::class,'destroy']);


Route::get('/Evenement/Devis/{eventid}',[CEvenement::class,'Form_Devis']);
Route::post('/Insert_Evenementartiste',[CEvenementartiste::class,'store']);
Route::get('/Destroy_Evenementartiste/{Evenementartisteid}',[CEvenementartiste::class,'destroy']);
Route::post('/Insert_Evenementlieu',[CEvenementlieu::class,'store']);
Route::get('/Destroy_Evenementlieu/{evenementlieu}',[CEvenementlieu::class,'destroy']);
Route::post('/Insert_Evenementlogistique',[CEvenementlogistique::class,'store']);
Route::get('/Destroy_Evenementlogistique/{evenementlogistique}',[CEvenementlogistique::class,'destroy']);
Route::post('/Insert_Evenementsonorisation',[CEvenementsonorisation::class,'store']);
Route::get('/Destroy_Evenementsonorisation/{evenementsonorisation}',[CEvenementsonorisation::class,'destroy']);
Route::post('/Insert_Evenementautreparam',[CEvenementautreparam::class,'store']);
Route::get('/Destroy_Evenementautreparam/{evenementautreparam}',[CEvenementautreparam::class,'destroy']);

Route::get('/EvenementPDF/{evenement}/{eventid}',[CPDF::class,'genAffiche']);

Route::get('/List_Taxe',[CTaxe::class,'list']);
Route::post('/Insert_Taxe',[CTaxe::class,'store']);

Route::get('/List_Placevendu/{evenementid}',[CPlacevendu::class,'list']);
Route::post('Insert_Placevendu',[CPlacevendu::class,'store']);

Route::get('/List_Pie/{evenementid}',[CEvenement::class,'piechart']);
Route::get('/Evenementbis/{evenement}/{evenementid}',function () { return view('Insert_Bis');});
Route::post('/Insert_Bis',[CEvenement::class,'Insert_Bis']);
