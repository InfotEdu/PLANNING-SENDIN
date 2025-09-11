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
        Field::inst( 'sen_stock_mat.d6_chilly' ),
        Field::inst( 'sen_stock_mat.d8_chilly' ),
        Field::inst( 'sen_stock_mat.d9_chilly' ),
        Field::inst( 'sen_stock_mat.d10_chilly' ),
        Field::inst( 'sen_stock_mat.d12_chilly' ),
        Field::inst( 'sen_stock_mat.d14_chilly' ),
        Field::inst( 'sen_stock_mat.d16_chilly' ),
        Field::inst( 'sen_stock_mat.d20_chilly' ),
        Field::inst( 'sen_stock_mat.d25_chilly' ),
        Field::inst( 'sen_stock_mat.d32_chilly' ),
		Field::inst( 'sen_stock_mat.d40_chilly' ),
		Field::inst( 'sen_stock_mat.fecha' )
	)
	->where( 'sen_stock_mat.familia', 2 )
	->where( 'sen_stock_mat.fecha', $_GET["fecha"] )
	->process( $_POST )
	->json();
