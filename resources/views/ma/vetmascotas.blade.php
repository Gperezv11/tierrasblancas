@extends('layouts.app')

@section('css')
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lista de Mascotas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item">Veterinaria</li>
                    <li class="breadcrumb-item">Lista de mascotas</li>
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
                                    <td>Nombre Dueño</td>
                                    <td>Nombre Mascota</td>
                                    <td>Especie</td>
                                    <td>Raza</td>
                                    <td>Edad</td>
                                    <td>Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mascota as $m)
                                <tr>
                                    <td>{{ $m->dueno->rut }}</td>
                                    <td>{{ $m->dueno->nombre }}</td>
                                    <td>{{ $m->nombre }}</td>
                                    <td>{{ $m->especie }}</td>
                                    <td>{{ $m->raza }}</td>
                                    <td>{{ $m->edad }}</td>
                                    <td>
                                        <form action="{{ route('vetmascota.destroy', $m->id) }}" method="POST">
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#editModal{{ $m->id }}">Editar</button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $m->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Mascota</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('vetmascota.update', $m->id) }}" method="post">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre_edit"
                                                            id="nombre_edit" value="{{ $m->nombre }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Especie</label>
                                                        <input type="text" class="form-control" name="especie_edit"
                                                            id="especie_edit" value="{{ $m->especie }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Raza</label>
                                                        <input type="text" class="form-control" name="raza_edit"
                                                            id="raza_edit" value="{{ $m->raza }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Fecha de Nacimiento</label>
                                                        <input type="text" class="form-control" name="fdn_edit"
                                                            id="fdn_edit" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Edad</label>
                                                        <input type="text" class="form-control" name="edad_edit"
                                                            id="edad_edit" value="{{ $m->edad }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar
                                                        Cambios</button>
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