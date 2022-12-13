@extends('layouts.frontend')
@section('title') {{'Ancash Costa'}} @endsection
@section('content')
    <div class="paquete6__head">
        <div class="paquete6__head-copy">
          <h1>Ancash Costa</h1>
          <p>Paquete 6</p>
        </div>
    </div>
    <div class="container">
      
      <div class="paquete6__proyectos">
          
        <div class="paquete6__proyecto">
          <div class="paquete6__proyecto-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7856.687625906422!2d-78.153194!3d-10.070889!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1629228664462!5m2!1ses-419!2spe" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
          <div class="paquete6__proyecto-info">
            <h5> IE 88106 JOSE CARLOS MARIATEGUI-HUARMEY</h5>
            <p><strong>Departamento: </strong>Ancash</p>
            <p><strong>Provincia: </strong>Huarmey</p>
            <p><strong>Distrito: </strong> Huarmey</p>
          </div>
        </div>

        <div class="paquete6__proyecto">
          <div class="paquete6__proyecto-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.907163448622!2d-78.599194!3d-9.072222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOcKwMDQnMjAuMCJTIDc4wrAzNSc1Ny4xIlc!5e0!3m2!1ses-419!2spe!4v1629228745220!5m2!1ses-419!2spe" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
          <div class="paquete6__proyecto-info">
            <h5>IE 88023 ALMIRANTE MIGUEL GRAU SEMINARIO-CHIMBOTE</h5>
            <p><strong>Departamento: </strong>Ancash</p>
            <p><strong>Provincia: </strong>Santa</p>
            <p><strong>Distrito: </strong> Chimbote</p>
          </div>
        </div>

        <div class="paquete6__proyecto">
          <div class="paquete6__proyecto-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.343812953211!2d-78.153194!3d-10.070889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTDCsDA0JzE1LjIiUyA3OMKwMDknMTEuNSJX!5e0!3m2!1ses-419!2spe!4v1629228782427!5m2!1ses-419!2spe" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
          <div class="paquete6__proyecto-info">
            <h5>IE 89001-CHIMBOTE</h5>
            <p><strong>Departamento: </strong>Ancash</p>
            <p><strong>Provincia: </strong>Santa</p>
            <p><strong>Distrito: </strong>Chimbote</p>
          </div>
        </div>

        
        <div class="paquete6__proyecto">
          <div class="paquete6__proyecto-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.343812953211!2d-78.153194!3d-10.070889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTDCsDA0JzE1LjIiUyA3OMKwMDknMTEuNSJX!5e0!3m2!1ses-419!2spe!4v1629228782427!5m2!1ses-419!2spe" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
          <div class="paquete6__proyecto-info">
            <h5>IE 88336 GASTON VIDAL PORTURAS-NUEVO CHIMBOTE</h5>
            <p><strong>Departamento: </strong>Ancash</p>
            <p><strong>Provincia: </strong>Santa</p>
            <p><strong>Distrito: </strong>Nuevo Chimbote</p>
          </div>
        </div>
       
       

       

      </div>


      <div class="paquete6__convocatorias">
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
            <div class="paquete6__convocatorias-content">
              @foreach ( $abiertas as $abierta )
                <a href="{{URL::to('/paquete6/convocatoria/'.$abierta->slug);}}">
                  <div class="paquete6__convocatorias-box">
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
            <div class="paquete6__convocatorias-content">
              @foreach ( $enprocesos as $enproceso )
                <a href="{{URL::to('/paquete6/convocatoria/'.$enproceso->slug);}}">
                  <div class="paquete6__convocatorias-box">
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
            <div class="paquete6__convocatorias-content">
              @foreach ( $cerradas as $cerrado )
              <a href="{{URL::to('/paquete6/convocatoria/'.$cerrado->slug);}}">
                <div class="paquete6__convocatorias-box">
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