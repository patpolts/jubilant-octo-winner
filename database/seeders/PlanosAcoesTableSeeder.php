<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class PlanosAcoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('plano_acao')->truncate();
        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) { 
            DB::table('plano_acao')->insert([
            'eixo_id' => $faker->randomNumber(1),
            'objetivo_id' => $faker->randomNumber(1),
            'tema_id' => $faker->randomNumber(1),
            'nome' => $faker->sentence(2),
            'descricao'  => $faker->sentence(),
            'justificativa'  => $faker->sentence(),
            'ator' => $faker->sentence(1),
            'desempenho' => $faker->numberBetween(1,100),
            'data_registro' => $faker->date('d/M/y'),
            'logs' => json_encode($faker->words(3)),
            'active' => true,
            
            ]);
        }
    }
}
