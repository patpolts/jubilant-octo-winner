<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OuseTableSeeder extends Seeder
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
        DB::table('ouse')->truncate();
        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) { 
            DB::table('ouse')->insert([
            'id_rel' => $faker->randomNumber(),
            'titulo' => $faker->sentence,
            'descricao' => $faker->paragraph,
            'fonte' => $faker->sentence,
            'layout' =>  'content-'.$i,
            'indicadores' => json_encode([$i]),
            'regras' => json_encode([$faker->words(3)]),
            'types' => json_encode([$faker->words(2)]),
            'categorias' => json_encode([$faker->words(4)]),
            'tags' => json_encode([$faker->words(5)]),
            'active' => true,
            'status' => true,
           ]);
        }


    }
}
