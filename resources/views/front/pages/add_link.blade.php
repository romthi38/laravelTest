@extends('layouts.app')

@section('page_title', 'Ajout d\'un lien')

@section('content')

<div class="container">
    <div class="starter-template">
        <h1>Ajout d'un lien</h1>        
        <form action="{{route('link_add_post')}}" method="POST">     
            {{ csrf_field() }}       
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Nom</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>            

            <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                <label for="url" class="col-md-4 control-label">Url</label>

                <div class="col-md-6">
                    <input id="url" type="text" class="form-control" name="url" value="{{ old('url') }}" autofocus>

                    @if ($errors->has('url'))
                        <span class="help-block">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                    @endif
                </div>
            </div>            

            <input type="submit" class="btn btn-primary" value="Valider">            
        </form>
    </div>    
</div>

@endsection