
/*
 * Editor client script for DB table tablets
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {

	var sessionValue = $("#idusuario").val();

	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.cartas.php?id='+sessionValue,
		table: '#cartas',
		fields: [
			/*{
				"label": "Id Cliente:",
				"name": "cartas.id_cliente"
			},*/
			{
				"label": "Nombre:",
				"name": "cartas.nombre"
			},
			/*{
                label: "Imagen:",
                name: "cartas.foto",
                type: "upload",
                display: function (data, type, full, meta) 
                                         { return '<img style="max-width:150px;" src="'+data+'"/>'; },
                clearText: "Borrar",
                noImageText: 'Sin imagen'
            }*/
            {
                label: "Carta (PDF):",
                name: "cartas.id_file",
                type: "upload",
                display: function ( file_id ) {
                    return '<img src="https://tucartadigital.app/upload/archivo-ok.png"/>';
                },
                clearText: "Borrar",
                noImageText: 'Sin carta'
            }
		],
		i18n: {
            create: {
                button: "Añadir",
                title:  "Nueva carta",
                submit: "Aceptar"
            },
            edit: {
                button: "Editar",
                title:  "Editar carta",
                submit: "Editar"
            },
            remove: {
                button: "Borrar",
                title:  "Borrar",
                submit: "Borrar",
                confirm: {
                    _: "Seguro que quieres eliminar el %d ?",
                    1: "Seguro que quieres eliminar la carta?"
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

	editor.on( 'submitComplete', function ( e, json, data, action) {

		if (action == 'edit') {
		  $.getJSON( 'https://tucartadigital.app/public/appService/generaBlobComunidad.php/?id_file='+data.cartas.id_file+'&id_carta='+data.DT_RowId+'&id_cliente='+sessionValue, function( data2 ) {
			  
			});

			$('#cartas').DataTable().ajax.reload();
		}
	} );

	// Setup - add a text input to each footer cell
    $('#cartas tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
    } );

	var table = $('#cartas').DataTable( {
		ajax: 'php/table.cartas.php?id='+sessionValue,
		columns: [
			{
				"data": "cartas.id_carta"
			},
			{
				"data": "cartas.nombre"
			},
			{ "data": "cartas.id_carta", "title": "Ver Carta", render : function (data, type, full, meta) 
                                         { return '<a href="https://tucartadigital.app/upload/'+sessionValue+'/'+data+'.pdf" target="_blank" />Ver carta</a>'; }
    		},
            { data: null, render: function ( data, type, row ) {
                return '<a href="https://tucartadigital.app/dataTable/cartas/verqr?t='+data.cartas.nombre+'&u=https://tucartadigital.app/upload/'+data.cartas.id_cliente+'/'+data.cartas.id_carta+'.pdf" target="_blank" />Ver QR</a>';
            } }
		],
		select: true,
		lengthChange: false,
		language: {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
            select: {
	            rows: " %d filas seleccionadas"
	        }        },
		order: [
			[0,"desc"]
		],
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
		/*{ extend: "create", editor: editor },*/
		{ extend: "edit",   editor: editor }
		/*{ extend: "remove", editor: editor },
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
} );

}(jQuery));

