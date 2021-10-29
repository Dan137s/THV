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
    }*/

    var plano = $("#file_planos")[0].files[0];
    var orientativ0 =  $("#file_orientativa")[0].files[0];
    var general = $("#file_general")[0].files[0];
    var daño = $("#file_daño")[0].files[0];
    var firma = $("#file_firma")[0].files[0];

    var formData = new FormData();
    formData.append("t1", plano);
    formData.append("t2",vesino );
    formData.append("t3", observar);
    formData.append("t4", fono);
    formData.append("t5", fechaejecucion);

    formData.append("t6", orientativ0);
    formData.append("t7", trabajador);

    formData.append("t8", general);
    formData.append("t9", daño);
    formData.append("t10", direccion);

    formData.append("t11", voluntario);
    formData.append("t12", diagnostico);
    formData.append("t13", monto);
    formData.append("t14", propuesta);
    formData.append("t15", firma);

    

    $.ajax({
        url: "../controlador/requerimiento/controlador_requerimiento_registrar.php",
        type: 'POST',
        processData: false,
        contentType: false,
		data: formData
    }).done(function(resp) {
        if (resp < 0) {
            Swal.fire("ERROR!!!", "Error en el ingreso de datos", "warning");

        } else {
            $("#modal_requerimiento_registro").modal('hide');
            Swal.fire("Mensaje De Confirmación", " Nuevo Requerimiento Registrado", "success");
            $("#file_planos").val("");
            $("#txt_rut_vesino").val("");
            $("#txt_observacion_vesino").val("");
            $("#txt_fono_vesino").val("");
            $("#txt_fecha_ejecucion").val("");
            
            $("#file_orientativa").val("");
            $("#txt_travajador").val("");
            
            $("#file_general").val("");
            $("#file_daño").val("");
            $("#txt_direccion_vecino").val("");
            
            $("#txt_voluntario").val("");
            $("#txt_diagnostico").val("");
            $("#txt_monto").val("")
            $("#txt_propuesta").val("");
            $("#file_firma").val("");
            limpiar();
            table.ajax.reload();

        }
    })
    
}
function limpiar()
{
    $('imgSalida').attr('src', '');
}


$('#tabla_requerimiento').on('click', '.editar', function() {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    $("#modal_edit").modal({ backdrop: 'static', keyboard: false })
    $("#modal_edit").modal('show');

    $("#idrequerimiento").val(data.requerimiento_id);

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


