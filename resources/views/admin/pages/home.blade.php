@extends('layouts.app')

@section('page_title', 'Admin')

@section('content')

<div class="container">
    <div class="starter-template">
        <h1>Admin</h1> 
    </div>
    <h2>Les utilisateurs ont les permissions suivantes :</h2>
    <table class="table table-striped">
        @for ($i = 0; $i < count($peut); $i++)
            <tr>
                <td><strong>{{$peut[$i]['user']}}</strong></td>
                <td style="@if($peut[$i]['can']) color:dodgerblue @else color:indianred @endif">{{$peut[$i]['permission']}}</td>
            </tr>
        @endfor
    </table>
    <h2>Les utilisateurs ont les rangs suivants :</h2>
    <table class="table table-striped">
        @for ($i = 0; $i < count($est); $i++)
            <tr>
                <td><strong>{{$est[$i]['user']}}</strong></td>
                <td style="@if($est[$i]['is']) color:dodgerblue @else color:indianred @endif">{{$est[$i]['role']}}</td>
            </tr>
        @endfor
    </table>
</div><!-- /.container -->


@endsection