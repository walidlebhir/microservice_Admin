<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produits ;

class ProduitsController extends Controller
{
    // creation des fonction crub pour gestion des produits :
    public function index_Produits(){
        // Recuperation des donnes dse produits :
        try{
            $DataProduits = Produits::all();
            return response()->json([
                'dataProduits' => $DataProduits ,
            ]);
        }catch(\EXCEPTION $e){
            return response()->json([
                'message' => "Ereur dans Recuperation des donnnes ",
            ],500);
        }

    }


    // function qui permet d'ajouter une produits :
    public function create_Produits(Request $request){
        // on fait une validation des donnes :
        $data_create = $request->validate([
            'NomProduit' => 'required' ,
            'description' => 'required' ,
            'prix' => ['required', 'numeric', 'gt:0'] ,
            'quantite' => ['required', 'numeric', 'gt:0'],
            'id_categorie' => "required" ,
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // creation une storage pour les image :
        $path_image_server = $request->file('image')->store('produitImages' , 'public');
        $data_create['image'] = $path_image_server ;
        try{
            $dataEnvoyer = Produits::create($data_create);

            if($dataEnvoyer){
                return response()->json([
                    'message' => "dataAjouter " ,
                ]);
            }
            else{
                return response()->json([
                    'message' => "Problemme  " ,
                ]);
            }
        }catch(\Exception $e){
            return response()->json([
                'message' => "problemme dans creation des donnes ",
                'messageDebug' => $e->getMessage() ,
            ], 500);
        }

    }

    public function edit($id){
        // recuperation des donnes pour chaque data :

        try{
            $DataProduit = Produits::find($id);
            return response()->json([
                'Produit' => $DataProduit ,
            ]);

        }catch(\Exception $e){
            return response()->json([
                'message' => "problemme dans le serveur " ,
                'messageDebug' => $e->getMessage() ,
            ]);
        }

    }

    public function update_Produit(Request $request , $id){
        
        $data_Update = $request->validate([
            'NomProduit' => 'required' ,
            'description' => 'required' ,
            'prix' => ['required', 'numeric', 'gt:0'] ,
            'quantite' => ['required', 'numeric', 'gt:0'],
            'id_categorie' => "required" ,
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $requestFile = $request->file('image');
        if($requestFile){
            $pathImageUpdate = $requestFile->store('produitImages' , 'public');
            $data_Update['image'] = $pathImageUpdate ;
        }

        // fait une mes ajour :
        try{
            $dataProduit_update = Produits::find($id);
            $resultata = $dataProduit_update->fill($data_Update)->save();
            if($resultata){
                return response()->json([
                    'MesageValide' => "le produit est modefie ",
                ]);
            }
        }catch(\Exception $e){
            return response()->json([
                'Message' => "Problemme dans serveur " ,
                'MessageSebug' => $e->getMessage() ,
            ]);
        }

    }



    public function show($id){
        try {
            // recuperation des donnes par id du produit
            $Produit = Produits::find($id);
            return response()->json([
                'DataProduit' => $Produit,
            ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => "Problemme dans serveur " ,
                'messageDebug' => $e->getMessage(),
            ]);
        }

    }

    public function destroy(Request $request){
        $idProduit = $request->id ;
        try{
            $produit = Produits::find($idProduit);
            $resul= $produit->delete();

            if($resul){
                return response()->json([
                    'Message' => "la supresion est efectue",
                ]);
            }

        }catch(\Exception $e){
            return response()->json([
                'message' => "Problemme dans serveur " ,
                'messageDebug' => $e->getMessage(),
            ]);
        }
    }

}
