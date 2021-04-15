<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetivosEstrategicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetivos_estrategicos', function (Blueprint $table) {
            $table->id();
            $table->json('metas');
            $table->json('indicadores');
            $table->json('ouse');
            $table->string('nome');
            $table->string('descricao');
            $table->string('justificativa')->nullable();
            $table->string('logs');
            $table->dateTime('data_registro');
            $table->boolean('active')->nullable();
            
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
        #TODO: deletar rels
        Schema::dropIfExists('objetivos_estrategicos');
    }
}
