@extends('adminlte::page')

@section('title', 'Ver Convocatorias')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
                                    alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection

@section('content_header')
    <h1>Ver Convocatorias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
                @if(auth()->user()->hasRole('Admin'))
                <a class="btn btn-success" href="{{ route('admin.convocatorias.create') }}">Crear Convocatoria</a>
                @endif
                <div class="col-md-4 p-0 mt-4" id="select_estado">
                </div>
                <div class="col-md-4 p-0 mt-4" id="select_region">
                </div>
            </div>
        <div class="card-body">
            <table class="table table-striped display" id="empresas" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Cantidad</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Adjudicado</th>
                        <th>Inicio de convocatoria</th>
                        <th>Envio de bases y anexos a preseleccionados</th>
                        <th>Envío de consultas</th>
                        <th>Fecha limite de entrega de propuestas y requisitos</th>
                        <th>Fin de proceso de licitación</th>
                        <th>Alcance</th>
                        <th>Tdr Url</th>
                        <th>Proceso Url</th>
                        <th>Resultado Url</th>
                        <th>Region</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($convocatorias as $convocatoria)
                        <tr>
                            <td>{{ $convocatoria->id }}</td>
                            <td>{{ $convocatoria->titulo }}</td>
                            <td>{{ $convocatoria->cantidad }}</td>
                            <td>{{ $convocatoria->email }}</td>
                            <td>{{ $convocatoria->estado }}</td>
                            <td>{{ $convocatoria->adjudicado ? $convocatoria->adjudicado : 'No asignado' }}</td>
                            <td>{{ $convocatoria->fecha_inicio == null ? '-' : Carbon\Carbon::parse($convocatoria->fecha_inicio)->format('d-m-Y') }}</td>
                            <td>{{ $convocatoria->fecha_bases == null ? '-' : Carbon\Carbon::parse($convocatoria->fecha_bases)->format('d-m-Y')}}</td>
                            <td>{{ $convocatoria->fecha_consulta == null ? '-' :Carbon\Carbon::parse($convocatoria->fecha_consulta)->format('d-m-Y')}}</td>
                            <td>{{ $convocatoria->fecha_propuestas == null ? '-' : Carbon\Carbon::parse($convocatoria->fecha_propuestas)->format('d-m-Y')}}</td>
                            <td>{{ $convocatoria->fecha_fin == null ? '-' :Carbon\Carbon::parse($convocatoria->fecha_fin)->format('d-m-Y')}}</td>
                            <td>{{ $convocatoria->alcance }}</td>
                            <td><a href="{{ $convocatoria->tdr_url }}">{{ $convocatoria->tdr_url }}</a></td>
                            <td><a href="{{ $convocatoria->proceso_url }}">{{ $convocatoria->proceso_url }}</a></td>
                            <td><a href="{{ $convocatoria->resultado_url }}">{{ $convocatoria->resultado_url }}</a>
                            </td>
                            <td>{{ $convocatoria->nombre }}</td>
                            <td width="10px" style="display: flex">
                                <a class="btn btn-primary mr-1"
                                    href="{{ route('admin.convocatorias.edit', $convocatoria) }}" title="Editar"><i class="far fa-edit"></i></a>
                                <a class="btn btn-info mr-1"
                                    href="{{ route('admin.convocatorias.show', $convocatoria) }}" title="Ver"><i class="fas fa-eye"></i></a>
                                @if(auth()->user()->hasRole('Admin'))
                                    <form  action="{{ route('admin.convocatorias.destroy', $convocatoria) }}" 
                                        method="POST" title="Eliminar"> 
                                        @csrf
                                        @method('delete') 
                                        <button class="btn btn-primary">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endIf
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#empresas').DataTable({
            dom: 'Bfrltip',
            "order": [
                [0, "desc"]
            ],
            "responsive": true,
            "sScrollX": true,
            columnDefs: [{
                "targets": [3, 4, 11, 12, 13, 14, 15],
                "visible": false,
                "max-width": "320px",
            }],
            language: {
                sProcessing: "Procesando...",
                sLengthMenu: "Mostrar _MENU_ registros",
                sZeroRecords: "No se encontraron resultados",
                sEmptyTable: "Ningún dato disponible en esta tabla",
                sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                sInfoPostFix: "",
                sSearch: "Buscar:",
                sUrl: "",
                sInfoThousands: ",",
                sLoadingRecords: "Cargando...",
                oPaginate: {
                    sFirst: "Primero",
                    sLast: "Último",
                    sNext: "Siguiente",
                    sPrevious: "Anterior",
                },
                oAria: {
                    sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                    sSortDescending: ": Activar para ordenar la columna de manera descendente",
                },
            },

            initComplete: function() {
                    this.api().columns([4]).every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-control"><option value="">Todos los estados</option></select>'
                            )
                            .appendTo('#select_estado')
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });
                        column.data().unique().sort().each(function(d, j) {
                            if (column.search() === '^' + d + '$') {
                                select.append(
                                    '<option value="' + d + '" selected="selected">' +
                                    d +
                                    '</option>'
                                )
                            } else {
                                select.append('<option value="' + d + '">' + d + '</option>')
                            }
                        });
                    });
                    this.api().columns([15]).every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-control"><option value="">Todos las regiones</option></select>'
                            )
                            .appendTo('#select_region')
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });
                        column.data().unique().sort().each(function(d, j) {
                            if (column.search() === '^' + d + '$') {
                                select.append(
                                    '<option value="' + d + '" selected="selected">' +
                                    d +
                                    '</option>'
                                )
                            } else {
                                select.append('<option value="' + d + '">' + d + '</option>')
                            }
                        });
                    });
                },
            });
    </script>
    <script>
        @if (Session::has('message'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
@endsection
