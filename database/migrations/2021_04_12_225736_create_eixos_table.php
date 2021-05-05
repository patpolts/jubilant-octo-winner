<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\SchemaState;
use Illuminate\Support\Facades\Schema;

class CreateEixosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('eixos', function (Blueprint $table) {
            
            $table->bigIncrements('id');

            $table->string('titulo');
            $table->string('descricao');
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
        Schema::dropIfExists('eixos');
    }
}
