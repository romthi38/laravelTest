<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder {
    public function run() {
        DB::table('games')->insert([
            'name' => 'Metal Gear Solid V',
            'developper' => 'Kojima Company',            
            'created_at' => date('Y-m-d')
        ]);
        
        DB::table('games')->insert([
            'name' => 'Borderlands 2',
            'developper' => 'Gearbox',            
            'created_at' => date('Y-m-d')
        ]);
        
        DB::table('games')->insert([
            'name' => 'Tetris',
            'developper' => 'Un vieux russe',            
            'created_at' => date('Y-m-d')
        ]);
    }
}