@extends('layouts.app')

@section('page_title', 'Choix d\'un jeu')

@section('content')

<div class="container">
    <div class="starter-template">
        <h1>Choix d'un jeu</h1>        
        <form action="{{route('game_add_post')}}" method="POST">     
            {{ csrf_field() }}                              
            <h4>Jeux :</h4>                  
                      
            @foreach($games as $game)
                <label>
                    <input type="checkbox" name="selected_games[]" value="{{ $game->id }}" 
                    @if(in_array($game->id, $user_games_ids)) 
                        checked 
                    @endif
                    >    
                    {{ $game->name }}               
                </label><br>                    
            @endforeach   
            
            @if ($errors->has('selected_games'))
                <span class="help-block">
                    <strong>{{ $errors->first('selected_games') }}</strong>
                </span>
            @endif     
                                                                                                                 
            <br><input type="submit" class="btn btn-primary" value="Valider">            
        </form>
    </div>    
</div>

@endsection