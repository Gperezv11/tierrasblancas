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

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item">Veterinaria</li>
                    <li class="breadcrumb-item">Nuevo Cliente</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="card card-blue">
                <div class="card-header">
                    <h3 class="card-title">Ingreso Cliente</h3>
                </div>
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                aria-controls="nav-home" aria-selected="true">Datos Personales</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                                aria-controls="nav-profile" aria-selected="false">Datos de Mascota</a>
                        </div>
                    </nav>
                    <form name="form_clientemascota" id="form_clientemascota" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                {{-- Datos Personales --}}
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Rut</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="rut" id="rut"
                                                                placeholder="Ingrese rut sin guion ni puntos">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nombre</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="nombre_input"
                                                                id="nombre_input" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Apellido
                                                            Paterno</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="pat_input"
                                                                id="pat_input" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Apellido
                                                            Materno</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="mat_input"
                                                                id="mat_input" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Region</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="region_dd"
                                                                id="region_dd">
                                                                <option value="" disabled selected>Elija una región
                                                                </option>
                                                                @foreach ($region as $r)
                                                                <option value="{{ $r->id }}">
                                                                    {{ $r->nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Comuna</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="comuna_dd"
                                                                id="comuna_dd">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Direccion</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="dire_input"
                                                                id="dire_input" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Sector</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="sector_dd"
                                                                id="sector_dd">
                                                                <option value="" disabled selected>Elija un sector
                                                                </option>
                                                                <option value="1">Sector A</option>
                                                                <option value="2">Sector B</option>
                                                                <option value="3">Sector C</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Correo</label>
                                                        <div class="col-sm-9">
                                                            <input type="email" class="form-control" name="email_input"
                                                                id="email_input" aria-describedby="helpId"
                                                                placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Telefono</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="tele_input"
                                                                id="tele_input" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Referencia o Nota</label>
                                                        <textarea class="form-control" name="ref_input" id="ref_input"
                                                            rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <p>Imagen de referencia</p>
                                                        <img id="blah" class="" src="https://via.placeholder.com/150" alt="" style="max-width:150px;width:100%">
                                                        <br>
                                                        <input id="foto_pet" accept="image/*" type='file' name="foto_pet"/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Nombre</label>
                                                        <input type="text" class="form-control" name="nom_pet" id="nom_pet">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Especie</label>
                                                        <select class="form-control" name="especie_dd" id="especie_dd">
                                                            <option value="Perro">Perro</option>
                                                            <option value="Gato">Gato</option>
                                                            <option value="Huron">Huron</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Raza</label>
                                                        <input type="text" class="form-control" name="raza_pet" id="raza_pet">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Fecha de nacimiento</label>
                                                        <input type="date" class="form-control datepicker" name="fdc_pet" id="fdc_pet">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Edad</label>
                                                        <input type="number" class="form-control" name="edad_pet" id="edad_pet">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="btn-div">
                            <div class="col-md-12 float">
                                <input type="button" name="save" class="btn btn-primary" value="Crear Ficha"
                                    id="butsave">
                            </div>
                            <style>
                                #btn-div {
                                    float: left;
                                }
                            </style>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    <script type="text/javascript">
    
    //Visualizador de Imagen
    foto_pet.onchange = evt => {
        const [file] = foto_pet.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }

    //Calculador edad
    $(document).on('change', '#fdc_pet', function() {

        var fechin = document.getElementById('fdc_pet').value;
        var today = new Date(),
            dob = new Date(fechin),
            age = new Date(today - dob).getFullYear() - 1970;

        document.getElementById('edad_pet').value = age;
    });
    
                $('.addfiles').on('click', function() { $('#fileupload').click();return false;});
            //formateador Rut cliente
                $('#rut').change(function() {
                    var rut = $('#rut').val()

    
                    var asd = rut.substr(rut.length - 1, rut.length)
                    var asd3 = dgv(rut.substr(0, rut.length - 1))
    
                    $.ajax({
                        type: 'get',
                        url: '{!! URL::to('formatoRut') !!}',
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
                            $.ajax({
                            type: 'get',
                            url: '{!! URL::to('rutFinder') !!}',
                            data: {
                            'rut': rutformato
                            },
                            success: function(data) {
                            console.log(data);
                            document.getElementById("nombre_input").value = data[0].nombre;
                            document.getElementById("pat_input").value = data[0].apellido_p;
                            document.getElementById("mat_input").value = data[0].apellido_m;
                            document.getElementById("dire_input").value = data[0].direccion;
                            document.getElementById("email_input").value = data[0].correo;
                            document.getElementById("ref_input").value = data[0].referencia;
                            document.getElementById("tele_input").value = data[0].telefono;
                            $('#comuna_dd').val(data[0].comuna);
                            
                            var idowner = data[0].id;
                            },
                        error: function(data) {
                            console.log('Nuevo Ingreso')
                        }
                    });
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
                $(document).on('change', '#region_dd', function() {
                    var region = $(this).val();
                    var div = $(this).parent();
                    var op = " ";
                    $.ajax({
                        type: 'get',
                        url: '{!! URL::to('findComuna') !!}',
                        data: {
                            'id': region
                        },
                        success: function(data) {
                            op += '<option value="0" selected disabled>Elija comuna</option>';
                            for (var i = 0; i < data.length; i++) {
                                op += '<option value="' + data[i].id + '">' + data[i].nombre +
                                    '</option>';
                            }
                            $('#comuna_dd').html(" ");
                            $('#comuna_dd').append(op);
                        },
                        error: function() {
    
                        }
                    });
                });
                
                //Ingreso de Cliente
                $(document).ready(function() {
                    $('#butsave').on('click', function() {
                        var rut = $('#rut').val();
                        var nombre_d = $('#nombre_input').val();
                        var pat_d = $('#pat_input').val();
                        var mat_d = $('#mat_input').val();
                        var comuna_d = $('#comuna_dd').val();
                        var dire_d = $('#dire_input').val();
                        var sector_d = $('#sector_dd').val();
                        var email_d = $('#email_input').val();
                        var tele_d = $('#tele_input').val();
                        var ref_d = $('#ref_input').val();

    
                        var nombre_m = $('#nom_pet').val();
                        var especie_m = $('#especie_dd').val();
                        var raza_m = $('#raza_pet').val();
                        var edad_m = $('#edad_pet').val();
                        var fotoasd = $('#foto_pet').val();

    
                        if (rut != "" && nombre_d != "" && pat_d != "" && mat_d != "" && comuna_d != "" && dire_d != "" && sector_d != "" && email_d != "" && tele_d != "" &&
                            ref_d != "") {
    
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: '{{ route('macliente.store') }}',
                                type: "POST",
                                data: {
                                    rut: rut,
                                    nombre: nombre_d,
                                    apellido_p: pat_d,
                                    apellido_m: mat_d,
                                    comuna: comuna_d,
                                    direccion: dire_d,
                                    sector: sector_d,
                                    correo: email_d,
                                    telefono: tele_d,
                                    referencia: ref_d,
                                },
                                success: function(data) {
    
                                    alertify.set('notifier', 'position', 'top-center');
                                    alertify.set('notifier', 'delay', 3);
                                    alertify.success(data);
    
                                    $('#rut').val('');
                                    $('#nombre_input').val('');
                                    $('#pat_input').val('');
                                    $('#mat_input').val('');
                                    $('#region_dd').val('');
                                    $('#comuna_dd').val('');
                                    $('#dire_input').val('');
                                    $('#sector_dd').val('');
                                    $('#email_input').val('');
                                    $('#tele_input').val('');
                                    $('#ref_input').val('');
    
                                }
                            });
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type: 'get',
                                url: '{!! URL::to('rutFinder') !!}',
                                data: {
                                    'rut': rut
                                },
                                success: function(data) {
                                    var idowner = data[0].id;
                                    console.log('ID Capturada');
                                    console.log(data[0].id);
                                    $.ajax({
                                        url: '{{ route('vetmascota.store') }}',
                                        type: "POST",
                                        data: {
                                            vet_clientes_id: idowner,
                                            nombre: nombre_m,
                                            especie: especie_m,
                                            raza: raza_m,
                                            edad: edad_m,
    
                                        },
                                        success: function(data) {
                                            console.log(
                                                'Mascota creada')
                                            alertify.set('notifier', 'position',
                                                'top-center');
                                            alertify.set('notifier', 'delay', 3);
                                            alertify.success(data);
    
                                        },
                                    });
                                }
                            });
                        } else {
                            alertify.set('notifier', 'position', 'top-center');
                            alertify.set('notifier', 'delay', 3);
                            alertify.error('Ningun campo puede estar vacio. Por favor ingrese todos los datos');
                        }
    
    
                    })
                });
    </script>
    @endsection