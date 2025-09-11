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

$sqlConexionTablet="UPDATE `tablets` SET `ult_con` = '2019-06-19 03:06:07' WHERE `tablets`.`id` = 1;";

$sqlTablets = "SELECT * FROM tablets";
$sqlDepositos = "SELECT * FROM deposito";
$sqlEstaciones = "SELECT * FROM estacion";
$sqlTrabajadores = "SELECT * FROM trabajador";
$sqlVehiculos = "SELECT * FROM vehiculo";


$resultTabletas = mysqli_query($con,$sqlTablets);
$resultDepositos = mysqli_query($con,$sqlDepositos);
$resultEstaciones = mysqli_query($con,$sqlEstaciones);
$resultTrabajadores = mysqli_query($con,$sqlTrabajadores);
$resultVehiculos = mysqli_query($con,$sqlVehiculos);
//var_dump($resultVehiculos);
//var_dump($resultDepositos);

$filasTabletas = mysqli_num_rows($resultTabletas);
$filasDepositos = mysqli_num_rows($resultDepositos);
$filasEstaciones = mysqli_num_rows($resultEstaciones);
$filasTrabajadores = mysqli_num_rows($resultTrabajadores);
$filasVehiculos = mysqli_num_rows($resultVehiculos);
//echo $filasVehiculos;
//echo $filasDepositos;

$arrayGeneral = array();
$arrayTabletas = array();
$arrayDepositos = array();
$arrayTrabajadores = array();
$arrayVehiculos = array();
$arrayEstaciones = array();
$arrayTableta = array();


if($filasTabletas > 0){
    $arrayTabletas = array();
    while($rTabletas = mysqli_fetch_assoc($resultTabletas)) {
        $arrayTabletas[] = $rTabletas;
    }

    $arrayGeneral['tabletas'] = $arrayTabletas;
}

if($filasDepositos > 0){
    $arrayDepositos = array();
    while($rdepositos = mysqli_fetch_assoc($resultDepositos)) {
		$arrayDepositos[] = $rdepositos;
    }

    $arrayGeneral['depositos'] = $arrayDepositos;
}

if($filasTrabajadores > 0){
    $arrayTrabajadores = array();
    while($rtrabajadores = mysqli_fetch_assoc($resultTrabajadores)) {
		$arrayTrabajadores[] = $rtrabajadores;
    }

    $arrayGeneral['trabajadores'] = $arrayTrabajadores;
}

if($filasEstaciones > 0){
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
}

print json_encode($arrayGeneral);

/*REGISTRO LA ÚLTIMA CONEXIÓN DE LA TABLET*/
if (isset($_GET['tableta']) && isset($_GET['fechacon'])) {
	$tableta = $_GET['tableta'];
	$fechaCon = $_GET['fechacon'];

	
	if (isset($_GET['versionTablet'])) {
		$versionApp = $_GET['versionTablet'];

		$sqlApp = "SELECT version FROM tablets WHERE idtablet = '$tableta'";
		//echo $sqlApp;
		$resultTableta = mysqli_query($con,$sqlApp);
		
		while($miTableta = mysqli_fetch_assoc($resultTableta)) {
	        $arrayTableta[] = $miTableta;
	    }

	    //var_dump($arrayTableta);

	    //echo $arrayTableta[0]['version']."<br>";
	    //echo $versionApp;

	    if ($arrayTableta[0]['version'] != $versionApp) {
	    	//echo "es una version nueva";

			$sqlConexionTablet="UPDATE `tablets` SET `ult_con` = '$fechaCon', `fecha_actualizacion` = '$fechaCon', `version` = '$versionApp' WHERE `tablets`.`idtablet` = '$tableta';";
			mysqli_query($con,$sqlConexionTablet);	    
		}else{
			//echo "es la misma version";
			$sqlConexionTablet="UPDATE `tablets` SET `ult_con` = '$fechaCon' WHERE `tablets`.`idtablet` = '$tableta';";
			mysqli_query($con,$sqlConexionTablet);
		}

	}else {
		$sqlConexionTablet="UPDATE `tablets` SET `ult_con` = '$fechaCon' WHERE `tablets`.`idtablet` = '$tableta';";
		mysqli_query($con,$sqlConexionTablet);
	}

	
}

?>
