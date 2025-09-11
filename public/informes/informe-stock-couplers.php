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


$pdf->Output();

?>