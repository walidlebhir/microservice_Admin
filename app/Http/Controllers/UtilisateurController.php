<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur ;
use App\Models\commande ;

use Illuminate\Support\Facades\Hash ;
use Illuminate\Support\Facades\DB ;


class UtilisateurController extends Controller
{
    // les fonctionalite pour fait une gestion pour des utilisateurs :


    public function list_user(){
        // recuperation des utilisateur :
        try{
            $Data_user = Utilisateur::all();
            if($Data_user){
                return response()->json([
                    'user_list' => $Data_user ,
                ]);
            }else{
                return response()->json([
                    'message' => "data not existe " ,
                ]);
            }


        }catch(Exception $e){
            return response()->json([
                'message' => "problemme dans la recuperation des donnes " ,
                'Ereur_get' => $e->getMessage(),
            ]);
        }


    }





    public function create_user(Request $request){

        $request->validate([
            'Nom' => 'required' ,
            'email' => 'required|email' ,
            'password' => 'required' ,
            'role' => 'required' ,
        ]);

        // cache password
        $password_Hash = Hash::make($request->password) ;

        // creation Data :
        $user_create = [
            'Nom' => $request->Nom ,
            'email' => $request->email ,
            'password' => $password_Hash ,
            'role' => $request->role ,
        ];

        try{
            $resultat_create = Utilisateur::create($user_create);
            if($resultat_create){
                return response()->json([
                    'message_create' => "user ets cre avec susses " ,
                ], 201);
            }
        }catch(Exception $e){
            return response()->json([
                'message' => "problemme dans la creation de user " ,
                'ereurget' => $e->getmessage() ,
            ] , 500);
        }

    }



    public function show_user($id){

        // listage des information sur compt est les commandes efectue

        try{
            // recuperation des donnes pour user :
            $Data_User = Utilisateur::find($id);

            if($Data_User){
                return response()->json([
                    'dataUser' => $Data_User ,
                ]);
            }


        }catch(Exception $e){

            return response()->json([
                'message_Problemme' => "Problemme dans listage des donnes " ,
                'Erreur_get' => $e->getMessage(),
            ]);
        }

    }


    public function commandeUser($id){
        // afichage des commande pour user :

        try{
            // afichage des commande qui efectue un user :
            $commande_user = commande::where('user_id' , $id)->get();
            if(!$commande_user->isEmpty()){
                // routorner data user :
                return response()->json([
                    'commande_user' => $commande_user ,
                ]);
            }else{
                return response()->json([
                    'message' => "data not existe " ,
                ]);
            }


        }catch(Exception $e){
            return response()->json([
                'message' => "Problemme dans serveur " ,
                'Ereur_get' => $e->getmessage()  ,
            ]);
        }

    }


    public function block_Compt($id){

        // blocage_compt => changemenet de statu d'utilisateur (false)
        try{

            $User = Utilisateur::find($id) ;

            $resultat_update = $User->update([
                'statue' => false ,
            ]);

            if($resultat_update){
                return response()->json([
                    'message' => "le compt est bloquer " ,
                ]);

            }


        }catch(Exception $e){

            return response()->json([
                'Message' => "problemme dans base de donnes " ,
                'erreurGet' => $e->getmessage() ,
            ]);
        }

    }

    public function deblock_compt($id){
        // deblocker compt ==> statue (false -> true )

        try{

            $UserBlokcer = Utilisateur::find($id);
            if($UserBlokcer){
                $resultat =  $UserBlokcer->update([
                    'statue' => true ,
                ]);

                if($resultat){
                    return response()->json([
                        'Message' => "le compt est deblocker avec sescue " ,
                    ]) ;
                }

            }
        }catch(Exception  $e){
            return response()->json([
                'message_erreur' => "prolemme ",
                'Ereur_get' => $e->getMessage() ,
            ]);

        }

    }



    public function delate_Compt($id){
        // supresion compt :

        try{

            $User_delete  = utilisateur::find($id);
            $resultat_delete = $User_delete->delete();
            if($resultat_delete){
                return response()->json([
                    'message_delete' => "le compt est suprumer " ,
                ]);
            }

        }catch(Exception $e ){
            return response()->json([
                'message' => "problemme dans base de donnes " ,
                'EreurGet' => $e->getmessage() ,

            ]);
        }
    }

}
