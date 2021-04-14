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
            $table->id();
            $table->timestamps();
            $table->integer('acao_id');
            $table->integer('objetivo_id');
            $table->string('titulo')->unique();
            $table->string('layout');
            $table->json('logs');
            $table->boolean('active'); 
            

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
