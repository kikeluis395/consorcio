@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Convocatorias</h1>
@stop

@section('content')
{{--convocatorias, estado de convocatoria y si cerrada que muestre al ganador --}}
    <div class="row">
        @foreach($convocatorias as $convocatoria)
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h3>{{$convocatoria->titulo}}</h3>
                        <p class="m-0"><strong>Estado: </strong>{{$convocatoria->estado}}</p>
                        @if($convocatoria->adjudicado !== '')
                            <p><strong>Adjudicado: </strong>{{$convocatoria->adjudicado}}</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop