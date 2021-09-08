function listar_herramienta() {
    var tableherramienta = $("#tabla_herramienta").DataTable({
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
            { "data": "herramienta_id" },
            { "data": "herramienta_tipo" },
            { "data": "herramienta_serial" },
            { "data": "herramienta_fecha" },
            { "data": "herramienta_marca" },
            { "data": "herramienta_modelo" },
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


    if (herramienta.length == 0 || serial.length == 0) {
        Swal.fire("Mensaje De Advertencia", "Los campos de herramientas no deben estar incompletos", "warning");
    }

    $.ajax({
        "url": "../controlador/herramienta/controlador_herramienta_registro.php",
        type: 'POST',
        data: {
            h: herramienta,
            s: serial


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