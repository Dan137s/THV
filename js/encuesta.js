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
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i>" }

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

function listar_encuesta_trabajador() {
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
////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////
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
    var pregunta1 = $("#txt_1").val();
    var pregunta2 = $("#txt_2").val();
    var pregunta3 = $("#txt_3").val();
    var pregunta4 = $("#txt_4").val();
    var pregunta5 = $("#txt_5").val();
    var pregunta6 = $("#txt_6").val();
    var pregunta7 = $("#txt_7").val();
    var pregunta8 = $("#txt_8").val();
    var pregunta9 = $("#txt_9").val();

    if (vesino.length == 0 || pregunta1.length == 0 || pregunta2.length == 0 || pregunta3.length == 0 ||
        pregunta4.length == 0 || pregunta5.length == 0 || pregunta6.length == 0 ||
        pregunta7.length == 0 || pregunta8.length == 0 || pregunta9.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }


    $.ajax({
        url: "../controlador/encuesta/controlador_encuesta_registrar.php",
        type: 'POST',
        data: {
            rut: vesino,
            p1: pregunta1,
            p2: pregunta2,
            p3: pregunta3,
            p4: pregunta4,
            p5: pregunta5,
            p6: pregunta6,
            p7: pregunta7,
            p8: pregunta8,
            p9: pregunta9
        }


    }).done(function(resp) {
        if (resp < 0) {
            Swal.fire("ERROR!!!", "El usuario no existe", "warning");

        } else {
            $("#modal_registro").modal('hide');
            Swal.fire("Mensaje De Confirmacion", " Nuevo encuesta Registrada", "success")
                .then((value) => {
                    $("#txt_vesino").val("");
                    $("#txt_1").val("");
                    $("#txt_2").val("");
                    $("#txt_3").val("");
                    $("#txt_4").val("");
                    $("#txt_5").val("");
                    $("#txt_6").val("");
                    $("#txt_7").val("");
                    $("#txt_8").val("");
                    $("#txt_9").val("");
                    table.ajax.reload();
                });
        }
    })

}


function modificarEncuesta() {

    var vesino = $("#idusuario").val();
    var pregunta1 = $("#txt_p1_editar").val();
    var pregunta2 = $("#txt_p2_editar").val();
    var pregunta3 = $("#txt_p3_editar").val();
    var pregunta4 = $("#txt_p4_editar").val();
    var pregunta5 = $("#txt_p5_editar").val();
    var pregunta6 = $("#txt_p6_editar").val();
    var pregunta7 = $("#txt_p7_editar").val();
    var pregunta8 = $("#txt_p8_editar").val();
    var pregunta9 = $("#txt_p9_editar").val();

    if (vesino.length == 0 || pregunta1.length == 0 || pregunta2.length == 0 || pregunta3.length == 0 ||
        pregunta4.length == 0 || pregunta5.length == 0 || pregunta6.length == 0 ||
        pregunta7.length == 0 || pregunta8.length == 0 || pregunta9.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }


    $.ajax({
        url: "../controlador/encuesta/controlador_encuesta_modificar.php",
        type: 'POST',
        data: {
            rut: vesino,
            p1: pregunta1,
            p2: pregunta2,
            p3: pregunta3,
            p4: pregunta4,
            p5: pregunta5,
            p6: pregunta6,
            p7: pregunta7,
            p8: pregunta8,
            p9: pregunta9
        }


    }).done(function(resp) {
        if (resp > 0) {
            TraerDatosUsuario();
            $("#modal_edit").modal('hide');
            Swal.fire("Mensaje De Confirmacion", "Datos Actualizados Correctamente", "success")
                .then((value) => {

                    table.ajax.reload();

                });

        } else {
            Swal.fire("Mensaje De Error", "Lo sentimos, no se pudo completar la actualización", "error");
        }
    })

}


$('#tabla_encuesta').on('click', '.editar', function() {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    $("#modal_edit").modal({ backdrop: 'static', keyboard: false })
    $("#modal_edit").modal('show');

})

$('#tabla_encuesta').on('click', '.editar', function() {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    $("#modal_ver").modal({ backdrop: 'static', keyboard: false })
    $("#modal_ver").modal('show');
    
    $("#idusuario").val(data.usu_id);
    $("#txt_p1_editar").val(data.p1);
    $("#txt_p2_editar").val(data.p2);
    $("#txt_p3_editar").val(data.p3);
    $("#txt_p4_editar").val(data.p4);
    $("#txt_p5_editar").val(data.p5);
    $("#txt_p6_editar").val(data.p6);
    $("#txt_p7_editar").val(data.p7);
    $("#txt_p8_editar").val(data.p8);
    $("#txt_p9_editar").val(data.opinion);
})