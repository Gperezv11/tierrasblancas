@extends('layouts.app')

@section('css')
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lista de Clientes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item">Veterinaria</li>
                    <li class="breadcrumb-item">Lista de Clientes</li>
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
                    <div class="card-body">
                        <table id="tabla-animal" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <td>Rut</td>
                                    <td>Nombre</td>
                                    <td>Direccion</td>
                                    <td>Sector</td>
                                    <td>Correo</td>
                                    <td>Telefono</td>
                                    <td>Comentario</td>
                                    <td>Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cliente as $c)
                                <tr>
                                    <td>{{ $c->rut }}</td>
                                    <td>{{ $c->nombre }} {{ $c->apellido_p }} {{ $c->apellido_m }}</td>
                                    <td>{{ $c->direccion }}</td>
                                    <td>{{ $c->sector }}</td>
                                    <td>{{ $c->correo }}</td>
                                    <td>{{ $c->telefono }}</td>
                                    <td>{{ $c->referencia }}</td>
                                    <td>
                                        <form action="{{ route('lvetcliente.destroy', $c->id) }}" method="POST">
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#editModal{{ $c->id }}">Editar</button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $c->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Editar Cliente</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('lvetcliente.update', $c->id) }}" method="post">
                                                    @csrf
                                                    {{ method_field('PUT') }}
                                                    <div class="form-group">
                                                        <label for="">Rut</label>
                                                        <input type="text" class="form-control" name="rut_edit"
                                                            id="rut_edit" value="{{ $c->rut }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre_edit"
                                                            id="nombre_edit" value="{{ $c->nombre }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Apellido Paterno</label>
                                                        <input type="text" class="form-control" name="apellidop_edit"
                                                            id="apellidop_edit" value="{{ $c->apellido_p }}">
                                                    </div>                             
                                                    <div class="form-group">
                                                        <label for="">Apellido Materno</label>
                                                        <input type="text" class="form-control" name="apellidom_edit"
                                                            id="apellidop_edit" value="{{ $c->apellido_m }}">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="">Dirección</label>
                                                      <input type="text"
                                                        class="form-control" name="direc_edit" id="direc_edit" value="{{ $c->direccion }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Sector</label>
                                                        <select class="form-control" name="sector_edit" id="sector_edit">
                                                            <option value="" disabled selected>Elija un sector</option>
                                                            <option value="1" {{ $c->sector == 1 ? 'selected' : '' }}>Sector A</option>
                                                            <option value="2" {{ $c->sector == 2 ? 'selected' : '' }}>Sector B</option>
                                                            <option value="3" {{ $c->sector == 3 ? 'selected' : '' }}>Sector C</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Correo</label>
                                                        <input type="text" class="form-control" name="correo_edit"
                                                            id="correo_edit" value="{{ $c->correo }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Telefono</label>
                                                        <input type="text" class="form-control" name="telefono_edit"
                                                            id="telefono_edit" value="{{ $c->telefono }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Referencia</label>
                                                        <textarea class="form-control" name="referencia_edit" id="referencai_edit"
                                                            rows="3">{{ $c->referencia }}</textarea>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
    $(document).ready(function() {
        $.noConflict();
            $('#tabla-animal').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json',
                    responsive: true
                }
            });
        });
</script>
@endsection