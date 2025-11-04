<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('variacoes_moedas', function (Blueprint $table) {
            $table->id();
            $table->string('par_moeda');  
            $table->decimal('valor', 15, 6);   
            $table->timestamps();  
        });
    }

    public function down()
    {
        Schema::dropIfExists('variacoes_moedas');
    }

    
};
