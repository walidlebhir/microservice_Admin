<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\commande ;

class commandeController extends Controller
{
    //estion des commande // ---> pour produits :

    public function change_Etat_comnade($id ,Request $request ){

        /*
                les Etat des commandes --> [en attent , livrer , Anuler  ]
                --> l'orsque la comande efectue on fait la quantite changer automatique :
                --> qunatite des produit ets diminue :
        */

        $request->validate([
            'etat' => 'required' ,
        ]);

        try{
            $resulatat = commande::find($id);
            $resulatat->update([
                'statu' => $request->etat ,
            ]);

            if($resulatat){
                return response()->json([
                    'Message_valide' => "la modefication  d'etat de commande est efectue avec secus " ,
                ]);
            }
        }catch(Exception $e){
            return response()->json([
                'Erreur_message' => "problemme dans serveur ",
            ]);
        }


    }


    public function create_commande(Request $request ){
        // creation d'une commande :

        $data_Validate = $request->validate([
            'user_id' => 'required',
            'produit_id' => 'required',
            'adresse' => 'required',
            'quantite_commande'=> 'required' ,

        ]);

        try{

            $status_comande = "En attente" ;
            $commande_create = [
                'user_id' => $data_Validate['user_id'],
                'produit_id' => $data_Validate['produit_id'] ,
                'adresse' => $data_Validate['adresse'],
                'quantite_commande' => $data_Validate['quantite_commande'],
                'statu' => $status_comande ,

            ];

            $resulatat = commande::create($commande_create);
            if($resulatat){
                return response()->json([
                    'Message' => "la commande est ajouter " ,
                ]);
            }

        }catch(Exception $e){
            return response()->json([
                'message_ereur' => "Problemme dans serveur" ,
                'Ereur' => $e->getMessage() ,
            ]);
        }



    }



}
