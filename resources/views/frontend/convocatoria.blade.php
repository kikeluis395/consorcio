@extends('layouts.frontend')

@section('title', $convocatoria[0]->titulo)

@section('content')
  @foreach ($convocatoria as $conv)
  
    @if ($conv->estado === 'Cerrado')
    <div class="convocatoria__head off">
    @else 
    <div class="convocatoria__head"> 
    @endif
     <div class="convocatoria__head-content">
       <div class="container">
        <h5>Convocatoria  <i class="fas fa-chevron-right"></i> {{$conv->region->nombre}}</h5>
        <h2>{{$conv->titulo}}</h2>
        
       
       </div>
     </div>
   </div>
   
   <div class="container">
     <div class="convocatoria__content">
       <strong>Alcance:</strong>
       <div class="convocatoria__alcance" style="word-wrap: break-word;">{!! $conv->alcance !!}</div>
       <div class="row">
         <div class="col-sm-4 "><strong>Vacantes: </strong><br>{{$conv->cantidad}}</div>
         <div class="col-sm-4"><strong>Empresa Adjudicada: </strong><br>{{$conv->adjudicado}}</div>
         <div class="col-sm-4"><strong>Fecha de confirmación de participación </strong><br>
          {{ $conv->fecha_inicio == null ? '-' : \Carbon\Carbon::parse($conv->fecha_inicio)->format('d-m-Y') }}
        </div>
         <div class="col-sm-4 mt-3"><strong>Envío de Bases y anexos a los preseleccionados: </strong><br>      
          {{ $conv->fecha_bases == null ? '-' : Carbon\Carbon::parse($conv->fecha_bases)->format('d-m-Y') }}
        </div>
         {{-- <div class="col-sm-4"><strong>Envío de consultas y/o visitas a obra: </strong>{{$conv->consulta}}</div> --}}
         <div class="col-sm-4 mt-3"><strong>Respuesta a consultas: </strong><br>
          {{ $conv->fecha_consulta == null ? '-' : Carbon\Carbon::parse($conv->fecha_consulta)->format('d-m-Y')}}
        </div>
         <div class="col-sm-4 mt-3"><strong>Fecha de entrega de propuestas y de requisitos de preselección: </strong><br>
          {{ $conv->fecha_propuestas == null ? '-' : Carbon\Carbon::parse($conv->fecha_propuestas)->format('d-m-Y') }}
        </div>
        <div class="col-sm-4 mt-3"><strong>Fin del proceso de licitación: </strong><br>
            {{$conv->fecha_fin == null ? '-' : Carbon\Carbon::parse($conv->fecha_fin)->format('d-m-Y')}}
        </div>

         {{-- <br>
         <br> --}}
         
       </div>
       <br>

       <div class="row">

         <div class="col-sm-4">
           <a target="_blank" href="{{$conv->tdr_url}}" class="btn btn-success" title="Descargar TDR"><i class="fas fa-download"></i> TDR</a>
         </div>
        @if ($conv->estado == 'Cerrado')
          <div class="col-sm-4">
            <a target="_blank" href="{{$conv->proceso_url}}" class="btn btn-primary" title="Descargar Evaluación"><i class="fas fa-download"></i>  Evaluación </a>
          </div>
          <div class="col-sm-4">
            <a target="_blank" href="{{$conv->resultado_url}}" class="btn btn-secondary" title="Descargar resultados"><i class="fas fa-download"></i> Resultados</a>
          </div>
        @endif


       </div>


       @if ($conv->estado == 'Abierto')
       <a href="/convocatoria/registro/{{$conv->id}}" class="btn convocatoria__content-registro btn-consorcio"><i class="fas fa-edit"></i> Participar en convocatoria</a>
       @elseif($conv->estado == 'En proceso')
       <a href="#" class="btn convocatoria__content-registro" style="background:#0075d4;"><i class="fas fa-spinner fa-spin"></i> Esta convocatoria esta en proceso</a>
       @else 
       <a href="#" class="btn convocatoria__content-registro btn-cerrado">Esta convocatoria esta cerrada</a>
       @endif
       
     </div>


     <h4 style="text-align: center;margin:4rem 0 2rem 0;">Empresas participantes</h4>
     <div class="convocatoria__empresas table-responsive-md">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Empresa (Razón Social)</th>
            <th scope="col">Fecha de registro</th>
            <th scope="col">1ra Pre Seleción</th>
            <th scope="col">Propuesta selecionada</th>
            <th scope="col">2da Preseleccioón</th>
            <th scope="col">Ganador</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($empresas as $empresa )
            <tr key="{{$empresa->id}}" class="{{$empresa->resultado == 1 ? 'table-success' :  ''}}">
              <td scope="row">{{$empresa->razon_social}}</td>
              <td>{{$empresa->fecha_registro}}</td>
              <td>
                @if($empresa->propuesta_recepcionada == 1)
                Si 
                @elseif($empresa->propuesta_recepcionada == 0)
                No
                @else
                  - 
                @endif
              </td>
              <td>
                @if($empresa->preseleccionado == 1)
                Si 
                @elseif($empresa->preseleccionado == 0)
                No
                @else
                  -
                @endif
              </td>
              <td>
                @if($empresa->seleccionado == 1)
                Si 
                @elseif($empresa->seleccionado == 0)
                No
                @else
                  - 
                @endif
              </td>
              <td>
                @if($empresa->resultado == 1)
                Adjudicado  
                @elseif($empresa->resultado == 0)
                No
                @else
                  - 
                @endif
              </td>
            </tr>    
          @endforeach
      
        </tbody>
      </table>
      
    </div>

   </div>
   
     
   @endforeach
   <script>
     @if (Session::has('message'))
         Swal.fire({
         title: 'Registro Exitoso!',
         text: "{{ session('message') }} Pronto le enviaremos un correo de confirmacion a su correo registrado" ,
         icon: 'success',
         confirmButtonText: 'OK'
         })
     @endif
   </script>
@endsection