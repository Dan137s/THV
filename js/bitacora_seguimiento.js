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
            {
                "data": "requerimiento_estado",
                render: function(data, type, row) {
                    if (data == 'ACTIVO') {
                        return 'ACTIVO';
                    } else {
                        return 'INACTIVO';
                    }
                }
            },
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