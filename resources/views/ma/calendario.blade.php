@extends('layouts.app')

@section('css')
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    RTL version -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />
@endsection

@section('content')
    <div class="container">
        <div id="agenda">
        </div>
    </div>
    <!-- Modal Crear -->
    <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ingreso Nueva Consulta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" autocomplete="off">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <input type="text" class="form-control" name="id" id="id" hidden>
                        </div>

                        <div class="form-group">
                            <label for="">Nombre de Mascota</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                                placeholder="Por favor ingrese el nombre de la mascota">
                        </div>

                        <div class="form-group">
                            <label for="">Medico Tratante</label>
                            <select class="form-control" name="medico" id="medico">
                                <option value="" disabled selected>Seleccione un medico</option>
                                @foreach ($medicos as $m)
                                    <option value="{{ $m->nombre }}">{{ $m->nombre }} {{ $m->apellido_p }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Rut Cliente</label>
                            <input type="text" class="form-control" name="rut_cliente" id="rut_cliente"
                                aria-describedby="helpId" placeholder="Ingrese rut cliente">
                        </div>

                        <div class="form-group">
                            <label for="">Nombre Cliente</label>
                            <input type="text" class="form-control" name="nom_cliente" id="nom_cliente"
                                aria-describedby="helpId" placeholder="Ingrese nombre cliente">
                        </div>

                        <div class="form-group">
                            <label for="">E-mail Cliente</label>
                            <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId"
                                placeholder="E-mail Cliente">
                        </div>

                        <div class="form-group">
                            <label for="">Telefono Cliente</label>
                            <input type="text" class="form-control" name="fono" id="fono" aria-describedby="helpId"
                                placeholder="Telefono Cliente">
                        </div>

                        <div class="form-group">
                          <label for="">Tipo de Servicio</label>
                          <select class="form-control" name="tservicio" id="tservicio">
                            <option value="" disabled selected>Seleccione un servicio</option>
                            <option value="Consulta">Consulta</option>
                            <option value="Cirugia">Cirugia</option>
                            <option value="Vacuna">Vacuna</option>
                            <option value="Procedimiento">Procedimiento</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                        </div>

                        <div class="form-group d-none">
                            <label for="start">Fecha</label>
                            <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId"
                                placeholder="">
                        </div>

                        <div class="form-group d-none">
                            <label for="end">Termino</label>
                            <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId"
                                placeholder="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Editar o Eliminar -->
    <div class="modal fade" id="evento-edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" autocomplete="off">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <input type="text" class="form-control" name="id" id="id" hidden>
                        </div>

                        <div class="form-group">
                            <label for="">Nombre de Mascota</label>
                            <input type="text" class="form-control" name="title_edit" id="title_edit"
                                aria-describedby="helpId" placeholder="Por favor ingrese el nombre de la mascota">
                        </div>

                        <div class="form-group">
                            <label for="">Medico Tratante</label>
                            <select class="form-control" name="medico_edit" id="medico_edit">
                                <option value="" disabled selected>Seleccione un medico</option>
                                @foreach ($medicos as $m)
                                    <option value="{{ $m->nombre }}">{{ $m->nombre }} {{ $m->apellido_p }} {{ $m->apellido_m }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Nombre Cliente</label>
                            <input type="text" class="form-control" name="nombre_cliente_edit" id="nombre_cliente_edit"
                                aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">Rut Cliente</label>
                            <input type="text" class="form-control" name="rut_cliente_edit" id="rut_cliente_edit"
                                aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">E-mail Cliente</label>
                            <input type="text" class="form-control" name="email_edit" id="email_edit"
                                aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">Telefono Cliente</label>
                            <input type="text" class="form-control" name="fono_edit" id="fono_edit"
                                aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                            <label for="">Tipo de Servicio</label>
                            <select class="form-control" name="tservicio_edit" id="tservicio_edit">
                              <option value="" disabled selected>Seleccione un servicio</option>
                              <option value="Consulta">Consulta</option>
                              <option value="Cirugia">Cirugia</option>
                              <option value="Vacuna">Vacuna</option>
                              <option value="Procedimiento">Procedimiento</option>
                            </select>
                          </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea class="form-control" name="descripcion_edit" id="descripcion_edit"
                                rows="3"></textarea>
                        </div>

                        <div class="form-group d-none">
                            <label for="start">Fecha</label>
                            <input type="text" class="form-control" name="start_edit" id="start_edit"
                                aria-describedby="helpId">
                        </div>

                        <div class="form-group d-none">
                            <label for="end">Termino</label>
                            <input type="text" class="form-control" name="end_edit" id="end_edit" aria-describedby="helpId">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

    </script>
@endsection
