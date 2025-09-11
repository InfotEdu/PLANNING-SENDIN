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
Editor::inst( $db, 'sen_stock', 'id' )
	->fields(
		Field::inst( 'sen_stock.id_familia' )
			->options( Options::inst()
                ->table( 'sen_familias' )
                ->value( 'descripcion' )
                ->label( 'descripcion' )
            )
            ->validator( 'Validate::dbValues' ),
        	Field::inst( 'sen_familias.descripcion' ),
		Field::inst( 'sen_stock.tipo' ),
		Field::inst( 'sen_stock.foto' ),
		Field::inst( 'sen_stock.unites_chilly' ),
		Field::inst( 'sen_stock.unites_spain' )
	)
	->leftJoin( 'sen_familias', 'sen_familias.id', '=', 'sen_stock.id_familia' )
	->process( $_POST )
	->json();
