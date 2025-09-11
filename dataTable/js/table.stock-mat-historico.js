
/*
 * Editor client script for DB table deposito
 * Created by http://editor.datatables.net/generator
 */
(function($){
$(document).ready(function() {




	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.stock-mat-historico.php',
		table: '#HISTORICO',
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



	 // Activate an inline edit on click of a table cell
    $('#HISTORICO').on( 'click', 'tbody td:not(:first-child)', function (e) {
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
    $('#HISTORICO tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Chercher '+title+'" />' );
    } );

	var table = $('#HISTORICO').DataTable( {
		dom: "Bfrtip",
		ajax: 'php/table.stock-mat-historico.php',
		columns: [
			{
				"data": "sen_stock_mat.fecha"
			},
            {
                data: null,
                render: function ( data, type, row ) {
			        return '<a href="StockMAT?fecha='+data.sen_stock_mat.fecha + '" >REGARDER SPAIN</a>';
			    },
                orderable: false
            },
            {
                data: null,
                render: function ( data, type, row ) {
			        return '<a href="StockMATChilly?fecha='+data.sen_stock_mat.fecha + '" >REGARDER CHILLY</a>';
			    },
                orderable: false
            },
            {
                data: null,
                render: function ( data, type, row ) {
			        return '<a href="StockMATCares?fecha='+data.sen_stock_mat.fecha + '" >REGARDER CARES</a>';
			    },
                orderable: false
            }
		],
		paging: true,
		searching: true,
		bInfo : false,
		ordering: true,
		order: [ 0, 'desc' ],
		 keys: {
            columns: ':not(:first-child)',
            keys: [ 9 ],
            editor: editor,
            editOnFocus: true
        },
		select: true,
		buttons: [
			/*{
                text: 'Ver Indicadores pendientes',
                enabled: false, className: 'indicador_show',
                action: function ( e, dt, node, config ) {
			        var fecha = dt.rows( { selected: true } ).data()[0].sen_stock_mat.fecha;
			        window.location = 'StockMAT?fecha='+fecha;
                }
            }*/
		], 
		lengthChange: true,
		language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json",
            select: {
	            rows: " %d lignes sélectionnées"
	        }        
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
		setTimeout( function () {
	        table.buttons().container().appendTo( '.col-sm-6:eq(0)' );
	      }, 10 );
       }

	} );



	
	$('#HISTORICO').on('select.dt deselect.dt', function() {
      table.buttons( ['.indicador_show'] ).enable(
        table.rows( { selected: true } ).indexes().length === 0 ? false : true
      )
    });



		// Apply the search
} );}(jQuery));



