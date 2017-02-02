<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Game;

class GameAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function getAddGame() {
        return view('front.pages.add_new_game');
    }

    public function postAddGame(Request $request) {
        $rules = array(
            'name' => 'required|max:255',
            'image' => 'required|image|max:12000',
            'developper' => 'required|max:255'
        );

        $this->validate($request, $rules);

        $game = new Game();
        $game->name = $request->input('name');
        $game->developper = $request->input('developper');

        if(Auth::user()->is_admin) {
            if($request->has('confirmed')) {
                $game->confirmed = true;
            }
        }

        if($request->hasFile('image')) {
            if($request->image->isValid()) {
                $nomImage = $request->image->storeAs('images','img_couverture_'.$game->name.'.'.$request->image->extension());
                $game->image = $nomImage;
            }
        }

        if($game->save()) {
            return redirect()->route('games_list');
        } else {
            return redirect()->back()->withInput();
        }
    }
}