<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder {
    public function run() {
        DB::table('permissions')->insert([
            'name' => 'user.add',
            'created_at' => date('Y-m-d')
        ]);
        
        DB::table('permissions')->insert([
            'name' => 'user.delete',
            'created_at' => date('Y-m-d')
        ]);
        
        DB::table('permissions')->insert([
            'name' => 'user.update',
            'created_at' => date('Y-m-d')
        ]);
    }
}