var tablehospederia;
//Variable global para ser llamada cuando se requiera

function listar_hospederia() {
    tablematerial = $("#tabla_hospederia").DataTable({
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
            "url": "../controlador/hospederia/controlador_hospederia_listar.php",
            type: 'POST'
        },
        "order": [
            [1, 'asc']
        ],
        "columns": [

            { "defaultContent": "" },

            { "data": "hospederia_nombre" },
            { "data": "hospederia_direccion" },
            { "data": "hospederia_fregistro" },
            {
                "data": "hospederia_estatus",
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


            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>" }
        ],

        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_hospederia_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function() {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function() {
        filterColumn($(this).parents('tr').attr('data-column'));
    });


    tablehospederia.on('draw.dt', function() {
        var PageInfo = $('#tabla_hospederia').DataTable().page.info();
        tablehospederia.column(0, { page: 'current' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

}

$('#tabla_hospederia').on('click', '.editar', function() {
    var data = tablehospederia.row($(this).parents('tr')).data(); //Capturar a la fila que clickeo los datos en la variable data
    if (tablehospederia.row(this).child.isShown()) { //Aqui cuando esta en tamaño responsivo
        var data = tablehospederia.row(this).data();
    }
    $("#modal_editar_h").modal({ backdrop: 'static', keyboard: false }) //Aqui se abro el modal editar
    $("#modal_editar_h").modal('show'); //Muestro el modal o formulario

    $("#txt_id_hospederia").val(data.hospederia_id)
    $("#txt_nombre_actual_editar").val(data.hospederia_nombre)
    $("#txt_nombre_nuevo_editar").val(data.hospederia_nombre)
    $("#txt_direccion_editar").val(data.hospederia_direccion)
    $("#txt_estatus_editar").val(data.hospederia_estatus).trigger("change");
})

function filterGlobal() {
    $('#tabla_hospederia').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}


function Registrar_Hospederia() {
    var nombre = $("#txt_nombre_hospederia").val();
    var direccion = $("#txt_direccion_hospederia").val();
    var estatus = $("#txt_estatus_hospederia").val();

    //Aqui pueden ir las condicionales en este caso campos vacios

    if (nombre.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    if (direccion.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    $.ajax({
        "url": "../controlador/hospederia/controlador_hospederia_registro.php",
        type: 'POST',
        data: {
            no: nombre,
            dr: direccion,
            es: estatus

        }
    }).done(function(resp) {
        if (resp > 0) {
            if (resp == 1) {
                $("#modal_registro").modal('hide'); //Cierro el modal del registro
                listar_hospederia();
                LimpiarCampos();

                Swal.fire("Mensaje de Confirmacion", "Datos guardados correctamante, material registrado", "success");
            } else {
                LimpiarCampos();
                Swal.fire("Mensaje de Advertencia", "No se puede duplicar ya existe", "warning");

            }
        } else {

            Swal.fire("Mensaje de Error", "Lo sentimos su registro no se pudo completar", "error");

        }
    })
}

//Cree esta funcion afuera para limpiar los campos y llamar cuando la invoque xD
function LimpiarCampos() {
    $("#txt_nombre_hospederia").val("");
    $("#txt_direccion_hospederia").val("");


}

//Modificar insumo
function Modificar_Hospederia() {
    var id = $("#txt_id_hospederia").val();
    var nombreactual = $("#txt_nombre_actual_editar").val();
    var nombrenuevo = $("#txt_nombre_nuevo_editar").val();
    var estatus = $("#txt_estatus_editar").val();

    if (nombreactual.length == 0 || nombrenuevo.length == 0 || direccion.length == 0 || estatus.length == 0) {
        Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
    }

    $.ajax({
        "url": "../controlador/hospederia/controlador_hospederia_modificar.php",
        type: 'POST',
        data: {
            id: id,
            acno: nombreactual,
            nuno: nombrenuevo,
            dr: direccion,
            es: estatus

        }
    }).done(function(resp) {
        if (resp > 0) {
            if (resp == 1) { //Cuando el valor retorne 1 lista de nuevo la tabla
                $("#modal_editar_h").modal('hide'); //Cierro el modal del editar
                listar_hospederia();


                Swal.fire("Mensaje de Confirmacion", "Datos guardados correctamante, material actualizado", "success");
            } else {

                Swal.fire("Mensaje de Advertencia", "No se puede duplicar ya existe", "warning");

            }
        } else {

            Swal.fire("Mensaje de Error", "Lo sentimos su actualizacion no se pudo completar", "error");

        }
    })

}