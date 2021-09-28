var table;

function listar_encuesta() {
    table = $("#tabla_encuesta").DataTable({
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
            "url": "../controlador/encuesta/controlador_encuesta_listar.php",
            type: 'POST'
        },
        "columns": [
            { "data": "posicion" },
            { "data": "rut" },
            { "data": "nombre" },
            { "data": "fecha_inicio" },
            { "data": "fecha_fin",
            render: function(data, type, row) {
                if (data == null) {
                    return "Sin responder";
                }else{
                    return data
                }
            }
        },
            { "defaultContent": "<button style='font-size:13px;background-color: #69B00B;' type='button' class='editar btn btn-primary'><i class='fa fa-eye'></i></button>" }
        
           ],

        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_encuesta_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function() {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function() {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
}

function filterGlobal() {
    $('#tabla_encuesta').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}
function AbrirModalRegistros() {
    $("#modal_registro").modal({ backdrop: 'static', keyboard: false })
    $("#modal_registro").modal('show');
}



function registrarEncuesta() {

    var vesino = $("#txt_vesino").val();

    if(vesino.length==0 )
    {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }


    $.ajax({
        url: "../controlador/encuesta/controlador_encuesta_registrar.php",
        type: 'POST',
        data: {
            rut: vesino
        }
        

    }).done(function(resp) {
        if (resp < 0) {
            Swal.fire("ERROR!!!", "El usuario no existe", "warning");

        }
        else
        {
            $("#modal_registro").modal('hide');
            Swal.fire("Mensaje De Confirmacion", "Datos correctamente, Nuevo Usuario Registrado", "success")
                .then((value) => {
                    $("#txt_vesino").val("");
                    table.ajax.reload();
                });
        }
    })
    
}

$('#tabla_encuesta').on('click', '.editar', function() {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
    $("#modal_editar").modal('show');
})