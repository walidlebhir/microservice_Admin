<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\UtilisateurController;

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




// route prefixe :
Route::prefix('Admin')->group(function(){

    // gestion produits :
    Route::get('/Product' , [ProduitsController::class , 'index_Produits']);
    Route::post('/creat/product' , [ProduitsController::class , 'create_Produits']);
    Route::get('/show/produit/{id}' ,[ProduitsController::class , 'show']);

    Route::get('/edit/produit/{id}' , [ ProduitsController::class , 'edit' ] );
    Route::post('/update/Produit/{id}' ,[ProduitsController::class , 'update_Produit']);

    Route::delete('/delet/produit' ,[ProduitsController::class , 'destroy']);


    // route pour categorie :
    Route::post('/creat/categorie' , [CategorieController::class , 'storeCategorie']);
    Route::delete('/delete/categorie' , [CategorieController::class , 'deletCategorie']);

    
    // route Pour gestion des utilisateurs :
    Route::get('/liste/utilisateur' , [UtilisateurController::class , 'list_user']);
    Route::post('/create/user' , [UtilisateurController::class , 'create_user']);
    Route::post('/block/compt/{id}' , [UtilisateurController::class , 'block_Compt']);
    Route::post('/deblocker/user/{id}' , [UtilisateurController::class , 'deblock_compt']);
    Route::delete('/delte/compt/{id}' , [UtilisateurController::class , 'delate_Compt']);


});


