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

        for ($i=0; $i < 10; $i++) { 
            DB::table('eixos')->insert([
            'id_rel' => $faker->randomNumber(),
            'titulo' => $faker->sentence,
            'descricao' => $faker->paragraph,
            'andamento' =>  $faker->randomNumber(),
            'types' => json_encode([$faker->words(2)]),
            'categorias' => json_encode([$faker->words(4)]),
            'tags' => json_encode([$faker->words(5)]),
            'active' => true,
            'status' => true,
            'device' => $faker->macAddress()
           ]);
        }


    }
}
