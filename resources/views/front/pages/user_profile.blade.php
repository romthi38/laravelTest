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
    <a href="{{route('link_add')}}" class="btn btn-primary">Ajouter un lien</a>
</div>

@endsection