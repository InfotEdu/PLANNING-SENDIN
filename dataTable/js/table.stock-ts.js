
/*
 * Editor client script for DB table deposito
 * Created by http://editor.datatables.net/generator
 */
(function($){
$(document).ready(function() {




	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.stock-ts.php',
		table: '#stock',
		fields: [
			{
				"label": "Famille:",
				"name": "sen_stock.id_familia",
				"def": 1,
				"type":"hidden"
			},
			{
				"label": "Type:",
				"name": "sen_stock.tipo"
			},
			{
				"label": "Colis Chilly:",
				"name": "sen_stock.colis_chilly"
			},
			{
				"label": "Poids Chilly:",
				"name": "sen_stock.poids_chilly", attr:{ disabled:true }
			},
			{
				"label": "Colis Spain:",
				"name": "sen_stock.colis_spain"
			},
			{
				"label": "Poids Spain:",
				"name": "sen_stock.poids_spain", attr:{ disabled:true }
			},
			{
				"label": "Masse 1 paquet:",
				"name": "sen_stock.kg_paquete"
			}/*,
			{
                label: "Image:",
                name: "sen_stock.foto",
                type: "upload",
                display: function ( file_id ) {
                    return '<img src="'+editor.file( 'files', file_id ).web_path+'"/>';
                },
                clearText: "Borrar",
                noImageText: 'Sin imagen'
            }*/
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






	    $( editor.field( 'sen_stock.colis_spain' ).input() ).on( 'change', function (e, d) {

			  var colis = $('#DTE_Field_sen_stock-colis_spain').val();
			  var peso = $('#DTE_Field_sen_stock-kg_paquete').val();
			  var formula = (colis * peso)/1000;

			  $('#DTE_Field_sen_stock-poids_spain').val(formula);

		} );

		$( editor.field( 'sen_stock.colis_chilly' ).input() ).on( 'change', function (e, d) {

			  var colis = $('#DTE_Field_sen_stock-colis_chilly').val();
			  var peso = $('#DTE_Field_sen_stock-kg_paquete').val();
			  var formula = (colis * peso)/1000;

			  $('#DTE_Field_sen_stock-poids_chilly').val(formula);

		} );
			  


// Setup - add a text input to each footer cell
    $('#stock tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Chercher '+title+'" />' );
    } );

	var table = $('#stock').DataTable( {
		ajax: 'php/table.stock-ts.php',
		columns: [
			{
				"data": "sen_stock.tipo"
			},
			{
				"data": "sen_stock.colis_chilly"
			},
			{
				"data": "sen_stock.poids_chilly"
			},
			{
				"data": "sen_stock.colis_spain"
			},
			{
				"data": "sen_stock.poids_spain"
			},
			{
				"data": "sen_stock.kg_paquete"
			}/*,
    		{
                data: "sen_stock.foto",
                render: function ( file_id ) {
                    return file_id ?
                        '<img style="max-width:150px;" src="'+editor.file( 'files', file_id ).web_path+'"/>' :
                        null;
                },
                defaultContent: "No image",
                title: "Image"
            }*/
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
		{ extend: "create", editor: editor },
		{ extend: "edit",   editor: editor },
		{ extend: "remove", editor: editor },
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



