@extends('layouts.master')
@section('content')
    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th style="width:5%">Modifier</th>
            <th style="width:5%">ID Médicament</th>
            <th style="width:5%">ID Famille</th>
            <th style="width:15%">Dépôt légal</th>
            <th style="width:15%">Nom commercial</th>
            <th style="width:30%">Effets</th>
            <th style="width:15%">Contre-indication</th>
            <th style="width:10%">Prix échantillon</th>
            <th style="width:5%">Intéragir</th>
            <th style="width:5%">Supprimer</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($mesMedicaments as $unMedicament)
            <tr>
                <td style="text-align:center;">
                    <a href="{{ url('/modifierMedicament') }}/{{ $unMedicament->id_medicament }}">
                        <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span>
                    </a>
                </td>
                <td>{{ $unMedicament->id_medicament }}</td>
                <td>{{ $unMedicament->id_famille }}</td>
                <td>{{ $unMedicament->depot_legal }}</td>
                <td>{{ $unMedicament->nom_commercial }}</td>
                <td>{{ $unMedicament->effets }}</td>
                <td>{{ $unMedicament->contre_indication }}</td>
                <td>{{ $unMedicament->prix_echantillon }}</td>
                <td style="text-align:center;">
                    <a href="{{ url('/interagirMedicament') }}/{{ $unMedicament->id_medicament }}">
                        <span class="glyphicon glyphicon-link" data-toggle="tooltip" data-placement="top" title="Intéragir"></span>
                    </a>
                </td>
                <td style="text-align:center;">
                    <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" onclick="javascript:if (confirm('Suppression confirmée ?')) { window.location ='{{ url('/supprimerMedicament') }}/{{ $unMedicament->id_medicament }}'; }"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
