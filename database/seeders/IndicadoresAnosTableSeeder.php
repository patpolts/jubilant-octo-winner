<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IndicadoresAnosTableSeeder extends Seeder
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
         * 
         */
        DB::table('indicadores_anos')->truncate();
        $faker = Faker::create();

        for ($i=0; $i < 6; $i++) { 
            DB::table('indicadores_anos')->insert([
            'indicador_id' => $faker->randomNumber(1),
            'meta_id' => $faker->randomNumber(1),
            'ano' => (2020 + $i),
            'valor' => $faker->numberBetween(10,90),
            'justificativa' => $faker->sentence(),
            'data_registro' => $faker->date('d/M/y'),
            'logs' => json_encode($faker->words(3)),
            'active' => true,
            
            ]);
        }


    }
}
