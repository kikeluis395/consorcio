@extends('layouts.frontend')
@section('title') {{'Ancash Costa'}} @endsection
@section('content')
    <div class="paquete6__head">
        <div class="paquete6__head-copy">
          <h1>Ancash Sierra</h1>
          <p>Paquete 6</p>
        </div>
    </div>
    <div class="container">
      
      <div class="paquete6__proyectos">
          
        <div class="paquete6__proyecto">
          <div class="paquete6__proyecto-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.359977612466!2d-77.1695!3d-9.030889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOcKwMDEnNTEuMiJTIDc3wrAxMCcxMC4yIlc!5e0!3m2!1ses-419!2spe!4v1629230128617!5m2!1ses-419!2spe" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
          <div class="paquete6__proyecto-info">
            <h5>IE 84156 - SAN NICOLAS</h5>
            <p><strong>Departamento: </strong>Ancash</p>
            <p><strong>Provincia: </strong>Carlos Fermin Fitzcarrald</p>
            <p><strong>Distrito: </strong> San Nicolás</p>
          </div>
        </div>

        <div class="paquete6__proyecto">
          <div class="paquete6__proyecto-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3934.7079442810864!2d-77.77330599999999!3d-9.534082999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOcKwMzInMDIuNyJTIDc3wrA0NicyMy45Ilc!5e0!3m2!1ses-419!2spe!4v1629230277669!5m2!1ses-419!2spe" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
          <div class="paquete6__proyecto-info">
            <h5>IE 86127 - PARIACOTO</h5>
            <p><strong>Departamento: </strong>Ancash</p>
            <p><strong>Provincia: </strong>Huaraz</p>
            <p><strong>Distrito: </strong> Pariacoto</p>
          </div>
        </div>

        <div class="paquete6__proyecto">
          <div class="paquete6__proyecto-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3940.520471190051!2d-77.86486099999999!3d-9.016193999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOcKwMDAnNTguMyJTIDc3wrA1MSc1My41Ilc!5e0!3m2!1ses-419!2spe!4v1629233148986!5m2!1ses-419!2spe" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
          <div class="paquete6__proyecto-info">
            <h5>IE 86499 LUIS TORRES SALAZAR-HUATA</h5>
            <p><strong>Departamento: </strong>Ancash</p>
            <p><strong>Provincia: </strong>Huaylas</p>
            <p><strong>Distrito: </strong>Huata</p>
          </div>
        </div>

        
        <div class="paquete6__proyecto">
          <div class="paquete6__proyecto-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3938.256573226629!2d-77.92297200000002!3d-9.221333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOcKwMTMnMTYuOCJTIDc3wrA1NScyMi43Ilc!5e0!3m2!1ses-419!2spe!4v1629230506362!5m2!1ses-419!2spe" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
          <div class="paquete6__proyecto-info">
            <h5>IE 88301-PAMPAROMAS</h5>
            <p><strong>Departamento: </strong>Ancash</p>
            <p><strong>Provincia: </strong>Santa</p>
            <p><strong>Distrito: </strong>Pamparomas</p>
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