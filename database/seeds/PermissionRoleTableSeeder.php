<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder {
    public function run() {
        DB::table('permission_role')->insert([
            'role_id' => 1,
            'permission_id' => 1
        ]);
        
        DB::table('permission_role')->insert([
            'role_id' => 1,
            'permission_id' => 3
        ]);
        
        DB::table('permission_role')->insert([
            'role_id' => 3,
            'permission_id' => 1
        ]);
        
        DB::table('permission_role')->insert([
            'role_id' => 3,
            'permission_id' => 2
        ]);
        
        DB::table('permission_role')->insert([
            'role_id' => 3,
            'permission_id' => 3
        ]);
    }
}