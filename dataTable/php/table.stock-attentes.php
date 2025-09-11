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
		Field::inst( 'sen_stock.id_familia' ),
        Field::inst( 'sen_stock.tipo' ),
		Field::inst( 'sen_stock.unites_chilly' ),
		Field::inst( 'sen_stock.unites_spain' ),
		Field::inst( 'sen_stock.foto' )
            ->setFormatter( Format::ifEmpty( null ) )
            ->upload( Upload::inst( $_SERVER['DOCUMENT_ROOT'].'/upload/__ID__.__EXTN__' )
                ->db( 'files', 'id', array(
                    'filename'    => Upload::DB_FILE_NAME,
                    'filesize'    => Upload::DB_FILE_SIZE,
                    'web_path'    => Upload::DB_WEB_PATH,
                    'system_path' => Upload::DB_SYSTEM_PATH
                ) )
                ->validator( Validate::fileSize( 500000, 'Las imágenes deben ser menores de 0.5Mb' ) )
                ->validator( Validate::fileExtensions( array( 'png', 'jpg', 'jpeg', 'gif' ), "Sólo se aceptan imágenes" ) )
            )
	)
	->where( 'sen_stock.id_familia', 2 )
	->process( $_POST )
	->json();
