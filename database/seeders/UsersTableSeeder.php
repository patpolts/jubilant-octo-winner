<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as Hash;
use Illuminate\Support\Str;

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
        // DB::table('users')->truncate();
        // $faker = Faker::create();

        //gera o user admin master, com todas as permissões
        $password = Hash::make(getenv('MASTER_PASS'));
        $usertoken = Str::random(60);
        
        DB::table('users')->insert([
            'name' => getenv('MASTER_NAME'),
            'email' => getenv('MASTER_EMAIL'),
            'password' => $password,
            'is_superadmin' => 0,
            'active' => 1,
            'token' => $usertoken
        ]);

    }
}
