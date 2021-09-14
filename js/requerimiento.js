var table;

function listar_requerimiento() {
    table = $("#tabla_requerimiento").DataTable({
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
            "url": "../controlador/requerimiento/controlador_requerimiento_listar.php",
            type: 'POST'
        },
        "columns": [
            { "data": "posicion" },
            { "data": "requerimiento_id" },
            { "data": "requerimiento_presupuento" },
            { "data": "usu_alias" },
            { "data": "requerimiento_direccion" },
            {"data": "requerimiento_estado",
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
    document.getElementById("tabla_requerimiento_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function() {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function() {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}
function filterGlobal() {
    $('#tabla_requerimiento').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}
function AbrirModalRegistros() {
    $("#modal_registro").modal({ backdrop: 'static', keyboard: false })
    $("#modal_registro").modal('show');
}
function registrarRequerimiento() {

    var precio = $("#txt_monto").val();
    var vesino = $("#txt_vesino").val();
    var direc = $("#txt_direccion").val();
    var img = $("#txt_file").val();

    if(precio.length==0 ||vesino.length==0 ||direc.length==0 ||img.length==0 )
    {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    var formData = new FormData();
    formData.append('foto',$("#txt_file"));
    formData.append('monto',precio);
    formData.append('rut',vesino);
    formData.append('direccion',direc);

    $.ajax({
        url: "../controlador/requerimiento/controlador_requerimiento_registrar.php",
        type: 'POST',
        data: formData,
        contentType:false,
        cache:false,
        processData:false

    }).done(function(resp) {
        if (resp > 0) {
            Swal.fire(resp, "final, Intentos fallidos : " + (parseInt(resp) + 1) + " Para acceder a su cuenta restablesca su contra", "warning");

        } else {
            Swal.fire(resp, "Credenciales incorrectas, Intentos fallidos : " + (parseInt(resp) + 1) + " ", "warning");

        }
    })
    
}

