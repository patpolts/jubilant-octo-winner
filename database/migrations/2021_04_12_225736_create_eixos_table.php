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
            
            $table->id();
            $table->timestamps();

            //relações da meta
            $table->bigInteger('id_rel')->index('id');

            $table->string('titulo',255)->unique();
            $table->string('descricao',2400);
            $table->integer('andamento');
            $table->json('types');
            $table->json('categorias'); 
            $table->json('tags');
            $table->boolean('status'); 

            $table->boolean('active'); 
            $table->macAddress('device');

            $table->softDeletes($column = 'deleted_at', $precision = 0);
            

        });
    }

    public function refresh(){
        //
        // SchemaState:
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
