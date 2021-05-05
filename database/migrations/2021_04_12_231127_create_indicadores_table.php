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
            $table->bigIncrements('id');
            $table->bigInteger('indicador_anos_id');
            $table->string('titulo');
            $table->string('descricao');
            $table->integer('valor_atual'); 
            $table->integer('valor_meta'); 
            $table->string('data_registro');
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
