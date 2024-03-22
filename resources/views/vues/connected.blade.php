@extends('layouts.master')

@section('content')
    <div class="col-md-12 well well-md" style="margin-top: 100px;">
        <center><h1>Bienvenue !</h1></center>
        <center><h2>Pour une formulation, voulez-vous...</h2></center>

        <div class="row">
            <div class="col-md-6">
                <div class="text-center" style="margin-top: 80px;">
                    <a href="{{ url('/getListeMedicament') }}">
                        <button type="submit" class="btn btn-default btn-primary">
                            <span class="glyphicon glyphicon-log-in"></span> Lister
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center" style="margin-top: 80px;">
                    <a href="{{ url('/ajouterMedicament') }}">
                        <button type="submit" class="btn btn-default btn-primary">
                            <span class="glyphicon glyphicon-log-in"></span> Ajouter
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
