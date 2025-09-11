
/*
 * Editor client script for DB table deposito
 * Created by http://editor.datatables.net/generator
 */
(function($){
$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.stock-attentes.php',
		table: '#stock',
		fields: [
			{
				"label": "Nombre:",
				"name": "sen_stock.id_familia",
				"type": "select",
                "placeholder": "Selecciona una familia"
			},
			{
				"label": "Capacidad:",
				"name": "sen_stock.tipo"
			},
			{
				"label": "Litros Actuales:",
				"name": "sen_stock.foto"
			},
			{
				"label": "Veh&iacute;culo portador:",
				"name": "sen_stock.unites_chilly"
			},
			{
				"label": "Tipo combustible:",
				"name": "sen_stock.unites_spain"
			}
		],
		i18n: {
            create: {
                button: "Añadir",
                title:  "Nuevo registro de stock",
                submit: "Aceptar"
            },
            edit: {
                button: "Editar",
                title:  "Editar registro de stock",
                submit: "Editar"
            },
            remove: {
                button: "Borrar",
                title:  "Borrar",
                submit: "Borrar",
                confirm: {
                    _: "Seguro que quieres eliminar el %d ?",
                    1: "Seguro que quieres eliminar el registro de stock?"
                }
            }
		},
            datetime: {
            	previous: 'Anterior',
                next:     'Siguiente',
                months:   [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
                weekdays: [ 'Dom', 'Lun', 'Mar', 'Mir', 'Jue', 'Vie', 'Sab' ]
            }
	} );


// Setup - add a text input to each footer cell
    $('#stock tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
    } );

	var table = $('#stock').DataTable( {
		ajax: 'php/table.stock-attentes.php',
		columns: [
			{
				"data": "sen_familias.descripcion"
			},
			{
				"data": "sen_stock.tipo"
			},
			{
				"data": "sen_stock.foto"
			},
			{
				"data": "sen_stock.unites_chilly"
			},
			{
				"data": "sen_stock.unites_spain"
			}
		],
		select: true,
		lengthChange: true,
		language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
            select: {
	            rows: " %d filas seleccionadas"
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



