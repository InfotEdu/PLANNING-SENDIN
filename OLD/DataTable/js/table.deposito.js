
/*
 * Editor client script for DB table deposito
 * Created by http://editor.datatables.net/generator
 */
(function($){
$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.deposito.php',
		table: '#deposito',
		fields: [
			{
				"label": "Nombre:",
				"name": "deposito.nombre"
			},
			{
				"label": "Capacidad:",
				"name": "deposito.capacidad"
			},
			{
				"label": "Litros Actuales:",
				"name": "deposito.litros_actuales"
			},
			{
				"label": "Veh&iacute;culo portador:",
				"name": "deposito.vehculo_portador",
				"type": "select",
                "placeholder": "Selecciona un vehículo portador"
			},
			{
				"label": "Tipo combustible:",
				"name": "deposito.tipo_combustible",
				"type": "select",
                "placeholder": "Selecciona un tipo de combustible"
			},
			{
				"label": "Coeficiente:",
				"name": "deposito.coeficiente"
			}
		],
		i18n: {
            create: {
                button: "Añadir",
                title:  "Nuevo Deposito",
                submit: "Aceptar"
            },
            edit: {
                button: "Editar",
                title:  "Editar Deposito",
                submit: "Editar"
            },
            remove: {
                button: "Borrar",
                title:  "Borrar",
                submit: "Borrar",
                confirm: {
                    _: "Seguro que quieres eliminar el %d ?",
                    1: "Seguro que quieres eliminar el deposito?"
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

	editor.on( 'initCreate', function ( e, node, data) {
	    
	    editor.enable('deposito.nombre');

	    
	    //$("#DTE_Field_entrada_deposito-depsito").attr("disabled","disabled");
	} );

	editor.on( 'initEdit', function ( e, node, data) {


	    editor.disable('deposito.nombre');

	} );

// Setup - add a text input to each footer cell
    $('#deposito tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
    } );

	var table = $('#deposito').DataTable( {
		ajax: 'php/table.deposito.php',
		columns: [
			{
				"data": "deposito.nombre"
			},
			{
				"data": "deposito.capacidad"
			},
			{
				"data": "deposito.litros_actuales"
			},
			{
				"data": "deposito.vehculo_portador"
			},
			{
				"data": "deposito.tipo_combustible"
			},
			{
				"data": "deposito.coeficiente"
			}
		],
		select: true,
		lengthChange: true,
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

	    },
	    createdRow: function( row, data, dataIndex ) {
		    if ( parseInt(data.deposito['litros_actuales']) > parseInt(data.deposito['capacidad']) || data.deposito['litros_actuales'] < 25) {
		      $(row).addClass( 'rojo' );
		    }
		}

	} );

	$('#deposito tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        var r = confirm("Ver resumen entradas salidas del deposito "+data.deposito.nombre );
		if (r == true) {
		  window.location.href = "https://emipesa.es/aplicaciones/dataTable/resumen/verResumen/"+data.deposito.nombre;
		} else {
		  txt = "You pressed Cancel!";
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



