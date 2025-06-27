<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    protected $table = "commandes" ;
    protected $fillable = ['id' , 'user_id' , 'adresse' ,  'quantite_commande' , 'statut']; 
}
