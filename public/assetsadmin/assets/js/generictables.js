jQuery.noConflict();
jQuery(function () {
    jQuery('#genericTables').DataTable( {
        "language": {
            "lengthMenu": "_MENU_ registros por página.",
            "zeroRecords": "UPS!!! no hay registros",
            "info": "Mostrando pág. _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrando de un total de _MAX_ records)",
            "search": "Buscar",
            "paginate": {
                "first":      "Primer",
                "last":       "Último",
                "next":       "Siguiente",
                "previous":   "Previo"
            },
        }
    } );
} );