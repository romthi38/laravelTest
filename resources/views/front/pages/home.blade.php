@extends('layouts.app')

@section('page_title', $page_title)

@section('content')

<div class="container">
    <div class="starter-template">
        <h1>Bienvenue</h1>
        <p class="lead">Blablabla, bienvenue {{ $username }}. Merci</p>
        
    </div>
    @foreach($users as $user)  
        <p>L'utilisateur {{ $user->name }}, inscrit le {{ date('d/m/y', strtotime($user->created_at)) }}, aime jouer à {{ $user->game->name }}.
        Retrouvez le sur 
        @foreach($user->links as $link)
            @if ($loop->last)
            et sur <a href="{!! $link->url !!}">{{$link->name}}</a>
            @else
            <a href="{!! $link->url !!}">{{$link->name}}</a>,
            @endif
        @endforeach
        </p>
    @endforeach
    
    <h2>Tous nos jeux :</h2>
    @foreach($games as $game)
        <p>{{ $game->name }}</p>
    @endforeach
</div><!-- /.container -->


@endsection