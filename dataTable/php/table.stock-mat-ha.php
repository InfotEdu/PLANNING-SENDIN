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
        Field::inst( 'sen_stock_mat.d6_spain' ),
        Field::inst( 'sen_stock_mat.d8_spain' ),
        Field::inst( 'sen_stock_mat.d9_spain' ),
        Field::inst( 'sen_stock_mat.d10_spain' ),
        Field::inst( 'sen_stock_mat.d12_spain' ),
        Field::inst( 'sen_stock_mat.d14_spain' ),
        Field::inst( 'sen_stock_mat.d16_spain' ),
        Field::inst( 'sen_stock_mat.d20_spain' ),
        Field::inst( 'sen_stock_mat.d25_spain' ),
        Field::inst( 'sen_stock_mat.d32_spain' ),
		Field::inst( 'sen_stock_mat.d40_spain' ),
		Field::inst( 'sen_stock_mat.fecha' )
	)
	->where( 'sen_stock_mat.familia', 1 )
	->where( 'sen_stock_mat.fecha', $_GET["fecha"] )
	->where( 'sen_stock_mat.id_articulo', 14, '!=' ) // las barras de 16 no se muestran en españa porque no las producen
	->where( 'sen_stock_mat.id_articulo', 15, '!=' ) // las barras de 17 no se muestran en españa porque no las producen 
	->process( $_POST )
	->json();
