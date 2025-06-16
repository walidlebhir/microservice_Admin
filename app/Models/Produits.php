<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    protected $table ='produits' ;
    protected $fillable = ['id' , 'NomProduit' , 'description' ,'prix' ,'quantite' , 'id_categorie' ,'image' , 'statu'];
    use HasFactory;
}
