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

        for ($i=0; $i < 10; $i++) { 
            DB::table('metas')->insert([
            'indicador_id' => $faker->randomNumber(1),
            'titulo' => $faker->sentence,
            'descricao' => $faker->paragraph,
            'justificativa' => $faker->paragraph,
            'valor' => $faker->numberBetween(1,100),
            'data_registro' => $faker->date('d-M-y'),
            'pne' => json_encode($faker->words(3)),
            'ods' => json_encode($faker->words(2)),
            'logs' => json_encode($faker->words(1)),
            'active' => true,
           ]);
        }


    }
}
