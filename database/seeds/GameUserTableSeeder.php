<?php

use Illuminate\Database\Seeder;

class GameUserTableSeeder extends Seeder {
    public function run() {
        DB::table('game_user')->insert([
            'user_id' => 1,
            'game_id' => 1
        ]);
        
        DB::table('game_user')->insert([
            'user_id' => 1,
            'game_id' => 2
        ]);
        
        DB::table('game_user')->insert([
            'user_id' => 2,
            'game_id' => 2
        ]);
        
        DB::table('game_user')->insert([
            'user_id' => 2,
            'game_id' => 3
        ]);
    }
}