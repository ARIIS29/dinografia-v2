var table;
var actual_url = document.URL;
var method_call = "";

console.log(actual_url);
// Configuraciones
(actual_url.indexOf("index") < 0) ? method_call = "evaluacion_ejercicios/" : method_call = "";
$.fn.dataTable.ext.errMode = 'throw'; // Configuración de manejo de errores de DataTables

$(document).ready(function () {
    table = $('#table').DataTable({
        "scrollX": true,
        "deferRender": true,
        'processing': true,
        "order": [[0, "desc"]],
        "lengthMenu": [[25, 50, 100, 250, 500, -1], [25, 50, 100, 250, 500, "Todos"]],
        "ajax": {
            "url": method_call + "obtener_evaluacion_ejercicios_por_usuario",
            "type": 'POST'
        },
        "columns": [
            { "data": "id" },
            { "data": "fecha" },
            { "data": "nombre" },
            { "data": "cronometro" },
            { "data": "correctas" },
            { "data": "incorrectas" },
            { "data": "estrellas" },
            { "data": "evaluacion" },
            { "data": "observaciones" },
            // {"data": "opciones"},
        ],
        'language': {
            "sProcessing": '<i class="fa fa-spinner spinner"></i> Cargando...',
            "sLengthMenu": "Mostrar MENU",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Juega para ver tus resultados &#128512",
            "sInfo": "Mostrando del Inicio al Fin de TOTAL",
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
        rowCallback: function (row, data, index) {
            if (data.evaluacion === '¡A seguir practicando!') {
                $(row).css('background-color', '#FF8000'); // Fila en naranja
            } else if (data.evaluacion === '¡Casi lo logras!') {
                $(row).css('background-color', '#FFFF00'); // Fila en amarillo
            } else if (data.evaluacion === '¡Super asombroso!') {
                $(row).css('background-color', '#4BE54B'); // Fila en verde
            }
            // $(row).find('td:eq(0)').css('background-color', '#37BC9B');
            // $(row).find('td:eq(1)').css('background-color', '#37BC9B');
            // $(row).find('td:eq(2)').css('background-color', '#37BC9B');
            // $(row).find('td:eq(2)').css('background-color', '#37BC9B');
            // $(row).find('td:eq(4)').css('background-color', '#37BC9B');
            $(row).find('td:eq(2)').css('text-align', 'justify');
            $(row).find('td:eq(8)').css('text-align', 'justify');
            // $(row).find('td:eq(6)').css('background-color', '#37BC9B');

            // $(row).find('td:eq(0)').css('color', 'white');
            // $(row).find('td:eq(1)').css('color', 'white');
            // $(row).find('td:eq(2)').css('color', 'white');
            // $(row).find('td:eq(3)').css('color', 'white');
            // $(row).find('td:eq(4)').css('color', 'white');
            // $(row).find('td:eq(5)').css('color', 'white');
        }
    });
});