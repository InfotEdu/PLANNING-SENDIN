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

    if(isset($_GET['id_fila'])){
        $id_fila = $_GET['id_fila'];
    }


// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'cartas', 'id_carta' )
	->fields(
		Field::inst( 'cartas.id_carta' ),
        Field::inst( 'cartas.id_cliente' ),
		Field::inst( 'cartas.nombre' ),
		
        Field::inst( 'cartas.id_file' )
            ->setFormatter( Format::ifEmpty( null ) )
            ->upload( Upload::inst( $_SERVER['DOCUMENT_ROOT'].'/upload/__ID__.__EXTN__' )
                ->db( 'files', 'id', array(
                    'filename'    => Upload::DB_FILE_NAME,
                    'filesize'    => Upload::DB_FILE_SIZE,
                    'web_path'    => Upload::DB_WEB_PATH,
                    'system_path' => Upload::DB_SYSTEM_PATH
                ) )
                ->validator( Validate::fileSize( 50000000, 'Los documentos deben ser menores de 50Mb' ) )
                ->validator( Validate::fileExtensions( array( 'pdf'), "Sólo se aceptan PDF" ) )
            )
	)
    ->where( 'cartas.id_cliente', $_GET['id'] )
	->process( $_POST )
	->json();
