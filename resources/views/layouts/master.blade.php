<!doctype html>
<html lang="fr">
<head>
    {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('assets/css/monStyle.css') !!}
</head>
<body class="body">
<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar+ bvn"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">GSB Medicaments</a>
            </div>
            @if (Session::get('id') == 0)
                <div class="collapse navbar-collapse" id="navbar-collapse-target">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/formLogin') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Se connecter</a></li>
                    </ul>
                </div>
            @endif
            @if (Session::get('id') > 0)
                <div class="collapse navbar-collapse" id="navbar-collapse-target">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/getLogout') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Se déconnecter</a></li>
                    </ul>
                    <div class="col-md-12 well well-md">
                        <center><h1>Bienvenue André</h1></center>
                        <center><h2>Voulez vous...</h2></center>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <ul>
                                    <li>
                                        <a href="{{ url('/getListeFrais') }}">
                                            <button type="submit" class="btn btn-default btn-primary">
                                                <span class="glyphicon glyphicon-log-in"></span> Lister
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <ul>
                                    <li>
                                        <a href="{{ url('/getListeFrais') }}">
                                            <button type="submit" class="btn btn-default btn-primary">
                                                <span class="glyphicon glyphicon-log-in"></span> Ajouter
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        </div>
                    </div>
                </div>
            @endif

        </div><!--/.container-fluid -->
    </nav>
</div>
<div class="container">
    @yield('content')

</div>
{!! Html::script('assets/js/bootstrap.min.js') !!}
{!! Html::script('assets/js/bootstrap.js') !!}

</body>
</html>
