var inscTable;
$(function () {

    
    inscTable =  $('#inscriptionList').DataTable( {
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
        },
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ],
        
    } );

    if(window.screen.width < 768){
        $("#accordionSidebar").addClass("toggled")
        inscTable.column(0).visible(false);
        inscTable.column(1).visible(false);
        inscTable.column(4).visible(false);
        inscTable.column(5).visible(false);
        inscTable.column(6).visible(false);
    }
   
    $('a.toggle-vis').on( 'click', function (e) {
        e.preventDefault();
        
        // Get the column API object
        var column = inscTable.column( $(this).attr('data-column') );
        
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
    
} );