<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder {
    public function run() {
        DB::table('role_user')->insert([
            'role_id' => 3,
            'user_id' => 1
        ]);
        
        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 2
        ]);
        
        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 3
        ]);
    }
}