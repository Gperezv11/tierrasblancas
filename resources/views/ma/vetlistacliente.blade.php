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