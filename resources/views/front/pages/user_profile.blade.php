@extends('layouts.app')

@section('page_title', $page_title)

@section('content')

<div class="container">
    <div class="starter-template">
        <h1>Profil de {{ $user->name }}</h1>
        <p>Jeu favori : {{ $user->game->name }} </p>
    </div>
    <ul>
        @foreach($user->links as $link)
            <li><a href="{!! $link->url !!}">{{ $link->name }}</a></li>
        @endforeach
    </ul>
    @if(Auth::check() && Auth::user()->id == $user->id)
        <a href="{{route('link_add')}}" class="btn btn-primary">Ajouter un lien</a>
    @endif
    <br><br>
    <p>{{ $user->name }} joue à :</p>
    <ul>
        @foreach($user->games as $game)
            <li> {{ $game->name }} </li>
        @endforeach
    </ul>
    <a href="{{route('game_add')}}" class="btn btn-primary">Ajouter un ou plusieurs jeux</a>
</div>

@endsection