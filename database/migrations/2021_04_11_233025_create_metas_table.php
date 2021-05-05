<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('indicador_id');
            $table->bigInteger('objetivo_id');
            $table->bigInteger('eixo_id');
            $table->integer('ods_id');
            $table->integer('pne_id');
            $table->string('titulo');
            $table->string('descricao');
            $table->integer('valor');
            $table->integer('valor_inicial');
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
        Schema::dropIfExists('metas');
    }
}
