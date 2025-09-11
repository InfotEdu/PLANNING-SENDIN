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

    if(isset($_GET['id_tipo'])){
        $id_tipo = $_GET['id_tipo'];
    }


// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'sen_productos', 'id' )
	->fields(
        Field::inst( 'sen_productos.id_tipo' ),
        Field::inst( 'sen_productos.fecha_produccion' ),
		Field::inst( 'sen_productos.obra' ),
        Field::inst( 'sen_productos.cliente' ),
        Field::inst( 'sen_productos.seq' ),
        Field::inst( 'sen_productos.peso' ),
        Field::inst( 'sen_productos.estado' ),
        Field::inst( 'sen_productos.comentarios' )
    )
    ->where( 'sen_productos.id_tipo', $id_tipo )
	->process( $_POST )
	->json();
