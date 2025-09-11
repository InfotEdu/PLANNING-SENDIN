<?php
header("Access-Control-Allow-Origin: *");
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);



$username = $_GET["username"];


require "./dbconnect.php";

if (!$con){

   die("Error in connection" . mysqli_connect_error()) ;

}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 0; 
$mail->Host = "smtp-es.securemail.pro"; 
$mail->Port = "587"; // typically 587 
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = "alertas@infoter.es";
$mail->Password = "AltInf.@2018";
$mail->CharSet = "UTF-8";
$mail->setFrom("alertas@infoter.es", "Sendin | Gestion des utilisateurs");
$mail->addAddress("desarrolloweb@infoter.net", "Nouvelle demande d'inscription");
$mail->addAddress("aaznar@sendin.com", "Nouvelle demande d'inscription");
$mail->Subject = "Nouvelle demande d'inscription";
$mail->msgHTML("Nouvelle demande d'inscription <br/><br/> Nom d'utilisateur: ".$_GET["username"].' <br/>Nom de l\'entreprise: '.$_GET["empresa"].' <br/>Numéro de téléphone: '.$_GET["telefono"].' <br/>E-mail: '.$_GET["email"].' <br/>Password: '.$_GET["password"]); 
$mail->AltBody = "Nouvelle demande d'inscription <br/><br/> Nom d'utilisateur: ".$_GET["username"].' <br/>Nom de l\'entreprise: '.$_GET["empresa"].' <br/>Numéro de téléphone: '.$_GET["telefono"].' <br/>E-mail: '.$_GET["email"].' <br/>Password: '.$_GET["password"];
//$mail->addAttachment('docs/brochure.pdf'); //Attachment, can be skipped

$mail->send();

print json_encode(true);

?>