

/*
 * Editor client script for DB table deposito
 * Created by http://editor.datatables.net/generator
 */
(function($){
$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.stock-mat-configuracion.php',
		table: '#stock',
		fields: [
			{
                "label": "Peso:",
                "name": "sen_stock_art.peso_paquete"
            },
            {
                "label": "Consumo:",
                "name": "sen_stock_art.consumo"
            }
		],
        i18n: {
            create: {
                button: "Nouveau",
                title:  "Créer nouvelle entrée",
                submit: "Créer"
            },
            edit: {
                button: "Modifier",
                title:  "Modifier entrée",
                submit: "Actualiser"
            },
            remove: {
                button: "Supprimer",
                title:  "Supprimer",
                submit: "Supprimer",
                confirm: {
                    _: "Etes-vous sûr de vouloir supprimer %d lignes?",
                    1: "Etes-vous sûr de vouloir supprimer 1 ligne?"
                }
            },
            error: {
                system: "Une erreur s’est produite, contacter l’administrateur système"
            },
            datetime: {
                previous: 'Précédent',
                next:     'Premier',
                months:   [ 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' ],
                weekdays: [ 'Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam' ]
            }
        }
	} );


// Setup - add a text input to each footer cell
    $('#stock tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Chercher '+title+'" />' );
    } );

	var table = $('#stock').DataTable( {
		ajax: 'php/table.stock-mat-configuracion.php',
		columns: [
			{
				"data": "sen_stock_art.nom_articulo"
			},
			{
				"data": "sen_stock_art.formato"
			},
			{
				"data": "sen_stock_art.peso_paquete"
			},
			{
				"data": "sen_stock_art.consumo"
			}
		],
		select: true,
		lengthChange: true,
		language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json",
            select: {
	            rows: " %d lignes sélectionnées"
	        }        },
        initComplete: function () {
	      

		table.columns().every( function () {
	        var that = this;
	 
	        $( 'input', this.footer() ).on( 'keyup change', function () {
	            if ( that.search() !== this.value ) {
	                that
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
		setTimeout( function () {
	        table.buttons().container().appendTo( '.col-sm-6:eq(0)' );
	      }, 10 );

	    }

	} );

	
	new $.fn.dataTable.Buttons( table, [
		{ extend: "edit",   editor: editor },
		{
                extend: 'collection',
                text: 'Exportar',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
        }
	] );

	table.buttons().container()
		.appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

		// Apply the search
} );}(jQuery));



