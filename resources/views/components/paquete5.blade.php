@extends('layouts.frontend')
@section('title') {{$titulo}} @endsection
@section('content')
    <div class="paquete5__head">
      <video src="/images/{{$video}}" autoplay muted loop></video>
        <div class="paquete5__head-copy">
          <h1>{{$titulo}}</h1>
          <h3>{{$subtitle}}</h3>
          <p>{{$region}}</p>
        </div>
    </div>
    <div class="container">

      <div class="paquete5__proyecto">
        <div class="paquete5__proyecto-map">
          <iframe src="{{$mapa}}" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="paquete5__proyecto-info">
          <h5>{{$subtitle}} {{$titulo}}</h5>
          <p><strong>Departamento: </strong>{{$region}}</p>
          <p><strong>Provincia: </strong>{{$region}}</p>
        </div>
      </div>

      


      <div class="paquete5__convocatorias">
        <h3>Convocatorias</h3>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Abiertas</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">En proceso</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Cerradas</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"> 

           
            {{-- convocatorias abiertas loop --}}
            <div class="paquete5__convocatorias-content">
              @foreach ( $abiertas as $abierta )
                <a href="{{URL::to('/paquete5/convocatoria/'.$abierta->slug);}}">
                  <div class="paquete5__convocatorias-box">
                    <h4>{{$abierta->titulo}}</h4>
                    <p>{{$abierta->cantidad}} Vacante</p>
                    <span>Estado: {{$abierta->estado}}</span>
                  </div>
                </a>
              @endforeach
            </div>
            
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            {{-- convocatorias en proceso loop  --}}
            <div class="paquete5__convocatorias-content">
              @foreach ( $enprocesos as $enproceso )
                <a href="{{URL::to('/paquete5/convocatoria/'.$enproceso->slug);}}">
                  <div class="paquete5__convocatorias-box">
                    <h4>{{$enproceso->titulo}}</h4>
                    <p>{{$enproceso->cantidad}} Vacante</p>
                    <span>Estado: {{$enproceso->estado}}</span>
                  </div>
                </a>
              @endforeach
            </div>

          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
           {{-- convocatorias cerradas loop  --}}
            <div class="paquete5__convocatorias-content">
              @foreach ( $cerradas as $cerrado )
              <a href="{{URL::to('/paquete5/convocatoria/'.$cerrado->slug);}}">
                <div class="paquete5__convocatorias-box">
                  <h4>{{$cerrado->titulo}}</h4>
                  <p>{{$cerrado->cantidad}} Vacante</p>
                  <span>Estado: {{$cerrado->estado}}</span>
                </div>
              </a>
              @endforeach
            </div>

          </div>
        </div>
      </div>
    </div>
    
@endsection