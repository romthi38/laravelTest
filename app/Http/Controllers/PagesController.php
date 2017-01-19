<?php

namespace App\Http\Controllers;

use App\User;

class PagesController extends Controller {
    public function getHome() {
        
        $data = array('page_title' => 'Accueil', 'username' => 'thibault'); 
        
        $users = User::with('links', 'game')->get();
        
        $data['users'] = $users;
        
        return view('front.pages.home',$data);
    }
}