<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('indicadores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //relações da meta
            $table->json('rels');
            $table->string('titulo',255)->unique();
            $table->string('descricao',2400);
            $table->string('justificativa',2400); 
            $table->json('regras');
            $table->string('ano_inicial'); // obj dos anos analizados
            $table->integer('ano_final'); // indica o ano final da meta 
            $table->integer('status_atual'); // obj do andamento de cada ano {'ano 1', 'ano_2'}
            $table->integer('status_final'); //indica o status do ano final atual da meta estabelecida
            $table->json('types'); //tipos de post relacionados
            $table->json('categorias'); //ods
            $table->json('tags');
            $table->boolean('status'); //verifica se a meta foi conluida

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
        Schema::dropIfExists('indicadores');
    }
}
