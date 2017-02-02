<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Miw</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/home">Home</a></li>
                <li><a href="{{route('admin')}}">Admin</a></li>
                <li><a href="{{route('game_add_new')}}">Ajout d'un jeu</a></li>
                <li><a href="{{route('games_list')}}">Jeux</a></li>

            
        
                @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('user_profile', ['user_id' => Auth::user()->id])}}">Mon compte</a></li>
                        <li><a href="/logout">Déconnexion</a></li>
                    </ul>
                </li>
                
                @else
                <li><a href="/login">Connexion</a></li>                
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>