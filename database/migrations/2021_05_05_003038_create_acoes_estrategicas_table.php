<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcoesEstrategicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acoes_estrategicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('eixo_id');
            $table->bigInteger('objetivo_id');
            $table->bigInteger('tema_id');          
            $table->string('titulo');            
            $table->string('descricao');
            $table->string('justificativa');
            $table->string('objetivo_especifico');
            $table->integer('ator'); 
            $table->integer('desempenho');             
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
        Schema::dropIfExists('acoes_estrategicas');
    }
}
