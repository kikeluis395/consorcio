{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Inscripción de empresas</title>
</head>


<body> --}}
    @extends('layouts.frontend')
    @section('title', 'Home')
    @section('content')
    <div class="registro">

       
    <div class="container"
        style="max-width: 800px; margin-block: 50px;  display: flex; justify-content: center; align-items: center;">


         
        <div class="card py-5 px-3">

                    
    @error('company')
    <div class="alert alert-warning">
    {{$message}}
    </div>
 @enderror
 


            {!! Form::open(['route' => 'inscripcion.registro', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
            <div class="row">

      


                <h5 class="col-sm-12 text-center">INFORMACION DE LA LICITACIÓN</h5>
                <div class="form-group col-sm-6">
                    <label>Convocatoria a la que postula</label>
                    <input type="text" name="titulo_convocatoria" class="form-control"
                        value="{{ $convocatoria->titulo }}" disabled>
                </div>
                <div class="form-group col-sm-6">
                    <label>Region a la que postula</label>
                    <input type="text" name="region_nombre" class="form-control"
                        value="{{ $convocatoria->region->nombre }}" disabled>
                </div>
            </div>
            <div class="row mt-3">
                <h5 class="col-sm-12 text-center">DATOS DE LA EMPRESA</h5>
                <div class="form-group col-sm-6">
                    <label for="">Nombre de la Empresa*</label>
                    <input type="text" name="nombre_empresa"
                        class="form-control @error('nombre_empresa') is-invalid @enderror" placeholder="Tu respuesta"
                        value="{{ old('nombre_empresa') }}">
                    @error('nombre_empresa')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label>Razón Social*</label>
                    <input type="text" name="razon_social"
                        class="form-control @error('razon_social') is-invalid @enderror" placeholder="Tu respuesta"
                        value="{{ old('razon_social') }}">
                    @error('razon_social')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="">RUC*</label>
                    <input type="number" name="ruc" class="form-control @error('ruc') is-invalid @enderror"
                        placeholder="Tu respuesta" value="{{ old('ruc') }}">
                    @error('ruc')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('company')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label>Dirección*</label>
                    <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror"
                        placeholder="Tu respuesta" value="{{ old('direccion') }}">
                    @error('direccion')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Pagina Web</label>
                    <input type="text" name="pagina_web" class="form-control" placeholder="Tu respuesta"
                        value="{{ old('pagina_web') }}">
                </div>
                <div class="form-group col-sm-6">
                    <label>Brochure Coorporativo y/o Carta de presentación</label>
                    <input type="file" accept="application/pdf" name="brochure_url" placeholder="Tu respuesta"
                        value="{{ old('brochure_url') }}">
                </div>
            </div>
            <div class="row mt-3">
                <h5 class="col-sm-12 text-center">DATOS DE CONTACTO</h5>
                <div class="form-group col-sm-6">
                    <label for="">Nombre*</label>
                    <input type="text" name="contacto_nombre"
                        class="form-control @error('contacto_nombre') is-invalid @enderror" placeholder="Tu respuesta"
                        value="{{ old('contacto_nombre') }}">
                    @error('contacto_nombre')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label>Cargo*</label>
                    <input type="text" name="contacto_cargo"
                        class="form-control @error('contacto_cargo') is-invalid @enderror" placeholder="Tu respuesta"
                        value="{{ old('contacto_cargo') }}">
                    @error('contacto_cargo')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Teléfono*</label>
                    <input type="tel" name="contacto_telefono"
                        class="form-control @error('contacto_telefono') is-invalid @enderror" placeholder="Tu respuesta"
                        value="{{ old('contacto_telefono') }}">
                    @error('contacto_telefono')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label>Correo*</label>
                    <input type="email" name="contacto_correo"
                        class="form-control @error('contacto_correo') is-invalid @enderror" placeholder="Tu respuesta"
                        value="{{ old('contacto_correo') }}">
                    @error('contacto_correo')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mt-3">
                <h5 class="col-sm-12 text-center">INFORMACIÓN ADICIONAL</h5>
                <div class="form-group col-sm-6">
                    <label for="">Años de experiencia en el rubro al que postula*</label>
                    <input type="number" name="anios_experiencia"
                        class="form-control @error('anios_experiencia') is-invalid @enderror" placeholder="Tu respuesta"
                        value="{{ old('anios_experiencia') }}">
                    @error('anios_experiencia')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label>Sustentos de experiencia en los últimos 5 años (OPCIONAL)</label>
                    <input type="file" accept="application/pdf" name="sustento_experiencia_url"
                        value="{{ old('sustento_experiencia_url') }}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Facturación 2020 (OPCIONAL)</label>
                    <input type="file" accept="application/pdf" name="facturacion_2020_url"
                        value="{{ old('facturacion_2020_url') }}">
                </div>
                <div class="form-group col-sm-6">
                    <label>Reporte en centrales de riesgo (OPCIONAL)</label>
                    <input type="file" accept="application/pdf" name="reporte_central_url"
                        value="{{ old('reporte_central_url') }}">
                    <input type="hidden" name="convocatorias_id" value="{{ $convocatoria->id }}">
                </div>
              
                <div class="form-group mt-5">
                    {!! Form::submit('Registrarse', ['class' => 'btn btn-primary mt-2']) !!}
                </div>
            </div>
           
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
{{-- </body>
<script>
    @if (Session::has('message'))
        Swal.fire({
        title: 'Exito!',
        text: "{{ session('message') }} Pronto le enviaremos un correo de confirmacion a su correo registrado" ,
        icon: 'success',
        confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="https://consorciogczorion.pe/";
            }
        });
    @endif
</script>

</html> --}}
