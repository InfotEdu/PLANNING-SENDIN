<?php

header('Content-Type: text/html; charset=UTF-8');

// header("Access-Control-Allow-Origin: *");
 //error_reporting(E_ALL);
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

$sqlHA = "select `sm`.`nom_articulo` AS `nom_articulo`,
`sm`.`d8_cares` AS `d8_cares`,`sast20`.`peso_paquete` AS `peso_d8`,
`sm`.`d10_cares` AS `d10_cares`,`sad10`.`peso_paquete` AS `peso_d10`,
`sm`.`d12_cares` AS `d12_cares`,`sad12`.`peso_paquete` AS `peso_d12`,
`sm`.`d14_cares` AS `d14_cares`,`sad14`.`peso_paquete` AS `peso_d14`,
`sm`.`d16_cares` AS `d16_cares`,`sast50`.`peso_paquete` AS `peso_d16`,
`sm`.`d20_cares` AS `d20_cares`,`sad20`.`peso_paquete` AS `peso_d20`,
`sm`.`d25_cares` AS `d25_cares`,`sad25`.`peso_paquete` AS `peso_d25`,
`sm`.`d32_cares` AS `d32_cares`,`sad32`.`peso_paquete` AS `peso_d32`,
`sm`.`d40_cares` AS `d40_cares`,`sad40`.`peso_paquete` AS `peso_d40`,
`sm`.`d8_cares` AS `d8_cares`,
`sm`.`d10_cares` AS `d10_cares`,
`sm`.`d12_cares` AS `d12_cares`,
`sm`.`d14_cares` AS `d14_cares`,
`sm`.`d16_cares` AS `d16_cares`,
`sm`.`d20_cares` AS `d20_cares`,
`sm`.`d25_cares` AS `d25_cares`,
`sm`.`d32_cares` AS `d32_cares`,
`sm`.`d40_cares` AS `d40_cares` 
from (((((((((`sen_stock_mat` `sm` 
join `sen_stock_art` `sast20` on(`sast20`.`id_articulo` = `sm`.`id_articulo` and `sast20`.`formato` = 'd8_cares')) 
join `sen_stock_art` `sad10` on(`sad10`.`id_articulo` = `sm`.`id_articulo` and `sad10`.`formato` = 'd10_cares')) 
join `sen_stock_art` `sad12` on(`sad12`.`id_articulo` = `sm`.`id_articulo` and `sad12`.`formato` = 'd12_cares')) 
join `sen_stock_art` `sad14` on(`sad14`.`id_articulo` = `sm`.`id_articulo` and `sad14`.`formato` = 'd14_cares')) 
join `sen_stock_art` `sast50` on(`sast50`.`id_articulo` = `sm`.`id_articulo` and `sast50`.`formato` = 'd16_cares')) 
join `sen_stock_art` `sad20` on(`sad20`.`id_articulo` = `sm`.`id_articulo` and `sad20`.`formato` = 'd20_cares')) 
join `sen_stock_art` `sad25` on(`sad25`.`id_articulo` = `sm`.`id_articulo` and `sad25`.`formato` = 'd25_cares')) 
join `sen_stock_art` `sad32` on(`sad32`.`id_articulo` = `sm`.`id_articulo` and `sad32`.`formato` = 'd32_cares')) 
join `sen_stock_art` `sad40` on(`sad40`.`id_articulo` = `sm`.`id_articulo` and `sad40`.`formato` = 'd40_cares')) 
where `sm`.`fecha` = '".$fecha."' and `sm`.`familia` = 1 order by `sm`.`orden`";



$resultDataHA = mysqli_query($con,$sqlHA);
//var_dump($resultDataHA);
//die;

while($row = $resultDataHA->fetch_array(MYSQLI_ASSOC)) { $filasHA[] = $row; }



$sqlHA_c = "select `sm`.`nom_articulo` AS `nom_articulo`,
`sm`.`d8_cares_c` AS `d8_cares_c`,`sast20`.`peso_paquete` AS `peso_d8`,
`sm`.`d10_cares_c` AS `d10_cares_c`,`sad10`.`peso_paquete` AS `peso_d10`,
`sm`.`d12_cares_c` AS `d12_cares_c`,`sad12`.`peso_paquete` AS `peso_d12`,
`sm`.`d14_cares_c` AS `d14_cares_c`,`sad14`.`peso_paquete` AS `peso_d14`,
`sm`.`d16_cares_c` AS `d16_cares_c`,`sast50`.`peso_paquete` AS `peso_d16`,
`sm`.`d20_cares_c` AS `d20_cares_c`,`sad20`.`peso_paquete` AS `peso_d20`,
`sm`.`d25_cares_c` AS `d25_cares_c`,`sad25`.`peso_paquete` AS `peso_d25`,
`sm`.`d32_cares_c` AS `d32_cares_c`,`sad32`.`peso_paquete` AS `peso_d32`,
`sm`.`d40_cares_c` AS `d40_cares_c`,`sad40`.`peso_paquete` AS `peso_d40`,
`sm`.`d8_cares_c` AS `d8_cares_c`,
`sm`.`d10_cares_c` AS `d10_cares_c`,
`sm`.`d12_cares_c` AS `d12_cares_c`,
`sm`.`d14_cares_c` AS `d14_cares_c`,
`sm`.`d16_cares_c` AS `d16_cares_c`,
`sm`.`d20_cares_c` AS `d20_cares_c`,
`sm`.`d25_cares_c` AS `d25_cares_c`,
`sm`.`d32_cares_c` AS `d32_cares_c`,
`sm`.`d40_cares_c` AS `d40_cares_c` 
from (((((((((`sen_stock_mat` `sm` 
join `sen_stock_art` `sast20` on(`sast20`.`id_articulo` = `sm`.`id_articulo` and `sast20`.`formato` = 'd8_cares_c')) 
join `sen_stock_art` `sad10` on(`sad10`.`id_articulo` = `sm`.`id_articulo` and `sad10`.`formato` = 'd10_cares_c')) 
join `sen_stock_art` `sad12` on(`sad12`.`id_articulo` = `sm`.`id_articulo` and `sad12`.`formato` = 'd12_cares_c')) 
join `sen_stock_art` `sad14` on(`sad14`.`id_articulo` = `sm`.`id_articulo` and `sad14`.`formato` = 'd14_cares_c')) 
join `sen_stock_art` `sast50` on(`sast50`.`id_articulo` = `sm`.`id_articulo` and `sast50`.`formato` = 'd16_cares_c')) 
join `sen_stock_art` `sad20` on(`sad20`.`id_articulo` = `sm`.`id_articulo` and `sad20`.`formato` = 'd20_cares_c')) 
join `sen_stock_art` `sad25` on(`sad25`.`id_articulo` = `sm`.`id_articulo` and `sad25`.`formato` = 'd25_cares_c')) 
join `sen_stock_art` `sad32` on(`sad32`.`id_articulo` = `sm`.`id_articulo` and `sad32`.`formato` = 'd32_cares_c')) 
join `sen_stock_art` `sad40` on(`sad40`.`id_articulo` = `sm`.`id_articulo` and `sad40`.`formato` = 'd40_cares_c')) 
where `sm`.`fecha` = '".$fecha."' and `sm`.`familia` = 1 order by `sm`.`orden`";


$resultDataHA_c = mysqli_query($con,$sqlHA_c);


while($row = $resultDataHA_c->fetch_array(MYSQLI_ASSOC)) { $filasHA_c[] = $row; }

//filas consumos cares

$sqlConsumos = "SELECT 
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd6_cares' limit 1) as consumo_d6,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd8_cares' limit 1) as consumo_d8,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd9_cares' limit 1) as consumo_d9,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd10_cares' limit 1) as consumo_d10,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd12_cares' limit 1) as consumo_d12,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd14_cares' limit 1) as consumo_d14,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd16_cares' limit 1) as consumo_d16,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd20_cares' limit 1) as consumo_d20,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd25_cares' limit 1) as consumo_d25,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd32_cares' limit 1) as consumo_d32,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd40_cares' limit 1) as consumo_d40
FROM sen_stock_art
Limit 1";

$resultDataConsumos = mysqli_query($con,$sqlConsumos);

while($row = $resultDataConsumos->fetch_array(MYSQLI_ASSOC)) { $filasConsumos[] = $row; }


//filas consumos cares c

$sqlConsumos_c = "SELECT 
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd6_cares_c' limit 1) as consumo_d6,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd8_cares_c' limit 1) as consumo_d8,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd9_cares_c' limit 1) as consumo_d9,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd10_cares_c' limit 1) as consumo_d10,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd12_cares_c' limit 1) as consumo_d12,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd14_cares_c' limit 1) as consumo_d14,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd16_cares_c' limit 1) as consumo_d16,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd20_cares_c' limit 1) as consumo_d20,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd25_cares_c' limit 1) as consumo_d25,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd32_cares_c' limit 1) as consumo_d32,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd40_cares_c' limit 1) as consumo_d40
FROM sen_stock_art
Limit 1";

$resultDataConsumos_c = mysqli_query($con,$sqlConsumos_c);

while($row = $resultDataConsumos_c->fetch_array(MYSQLI_ASSOC)) { $filasConsumos_c[] = $row; }


define('EURO',chr(128));

 echo($row['fecha']);

// FPDF

require('../fpdf/fpdf.php');

$pdf = new FPDF('L','mm');
$pdf->AddPage();
$pdf->SetFont('Helvetica','B',10);

//LINEA REFERENCIA
//$pdf->Cell(275,1,utf8_decode(''),'LTBR',1);

//LINEA CABECERA
$pdf->SetFillColor(190,221,252);

$pdf->Cell(70,5,utf8_decode('TERUEL'),'LTB',0,'C',TRUE);
$pdf->Cell(20,5,utf8_decode($fechaBonita),'TBR',0,'C',TRUE);
$pdf->Cell(95,5,utf8_decode(''),'',0);
$pdf->Cell(59,5,utf8_decode('K500CT'),'LTBR',0,'C',TRUE);

//UNIDADES IDEA X2 TN DE PESO
$TOTALSTOCKEXCEL = $filasBobIdea[0]['d6_cares'] * 2;


$pdf->Cell(15,8,utf8_decode(''),'',1,'C');
//TABLA HA
$totalColumnaFila = 0;

//CABECERA TABLA
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('UNITES HA'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 10'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 12'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 14'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 16'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 20'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 25'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 32'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 40'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('TOTAL'),'LTBR',1,'C',TRUE);


//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BOBINAS K500CT'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d8_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d10_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d12_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d14_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d16_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d20_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d25_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d32_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d40_cares']),'LTBR',0,'C');
$totalFila =  $filasHA[0]['d8_cares'] + $filasHA[0]['d10_cares'] + $filasHA[0]['d12_cares'] +
$filasHA[0]['d14_cares'] +
$filasHA[0]['d16_cares'] +
$filasHA[0]['d20_cares'] +
$filasHA[0]['d25_cares'] +
$filasHA[0]['d32_cares'] +
$filasHA[0]['d40_cares'];

$totalColumnaFila = $totalColumnaFila + $totalFila;
$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);


//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 12 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d8_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d10_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d12_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d14_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d16_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d20_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d25_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d32_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d40_cares']),'LTBR',0,'C');
$totalFila =   $filasHA[2]['d8_cares'] + $filasHA[2]['d10_cares'] + $filasHA[2]['d12_cares'] +
$filasHA[2]['d14_cares'] +
$filasHA[2]['d16_cares'] +
$filasHA[2]['d20_cares'] +
$filasHA[2]['d25_cares'] +
$filasHA[2]['d32_cares'] +
$filasHA[2]['d40_cares'];

$totalColumnaFila = $totalColumnaFila + $totalFila;
$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 14 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d8_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d10_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d12_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d14_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d16_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d20_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d25_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d32_cares']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d40_cares']),'LTBR',0,'C');
$totalFila =  $filasHA[3]['d8_cares'] +  $filasHA[3]['d10_cares'] + $filasHA[3]['d12_cares'] +
$filasHA[3]['d14_cares'] +
$filasHA[3]['d16_cares'] +
$filasHA[3]['d20_cares'] +
$filasHA[3]['d25_cares'] +
$filasHA[3]['d32_cares'] +
$filasHA[3]['d40_cares'];

