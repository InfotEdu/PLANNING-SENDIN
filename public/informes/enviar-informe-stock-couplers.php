<?php

header('Content-Type: text/html; charset=UTF-8');

// header("Access-Control-Allow-Origin: *");
// error_reporting(E_ALL);
// ini_set('display_errors', TRUE);
// ini_set('display_startup_errors', TRUE);
// setlocale(LC_TIME, 'es_ES.UTF-8');

//Conexion basedatos y query

require "./dbconnect.php";

$con = mysqli_connect(HOST,USER,PASS,DB);

mysqli_query($con,"SET CHARACTER SET 'utf8'");
mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");

if (!$con){

   die("Error in connection" . mysqli_connect_error()) ;

}

//var_dump($con);


$fecha = $_GET['fecha'];
//$fecha = "2021-08-12";
$fechaBonita = date("d/m/Y", strtotime($fecha));


//////// EDUARDO TABLA 1

$sqlCOUPLERS = "select `sm`.`nom_articulo` AS `nom_articulo`,
`sm`.`c12_spain`,
`sm`.`c14_spain`,
`sm`.`c16_spain`,
`sm`.`c20_spain`,
`sm`.`c26_spain`,
`sm`.`c32_spain`,
`sm`.`c40_spain`
from `sen_stock_mat` `sm`  
where `sm`.`fecha` = '".$fecha."' and `sm`.`familia` = 8 order by `sm`.`orden`";


$resultDataCOUPLES = mysqli_query($con,$sqlCOUPLERS);


while($row = $resultDataCOUPLES->fetch_array(MYSQLI_ASSOC)) { $filasCOUPLES[] = $row; }





//////// EDUARDO TABLA 2

$sqlCOUPLERSPR = "select `sm`.`nom_articulo` AS `nom_articulo`,
`sm`.`c12_spain`,
`sm`.`c14_spain`,
`sm`.`c16_spain`,
`sm`.`c20_spain`,
`sm`.`c26_spain`,
`sm`.`c32_spain`,
`sm`.`c40_spain`
from `sen_stock_mat` `sm`  
where `sm`.`fecha` = '".$fecha."' and `sm`.`familia` = 9 order by `sm`.`orden`";


$resultDataCOUPLESPR = mysqli_query($con,$sqlCOUPLERSPR);


while($row = $resultDataCOUPLESPR->fetch_array(MYSQLI_ASSOC)) { $filasCOUPLESPR[] = $row; }








define('EURO',chr(128));

// echo($row['fecha']);
// FPDF

require('../fpdf/fpdf.php');

$pdf = new FPDF('L','mm');
$pdf->AddPage();

$pdf->SetFont('Helvetica','B',10);


//LINEA CABECERA
$pdf->SetFillColor(256,256,256);


$pdf->Cell(30,17,'','LTBR',0,'C',TRUE);



$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(241,5,'MPA - 4003','LTBR',1,'C',TRUE);
$pdf->Cell(30,8,'','',0,'C',False);

$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(241,8,utf8_decode('INVENTARIO PERIÓDICO MANGUITOS Y ACCESORIOS'),'LTBR',1,'C',TRUE);
$pdf->Cell(30,4,'','',0,'C',False);

$pdf->SetFont('Helvetica','',8);
$pdf->Cell(241,4,utf8_decode('Revisión 4.0'),'LTBR',1,'C',TRUE);
$pdf->Image('sendin.png',10,10,30);

$pdf->Cell(15,6,utf8_decode(''),'',1,'C'); //SALTO DE LÍNEA EN BLANCO (6 ES EL GROSOR)
$pdf->SetFont('Helvetica','',6);
$pdf->Cell(124,4,utf8_decode('FÁBRICA DE TERUEL'),'LTBR',0,'C',TRUE);
$pdf->Cell(13,6,utf8_decode(''),'',0); //ESPACIO EN BLANCO (13 DE ANCHO)
$pdf->Cell(53,4,utf8_decode('FECHA INVENTARIO'),'LTBR',0,'C',TRUE);
$pdf->Cell(53,4,utf8_decode($fecha),'LTBR',1,'C',TRUE);
$pdf->Cell(137,6,utf8_decode(''),'',0);
$pdf->Cell(53,4,utf8_decode(''),'T',0,'C',TRUE);
$pdf->Cell(53,4,utf8_decode(''),'T',1,'C',TRUE);

$pdf->SetFillColor(238, 229, 149);
$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(270,7,utf8_decode('MANGUITOS PARA ROSCADO'),'LTBR',1,'C',TRUE);   //CAMBIAR COLOR

