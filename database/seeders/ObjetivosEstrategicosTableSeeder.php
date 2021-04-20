<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ObjetivosEstrategicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('objetivos_estrategicos')->truncate();
        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) { 
            DB::table('objetivos_estrategicos')->insert([

            'titulo' => $faker->sentence(4),
            'justificativa'  => $faker->sentence(),
            'metas' => json_encode($faker->words(3)),
            'data_registro' => $faker->date('d/M/y'),
            'logs' => json_encode($faker->words(3)),
            'active' => true,
            
            ]);
        }
    }
}