$totalColumnaFila = $totalColumnaFila + $totalFila;
$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//CALCULO SUMATORIOS COLUMNA
$sumCold8 = $filasHA[0]['d8_cares'] +$filasHA[3]['d8_cares'] +$filasHA[2]['d8_cares'];
$sumCold10 = $filasHA[0]['d10_cares'] +$filasHA[3]['d10_cares'] +$filasHA[2]['d10_cares'];
$sumCold12 = $filasHA[0]['d12_cares'] +$filasHA[3]['d12_cares'] +$filasHA[2]['d12_cares'];
$sumCold14 = $filasHA[0]['d14_cares'] +$filasHA[3]['d14_cares'] +$filasHA[2]['d14_cares'];
$sumCold16 = $filasHA[0]['d16_cares'] +$filasHA[3]['d16_cares'] +$filasHA[2]['d16_cares'];
$sumCold20 = $filasHA[0]['d20_cares'] +$filasHA[3]['d20_cares'] +$filasHA[2]['d20_cares'];
$sumCold25 = $filasHA[0]['d25_cares'] +$filasHA[3]['d25_cares'] +$filasHA[2]['d25_cares'];
$sumCold32 = $filasHA[0]['d32_cares'] +$filasHA[3]['d32_cares'] +$filasHA[2]['d32_cares'];
$sumCold40 = $filasHA[0]['d40_cares'] +$filasHA[3]['d40_cares'] +$filasHA[2]['d40_cares'];

$totalFila =  $sumCold8 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16 + $sumCold20 + $sumCold25 + $sumCold32 + $sumCold40;

//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('Total'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold8),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold10),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold12),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold14),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold16),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold20),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold25),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold32),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold40),'LTBR',0,'C',TRUE);
$pdf->SetFillColor(108,157,221);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//SEPARADOR CELDA
$pdf->Cell(15,4,utf8_decode(''),'',1,'C');

//SEPARADOR CELDA
$pdf->Cell(15,4,utf8_decode(''),'',1,'C');

//$pdf->AddPage();
$pdf->SetFont('Helvetica','B',10);


//LINEA CABECERA
$pdf->SetFillColor(190,221,252);

$pdf->Cell(70,5,utf8_decode('TERUEL'),'LTB',0,'C',TRUE);
$pdf->Cell(20,5,utf8_decode($fechaBonita),'TBR',1,'C',TRUE);


$pdf->Cell(15,2,utf8_decode(''),'',1,'C');
//TABLA HA
//CABECERA TABLA
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('TONNES HA'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 10'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 12'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 14'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 16'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 20'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 25'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 32'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 40'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('TOTAL'),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BOBINAS K500CT'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d8_cares'] * $filasHA[0]['peso_d8']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d10_cares'] * $filasHA[0]['peso_d10']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d12_cares'] * $filasHA[0]['peso_d12']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d14_cares'] * $filasHA[0]['peso_d14']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d16_cares'] * $filasHA[0]['peso_d16']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d20_cares'] * $filasHA[0]['peso_d20']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d25_cares'] * $filasHA[0]['peso_d25']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d32_cares'] * $filasHA[0]['peso_d32']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d40_cares'] * $filasHA[0]['peso_d40']),'LTBR',0,'C');

$totalFila =  
($filasHA[0]['d8_cares'] * $filasHA[0]['peso_d8']) +
($filasHA[0]['d10_cares'] * $filasHA[0]['peso_d10']) +
($filasHA[0]['d12_cares'] * $filasHA[0]['peso_d12']) +
($filasHA[0]['d14_cares'] * $filasHA[0]['peso_d14']) +
($filasHA[0]['d16_cares'] * $filasHA[0]['peso_d16']) +
($filasHA[0]['d20_cares'] * $filasHA[0]['peso_d20']) +
($filasHA[0]['d25_cares'] * $filasHA[0]['peso_d25']) +
($filasHA[0]['d32_cares'] * $filasHA[0]['peso_d32']) +
($filasHA[0]['d40_cares'] * $filasHA[0]['peso_d40']);

$totalColumnaFila = $totalColumnaFila + $totalFila;

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');


//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('TOTAL BOBINAS'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d8_cares'] * $filasHA[0]['peso_d8']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d10_cares'] * $filasHA[0]['peso_d10']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d12_cares'] * $filasHA[0]['peso_d12']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d14_cares'] * $filasHA[0]['peso_d14']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d16_cares'] * $filasHA[0]['peso_d16']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d20_cares'] * $filasHA[0]['peso_d20']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d25_cares'] * $filasHA[0]['peso_d25']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d32_cares'] * $filasHA[0]['peso_d32']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d40_cares'] * $filasHA[0]['peso_d40']),'LTBR',0,'C',TRUE);

$totalFila =  
($filasHA[0]['d8_cares'] * $filasHA[0]['peso_d8']) +
($filasHA[0]['d10_cares'] * $filasHA[0]['peso_d10']) +
($filasHA[0]['d12_cares'] * $filasHA[0]['peso_d12']) +
($filasHA[0]['d14_cares'] * $filasHA[0]['peso_d14']) +
($filasHA[0]['d16_cares'] * $filasHA[0]['peso_d16']) +
($filasHA[0]['d20_cares'] * $filasHA[0]['peso_d20']) +
($filasHA[0]['d25_cares'] * $filasHA[0]['peso_d25']) +
($filasHA[0]['d32_cares'] * $filasHA[0]['peso_d32']) +
($filasHA[0]['d40_cares'] * $filasHA[0]['peso_d40']);

$totalBobinas  = $totalFila;


$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//calculo total bobinas
//CALCULO SUMATORIOS COLUMNA

$sumCold8 = ($filasHA[1]['d8_cares'] * $filasHA[1]['peso_d8']) + ($filasHA[2]['d8_cares'] * $filasHA[2]['peso_d8']) + ($filasHA[4]['d8_cares'] * $filasHA[4]['peso_d8']) ;
$sumCold10 = ($filasHA[1]['d10_cares'] * $filasHA[1]['peso_d10']) + ($filasHA[2]['d10_cares'] * $filasHA[2]['peso_d10']) + ($filasHA[4]['d10_cares'] * $filasHA[4]['peso_d10']) ;
$sumCold12 = ($filasHA[1]['d12_cares'] * $filasHA[1]['peso_d12']) + ($filasHA[2]['d12_cares'] * $filasHA[2]['peso_d12']) + ($filasHA[4]['d12_cares'] * $filasHA[4]['peso_d12']) ;
$sumCold14 = ($filasHA[1]['d14_cares'] * $filasHA[1]['peso_d14']) + ($filasHA[2]['d14_cares'] * $filasHA[2]['peso_d14']) + ($filasHA[4]['d14_cares'] * $filasHA[4]['peso_d14']) ;
$sumCold16 = ($filasHA[1]['d16_cares'] * $filasHA[1]['peso_d16']) + ($filasHA[2]['d16_cares'] * $filasHA[2]['peso_d16']) + ($filasHA[4]['d16_cares'] * $filasHA[4]['peso_d16']) ;
$sumCold20 = ($filasHA[1]['d20_cares'] * $filasHA[1]['peso_d20']) + ($filasHA[2]['d20_cares'] * $filasHA[2]['peso_d20']) + ($filasHA[4]['d20_cares'] * $filasHA[4]['peso_d20']) ;
$sumCold25 = ($filasHA[1]['d25_cares'] * $filasHA[1]['peso_d25']) + ($filasHA[2]['d25_cares'] * $filasHA[2]['peso_d25']) + ($filasHA[4]['d25_cares'] * $filasHA[4]['peso_d25']) ;
$sumCold32 = ($filasHA[1]['d32_cares'] * $filasHA[1]['peso_d32']) + ($filasHA[2]['d32_cares'] * $filasHA[2]['peso_d32']) + ($filasHA[4]['d32_cares'] * $filasHA[4]['peso_d32']) ;
$sumCold40 = ($filasHA[1]['d40_cares'] * $filasHA[1]['peso_d40']) + ($filasHA[2]['d40_cares'] * $filasHA[2]['peso_d40']) + ($filasHA[4]['d40_cares'] * $filasHA[4]['peso_d40']) ;
$totalFila = 0; 
$totalFila =  $sumCold8 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;
$totalBarras = $totalFila;

$totalBarrasBobinas = $totalBobinas + $totalBarras;
$porcenTotalBarras = round(($totalBarras*100)/$totalBarrasBobinas,1);
$porcenTotalBobinas = round(($totalBobinas*100)/$totalBarrasBobinas,1);

//% TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(226,148,87);
$pdf->Cell(74,4,utf8_decode('% Bobines pour Diametre'),'LTBR',0,'C',TRUE);

//($requestVars->_name == '') ? $redText : ''; 

