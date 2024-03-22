@extends('layouts.master')
@section('content')
    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
        <tr>
            <th style="width:20%">Modifier</th>
            <th style="width:60%">Id medicament</th>
            <th style="width:60%">Id famille</th>
            <th style="width:60%">Depot legal</th>
            <th style="width:60%">Nom commercial</th>
            <th style="width:60%">Effets</th>
            <th style="width:60%">Contre indication </th>
            <th style="width:60%">Prix echantillon </th>
            <th style="width:20%">Supprimer</th>
        </tr>
        </tr>
        </thead>
        @foreach ($mesMedicaments as $unMedicaments)
            <tr>
                <td style="text-align:center;"><a href="{{ url('/modifierMedicament') }}/{{ $unMedicaments->id_medicament }}">
                        <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span>
                <td> {{ $unMedicaments->id_medicament }}</td>
                <td> {{ $unMedicaments->id_famille }}</td>
                <td> {{ $unMedicaments->depot_legal }}</td>
                <td> {{ $unMedicaments->nom_commercial }}</td>
                <td> {{ $unMedicaments->effets }}</td>
                <td> {{ $unMedicaments->contre_indication }}</td>
                <td> {{ $unMedicaments->prix_echantillon }}</td>

                        <td style="text-align:center;">
                            <a class="glyphicon glyphicon-remove" data-toggle= "tooltip" data-placement="top" title="Supprimer" onclick="javascript:if (confirm('Suppression confirmée ?')) { window.location ='{{ url('/supprimerMedicament') }}/{{ $unMedicaments->id_medicament }}'; }">>
                            </a>


                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@stop
