document.addEventListener('DOMContentLoaded', function () {

    let formulario = document.querySelector("form");
    var calendarEl = document.getElementById("agenda");
    var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',

        locale: "es",

        navLinks: true,
        selectable: true,

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        slotLabelInterval: '00:30',
        eventTimeFormat: {
            hour: '2-digit',
            minute: '2-digit',
            meridiem: false
        },
        slotLabelFormat:
        {
            hour: 'numeric',
            minute: '2-digit',
            meridiem: 'short'
        },

        slotMinTime: '10:00',
        slotMaxTime: '18:00',
        businessHours: [
            {
                daysOfWeek: [1, 2, 3, 4, 5, 6],
                startTime: '10:00',
                endTime: '18:00',
            },
        ],



        events: "/calendario/mostrar",
        eventColor: '#378006',

        dateClick: function (info) {
            let minutesToAdd = 30;
            var currentDate = new Date();
            var futureDate = new Date(currentDate.getTime() + minutesToAdd * 60000);
            // console.log(info["view"]["type"]);
            if (info["view"]["type"] === "dayGridMonth") {
                calendar.changeView('timeGridDay', info.dateStr);
            } else {
                formulario.reset();
                let lol = info.dateStr.slice(0, 19).replace('T', ' ');
                let lol2 = new Date(info.dateStr);

                lol2.setMinutes(lol2.getMinutes() + 30);

                let lol3 = new Date(lol2.getTime() - (lol2.getTimezoneOffset() * 60000)).toISOString();
                

                document.getElementById("start").value = lol;
                document.getElementById("end").value = lol3.slice(0, 19).replace('T', ' ');
                $("#evento").modal("show");
            }
        },
        eventClick: function (info) {
            if (info["view"]["type"] === "dayGridMonth") {
                calendar.changeView('timeGridDay', info.dateStr);
            } else {
                var evento = info.event;
                console.log(evento);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'calendario/editar/'+info.event.id,
                    type: 'post',
                    success: function(evento) {
                        console.log(evento)
                        $('#id').val(evento.id);
                        $('#title_edit').val(evento.title);
                        $('#medico_edit').val(evento.medico);
                        $('#nombre_cliente_edit').val(evento.nombre_cliente);
                        $('#rut_cliente_edit').val(evento.rut_cliente);
                        $('#email_edit').val(evento.email);
                        $('#fono_edit').val(evento.fono);
                        $('#descripcion_edit').val(evento.descripcio);
                        $('#start_edit').val(evento.start);
                        $('#end_edit').val(evento.end);
                        
                        $("#evento-edit").modal("show");
                    }
                });
            }

        }

    });
    calendar.render();

    document.getElementById("btnGuardar").addEventListener("click", function () {
        //Ingreso de Cliente
        var title = $('#title').val();
        var medico = $('#medico').val();
        var rut_cliente = $('#rut_cliente').val();
        var nombre_cliente = $('#nom_cliente').val();
        var email = $('#email').val();
        var fono = $('#fono').val();
        var descripcion = $('#descripcion').val();
        var start = $('#start').val();
        var end = $('#end').val();

        if (title != "") {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'calendario/agendar',
                type: "POST",
                data: {
                    title: title,
                    medico: medico,
                    rut_cliente: rut_cliente,
                    nombre_cliente: nombre_cliente,
                    email: email,
                    fono: fono,
                    descripcion: descripcion,
                    start: start,
                    end: end,
                },
                success: function () {
                    calendar.refetchEvents();
                    $("#evento").modal("hide");
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.set('notifier', 'delay', 3);
                    alertify.success('Hora agendada con exito');

                }
            });
        } else {
            alertify.set('notifier', 'position', 'top-center');
            alertify.set('notifier', 'delay', 3);
            alertify.error('Ningun campo puede estar vacio. Por favor ingrese todos los datos');
        }


    });

    document.getElementById("btnEliminar").addEventListener("click", function () {
        var id = document.getElementById('id').value
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/calendario/borrar/"+id,
            type: "POST",
            data: {
                id: id,
            },                   
            success: function()
                        {
                            calendar.refetchEvents();
                            $("#evento-edit").modal("hide");
                            alertify.set('notifier', 'position', 'top-center');
                            alertify.set('notifier', 'delay', 3);
                            alertify.error('Elemento eliminado con exito.');                                 
                        }
        });
    });

    document.getElementById("btnModificar").addEventListener("click", function () {
        var id = document.getElementById('id').value

        var title_edit = document.getElementById('title_edit').value
        var medico_edit = document.getElementById('medico_edit').value
        var rut_cliente_edit = document.getElementById('rut_cliente_edit').value
        var nombre_cliente_edit = document.getElementById('nombre_cliente_edit').value
        var email_edit = document.getElementById('email_edit').value
        var fono_edit = document.getElementById('fono_edit').value
        var descripcion_edit = document.getElementById('descripcion_edit').value
        var start_edit = document.getElementById('start_edit').value
        var end_edit = document.getElementById('end_edit').value

        console.log(title_edit)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/calendario/actualizar/"+id,
            type: "POST",
            data: {
                title: title_edit,
                medico: medico_edit,
                rut_cliente: rut_cliente_edit,
                nombre_cliente: nombre_cliente_edit,
                email: email_edit,
                fono: fono_edit,
                descripcion: descripcion_edit,
                start: start_edit,
                end: end_edit
            },                   
            success: function(data)
                        {
                            calendar.refetchEvents();
                            $("#evento-edit").modal("hide");
                            alertify.set('notifier', 'position', 'top-center');
                            alertify.set('notifier', 'delay', 3);
                            alertify.success('Registro modificado con exito');                                  
                        }
        });
    });
});