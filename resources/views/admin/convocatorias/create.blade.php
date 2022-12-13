@extends('adminlte::page')

@section('title', 'Crear Convocatorias')

@section('content_header')
    <h1>Crear Convocatorias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['admin.convocatorias.store']]) !!}

            @include('admin.convocatorias.partials.form')

            {!! Form::submit('Crear Convocatoria', ['class' => 'btn btn-primary mt-2']) !!}
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