// Cabecera
$pdf->SetFillColor(206,205,199);
$pdf->SetFont('Helvetica','B',8);
$pdf->Cell(31,6,utf8_decode('CERTIFICADOS'),'LTBR',0,'C',TRUE); 
$pdf->Cell(53,6,utf8_decode('COUPLEURS'),'LTBR',0,'C',TRUE);
$pdf->Cell(27,6,utf8_decode('D-12'),'LTBR',0,'C',TRUE);
$pdf->Cell(27,6,utf8_decode('D-14'),'LTBR',0,'C',TRUE);
$pdf->Cell(27,6,utf8_decode('D-16'),'LTBR',0,'C',TRUE);
$pdf->Cell(27,6,utf8_decode('D-20'),'LTBR',0,'C',TRUE);
$pdf->Cell(26,6,utf8_decode('D-25'),'LTBR',0,'C',TRUE);
$pdf->Cell(26,6,utf8_decode('D-32'),'LTBR',0,'C',TRUE);
$pdf->Cell(26,6,utf8_decode('D-40'),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFillColor(256,256,256);
$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(31,6,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Image('logo_AFCAB2.png',12,55,12);
$pdf->Image('LogoCares.png',26,54,12);
$pdf->Cell(53,6,utf8_decode($filasCOUPLES[0]['nom_articulo']),'LTBR',0,'C');
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[0]['c12_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[0]['c14_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[0]['c16_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[0]['c20_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[0]['c26_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[0]['c32_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[0]['c40_spain']),'LTBR',1,'C');

$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(31,6,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Image('logo_AFCAB2.png',12,61,12);
$pdf->Cell(53,6,utf8_decode($filasCOUPLES[1]['nom_articulo']),'LTBR',0,'C');
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[1]['c12_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[1]['c14_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[1]['c16_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[1]['c20_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[1]['c26_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[1]['c32_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[1]['c40_spain']),'LTBR',1,'C');

$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(31,6,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Image('logo_AFCAB2.png',12,67,12);
$pdf->Cell(53,6,utf8_decode($filasCOUPLES[2]['nom_articulo']),'LTBR',0,'C');
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[2]['c12_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[2]['c14_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[2]['c16_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[2]['c20_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[2]['c26_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[2]['c32_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[2]['c40_spain']),'LTBR',1,'C');

$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(31,6,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Image('LogoCares.png',26,72,12);
$pdf->Cell(53,6,utf8_decode($filasCOUPLES[3]['nom_articulo']),'LTBR',0,'C');
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[3]['c12_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[3]['c14_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[3]['c16_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[3]['c20_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[3]['c26_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[3]['c32_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[3]['c40_spain']),'LTBR',1,'C');

$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(31,6,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Image('logo_AFCAB2.png',12,79,12);
$pdf->Cell(53,6,utf8_decode($filasCOUPLES[4]['nom_articulo']),'LTBR',0,'C');
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[4]['c12_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[4]['c14_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[4]['c16_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[4]['c20_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[4]['c26_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[4]['c32_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[4]['c40_spain']),'LTBR',1,'C');

$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(31,6,utf8_decode(''),'LTBR',0,'C',TRUE); 
$pdf->Cell(53,6,utf8_decode($filasCOUPLES[5]['nom_articulo']),'LTBR',0,'C');
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[5]['c12_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[5]['c14_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[5]['c16_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[5]['c20_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[5]['c26_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[5]['c32_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[5]['c40_spain']),'LTBR',1,'C');

$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(31,6,utf8_decode(''),'LTBR',0,'C',TRUE); 
$pdf->Cell(53,6,utf8_decode($filasCOUPLES[6]['nom_articulo']),'LTBR',0,'C');
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[6]['c12_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[6]['c14_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[6]['c16_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLES[6]['c20_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[6]['c26_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[6]['c32_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLES[6]['c40_spain']),'LTBR',1,'C');


$pdf->SetFont('Helvetica','B',6);
$pdf->Cell(31,12,utf8_decode('OBSERVACIONES'),'LTB',0,'C',TRUE);
$pdf->Cell(239,12,utf8_decode(''),'TBR',1,'C',TRUE);

$pdf->Cell(270,6,utf8_decode(''),'T',1,'C',TRUE);


////NUEVA TABLA
$pdf->SetFillColor(238, 229, 149);
$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(270,7,utf8_decode('MANGUITOS POR PRESIÓN'),'LTBR',1,'C',TRUE);   //CAMBIAR COLOR

// Cabecera
$pdf->SetFillColor(206,205,199);
$pdf->SetFont('Helvetica','B',8);
$pdf->Cell(31,6,utf8_decode('CERTIFICADOS'),'LTBR',0,'C',TRUE); 
$pdf->Cell(53,6,utf8_decode('COUPLEURS'),'LTBR',0,'C',TRUE);
$pdf->Cell(27,6,utf8_decode('D-12'),'LTBR',0,'C',TRUE);
$pdf->Cell(27,6,utf8_decode('D-14'),'LTBR',0,'C',TRUE);
$pdf->Cell(27,6,utf8_decode('D-16'),'LTBR',0,'C',TRUE);
$pdf->Cell(27,6,utf8_decode('D-20'),'LTBR',0,'C',TRUE);
$pdf->Cell(26,6,utf8_decode('D-25'),'LTBR',0,'C',TRUE);
$pdf->Cell(26,6,utf8_decode('D-32'),'LTBR',0,'C',TRUE);
$pdf->Cell(26,6,utf8_decode('D-40'),'LTBR',1,'C',TRUE);


//FILA TABLA
$pdf->SetFillColor(256,256,256);
$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(31,6,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Image('logo_AFCAB2.png',12,128,12);
$pdf->Image('LogoCares.png',26,127,12);
$pdf->Cell(53,6,utf8_decode($filasCOUPLESPR[0]['nom_articulo']),'LTBR',0,'C');
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[0]['c12_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[0]['c14_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[0]['c16_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[0]['c20_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[0]['c26_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[0]['c32_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[0]['c40_spain']),'LTBR',1,'C');

$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(31,6,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Image('logo_AFCAB2.png',12,134,12);
$pdf->Image('LogoCares.png',26,133,12);
$pdf->Cell(53,6,utf8_decode($filasCOUPLESPR[1]['nom_articulo']),'LTBR',0,'C');
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[1]['c12_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[1]['c14_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[1]['c16_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[1]['c20_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[1]['c26_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[1]['c32_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[1]['c40_spain']),'LTBR',1,'C');

$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(31,6,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Image('logo_AFCAB2.png',12,140,12);
$pdf->Image('LogoCares.png',26,139,12);
$pdf->Cell(53,6,utf8_decode($filasCOUPLESPR[2]['nom_articulo']),'LTBR',0,'C');
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[2]['c12_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[2]['c14_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[2]['c16_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[2]['c20_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[2]['c26_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[2]['c32_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[2]['c40_spain']),'LTBR',1,'C');

$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(31,6,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Image('logo_AFCAB2.png',12,146,12);
$pdf->Image('LogoCares.png',26,145,12);
$pdf->Cell(53,6,utf8_decode($filasCOUPLESPR[3]['nom_articulo']),'LTBR',0,'C');
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[3]['c12_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[3]['c14_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[3]['c16_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[3]['c20_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[3]['c26_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[3]['c32_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[3]['c40_spain']),'LTBR',1,'C');

$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(31,6,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Image('logo_AFCAB2.png',12,152,12);
$pdf->Image('LogoCares.png',26,151,12);
$pdf->Cell(53,6,utf8_decode($filasCOUPLESPR[4]['nom_articulo']),'LTBR',0,'C');
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[4]['c12_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[4]['c14_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[4]['c16_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[4]['c20_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[4]['c26_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[4]['c32_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[4]['c40_spain']),'LTBR',1,'C');

$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(31,6,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Image('logo_AFCAB2.png',12,158,12);
$pdf->Image('LogoCares.png',26,157,12);
$pdf->Cell(53,6,utf8_decode($filasCOUPLESPR[5]['nom_articulo']),'LTBR',0,'C');
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[5]['c12_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[5]['c14_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[5]['c16_spain']),'LTBR',0,'C');
$pdf->Cell(27,6,utf8_decode($filasCOUPLESPR[5]['c20_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[5]['c26_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[5]['c32_spain']),'LTBR',0,'C');
$pdf->Cell(26,6,utf8_decode($filasCOUPLESPR[5]['c40_spain']),'LTBR',1,'C');


$pdf->SetFont('Helvetica','B',6);
$pdf->Cell(31,12,utf8_decode('OBSERVACIONES'),'LTB',0,'C',TRUE);
$pdf->Cell(239,12,utf8_decode(''),'TBR',1,'C',TRUE);

$pdf->Cell(270,6,utf8_decode(''),'T',1,'C',TRUE);



// no lo presentamos 
// $pdf->Output();
// lo guardamos para enviar
$attachment= $pdf->Output('sotck-spain.pdf', 'S');
$nombreAdjunto = 'STOCK-COUPLERS.'.$fecha.'.pdf';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../servicioapp/src/Exception.php';
require '../../servicioapp/src/PHPMailer.php';
require '../../servicioapp/src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 0; 
$mail->Host = "Smtp.outlook.com"; 
$mail->Port = "587"; // typically 587 
$mail->SMTPSecure = 'tls'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = "jrodrigo@sendin.com";
$mail->Password = "Sendin.2021";
$mail->CharSet = "UTF-8";
$mail->setFrom("jrodrigo@sendin.com", "Sendin Planning");
/* Serge Sendin s.sendin@sendin.com; Daniel Molina dmolina@sendin.com; Filipe MARGARIDO f.margarido@sendin.com
Victor SENDIN v.sendin@sendin.com; Fabien Blanchot f.blanchot@sendin.com; Lionel Besnard l.besnard@sendin.com; Javier Lafuente jlafuente@sendin.com; Ana Gómez agomez@sendin.com; Beatriz Proto bproto@sendin.com; Marco Maravilha m.maravilha@sendin.com; Anne Marie Sendin amsendin@sendin.com; Marco Da Fonseca m.dafonseca@sendin.com; Thomas Gilouppe t.gilouppe@sendin.com; Cindy Ariztegui cariztegui@sendin.com; Isabel Barrachina ibarrachina@sendin.com; Elena Fernández efernandez@sendin.com */


$recipientesSpain = array(
   //'eduardo.cercos@infoter.net' => 'Eduardo '
   'desarrolloweb@infoter.net' => 'Infoter Desarrollo',
   //'aaznar@sendin.com' => 'Álvaro Aznar'
   // 'jlafuente@sendin.com' => 'Javier Lafuente',
   // 'dmolina@sendin.com' => 'Daniel Molina',
   // 'l.besnard@sendin.com' => 'Lionel Besnard',
   // 's.sendin@sendin.com' => 'Sergio Sendin',
   // 'v.sendin@sendin.com' => 'Victor SENDIN',
   // 'f.blanchot@sendin.com' => 'Fabien Blanchot',
   // 'f.margarido@sendin.com' => 'Filipe MARGARIDO',
   // 'agomez@sendin.com' => 'Ana Gómez',
   // 'bproto@sendin.com' => 'Beatriz Proto',
   // 'm.maravilha@sendin.com' => 'Marco Maravilha',
   // 'amsendin@sendin.com' => 'Anne Marie Sendin',
   // 'm.dafonseca@sendin.com' => 'Marco Da Fonseca',
   // 't.gilouppe@sendin.com' => 'Thomas Gilouppe',
   // 'cariztegui@sendin.com' => 'Cindy Ariztegui',
   // 'ibarrachina@sendin.com' => 'Isabel Barrachina',
   // 'efernandez@sendin.com' => 'Elena Fernández'
);
foreach($recipientesSpain as $email => $name)
{
   $mail->AddCC($email, $name);
}

$mail->Subject = 'STOCK COUPLERS '.$fechaBonita;
//$mail->msgHTML('STOCK CHILLY'.$fechaBonita); 
$mail->msgHTML('STOCK COUPLERS '.$fechaBonita . '<br><br><p style="margin: 0cm;font-size:15px;font-family: Calibri, sans-serif;color: rgb(0, 0, 0);font-style: normal;font-weight: normal;text-align: start;text-indent: 0px;text-decoration: none;"><strong><span style="color: rgb(79, 129, 189);">Centrale d&rsquo;Achats</span></strong><span style="font-size:13px;"><br>P.I. Platea &ndash; Calle Viena N&ordm;6&nbsp;<br>44195 &ndash; Teruel &ndash; Espa&ntilde;a</span></p>
<p style="margin: 0cm;font-size:15px;font-family: Calibri, sans-serif;color: rgb(0, 0, 0);font-style: normal;font-weight: normal;text-align: start;text-indent: 0px;text-decoration: none;"><span style="font-size:13px;">Telf.&nbsp;</span><span style="font-size:13px;">+34 978 61 40 22</span></p>'); 
$mail->AltBody = 'STOCK COUPLERS '.$fechaBonita;
$mail->AddStringAttachment($attachment, $nombreAdjunto);
//$mail->addAttachment('docs/brochure.pdf'); //Attachment, can be skipped

$mail->send();

print json_encode(true);


//$pdf->Output();


?>









