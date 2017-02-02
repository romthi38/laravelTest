<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Link;
use App\Game;
use App\User;

class UserAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        
    {
        //if (! Auth::check() abort(404));
        
        return view('home');
    }
    
    public function getAddLink() {
        
        return view('front.pages.add_link');
    }
    
    public function postAddLink(Request $request) {
        
        $rules = array(
            'name' => 'required|max:255',
            'url' => 'required|max:255|url'
        );
        
        $this->validate($request, $rules);
        
        $link = new Link();
        $link->name = $request->input('name');
        $link->url = $request->input('url');
        $link->user_id = Auth::user()->id;
        
        if($link->save()) {
            return redirect()->route('user_profile', [Auth::user()->id]);
        } else {
            return redirect()->back()->withInput();
        }
    }
    
    public function getAddGame() {
        /*$games = Game::All();        
        $game_user = User::with('games')->where('id',Auth::user()->id)->get();        
        $data = array('games' => $games, 'game_user' => $game_user);*/
        
        $data = array('games' => Game::orderBy('name')->get());  
        
        $user = Auth::user();
        
        $user_games_ids = $user->games->pluck('id')->toArray();
        
        $data['user_games_ids'] = $user_games_ids;
        
        return view('front.pages.add_game',$data);
    }
    
    public function postAddGame(Request $request) {
        $rules = array(
            'selected_games' => 'exists:games,id'
        );
        
        $games_ids = $request->input('selected_games',[]);        
        
        $this->validate($request, $rules);                
        
        $user = Auth::user();
        $user->games()->sync($games_ids);        
        
        return redirect()->route('user_profile', [$user->id]);
        
    }
}
