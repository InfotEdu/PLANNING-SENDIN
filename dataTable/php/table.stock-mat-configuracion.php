<?php

/*
 * Editor server script for DB table comunidades
 * Created by http://editor.datatables.net/generator
 */

// DataTables PHP library and database connection
include( "lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate,
    DataTables\Editor\ValidateOptions;




// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'sen_stock_art', 'id' )
	->fields(
		Field::inst( 'sen_stock_art.id' ),
        Field::inst( 'sen_stock_art.nom_articulo' ),
		Field::inst( 'sen_stock_art.formato' ),        
        Field::inst( 'sen_stock_art.peso_paquete' ),
        Field::inst( 'sen_stock_art.consumo' )
	)
	->process( $_POST )
	->json();
