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
            { "data": "herramienta_marca" },
            { "data": "herramienta_modelo" },
            { "data": "herramienta_fecregistro" },
            { "data": "herramienta_descripcion" },
            {
                "data": "herramienta_estatus",
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

//Este codigo me permite mantener el formulario del registro abierto mantener el foco al hacer click en otro lugar fuera del mismo form
function AbrirModalRegistro() {
    $("#modal_registro").modal({ backdrop: 'static', keyboard: false })
    $("#modal_registro").modal('show');

}

function Registro_Herramienta() {
    var herramienta = $("#txt_tipo").val();
    var serial = $("#txt_serial").val();
    var marca = $("#txt_marca").val();
    var modelo = $("#txt_modelo").val();
    var descripcion = $("#txt_descripcion").val();
    var estatus = $("#txt_estatus").val();
    if (herramienta.length == 0 || serial.length == 0 || marca.length == 0 || modelo.length == 0 || descripcion.length == 0 || estatus.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    $.ajax({
        "url": "../controlador/herramienta/controlador_herramienta_registro.php",
        type: 'POST',
        data: {
            h: herramienta,
            s: serial,
            m: marca,
            mo: modelo,
            d: descripcion,
            e: estatus


        }

    }).done(function(resp) {
        if (resp > 0) {
            if (resp == 1) {
                $("#modal_registro").modal('hide'); //Cierro el modal del registro
                listar_herramienta();
                Swal.fire("Mensaje de Confirmacion", "Datos guardados correctamante, herramienta registrada", "success");
            } else {
                Swal.fire("Mensaje de Advertencia", "No se puede duplicar ya existe", "warning");
            }
        }

    })
}


$('#tabla_herramienta').on('click', '.editar', function() {
    var data = tableherramienta.row($(this).parents('tr')).data(); //Capturar a la fila que clickeo los datos en la variable data
    if (tableherramienta.row(this).child.isShown()) { //Aqui cuando esta en tamaño responsivo
        var data = tableherramienta.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false }) //Aqui se abro el modal editar
    $("#modal_editar").modal('show'); //Muestro el modal o formulario
    $("#txt_id_herramienta").val(data.herramienta_serial)
    $("#txt_serial_actual_editar").val(data.herramienta_serial)
    $("#txt_serial_nuevo_editar").val(data.herramienta_serial)
    $("#txt_tipo_editar").val(data.herramienta_tipo).trigger("change");
    $("#txt_marca_editar").val(data.herramienta_marca)
    $("#txt_modelo_editar").val(data.herramienta_modelo)
    $("#txt_descripcion_editar").val(data.herramienta_descripcion)
    $("#txt_estatus_editar").val(data.herramienta_estatus).trigger("change");
})

function Modificar_Procedimiento() {
    //Vamos a llevar el actual y el nuevo para crear una condicional en el procedure si el dato actual es igual al nuevo y solo guarde el valor modificado
    //var id = $("#txt_id_herramienta").val();
    var serialactual = $("#txt_serial_actual_editar").val();
    var serialnuevo = $("#txt_serial_nuevo_editar").val();
    var tipo = $("#txt_tipo_editar").val();
    var marca = $("#txt_marca_editar").val();
    var modelo = $("#txt_modelo_editar").val();
    var descripcion = $("#txt_descripcion_editar").val();
    var estatus = $("#txt_estatus_editar").val();

    if (serialnuevo.length == 0) {
        Swal.fire("Mensaje de Advertencia", "Debe reingresar el serial", "warning");
    }

    $.ajax({
        url: '../controlador/herramienta/controlador_herramienta_modificar.php',
        type: 'POST',
        data: {

        }

    })
}