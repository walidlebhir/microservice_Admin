<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table = "utilisateurs" ;
    protected $fillable = ['id' , 'Nom' , 'email' , 'password' , 'role' , 'statue'] ; 
}
