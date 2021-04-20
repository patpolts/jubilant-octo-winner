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
            'titulo' => $faker->sentence(4),
            'descricao'  => $faker->sentence(),
            'anos' => json_encode($faker->words(3)),
            'metas' => json_encode($faker->words(3)),
            'valor_inicial' => $faker->numberBetween(0,10),
            'valor' => $faker->numberBetween(0,100),
            'valor_final' => $faker->numberBetween(1,100),
            'data_registro' => $faker->date('d/M/y'),
            'logs' => json_encode($faker->words(3)),
            'active' => true,
            
            ]);
        }


    }
}
