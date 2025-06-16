<?php

namespace App\Http\Controllers;
use App\Models\Categorie ;
use Illuminate\Http\Request;

class CaterogieControllers extends Controller
{
    //creation des opetaion du crud pour categorie :
    public function storeCategorie(Request $request ){
        $data_creat =   $request->validate([
            'NomCategorie ' => 'required|string' ,
            'description' => 'required|srtring' ,

        ]);

        // on fait une test sur l'existance de categorie :

        $datacategorie  = Categorie::where('NomCategorie' , $request->NomCategorie )->first() ;
        if($datacategorie){
            return responsive()->json([
                'message' => "categorie deja existe " ,
            ]);
        }

        $resulatat = Categori::create($data_creat) ;
        if($resulatat){
            return responsive()->json([
                'messageValidation' => "nouveaux Categorie est ajouter " ,
            ]);
        }
        else{
            return responsive()->json([
                'messageEreur' => "problemme au niveaux de serveur " ,
            ]);
        }



    }


    

    // supresion d'une categori :

    public function deletCategori(Request $request ) {
        $id_categorie = Categorie::find($request->id ) ;

        if($id_categorie){
            $valide =  $id_categorie->delet();
            if($valide){
                return responsive()->json([
                    'messagevalide' => "la supresion est efectue " ,
                ]);
            }
            else{
                return responsive()->json([
                    'message' => "problemme dans serveur " ,
                ]);
            }
        }
    }
}
