<?php

/*
 * Editor server script for DB table sen_stock
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

// The following statement can be removed after the first run (i.e. the database
// table has been created). It is a good idea to do this to help improve
// performance.

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'sen_stock_mat', 'id' )
	->fields(
		Field::inst( 'sen_stock_mat.nom_articulo' ),
		Field::inst( 'sen_stock_mat.orden' ),
        Field::inst( 'sen_stock_mat.c12_spain' ),
        Field::inst( 'sen_stock_mat.c14_spain' ),
        Field::inst( 'sen_stock_mat.c16_spain' ),
        Field::inst( 'sen_stock_mat.c20_spain' ),
        Field::inst( 'sen_stock_mat.c26_spain' ),
        Field::inst( 'sen_stock_mat.c32_spain' ),
        Field::inst( 'sen_stock_mat.c40_spain' ),
		Field::inst( 'sen_stock_mat.fecha' )
	)
	->where( 'sen_stock_mat.familia', 4 )
	->where( 'sen_stock_mat.fecha', $_GET["fecha"] )
	->process( $_POST )
	->json();
