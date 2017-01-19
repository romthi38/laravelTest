<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Link;

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
}
