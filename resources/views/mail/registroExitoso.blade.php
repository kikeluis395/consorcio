@extends('layouts.mail')
@section('title', 'Empresa Registrada')
@section('content')
    <p style="color: #525252; font-size: 15px; text-align: center">
        Hola,</p>
    <p style="color: #525252; font-size: 15px; text-align: center; margin: 20px 0px; font-weight: bold">{{ $empresa->contacto_nombre }}
    </p>
    <p style="color: #525252; font-size: 15px;">Haz registrado tu empresa en la convocatoria de: </p>
    <p style="color: #525252; font-size: 15px;">{{ $empresa->convocatoria->titulo }}</p>
    <p style="color: #525252; font-size: 15px;">Región {{ $empresa->convocatoria->region->nombre }}</p>
    <p style="color: #525252; font-size: 15px; margin-bottom: 20px;">Tus datos son los siguientes:</p>

    <section>
        <h2 style=" color: #4673CB;
            font-size: 18px;
            font-weight: bold;
            margin: 30px 0px 10px 0px;">DATOS DE LA EMPRESA</h2>
        <p style="color: #525252; font-size: 15px;">Nombre de la Empresa: {{ $empresa->nombre_empresa }}</p>
        <p style="color: #525252; font-size: 15px;">Razón social: {{ $empresa->razon_social }}</p>
        <p style="color: #525252; font-size: 15px;">RUC: {{ $empresa->ruc }}</p>
        <p style="color: #525252; font-size: 15px;">Dirección: {{ $empresa->direccion }}</p>
        <p style="color: #525252; font-size: 15px;">Pagina Web: {{ $empresa->pagina_web }}</p>
        <p style="color: #525252; font-size: 15px;">Brochure: *En adjunto*</p>
    </section>
    <section>
        <h2 style=" color: #4673CB;
            font-size: 18px;
            font-weight: bold;
            margin: 30px 0px 10px 0px;">DATOS DE CONTACTO</h2>
        <p style="color: #525252; font-size: 15px;">Nombre: {{ $empresa->contacto_nombre }}</p>
        <p style="color: #525252; font-size: 15px;">Cargo: {{ $empresa->contacto_cargo }}</p>
        <p style="color: #525252; font-size: 15px;">Teléfono: {{ $empresa->contacto_telefono }}</p>
        <p style="color: #525252; font-size: 15px;">Correo: {{ $empresa->contacto_correo }}</p>
    </section>
    <section>
        <h2 style=" color: #4673CB;
            font-size: 18px;
            font-weight: bold;
            margin: 30px 0px 10px 0px;">INFORMACIÓN ADICIONAL</h2>
        <p style="color: #525252; font-size: 15px;">Años de experiencia en el rubro que postula: {{ $empresa->anos_experiencia }}</p>
        <p style="color: #525252; font-size: 15px;">Sustento de experiencia en los últimos 5 años (OPCIONAL): *En adjunto*</p>
        <p style="color: #525252; font-size: 15px;">Facturación 2020 (OPCIONAL): *En adjunto*</p>
        <p style="color: #525252; font-size: 15px;">Reporte en centales de riesgo (OPCIONAL): *En adjunto*</p>
    </section>
@endsection
