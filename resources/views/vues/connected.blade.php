@extends('layouts.master')

@section('content')
    <style>
        .welcome-message {
            font-size: 2em;
            color: #333;
        }

        .instruction-message {
            font-size: 1.5em;
            color: #666;
        }

        .action-group {
            margin-top: 20px;
        }

        .action-list {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: space-between;
        }

        .action-button .btn {
            background-color: #50b3a2;
            color: #fff;
        }
    </style>

    <div class="col-md-12 well well-md">
        <center><h1 class="welcome-message">Bienvenue !</h1></center>
        <center><h2 class="instruction-message">Pour une formulation, voulez vous...</h2></center>

        <div class="form-group action-group">
            <div class="col-md-6 col-md-offset-3">
                <ul class="action-list">
                    <li>
                        <a href="{{ url('/getListeMedicament') }}" class="action-button">
                            <button type="submit" class="btn btn-default btn-primary">
                                <span class="glyphicon glyphicon-log-in"></span> Lister
                            </button>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/ajouterMedicament') }}" class="action-button">
                            <button type="submit" class="btn btn-default btn-primary">
                                <span class="glyphicon glyphicon-log-in"></span> Ajouter
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
