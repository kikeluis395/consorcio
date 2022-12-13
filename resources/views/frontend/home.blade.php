@extends('layouts.frontend')
@section('title', 'Home')
@section('content')
    <div class="home">
        <div class="container">
            <div class="home__content">
                <h1>Portal de <br><strong>Licitaciones</strong></h1>
                <ul>
                    <li><a href="/paquete5/tarcilla">Tumbes </a><span>Paquete 5</span></li>
                    <li><a href="/paquete5/soterito">Zarumilla</a><span>Paquete 5</span></li>
                </ul>
                <ul>
                    <li><a href="/paquete6/ancash-costa">Ancash Costa</a><span>Paquete 6</span></li>
                    <li><a href="/paquete6/ancash-sierra">Ancash Sierra</a><span>Paquete 6</span></li>
                    <li><a href="/paquete6/cajamarca">Cajamarca</a><span>Paquete 6</span></li>
                    <li><a href="/paquete6/la-libertad">La Libertad</a><span>Paquete 6</span></li>
                </ul>
            </div>
        </div>
    </div>
@endsection