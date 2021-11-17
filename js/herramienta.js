var tableherramienta;

function listar_herramienta() {
    tableherramienta = $("#tabla_herramienta").DataTable({
        "ordering": false,
        "bLengthChange": false,
        "searching": { "regex": false },
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        "pageLength": 10,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../controlador/herramienta/controlador_herramienta_listar.php",
            type: 'POST'
        },
        "order": [
            [1, 'asc']
        ],
        "columns": [

            { "defaultContent": "" },

            { "data": "herramienta_serial" },
            { "data": "herramienta_tipo" },
            { "data": "herramienta_modelo" },

            { "data": "herramienta_marca" },
            { "data": "herramienta_fecregistro" },
            { "data": "herramienta_descripcion" },
            {
                "data": "herramienta_estatus",
                render: function(data, type, row) {
                    if (data == 'ACTIVO') {
                        return "<span class='label label-success'>" + data + "</span>";
                    }
                    if (data == 'INACTIVO') {
                        return "<span class='label label-danger'>" + data + "</span>";
                    }
                    if (data == 'AGOTADO') {
                        return "<span class='label label-black' style='background:black'>" + data + "</span>";
                    }
                }
            },


            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='imprimir btn btn-danger' title='Imprimir'><i class='fa fa-print'></i></button>" }
        ],

        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_herramienta_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function() {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function() {
        filterColumn($(this).parents('tr').attr('data-column'));
    });


    tableherramienta.on('draw.dt', function() {
        var PageInfo = $('#tabla_herramienta').DataTable().page.info();
        tableherramienta.column(0, { page: 'current' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

}

$('#tabla_herramienta').on('click', '.editar', function() {
    var data = tableherramienta.row($(this).parents('tr')).data(); //Capturar a la fila que clickeo los datos en la variable data
    if (tableherramienta.row(this).child.isShown()) { //Aqui cuando esta en tamaño responsivo
        var data = tableherramienta.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false }) //Aqui se abro el modal editar
    $("#modal_editar").modal('show'); //Muestro el modal o formulario

    $("#herramienta_id").val(data.herramienta_id)
    $("#txt_serial_actual_editar").val(data.herramienta_serial)
    $("#txt_serial_nuevo_editar").val(data.herramienta_serial)
    $("#txt_tipo_editar").val(data.herramienta_tipo)
    $("#txt_marca_editar").val(data.herramienta_marca)
    $("#txt_modelo_editar").val(data.herramienta_modelo)
    $("#txt_descripcion_editar").val(data.herramienta_descripcion)
    $("#txt_estatus_editar").val(data.herramienta_estatus).trigger("change");
})


$('#tabla_herramienta').on('click', '.imprimir', function() {
    var data = tableherramienta.row($(this).parents('tr')).data(); //Capturar a la fila que clickeo los datos en la variable data
    if (tableherramienta.row(this).child.isShown()) { //Aqui cuando esta en tamaño responsivo
        var data = tableherramienta.row(this).data();
    }
    window.open("../vista/libreporte/reportes/ticket_reporte_herramientas.php?id=" + parseInt(data.reparacion_id) + "#zoom=100%", "Ticket", "scrollbars=NO");


})


function filterGlobal() {
    $('#tabla_herramienta').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}


function Registrar_Herramienta() {
    var serial = $("#txt_serial").val();
    var tipo = $("#txt_tipo").val();
    var marca = $("#txt_marca").val();
    var modelo = $("#txt_modelo").val();
    var descripcion = $("#txt_descripcion").val();
    var estatus = $("#txt_estatus").val();


    //Aqui pueden ir las condicionales en este caso campos vacios
    if (serial.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }
    if (tipo.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }
    if (marca.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }
    if (modelo.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }
    if (descripcion.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }


    $.ajax({
        "url": "../controlador/herramienta/controlador_herramienta_registro.php", //URL CON LA DIRECCION DEL CONTROLADOR
        type: 'POST',
        data: {

            se: serial,
            ti: tipo,
            ma: marca,
            mo: modelo,
            ds: descripcion,
            es: estatus

        }
    }).done(function(resp) {
        if (resp > 0) {
            if (resp == 1) {
                $("#modal_registro").modal('hide'); //Cierro el modal del registro
                listar_herramienta();
                LimpiarCampos();

                Swal.fire("Mensaje de Confirmacion", "Datos guardados correctamante, material registrado", "success");
            } else {
                LimpiarCampos();
                Swal.fire("Mensaje de Advertencia", "No se puede duplicar esta herramienta ya existe", "warning");

            }
        } else {

            Swal.fire("Mensaje de Error", "Lo sentimos su registro no se pudo completar", "error");

        }
    })
}

//Cree esta funcion afuera para limpiar los campos y llamar cuando la invoque xD
function LimpiarCampos() {

    $("#txt_serial").val("");
    $("#txt_tipo").val("");
    $("#txt_marca").val("");
    $("#txt_modelo").val("");
    $("#txt_descripcion").val("");
    $("#txt_estatus").val("");

}

//Modificar insumo
function Modificar_Herramienta() {
    var id = $("#herramienta_id").val();
    var serialactual = $("#txt_serial_actual_editar").val();
    var serialnuevo = $("#txt_serial_nuevo_editar").val();
    var tipo = $("#txt_tipo_editar").val();
    var marca = $("#txt_marca_editar").val();
    var modelo = $("#txt_modelo_editar").val();
    var descripcion = $("#txt_descripcion_editar").val();
    var estatus = $("#txt_estatus_editar").val();

    if (serialactual.length == 0 || serialnuevo.length == 0 || tipo.length == 0 || marca.length == 0 || modelo.length == 0 || descripcion.length == 0 || estatus.length == 0) {
        Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
    }

    $.ajax({
        "url": "../controlador/herramienta/controlador_herramienta_modificar.php",
        type: 'POST',
        data: {
            id: id,
            acse: serialactual,
            nuse: serialnuevo,
            tp: tipo,
            mc: marca,
            ml: modelo,
            ds: descripcion,
            es: estatus

        }
    }).done(function(resp) {
        if (resp > 0) {
            if (resp == 1) { //Cuando el valor retorne 1 lista de nuevo la tabla
                $("#modal_editar").modal('hide'); //Cierro el modal del editar
                listar_herramienta();


                Swal.fire("Mensaje de Confirmacion", "Datos guardados correctamante, material actualizado", "success");
            } else {

                Swal.fire("Mensaje de Advertencia", "No se puede duplicar ya existe", "warning");

            }
        } else {

            Swal.fire("Mensaje de Error", "Lo sentimos su actualizacion no se pudo completar", "error");

        }
    })

}