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
            $table->id();
            $table->bigInteger('indicador_id')->nullable();
            $table->string('titulo',255)->unique();
            $table->string('descricao',2400);
            $table->string('justificativa',2400);
            $table->string('data_registro');
            $table->integer('valor');
            $table->json('pne');
            $table->json('ods');
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
        Schema::dropIfExists('metas');
    }
}
