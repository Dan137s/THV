var tableencuesta1;

function listar_encuesta1() {
    tableencuesta1 = $("#tabla_encuesta1").DataTable({
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
            "url": "../controlador/encuesta1/controlador_encuesta1_listar.php",
            type: 'POST'
        },
        "order": [
            [1, 'asc']
        ],
        "columns": [

            { "data": "posicion" },
            { "data": "rut" },
            { "data": "nombre" },
            { "data": "fecha_inicio" },

            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>" }
        ],

        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_encuesta1_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function() {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function() {
        filterColumn($(this).parents('tr').attr('data-column'));
    });


    tableencuesta1.on('draw.dt', function() {
        var PageInfo = $('#tabla_encuesta1').DataTable().page.info();
        tableencuesta1.column(0, { page: 'current' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

}

function filterGlobal() {
    $('#tabla_encuesta1').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}