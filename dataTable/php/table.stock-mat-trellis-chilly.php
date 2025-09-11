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
        Field::inst( 'sen_stock_mat.paf10_chilly' ),
        Field::inst( 'sen_stock_mat.st20_chilly' ),
        Field::inst( 'sen_stock_mat.st25_chilly' ),
        Field::inst( 'sen_stock_mat.st25c_chilly' ),
        Field::inst( 'sen_stock_mat.st35_chilly' ),
        Field::inst( 'sen_stock_mat.st40c_chilly' ),
        Field::inst( 'sen_stock_mat.st50_chilly' ),
        Field::inst( 'sen_stock_mat.st50c_chilly' ),
        Field::inst( 'sen_stock_mat.st60_chilly' ),
        Field::inst( 'sen_stock_mat.st65c_chilly' ),
		Field::inst( 'sen_stock_mat.st15c_chilly' ),
		Field::inst( 'sen_stock_mat.fecha' )
	)
	->where( 'sen_stock_mat.familia', 3 )
	->where( 'sen_stock_mat.fecha', $_GET["fecha"] )
	->process( $_POST )
	->json();
