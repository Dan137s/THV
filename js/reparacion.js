var tablereparacion;
//Variable global para ser llamada cuando se requiera

function listar_reparacion() {
    tablereparacion = $("#tabla_reparacion").DataTable({
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
            "url": "../controlador/presupuesto/controlador_reparacion_listar.php",
            type: 'POST'
        },
        "order": [
            [1, 'asc']
        ],
        "columns": [

            { "defaultContent": "" },

            { "data": "reparacion_nombre" },
            { "data": "reparacion_fregistro" },
            {
                "data": "reparacion_estatus",
                render: function(data, type, row) {
                    if (data == 'ACTIVO') {
                        return "<span class='label label-success'>" + data + "</span>";
                    } else {
                        return "<span class='label label-danger'>" + data + "</span>";
                    }

                }
            },


            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>" }
        ],

        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_reparacion_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function() {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function() {
        filterColumn($(this).parents('tr').attr('data-column'));
    });


    tablereparacion.on('draw.dt', function() {
        var PageInfo = $('#tabla_reparacion').DataTable().page.info();
        tablereparacion.column(0, { page: 'current' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

}


$('#tabla_reparacion').on('click', '.editar', function() {
    var data = tablereparacion.row($(this).parents('tr')).data(); //Capturar a la fila que clickeo los datos en la variable data
    if (tablereparacion.row(this).child.isShown()) { //Aqui cuando esta en tamaño responsivo
        var data = tablereparacion.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false }) //Aqui se abro el modal editar
    $("#modal_editar").modal('show'); //Muestro el modal o formulario

    $("#id_reparacion").val(data.reparacion_id);
    $("#txt_reparacion_actual_editar").val(data.reparacion_nombre);
    $("#txt_reparacion_nueva_editar").val(data.reparacion_nombre);
    $("#txt_estatus_editar").val(data.reparacion_estatus).trigger("change");
})

function filterGlobal() {
    $('#tabla_reparacion').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

function AbrirModalRegistro() {
    $("#modal_registro").modal({ backdrop: 'static', keyboard: false })
    $("#modal_registro").modal('show');
}

function Registrar_Reparacion() {
    var reparacion = $("#txt_reparacion").val();
    var estatus = $("#txt_estatus").val();

    //Aqui pueden ir las condicionales en este caso campos vacios
    if (reparacion.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    if (estatus.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    $.ajax({
        "url": "../controlador/reparacion/controlador_reparacion_registro.php",
        type: 'POST',
        data: {
            reparacion: reparacion,
            estatus: estatus
        }
    }).done(function(resp) {
        if (resp > 0) {
            if (resp == 1) {
                $("#modal_registro").modal('hide'); //Cierro el modal del registro
                listar_reparacion();
                LimpiarCampos();

                Swal.fire("Mensaje de Confirmacion", "Datos guardados correctamante, reparacion registrada", "success");
            } else {
                LimpiarCampos();
                Swal.fire("Mensaje de Advertencia", "No se puede duplicar ya existe", "warning");

            }
        } else {

            Swal.fire("Mensaje de Error", "Lo sentimos su registro no se pudo completar", "error");

        }
    })
}

function Editar_Reparacion() {
    var id = $("#id_reparacion").val();
    var reparacionactual = $("#txt_reparacion_actual_editar").val();
    var reparacionnueva = $("#txt_reparacion_nueva_editar").val();
    var estatus = $("#txt_estatus_editar").val();

    //Aqui pueden ir las condicionales en este caso campos vacios
    if (reparacionactual.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    if (reparacionnueva.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    if (estatus.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    $.ajax({
        "url": "../controlador/reparacion/controlador_reparacion_modificar.php",
        type: 'POST',
        data: {
            id: id,
            repaac: reparacionactual,
            repanu: reparacionnueva,
            estatus: estatus
        }
    }).done(function(resp) {
        if (resp > 0) {
            if (resp == 1) {
                $("#modal_registro").modal('hide'); //Cierro el modal del registro
                listar_reparacion();
                LimpiarCampos();

                Swal.fire("Mensaje de Confirmacion", "Datos guardados correctamante, reparacion registrada", "success");
            } else {
                LimpiarCampos();
                Swal.fire("Mensaje de Advertencia", "No se puede duplicar ya existe", "warning");

            }
        } else {

            Swal.fire("Mensaje de Error", "Lo sentimos su registro no se pudo completar", "error");

        }
    })
}


function LimpiarCampos() {
    $("#txt_reparacion").val("");
}