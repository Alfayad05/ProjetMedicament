@extends('layouts.master')

@section('content')
    <div class="col-md-12 well well-md">
        <center><h1>Bienvenue !</h1></center>
        <center><h2>Pour une formulation, voulez vous...</h2></center>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <ul>
                    <li>
                        <a href="{{ url('/getListeMedicament') }}">
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
                        <a href="{{ url('/ajouterMedicament') }}">
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
