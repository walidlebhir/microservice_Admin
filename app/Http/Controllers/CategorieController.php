<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    //creation des opetaion du crud pour categorie :
    public function storeCategorie(Request $request ){
        $data_creat =   $request->validate([
            'NomCategorie' => 'required|string',
            'description' => 'required|string',

        ]);

        // on fait une test sur l'existance de categorie :

        $datacategorie  = Categorie::where('NomCategorie' , $request->NomCategorie )->first() ;
        if($datacategorie){
            return response()->json([
                'message' => "categorie deja existe " ,
            ]);
        }

        $resulatat = Categorie::create($data_creat) ;
        if($resulatat){
            return response()->json([
                'messageValidation' => "nouveaux Categorie est ajouter " ,
            ]);
        }
        else{
            return response()->json([
                'messageEreur' => "problemme au niveaux de serveur " ,
            ]);
        }

    }




    // supresion d'une categori :

    public function deletCategorie(Request $request ) {
        $id_categorie = Categorie::find($request->id ) ;

        if($id_categorie){
            $valide =  $id_categorie->delete();
            if($valide){
                return response()->json([
                    'messagevalide' => "la supresion est efectue " ,
                ]);
            }
            else{
                return response()->json([
                    'message' => "problemme dans serveur " ,
                ]);
            }
        }
    }
}
