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
            { "data": "monto" },
            { "data": "usu_alias" },
            { "data": "direccion" },
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
    $("#modal_requerimiento_registro").modal({ backdrop: 'static', keyboard: false })
    $("#modal_requerimiento_registro").modal('show');
}
function registrarRequerimiento() {

    var datoplano = $("#file_planos").val();
    var vesino = $("#txt_rut_vesino").val();
    var observar = $("#txt_observacion_vesino").val();
    var fono = $("#txt_fono_vesino").val();
    var fechaejecucion = $("#txt_fecha_ejecucion").val();

    var datoorientativa = $("#file_orientativa").val();
    var trabajador = $("#txt_travajador").val();
    var datogeneral = $("#file_general").val();
    var datodaño = $("#file_daño").val();
    var direccion = $("#txt_direccion_vecino").val();

    var voluntario = $("#txt_voluntario").val();
    var diagnostico = $("#txt_diagnostico").val();
    var monto = $("#txt_monto").val()
    var propuesta = $("#txt_propuesta").val();
    var datofirma = $("#file_firma").val();
/*
    if(datoplano.length==0 ||vesino.length==0 ||observar.length==0 ||fono.length==0 ||fechaejecucion.length==0
        ||datoorientativa.length==0||trabajador.length==0
        ||datogeneral.length==0||datodaño.length==0||direccion.length==0||voluntario.length==0
        ||diagnostico.length==0||monto.length==0
        ||propuesta.length==0||datofirma.length==0 )
    {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    var formData = new FormData();
    formData.append('datoplano',datoplano);
    formData.append('vesino',vesino);
    formData.append('observar',observar);
    formData.append('fono',fono);
    formData.append('fechaejecucion',fechaejecucion);

    formData.append('datoorientativa',datoorientativa);
    formData.append('trabajador',trabajador);

    formData.append('datogeneral',datogeneral);
    formData.append('datodaño',datodaño);
    formData.append('direccion',direccion);
    formData.append('voluntario',voluntario);

    formData.append('diagnostico',diagnostico);
    formData.append('monto',monto);

    formData.append('propuesta',propuesta);
    formData.append('datofirma',datofirma);*/



    $.ajax({
        url: "../controlador/requerimiento/controlador_requerimiento_registrar.php",
        type: 'POST',
		data: {
            t1:datoplano,
            t2:vesino,
            t3:observar,
            t4:fono,
            t5:fechaejecucion,

            t6:datoorientativa,
            t7:trabajador,
            t8:datogeneral,
            t9:datodaño,
            t10:direccion,

            t11:voluntario,
            t12:diagnostico,
            t13:monto,
            t14:propuesta,
            t15:datofirma

        },

    }).done(function(resp) {
        if (resp > 0) {
            Swal.fire(resp, "yes, Intentos fallidos : " + (parseInt(resp)) + " Para acceder a su cuenta restablesca su contra", "warning");

        } else {
            Swal.fire(resp, "Error el usuario no existe ", "warning");

        }
    })
    
}

$('#tabla_requerimiento').on('click', '.editar', function() {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    $("#modal_edit").modal({ backdrop: 'static', keyboard: false })
    $("#modal_edit").modal('show');


    $("#file_planos_edit").val(data.ubicacion_mapa);
    $("#txt_rut_vesino_edit").val(data.usu_alias);
    $("#txt_observacion_vesino_edit").val(data.observacion);
    $("#txt_fono_vesino_edit").val(data.fono);
    $("#txt_fecha_ejecucion_edit").val(data.fecha_ejecucion);

    $("#file_orientativa_edit").val(data.vista_orientativa);
    $("#txt_travajador_edit").val(data.trabajador);

    $("#file_general_edit").val(data.vista_general);
    $("#file_daño_edit").val(data.danios);
    $("#txt_direccion_vecino_edit").val(data.direccion);
    $("#txt_voluntario_edit").val(data.voluntario);

    $("#txt_diagnostico_edit").val(data.diagnostico);
    $("#txt_monto_edit").val(data.monto)

    $("#txt_propuesta_edit").val(data.propuesta);
    $("#file_firma_edit").val(data.recepcion);
})



function registrar__Requerimientos() {
    var formData = new FormData(document.getElementById("form_requerimiento_registro"));


    $.ajax({
        url: "../controlador/requerimiento/controlador_requerimiento_registrar.php",
        type: "POST",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false

    }).done(function(resp) {
        if (resp > 0) {
            Swal.fire(resp, "si, Intentos fallidos : " + (parseInt(resp)) + " Para acceder a su cuenta restablesca su contra", "warning");

        } else {
            Swal.fire(resp, "no de: "+file_get_contents($_FILES['file_general']['tmp_name']), "warning");

        }
    })
    
}