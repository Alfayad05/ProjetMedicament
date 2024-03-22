@extends('layouts.master')
@section('content')

    {!! Form::open(['url' => 'validerMedicament2']) !!}
    <div class="col-md-12 col-sm-12 well well-md">
        <center><h1>Formulaire de Modification de Médicament</h1></center>
        <div class="form-horizontal">
            <input type="hidden" name="id_medicament" value="{{ $unMedicament->id_medicament }}">


            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">ID Famille :</label>
                <div class="col-md-2 col-sm-2">
                    <select name="id_famille" class="form-control" required>
                        <option value="" disabled selected>Sélectionnez une famille</option>
                        @foreach($familles as $famille)
                            <option value="{{ $famille->id_famille }}">{{ $famille->lib_famille }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Dépôt Légal :</label>
                <div class="col-md-3 col-sm-3">
                    <input type="text" class="form-control"  name="depot_legal" value="" placeholder="Dépôt Légal" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Nom Commercial :</label>
                <div class="col-md-3 col-sm-3">
                    <input type="text" class="form-control"  name="nom_commercial" value="" placeholder="Nom Commercial" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Effet :</label>
                <div class="col-md-6 col-sm-6">
                    <textarea class="form-control" name="effets" placeholder="Effets" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Contre-Indication :</label>
                <div class="col-md-6 col-sm-6">
                    <textarea class="form-control" name="contre_indication" placeholder="Contre-Indication" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Prix Échantillon :</label>
                <div class="col-md-3 col-sm-3">
                    <input type="number" class="form-control"  name="prix_echantillon" value="" placeholder="Prix Échantillon" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                    <button type="submit" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-ok"></span> Valider
                    </button>
                    &nbsp;
                    <button type="button" class="btn btn-default btn-primary" onclick="javascript: window.history.back();">
                        <span class="glyphicon glyphicon-remove"></span> Annuler
                    </button>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            </div>
        </div>
    </div>
@stop
