<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder {
    public function run() {
        DB::table('links')->insert([
            'name' => 'Site web',
            'url' => 'http://www.portfolio-thibault-romanin.com',            
            'user_id' => 1,
            'created_at' => date('Y-m-d')
        ]);
        
        DB::table('links')->insert([
            'name' => 'Facebook',
            'url' => 'http://www.facebook.com/thibault.romanin',            
            'user_id' => 1,
            'created_at' => date('Y-m-d')
        ]);
        
        DB::table('links')->insert([
            'name' => 'Site web',
            'url' => 'http://loremipsum.com',            
            'user_id' => 2,
            'created_at' => date('Y-m-d')
        ]);
    }
}