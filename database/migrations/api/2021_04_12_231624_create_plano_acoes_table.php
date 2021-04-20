<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanoAcoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('plano_acao', function (Blueprint $table) {
            $table->id();
            $table->integer('eixo_id');
            $table->integer('objetivo_id');
            $table->integer('tema_id');
            $table->string('nome');
            $table->string('descricao');
            $table->string('justificativa');
            $table->string('ator'); 
            $table->integer('desempenho'); 
            $table->string('data_registro'); 
            $table->json('logs')->nullable();
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
        Schema::dropIfExists('plano_acao');
    }
}
