<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table ='categorie ' ;
    protected $fillable = ['id' , 'NomCategorie' , 'description' , 'image' ];
    use HasFactory;

}
// Compare this snippet from backend-api/app/Http/Controllers/CategorieController.php:
