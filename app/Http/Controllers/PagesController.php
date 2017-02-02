<?php

namespace App\Http\Controllers;

use Auth;

use App\User;
use App\Game;
use App\RightManagement;

class PagesController extends Controller {
    public function getHome() {
        
        $data = array('page_title' => 'Accueil', 'username' => 'thibault');
        
        $users = User::with('links', 'game')->get();
        
        $data['users'] = $users;
        $data['games'] = Game::confirmed()->get();
        
        return view('front.pages.home',$data);
    }

    public function gamesList() {
        $games = Game::confirmed()->orderBy('name')->paginate(5);

        return view('front.pages.games_list',['games' => $games]);
    }
}