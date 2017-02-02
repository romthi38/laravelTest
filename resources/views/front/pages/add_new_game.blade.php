@extends('layouts.app')

@section('page_title', 'Ajout d\'un nouveau jeu')

@section('content')

    <div class="container">
        <h1>Ajout d'un nouveau jeu</h1>
        <form enctype="multipart/form-data" action="{{route('game_add_new_post')}}" method="POST">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Nom</label>
                <input type="text" class="form-control" placeholder="Saisir nom..." id="name" name="name">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                <label for="image">Image</label>
                <input type="file" id="image" name="image">
                <p class="help-block">L'image ne doit pas dépasser 1,5Mo.</p>
                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('developper') ? ' has-error' : '' }}">
                <label for="developper">Développeur</label>
                <input type="text" class="form-control" placeholder="Saisir développeur..." id="developper" name="developper">
                @if ($errors->has('developper'))
                    <span class="help-block">
                        <strong>{{ $errors->first('developper') }}</strong>
                    </span>
                @endif
            </div>

            @if(Auth::user()->is_admin)
                <input type="checkbox" name="confirmed" id="confirmed">Confirmé<br>
            @endif

            <input type="submit" class="btn btn-primary" value="Ajouter">
        </form>
    </div>

@endsection