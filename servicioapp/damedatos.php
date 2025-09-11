<?php
header("Access-Control-Allow-Origin: *");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
setlocale(LC_TIME, 'es_ES.UTF-8');

require "./dbconnect.php";

$con = mysqli_connect(HOST,USER,PASS,DB);

mysqli_query($con,"SET CHARACTER SET 'utf8'");
mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");

if (!$con){

   die("Error in connection" . mysqli_connect_error()) ;

}


$sqlDocumentacion = "SELECT sen_documentacion.`id`,sen_documentacion.`nombre`,sen_documentacion.`url`,sen_documentacion.`id_origen_doc`, files.web_path as url_web FROM `sen_documentacion` LEFT JOIN files ON `sen_documentacion`.`url` = `files`.`id`";
$sqlOrigenDoc = "SELECT * FROM sen_origen_doc";
$sqlFamilias = "SELECT * FROM sen_familias";
$sqlLocalizaciones = "SELECT * FROM sen_localizaciones";
$sqlStock = "SELECT `sen_stock`.`id`,`sen_stock`.`id_familia`,`sen_stock`.`tipo`,`sen_stock`.`colis_spain`,`sen_stock`.`poids_spain`,`sen_stock`.`unites_spain`,`sen_stock`.`colis_chilly`,`sen_stock`.`poids_chilly`,`sen_stock`.`unites_chilly`, files.web_path as url FROM `sen_stock` LEFT JOIN files ON `sen_stock`.`foto` = `files`.`id`";
$sqlTiposProducto = "SELECT * FROM sen_tipo";

$sqlStockMat = "SELECT * from sen_stock_mat WHERE fecha = (SELECT MAX(fecha) FROM `sen_stock_mat`)  order by `orden` ASC";

$sqlStockB500B = "SELECT * FROM `TREILLIS`";
$sqlStockUNITES_HA = "SELECT * FROM `UNITES_HA`";
$sqlStockUNITES_ADX = "SELECT * FROM `UNITES_ADX`";
$sqlStockUNITES_COUPLERS = "SELECT * FROM `UNITES_COUPLERS`";
$sqlStockUNITES_ATTENTES = "SELECT * FROM `UNITES_ATTENTES`";
$sqlStockUNITES_VOILE = "SELECT * FROM `UNITES_VOILE`";




/*$sqlVehiculos = "SELECT * FROM vehiculo";*/


$resultDocumentacion = mysqli_query($con,$sqlDocumentacion);
$resultOrigenDoc = mysqli_query($con,$sqlOrigenDoc);
$resultFamilias = mysqli_query($con,$sqlFamilias);
$resultLocalizaciones = mysqli_query($con,$sqlLocalizaciones);
$resultTiposProducto = mysqli_query($con,$sqlTiposProducto);
$resultStock = mysqli_query($con,$sqlStock);
$resultStockMat = mysqli_query($con,$sqlStockMat);

$resultStockB500B = mysqli_query($con,$sqlStockB500B);
$resultStockUNITES_HA = mysqli_query($con,$sqlStockUNITES_HA);
$resultStockUNITES_ADX = mysqli_query($con,$sqlStockUNITES_ADX);
$resultStockUNITES_COUPLERS = mysqli_query($con,$sqlStockUNITES_COUPLERS);
$resultStockUNITES_ATTENTES = mysqli_query($con,$sqlStockUNITES_ATTENTES);
$resultStockUNITES_VOILE = mysqli_query($con,$sqlStockUNITES_VOILE);
/*//var_dump($resultVehiculos);
//var_dump($resultDepositos);*/

$filasDocumentacion = mysqli_num_rows($resultDocumentacion);
$filasOrigenDoc = mysqli_num_rows($resultOrigenDoc);
$filasFamilias = mysqli_num_rows($resultFamilias);
$filasLocalizaciones = mysqli_num_rows($resultLocalizaciones);
$filasTiposProducto = mysqli_num_rows($resultTiposProducto);
$filasStock = mysqli_num_rows($resultStock);
$filasStockMat = mysqli_num_rows($resultStockMat);

$filasStockB500B = mysqli_num_rows($resultStockB500B);
$filasStockUNITES_HA = mysqli_num_rows($resultStockUNITES_HA);
$filasStockUNITES_ADX = mysqli_num_rows($resultStockUNITES_ADX);
$filasStockUNITES_COUPLERS = mysqli_num_rows($resultStockUNITES_COUPLERS);
$filasStockUNITES_ATTENTES = mysqli_num_rows($resultStockUNITES_ATTENTES);
$filasStockUNITES_VOILE = mysqli_num_rows($resultStockUNITES_VOILE);
//echo $filasVehiculos;
//echo $filasDepositos;

$arrayGeneral = array();
$arrayDocumentacion = array();
$arrayOrigenDoc = array();
$arrayFamilias = array();
$arrayLocalizaciones = array();
$arrayTiposProducto = array();
$arrayStock = array();
$arrayStockMat = array();

$arrayStockB500B = array();
$arrayStockUNITES_HA = array();
$arrayStockUNITES_ADX = array();
$arrayStockUNITES_COUPLERS = array();
$arrayStockUNITES_ATTENTES = array();
$arrayStockUNITES_VOILE = array();
/*$arrayTableta = array();*/


