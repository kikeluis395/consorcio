@extends('layouts.mail')
@section('title', 'Usuario creado')
@section('content')
    <p class="header-title">
        Hola,</p>
    <p class="header-title" style="margin: 20px 0px; font-weight: bold">{{ $user->name }}
    </p>
    <p>Tus datos de acceso a la plataforma son: </p>
    <p>Usuario: {{ $user->email }}</p>
    <p>Contraseña: {{ $user->pass }}</p>
    <p>Link del portal: <a href="https://consorciogczorion.pe/login" target="_blank">https://consorciogczorion.pe/login</a></p>
@endsection
