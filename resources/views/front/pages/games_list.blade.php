@extends('layouts.app')

@section('page_title', 'Liste jeux')

@section('content')

    <div class="container">
        <h2>Liste de jeux :</h2>

        @foreach($games as $game)
            <div class="game_list">
                <h4>Nom du jeu : {{$game->name}}</h4><br>
                Développé par {{$game->developper}}<br><br>
                @if($game->image)
                    <p>Couverture :</p><img src="/storage/{{$game->image}}" style="max-width: 200px;" alt="">
                @endif
            </div>
        @endforeach
        <div>
            {{$games->links()}}
        </div>
    </div>

@endsection