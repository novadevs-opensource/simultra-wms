
$('document').ready(function(){
    // Common dataTables settings
        $('.dataTables').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'sections-excel'},
                {extend: 'pdf', title: 'sections-pdf'},
    
                {extend: 'print',
                text: 'Imprimir',
                customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');
    
                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ],
            "language": {
                "lengthMenu":   "Mostrando _MENU_ registros por página",
                "zeroRecords":  "Sin coincidencias - lo siento",
                "info":         "Mostrando _PAGE_ de _PAGES_",
                "infoEmpty":    "Sin registros disponibles",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search":       "Búsqueda: ",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Último",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
            }
        });
    });    