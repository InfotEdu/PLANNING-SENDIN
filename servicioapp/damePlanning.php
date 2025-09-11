<?php
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);



require "./dbconnect.php";

if (!$con){

   die("Error in connection" . mysqli_connect_error()) ;

}



$idTipo = $_GET["idTipo"];


// Verificar si $idTipo es igual a 1, 2 o 3
if ($idTipo == 1 || $idTipo == 2 || $idTipo == 3) {

    // Obtener la fecha actual
    $fecha_actual = date("Y-m-d");
   // $fecha_actual = date("Y-m-d", strtotime("+2 day"));

    // Obtener el día de la semana
    $dia_semana = date("l", strtotime($fecha_actual));

   // echo $dia_semana . "<br><br><br>";


    // Evaluar el día de la semana con un switch en el caso de viernes damos lleno hasta el martes y si es sabado hasta el lunes
        switch ($dia_semana) {
            case "Saturday":
                //echo "Es sabado.<br><br><br>";
                    $sqlPlanning = "SELECT `fecha_produccion`, SUM(`peso`) AS total FROM `sen_productos` WHERE id_tipo = $idTipo GROUP BY `fecha_produccion`
                    UNION
                    SELECT curdate() as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 1 as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 2 as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 3 as fecha_produccion, 200 as peso";
                break;
            case "Friday":
                //echo "Es viernes.<br><br><br>";
                    $sqlPlanning = "SELECT `fecha_produccion`, SUM(`peso`) AS total FROM `sen_productos` WHERE id_tipo = $idTipo GROUP BY `fecha_produccion`
                    UNION
                    SELECT curdate() as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 1 as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 2 as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 3 as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 4 as fecha_produccion, 200 as peso";
                break;
            default:
                //echo "No es fin de semana ni viernes.<br><br><br>";
                $sqlPlanning = "SELECT `fecha_produccion`, SUM(`peso`) AS total FROM `sen_productos` WHERE id_tipo = $idTipo GROUP BY `fecha_produccion`
                    UNION
                    SELECT curdate() as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 1 as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 2 as fecha_produccion, 200 as peso";
                break;
        }


    //Verificamos que la fecha sea viernes, sabado o  domingo.
   /* if ($dia_semana == "Saturday" || $dia_semana == "Sunday" || $dia_semana == "Friday") {
        echo "es finde". "<br><br><br>";
        $sqlPlanning = "SELECT `fecha_produccion`, SUM(`peso`) AS total FROM `sen_productos` WHERE id_tipo = $idTipo GROUP BY `fecha_produccion`
                    UNION
                    SELECT curdate() as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 1 as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 2 as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 3 as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 4 as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 5 as fecha_produccion, 200 as peso";
    }else{
        $sqlPlanning = "SELECT `fecha_produccion`, SUM(`peso`) AS total FROM `sen_productos` WHERE id_tipo = $idTipo GROUP BY `fecha_produccion`
                    UNION
                    SELECT curdate() as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 1 as fecha_produccion, 200 as peso
                    UNION
                    SELECT curdate() + 2 as fecha_produccion, 200 as peso";
    }

*/
    
} else {
    // Si $idTipo no es igual a 1, 2 o 3
    $sqlPlanning = "SELECT `fecha_produccion`, SUM(`peso`) AS total FROM `sen_productos` WHERE id_tipo = $idTipo GROUP BY `fecha_produccion`";
}

$arrayPlanning = array();
$resultPlanning = mysqli_query($con, $sqlPlanning);
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