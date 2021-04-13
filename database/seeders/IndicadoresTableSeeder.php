<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IndicadoresTableSeeder extends Seeder
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
        DB::table('indicadores')->truncate();
        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) { 
            DB::table('indicadores')->insert([
            'rels' => json_encode([$faker->words(3)]),
            'titulo' => $faker->sentence,
            'descricao' => $faker->paragraph,
            'justificativa' => $faker->sentence,
            'ano_inicial' => $faker->numberBetween(2019,2025),
            'ano_final' => $faker->numberBetween(2025,2030),
            'status_atual' => $faker->randomNumber(3),
            'status_final' => $faker->boolean(),
            'regras' => json_encode([$i => ["values" => $faker->words(3)]]),
            'types' => json_encode([$i => ["values" => $faker->words(2)]]),
            'categorias' => json_encode([$i => ["values" => $faker->words(4)]]),
            'tags' => json_encode([$i => ["values" => $faker->words(5)]]),
            'active' => true,
            'status' => true,
           ]);
        }


    }
}
