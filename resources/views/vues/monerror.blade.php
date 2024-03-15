@extends('layouts.master')
@section('content')

@if ($monErreur != "")
            <div class="alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true">
                    {{($monErreur)}}

                </span>
            </div>
@endif

@stop


