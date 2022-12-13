@extends('layouts.mail')
@section('title', 'Usuario creado')
@section('content')
    @if ($empresa->propuesta_recepcionada === '1')
        <p style="color: #525252; font-size: 15px; text-align: center">
            Hola,</p>
        <p style="color: #525252; font-size: 15px; text-align: center; margin: 20px 0px; font-weight: bold">{{ $empresa->razon_social }}
        </p>
        <p style="color: #525252; font-size: 15px;">Se ha recepcionado su propuesta de la licitación {{$empresa->convocatoria->titulo}} en la región {{$empresa->convocatoria->region->nombre}}.</p>
        <p style="color: #525252; font-size: 15px; margin-top: 20px;">Seguir con el calendario de licitación descrito en los TDR.</p>
        @elseif($empresa->propuesta_recepcionada === '0')
        <p style="color: #525252; font-size: 15px; text-align: center">
            Hola,</p>
        <p style="color: #525252; font-size: 15px; text-align: center; margin: 20px 0px; font-weight: bold">{{ $empresa->razon_social }}
        </p>
        <p style="color: #525252; font-size: 15px; text-align: center;">No se ha recepcionado su propuesta de la licitación {{$empresa->convocatoria->titulo}} en la región {{$empresa->convocatoria->region->nombre}}.</p>
    @endif
@endsection
