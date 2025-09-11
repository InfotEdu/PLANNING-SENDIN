
/*
 * Editor client script for DB table deposito
 * Created by http://editor.datatables.net/generator
 */
(function($){
$(document).ready(function() {


    var fecha = $("#fecha").val();
    var editable = $("#editable").val();




    if (editable == 1) {
        var editor = new $.fn.dataTable.Editor( {
            ajax: 'php/table.stock-mat-couplers-pr.php/?fecha='+fecha,
            table: '#UNITESCOUPLERS_PRESION',
            fields: [
                {
                    "name": "sen_stock_mat.c12_spain"
                },
                {
                    "name": "sen_stock_mat.c14_spain"
                },
                {
                    "name": "sen_stock_mat.c16_spain"
                },
                {
                    "name": "sen_stock_mat.c20_spain"
                },
                {
                    "name": "sen_stock_mat.c26_spain"
                },
                {
                    "name": "sen_stock_mat.c32_spain"
                },
                {
                    "name": "sen_stock_mat.c40_spain"
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
            },
            formOptions: {
                inline: {
                    onBlur: true
                }
            }
        } );

    }else{
        var editor = new $.fn.dataTable.Editor( {
            ajax: 'php/table.stock-mat-couplers-pr.php/?fecha='+fecha,
            table: '#UNITESCOUPLERS_PRESION',
            fields: [


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
            },
            formOptions: {
                inline: {
                    onBlur: true
                }
            }
        } );

    }


         // Activate an inline edit on click of a table cell
        $('#stock').on( 'click', 'tbody td:not(:first-child)', function (e) {
            editor.inline( this );
        } );


/*
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
			  */


// Setup - add a text input to each footer cell
    $('#stock tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Chercher '+title+'" />' );
    } );

	var table = $('#UNITESCOUPLERS_PRESION').DataTable( {
		ajax: 'php/table.stock-mat-couplers-pr.php/?fecha='+fecha,
		columns: [
			{
				"data": "sen_stock_mat.orden",
				"visible": false,
			},
			{
				"data": "sen_stock_mat.nom_articulo"
			},
			{
				"data": "sen_stock_mat.c12_spain"
			},
			{
				"data": "sen_stock_mat.c14_spain"
			},
			{
				"data": "sen_stock_mat.c16_spain"
			},
			{
				"data": "sen_stock_mat.c20_spain"
			},
			{
				"data": "sen_stock_mat.c26_spain"
			},
			{
				"data": "sen_stock_mat.c32_spain"
			},
			{
				"data": "sen_stock_mat.c40_spain"
			}
		],
		paging: false,
		searching: false,
		bInfo : false,
		ordering: false,
		order: [ 0, 'asc' ],
		 keys: {
            columns: ':not(:first-child)',
            keys: [ 9 ],
            editor: editor,
            editOnFocus: true
        },
		select: true,
		lengthChange: true,
		language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json",
            select: {
	            rows: " %d lignes sélectionnées"
	        }        
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

             total = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            $( api.column( 2 ).footer() ).html(
                total
            );

             total = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            $( api.column( 3 ).footer() ).html(
                total
            );
 
            // Total over all pages
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
   
            // Update footer
            $( api.column( 4 ).footer() ).html(
                total
            );

         
             total = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            $( api.column( 5 ).footer() ).html(
                total
            );

             total = api
                .column( 6 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            $( api.column( 6 ).footer() ).html(
                total
            );

             total = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            $( api.column( 7 ).footer() ).html(
                total
            );

             total = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            $( api.column( 8 ).footer() ).html(
                total
            );

            

        },
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

	   


		}

	} );

	
	new $.fn.dataTable.Buttons( table, [
		/*{ extend: "create", editor: editor },
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
        }*/
	] );

	table.buttons().container()
		.appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );

		// Apply the search
} );}(jQuery));



