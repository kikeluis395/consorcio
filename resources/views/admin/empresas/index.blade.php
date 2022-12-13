@extends('adminlte::page')

@section('title', 'Ver Usuarios')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection

@section('content')

    
        <a class="btn btn-info mt-2 mb-2" href="{{URL::to('/admin/convocatorias')}}"><i class="fas fa-long-arrow-alt-left"></i> Volver a Convocatorias</a>
   

    <div class="card">
        <div class="card-header">
            @if (Request::is('admin/convocatorias/*'))
                <h3>{{ $convocatoria->titulo }} - {{$convocatoria->region->nombre}}</h3>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <strong>Cantidad:</strong> {{ $convocatoria->cantidad }}
                    </div>
                    <div class="col-md-4 mb-2">
                        <strong>Estado:</strong> {{ $convocatoria->estado }}
                    </div>
                    <div class="col-md-4 mb-2">
                        <strong>Fecha inicio:</strong>

                        {{ $convocatoria->fecha_inicio == null ? '-' : Carbon\Carbon::parse($convocatoria->fecha_inicio)->format('d-m-Y') }}
                    </div>
                    <div class="col-md-4 mb-2">
                        <strong>Fecha de envio de bases:</strong>
                        {{ $convocatoria->fecha_bases == null ? '-' : Carbon\Carbon::parse($convocatoria->fecha_bases)->format('d-m-Y') }}
                    </div>
                    <div class="col-md-4 mb-2">
                        <strong>Fecha de envio de consultas:</strong>
                        {{ $convocatoria->fecha_consulta == null ? '-' : Carbon\Carbon::parse($convocatoria->fecha_consulta)->format('d-m-Y') }}
                    </div>
                    <div class="col-md-4 mb-2">
                        <strong>Fecha de envio de propuestas:</strong>
                        {{ $convocatoria->fecha_propuestas == null ? '-' : Carbon\Carbon::parse($convocatoria->fecha_propuestas)->format('d-m-Y') }}
                    </div>
                    <div class="col-md-4 mb-2">
                        <strong>Fecha de fin de proceso de licitación:</strong>
                        {{ $convocatoria->fecha_fin == null ? '-' : Carbon\Carbon::parse($convocatoria->fecha_fin)->format('d-m-Y') }}
                    </div>
                    <div class="col-md-4 mb-2">
                        <strong>TDR:</strong> <a class="btn btn-primary btn-sm" href="{{ $convocatoria->tdr_url }}"
                            target="_blank">Ver</a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <strong>Proceso:</strong> <a class="btn btn-primary btn-sm"
                            href="{{ $convocatoria->proceso_url }}" target="_blank">Ver</a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <strong>Resultado:</strong> <a class="btn btn-primary btn-sm"
                            href="{{ $convocatoria->resultado_url }}" target="_blank">Ver</a>
                    </div>
                    <div class="col-md-12">
                        <strong>Alcance:</strong>
                        <div class="convocatoria__alcance">
                            {!! $convocatoria->alcance !!}
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-4 p-0 mt-4" id="select_convocatoria">
                </div>
            @endif

        </div>
        <div class="card-body">
            <h2 style="display: inline-block">Empresas participantes</h2>
            @if (Request::is('admin/convocatorias/*'))


                @if ($convocatoria->region->paquete->nombre == 'Paquete 6')
                    <a target="_blank" style="margin-left:20px" class="btn btn-warning btn-sm"
                        href="{{ URL::to('/') . '/paquete6/convocatoria/' . $convocatoria->slug }}">
                        <i class="far fa-eye"></i> Ver en la web
                    </a>
                @else
                    <a target="_blank" style="margin-left:20px" class="btn btn-warning btn-sm"
                        href="{{ URL::to('/') . '/paquete5/convocatoria/' . $convocatoria->slug }}">
                        <i class="far fa-eye"></i> Ver en la web
                    </a>

                @endif

            @endif


            <table class="table table-striped" id="empresas">
                <thead>
                    <tr>
                        <th class="w-full">ID</th>
                        <th class="w-full">Empresa</th>
                        <th class="w-full">Razon Social</th>
                        <th class="w-full">RUC</th>
                        <th class="w-full">Dirección</th>
                        <th class="w-full">Pagina Web</th>
                        <th class="w-full">Brochure</th>
                        <th class="w-full">Contacto</th>
                        <th class="w-full">Cargo del Contacto</th>
                        <th class="w-full">Teléfono</th>
                        <th class="w-full">Correo</th>
                        <th class="w-full">Fecha registro</th>
                        <th class="w-full">Años de exp</th>
                        <th class="w-full">Sustento Experiencia</th>
                        <th class="w-full">Facturación 2020</th>
                        <th class="w-full">Reporte Central</th>
                        @if (Request::is('admin/convocatorias/*'))
                            <th class="w-full" style="min-width: 100px">1ra Selección</th>
                            <th class="w-full">Propuesta recepcionada</th>
                            <th class="w-full" style="min-width: 100px">2da Selección</th>
                            <th class="w-full" style="min-width: 100px">Ganador licitación</th>
                            @if(auth()->user()->hasRole('Admin'))
                                <th class="w-full">Acciones</th>
                            @endIf
                        @endIf
                        <th>Convocatoria</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->id }}</td>
                            <td>{{ $empresa->nombre_empresa }}</td>
                            <td>{{ $empresa->razon_social }}</td>
                            <td>{{ $empresa->ruc }}</td>
                            <td>{{ $empresa->direccion }}</td>
                            <td><a href="{{ $empresa->pagina_web }}">{{ $empresa->pagina_web }}</a></td>
                            @if ($empresa->brochure_url == '')
                                <td><a href="{{ $empresa->brochure_url }}"> - </a></td>
                            @else
                                <td><a
                                        href="{{ $empresa->brochure_url }}">{{ URL::to('/') . $empresa->brochure_url }}</a>
                                </td>
                            @endIf
                            <td>{{ $empresa->contacto_nombre }}</td>
                            <td>{{ $empresa->contacto_cargo }}</td>
                            <td>{{ $empresa->contacto_telefono }}</td>
                            <td>{{ $empresa->contacto_correo }}</td>
                            <td>{{ $empresa->fecha_registro }}</td>
                            <td>{{ $empresa->anos_experiencia }}</td>
                            @if ($empresa->sustento_experiencia_url == '')
                                <td><a href="{{ $empresa->sustento_experiencia_url }}"> - </a></td>
                            @else
                                <td><a
                                        href="{{ $empresa->sustento_experiencia_url }}">{{ URL::to('/') . $empresa->sustento_experiencia_url }}</a>
                                </td>
                            @endIf
                            @if ($empresa->facturacion_2020_url == '')
                                <td><a href="{{ $empresa->facturacion_2020_url }}"> - </a></td>
                            @else
                                <td><a
                                        href="{{ $empresa->facturacion_2020_url }}">{{ URL::to('/') . $empresa->facturacion_2020_url }}</a>
                                </td>
                            @endIf
                            @if ($empresa->reporte_central_url == '')
                                <td><a href="{{ $empresa->reporte_central_url }}"> - </a></td>
                            @else
                                <td><a
                                        href="{{ $empresa->reporte_central_url }}">{{ URL::to('/') . $empresa->reporte_central_url }}</a>
                                </td>
                            @endIf
                            {{-- //si estamos en la ruta de ver convocatoria --}}
                            @if (Request::is('admin/convocatorias/*'))
                                <td>
                                    @if ($empresa->preseleccionado === '1')
                                        Si
                                    @elseif($empresa->preseleccionado ==='0')
                                        No
                                    @elseif($convocatoria->estado != 'Cerrado')
                                        <form class="d-inline-block"
                                            action="{{ route('admin.empresas.revision', $empresa) }}" method="PUT"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="tipo" value="1">
                                            <input type="hidden" name="opcion" value="1">
                                            <button type="submit" class="btn btn-success">
                                                Si
                                            </button>
                                        </form>
                                        <form class="d-inline-block"
                                            action="{{ route('admin.empresas.revision', $empresa) }}" method="PUT"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="tipo" value="1">
                                            <input type="hidden" name="opcion" value="0">
                                            <button type="submit" class="btn btn-danger">
                                                No
                                            </button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    @if ($empresa->preseleccionado === '2')
                                        *
                                    @else
                                        @if ($empresa->propuesta_recepcionada === '1')
                                            Si
                                        @elseif($empresa->propuesta_recepcionada ==='0')
                                            No
                                        @elseif($empresa->preseleccionado === '0')
                                            -
                                        @elseif($convocatoria->estado != 'Cerrado')
                                            <form class="d-inline-block"
                                                action="{{ route('admin.empresas.revision', $empresa) }}" method="PUT"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="tipo" value="2">
                                                <input type="hidden" name="opcion" value="1">
                                                <button type="submit" class="btn btn-success">
                                                    Si
                                                </button>
                                            </form>
                                            <form class="d-inline-block"
                                                action="{{ route('admin.empresas.revision', $empresa) }}" method="PUT"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="tipo" value="2">
                                                <input type="hidden" name="opcion" value="0">
                                                <button type="submit" class="btn btn-danger">
                                                    No
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if ($empresa->propuesta_recepcionada === '2')
                                        *
                                    @else
                                        @if ($empresa->seleccionado === '1')
                                            Si
                                        @elseif($empresa->seleccionado ==='0')
                                            No
                                        @elseif($empresa->propuesta_recepcionada === '0' || $empresa->preseleccionado === '0')
                                            -
                                        @elseif($convocatoria->estado != 'Cerrado')
                                            <form class="d-inline-block"
                                                action="{{ route('admin.empresas.revision', $empresa) }}" method="PUT"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="tipo" value="3">
                                                <input type="hidden" name="opcion" value="1">
                                                <button type="submit" class="btn btn-success">
                                                    Si
                                                </button>
                                            </form>
                                            <form class="d-inline-block"
                                                action="{{ route('admin.empresas.revision', $empresa) }}" method="PUT"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="tipo" value="3">
                                                <input type="hidden" name="opcion" value="0">
                                                <button type="submit" class="btn btn-danger">
                                                    No
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if ($empresa->seleccionado === '2')
                                        *
                                    @else
                                        @if ($empresa->resultado === '1')
                                            Si
                                        @elseif($empresa->resultado ==='0')
                                            No
                                        @elseif($empresa->propuesta_recepcionada === '0' || $empresa->preseleccionado
                                            ===
                                            '0' ||
                                            $empresa->seleccionado === '0')
                                            -
                                        @elseif($convocatoria->estado != 'Cerrado')
                                            <form class="d-inline-block"
                                                action="{{ route('admin.empresas.revision', $empresa) }}" method="PUT"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="tipo" value="4">
                                                <input type="hidden" name="opcion" value="1">
                                                <button type="submit" class="btn btn-success">
                                                    Si
                                                </button>
                                            </form>
                                            <form class="d-inline-block"
                                                action="{{ route('admin.empresas.revision', $empresa) }}" method="PUT"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="tipo" value="4">
                                                <input type="hidden" name="opcion" value="0">
                                                <button type="submit" class="btn btn-danger">
                                                    No
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                                @if(auth()->user()->hasRole('Admin'))
                                    <td>
                                        <form action="{{ route('admin.empresas.destroy', $empresa) }}" method="POST"
                                            title="Eliminar">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-primary">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            @endif
                            <td>{{ $empresa->titulo }}</td>
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
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

    <script>
        $('#empresas').DataTable({
            dom: 'Bfrltip',
            buttons: [{
                extend: 'excelHtml5',
                @if (Request::is('admin/convocatorias/*'))
                    title: '{!! $convocatoria->titulo !!}',
                @else
                    title: 'Empresas',
                @endIf
                text: 'Exportar Excel',
                className: 'btn btn-success',
                exportOptions: {
                    @if (Request::is('admin/convocatorias/*'))
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16, 17, 18, 19],
                    @else
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15],
                    @endif
                },
            }, ],
            columnDefs: [{
                @if (Request::is('admin/convocatorias/*'))
                    "targets": [1, 3, 4, 5, 6, 8, 12, 13, 14, 15,20],
                @else
                    "targets": [1,3, 4, 5, 6, 8, 12, 13, 14, 15, 16],
                @endif 
                    "visible": false,
            }],
            order: [
                [0, "desc"]
            ],
            responsive: true,
            sScrollX: true,
            @if (Request::is('admin/empresas'))
                initComplete: function() {
                this.api().columns([16]).every(function() {
                var column = this;
                var select = $(
                '<select class="form-control"><option value="">Todas las convocatorias</option></select>'
                )
                .appendTo('#select_convocatoria')
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
            @endif
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
