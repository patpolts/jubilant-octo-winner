<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrandesTemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('grande_tema', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('descricao');
            $table->string('layout');
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
        Schema::dropIfExists('grande_tema');
    }
}
