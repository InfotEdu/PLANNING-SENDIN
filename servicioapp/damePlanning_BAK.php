<?php
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

//https://apps.infoter.net/palaciosCipoletti/sql/loginplano.php?user=18264128&anno=1936

//$id_comunidad = $_GET["id_comunidad"];
//$id_inmueble = $_GET["id_inmueble"];

//echo $email;
//echo md5($password);



require "./dbconnect.php";

if (!$con){

   die("Error in connection" . mysqli_connect_error()) ;

}


$idTipo = $_GET["idTipo"];


$arrayPlanning = array();
$sqlPlanning = "SELECT `fecha_produccion`, SUM(`peso`) AS total FROM `sen_productos` WHERE id_tipo = $idTipo GROUP BY `fecha_produccion`";
$resultPlanning = mysqli_query($con,$sqlPlanning);
$filasPlanning = mysqli_num_rows($resultPlanning);


$arrayPlanning = array();
if($filasPlanning > 0){
    
    while($rPlanning = mysqli_fetch_assoc($resultPlanning)) {
    	//echo date("Y-n-j",strtotime($rPlanning['fecha_produccion']));
    	$rPlanning['fecha_produccion'] = date("Y-n-j H:i:s",strtotime($rPlanning['fecha_produccion']));
    	$rPlanning['fecha_produccion_mostrar'] = date("Y-n-j",strtotime($rPlanning['fecha_produccion']));
        $arrayPlanning[] = $rPlanning;
    }

    echo json_encode($arrayPlanning);

    
}else{
      //los datos no son correctos
      echo json_encode(0); ;
}





die();


//echo($sql);

    
$result = mysqli_query($con,$sql);
//var_dump($result);


//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

/*HAY UN USUARIO CON ESE EMAIL*/
if($count >= 1) {

  $row = mysqli_fetch_assoc($result);
  echo json_encode($row);

}else{
      //los datos no son correctos
      echo json_encode(0); ;
}

?>