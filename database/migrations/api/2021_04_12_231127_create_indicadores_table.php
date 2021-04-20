<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
       
        Schema::create('indicadores', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();
            $table->string('descricao');
            $table->json('anos'); //anos relacionados
            $table->json('metas'); //json das metas que utilizam este indicador
            $table->integer('valor_inicial'); 
            $table->integer('valor'); 
            $table->integer('valor_final'); 
            $table->string('data_registro');
            $table->json('logs'); 
            $table->boolean('active'); 

            $table->timestamps();
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicadores');
    }
}
