
/*
 * Editor client script for DB table tablets
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {


	 //Se obtiene el valor de la URL desde el navegador
     var actual = window.location+'';
     //Se realiza la división de la URL
     var split = actual.split("id_origen=");
     //Se obtiene el ultimo valor de la URL
     var id_origen = split[split.length-1];
     //console.log(id_origen);


	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.documentation.php?id_origen='+id_origen,
		table: '#documentation',
		fields: [
			{
				"label": "Famille:",
				"name": "sen_documentacion.id_origen_doc",
				"def": id_origen,
				"type":"hidden"
			},
			{
				"label": "Documentacion:",
				"name": "sen_documentacion.nombre"
			},
            {
                label: "Documentation (PDF):",
                name: "sen_documentacion.url",
                type: "upload",
                display: function ( file_id ) {
                    return '<img src="https://planning.sendin.com/upload/archivo-ok.png"/>';
                },
                clearText: "Borrar",
                noImageText: 'Sin documentation'
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
    $('#documentation tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Chercher '+title+'" />' );
    } );

	var table = $('#documentation').DataTable( {
		ajax: 'php/table.documentation.php?id_origen='+id_origen,
		columns: [
			{
				"data": "sen_documentacion.nombre"
			},
			{
				"data": "sen_documentacion.url", "title": "Voir documentation", render : function (data, type, full, meta) 
                                         { return '<a href="https://planning.sendin.com/upload/'+data+'.pdf" target="_blank" />Voir documentation</a>'; }
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

