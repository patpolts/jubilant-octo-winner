<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Dummy seeds
         */
        DB::table('metas')->truncate();
        $faker = Faker::create();

        for ($i=0; $i < 5; $i++) { 
            DB::table('metas')->insert([
            'id_rel' => $faker->randomNumber(),
            'titulo' => $faker->sentence,
            'descricao' => $faker->paragraph,
            'justificativa' => $faker->paragraph,
            'valor_inicial' => $faker->numberBetween(0,20),
            'valor_atual' => $faker->numberBetween(20,200),
            'valor_final' => $faker->numberBetween(200,2000),
            'regras' => json_encode([$i => ["values" => $faker->words(3)]]),
            'types' => json_encode([$i => ["values" => $faker->words(2)]]),
            'categorias' => json_encode([$i => ["values" => $faker->words(4)]]),
            'tags' => json_encode([$i => ["values" => $faker->words(5)]]),
            'active' => true,
           ]);
        }


    }
}
