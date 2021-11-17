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
            { "data": "reparacion_insu_herra" },
            { "data": "reparacion_req_vecino" },
            { "data": "reparacion_fregistro" },
            {
                "data": "reparacion_estatus",
                render: function(data, type, row) {
                    if (data == 'ACEPTADO') {
                        return "<span class='label label-success'>" + data + "</span>";
                    }
                    if (data == 'ENTRAMITE') {
                        return "<span class='label label-blue' style='background:blue'>" + data + "</span>";
                    }
                    if (data == 'RECHAZADO') {
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
    $("#txt_descripcion_editar").val(data.reparacion_descripcion);
    $("#txt_nivel_editar").val(data.reparacion_nivel).trigger("change");
    $("#txt_c_personas_editar").val(data.reparacion_cantidad_personas);
    $("#txt_estatus_editar").val(data.reparacion_estatus).trigger("change");
    $("#txt_insu_herra_editar").val(data.reparacion_insu_herra);
    $("#txt_req_veci_editar").val(data.reparacion_req_vecino);
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
    var descripcion = $("#txt_descripcion_reparacion").val();
    var nivel = $("#txt_nivel").val();
    var cpersonas = $("#txt_c_personas").val();
    var estatus = $("#txt_estatus").val();

    //Aqui pueden ir las condicionales en este caso campos vacios
    if (reparacion.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    if (descripcion.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    if (nivel.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    if (cpersonas.length == 0) {
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
            descripcion: descripcion,
            nivel: nivel,
            cpersonas: cpersonas,
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
    var descripcion = $("#txt_descripcion_editar").val();
    var nivel = $("#txt_nivel_editar").val();

    var cpersonas = $("#txt_c_personas_editar").val();
    var insumo = $("#txt_insu_herra_editar").val();
    var reqvecino = $("#txt_req_veci_editar").val();

    var estatus = $("#txt_estatus_editar").val();

    //Aqui pueden ir las condicionales en este caso campos vacios
    if (reparacionactual.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    if (reparacionnueva.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    if (descripcion.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    if (nivel.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }


    if (cpersonas.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    if (insumo.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    if (reqvecino.length == 0) {
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
            descri: descripcion,
            niv: nivel,
            cpe: cpersonas,
            insu: insumo,
            reqv: reqvecino,
            estatus: estatus
        }
    }).done(function(resp) {
        //alert(resp); Para verificar errores 
        if (resp > 0) {
            if (resp == 1) {
                $("#modal_editar").modal('hide'); //Cierro el modal del registro
                listar_reparacion();
                Swal.fire("Mensaje de Confirmacion", "Datos actualizados correctamante, reparacion registrada", "success");
            } else {

                Swal.fire("Mensaje de Advertencia", "No se puede duplicar ya existe", "warning");

            }
        } else {

            Swal.fire("Mensaje de Error", "Lo sentimos su registro no se pudo completar", "error");

        }
    })
}


function LimpiarCampos() {
    $("#txt_reparacion").val("");
    $("#txt_descripcion_reparacion").val("");
    $("#txt_c_personas").val("");
    $("#txt_estatus").val("");

}