var table;
var actual_url = document.URL;
var method_call = "";

console.log(actual_url);
// Configuraciones
(actual_url.indexOf("index") < 0) ? method_call = "evaluacion_lecciones/" : method_call = "";
$.fn.dataTable.ext.errMode = 'throw'; // Configuración de manejo de errores de DataTables

$(document).ready(function () {
    table = $('#table').DataTable({
        "scrollX": true,
        "deferRender": true,
        'processing': true,
        "order": [[0, "desc"]],
        "lengthMenu": [[25, 50, 100, 250, 500, -1], [25, 50, 100, 250, 500, "Todos"]],
        "ajax": {
            "url": method_call + "obtener_evaluacion_lecciones_por_usuario",
            "type": 'POST'
        },
        "columns": [
            { "data": "id" },
            { "data": "leccion" },
            { "data": "fecha" },
            { "data": "evaluacion" },
            // {"data": "opciones"},
        ],
        'language': {
            "sProcessing": '<i class="fa fa-spinner spinner"></i> Cargando...',
            "sLengthMenu": "Mostrar MENU",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Juega para ver tus resultados &#128512",
            "sInfo": "Mostrando del START al END de TOTAL",
            "sInfoEmpty": "Mostrando del 0 al 0 de 0",
            "sInfoFiltered": "(filtrado MAX)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "&nbsp;",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        // rowCallback: function (row, data, index) {
        //     // $(row).find('td:eq(0)').css('background-color', '#37BC9B');
        //     // $(row).find('td:eq(1)').css('background-color', '#37BC9B');
        //     // $(row).find('td:eq(2)').css('background-color', '#37BC9B');
        //     $(row).find('td:eq(3)').css('background-color', '#37BC9B');
        //     // $(row).find('td:eq(4)').css('background-color', '#37BC9B');
        //     // $(row).find('td:eq(5)').css('background-color', '#37BC9B');
        //     // $(row).find('td:eq(6)').css('background-color', '#37BC9B');

        //     // $(row).find('td:eq(0)').css('color', 'white');
        //     // $(row).find('td:eq(1)').css('color', 'white');
        //     // $(row).find('td:eq(2)').css('color', 'white');
        //     // $(row).find('td:eq(3)').css('color', 'white');
        //     // $(row).find('td:eq(4)').css('color', 'white');
        //     // $(row).find('td:eq(5)').css('color', 'white');
        // }

        rowCallback: function (row, data, index) {
            var cellContent = data.evaluacion; // Accedemos al contenido de la columna 'evaluacion'
        
            // Validación basada en emojis
            if (cellContent.includes("💪")) {
                $(row).find('td:eq(0)').css('background-color', 'rgb(252,75,8)');
                $(row).find('td:eq(1)').css('background-color', 'rgb(252,75,8)');
                $(row).find('td:eq(2)').css('background-color', 'rgb(252,75,8)');
                $(row).find('td:eq(3)').css('background-color', 'rgb(252,75,8)');
            } else if (cellContent.includes("🌟")) {
                $(row).find('td:eq(0)').css('background-color', 'rgb(255, 255, 0)');
                $(row).find('td:eq(1)').css('background-color', 'rgb(255, 255, 0)');
                $(row).find('td:eq(2)').css('background-color', 'rgb(255, 255, 0)');
                $(row).find('td:eq(3)').css('background-color', 'rgb(255, 255, 0)');
            } else if (cellContent.includes("🎉")) {
                $(row).find('td:eq(0)').css('background-color', 'rgb(75, 229, 75)');
                $(row).find('td:eq(1)').css('background-color', 'rgb(75, 229, 75)');
                $(row).find('td:eq(2)').css('background-color', 'rgb(75, 229, 75)');
                $(row).find('td:eq(3)').css('background-color', 'rgb(75, 229, 75)');
            }
        }
    });
});