if($filasDocumentacion > 0){
    $arrayDocumentacion = array();
    while($rDocumentacion = mysqli_fetch_assoc($resultDocumentacion)) {
        $arrayDocumentacion[] = $rDocumentacion;
    }

    $arrayGeneral['documentacion'] = $arrayDocumentacion;
}

if($filasOrigenDoc > 0){
    $arrayOrigenDoc = array();
    while($rOrigenDoc = mysqli_fetch_assoc($resultOrigenDoc)) {
		$arrayOrigenDoc[] = $rOrigenDoc;
    }

    $arrayGeneral['origendoc'] = $arrayOrigenDoc;
}

if($filasFamilias > 0){
    $arrayFamilias = array();
    while($rFamilias = mysqli_fetch_assoc($resultFamilias)) {
		$arrayFamilias[] = $rFamilias;
    }

    $arrayGeneral['familias'] = $arrayFamilias;
}

if($filasLocalizaciones > 0){
    $arrayLocalizaciones = array();
    while($rLocalizaciones = mysqli_fetch_assoc($resultLocalizaciones)) {
		$arrayLocalizaciones[] = $rLocalizaciones;
    }

    $arrayGeneral['localizaciones'] = $arrayLocalizaciones;
}

if($filasTiposProducto > 0){
    $arrayTiposProducto = array();
    while($rTiposProducto = mysqli_fetch_assoc($resultTiposProducto)) {
        $arrayTiposProducto[] = $rTiposProducto;
    }

    $arrayGeneral['tiposProducto'] = $arrayTiposProducto;
}

if($filasStock > 0){
    $arrayStock = array();
    while($rStock = mysqli_fetch_assoc($resultStock)) {
		$arrayStock[] = $rStock;
    }

    $arrayGeneral['stock'] = $arrayStock;
}

/*if($filasStockMat > 0){
    $arrayStockMat = array();
    while($rStockMat = mysqli_fetch_assoc($resultStockMat)) {
        $arrayStockMat[] = $rStockMat;
    }

    $arrayGeneral['stockMat'] = $arrayStockMat;
}*/

if($filasStockB500B > 0){
    $arrayStockB500B = array();
    while($rStockB500B = mysqli_fetch_assoc($resultStockB500B)) {
        $arrayStockB500B[] = $rStockB500B;
    }

    $arrayGeneral['stockMat']['B500B'] = $arrayStockB500B;
}

if($filasStockUNITES_HA > 0){
    $arrayStockUNITES_HA = array();
    while($rStockUNITES_HA = mysqli_fetch_assoc($resultStockUNITES_HA)) {
        $arrayStockUNITES_HA[] = $rStockUNITES_HA;
    }

    $arrayGeneral['stockMat']['UNITES_HA'] = $arrayStockUNITES_HA;
}

if($filasStockUNITES_ADX > 0){
    $arrayStockUNITES_ADX = array();
    while($rStockUNITES_ADX = mysqli_fetch_assoc($resultStockUNITES_ADX)) {
        $arrayStockUNITES_ADX[] = $rStockUNITES_ADX;
    }

    $arrayGeneral['stockMat']['UNITES_ADX'] = $arrayStockUNITES_ADX;
}

if($filasStockUNITES_COUPLERS > 0){
    $arrayStockUNITES_COUPLERS = array();
    while($rStockUNITES_COUPLERS = mysqli_fetch_assoc($resultStockUNITES_COUPLERS)) {
        $arrayStockUNITES_COUPLERS[] = $rStockUNITES_COUPLERS;
    }

    $arrayGeneral['stockMat']['UNITES_COUPLERS'] = $arrayStockUNITES_COUPLERS;
}

if($filasStockUNITES_ATTENTES > 0){
    $arrayStockUNITES_ATTENTES = array();
    while($rStockUNITES_ATTENTES = mysqli_fetch_assoc($resultStockUNITES_ATTENTES)) {
        $arrayStockUNITES_ATTENTES[] = $rStockUNITES_ATTENTES;
    }

    $arrayGeneral['stockMat']['UNITES_ATTENTES'] = $arrayStockUNITES_ATTENTES;
}

if($filasStockUNITES_VOILE > 0){
    $arrayStockUNITES_VOILE = array();
    while($rStockUNITES_VOILE = mysqli_fetch_assoc($resultStockUNITES_VOILE)) {
        $arrayStockUNITES_VOILE[] = $rStockUNITES_VOILE;
    }

    $arrayGeneral['stockMat']['UNITES_VOILE'] = $arrayStockUNITES_VOILE;
}


/*if($filasEstaciones > 0){
    $arrayEstaciones = array();
    while($restaciones = mysqli_fetch_assoc($resultEstaciones)) {
		$arrayEstaciones[] = $restaciones;
    }

    $arrayGeneral['estaciones'] = $arrayEstaciones;
}

if($filasVehiculos > 0){
    $arrayVehiculos = array();
    while($rVehiculos = mysqli_fetch_assoc($resultVehiculos)) {
        $arrayVehiculos[] = $rVehiculos;
    }

    $arrayGeneral['vehiculos'] = $arrayVehiculos;
}*/

print json_encode($arrayGeneral);


?>
