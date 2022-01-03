var tablematerial;

function listar_material() {
    tablematerial = $("#tabla_material").DataTable({
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
            "url": "../controlador/material/controlador_material_listar_tr.php",
            type: 'POST'
        },
        "order": [
            [1, 'asc']
        ],
        "columns": [

            { "defaultContent": "" },

            { "data": "material_nombre" },
            { "data": "material_descripcion" },
            { "data": "material_stock" },
            { "data": "material_fregistro" },
            {
                "data": "material_estatus",
                render: function(data, type, row) {
                    if (data == 'ACTIVO') {
                        return "<span class='label label-success'>" + data + "</span>";
                    }
                    if (data == 'INACTIVO') {
                        return "<span class='label label-danger'>" + data + "</span>";
                    }
                    if (data == 'AGOTADO') {
                        return "<span class='label label-yellow' style='background:gold'>" + data + "</span>";
                    }
                }
            },


            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>" }
        ],

        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_material_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function() {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function() {
        filterColumn($(this).parents('tr').attr('data-column'));
    });


    tablematerial.on('draw.dt', function() {
        var PageInfo = $('#tabla_material').DataTable().page.info();
        tablematerial.column(0, { page: 'current' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

}

$('#tabla_material').on('click', '.editar', function() {
    var data = tablematerial.row($(this).parents('tr')).data(); //Capturar a la fila que clickeo los datos en la variable data
    if (tablematerial.row(this).child.isShown()) { //Aqui cuando esta en tamaño responsivo
        var data = tablematerial.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false }) //Aqui se abro el modal editar
    $("#modal_editar").modal('show'); //Muestro el modal o formulario

    $("#txt_id_material").val(data.material_id)
    $("#txt_material_actual_editar").val(data.material_nombre)
    $("#txt_material_nuevo_editar").val(data.material_nombre)
    $("#txt_descripcion_editar").val(data.material_descripcion)
    $("#txt_stock_editar").val(data.material_stock)
    $("#txt_estatus_editar").val(data.material_estatus).trigger("change");
})

function filterGlobal() {
    $('#tabla_material').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}


function Registrar_Material() {
    var material = $("#txt_material").val();
    var descripcion = $("#txt_descripcion").val();
    var stock = $("#txt_stock").val();
    var estatus = $("#txt_estatus").val();

    //Aqui pueden ir las condicionales en este caso campos vacios
    if (stock < 0) {
        Swal.fire("Mensaje De Advertencia", "El stock no debe ser negativo", "warning");
    }
    if (material.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    $.ajax({
        "url": "../controlador/material/controlador_material_registro_tr.php",
        type: 'POST',
        data: {
            ma: material,
            ds: descripcion,
            st: stock,
            es: estatus

        }
    }).done(function(resp) {
        if (resp > 0) {
            if (resp == 1) {
                $("#modal_registro").modal('hide'); //Cierro el modal del registro
                listar_material();
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
    $("#txt_material").val("");
    $("#txt_descripcion").val("");
    $("#txt_stock").val("");

}

//Modificar insumo
function Modificar_Material() {
    var id = $("#txt_id_material").val();
    var materialactual = $("#txt_material_actual_editar").val();
    var materialnuevo = $("#txt_material_nuevo_editar").val();
    var descripcion = $("#txt_descripcion_editar").val();
    var stock = $("#txt_stock_editar").val();
    var estatus = $("#txt_estatus_editar").val();
    if (stock < 0) {
        Swal.fire("Mensaje De Advertencia", "El stock no debe ser negativo", "warning");
    }
    if (materialactual.length == 0 || materialnuevo.length == 0 || descripcion.length == 0 || stock.length == 0 || estatus.length == 0) {
        Swal.fire("Mensaje de Advertencia", "Llene los campos vacios", "warning");
    }

    $.ajax({
        "url": "../controlador/material/controlador_material_modificar_tr.php",
        type: 'POST',
        data: {
            id: id,
            acma: materialactual,
            numa: materialnuevo,
            ds: descripcion,
            st: stock,
            es: estatus

        }
    }).done(function(resp) {
        if (resp > 0) {
            if (resp == 1) { //Cuando el valor retorne 1 lista de nuevo la tabla
                $("#modal_editar").modal('hide'); //Cierro el modal del editar
                listar_material();


                Swal.fire("Mensaje de Confirmacion", "Datos guardados correctamante, material actualizado", "success");
            } else {

                Swal.fire("Mensaje de Advertencia", "No se puede duplicar ya existe", "warning");

            }
        } else {

            Swal.fire("Mensaje de Error", "Lo sentimos su actualizacion no se pudo completar", "error");

        }
    })

}