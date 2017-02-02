<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller {
    public function getProfile(User $user) {
        
        //$user = User::findOrFail($user_id);
        
        $data = array('page_title' => 'Profil de '.$user->name, 'user' => $user);
        
        return view('front.pages.user_profile',$data);
    }
}