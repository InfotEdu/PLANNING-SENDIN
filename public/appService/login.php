<?php
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

//https://apps.infoter.net/palaciosCipoletti/sql/loginplano.php?user=18264128&anno=1936

$email = $_GET["email"];
$password = $_GET["password"];

//echo $email;
//echo md5($password);

require "./dbconnect.php";

if (!$con){

   die("Error in connection" . mysqli_connect_error()) ;

}

$sql = "SELECT * FROM inmuebles WHERE email like '".$email."' AND contrasena like '".md5($password)."' ";
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
      echo json_encode(1);
}

?>