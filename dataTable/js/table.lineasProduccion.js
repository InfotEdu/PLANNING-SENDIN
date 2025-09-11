
/*
 * Editor client script for DB table tablets
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {


	 //Se obtiene el valor de la URL desde el navegador
     var actual = window.location+'';
     //Se realiza la división de la URL
     var split = actual.split("id_tipo=");
     //Se obtiene el ultimo valor de la URL
     var id_tipo = split[split.length-1];
     console.log(id_tipo);


	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.lineasProduccion.php?id_tipo='+id_tipo,
		table: '#lineasProduccion',
		fields: [
			{
				"label": "Famille:",
				"name": "sen_productos.id_tipo",
				"def": id_tipo,
				"type":"hidden"
			},
            {
                "label": "Date de production:",
                "name": "sen_productos.fecha_produccion",
                "type":"date"
            },
            {
                "label": "Travail:",
                "name": "sen_productos.obra"
            },
            {
                "label": "Client:",
                "name": "sen_productos.cliente"
            },
            {
                "label": "SEQ:",
                "name": "sen_productos.seq"
            },
            {
                "label": "Poids:",
                "name": "sen_productos.peso"
            },
            {
                "label": "Etat:",
                "name": "sen_productos.estado"
            },
            {
                "label": "Commentaires:",
                "name": "sen_productos.comentarios"
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
    $('#lineasProduccion tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Chercher '+title+'" />' );
    } );

	var table = $('#lineasProduccion').DataTable( {
            		ajax: 'php/table.lineasProduccion.php?id_tipo='+id_tipo,
            		columns: [
            			{
            				"data": "sen_productos.fecha_produccion"
            			},
                        {
                            "data": "sen_productos.obra"
                        },
                        {
                            "data": "sen_productos.cliente"
                        },
                        {
                            "data": "sen_productos.seq"
                        },
                        {
                            "data": "sen_productos.peso"
                        },
                        {
                            "data": "sen_productos.estado"
                        },
                        {
                            "data": "sen_productos.comentarios"
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
	               },

                   footerCallback: function ( row, data, start, end, display ) {
                            var api = this.api(), data;
                 
                            // Remove the formatting to get integer data for summation
                            var intVal = function ( i ) {
                                return typeof i === 'string' ?
                                    i.replace(/[\$,]/g, '')*1 :
                                    typeof i === 'number' ?
                                        i : 0;
                            };
                 
                            // Total over all pages
                            total = api
                                .column( 4 )
                                .data()
                                .reduce( function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0 );
                 
                            // Total over this page
                            pageTotal = api
                                .column( 4, { page: 'current'} )
                                .data()
                                .reduce( function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0 );
                 
                            // Update footer
                            $( api.column( 4 ).footer() ).html(
                                pageTotal +' Tn'
                            );
                        }

	} );




	new $.fn.dataTable.Buttons( table, [
		{ extend: "create", editor: editor },
		{ extend: "edit",   editor: editor },
        {
                extend: "selected",
                text: 'Dupliquer',
                action: function ( e, dt, node, config ) {
                    // Start in edit mode, and then change to create
                    editor
                        .edit( table.rows( {selected: true} ).indexes(), {
                            title: 'Enregistrement en double',
                            buttons: 'Créer à partir de lexistant'
                        } )
                        .mode( 'create' );
                }
            },
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

