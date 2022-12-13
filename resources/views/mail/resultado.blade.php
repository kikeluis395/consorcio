@extends('layouts.mail')
@section('title', 'Usuario creado')
@section('content')
    @if ($empresa->resultado === '1')
        <p style="color: #525252; font-size: 15px; text-align: center">
            ¡Felicitaciones!,</p>
        <p style="color: #525252; font-size: 15px; text-align: center; margin: 20px 0px; font-weight: bold">{{ $empresa->razon_social }}
        </p>
        <p style="color: #525252; font-size: 15px;">Su empresa ha sido ganadora en la licitación
            {{ $empresa->convocatoria->titulo }} en la región
            {{ $empresa->convocatoria->region->nombre }}.</p>
        <p style="color: #525252; font-size: 15px; margin-top: 20px;">Pronto nuestro equipo de selección se comunicará con su empresa</p>
    @elseif($empresa->resultado === '0')
        <p style="color: #525252; font-size: 15px; text-align: center">
            Hola,</p>
        <p style="color: #525252; font-size: 15px; text-align: center; margin: 20px 0px; font-weight: bold">{{ $empresa->razon_social }}
        </p>
        <p style="color: #525252; font-size: 15px;">Su empresa no ha sido ganadora en la licitación
            {{ $empresa->convocatoria->titulo }} en la región
            {{ $empresa->convocatoria->region->nombre }}.</p>
        <p style="color: #525252; font-size: 15px; margin-top: 20px;">Los resultados serán publicados en la web del Consorcio.</p>
        <p style="color: #525252; font-size: 15px; margin-top: 20px;">Gracias por participar</p>
    @endif
@endsection

{{-- <body>
    @if ($empresa->resultado === '1')
       <p class="header-title">
            ¡Felicitaciones!,</p>
        <p class="header-title" style="margin: 20px 0px; font-weight: bold">{{ $empresa->razon_social }}
        </p>
        <p>Su empresa ha sido una de las seleccionadas para la etapa final en la licitación {{ $empresa->convocatoria->titulo }} en la región
            {{ $empresa->convocatoria->region->nombre }}.</p>
    @elseif($empresa->resultado === '0')
       <p class="header-title">
            ¡Felicitaciones!,</p>
        <p class="header-title" style="margin: 20px 0px; font-weight: bold">{{ $empresa->razon_social }}
        </p>
        <p>Su empresa ha sido una de las seleccionadas para la etapa final en la licitación {{ $empresa->convocatoria->titulo }} en la región
            {{ $empresa->convocatoria->region->nombre }}.</p>
    @endif
</body> --}}
