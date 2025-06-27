<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\CategorieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





// les routes pour gestion d'une Produits :

// on utilisnat Route sous forme de midlware :

    Route::get('/Product' , [ProduitsController::class , 'index_Produits']);
    Route::post('/creat/product' , [ProduitsController::class , 'create_Produits']);
    Route::get('/show/produit/{id}' ,[ProduitsController::class , 'show']);

    Route::get('/edit/produit/{id}' , [ ProduitsController::class , 'edit' ] );
    Route::post('/update/Produit/{id}' ,[ProduitsController::class , 'update_Produit']);

    Route::delete('/delet/produit' ,[ProduitsController::class , 'destroy']);


    // route pour categorie :

    Route::post('/creat/categorie' , [CategorieController::class , 'storeCategorie']);
    Route::delete('/delete/categorie' , [CategorieController::class , 'deletCategorie']);




