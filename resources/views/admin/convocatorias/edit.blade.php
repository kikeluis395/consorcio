@extends('adminlte::page')

@section('title', 'Editar Convocatorias')

@section('content_header')
    <h3><strong>Editando convocatoria: </strong> {{$convocatoria->titulo}} de  <strong>{{$convocatoria->region->nombre}}</strong></h3>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($convocatoria, ['route' => ['admin.convocatorias.update', $convocatoria], 'method' => 'put', 'enctype' =>'multipart/form-data']) !!}

            @include('admin.convocatorias.partials.form')

            {!! Form::submit('Actualizar Convocatoria', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
