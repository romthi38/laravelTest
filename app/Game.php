<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function users() {
        return $this->belongsToMany('App\User');
    }
    
    public function scopeConfirmed($request) {
        return $request->where('confirmed', true);
    }
}