($filasHA[0]['d8_cares'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d8_cares'] * $filasHA[0]['peso_d8'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d10_cares'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d10_cares'] * $filasHA[0]['peso_d10'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d12_cares'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d12_cares'] * $filasHA[0]['peso_d12'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d14_cares'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d14_cares'] * $filasHA[0]['peso_d14'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d16_cares'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d16_cares'] * $filasHA[0]['peso_d16'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d20_cares'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d20_cares'] * $filasHA[0]['peso_d20'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d25_cares'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d25_cares'] * $filasHA[0]['peso_d25'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d32_cares'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d32_cares'] * $filasHA[0]['peso_d32'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d40_cares'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d40_cares'] * $filasHA[0]['peso_d40'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);


$pdf->Cell(17,4,utf8_decode($porcenTotalBobinas.'%'),'LTBR',1,'C',TRUE);


//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 12 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d8_cares'] * $filasHA[2]['peso_d8']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d10_cares'] * $filasHA[2]['peso_d10']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d12_cares'] * $filasHA[2]['peso_d12']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d14_cares'] * $filasHA[2]['peso_d14']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d16_cares'] * $filasHA[2]['peso_d16']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d20_cares'] * $filasHA[2]['peso_d20']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d25_cares'] * $filasHA[2]['peso_d25']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d32_cares'] * $filasHA[2]['peso_d32']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d40_cares'] * $filasHA[2]['peso_d40']),'LTBR',0,'C');

$totalFila =  
($filasHA[2]['d8_cares'] * $filasHA[2]['peso_d8']) +
($filasHA[2]['d10_cares'] * $filasHA[2]['peso_d10']) +
($filasHA[2]['d12_cares'] * $filasHA[2]['peso_d12']) +
($filasHA[2]['d14_cares'] * $filasHA[2]['peso_d14']) +
($filasHA[2]['d16_cares'] * $filasHA[2]['peso_d16']) +
($filasHA[2]['d20_cares'] * $filasHA[2]['peso_d20']) +
($filasHA[2]['d25_cares'] * $filasHA[2]['peso_d25']) +
($filasHA[2]['d32_cares'] * $filasHA[2]['peso_d32']) +
($filasHA[2]['d40_cares'] * $filasHA[2]['peso_d40']);

$totalColumnaFila = $totalColumnaFila + $totalFila;

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');
//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 14 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d8_cares'] * $filasHA[3]['peso_d8']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d10_cares'] * $filasHA[3]['peso_d10']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d12_cares'] * $filasHA[3]['peso_d12']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d14_cares'] * $filasHA[3]['peso_d14']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d16_cares'] * $filasHA[3]['peso_d16']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d20_cares'] * $filasHA[3]['peso_d20']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d25_cares'] * $filasHA[3]['peso_d25']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d32_cares'] * $filasHA[3]['peso_d32']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d40_cares'] * $filasHA[3]['peso_d40']),'LTBR',0,'C');

$totalFila =  
($filasHA[3]['d8_cares'] * $filasHA[3]['peso_d8']) +
($filasHA[3]['d10_cares'] * $filasHA[3]['peso_d10']) +
($filasHA[3]['d12_cares'] * $filasHA[3]['peso_d12']) +
($filasHA[3]['d14_cares'] * $filasHA[3]['peso_d14']) +
($filasHA[3]['d16_cares'] * $filasHA[3]['peso_d16']) +
($filasHA[3]['d20_cares'] * $filasHA[3]['peso_d20']) +
($filasHA[3]['d25_cares'] * $filasHA[3]['peso_d25']) +
($filasHA[3]['d32_cares'] * $filasHA[3]['peso_d32']) +
($filasHA[3]['d40_cares'] * $filasHA[3]['peso_d40']);

$totalColumnaFila = $totalColumnaFila + $totalFila;

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');



//CALCULO SUMATORIOS COLUMNA
$sumCold8 = ($filasHA[1]['d8_cares'] * $filasHA[1]['peso_d8']) + ($filasHA[2]['d8_cares'] * $filasHA[2]['peso_d8']) + ($filasHA[3]['d8_cares'] * $filasHA[3]['peso_d8']) ;
$sumCold10 = ($filasHA[1]['d10_cares'] * $filasHA[1]['peso_d10']) + ($filasHA[2]['d10_cares'] * $filasHA[2]['peso_d10']) + ($filasHA[3]['d10_cares'] * $filasHA[3]['peso_d10']) ;
$sumCold12 = ($filasHA[1]['d12_cares'] * $filasHA[1]['peso_d12']) + ($filasHA[2]['d12_cares'] * $filasHA[2]['peso_d12']) + ($filasHA[3]['d12_cares'] * $filasHA[3]['peso_d12']) ;
$sumCold14 = ($filasHA[1]['d14_cares'] * $filasHA[1]['peso_d14']) + ($filasHA[2]['d14_cares'] * $filasHA[2]['peso_d14']) + ($filasHA[3]['d14_cares'] * $filasHA[3]['peso_d14']) ;
$sumCold16 = ($filasHA[1]['d16_cares'] * $filasHA[1]['peso_d16']) + ($filasHA[2]['d16_cares'] * $filasHA[2]['peso_d16']) + ($filasHA[3]['d16_cares'] * $filasHA[3]['peso_d16']) ;
$sumCold20 = ($filasHA[1]['d20_cares'] * $filasHA[1]['peso_d20']) + ($filasHA[2]['d20_cares'] * $filasHA[2]['peso_d20']) + ($filasHA[3]['d20_cares'] * $filasHA[3]['peso_d20']) ;
$sumCold25 = ($filasHA[1]['d25_cares'] * $filasHA[1]['peso_d25']) + ($filasHA[2]['d25_cares'] * $filasHA[2]['peso_d25']) + ($filasHA[3]['d25_cares'] * $filasHA[3]['peso_d25']) ;
$sumCold32 = ($filasHA[1]['d32_cares'] * $filasHA[1]['peso_d32']) + ($filasHA[2]['d32_cares'] * $filasHA[2]['peso_d32']) + ($filasHA[3]['d32_cares'] * $filasHA[3]['peso_d32']) ;
$sumCold40 = ($filasHA[1]['d40_cares'] * $filasHA[1]['peso_d40']) + ($filasHA[2]['d40_cares'] * $filasHA[2]['peso_d40']) + ($filasHA[3]['d40_cares'] * $filasHA[3]['peso_d40']) ;
$totalFila = 0; 
$totalFila = $sumCold6 + $sumCold8 + $sumCold9 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;



//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(74,4,utf8_decode('TOTAL BARRAS'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold8),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold10),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold12),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold14),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold16),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold20),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold25),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold32),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold40),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);


//($requestVars->_name == '') ? $redText : ''; 


$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(226,148,87);
$pdf->Cell(74,4,utf8_decode('% Barres pour Diametre'),'LTBR',0,'C',TRUE);
($sumCold8 > 0) ? $pdf->Cell(17,4,round((100* $sumCold8 )/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold10 > 0) ? $pdf->Cell(17,4,round((100* $sumCold10)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold12 > 0) ? $pdf->Cell(17,4,round((100* $sumCold12)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold14 > 0) ? $pdf->Cell(17,4,round((100* $sumCold14)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold16 > 0) ? $pdf->Cell(17,4,round((100* $sumCold16)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold20 > 0) ? $pdf->Cell(17,4,round((100* $sumCold20)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold25 > 0) ? $pdf->Cell(17,4,round((100* $sumCold25)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold32 > 0) ? $pdf->Cell(17,4,round((100* $sumCold32)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold40 > 0) ? $pdf->Cell(17,4,round((100* $sumCold40)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($porcenTotalBarras.'%'),'LTBR',1,'C',TRUE);


//CALCULO SUMATORIOS COLUMNA
$sumCold8 = ($filasHA[0]['d8_cares'] * $filasHA[0]['peso_d8']) + ($filasHA[3]['d8_cares'] * $filasHA[3]['peso_d8']) + ($filasHA[2]['d8_cares'] * $filasHA[2]['peso_d8']) + ($filasHA[4]['d8_cares'] * $filasHA[4]['peso_d8']) ;
$sumCold10 = ($filasHA[0]['d10_cares'] * $filasHA[0]['peso_d10']) + ($filasHA[3]['d10_cares'] * $filasHA[3]['peso_d10']) + ($filasHA[2]['d10_cares'] * $filasHA[2]['peso_d10']) + ($filasHA[4]['d10_cares'] * $filasHA[4]['peso_d10']) ;
$sumCold12 = ($filasHA[0]['d12_cares'] * $filasHA[0]['peso_d12']) + ($filasHA[3]['d12_cares'] * $filasHA[3]['peso_d12']) + ($filasHA[2]['d12_cares'] * $filasHA[2]['peso_d12']) + ($filasHA[4]['d12_cares'] * $filasHA[4]['peso_d12']) ;
$sumCold14 = ($filasHA[0]['d14_cares'] * $filasHA[0]['peso_d14']) + ($filasHA[3]['d14_cares'] * $filasHA[3]['peso_d14']) + ($filasHA[2]['d14_cares'] * $filasHA[2]['peso_d14']) + ($filasHA[4]['d14_cares'] * $filasHA[4]['peso_d14']) ;
$sumCold16 = ($filasHA[0]['d16_cares'] * $filasHA[0]['peso_d16']) + ($filasHA[3]['d16_cares'] * $filasHA[3]['peso_d16']) + ($filasHA[2]['d16_cares'] * $filasHA[2]['peso_d16']) + ($filasHA[4]['d16_cares'] * $filasHA[4]['peso_d16']) ;
$sumCold20 = ($filasHA[0]['d20_cares'] * $filasHA[0]['peso_d20']) + ($filasHA[3]['d20_cares'] * $filasHA[3]['peso_d20']) + ($filasHA[2]['d20_cares'] * $filasHA[2]['peso_d20']) + ($filasHA[4]['d20_cares'] * $filasHA[4]['peso_d20']) ;
$sumCold25 = ($filasHA[0]['d25_cares'] * $filasHA[0]['peso_d25']) + ($filasHA[3]['d25_cares'] * $filasHA[3]['peso_d25']) + ($filasHA[2]['d25_cares'] * $filasHA[2]['peso_d25']) + ($filasHA[4]['d25_cares'] * $filasHA[4]['peso_d25']) ;
$sumCold32 = ($filasHA[0]['d32_cares'] * $filasHA[0]['peso_d32']) + ($filasHA[3]['d32_cares'] * $filasHA[3]['peso_d32']) + ($filasHA[2]['d32_cares'] * $filasHA[2]['peso_d32']) + ($filasHA[4]['d32_cares'] * $filasHA[4]['peso_d32']) ;
$sumCold40 = ($filasHA[0]['d40_cares'] * $filasHA[0]['peso_d40']) + ($filasHA[3]['d40_cares'] * $filasHA[3]['peso_d40']) + ($filasHA[2]['d40_cares'] * $filasHA[2]['peso_d40']) + ($filasHA[4]['d40_cares'] * $filasHA[4]['peso_d40']) ;
$totalFila = 0; 
$totalFila = $sumCold6 + $sumCold8 + $sumCold9 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;

//% TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(108,157,221);
$pdf->Cell(74,4,utf8_decode('TOTAL'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold8),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold10),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold12),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold14),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold16),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold20),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold25),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold32),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold40),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

$pdf->Cell(74,4,utf8_decode('% Total pour Diametre'),'LTBR',0,'C',TRUE);
($sumCold8 > 0) ? $pdf->Cell(17,4,round((100* $sumCold8 )/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold10 > 0) ? $pdf->Cell(17,4,round((100* $sumCold10)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold12 > 0) ? $pdf->Cell(17,4,round((100* $sumCold12)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold14 > 0) ? $pdf->Cell(17,4,round((100* $sumCold14)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold16 > 0) ? $pdf->Cell(17,4,round((100* $sumCold16)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold20 > 0) ? $pdf->Cell(17,4,round((100* $sumCold20)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold25 > 0) ? $pdf->Cell(17,4,round((100* $sumCold25)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold32 > 0) ? $pdf->Cell(17,4,round((100* $sumCold32)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold40 > 0) ? $pdf->Cell(17,4,round((100* $sumCold40)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('100%'),'LTBR',1,'C',TRUE);


$pdf->SetFillColor(99,218,64);
$pdf->Cell(74,4,utf8_decode('TOTAL HA'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

$TOTALSTOCKEXCEL = $TOTALSTOCKEXCEL + $totalFila;


//SEPARADOR CELDA
$pdf->Cell(15,4,utf8_decode(''),'',1,'C');
//TABLA CONGIGURACION CONSUMOS
//CABECERA TABLA
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('Usine Sendin Spain'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 10'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 12'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 14'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 16'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 20'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 25'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 32'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 40'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('TOTAL'),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->SetFillColor(226,148,87);

$pdf->Cell(74,4,utf8_decode('CONSOMATION JOUR'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d8'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d10'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d12'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d14'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d16'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d20'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d25'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d32'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d40'],2),'LTBR',0,'C',TRUE);
$totalFila = 
 
$filasConsumos[0]['consumo_d8'] + 
$filasConsumos[0]['consumo_d10'] + 
$filasConsumos[0]['consumo_d12'] + 
$filasConsumos[0]['consumo_d14'] + 
$filasConsumos[0]['consumo_d16'] + 
$filasConsumos[0]['consumo_d20'] + 
$filasConsumos[0]['consumo_d25'] + 
$filasConsumos[0]['consumo_d32'] + 
$filasConsumos[0]['consumo_d40'];

$filasConsumos[0]['total'] = $totalFila;

$pdf->SetFillColor(108,157,221);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);


$diasMes= 21;

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->SetFillColor(226,148,87);

$pdf->Cell(74,4,utf8_decode('CONSOMATION MOIS'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d8']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d10']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d12']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d14']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d16']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d20']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d25']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d32']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d40']*$diasMes,2),'LTBR',0,'C',TRUE);
$totalFila = 
$filasConsumos[0]['consumo_d8'] * $diasMes + 
$filasConsumos[0]['consumo_d10'] * $diasMes + 
$filasConsumos[0]['consumo_d12'] * $diasMes + 
$filasConsumos[0]['consumo_d14'] * $diasMes + 
$filasConsumos[0]['consumo_d16'] * $diasMes + 
$filasConsumos[0]['consumo_d20'] * $diasMes + 
$filasConsumos[0]['consumo_d25'] * $diasMes + 
$filasConsumos[0]['consumo_d32'] * $diasMes + 
$filasConsumos[0]['consumo_d40'] * $diasMes;

$pdf->SetFillColor(108,157,221);
$totalPorcenConsumo = $totalFila;
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);


//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->SetFillColor(226,148,87);

$pdf->Cell(74,4,utf8_decode('% S/TOTAL'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d8']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d10']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d12']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d14']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d16']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d20']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d25']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d32']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d40']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);

$totalFila = 
($filasConsumos[0]['consumo_d8']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos[0]['consumo_d10']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos[0]['consumo_d12']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos[0]['consumo_d14']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos[0]['consumo_d16']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos[0]['consumo_d20']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos[0]['consumo_d25']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos[0]['consumo_d32']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos[0]['consumo_d40']*$diasMes)/$totalPorcenConsumo*100 ;




$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);




//% TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(99,218,64);
$pdf->Cell(74,4,utf8_decode('JOURS MOIS'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($diasMes),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',1,'C');


$stockActualTotal =  [];


//SEPARADOR CELDA
$pdf->Cell(15,4,utf8_decode(''),'',1,'C');
//TABLA CONSUMOS POR DIÁMETROS
//CABECERA TABLA
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('Usine Sendin Spain'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 10'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 12'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 14'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 16'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 20'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 25'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 32'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 40'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('TOTAL'),'LTBR',1,'C',TRUE);

$pdf->Cell(74,4,utf8_decode('Stock Bobines'),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d8_cares'] * $filasHA[0]['peso_d8']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d10_cares'] * $filasHA[0]['peso_d10']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d12_cares'] * $filasHA[0]['peso_d12']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d14_cares'] * $filasHA[0]['peso_d14']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d16_cares'] * $filasHA[0]['peso_d16']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d20_cares'] * $filasHA[0]['peso_d20']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d25_cares'] * $filasHA[0]['peso_d25']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d32_cares'] * $filasHA[0]['peso_d32']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d40_cares'] * $filasHA[0]['peso_d40']),'LTBR',0,'C');

$totalFila =  
($filasHA[0]['d8_cares'] * $filasHA[0]['peso_d8']) +
($filasHA[0]['d10_cares'] * $filasHA[0]['peso_d10']) +
($filasHA[0]['d12_cares'] * $filasHA[0]['peso_d12']) +
($filasHA[0]['d14_cares'] * $filasHA[0]['peso_d14']) +
($filasHA[0]['d16_cares'] * $filasHA[0]['peso_d16']) +
($filasHA[0]['d20_cares'] * $filasHA[0]['peso_d20']) +
($filasHA[0]['d25_cares'] * $filasHA[0]['peso_d25']) +
($filasHA[0]['d32_cares'] * $filasHA[0]['peso_d32']) +
($filasHA[0]['d40_cares'] * $filasHA[0]['peso_d40']);



$stockBobines['d8'] =  $filasHA[0]['d8_cares'] * $filasHA[0]['peso_d8'];
$stockBobines['d10'] =  $filasHA[0]['d10_cares'] * $filasHA[0]['peso_d10'];
$stockBobines['d12'] =  $filasHA[0]['d12_cares'] * $filasHA[0]['peso_d12'];
$stockBobines['d14'] =  $filasHA[0]['d14_cares'] * $filasHA[0]['peso_d14'];
$stockBobines['d16'] =  $filasHA[0]['d16_cares'] * $filasHA[0]['peso_d16'];
$stockBobines['d20'] =  $filasHA[0]['d20_cares'] * $filasHA[0]['peso_d20'];
$stockBobines['d25'] =  $filasHA[0]['d25_cares'] * $filasHA[0]['peso_d25'];
$stockBobines['d32'] =  $filasHA[0]['d32_cares'] * $filasHA[0]['peso_d32'];
$stockBobines['d40'] =  $filasHA[0]['d40_cares'] * $filasHA[0]['peso_d40'];
$stockBobines['total'] =  $totalFila;



$stockActualTotal['d8'] =  $filasHA[0]['d8_cares'] * $filasHA[0]['peso_d8'];
$stockActualTotal['d10'] =  $filasHA[0]['d10_cares'] * $filasHA[0]['peso_d10'];
$stockActualTotal['d12'] =  $filasHA[0]['d12_cares'] * $filasHA[0]['peso_d12'];
$stockActualTotal['d14'] =  $filasHA[0]['d14_cares'] * $filasHA[0]['peso_d14'];
$stockActualTotal['d16'] =  $filasHA[0]['d16_cares'] * $filasHA[0]['peso_d16'];
$stockActualTotal['d20'] =  $filasHA[0]['d20_cares'] * $filasHA[0]['peso_d20'];
$stockActualTotal['d25'] =  $filasHA[0]['d25_cares'] * $filasHA[0]['peso_d25'];
$stockActualTotal['d32'] =  $filasHA[0]['d32_cares'] * $filasHA[0]['peso_d32'];
$stockActualTotal['d40'] =  $filasHA[0]['d40_cares'] * $filasHA[0]['peso_d40'];
$stockActualTotal['total'] =  $totalFila;


$totalBobinas  = $totalFila;
$pdf->SetFillColor(108,157,221);

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);


//CALCULO SUMATORIOS COLUMNA

$sumCold8 = ($filasHA[1]['d8_cares'] * $filasHA[1]['peso_d8']) + ($filasHA[2]['d8_cares'] * $filasHA[2]['peso_d8']) + ($filasHA[3]['d8_cares'] * $filasHA[3]['peso_d8']) ;
$sumCold10 = ($filasHA[1]['d10_cares'] * $filasHA[1]['peso_d10']) + ($filasHA[2]['d10_cares'] * $filasHA[2]['peso_d10']) + ($filasHA[3]['d10_cares'] * $filasHA[3]['peso_d10']) ;
$sumCold12 = ($filasHA[1]['d12_cares'] * $filasHA[1]['peso_d12']) + ($filasHA[2]['d12_cares'] * $filasHA[2]['peso_d12']) + ($filasHA[3]['d12_cares'] * $filasHA[3]['peso_d12']) ;
$sumCold14 = ($filasHA[1]['d14_cares'] * $filasHA[1]['peso_d14']) + ($filasHA[2]['d14_cares'] * $filasHA[2]['peso_d14']) + ($filasHA[3]['d14_cares'] * $filasHA[3]['peso_d14']) ;
$sumCold16 = ($filasHA[1]['d16_cares'] * $filasHA[1]['peso_d16']) + ($filasHA[2]['d16_cares'] * $filasHA[2]['peso_d16']) + ($filasHA[3]['d16_cares'] * $filasHA[3]['peso_d16']) ;
$sumCold20 = ($filasHA[1]['d20_cares'] * $filasHA[1]['peso_d20']) + ($filasHA[2]['d20_cares'] * $filasHA[2]['peso_d20']) + ($filasHA[3]['d20_cares'] * $filasHA[3]['peso_d20']) ;
$sumCold25 = ($filasHA[1]['d25_cares'] * $filasHA[1]['peso_d25']) + ($filasHA[2]['d25_cares'] * $filasHA[2]['peso_d25']) + ($filasHA[3]['d25_cares'] * $filasHA[3]['peso_d25']) ;
$sumCold32 = ($filasHA[1]['d32_cares'] * $filasHA[1]['peso_d32']) + ($filasHA[2]['d32_cares'] * $filasHA[2]['peso_d32']) + ($filasHA[3]['d32_cares'] * $filasHA[3]['peso_d32']) ;
$sumCold40 = ($filasHA[1]['d40_cares'] * $filasHA[1]['peso_d40']) + ($filasHA[2]['d40_cares'] * $filasHA[2]['peso_d40']) + ($filasHA[3]['d40_cares'] * $filasHA[3]['peso_d40']) ;
$totalFila = 0; 
$totalFila =  $sumCold8 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;


$stockActualTotal['d8'] = $stockActualTotal['d8'] + $sumCold8;
$stockActualTotal['d10'] = $stockActualTotal['d10'] + $sumCold10;
$stockActualTotal['d12'] = $stockActualTotal['d12'] + $sumCold12;
$stockActualTotal['d14'] = $stockActualTotal['d14'] + $sumCold14;
$stockActualTotal['d16'] = $stockActualTotal['d16'] + $sumCold16;
$stockActualTotal['d20'] = $stockActualTotal['d20'] + $sumCold20;
$stockActualTotal['d25'] = $stockActualTotal['d25'] + $sumCold25;
$stockActualTotal['d32'] = $stockActualTotal['d32'] + $sumCold32;
$stockActualTotal['d40'] = $stockActualTotal['d40'] + $sumCold40;
$stockActualTotal['total'] = $stockActualTotal['total'] +  $totalFila;



//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(74,4,utf8_decode('Stock Barres'),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold8,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold10,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold12,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold14,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold16,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold20,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold25,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold32,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold40,0),'LTBR',0,'C');
$pdf->SetFillColor(108,157,221);

$pdf->Cell(17,4,round($totalFila,0),'LTBR',1,'C',TRUE);


//CALCULO SUMATORIOS COLUMNA
$sumCold8 = $filasADX[0]['d8_cares']*$filasADX[0]['peso_d8'] + $filasADX[1]['d8_cares']*$filasADX[1]['peso_d8'] + $filasADX[2]['d8_cares']*$filasADX[2]['peso_d8'];
$sumCold10 = $filasADX[0]['d10_cares']*$filasADX[0]['peso_d10'] + $filasADX[1]['d10_cares']*$filasADX[1]['peso_d10'] + $filasADX[2]['d10_cares']*$filasADX[2]['peso_d10'];
$sumCold12 = $filasADX[0]['d12_cares']*$filasADX[0]['peso_d12'] + $filasADX[1]['d12_cares']*$filasADX[1]['peso_d12'] + $filasADX[2]['d12_cares']*$filasADX[2]['peso_d12'];
$sumCold14 = $filasADX[0]['d14_cares']*$filasADX[0]['peso_d14'] + $filasADX[1]['d14_cares']*$filasADX[1]['peso_d14'] + $filasADX[2]['d14_cares']*$filasADX[2]['peso_d14'];
$sumCold16 = $filasADX[0]['d16_cares']*$filasADX[0]['peso_d16'] + $filasADX[1]['d16_cares']*$filasADX[1]['peso_d16'] + $filasADX[2]['d16_cares']*$filasADX[2]['peso_d16'];
$sumCold20 = $filasADX[0]['d20_cares']*$filasADX[0]['peso_d20'] + $filasADX[1]['d20_cares']*$filasADX[1]['peso_d20'] + $filasADX[2]['d20_cares']*$filasADX[2]['peso_d20'];
$sumCold25 = $filasADX[0]['d25_cares']*$filasADX[0]['peso_d25'] + $filasADX[1]['d25_cares']*$filasADX[1]['peso_d25'] + $filasADX[2]['d25_cares']*$filasADX[2]['peso_d25'];
$sumCold32 = $filasADX[0]['d32_cares']*$filasADX[0]['peso_d32'] + $filasADX[1]['d32_cares']*$filasADX[1]['peso_d32'] + $filasADX[2]['d32_cares']*$filasADX[2]['peso_d32'];
$sumCold40 = $filasADX[0]['d40_cares']*$filasADX[0]['peso_d40'] + $filasADX[1]['d40_cares']*$filasADX[1]['peso_d40'] + $filasADX[2]['d40_cares']*$filasADX[2]['peso_d40'];
$totalFila = 0; 
$totalFila = $sumCold8 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;


$stockActualTotalBobinas['d8'] = $stockActualTotal['d8'];
$stockActualTotalBobinas['d10'] = $stockActualTotal['d10'];
$stockActualTotalBobinas['d12'] = $stockActualTotal['d12'];
$stockActualTotalBobinas['d14'] = $stockActualTotal['d14'];
$stockActualTotalBobinas['d16'] = $stockActualTotal['d16'];
$stockActualTotalBobinas['d20'] = $stockActualTotal['d20'];
$stockActualTotalBobinas['d25'] = $stockActualTotal['d25'];
$stockActualTotalBobinas['d32'] = $stockActualTotal['d32'];
$stockActualTotalBobinas['d40'] = $stockActualTotal['d40'];
$stockActualTotalBobinas['total'] = $stockActualTotal['total'];

$stockActualTotal['d8'] = $stockActualTotal['d8'] + $sumCold8;
$stockActualTotal['d10'] = $stockActualTotal['d10'] + $sumCold10;
$stockActualTotal['d12'] = $stockActualTotal['d12'] + $sumCold12;
$stockActualTotal['d14'] = $stockActualTotal['d14'] + $sumCold14;
$stockActualTotal['d16'] = $stockActualTotal['d16'] + $sumCold16;
$stockActualTotal['d20'] = $stockActualTotal['d20'] + $sumCold20;
$stockActualTotal['d25'] = $stockActualTotal['d25'] + $sumCold25;
$stockActualTotal['d32'] = $stockActualTotal['d32'] + $sumCold32;
$stockActualTotal['d40'] = $stockActualTotal['d40'] + $sumCold40;
$stockActualTotal['total'] = $stockActualTotal['total'] +  $totalFila;


//% TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(108,157,221);
$pdf->Cell(74,4,utf8_decode('STOCK ACTUELTotal'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d8'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d10'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d12'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d14'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d16'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d20'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d25'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d32'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d40'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['total'],0),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->SetFillColor(226,148,87);


$consumoMes = [];


$consumoMes['d8']=round($filasConsumos[0]['consumo_d8']*$diasMes,2);
$consumoMes['d10']=round($filasConsumos[0]['consumo_d10']*$diasMes,2);
$consumoMes['d12']=round($filasConsumos[0]['consumo_d12']*$diasMes,2);
$consumoMes['d14']=round($filasConsumos[0]['consumo_d14']*$diasMes,2);
$consumoMes['d16']=round($filasConsumos[0]['consumo_d16']*$diasMes,2);
$consumoMes['d20']=round($filasConsumos[0]['consumo_d20']*$diasMes,2);
$consumoMes['d25']=round($filasConsumos[0]['consumo_d25']*$diasMes,2);
$consumoMes['d32']=round($filasConsumos[0]['consumo_d32']*$diasMes,2);
$consumoMes['d40']=round($filasConsumos[0]['consumo_d40']*$diasMes,2);

$consumoMes['total'] = array_sum($consumoMes);
$pdf->SetFillColor(240,207,132);


$pdf->Cell(74,4,utf8_decode('Consomation Mois'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d8'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d10'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d12'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d14'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d16'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d20'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d25'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d32'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d40'],'LTBR',0,'C',TRUE);

$pdf->SetFillColor(108,157,221);
$pdf->Cell(17,4,utf8_decode($consumoMes['total']),'LTBR',1,'C',TRUE);

$pdf->SetFillColor(240,207,132);

$pdf->Cell(74,4,utf8_decode('Difference avec Stock Actuel'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d8']-$consumoMes['d8'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d10']-$consumoMes['d10'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d12']-$consumoMes['d12'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d14']-$consumoMes['d14'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d16']-$consumoMes['d16'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d20']-$consumoMes['d20'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d25']-$consumoMes['d25'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d32']-$consumoMes['d32'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d40']-$consumoMes['d40'],'LTBR',0,'C',TRUE);

$pdf->SetFillColor(108,157,221);
$pdf->Cell(17,4,utf8_decode($stockActualTotalBobinas['total']-$consumoMes['total']),'LTBR',1,'C',TRUE);

$pdf->SetFillColor(190,221,252);

$diasStock = [];


$diasStock['d8']=round($stockActualTotal['d8']/$filasConsumos[0]['consumo_d8'],0);
$diasStock['d10']=round($stockActualTotal['d10']/$filasConsumos[0]['consumo_d10'],0);
$diasStock['d12']=round($stockActualTotal['d12']/$filasConsumos[0]['consumo_d12'],0);
$diasStock['d14']=round($stockActualTotal['d14']/$filasConsumos[0]['consumo_d14'],0);
$diasStock['d16']=round($stockActualTotal['d16']/$filasConsumos[0]['consumo_d16'],0);
$diasStock['d20']=round($stockActualTotal['d20']/$filasConsumos[0]['consumo_d20'],0);
$diasStock['d25']=round($stockActualTotal['d25']/$filasConsumos[0]['consumo_d25'],0);
$diasStock['d32']=round($stockActualTotal['d32']/$filasConsumos[0]['consumo_d32'],0);
$diasStock['d40']=round($stockActualTotal['d40']/$filasConsumos[0]['consumo_d40'],0);
$diasStock['total']=round($stockActualTotal['total']/$filasConsumos[0]['total'],0);


$pdf->Cell(74,4,utf8_decode('Jours Stock'),'LTBR',0,'C',TRUE);
($diasStock['d8'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d8'],'LTBR',0,'C',TRUE);
($diasStock['d10'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d10'],'LTBR',0,'C',TRUE);
($diasStock['d12'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d12'],'LTBR',0,'C',TRUE);
($diasStock['d14'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d14'],'LTBR',0,'C',TRUE);
($diasStock['d16'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d16'],'LTBR',0,'C',TRUE);
($diasStock['d20'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d20'],'LTBR',0,'C',TRUE);
($diasStock['d25'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d25'],'LTBR',0,'C',TRUE);
($diasStock['d32'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d32'],'LTBR',0,'C',TRUE);
($diasStock['d40'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d40'],'LTBR',0,'C',TRUE);
($diasStock['total'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['total'],'LTBR',1,'C',TRUE);


$pdf->Cell(74,4,utf8_decode("jusqu'a au"),'LTBR',0,'C',TRUE);
$pdf->SetFont('Helvetica','',8);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d8'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d10'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d12'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d14'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d16'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d20'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d25'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d32'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d40'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['total'].' weekdays')),'LTBR',1,'C',TRUE);

//SEPARADOR CELDA
$pdf->Cell(2,2,utf8_decode(''),'',1,'C');

$pdf->SetFont('Helvetica','B',12);
$pdf->SetFillColor(99,218,64);
$pdf->Cell(74,5,utf8_decode('TOTAL STOCK'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,5,round($TOTALSTOCKEXCEL,1),'LTBR',1,'C',TRUE);




/*  CARES B  

$pdf->AddPage();
$pdf->SetFont('Helvetica','B',10);

//LINEA REFERENCIA
//$pdf->Cell(275,1,utf8_decode(''),'LTBR',1);

//LINEA CABECERA
$pdf->SetFillColor(190,221,252);

$pdf->Cell(70,5,utf8_decode('TERUEL'),'LTB',0,'C',TRUE);
$pdf->Cell(20,5,utf8_decode($fechaBonita),'TBR',0,'C',TRUE);
$pdf->Cell(95,5,utf8_decode(''),'',0);
$pdf->Cell(59,5,utf8_decode('CARES B500C'),'LTBR',0,'C',TRUE);

//UNIDADES IDEA X2 TN DE PESO
$TOTALSTOCKEXCEL = $filasBobIdea[0]['d6_cares_c'] * 2;


$pdf->Cell(15,8,utf8_decode(''),'',1,'C');
//TABLA HA
$totalColumnaFila = 0;

//CABECERA TABLA
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('UNITES HA'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 10'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 12'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 14'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 16'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 20'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 25'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 32'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 40'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('TOTAL'),'LTBR',1,'C',TRUE);


//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BOBINAS B500C'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d8_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d10_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d12_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d14_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d16_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d20_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d25_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d32_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d40_cares_c']),'LTBR',0,'C');
$totalFila =  $filasHA_c[0]['d8_cares_c'] + $filasHA_c[0]['d10_cares_c'] + $filasHA_c[0]['d12_cares_c'] +
$filasHA_c[0]['d14_cares_c'] +
$filasHA_c[0]['d16_cares_c'] +
$filasHA_c[0]['d20_cares_c'] +
$filasHA_c[0]['d25_cares_c'] +
$filasHA_c[0]['d32_cares_c'] +
$filasHA_c[0]['d40_cares_c'];

$totalColumnaFila = $totalColumnaFila + $totalFila;
$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);


//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 12 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d8_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d10_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d12_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d14_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d16_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d20_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d25_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d32_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d40_cares_c']),'LTBR',0,'C');
$totalFila =   $filasHA_c[2]['d8_cares_c'] + $filasHA_c[2]['d10_cares_c'] + $filasHA_c[2]['d12_cares_c'] +
$filasHA_c[2]['d14_cares_c'] +
$filasHA_c[2]['d16_cares_c'] +
$filasHA_c[2]['d20_cares_c'] +
$filasHA_c[2]['d25_cares_c'] +
$filasHA_c[2]['d32_cares_c'] +
$filasHA_c[2]['d40_cares_c'];

$totalColumnaFila = $totalColumnaFila + $totalFila;
$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 14 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d8_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d10_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d12_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d14_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d16_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d20_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d25_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d32_cares_c']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d40_cares_c']),'LTBR',0,'C');
$totalFila =  $filasHA_c[3]['d8_cares_c'] +  $filasHA_c[3]['d10_cares_c'] + $filasHA_c[3]['d12_cares_c'] +
$filasHA_c[3]['d14_cares_c'] +
$filasHA_c[3]['d16_cares_c'] +
$filasHA_c[3]['d20_cares_c'] +
$filasHA_c[3]['d25_cares_c'] +
$filasHA_c[3]['d32_cares_c'] +
$filasHA_c[3]['d40_cares_c'];

$totalColumnaFila = $totalColumnaFila + $totalFila;
$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//CALCULO SUMATORIOS COLUMNA
$sumCold8 = $filasHA_c[0]['d8_cares_c'] +$filasHA_c[3]['d8_cares_c'] +$filasHA_c[2]['d8_cares_c'];
$sumCold10 = $filasHA_c[0]['d10_cares_c'] +$filasHA_c[3]['d10_cares_c'] +$filasHA_c[2]['d10_cares_c'];
$sumCold12 = $filasHA_c[0]['d12_cares_c'] +$filasHA_c[3]['d12_cares_c'] +$filasHA_c[2]['d12_cares_c'];
$sumCold14 = $filasHA_c[0]['d14_cares_c'] +$filasHA_c[3]['d14_cares_c'] +$filasHA_c[2]['d14_cares_c'];
$sumCold16 = $filasHA_c[0]['d16_cares_c'] +$filasHA_c[3]['d16_cares_c'] +$filasHA_c[2]['d16_cares_c'];
$sumCold20 = $filasHA_c[0]['d20_cares_c'] +$filasHA_c[3]['d20_cares_c'] +$filasHA_c[2]['d20_cares_c'];
$sumCold25 = $filasHA_c[0]['d25_cares_c'] +$filasHA_c[3]['d25_cares_c'] +$filasHA_c[2]['d25_cares_c'];
$sumCold32 = $filasHA_c[0]['d32_cares_c'] +$filasHA_c[3]['d32_cares_c'] +$filasHA_c[2]['d32_cares_c'];
$sumCold40 = $filasHA_c[0]['d40_cares_c'] +$filasHA_c[3]['d40_cares_c'] +$filasHA_c[2]['d40_cares_c'];

$totalFila =  $sumCold8 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16 + $sumCold20 + $sumCold25 + $sumCold32 + $sumCold40;

//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('Total'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold8),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold10),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold12),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold14),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold16),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold20),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold25),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold32),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold40),'LTBR',0,'C',TRUE);
$pdf->SetFillColor(108,157,221);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//SEPARADOR CELDA
$pdf->Cell(15,4,utf8_decode(''),'',1,'C');

//SEPARADOR CELDA
$pdf->Cell(15,4,utf8_decode(''),'',1,'C');

//$pdf->AddPage();
$pdf->SetFont('Helvetica','B',10);


//LINEA CABECERA
$pdf->SetFillColor(190,221,252);

$pdf->Cell(70,5,utf8_decode('TERUEL'),'LTB',0,'C',TRUE);
$pdf->Cell(20,5,utf8_decode($fechaBonita),'TBR',1,'C',TRUE);


$pdf->Cell(15,2,utf8_decode(''),'',1,'C');
//TABLA HA
//CABECERA TABLA
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('TONNES HA'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 10'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 12'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 14'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 16'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 20'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 25'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 32'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 40'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('TOTAL'),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BOBINAS B500C'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d8_cares_c'] * $filasHA_c[0]['peso_d8']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d10_cares_c'] * $filasHA_c[0]['peso_d10']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d12_cares_c'] * $filasHA_c[0]['peso_d12']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d14_cares_c'] * $filasHA_c[0]['peso_d14']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d16_cares_c'] * $filasHA_c[0]['peso_d16']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d20_cares_c'] * $filasHA_c[0]['peso_d20']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d25_cares_c'] * $filasHA_c[0]['peso_d25']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d32_cares_c'] * $filasHA_c[0]['peso_d32']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d40_cares_c'] * $filasHA_c[0]['peso_d40']),'LTBR',0,'C');

$totalFila =  
($filasHA_c[0]['d8_cares_c'] * $filasHA_c[0]['peso_d8']) +
($filasHA_c[0]['d10_cares_c'] * $filasHA_c[0]['peso_d10']) +
($filasHA_c[0]['d12_cares_c'] * $filasHA_c[0]['peso_d12']) +
($filasHA_c[0]['d14_cares_c'] * $filasHA_c[0]['peso_d14']) +
($filasHA_c[0]['d16_cares_c'] * $filasHA_c[0]['peso_d16']) +
($filasHA_c[0]['d20_cares_c'] * $filasHA_c[0]['peso_d20']) +
($filasHA_c[0]['d25_cares_c'] * $filasHA_c[0]['peso_d25']) +
($filasHA_c[0]['d32_cares_c'] * $filasHA_c[0]['peso_d32']) +
($filasHA_c[0]['d40_cares_c'] * $filasHA_c[0]['peso_d40']);

$totalColumnaFila = $totalColumnaFila + $totalFila;

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');


//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('TOTAL BOBINAS'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d8_cares_c'] * $filasHA_c[0]['peso_d8']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d10_cares_c'] * $filasHA_c[0]['peso_d10']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d12_cares_c'] * $filasHA_c[0]['peso_d12']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d14_cares_c'] * $filasHA_c[0]['peso_d14']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d16_cares_c'] * $filasHA_c[0]['peso_d16']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d20_cares_c'] * $filasHA_c[0]['peso_d20']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d25_cares_c'] * $filasHA_c[0]['peso_d25']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d32_cares_c'] * $filasHA_c[0]['peso_d32']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d40_cares_c'] * $filasHA_c[0]['peso_d40']),'LTBR',0,'C',TRUE);

$totalFila =  
($filasHA_c[0]['d8_cares_c'] * $filasHA_c[0]['peso_d8']) +
($filasHA_c[0]['d10_cares_c'] * $filasHA_c[0]['peso_d10']) +
($filasHA_c[0]['d12_cares_c'] * $filasHA_c[0]['peso_d12']) +
($filasHA_c[0]['d14_cares_c'] * $filasHA_c[0]['peso_d14']) +
($filasHA_c[0]['d16_cares_c'] * $filasHA_c[0]['peso_d16']) +
($filasHA_c[0]['d20_cares_c'] * $filasHA_c[0]['peso_d20']) +
($filasHA_c[0]['d25_cares_c'] * $filasHA_c[0]['peso_d25']) +
($filasHA_c[0]['d32_cares_c'] * $filasHA_c[0]['peso_d32']) +
($filasHA_c[0]['d40_cares_c'] * $filasHA_c[0]['peso_d40']);

$totalBobinas  = $totalFila;


$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//calculo total bobinas
//CALCULO SUMATORIOS COLUMNA

$sumCold8 = ($filasHA_c[1]['d8_cares_c'] * $filasHA_c[1]['peso_d8']) + ($filasHA_c[2]['d8_cares_c'] * $filasHA_c[2]['peso_d8']) + ($filasHA_c[4]['d8_cares_c'] * $filasHA_c[4]['peso_d8']) ;
$sumCold10 = ($filasHA_c[1]['d10_cares_c'] * $filasHA_c[1]['peso_d10']) + ($filasHA_c[2]['d10_cares_c'] * $filasHA_c[2]['peso_d10']) + ($filasHA_c[4]['d10_cares_c'] * $filasHA_c[4]['peso_d10']) ;
$sumCold12 = ($filasHA_c[1]['d12_cares_c'] * $filasHA_c[1]['peso_d12']) + ($filasHA_c[2]['d12_cares_c'] * $filasHA_c[2]['peso_d12']) + ($filasHA_c[4]['d12_cares_c'] * $filasHA_c[4]['peso_d12']) ;
$sumCold14 = ($filasHA_c[1]['d14_cares_c'] * $filasHA_c[1]['peso_d14']) + ($filasHA_c[2]['d14_cares_c'] * $filasHA_c[2]['peso_d14']) + ($filasHA_c[4]['d14_cares_c'] * $filasHA_c[4]['peso_d14']) ;
$sumCold16 = ($filasHA_c[1]['d16_cares_c'] * $filasHA_c[1]['peso_d16']) + ($filasHA_c[2]['d16_cares_c'] * $filasHA_c[2]['peso_d16']) + ($filasHA_c[4]['d16_cares_c'] * $filasHA_c[4]['peso_d16']) ;
$sumCold20 = ($filasHA_c[1]['d20_cares_c'] * $filasHA_c[1]['peso_d20']) + ($filasHA_c[2]['d20_cares_c'] * $filasHA_c[2]['peso_d20']) + ($filasHA_c[4]['d20_cares_c'] * $filasHA_c[4]['peso_d20']) ;
$sumCold25 = ($filasHA_c[1]['d25_cares_c'] * $filasHA_c[1]['peso_d25']) + ($filasHA_c[2]['d25_cares_c'] * $filasHA_c[2]['peso_d25']) + ($filasHA_c[4]['d25_cares_c'] * $filasHA_c[4]['peso_d25']) ;
$sumCold32 = ($filasHA_c[1]['d32_cares_c'] * $filasHA_c[1]['peso_d32']) + ($filasHA_c[2]['d32_cares_c'] * $filasHA_c[2]['peso_d32']) + ($filasHA_c[4]['d32_cares_c'] * $filasHA_c[4]['peso_d32']) ;
$sumCold40 = ($filasHA_c[1]['d40_cares_c'] * $filasHA_c[1]['peso_d40']) + ($filasHA_c[2]['d40_cares_c'] * $filasHA_c[2]['peso_d40']) + ($filasHA_c[4]['d40_cares_c'] * $filasHA_c[4]['peso_d40']) ;
$totalFila = 0; 
$totalFila =  $sumCold8 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;
$totalBarras = $totalFila;

$totalBarrasBobinas = $totalBobinas + $totalBarras;
$porcenTotalBarras = round(($totalBarras*100)/$totalBarrasBobinas,1);
$porcenTotalBobinas = round(($totalBobinas*100)/$totalBarrasBobinas,1);

//% TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(226,148,87);
$pdf->Cell(74,4,utf8_decode('% Bobines pour Diametre'),'LTBR',0,'C',TRUE);

//($requestVars->_name == '') ? $redText : ''; 

($filasHA_c[0]['d8_cares_c'] > 0) ? $pdf->Cell(17,4,round(($filasHA_c[0]['d8_cares_c'] * $filasHA_c[0]['peso_d8'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA_c[0]['d10_cares_c'] > 0) ? $pdf->Cell(17,4,round(($filasHA_c[0]['d10_cares_c'] * $filasHA_c[0]['peso_d10'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA_c[0]['d12_cares_c'] > 0) ? $pdf->Cell(17,4,round(($filasHA_c[0]['d12_cares_c'] * $filasHA_c[0]['peso_d12'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA_c[0]['d14_cares_c'] > 0) ? $pdf->Cell(17,4,round(($filasHA_c[0]['d14_cares_c'] * $filasHA_c[0]['peso_d14'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA_c[0]['d16_cares_c'] > 0) ? $pdf->Cell(17,4,round(($filasHA_c[0]['d16_cares_c'] * $filasHA_c[0]['peso_d16'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA_c[0]['d20_cares_c'] > 0) ? $pdf->Cell(17,4,round(($filasHA_c[0]['d20_cares_c'] * $filasHA_c[0]['peso_d20'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA_c[0]['d25_cares_c'] > 0) ? $pdf->Cell(17,4,round(($filasHA_c[0]['d25_cares_c'] * $filasHA_c[0]['peso_d25'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA_c[0]['d32_cares_c'] > 0) ? $pdf->Cell(17,4,round(($filasHA_c[0]['d32_cares_c'] * $filasHA_c[0]['peso_d32'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA_c[0]['d40_cares_c'] > 0) ? $pdf->Cell(17,4,round(($filasHA_c[0]['d40_cares_c'] * $filasHA_c[0]['peso_d40'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);


$pdf->Cell(17,4,utf8_decode($porcenTotalBobinas.'%'),'LTBR',1,'C',TRUE);


//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 12 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d8_cares_c'] * $filasHA_c[2]['peso_d8']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d10_cares_c'] * $filasHA_c[2]['peso_d10']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d12_cares_c'] * $filasHA_c[2]['peso_d12']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d14_cares_c'] * $filasHA_c[2]['peso_d14']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d16_cares_c'] * $filasHA_c[2]['peso_d16']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d20_cares_c'] * $filasHA_c[2]['peso_d20']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d25_cares_c'] * $filasHA_c[2]['peso_d25']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d32_cares_c'] * $filasHA_c[2]['peso_d32']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[2]['d40_cares_c'] * $filasHA_c[2]['peso_d40']),'LTBR',0,'C');

$totalFila =  
($filasHA_c[2]['d8_cares_c'] * $filasHA_c[2]['peso_d8']) +
($filasHA_c[2]['d10_cares_c'] * $filasHA_c[2]['peso_d10']) +
($filasHA_c[2]['d12_cares_c'] * $filasHA_c[2]['peso_d12']) +
($filasHA_c[2]['d14_cares_c'] * $filasHA_c[2]['peso_d14']) +
($filasHA_c[2]['d16_cares_c'] * $filasHA_c[2]['peso_d16']) +
($filasHA_c[2]['d20_cares_c'] * $filasHA_c[2]['peso_d20']) +
($filasHA_c[2]['d25_cares_c'] * $filasHA_c[2]['peso_d25']) +
($filasHA_c[2]['d32_cares_c'] * $filasHA_c[2]['peso_d32']) +
($filasHA_c[2]['d40_cares_c'] * $filasHA_c[2]['peso_d40']);

$totalColumnaFila = $totalColumnaFila + $totalFila;

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');
//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 14 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d8_cares_c'] * $filasHA_c[3]['peso_d8']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d10_cares_c'] * $filasHA_c[3]['peso_d10']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d12_cares_c'] * $filasHA_c[3]['peso_d12']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d14_cares_c'] * $filasHA_c[3]['peso_d14']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d16_cares_c'] * $filasHA_c[3]['peso_d16']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d20_cares_c'] * $filasHA_c[3]['peso_d20']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d25_cares_c'] * $filasHA_c[3]['peso_d25']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d32_cares_c'] * $filasHA_c[3]['peso_d32']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[3]['d40_cares_c'] * $filasHA_c[3]['peso_d40']),'LTBR',0,'C');

$totalFila =  
($filasHA_c[3]['d8_cares_c'] * $filasHA_c[3]['peso_d8']) +
($filasHA_c[3]['d10_cares_c'] * $filasHA_c[3]['peso_d10']) +
($filasHA_c[3]['d12_cares_c'] * $filasHA_c[3]['peso_d12']) +
($filasHA_c[3]['d14_cares_c'] * $filasHA_c[3]['peso_d14']) +
($filasHA_c[3]['d16_cares_c'] * $filasHA_c[3]['peso_d16']) +
($filasHA_c[3]['d20_cares_c'] * $filasHA_c[3]['peso_d20']) +
($filasHA_c[3]['d25_cares_c'] * $filasHA_c[3]['peso_d25']) +
($filasHA_c[3]['d32_cares_c'] * $filasHA_c[3]['peso_d32']) +
($filasHA_c[3]['d40_cares_c'] * $filasHA_c[3]['peso_d40']);

$totalColumnaFila = $totalColumnaFila + $totalFila;

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');



//CALCULO SUMATORIOS COLUMNA
$sumCold8 = ($filasHA_c[1]['d8_cares_c'] * $filasHA_c[1]['peso_d8']) + ($filasHA_c[2]['d8_cares_c'] * $filasHA_c[2]['peso_d8']) + ($filasHA_c[3]['d8_cares_c'] * $filasHA_c[3]['peso_d8']) ;
$sumCold10 = ($filasHA_c[1]['d10_cares_c'] * $filasHA_c[1]['peso_d10']) + ($filasHA_c[2]['d10_cares_c'] * $filasHA_c[2]['peso_d10']) + ($filasHA_c[3]['d10_cares_c'] * $filasHA_c[3]['peso_d10']) ;
$sumCold12 = ($filasHA_c[1]['d12_cares_c'] * $filasHA_c[1]['peso_d12']) + ($filasHA_c[2]['d12_cares_c'] * $filasHA_c[2]['peso_d12']) + ($filasHA_c[3]['d12_cares_c'] * $filasHA_c[3]['peso_d12']) ;
$sumCold14 = ($filasHA_c[1]['d14_cares_c'] * $filasHA_c[1]['peso_d14']) + ($filasHA_c[2]['d14_cares_c'] * $filasHA_c[2]['peso_d14']) + ($filasHA_c[3]['d14_cares_c'] * $filasHA_c[3]['peso_d14']) ;
$sumCold16 = ($filasHA_c[1]['d16_cares_c'] * $filasHA_c[1]['peso_d16']) + ($filasHA_c[2]['d16_cares_c'] * $filasHA_c[2]['peso_d16']) + ($filasHA_c[3]['d16_cares_c'] * $filasHA_c[3]['peso_d16']) ;
$sumCold20 = ($filasHA_c[1]['d20_cares_c'] * $filasHA_c[1]['peso_d20']) + ($filasHA_c[2]['d20_cares_c'] * $filasHA_c[2]['peso_d20']) + ($filasHA_c[3]['d20_cares_c'] * $filasHA_c[3]['peso_d20']) ;
$sumCold25 = ($filasHA_c[1]['d25_cares_c'] * $filasHA_c[1]['peso_d25']) + ($filasHA_c[2]['d25_cares_c'] * $filasHA_c[2]['peso_d25']) + ($filasHA_c[3]['d25_cares_c'] * $filasHA_c[3]['peso_d25']) ;
$sumCold32 = ($filasHA_c[1]['d32_cares_c'] * $filasHA_c[1]['peso_d32']) + ($filasHA_c[2]['d32_cares_c'] * $filasHA_c[2]['peso_d32']) + ($filasHA_c[3]['d32_cares_c'] * $filasHA_c[3]['peso_d32']) ;
$sumCold40 = ($filasHA_c[1]['d40_cares_c'] * $filasHA_c[1]['peso_d40']) + ($filasHA_c[2]['d40_cares_c'] * $filasHA_c[2]['peso_d40']) + ($filasHA[3]['d40_cares_c'] * $filasHA[3]['peso_d40']) ;
$totalFila = 0; 
$totalFila = $sumCold6 + $sumCold8 + $sumCold9 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;



//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(74,4,utf8_decode('TOTAL BARRAS'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold8),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold10),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold12),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold14),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold16),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold20),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold25),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold32),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold40),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);


//($requestVars->_name == '') ? $redText : ''; 


$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(226,148,87);
$pdf->Cell(74,4,utf8_decode('% Barres pour Diametre'),'LTBR',0,'C',TRUE);
($sumCold8 > 0) ? $pdf->Cell(17,4,round((100* $sumCold8 )/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold10 > 0) ? $pdf->Cell(17,4,round((100* $sumCold10)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold12 > 0) ? $pdf->Cell(17,4,round((100* $sumCold12)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold14 > 0) ? $pdf->Cell(17,4,round((100* $sumCold14)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold16 > 0) ? $pdf->Cell(17,4,round((100* $sumCold16)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold20 > 0) ? $pdf->Cell(17,4,round((100* $sumCold20)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold25 > 0) ? $pdf->Cell(17,4,round((100* $sumCold25)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold32 > 0) ? $pdf->Cell(17,4,round((100* $sumCold32)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold40 > 0) ? $pdf->Cell(17,4,round((100* $sumCold40)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($porcenTotalBarras.'%'),'LTBR',1,'C',TRUE);


//CALCULO SUMATORIOS COLUMNA
$sumCold8 = ($filasHA_c[0]['d8_cares_c'] * $filasHA_c[0]['peso_d8']) + ($filasHA_c[3]['d8_cares_c'] * $filasHA_c[3]['peso_d8']) + ($filasHA_c[2]['d8_cares_c'] * $filasHA_c[2]['peso_d8']) + ($filasHA_c[4]['d8_cares_c'] * $filasHA_c[4]['peso_d8']) ;
$sumCold10 = ($filasHA_c[0]['d10_cares_c'] * $filasHA_c[0]['peso_d10']) + ($filasHA_c[3]['d10_cares_c'] * $filasHA_c[3]['peso_d10']) + ($filasHA_c[2]['d10_cares_c'] * $filasHA_c[2]['peso_d10']) + ($filasHA_c[4]['d10_cares_c'] * $filasHA_c[4]['peso_d10']) ;
$sumCold12 = ($filasHA_c[0]['d12_cares_c'] * $filasHA_c[0]['peso_d12']) + ($filasHA_c[3]['d12_cares_c'] * $filasHA_c[3]['peso_d12']) + ($filasHA_c[2]['d12_cares_c'] * $filasHA_c[2]['peso_d12']) + ($filasHA_c[4]['d12_cares_c'] * $filasHA_c[4]['peso_d12']) ;
$sumCold14 = ($filasHA_c[0]['d14_cares_c'] * $filasHA_c[0]['peso_d14']) + ($filasHA_c[3]['d14_cares_c'] * $filasHA_c[3]['peso_d14']) + ($filasHA_c[2]['d14_cares_c'] * $filasHA_c[2]['peso_d14']) + ($filasHA_c[4]['d14_cares_c'] * $filasHA_c[4]['peso_d14']) ;
$sumCold16 = ($filasHA_c[0]['d16_cares_c'] * $filasHA_c[0]['peso_d16']) + ($filasHA_c[3]['d16_cares_c'] * $filasHA_c[3]['peso_d16']) + ($filasHA_c[2]['d16_cares_c'] * $filasHA_c[2]['peso_d16']) + ($filasHA_c[4]['d16_cares_c'] * $filasHA_c[4]['peso_d16']) ;
$sumCold20 = ($filasHA_c[0]['d20_cares_c'] * $filasHA_c[0]['peso_d20']) + ($filasHA_c[3]['d20_cares_c'] * $filasHA_c[3]['peso_d20']) + ($filasHA_c[2]['d20_cares_c'] * $filasHA_c[2]['peso_d20']) + ($filasHA_c[4]['d20_cares_c'] * $filasHA_c[4]['peso_d20']) ;
$sumCold25 = ($filasHA_c[0]['d25_cares_c'] * $filasHA_c[0]['peso_d25']) + ($filasHA_c[3]['d25_cares_c'] * $filasHA_c[3]['peso_d25']) + ($filasHA_c[2]['d25_cares_c'] * $filasHA_c[2]['peso_d25']) + ($filasHA_c[4]['d25_cares_c'] * $filasHA_c[4]['peso_d25']) ;
$sumCold32 = ($filasHA_c[0]['d32_cares_c'] * $filasHA_c[0]['peso_d32']) + ($filasHA_c[3]['d32_cares_c'] * $filasHA_c[3]['peso_d32']) + ($filasHA_c[2]['d32_cares_c'] * $filasHA_c[2]['peso_d32']) + ($filasHA_c[4]['d32_cares_c'] * $filasHA_c[4]['peso_d32']) ;
$sumCold40 = ($filasHA_c[0]['d40_cares_c'] * $filasHA_c[0]['peso_d40']) + ($filasHA_c[3]['d40_cares_c'] * $filasHA_c[3]['peso_d40']) + ($filasHA_c[2]['d40_cares_c'] * $filasHA_c[2]['peso_d40']) + ($filasHA_c[4]['d40_cares_c'] * $filasHA_c[4]['peso_d40']) ;
$totalFila = 0; 
$totalFila = $sumCold6 + $sumCold8 + $sumCold9 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;

//% TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(108,157,221);
$pdf->Cell(74,4,utf8_decode('TOTAL'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold8),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold10),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold12),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold14),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold16),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold20),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold25),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold32),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold40),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

$pdf->Cell(74,4,utf8_decode('% Total pour Diametre'),'LTBR',0,'C',TRUE);
($sumCold8 > 0) ? $pdf->Cell(17,4,round((100* $sumCold8 )/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold10 > 0) ? $pdf->Cell(17,4,round((100* $sumCold10)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold12 > 0) ? $pdf->Cell(17,4,round((100* $sumCold12)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold14 > 0) ? $pdf->Cell(17,4,round((100* $sumCold14)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold16 > 0) ? $pdf->Cell(17,4,round((100* $sumCold16)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold20 > 0) ? $pdf->Cell(17,4,round((100* $sumCold20)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold25 > 0) ? $pdf->Cell(17,4,round((100* $sumCold25)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold32 > 0) ? $pdf->Cell(17,4,round((100* $sumCold32)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold40 > 0) ? $pdf->Cell(17,4,round((100* $sumCold40)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('100%'),'LTBR',1,'C',TRUE);


$pdf->SetFillColor(99,218,64);
$pdf->Cell(74,4,utf8_decode('TOTAL HA'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

$TOTALSTOCKEXCEL = $TOTALSTOCKEXCEL + $totalFila;


//SEPARADOR CELDA
$pdf->Cell(15,4,utf8_decode(''),'',1,'C');
//TABLA CONGIGURACION CONSUMOS
//CABECERA TABLA
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('Usine Sendin Spain'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 10'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 12'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 14'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 16'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 20'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 25'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 32'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 40'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('TOTAL'),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->SetFillColor(226,148,87);

$pdf->Cell(74,4,utf8_decode('CONSOMATION JOUR'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d8'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d10'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d12'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d14'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d16'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d20'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d25'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d32'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d40'],2),'LTBR',0,'C',TRUE);
$totalFila = 
 
$filasConsumos_c[0]['consumo_d8'] + 
$filasConsumos_c[0]['consumo_d10'] + 
$filasConsumos_c[0]['consumo_d12'] + 
$filasConsumos_c[0]['consumo_d14'] + 
$filasConsumos_c[0]['consumo_d16'] + 
$filasConsumos_c[0]['consumo_d20'] + 
$filasConsumos_c[0]['consumo_d25'] + 
$filasConsumos_c[0]['consumo_d32'] + 
$filasConsumos_c[0]['consumo_d40'];

$filasConsumos_c[0]['total'] = $totalFila;

$pdf->SetFillColor(108,157,221);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);


$diasMes= 21;

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->SetFillColor(226,148,87);

$pdf->Cell(74,4,utf8_decode('CONSOMATION MOIS'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d8']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d10']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d12']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d14']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d16']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d20']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d25']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d32']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos_c[0]['consumo_d40']*$diasMes,2),'LTBR',0,'C',TRUE);
$totalFila = 
$filasConsumos_c[0]['consumo_d8'] * $diasMes + 
$filasConsumos_c[0]['consumo_d10'] * $diasMes + 
$filasConsumos_c[0]['consumo_d12'] * $diasMes + 
$filasConsumos_c[0]['consumo_d14'] * $diasMes + 
$filasConsumos_c[0]['consumo_d16'] * $diasMes + 
$filasConsumos_c[0]['consumo_d20'] * $diasMes + 
$filasConsumos_c[0]['consumo_d25'] * $diasMes + 
$filasConsumos_c[0]['consumo_d32'] * $diasMes + 
$filasConsumos_c[0]['consumo_d40'] * $diasMes;

$pdf->SetFillColor(108,157,221);
$totalPorcenConsumo = $totalFila;
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);


//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->SetFillColor(226,148,87);

$pdf->Cell(74,4,utf8_decode('% S/TOTAL'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos_c[0]['consumo_d8']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos_c[0]['consumo_d10']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos_c[0]['consumo_d12']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos_c[0]['consumo_d14']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos_c[0]['consumo_d16']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos_c[0]['consumo_d20']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos_c[0]['consumo_d25']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos_c[0]['consumo_d32']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos_c[0]['consumo_d40']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);

$totalFila = 
($filasConsumos_c[0]['consumo_d8']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos_c[0]['consumo_d10']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos_c[0]['consumo_d12']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos_c[0]['consumo_d14']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos_c[0]['consumo_d16']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos_c[0]['consumo_d20']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos_c[0]['consumo_d25']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos_c[0]['consumo_d32']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos_c[0]['consumo_d40']*$diasMes)/$totalPorcenConsumo*100 ;




$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);




//% TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(99,218,64);
$pdf->Cell(74,4,utf8_decode('JOURS MOIS'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($diasMes),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',1,'C');


$stockActualTotal =  [];


//SEPARADOR CELDA
$pdf->Cell(15,4,utf8_decode(''),'',1,'C');
//TABLA CONSUMOS POR DIÁMETROS
//CABECERA TABLA
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('Usine Sendin Spain'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 10'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 12'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 14'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 16'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 20'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 25'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 32'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 40'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('TOTAL'),'LTBR',1,'C',TRUE);

$pdf->Cell(74,4,utf8_decode('Stock Bobines'),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d8_cares_c'] * $filasHA_c[0]['peso_d8']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d10_cares_c'] * $filasHA_c[0]['peso_d10']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d12_cares_c'] * $filasHA_c[0]['peso_d12']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d14_cares_c'] * $filasHA_c[0]['peso_d14']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d16_cares_c'] * $filasHA_c[0]['peso_d16']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d20_cares_c'] * $filasHA_c[0]['peso_d20']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d25_cares_c'] * $filasHA_c[0]['peso_d25']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d32_cares_c'] * $filasHA_c[0]['peso_d32']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA_c[0]['d40_cares_c'] * $filasHA_c[0]['peso_d40']),'LTBR',0,'C');

$totalFila =  
($filasHA_c[0]['d8_cares_c'] * $filasHA_c[0]['peso_d8']) +
($filasHA_c[0]['d10_cares_c'] * $filasHA_c[0]['peso_d10']) +
($filasHA_c[0]['d12_cares_c'] * $filasHA_c[0]['peso_d12']) +
($filasHA_c[0]['d14_cares_c'] * $filasHA_c[0]['peso_d14']) +
($filasHA_c[0]['d16_cares_c'] * $filasHA_c[0]['peso_d16']) +
($filasHA_c[0]['d20_cares_c'] * $filasHA_c[0]['peso_d20']) +
($filasHA_c[0]['d25_cares_c'] * $filasHA_c[0]['peso_d25']) +
($filasHA_c[0]['d32_cares_c'] * $filasHA_c[0]['peso_d32']) +
($filasHA_c[0]['d40_cares_c'] * $filasHA_c[0]['peso_d40']);



$stockBobines['d8'] =  $filasHA_c[0]['d8_cares_c'] * $filasHA_c[0]['peso_d8'];
$stockBobines['d10'] =  $filasHA_c[0]['d10_cares_c'] * $filasHA_c[0]['peso_d10'];
$stockBobines['d12'] =  $filasHA_c[0]['d12_cares_c'] * $filasHA_c[0]['peso_d12'];
$stockBobines['d14'] =  $filasHA_c[0]['d14_cares_c'] * $filasHA_c[0]['peso_d14'];
$stockBobines['d16'] =  $filasHA_c[0]['d16_cares_c'] * $filasHA_c[0]['peso_d16'];
$stockBobines['d20'] =  $filasHA_c[0]['d20_cares_c'] * $filasHA_c[0]['peso_d20'];
$stockBobines['d25'] =  $filasHA_c[0]['d25_cares_c'] * $filasHA_c[0]['peso_d25'];
$stockBobines['d32'] =  $filasHA_c[0]['d32_cares_c'] * $filasHA_c[0]['peso_d32'];
$stockBobines['d40'] =  $filasHA_c[0]['d40_cares_c'] * $filasHA_c[0]['peso_d40'];
$stockBobines['total'] =  $totalFila;



$stockActualTotal['d8'] =  $filasHA_c[0]['d8_cares_c'] * $filasHA_c[0]['peso_d8'];
$stockActualTotal['d10'] =  $filasHA_c[0]['d10_cares_c'] * $filasHA_c[0]['peso_d10'];
$stockActualTotal['d12'] =  $filasHA_c[0]['d12_cares_c'] * $filasHA_c[0]['peso_d12'];
$stockActualTotal['d14'] =  $filasHA_c[0]['d14_cares_c'] * $filasHA_c[0]['peso_d14'];
$stockActualTotal['d16'] =  $filasHA_c[0]['d16_cares_c'] * $filasHA_c[0]['peso_d16'];
$stockActualTotal['d20'] =  $filasHA_c[0]['d20_cares_c'] * $filasHA_c[0]['peso_d20'];
$stockActualTotal['d25'] =  $filasHA_c[0]['d25_cares_c'] * $filasHA_c[0]['peso_d25'];
$stockActualTotal['d32'] =  $filasHA_c[0]['d32_cares_c'] * $filasHA_c[0]['peso_d32'];
$stockActualTotal['d40'] =  $filasHA_c[0]['d40_cares_c'] * $filasHA_c[0]['peso_d40'];
$stockActualTotal['total'] =  $totalFila;


$totalBobinas  = $totalFila;
$pdf->SetFillColor(108,157,221);

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);


//CALCULO SUMATORIOS COLUMNA

$sumCold8 =  ($filasHA_c[1]['d8_cares_c'] * $filasHA_c[1]['peso_d8']) + ($filasHA_c[2]['d8_cares_c'] * $filasHA_c[2]['peso_d8']) + ($filasHA_c[3]['d8_cares_c'] * $filasHA_c[3]['peso_d8']) ;
$sumCold10 =  ($filasHA_c[1]['d10_cares_c'] * $filasHA_c[1]['peso_d10']) + ($filasHA_c[2]['d10_cares_c'] * $filasHA_c[2]['peso_d10']) + ($filasHA_c[3]['d10_cares_c'] * $filasHA_c[3]['peso_d10']) ;
$sumCold12 =  ($filasHA_c[1]['d12_cares_c'] * $filasHA_c[1]['peso_d12']) + ($filasHA_c[2]['d12_cares_c'] * $filasHA_c[2]['peso_d12']) + ($filasHA_c[3]['d12_cares_c'] * $filasHA_c[3]['peso_d12']) ;
$sumCold14 =  ($filasHA_c[1]['d14_cares_c'] * $filasHA_c[1]['peso_d14']) + ($filasHA_c[2]['d14_cares_c'] * $filasHA_c[2]['peso_d14']) + ($filasHA_c[3]['d14_cares_c'] * $filasHA_c[3]['peso_d14']) ;
$sumCold16 = ($filasHA_c[1]['d16_cares_c'] * $filasHA_c[1]['peso_d16']) + ($filasHA_c[2]['d16_cares_c'] * $filasHA_c[2]['peso_d16']) + ($filasHA_c[3]['d16_cares_c'] * $filasHA_c[3]['peso_d16']) ;
$sumCold20 = ($filasHA_c[1]['d20_cares_c'] * $filasHA_c[1]['peso_d20']) + ($filasHA_c[2]['d20_cares_c'] * $filasHA_c[2]['peso_d20']) + ($filasHA_c[3]['d20_cares_c'] * $filasHA_c[3]['peso_d20']) ;
$sumCold25 =  ($filasHA_c[1]['d25_cares_c'] * $filasHA_c[1]['peso_d25']) + ($filasHA_c[2]['d25_cares_c'] * $filasHA_c[2]['peso_d25']) + ($filasHA_c[3]['d25_cares_c'] * $filasHA_c[3]['peso_d25']) ;
$sumCold32 = ($filasHA_c[1]['d32_cares_c'] * $filasHA_c[1]['peso_d32']) + ($filasHA_c[2]['d32_cares_c'] * $filasHA_c[2]['peso_d32']) + ($filasHA_c[3]['d32_cares_c'] * $filasHA_c[3]['peso_d32']) ;
$sumCold40 =  ($filasHA_c[1]['d40_cares_c'] * $filasHA_c[1]['peso_d40']) + ($filasHA_c[2]['d40_cares_c'] * $filasHA_c[2]['peso_d40']) + ($filasHA_c[3]['d40_cares_c'] * $filasHA_c[3]['peso_d40']) ;
$totalFila = 0; 
$totalFila =  $sumCold8 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;


$stockActualTotal['d8'] = $stockActualTotal['d8'] + $sumCold8;
$stockActualTotal['d10'] = $stockActualTotal['d10'] + $sumCold10;
$stockActualTotal['d12'] = $stockActualTotal['d12'] + $sumCold12;
$stockActualTotal['d14'] = $stockActualTotal['d14'] + $sumCold14;
$stockActualTotal['d16'] = $stockActualTotal['d16'] + $sumCold16;
$stockActualTotal['d20'] = $stockActualTotal['d20'] + $sumCold20;
$stockActualTotal['d25'] = $stockActualTotal['d25'] + $sumCold25;
$stockActualTotal['d32'] = $stockActualTotal['d32'] + $sumCold32;
$stockActualTotal['d40'] = $stockActualTotal['d40'] + $sumCold40;
$stockActualTotal['total'] = $stockActualTotal['total'] +  $totalFila;



//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(74,4,utf8_decode('Stock Barres'),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold8,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold10,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold12,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold14,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold16,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold20,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold25,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold32,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold40,0),'LTBR',0,'C');
$pdf->SetFillColor(108,157,221);

$pdf->Cell(17,4,round($totalFila,0),'LTBR',1,'C',TRUE);


//CALCULO SUMATORIOS COLUMNA
$sumCold8 = $filasADX[0]['d8_cares_c']*$filasADX[0]['peso_d8'] + $filasADX[1]['d8_cares_c']*$filasADX[1]['peso_d8'] + $filasADX[2]['d8_cares_c']*$filasADX[2]['peso_d8'];
$sumCold10 = $filasADX[0]['d10_cares_c']*$filasADX[0]['peso_d10'] + $filasADX[1]['d10_cares_c']*$filasADX[1]['peso_d10'] + $filasADX[2]['d10_cares_c']*$filasADX[2]['peso_d10'];
$sumCold12 = $filasADX[0]['d12_cares_c']*$filasADX[0]['peso_d12'] + $filasADX[1]['d12_cares_c']*$filasADX[1]['peso_d12'] + $filasADX[2]['d12_cares_c']*$filasADX[2]['peso_d12'];
$sumCold14 = $filasADX[0]['d14_cares_c']*$filasADX[0]['peso_d14'] + $filasADX[1]['d14_cares_c']*$filasADX[1]['peso_d14'] + $filasADX[2]['d14_cares_c']*$filasADX[2]['peso_d14'];
$sumCold16 = $filasADX[0]['d16_cares_c']*$filasADX[0]['peso_d16'] + $filasADX[1]['d16_cares_c']*$filasADX[1]['peso_d16'] + $filasADX[2]['d16_cares_c']*$filasADX[2]['peso_d16'];
$sumCold20 = $filasADX[0]['d20_cares_c']*$filasADX[0]['peso_d20'] + $filasADX[1]['d20_cares_c']*$filasADX[1]['peso_d20'] + $filasADX[2]['d20_cares_c']*$filasADX[2]['peso_d20'];
$sumCold25 = $filasADX[0]['d25_cares_c']*$filasADX[0]['peso_d25'] + $filasADX[1]['d25_cares_c']*$filasADX[1]['peso_d25'] + $filasADX[2]['d25_cares_c']*$filasADX[2]['peso_d25'];
$sumCold32 = $filasADX[0]['d32_cares_c']*$filasADX[0]['peso_d32'] + $filasADX[1]['d32_cares_c']*$filasADX[1]['peso_d32'] + $filasADX[2]['d32_cares_c']*$filasADX[2]['peso_d32'];
$sumCold40 = $filasADX[0]['d40_cares_c']*$filasADX[0]['peso_d40'] + $filasADX[1]['d40_cares_c']*$filasADX[1]['peso_d40'] + $filasADX[2]['d40_cares_c']*$filasADX[2]['peso_d40'];
$totalFila = 0; 
$totalFila = $sumCold8 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;


$stockActualTotalBobinas['d8'] = $stockActualTotal['d8'];
$stockActualTotalBobinas['d10'] = $stockActualTotal['d10'];
$stockActualTotalBobinas['d12'] = $stockActualTotal['d12'];
$stockActualTotalBobinas['d14'] = $stockActualTotal['d14'];
$stockActualTotalBobinas['d16'] = $stockActualTotal['d16'];
$stockActualTotalBobinas['d20'] = $stockActualTotal['d20'];
$stockActualTotalBobinas['d25'] = $stockActualTotal['d25'];
$stockActualTotalBobinas['d32'] = $stockActualTotal['d32'];
$stockActualTotalBobinas['d40'] = $stockActualTotal['d40'];
$stockActualTotalBobinas['total'] = $stockActualTotal['total'];

$stockActualTotal['d8'] = $stockActualTotal['d8'] + $sumCold8;
$stockActualTotal['d10'] = $stockActualTotal['d10'] + $sumCold10;
$stockActualTotal['d12'] = $stockActualTotal['d12'] + $sumCold12;
$stockActualTotal['d14'] = $stockActualTotal['d14'] + $sumCold14;
$stockActualTotal['d16'] = $stockActualTotal['d16'] + $sumCold16;
$stockActualTotal['d20'] = $stockActualTotal['d20'] + $sumCold20;
$stockActualTotal['d25'] = $stockActualTotal['d25'] + $sumCold25;
$stockActualTotal['d32'] = $stockActualTotal['d32'] + $sumCold32;
$stockActualTotal['d40'] = $stockActualTotal['d40'] + $sumCold40;
$stockActualTotal['total'] = $stockActualTotal['total'] +  $totalFila;


//% TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(108,157,221);
$pdf->Cell(74,4,utf8_decode('STOCK ACTUELTotal'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d8'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d10'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d12'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d14'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d16'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d20'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d25'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d32'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d40'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['total'],0),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->SetFillColor(226,148,87);


$consumoMes = [];


$consumoMes['d8']=round($filasConsumos_c[0]['consumo_d8']*$diasMes,2);
$consumoMes['d10']=round($filasConsumos_c[0]['consumo_d10']*$diasMes,2);
$consumoMes['d12']=round($filasConsumos_c[0]['consumo_d12']*$diasMes,2);
$consumoMes['d14']=round($filasConsumos_c[0]['consumo_d14']*$diasMes,2);
$consumoMes['d16']=round($filasConsumos_c[0]['consumo_d16']*$diasMes,2);
$consumoMes['d20']=round($filasConsumos_c[0]['consumo_d20']*$diasMes,2);
$consumoMes['d25']=round($filasConsumos_c[0]['consumo_d25']*$diasMes,2);
$consumoMes['d32']=round($filasConsumos_c[0]['consumo_d32']*$diasMes,2);
$consumoMes['d40']=round($filasConsumos_c[0]['consumo_d40']*$diasMes,2);

$consumoMes['total'] = array_sum($consumoMes);
$pdf->SetFillColor(240,207,132);


$pdf->Cell(74,4,utf8_decode('Consomation Mois'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d8'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d10'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d12'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d14'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d16'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d20'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d25'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d32'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d40'],'LTBR',0,'C',TRUE);

$pdf->SetFillColor(108,157,221);
$pdf->Cell(17,4,utf8_decode($consumoMes['total']),'LTBR',1,'C',TRUE);

$pdf->SetFillColor(240,207,132);

$pdf->Cell(74,4,utf8_decode('Difference avec Stock Actuel'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d8']-$consumoMes['d8'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d10']-$consumoMes['d10'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d12']-$consumoMes['d12'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d14']-$consumoMes['d14'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d16']-$consumoMes['d16'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d20']-$consumoMes['d20'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d25']-$consumoMes['d25'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d32']-$consumoMes['d32'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d40']-$consumoMes['d40'],'LTBR',0,'C',TRUE);

$pdf->SetFillColor(108,157,221);
$pdf->Cell(17,4,utf8_decode($stockActualTotalBobinas['total']-$consumoMes['total']),'LTBR',1,'C',TRUE);

$pdf->SetFillColor(190,221,252);

$diasStock = [];


$diasStock['d8']=round($stockActualTotal['d8']/$filasConsumos_c[0]['consumo_d8'],0);
$diasStock['d10']=round($stockActualTotal['d10']/$filasConsumos_c[0]['consumo_d10'],0);
$diasStock['d12']=round($stockActualTotal['d12']/$filasConsumos_c[0]['consumo_d12'],0);
$diasStock['d14']=round($stockActualTotal['d14']/$filasConsumos_c[0]['consumo_d14'],0);
$diasStock['d16']=round($stockActualTotal['d16']/$filasConsumos_c[0]['consumo_d16'],0);
$diasStock['d20']=round($stockActualTotal['d20']/$filasConsumos_c[0]['consumo_d20'],0);
$diasStock['d25']=round($stockActualTotal['d25']/$filasConsumos_c[0]['consumo_d25'],0);
$diasStock['d32']=round($stockActualTotal['d32']/$filasConsumos_c[0]['consumo_d32'],0);
$diasStock['d40']=round($stockActualTotal['d40']/$filasConsumos_c[0]['consumo_d40'],0);
$diasStock['total']=round($stockActualTotal['total']/$filasConsumos_c[0]['total'],0);


$pdf->Cell(74,4,utf8_decode('Jours Stock'),'LTBR',0,'C',TRUE);
($diasStock['d8'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d8'],'LTBR',0,'C',TRUE);
($diasStock['d10'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d10'],'LTBR',0,'C',TRUE);
($diasStock['d12'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d12'],'LTBR',0,'C',TRUE);
($diasStock['d14'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d14'],'LTBR',0,'C',TRUE);
($diasStock['d16'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d16'],'LTBR',0,'C',TRUE);
($diasStock['d20'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d20'],'LTBR',0,'C',TRUE);
($diasStock['d25'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d25'],'LTBR',0,'C',TRUE);
($diasStock['d32'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d32'],'LTBR',0,'C',TRUE);
($diasStock['d40'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d40'],'LTBR',0,'C',TRUE);
($diasStock['total'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['total'],'LTBR',1,'C',TRUE);


$pdf->Cell(74,4,utf8_decode("jusqu'a au"),'LTBR',0,'C',TRUE);
$pdf->SetFont('Helvetica','',8);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d8'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d10'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d12'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d14'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d16'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d20'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d25'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d32'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d40'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['total'].' weekdays')),'LTBR',1,'C',TRUE);

//SEPARADOR CELDA
$pdf->Cell(2,2,utf8_decode(''),'',1,'C');

$pdf->SetFont('Helvetica','B',12);
$pdf->SetFillColor(99,218,64);
$pdf->Cell(74,5,utf8_decode('TOTAL STOCK'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,5,round($TOTALSTOCKEXCEL,1),'LTBR',1,'C',TRUE);
*/

$pdf->Output();

?>