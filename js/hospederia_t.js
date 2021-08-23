function listar_hospederia() {
    var tablehospederia = $("#tabla_hospederia").DataTable({
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