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

            $table->bigInteger('id_rel')->nullable();
            $table->string('titulo',255)->unique();
            $table->string('descricao',2400);
            $table->string('justificativa',2400);
            $table->integer('valor_inicial');
            $table->integer('valor_atual');
            $table->integer('valor_final');
            $table->json('regras');
            $table->json('types');
            $table->json('categorias');
            $table->json('tags');

            $table->boolean('active'); 
            $table->softDeletes($column = 'deleted_at', $precision = 0);

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
