@extends('layouts.master')
@section('content')

    {!! Form::open(['url' => 'validerInteraction']) !!}
    <div class="col-md-12 col-sm-12 well well-md">
        <center><h1>Formulaire d'ajouts d'interactions entre médicaments</h1></center>
        <div class="form-horizontal">
            <input type="hidden" name="id_interaction" value=""/>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Médicament interagissant :</label>
                <div class="col-md-4 col-sm-4">
                    <select name="med_id_medicament" class="form-control" required>
                        <option value="" disabled selected>Sélectionnez un médicament interagissant</option>
                        @foreach($medicaments as $medicament)
                            <option value="{{ $medicament->id_medicament }}">{{ $medicament->nom_commercial }}</option>
                        @endforeach
                    </select>
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
    {!! Form::close() !!}

@stop
