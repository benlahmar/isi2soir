<?php

use App\Http\Controllers\Calc;
use App\Http\Controllers\ControllerProduct;
use App\Http\Controllers\convertisseurController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return "<h1>Bonjour</h1>";
});

Route::get('/calc',[Calc::class,'index']);

Route::get('/calc/{a}/{b}',[Calc::class,'somme'])->name("somme")->where(['a'=>'[0-9]+','b'=> '[0-9]+']);

Route::get('/calc/multip',[Calc::class,'mult']);

Route::get('/conv',[convertisseurController::class,'index']);

Route::get('/conv/argent',[convertisseurController::class,'argent']);

Route::resource('produits', ControllerProduct::class);
