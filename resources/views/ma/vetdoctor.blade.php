@extends('layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mantenedor Medico</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">Mantenedor Medico</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#crearModal">Ingreso Nuevo Medico</button>
                        </div>
                        <!-- Modal Crear -->
                        <div class="modal fade" id="crearModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Ingreso Nuevo Doctor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_mascota" action="{{ route('vetmedico.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Rut</label>
                                                <input type="text" class="form-control" name="rut" id="rut">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nombre</label>
                                                <input type="text" class="form-control" name="nombre" id="nom_inp">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Apellido Paterno</label>
                                                <input type="text" class="form-control" name="apellido_p" id="pat_inp">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Apellido Materno</label>
                                                <input type="text" class="form-control" name="apellido_m" id="mat_inp">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Especialidad</label>
                                                <select class='form-control' name="vet_especialidads_id" id="esp_inp">
                                                    <option value="" disabled selected>Elija una especialidad</option>
                                                    @foreach ($especialidad as $s)
                                                        <option value='{{ $s->id }}'>{{ $s->nombre_especialidad }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Codigo Doctor</label>
                                                <input type="text" class="form-control" name="codigo" id="cod_inp">
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-success">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <table id="tabla_medico" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th scope="row">Rut</th>
                                        <th>Nombre</th>
                                        <th>Especialidad</th>
                                        <th>Codigo Doctor</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($medico as $m)
                                        <tr>
                                            <td scope="row">{{ $m->rut }}</td>
                                            <td>{{ $m->nombre }} {{ $m->apellido_p }} {{ $m->apellido_m }}</td>
                                            <td>{{ $m->vet_especialidads_id }}</td>
                                            <td>{{ $m->codigo }}</td>
                                            <td>
                                                <form action="{{ route('vetmedico.destroy', $m->id) }}" method="POST">
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#editModal{{ $m->id }}">Editar</button>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal{{ $m->id }}" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Editar
                                                            Medico
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form name="form1" action="{{ route('vetmedico.update', $m->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                        <div class="modal-body">
                                                            <div class="container">
                                                                <div class="form-group">
                                                                    <label>Rut</label>
                                                                    <input type="text" class="form-control" id="rut"
                                                                        name="rut" value="{{ $m->rut }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nombre</label>
                                                                    <input type="text" class="form-control" id="nom_edit"
                                                                        name="nom_edit" value="{{ $m->nombre }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Apellido Paterno</label>
                                                                    <input type="text" class="form-control" id="pat_edit"
                                                                        name="pat_edit" value="{{ $m->apellido_p }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Apellido Materno</label>
                                                                    <input type="text" class="form-control" id="mat_edit"
                                                                        name="mat_edit" value="{{ $m->apellido_m }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Especialidad</label>
                                                                    <select class='form-control' name="esp_edit" id="esp_edit">
                                                                        <option value="" disabled selected>Elija una especialidad</option>
                                                                        @foreach ($especialidad as $s)
                                                                            <option value='{{ $s->id }}'{{ $s->id == $m->vet_especialidads_id ? 'selected' :'' }}>{{ $s->nombre_especialidad }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Codigo Doctor</label>
                                                                    <input type="text" class="form-control" id="cod_edit"
                                                                        name="cod_edit" value="{{ $m->codigo }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cerrar</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Actualizar</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        //Datatable
        $(document).ready(function() {
            $.noConflict();
            $('#tabla_medico').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json',
                    responsive: true
                }
            });
        });

        $('#rut').change(function() {
                    var rut = $('#rut').val()
                    console.log(rut)
    
                    $.ajax({
                        type: 'get',
                        url: '{!! URL::to('frd') !!}',
                        data: {
                            'rut': rut
                        },
    
                        success: function(data) {
                            // despejar punto
                            var valor = rut.replace('.', '');
                            // Despejar Guión
                            valor = valor.replace('-', '');
                            valor = valor.replace('.', '');
                            // Aislar Cuerpo y Dígito Verificador
                            var cuerpo = valor.slice(0, -1);
    
                            var dv = valor.slice(-1).toUpperCase();
                            var rutformato = cuerpo.substr(0, 2) + "." + cuerpo.substr(
                                    2,
                                    3) + "." + cuerpo.substr(5, cuerpo.length) + "-" +
                                dv;
                            document.getElementById("rut").value = rutformato;
                        },
                    });
    
                    function dgv(T) //digito verificador
                    {
                        var M = 0,
                            S = 1;
                        for (; T; T = Math.floor(T / 10))
                            S = (S + T % 10 * (9 - M++ % 6)) % 11;
                        return S ? S - 1 : 'k';
                    }
                });
    </script>
@endsection
