<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrandetemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('grandetema', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //relações da meta
            $table->bigInteger('id_rel')->index('id');

            $table->string('titulo',255)->unique();
            $table->string('descricao',2400);
            $table->string('layout');
            $table->json('regras');
            $table->json('types');
            $table->json('categorias'); //ods
            $table->json('tags');
            $table->boolean('status'); //verifica se esta ativo

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
        Schema::dropIfExists('grandetema');
    }
}
