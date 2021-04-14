<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadoresAnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('indicadores_anos', function (Blueprint $table) {
            $table->id();
            $table->integer('indicador_id');
            $table->integer('meta_id');
            $table->string('ano');
            $table->string('valor');
            $table->string('justificativa');
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
