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
            $table->bigIncrements('id');
            $table->integer('indicador_id');
            $table->string('titulo');
            $table->integer('ano');
            $table->integer('valor');
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
        Schema::dropIfExists('indicadores_anos');
    }
}
