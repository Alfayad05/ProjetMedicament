@extends('layouts.master')
@section('content')
    <table class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
            <th style="width:60%">Période</th>
            <th style="width:20%">Modifier</th>
            <th style="width:20%">Supprimer</th>
        </tr>
        </thead>
        @foreach ($mesMedicaments as $unMedicaments)
            <tr>
                <td> {{ $unMedicaments->prix_echantillon }}</td>
                <td style="text-align:center;"><a href="{{ url('/modifierFrais') }}/{{ $unMedicaments->id_medicament }}">
                        <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span>
                        <td style="text-align:center;">
                            <a class="glyphicon glyphicon-remove" data-toggle= "tooltip" data-placement="top" title="Supprimer" onclick="javascript:if (confirm('Suppression confirmée ?')) { window.location ='{{ url('/supprimerFrais') }}/{{ $unMedicaments->id_medicament }}'; }">>
                            </a>


                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@stop
