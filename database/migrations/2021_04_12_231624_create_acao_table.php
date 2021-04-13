<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('acao', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //relações da meta
            $table->bigInteger('id_rel')->index('id');

            $table->string('titulo',255)->unique();
            $table->string('descricao',2400);
            $table->string('justificativa',2400); 
            $table->string('ator',255); 
            $table->integer('ano'); 
            $table->integer('andamento'); 
            $table->string('regras');
            $table->string('types'); //tipos de post relacionados
            $table->string('categorias'); //ods
            $table->string('tags');

            $table->boolean('active'); 

            $table->softDeletes($column = 'deleted_at', $precision = 0);
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acao');
    }
}
