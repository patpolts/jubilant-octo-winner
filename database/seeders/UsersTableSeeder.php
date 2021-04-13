<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash as Hash;

class UsersTableSeeder extends Seeder
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
        DB::table('users')->truncate();
        $faker = Faker::create();

        //gera o user admin master, com todas as permissões
        $password = Hash::make(env('MASTER_PASS'));
        DB::table('users')->insert([
            'name' => env('MASTER_NAME'),
            'email' => env('MASTER_EMAIL'),
            'password' => $password,
            'is_superadmin' => 0,
        ]);

    }
}
