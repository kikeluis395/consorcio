@extends('layouts.mail')
@section('title', 'Usuario creado')
@section('content')
    @if ($empresa->preseleccionado === '1')
        <p style="color: #525252; font-size: 15px;text-align: center">
            Hola,</p>
        <p style="color: #525252; font-size: 15px;text-align: center; margin: 20px 0px; font-weight: bold">{{ $empresa->razon_social }}
        </p>
        <p style="color: #525252; font-size: 15px;">Su empresa ha sido preseleccionada en la licitación {{ $empresa->convocatoria->titulo }} en la región
            {{ $empresa->convocatoria->region->nombre }}.</p>
        <p style="color: #525252; font-size: 15px;margin-top: 20px;">Seguir con el calendario de licitación descrito en los TDR.</p>
    @elseif($empresa->preseleccionado === '0')
        <p style="color: #525252; font-size: 15px;text-align: center">
            Hola,</p>
        <p style="color: #525252; font-size: 15px;text-align: center; margin: 20px 0px; font-weight: bold">{{ $empresa->razon_social }}
        </p>
        <p style="color: #525252; font-size: 15px;">Su empresa no ha sido preseleccionada en la licitación {{ $empresa->convocatoria->titulo }} en la región
            {{ $empresa->convocatoria->region->nombre }}.</p>
        <p style="color: #525252; font-size: 15px;margin-top: 20px;">Gracias por participar.</p>
    @endif
@endsection

{{-- <body>
  @if ($empresa->preseleccionado === '1')
    <p style="    r: #525252; font-size: 15px;text-align: center">
            Hola,</p>
        <p class="header-title" style="margin: 20px 0px; font-weight: bold">{{ $empresa->razon_social }}
        </p>
        <p>Se ha recepcionado su propuesta de la licitación {{$empresa->convocatoria->titulo}} en la región {{$empresa->convocatoria->region->nombre}}.</p>
  @elseif($empresa->preseleccionado === '0')
    <p class="header-title">
            Hola,</p>
        <p class="header-title" style="margin: 20px 0px; font-weight: bold">{{ $empresa->razon_social }}
        </p>
        <p>Se ha recepcionado su propuesta de la licitación {{$empresa->convocatoria->titulo}} en la región {{$empresa->convocatoria->region->nombre}}.</p>
  @endif
</body> --}}
