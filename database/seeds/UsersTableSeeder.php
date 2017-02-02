<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
    public function run() {
        DB::table('users')->insert([
            'name' => 'Thibault Romanin',
            'email' => 'thibault.romanin@gmail.com',
            'password' => bcrypt('ini01'),
            'game_id' => 1,
            'is_admin' => true,
            'created_at' => date('Y-m-d')
        ]);
        
        DB::table('users')->insert([
            'name' => 'Pierre Bouffier',
            'email' => 'pierre.bouffier05@gmail.com',
            'password' => bcrypt('test'),
            'game_id' => 2,
            'created_at' => date('Y-m-d')
        ]);
        
        DB::table('users')->insert([
            'name' => 'Manuel Coffin',
            'email' => 'manuel.coffin@gmail.com',
            'password' => bcrypt('azerty'),
            'game_id' => 3,
            'created_at' => date('Y-m-d')
        ]);
    }
}