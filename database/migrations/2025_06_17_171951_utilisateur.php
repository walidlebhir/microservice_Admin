<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        schema::create('utilisateurs', function (Blueprint $table){
            $table->id() ;
            $table->string('Nom');
            $table->string('email');
            $table->string('password');
            $table->string('role');
            $table->boolean('statue')->default(true) ; 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
