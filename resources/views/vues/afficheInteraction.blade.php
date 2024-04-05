@extends('layouts.master')
@section('content')

    <a href="{{ url('/ajouterInteraction') }}" class="btn btn-primary">Ajouter une interaction</a>
    <a href="{{ url('/ajouterInteraction') }}/{{ $uninteragir->id_medicament }}"class="btn btn-primary">Ajouter une interaction</a>
    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th style="width:60%">Id medicament</th>
            <th style="width:60%">Nom commercial</th>
            <th style="width:60%">Id medicament associé</th>
            <th style="width:10%">Actions</th>
        </tr>
        </thead>
        @foreach ($interagir as $uninteragir)
            <tr>
                <td>{{ $uninteragir->id_medicament }}</td>
                <td>{{ $uninteragir->nom_commercial }}</td>
                <td>{{ $uninteragir->med_id_medicament }}</td>
                <td style="text-align:center;">
                    <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" onclick="javascript:if (confirm('Suppression confirmée ?')) { window.location ='{{ url('/supprimerInteraction') }}/{{ $uninteragir->id_medicament }}'; }"></a>
                </td>
            </tr>
        @endforeach
    </table>
@stop
