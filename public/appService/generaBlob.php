<?php
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

//https://apps.infoter.net/palaciosCipoletti/sql/loginplano.php?user=18264128&anno=1936



//echo $email;
//echo md5($password);



require "./dbconnect.php";

if (!$con){

   die("Error in connection" . mysqli_connect_error()) ;

}

$id_file = $_GET['id_file'];
$id_comunidad = $_GET['id_comunidad'];

$id_comunidad = str_replace('row_', '', $id_comunidad);

echo "<br>".$id_file;
echo "<br>".$id_comunidad;

$sqlFiles = "SELECT * FROM `files` WHERE `id` = $id_file";
$resultFiles = mysqli_query($con,$sqlFiles);
$filasFiles = mysqli_num_rows($resultFiles);

if($filasFiles > 0){
    $row = mysqli_fetch_assoc($resultFiles);
    //var_dump($row);
}


echo "<br>".$_SERVER['DOCUMENT_ROOT'].$row["web_path"];
$path = $_SERVER['DOCUMENT_ROOT'].$row["web_path"];
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
echo "<br>".$base64;

$sqlUpdateFoto = "UPDATE `sen_stock` SET `foto` = '$base64' WHERE id_comunidad = $id_comunidad";
echo "<br>".$sqlUpdateFoto;
$resultUpdateFoto = mysqli_query($con,$sqlUpdateFoto);




/*
$arrayGeneral = array();
$arrayComunidad = array();
$arrayAvisos = array();
$arrayVotaciones = array();
$arrayIncidencias = array();
$arrayTelefonos = array();
$arrayInformacion = array();
$arrayTipoIncidencias = array();

$sqlComunidad = "SELECT * FROM `comunidades` WHERE `id_comunidad` = $id_comunidad";
$sqlAvisos = "SELECT * FROM `avisos` WHERE `id_comunidad` = $id_comunidad";
$sqlVotaciones = "SELECT * FROM `votaciones` WHERE `id_comunidad` = $id_comunidad";
$sqlIncidencias = "SELECT * FROM `incidencias` WHERE `id_inmueble` = $id_inmueble";
$sqlTelefonos = "SELECT * FROM `telefonos` WHERE `id_comunidad` = $id_comunidad";
$sqlTipoIncidencias = "SELECT * FROM `tipo_incidencia`";
$sqlInformacion = "SELECT * FROM `info_gestor`";



$resultComunidad = mysqli_query($con,$sqlComunidad);
$resultAvisos = mysqli_query($con,$sqlAvisos);
$resultVotaciones = mysqli_query($con,$sqlVotaciones);
$resultIncidencias = mysqli_query($con,$sqlIncidencias);
$resultTelefonos = mysqli_query($con,$sqlTelefonos);
$resultInformacion = mysqli_query($con,$sqlInformacion);
$resultTipoIncidencias = mysqli_query($con,$sqlTipoIncidencias);


$filasComunidad = mysqli_num_rows($resultComunidad);
$filasAvisos = mysqli_num_rows($resultAvisos);
$filasVotaciones = mysqli_num_rows($resultVotaciones);
$filasIncidencias = mysqli_num_rows($resultIncidencias);
$filasTelefonos = mysqli_num_rows($resultTelefonos);
$filasInformacion = mysqli_num_rows($resultInformacion);
$filasTipoIncidencias = mysqli_num_rows($resultTipoIncidencias);


if($filasComunidad > 0){
    $arrayComunidad = array();
    while($rComunidad = mysqli_fetch_assoc($resultComunidad)) {
        $arrayComunidad[] = $rComunidad;
    }

    $arrayGeneral['comunidad'] = $arrayComunidad;
}

if($filasAvisos > 0){
    $arrayAvisos = array();
    while($rAvisos = mysqli_fetch_assoc($resultAvisos)) {
        $arrayAvisos[] = $rAvisos;
    }

    $arrayGeneral['avisos'] = $arrayAvisos;
}

if($filasVotaciones > 0){
    $arrayVotaciones = array();
    while($rVotaciones = mysqli_fetch_assoc($resultVotaciones)) {
        
        $arrayVotos = array();

        $sqlVotos = "SELECT * FROM `votos` WHERE `id_votacion` = ".$rVotaciones['id_votacion'];
        $resultVotos = mysqli_query($con,$sqlVotos);

        while($rVotos = mysqli_fetch_assoc($resultVotos)) {
	        $arrayVotos[] = $rVotos;
	    } 

	    $rVotaciones['votos'] = $arrayVotos; 

        $arrayVotaciones[] = $rVotaciones;

    }

    $arrayGeneral['votaciones'] = $arrayVotaciones;
}

if($filasIncidencias > 0){
    $arrayIncidencias = array();
    while($rIncidencias = mysqli_fetch_assoc($resultIncidencias)) {
        $arrayIncidencias[] = $rIncidencias;
    }

    $arrayGeneral['incidencias'] = $arrayIncidencias;
}

if($filasTelefonos > 0){
    $arrayTelefonos = array();
    while($rTelefonos = mysqli_fetch_assoc($resultTelefonos)) {
        $arrayTelefonos[] = $rTelefonos;
    }

    
}

$arrayGeneral['telefonos'] = $arrayTelefonos;

if($filasInformacion > 0){
    $arrayInformacion = array();
    while($rInformacion = mysqli_fetch_assoc($resultInformacion)) {
        $arrayInformacion[] = $rInformacion;
    }

    
}

$arrayGeneral['informacion'] = $arrayInformacion;

if($filasTipoIncidencias > 0){
    $arrayTipoIncidencias = array();
    while($rTipoIncidencias = mysqli_fetch_assoc($resultTipoIncidencias)) {
        $arrayTipoIncidencias[] = $rTipoIncidencias;
    }

    
}

$arrayGeneral['tipos_incidencias'] = $arrayTipoIncidencias;


echo json_encode($arrayGeneral);

die();


//echo($sql);

    
$result = mysqli_query($con,$sql);
//var_dump($result);


//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

/*HAY UN USUARIO CON ESE EMAIL
if($count >= 1) {

  $row = mysqli_fetch_assoc($result);
  echo json_encode($row);

}else{
      //los datos no son correctos
      echo json_encode(0); ;
}*/

?>