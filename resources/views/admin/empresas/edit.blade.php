@extends('adminlte::page')

@section('title', 'Editar empresa')

@section('content_header')
    <h1>Editar empresa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($empresa, ['route' => ['admin.empresas.update', $empresa], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                <div class="row">
                    <div class="col-sm-3">
                        {!! Form::label('recepcionado', 'Propuesta recepcionada') !!}
                        {!! Form::select('recepcionado', ['No', 'Si'], null, ['class' => 'form-control', 'placeholder' => 'Selecciona opcion']) !!}
                        @error('recepcionado')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-3">
                        {!! Form::label('preseleccionado', 'Preseleccionado') !!}
                        {!! Form::select('preseleccionado', ['No', 'Si'], null, ['class' => 'form-control', 'placeholder' => 'Selecciona opcion']) !!}
                        @error('preseleccionado')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-3">
                        {!! Form::label('seleccionado', 'Seleccionado') !!}
                        {!! Form::select('seleccionado', ['No', 'Si'], null, ['class' => 'form-control', 'placeholder' => 'Selecciona opcion']) !!}
                        @error('seleccionado')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-3">
                        {!! Form::label('resultado', 'Resultados') !!}
                        {!! Form::select('resultado', ['No', 'Si'], null, ['class' => 'form-control', 'placeholder' => 'Selecciona opcion']) !!}
                        @error('resultado')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                    
            {!! Form::submit('Actualizar Empresa', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
