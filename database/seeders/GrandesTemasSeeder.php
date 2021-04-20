<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GrandesTemasSeeder extends Seeder
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
        DB::table('grande_tema')->truncate();
        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) { 
            DB::table('grande_tema')->insert([
            'acao_id' => $faker->randomNumber(1),
            'objetivo_id' => $faker->randomNumber(1),
            'titulo'  => $faker->sentence(),
            'layout' => 'red',
            'logs' => json_encode($faker->words(3)),
            'active' => true,
            
            ]);
        }
    }
}
