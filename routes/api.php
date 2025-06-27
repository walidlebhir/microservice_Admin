<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\commandeController ;
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
    Route::post('/create/utilisateur' , [UtilisateurController::class , 'create_user']);
    Route::post('/block/compt/{id}' , [UtilisateurController::class , 'block_Compt']);
    Route::post('/deblocker/user/{id}' , [UtilisateurController::class , 'deblock_compt']);
    Route::delete('/delte/compt/{id}' , [UtilisateurController::class , 'delate_Compt']);
    Route::get('Show/user/{id}' , [UtilisateurController::class , 'show_user']);
    Route::get('commande/user/{id}' , [UtilisateurController::class , 'commandeUser']);


    // route pour gestion des commandes  :

    Route::post('/create/commande', [commandeController::class , 'create_commande']);


});


