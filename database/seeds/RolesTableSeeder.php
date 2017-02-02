<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {
    public function run() {
        DB::table('roles')->insert([
            'name' => 'admin',
            'created_at' => date('Y-m-d')
        ]);
        
        DB::table('roles')->insert([
            'name' => 'membre',
            'created_at' => date('Y-m-d')
        ]);
        
        DB::table('roles')->insert([
            'name' => 'super admin',
            'created_at' => date('Y-m-d')
        ]);
    }
}