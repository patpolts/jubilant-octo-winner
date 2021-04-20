<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EixosTableSeeder extends Seeder
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
        DB::table('eixos')->truncate();
        $faker = Faker::create();

        for ($i=0; $i < 5; $i++) { 
            DB::table('eixos')->insert([
            'titulo' => $faker->sentence,
            'justificativa' => $faker->paragraph,
            'data_registro' => $faker->date('d-M-y'),
            'active' => true,
           ]);
        }


    }
}
