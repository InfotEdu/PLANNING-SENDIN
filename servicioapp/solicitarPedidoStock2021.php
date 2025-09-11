<?php
header("Access-Control-Allow-Origin: *");
header('Content-type: text/html; charset=UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

//fecha, producto, cantidad, cliente, telefono

$fecha = $_GET["fecha"];
$nombreProducto = $_GET["producto"];
$cantidad = $_GET["cantidad"];
$cliente = $_GET["cliente"];
$telefono = $_GET["telefono"];


$cuerpoEmail = 'Nouvelle demande de commande: <br/> Date: '.$_GET["fecha"].' <br/>Produit: '.$nombreProducto.' <br/>Quantité: '.$_GET["cantidad"].' <br/>Client: '.$_GET["cliente"].' <br/>Téléphone: '.$_GET["telefono"];


//echo $cuerpoEmail;


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
$mail->setFrom("alertas@infoter.es", "Sendin Ordres");
$mail->addAddress("desarrolloweb@infoter.net", "Gestion des commandes");
$mail->addAddress("commandes@sendin.com", "Gestion des commandes");
$mail->addAddress("f.margarido@sendin.com", "Gestion des commandes");
$mail->addAddress("aaznar@sendin.com", "Gestion des commandes");
$mail->Subject = 'Nouvelle demande de commande';
$mail->msgHTML($cuerpoEmail); 
$mail->AltBody = $cuerpoEmail;
//$mail->addAttachment('docs/brochure.pdf'); //Attachment, can be skipped

$mail->send();

print json_encode(true);


?>