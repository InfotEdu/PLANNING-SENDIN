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

$sqlHA = "select `sm`.`nom_articulo` AS `nom_articulo`,
`sm`.`d6_spain` AS `d6_spain`,`sad6`.`peso_paquete` AS `peso_d6`,
`sm`.`d8_spain` AS `d8_spain`,`sast20`.`peso_paquete` AS `peso_d8`,
`sm`.`d9_spain` AS `d9_spain`,`sast25`.`peso_paquete` AS `peso_d9`,
`sm`.`d10_spain` AS `d10_spain`,`sad10`.`peso_paquete` AS `peso_d10`,
`sm`.`d12_spain` AS `d12_spain`,`sad12`.`peso_paquete` AS `peso_d12`,
`sm`.`d14_spain` AS `d14_spain`,`sad14`.`peso_paquete` AS `peso_d14`,
`sm`.`d16_spain` AS `d16_spain`,`sast50`.`peso_paquete` AS `peso_d16`,
`sm`.`d20_spain` AS `d20_spain`,`sad20`.`peso_paquete` AS `peso_d20`,
`sm`.`d25_spain` AS `d25_spain`,`sad25`.`peso_paquete` AS `peso_d25`,
`sm`.`d32_spain` AS `d32_spain`,`sad32`.`peso_paquete` AS `peso_d32`,
`sm`.`d40_spain` AS `d40_spain`,`sad40`.`peso_paquete` AS `peso_d40`,
`sm`.`d6_chilly` AS `d6_chilly`,
`sm`.`d8_chilly` AS `d8_chilly`,
`sm`.`d9_chilly` AS `d9_chilly`,
`sm`.`d10_chilly` AS `d10_chilly`,
`sm`.`d12_chilly` AS `d12_chilly`,
`sm`.`d14_chilly` AS `d14_chilly`,
`sm`.`d16_chilly` AS `d16_chilly`,
`sm`.`d20_chilly` AS `d20_chilly`,
`sm`.`d25_chilly` AS `d25_chilly`,
`sm`.`d32_chilly` AS `d32_chilly`,
`sm`.`d40_chilly` AS `d40_chilly` 
from (((((((((((`sen_stock_mat` `sm` 
join `sen_stock_art` `sad6` on(`sad6`.`id_articulo` = `sm`.`id_articulo` and `sad6`.`formato` = 'd6_spain')) 
join `sen_stock_art` `sast20` on(`sast20`.`id_articulo` = `sm`.`id_articulo` and `sast20`.`formato` = 'd8_spain')) 
join `sen_stock_art` `sast25` on(`sast25`.`id_articulo` = `sm`.`id_articulo` and `sast25`.`formato` = 'd9_spain')) 
join `sen_stock_art` `sad10` on(`sad10`.`id_articulo` = `sm`.`id_articulo` and `sad10`.`formato` = 'd10_spain')) 
join `sen_stock_art` `sad12` on(`sad12`.`id_articulo` = `sm`.`id_articulo` and `sad12`.`formato` = 'd12_spain')) 
join `sen_stock_art` `sad14` on(`sad14`.`id_articulo` = `sm`.`id_articulo` and `sad14`.`formato` = 'd14_spain')) 
join `sen_stock_art` `sast50` on(`sast50`.`id_articulo` = `sm`.`id_articulo` and `sast50`.`formato` = 'd16_spain')) 
join `sen_stock_art` `sad20` on(`sad20`.`id_articulo` = `sm`.`id_articulo` and `sad20`.`formato` = 'd20_spain')) 
join `sen_stock_art` `sad25` on(`sad25`.`id_articulo` = `sm`.`id_articulo` and `sad25`.`formato` = 'd25_spain')) 
join `sen_stock_art` `sad32` on(`sad32`.`id_articulo` = `sm`.`id_articulo` and `sad32`.`formato` = 'd32_spain')) 
join `sen_stock_art` `sad40` on(`sad40`.`id_articulo` = `sm`.`id_articulo` and `sad40`.`formato` = 'd40_spain')) 
where `sm`.`fecha` = '".$fecha."' and `sm`.`familia` = 1 order by `sm`.`orden`";


$resultDataHA = mysqli_query($con,$sqlHA);


while($row = $resultDataHA->fetch_array(MYSQLI_ASSOC)) { $filasHA[] = $row; }

$sqlADX = "select `sm`.`nom_articulo` AS `nom_articulo`,`sm`.`d6_spain` AS `d6_spain`,`sad6`.`peso_paquete` AS `peso_d6`,`sm`.`d8_spain` AS `d8_spain`,`sast20`.`peso_paquete` AS `peso_d8`,`sm`.`d9_spain` AS `d9_spain`,`sast25`.`peso_paquete` AS `peso_d9`,`sm`.`d10_spain` AS `d10_spain`,`sad10`.`peso_paquete` AS `peso_d10`,`sm`.`d12_spain` AS `d12_spain`,`sad12`.`peso_paquete` AS `peso_d12`,`sm`.`d14_spain` AS `d14_spain`,`sad14`.`peso_paquete` AS `peso_d14`,`sm`.`d16_spain` AS `d16_spain`,`sast50`.`peso_paquete` AS `peso_d16`,`sm`.`d20_spain` AS `d20_spain`,`sad20`.`peso_paquete` AS `peso_d20`,`sm`.`d25_spain` AS `d25_spain`,`sad25`.`peso_paquete` AS `peso_d25`,`sm`.`d32_spain` AS `d32_spain`,`sad32`.`peso_paquete` AS `peso_d32`,`sm`.`d40_spain` AS `d40_spain`,`sad40`.`peso_paquete` AS `peso_d40`,`sm`.`d6_chilly` AS `d6_chilly`,`sm`.`d8_chilly` AS `d8_chilly`,`sm`.`d9_chilly` AS `d9_chilly`,`sm`.`d10_chilly` AS `d10_chilly`,`sm`.`d12_chilly` AS `d12_chilly`,`sm`.`d14_chilly` AS `d14_chilly`,`sm`.`d16_chilly` AS `d16_chilly`,`sm`.`d20_chilly` AS `d20_chilly`,`sm`.`d25_chilly` AS `d25_chilly`,`sm`.`d32_chilly` AS `d32_chilly`,`sm`.`d40_chilly` AS `d40_chilly` from (((((((((((`sen_stock_mat` `sm` join `sen_stock_art` `sad6` on(`sad6`.`id_articulo` = `sm`.`id_articulo` and `sad6`.`formato` = 'd6_spain')) join `sen_stock_art` `sast20` on(`sast20`.`id_articulo` = `sm`.`id_articulo` and `sast20`.`formato` = 'd8_spain')) join `sen_stock_art` `sast25` on(`sast25`.`id_articulo` = `sm`.`id_articulo` and `sast25`.`formato` = 'd9_spain')) join `sen_stock_art` `sad10` on(`sad10`.`id_articulo` = `sm`.`id_articulo` and `sad10`.`formato` = 'd10_spain')) join `sen_stock_art` `sad12` on(`sad12`.`id_articulo` = `sm`.`id_articulo` and `sad12`.`formato` = 'd12_spain')) join `sen_stock_art` `sad14` on(`sad14`.`id_articulo` = `sm`.`id_articulo` and `sad14`.`formato` = 'd14_spain')) join `sen_stock_art` `sast50` on(`sast50`.`id_articulo` = `sm`.`id_articulo` and `sast50`.`formato` = 'd16_spain')) join `sen_stock_art` `sad20` on(`sad20`.`id_articulo` = `sm`.`id_articulo` and `sad20`.`formato` = 'd20_spain')) join `sen_stock_art` `sad25` on(`sad25`.`id_articulo` = `sm`.`id_articulo` and `sad25`.`formato` = 'd25_spain')) join `sen_stock_art` `sad32` on(`sad32`.`id_articulo` = `sm`.`id_articulo` and `sad32`.`formato` = 'd32_spain')) join `sen_stock_art` `sad40` on(`sad40`.`id_articulo` = `sm`.`id_articulo` and `sad40`.`formato` = 'd40_spain')) where `sm`.`fecha` = '".$fecha."' and `sm`.`familia` = 2 order by `sm`.`orden`";

$resultDataADX = mysqli_query($con,$sqlADX);


while($row = $resultDataADX->fetch_array(MYSQLI_ASSOC)) { $filasADX[] = $row; }


$sqlTrellis = "select `sm`.`nom_articulo` AS `nom_articulo`,`sm`.`paf10_spain` AS `paf10_spain`,`sapaf10`.`peso_paquete` AS `peso_paf10`,`sm`.`st20_spain` AS `st20_spain`,`sast20`.`peso_paquete` AS `peso_st20`,`sm`.`st25_spain` AS `st25_spain`,`sast25`.`peso_paquete` AS `peso_st25`,`sm`.`st25c_spain` AS `st25c_spain`,`sast25c`.`peso_paquete` AS `peso_st25c`,`sm`.`st35_spain` AS `st35_spain`,`sast35`.`peso_paquete` AS `peso_st35`,`sm`.`st40c_spain` AS `st40c_spain`,`sast40c`.`peso_paquete` AS `peso_st40c`,`sm`.`st50_spain` AS `st50_spain`,`sast50`.`peso_paquete` AS `peso_st50`,`sm`.`st50c_spain` AS `st50c_spain`,`sast50c`.`peso_paquete` AS `peso_st50c`,`sm`.`st60_spain` AS `st60_spain`,`sast60`.`peso_paquete` AS `peso_st60`,`sm`.`st65c_spain` AS `st65c_spain`,`sast65c`.`peso_paquete` AS `peso_st65c`,`sm`.`st15c_spain` AS `st15c_spain`,`sast15c`.`peso_paquete` AS `peso_st15c`,`sm`.`paf10_chilly` AS `paf10_chilly`,`sm`.`st20_chilly` AS `st20_chilly`,`sm`.`st25_chilly` AS `st25_chilly`,`sm`.`st25c_chilly` AS `st25c_chilly`,`sm`.`st35_chilly` AS `st35_chilly`,`sm`.`st40c_chilly` AS `st40c_chilly`,`sm`.`st50_chilly` AS `st50_chilly`,`sm`.`st50c_chilly` AS `st50c_chilly`,`sm`.`st60_chilly` AS `st60_chilly`,`sm`.`st65c_chilly` AS `st65c_chilly`,`sm`.`st15c_chilly` AS `st15c_chilly` from (((((((((((`sen_stock_mat` `sm` join `sen_stock_art` `sapaf10` on(`sapaf10`.`id_articulo` = `sm`.`id_articulo` and `sapaf10`.`formato` = 'paf10_spain')) join `sen_stock_art` `sast20` on(`sast20`.`id_articulo` = `sm`.`id_articulo` and `sast20`.`formato` = 'st20_spain')) join `sen_stock_art` `sast25` on(`sast25`.`id_articulo` = `sm`.`id_articulo` and `sast25`.`formato` = 'st25_spain')) join `sen_stock_art` `sast25c` on(`sast25c`.`id_articulo` = `sm`.`id_articulo` and `sast25c`.`formato` = 'st25c_spain')) join `sen_stock_art` `sast35` on(`sast35`.`id_articulo` = `sm`.`id_articulo` and `sast35`.`formato` = 'st35_spain')) join `sen_stock_art` `sast40c` on(`sast40c`.`id_articulo` = `sm`.`id_articulo` and `sast40c`.`formato` = 'st40c_spain')) join `sen_stock_art` `sast50` on(`sast50`.`id_articulo` = `sm`.`id_articulo` and `sast50`.`formato` = 'st50_spain')) join `sen_stock_art` `sast50c` on(`sast50c`.`id_articulo` = `sm`.`id_articulo` and `sast50c`.`formato` = 'st50c_spain')) join `sen_stock_art` `sast60` on(`sast60`.`id_articulo` = `sm`.`id_articulo` and `sast60`.`formato` = 'st60_spain')) join `sen_stock_art` `sast65c` on(`sast65c`.`id_articulo` = `sm`.`id_articulo` and `sast65c`.`formato` = 'st65c_spain')) join `sen_stock_art` `sast15c` on(`sast15c`.`id_articulo` = `sm`.`id_articulo` and `sast15c`.`formato` = 'st15c_spain')) where `sm`.`fecha` = '".$fecha."' order by `sm`.`orden`";

$resultDataTrellis = mysqli_query($con,$sqlTrellis);


while($row = $resultDataTrellis->fetch_array(MYSQLI_ASSOC)) { $filasTrellis[] = $row; }

$sqlCouplers = "select `sm`.`nom_articulo` AS `nom_articulo`,`sm`.`c12_spain` AS `c12_spain`,`sac12`.`peso_paquete` AS `peso_c12`,`sm`.`c14_spain` AS `c14_spain`,`sac14`.`peso_paquete` AS `peso_c14`,`sm`.`c16_spain` AS `c16_spain`,`sac16`.`peso_paquete` AS `peso_c16`,`sm`.`c20_spain` AS `c20_spain`,`sac20`.`peso_paquete` AS `peso_c20`,`sm`.`c26_spain` AS `c26_spain`,`sac26`.`peso_paquete` AS `peso_c26`,`sm`.`c32_spain` AS `c32_spain`,`sac32`.`peso_paquete` AS `peso_c32`,`sm`.`c40_spain` AS `c40_spain`,`sac40`.`peso_paquete` AS `peso_c40`,`sm`.`c12_chilly` AS `c12_chilly`,`sm`.`c14_chilly` AS `c14_chilly`,`sm`.`c16_chilly` AS `c16_chilly`,`sm`.`c20_chilly` AS `c20_chilly`,`sm`.`c26_chilly` AS `c26_chilly`,`sm`.`c32_chilly` AS `c32_chilly`,`sm`.`c40_chilly` AS `c40_chilly` from (((((((`sen_stock_mat` `sm` join `sen_stock_art` `sac12` on(`sac12`.`id_articulo` = `sm`.`id_articulo` and `sac12`.`formato` = 'c12_spain')) join `sen_stock_art` `sac14` on(`sac14`.`id_articulo` = `sm`.`id_articulo` and `sac14`.`formato` = 'c14_spain')) join `sen_stock_art` `sac16` on(`sac16`.`id_articulo` = `sm`.`id_articulo` and `sac16`.`formato` = 'c16_spain')) join `sen_stock_art` `sac20` on(`sac20`.`id_articulo` = `sm`.`id_articulo` and `sac20`.`formato` = 'c20_spain')) join `sen_stock_art` `sac26` on(`sac26`.`id_articulo` = `sm`.`id_articulo` and `sac26`.`formato` = 'c26_spain')) join `sen_stock_art` `sac32` on(`sac32`.`id_articulo` = `sm`.`id_articulo` and `sac32`.`formato` = 'c32_spain')) join `sen_stock_art` `sac40` on(`sac40`.`id_articulo` = `sm`.`id_articulo` and `sac40`.`formato` = 'c40_spain')) where `sm`.`fecha` = '".$fecha."' order by `sm`.`orden`";

$resultDataCouplers = mysqli_query($con,$sqlCouplers);


while($row = $resultDataCouplers->fetch_array(MYSQLI_ASSOC)) { $filasCouplers[] = $row; }

$sqlAttentes = "select `sm`.`nom_articulo` AS `nom_articulo`,`sm`.`sec_ha8_spain` AS `sec_ha8_spain`,`sm`.`sec_ha10_spain` AS `sec_ha10_spain`,`sm`.`sec_8_spain` AS `sec_8_spain`,`sm`.`sec_10_spain` AS `sec_10_spain`,`sm`.`sec_ha8_chilly` AS `sec_ha8_chilly`,`sm`.`sec_ha10_chilly` AS `sec_ha10_chilly`,`sm`.`sec_8_chilly` AS `sec_8_chilly`,`sm`.`sec_10_chilly` AS `sec_10_chilly` from `sen_stock_mat` `sm` where `sm`.`fecha` = '".$fecha."' and `sm`.`familia` = 5 order by `sm`.`orden`";

$resultDataAttentes = mysqli_query($con,$sqlAttentes);


while($row = $resultDataAttentes->fetch_array(MYSQLI_ASSOC)) { $filasAttentes[] = $row; }

$sqlVoile = "select `sm`.`nom_articulo` AS `nom_articulo`,`sm`.`sec_a4_spain` AS `sec_a4_spain`,`sm`.`poutre_ha8_spain` AS `poutre_ha8_spain`,`sm`.`poutre_ha10_spain` AS `poutre_ha10_spain`,`sm`.`sec_a4_chilly` AS `sec_a4_chilly`,`sm`.`poutre_ha8_chilly` AS `poutre_ha8_chilly`,`sm`.`poutre_ha10_chilly` AS `poutre_ha10_chilly` from `planningSendin`.`sen_stock_mat` `sm` where `sm`.`fecha` = '".$fecha."' and `sm`.`familia` = 6 order by `sm`.`orden`";

$resultDataVoile = mysqli_query($con,$sqlVoile);


while($row = $resultDataVoile->fetch_array(MYSQLI_ASSOC)) { $filasVoile[] = $row; }


$sqlConsumos = "SELECT 
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd6_spain' limit 1) as consumo_d6,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd8_spain' limit 1) as consumo_d8,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd9_spain' limit 1) as consumo_d9,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd10_spain' limit 1) as consumo_d10,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd12_spain' limit 1) as consumo_d12,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd14_spain' limit 1) as consumo_d14,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd16_spain' limit 1) as consumo_d16,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd20_spain' limit 1) as consumo_d20,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd25_spain' limit 1) as consumo_d25,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd32_spain' limit 1) as consumo_d32,
(SELECT `consumo` FROM `sen_stock_art` WHERE `formato` like 'd40_spain' limit 1) as consumo_d40
FROM sen_stock_art
Limit 1";

$resultDataConsumos = mysqli_query($con,$sqlConsumos);


while($row = $resultDataConsumos->fetch_array(MYSQLI_ASSOC)) { $filasConsumos[] = $row; }

$sqlBobIdea = "select `nom_articulo` AS `nom_articulo`, `d6_spain` AS `d6_spain`,`d6_chilly` AS `d6_chilly` FROM sen_stock_mat where `fecha` = '$fecha' and `familia` = 7";

$resultDataBobIdea = mysqli_query($con,$sqlBobIdea);


while($row = $resultDataBobIdea->fetch_array(MYSQLI_ASSOC)) { $filasBobIdea[] = $row; }


define('EURO',chr(128));

// echo($row['fecha']);
// FPDF

require('../fpdf/fpdf.php');

$pdf = new FPDF('L','mm');
$pdf->AddPage();
$pdf->SetFont('Helvetica','B',10);

//LINEA REFERENCIA
//$pdf->Cell(275,1,utf8_decode(''),'LTBR',1);

//LINEA CABECERA
$pdf->SetFillColor(190,221,252);

$pdf->Cell(70,5,utf8_decode('TERUEL AFCAB'),'LTB',0,'C',TRUE);
$pdf->Cell(20,5,utf8_decode($fechaBonita),'TBR',0,'C',TRUE);
$pdf->Cell(95,5,utf8_decode(''),'',0);
$pdf->Cell(30,5,utf8_decode('BOBINAS IDEA'),'LTBR',0,'C',TRUE);
$pdf->Cell(15,5,utf8_decode($filasBobIdea[0]['d6_spain']),'LTBR',1,'C',FALSE);

//UNIDADES IDEA X2 TN DE PESO
$TOTALSTOCKEXCEL = $filasBobIdea[0]['d6_spain'] * 2;


$pdf->Cell(15,2,utf8_decode(''),'',1,'C');
//TABLA HA
$totalColumnaFila = 0;

//CABECERA TABLA
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('UNITES HA'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 6'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 9'),'LTBR',0,'C',TRUE);
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
$pdf->Cell(74,4,utf8_decode('BOBINAS B500B'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d6_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d8_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d9_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d10_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d12_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d14_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d16_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d20_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d25_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d32_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d40_spain']),'LTBR',0,'C');
$totalFila =  $filasHA[0]['d6_spain'] + $filasHA[0]['d8_spain'] + $filasHA[0]['d9_spain'] + $filasHA[0]['d10_spain'] + $filasHA[0]['d12_spain'] +
$filasHA[0]['d14_spain'] +
$filasHA[0]['d16_spain'] +
$filasHA[0]['d20_spain'] +
$filasHA[0]['d25_spain'] +
$filasHA[0]['d32_spain'] +
$filasHA[0]['d40_spain'];

$totalColumnaFila = $totalColumnaFila + $totalFila;
$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 6 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d6_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d8_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d9_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d10_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d12_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d14_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d16_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d20_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d25_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d32_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d40_spain']),'LTBR',0,'C');
$totalFila =  $filasHA[1]['d6_spain'] + $filasHA[1]['d8_spain'] + $filasHA[1]['d9_spain'] + $filasHA[1]['d10_spain'] + $filasHA[1]['d12_spain'] +
$filasHA[1]['d14_spain'] +
$filasHA[1]['d16_spain'] +
$filasHA[1]['d20_spain'] +
$filasHA[1]['d25_spain'] +
$filasHA[1]['d32_spain'] +
$filasHA[1]['d40_spain'];

$totalColumnaFila = $totalColumnaFila + $totalFila;
$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 12 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d6_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d8_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d9_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d10_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d12_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d14_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d16_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d20_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d25_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d32_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d40_spain']),'LTBR',0,'C');
$totalFila =  $filasHA[2]['d6_spain'] + $filasHA[2]['d8_spain'] + $filasHA[2]['d9_spain'] + $filasHA[2]['d10_spain'] + $filasHA[2]['d12_spain'] +
$filasHA[2]['d14_spain'] +
$filasHA[2]['d16_spain'] +
$filasHA[2]['d20_spain'] +
$filasHA[2]['d25_spain'] +
$filasHA[2]['d32_spain'] +
$filasHA[2]['d40_spain'];

$totalColumnaFila = $totalColumnaFila + $totalFila;
$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 14 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d6_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d8_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d9_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d10_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d12_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d14_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d16_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d20_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d25_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d32_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d40_spain']),'LTBR',0,'C');
$totalFila =  $filasHA[3]['d6_spain'] + $filasHA[3]['d8_spain'] + $filasHA[3]['d9_spain'] + $filasHA[3]['d10_spain'] + $filasHA[3]['d12_spain'] +
$filasHA[3]['d14_spain'] +
$filasHA[3]['d16_spain'] +
$filasHA[3]['d20_spain'] +
$filasHA[3]['d25_spain'] +
$filasHA[3]['d32_spain'] +
$filasHA[3]['d40_spain'];

$totalColumnaFila = $totalColumnaFila + $totalFila;
$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 16 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d6_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d8_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d9_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d10_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d12_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d14_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d16_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d20_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d25_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d32_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d40_spain']),'LTBR',0,'C');
$totalFila =  $filasHA[4]['d6_spain'] + $filasHA[4]['d8_spain'] + $filasHA[4]['d9_spain'] + $filasHA[4]['d10_spain'] + $filasHA[4]['d12_spain'] +
$filasHA[4]['d14_spain'] +
$filasHA[4]['d16_spain'] +
$filasHA[4]['d20_spain'] +
$filasHA[4]['d25_spain'] +
$filasHA[4]['d32_spain'] +
$filasHA[4]['d40_spain'];

$totalColumnaFila = $totalColumnaFila + $totalFila;
$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//CALCULO SUMATORIOS COLUMNA
$sumCold6 = $filasHA[0]['d6_spain'] + $filasHA[1]['d6_spain'] +$filasHA[2]['d6_spain'] +$filasHA[3]['d6_spain'] +$filasHA[4]['d6_spain'];
$sumCold8 = $filasHA[0]['d8_spain'] + $filasHA[1]['d8_spain'] +$filasHA[2]['d8_spain'] +$filasHA[3]['d8_spain'] +$filasHA[4]['d8_spain'];
$sumCold9 = $filasHA[0]['d9_spain'] + $filasHA[1]['d9_spain'] +$filasHA[2]['d9_spain'] +$filasHA[3]['d9_spain'] +$filasHA[4]['d9_spain'];
$sumCold10 = $filasHA[0]['d10_spain'] + $filasHA[1]['d10_spain'] +$filasHA[2]['d10_spain'] +$filasHA[3]['d10_spain'] +$filasHA[4]['d10_spain'];
$sumCold12 = $filasHA[0]['d12_spain'] + $filasHA[1]['d12_spain'] +$filasHA[2]['d12_spain'] +$filasHA[3]['d12_spain'] +$filasHA[4]['d12_spain'];
$sumCold14 = $filasHA[0]['d14_spain'] + $filasHA[1]['d14_spain'] +$filasHA[2]['d14_spain'] +$filasHA[3]['d14_spain'] +$filasHA[4]['d14_spain'];
$sumCold16 = $filasHA[0]['d16_spain'] + $filasHA[1]['d16_spain'] +$filasHA[2]['d16_spain'] +$filasHA[3]['d16_spain'] +$filasHA[4]['d16_spain'];
$sumCold20 = $filasHA[0]['d20_spain'] + $filasHA[1]['d20_spain'] +$filasHA[2]['d20_spain'] +$filasHA[3]['d20_spain'] +$filasHA[4]['d20_spain'];
$sumCold25 = $filasHA[0]['d25_spain'] + $filasHA[1]['d25_spain'] +$filasHA[2]['d25_spain'] +$filasHA[3]['d25_spain'] +$filasHA[4]['d25_spain'];
$sumCold32 = $filasHA[0]['d32_spain'] + $filasHA[1]['d32_spain'] +$filasHA[2]['d32_spain'] +$filasHA[3]['d32_spain'] +$filasHA[4]['d32_spain'];
$sumCold40 = $filasHA[0]['d40_spain'] + $filasHA[1]['d40_spain'] +$filasHA[2]['d40_spain'] +$filasHA[3]['d40_spain'] +$filasHA[4]['d40_spain'];

$totalFila = $sumCold6 + $sumCold8 + $sumCold9 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16 + $sumCold20 + $sumCold25 + $sumCold32 + $sumCold40;

//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('Total'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold6),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold8),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold9),'LTBR',0,'C',TRUE);
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

//TABLA ADX
$totalColumnaFila = 0;
//CABECERA TABLA
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('UNITES ADX'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 6'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 9'),'LTBR',0,'C',TRUE);
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
$pdf->Cell(74,4,utf8_decode('BOBINAS ADX'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasADX[0]['d6_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[0]['d8_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[0]['d9_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[0]['d10_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[0]['d12_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[0]['d14_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[0]['d16_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[0]['d20_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[0]['d25_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[0]['d32_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[0]['d40_spain']),'LTBR',0,'C');
$totalFila =  $filasADX[0]['d6_spain'] + $filasADX[0]['d8_spain'] + $filasADX[0]['d9_spain'] + $filasADX[0]['d10_spain'] + $filasADX[0]['d12_spain'] +
$filasADX[0]['d14_spain'] +
$filasADX[0]['d16_spain'] +
$filasADX[0]['d20_spain'] +
$filasADX[0]['d25_spain'] +
$filasADX[0]['d32_spain'] +
$filasADX[0]['d40_spain'];

$totalColumnaFila = $totalColumnaFila + $totalFila;
$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRA 12 M LISA'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasADX[1]['d6_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[1]['d8_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[1]['d9_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[1]['d10_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[1]['d12_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[1]['d14_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[1]['d16_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[1]['d20_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[1]['d25_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[1]['d32_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[1]['d40_spain']),'LTBR',0,'C');
$totalFila =  $filasADX[1]['d6_spain'] + $filasADX[1]['d8_spain'] + $filasADX[1]['d9_spain'] + $filasADX[1]['d10_spain'] + $filasADX[1]['d12_spain'] +
$filasADX[1]['d14_spain'] +
$filasADX[1]['d16_spain'] +
$filasADX[1]['d20_spain'] +
$filasADX[1]['d25_spain'] +
$filasADX[1]['d32_spain'] +
$filasADX[1]['d40_spain'];

$totalColumnaFila = $totalColumnaFila + $totalFila;
$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRA 6 M LISA'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasADX[2]['d6_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[2]['d8_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[2]['d9_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[2]['d10_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[2]['d12_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[2]['d14_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[2]['d16_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[2]['d20_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[2]['d25_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[2]['d32_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasADX[2]['d40_spain']),'LTBR',0,'C');
$totalFila =  $filasADX[2]['d6_spain'] + $filasADX[2]['d8_spain'] + $filasADX[2]['d9_spain'] + $filasADX[2]['d10_spain'] + $filasADX[2]['d12_spain'] +
$filasADX[2]['d14_spain'] +
$filasADX[2]['d16_spain'] +
$filasADX[2]['d20_spain'] +
$filasADX[2]['d25_spain'] +
$filasADX[2]['d32_spain'] +
$filasADX[2]['d40_spain'];

$totalColumnaFila = $totalColumnaFila + $totalFila;
$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//CALCULO SUMATORIOS COLUMNA
$sumCold6 = $filasADX[0]['d6_spain'] + $filasADX[1]['d6_spain'] +$filasADX[2]['d6_spain'] ;
$sumCold8 = $filasADX[0]['d8_spain'] + $filasADX[1]['d8_spain'] +$filasADX[2]['d8_spain'] ;
$sumCold9 = $filasADX[0]['d9_spain'] + $filasADX[1]['d9_spain'] +$filasADX[2]['d9_spain'] ;
$sumCold10 = $filasADX[0]['d10_spain'] + $filasADX[1]['d10_spain'] +$filasADX[2]['d10_spain'] ;
$sumCold12 = $filasADX[0]['d12_spain'] + $filasADX[1]['d12_spain'] +$filasADX[2]['d12_spain'] ;
$sumCold14 = $filasADX[0]['d14_spain'] + $filasADX[1]['d14_spain'] +$filasADX[2]['d14_spain'] ;
$sumCold16 = $filasADX[0]['d16_spain'] + $filasADX[1]['d16_spain'] +$filasADX[2]['d16_spain'] ;
$sumCold20 = $filasADX[0]['d20_spain'] + $filasADX[1]['d20_spain'] +$filasADX[2]['d20_spain'] ;
$sumCold25 = $filasADX[0]['d25_spain'] + $filasADX[1]['d25_spain'] +$filasADX[2]['d25_spain'] ;
$sumCold32 = $filasADX[0]['d32_spain'] + $filasADX[1]['d32_spain'] +$filasADX[2]['d32_spain'] ;
$sumCold40 = $filasADX[0]['d40_spain'] + $filasADX[1]['d40_spain'] +$filasADX[2]['d40_spain'] ;

$totalFila = $sumCold6 + $sumCold8 + $sumCold9 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16 + $sumCold20 + $sumCold25 + $sumCold32 + $sumCold40;

//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('Total'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold6),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold8),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold9),'LTBR',0,'C',TRUE);
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


//TABLA UNITES TREILLIS SOUDES EN PANNEAUX
$totalColumnaFila = 0;

//CABECERA TABLA
$pdf->SetFillColor(255,146,228);
$pdf->Cell(74,4,utf8_decode('UNITES TREILLIS SOUDES EN PANNEAUX'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('PAF10'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST20'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST25'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST25C'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST35'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST40C'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST50'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST50C'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST60'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST65C'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST15C'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('TOTAL'),'LTBR',1,'C',TRUE);


//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('B500B'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['paf10_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st20_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st25_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st25c_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st35_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st40c_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st50_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st50c_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st60_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st65c_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st15c_spain']),'LTBR',0,'C');
$totalFila =  $filasTrellis[0]['paf10_spain'] + $filasTrellis[0]['st20_spain'] + $filasTrellis[0]['st25_spain'] + $filasTrellis[0]['st25c_spain'] + $filasTrellis[0]['st35_spain'] +
$filasTrellis[0]['st40c_spain'] +
$filasTrellis[0]['st50_spain'] +
$filasTrellis[0]['st50c_spain'] +
$filasTrellis[0]['st60_spain'] +
$filasTrellis[0]['st65c_spain'] +
$filasTrellis[0]['st15c_spain'];

$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(255,196,240);
$pdf->Cell(74,4,utf8_decode('Total'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['paf10_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st20_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st25_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st25c_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st35_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st40c_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st50_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st50c_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st60_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st65c_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasTrellis[0]['st15c_spain']),'LTBR',0,'C',TRUE);
$totalFila =  $filasTrellis[0]['paf10_spain'] + $filasTrellis[0]['st20_spain'] + $filasTrellis[0]['st25_spain'] + $filasTrellis[0]['st25c_spain'] + $filasTrellis[0]['st35_spain'] +
$filasTrellis[0]['st40c_spain'] +
$filasTrellis[0]['st50_spain'] +
$filasTrellis[0]['st50c_spain'] +
$filasTrellis[0]['st60_spain'] +
$filasTrellis[0]['st65c_spain'] +
$filasTrellis[0]['st15c_spain'];

$pdf->SetFillColor(108,157,221);

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);


//SEPARADOR CELDA
$pdf->Cell(15,4,utf8_decode(''),'',1,'C');






//SEPARADOR CELDA
$pdf->Cell(15,4,utf8_decode(''),'',1,'C');


//TABLA UNITES ATTENTES
$totalColumnaFila = 0;

//CABECERA TABLA
$pdf->SetFillColor(250,123,103);

$pdf->Cell(74,4,utf8_decode('UNITES ATTENTES'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('SEC HA8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('SEC HA10'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('SEC 8MM'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('SEC 10MM'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('TOTAL'),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('ATTENTES'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasAttentes[0]['sec_ha8_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasAttentes[0]['sec_ha10_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasAttentes[0]['sec_8_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasAttentes[0]['sec_10_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');

$totalFila =  $filasAttentes[0]['sec_ha8_spain'] + $filasAttentes[0]['sec_ha10_spain'] + $filasAttentes[0]['sec_8_spain'] + $filasAttentes[0]['sec_10_spain'];
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');


//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(74,4,utf8_decode('Total'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasAttentes[0]['sec_ha8_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasAttentes[0]['sec_ha10_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasAttentes[0]['sec_8_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasAttentes[0]['sec_10_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//SEPARADOR CELDA
$pdf->Cell(15,4,utf8_decode(''),'',1,'C');

//TABLA UNITES ABOUT VOILE
//CABECERA TABLA
$pdf->SetFillColor(250,123,103);

$pdf->Cell(74,4,utf8_decode('UNITES ABOUT VOILE'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('SEC A4'),'LTBR',0,'C',TRUE);
$pdf->Cell(34,4,utf8_decode('POUTRE VOILE HA8'),'LTBR',0,'C',TRUE);
$pdf->Cell(34,4,utf8_decode('POUTRE VOILE HA10'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('TOTAL'),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('ABOUT VOILE'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasVoile[0]['sec_a4_spain']),'LTBR',0,'C');
$pdf->Cell(34,4,utf8_decode($filasVoile[0]['poutre_ha8_spain']),'LTBR',0,'C');
$pdf->Cell(34,4,utf8_decode($filasVoile[0]['poutre_ha10_spain']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C');
$totalFila =  $filasVoile[0]['sec_a4_spain'] + $filasVoile[0]['poutre_ha8_spain'] + $filasVoile[0]['poutre_ha10_spain'];
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');


//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(74,4,utf8_decode('Total'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasVoile[0]['sec_a4_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(34,4,utf8_decode($filasVoile[0]['poutre_ha8_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(34,4,utf8_decode($filasVoile[0]['poutre_ha10_spain']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode(''),'LTBR',0,'C',TRUE);
$totalFila =  $filasVoile[0]['sec_a4_spain'] + $filasVoile[0]['poutre_ha8_spain'] + $filasVoile[0]['poutre_ha10_spain'];
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);


//SEPARADOR CELDA
$pdf->Cell(15,4,utf8_decode(''),'',1,'C');

$pdf->AddPage();
$pdf->SetFont('Helvetica','B',10);


//LINEA CABECERA
$pdf->SetFillColor(190,221,252);

$pdf->Cell(70,5,utf8_decode('TERUEL AFCAB'),'LTB',0,'C',TRUE);
$pdf->Cell(20,5,utf8_decode($fechaBonita),'TBR',1,'C',TRUE);


$pdf->Cell(15,2,utf8_decode(''),'',1,'C');
//TABLA HA
//CABECERA TABLA
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('TONNES HA'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 6'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 9'),'LTBR',0,'C',TRUE);
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
$pdf->Cell(74,4,utf8_decode('BOBINAS B500B'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d6_spain'] * $filasHA[0]['peso_d6']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d8_spain'] * $filasHA[0]['peso_d8']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d9_spain'] * $filasHA[0]['peso_d9']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d10_spain'] * $filasHA[0]['peso_d10']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d12_spain'] * $filasHA[0]['peso_d12']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d14_spain'] * $filasHA[0]['peso_d14']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d16_spain'] * $filasHA[0]['peso_d16']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d20_spain'] * $filasHA[0]['peso_d20']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d25_spain'] * $filasHA[0]['peso_d25']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d32_spain'] * $filasHA[0]['peso_d32']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d40_spain'] * $filasHA[0]['peso_d40']),'LTBR',0,'C');

$totalFila =  ($filasHA[0]['d6_spain'] * $filasHA[0]['peso_d6']) +
($filasHA[0]['d8_spain'] * $filasHA[0]['peso_d8']) +
($filasHA[0]['d9_spain'] * $filasHA[0]['peso_d9']) + 
($filasHA[0]['d10_spain'] * $filasHA[0]['peso_d10']) +
($filasHA[0]['d12_spain'] * $filasHA[0]['peso_d12']) +
($filasHA[0]['d14_spain'] * $filasHA[0]['peso_d14']) +
($filasHA[0]['d16_spain'] * $filasHA[0]['peso_d16']) +
($filasHA[0]['d20_spain'] * $filasHA[0]['peso_d20']) +
($filasHA[0]['d25_spain'] * $filasHA[0]['peso_d25']) +
($filasHA[0]['d32_spain'] * $filasHA[0]['peso_d32']) +
($filasHA[0]['d40_spain'] * $filasHA[0]['peso_d40']);

$totalColumnaFila = $totalColumnaFila + $totalFila;

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');


//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('TOTAL BOBINAS'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d6_spain'] * $filasHA[0]['peso_d6']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d8_spain'] * $filasHA[0]['peso_d8']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d9_spain'] * $filasHA[0]['peso_d9']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d10_spain'] * $filasHA[0]['peso_d10']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d12_spain'] * $filasHA[0]['peso_d12']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d14_spain'] * $filasHA[0]['peso_d14']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d16_spain'] * $filasHA[0]['peso_d16']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d20_spain'] * $filasHA[0]['peso_d20']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d25_spain'] * $filasHA[0]['peso_d25']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d32_spain'] * $filasHA[0]['peso_d32']),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d40_spain'] * $filasHA[0]['peso_d40']),'LTBR',0,'C',TRUE);

$totalFila =  ($filasHA[0]['d6_spain'] * $filasHA[0]['peso_d6']) +
($filasHA[0]['d8_spain'] * $filasHA[0]['peso_d8']) +
($filasHA[0]['d9_spain'] * $filasHA[0]['peso_d9']) + 
($filasHA[0]['d10_spain'] * $filasHA[0]['peso_d10']) +
($filasHA[0]['d12_spain'] * $filasHA[0]['peso_d12']) +
($filasHA[0]['d14_spain'] * $filasHA[0]['peso_d14']) +
($filasHA[0]['d16_spain'] * $filasHA[0]['peso_d16']) +
($filasHA[0]['d20_spain'] * $filasHA[0]['peso_d20']) +
($filasHA[0]['d25_spain'] * $filasHA[0]['peso_d25']) +
($filasHA[0]['d32_spain'] * $filasHA[0]['peso_d32']) +
($filasHA[0]['d40_spain'] * $filasHA[0]['peso_d40']);

$totalBobinas  = $totalFila;


$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

//calculo total bobinas
//CALCULO SUMATORIOS COLUMNA
$sumCold6 = ($filasHA[1]['d6_spain'] * $filasHA[1]['peso_d6']) + ($filasHA[2]['d6_spain'] * $filasHA[2]['peso_d6']) + ($filasHA[3]['d6_spain'] * $filasHA[3]['peso_d6']) + ($filasHA[4]['d6_spain'] * $filasHA[4]['peso_d6']) ;
$sumCold8 = ($filasHA[1]['d8_spain'] * $filasHA[1]['peso_d8']) + ($filasHA[2]['d8_spain'] * $filasHA[2]['peso_d8']) + ($filasHA[3]['d8_spain'] * $filasHA[3]['peso_d8']) + ($filasHA[4]['d8_spain'] * $filasHA[4]['peso_d8']) ;
$sumCold9 = ($filasHA[1]['d9_spain'] * $filasHA[1]['peso_d9']) + ($filasHA[2]['d9_spain'] * $filasHA[2]['peso_d9']) + ($filasHA[3]['d9_spain'] * $filasHA[3]['peso_d9']) + ($filasHA[4]['d9_spain'] * $filasHA[4]['peso_d9']) ;
$sumCold10 = ($filasHA[1]['d10_spain'] * $filasHA[1]['peso_d10']) + ($filasHA[2]['d10_spain'] * $filasHA[2]['peso_d10']) + ($filasHA[3]['d10_spain'] * $filasHA[3]['peso_d10']) + ($filasHA[4]['d10_spain'] * $filasHA[4]['peso_d10']) ;
$sumCold12 = ($filasHA[1]['d12_spain'] * $filasHA[1]['peso_d12']) + ($filasHA[2]['d12_spain'] * $filasHA[2]['peso_d12']) + ($filasHA[3]['d12_spain'] * $filasHA[3]['peso_d12']) + ($filasHA[4]['d12_spain'] * $filasHA[4]['peso_d12']) ;
$sumCold14 = ($filasHA[1]['d14_spain'] * $filasHA[1]['peso_d14']) + ($filasHA[2]['d14_spain'] * $filasHA[2]['peso_d14']) + ($filasHA[3]['d14_spain'] * $filasHA[3]['peso_d14']) + ($filasHA[4]['d14_spain'] * $filasHA[4]['peso_d14']) ;
$sumCold16 = ($filasHA[1]['d16_spain'] * $filasHA[1]['peso_d16']) + ($filasHA[2]['d16_spain'] * $filasHA[2]['peso_d16']) + ($filasHA[3]['d16_spain'] * $filasHA[3]['peso_d16']) + ($filasHA[4]['d16_spain'] * $filasHA[4]['peso_d16']) ;
$sumCold20 = ($filasHA[1]['d20_spain'] * $filasHA[1]['peso_d20']) + ($filasHA[2]['d20_spain'] * $filasHA[2]['peso_d20']) + ($filasHA[3]['d20_spain'] * $filasHA[3]['peso_d20']) + ($filasHA[4]['d20_spain'] * $filasHA[4]['peso_d20']) ;
$sumCold25 = ($filasHA[1]['d25_spain'] * $filasHA[1]['peso_d25']) + ($filasHA[2]['d25_spain'] * $filasHA[2]['peso_d25']) + ($filasHA[3]['d25_spain'] * $filasHA[3]['peso_d25']) + ($filasHA[4]['d25_spain'] * $filasHA[4]['peso_d25']) ;
$sumCold32 = ($filasHA[1]['d32_spain'] * $filasHA[1]['peso_d32']) + ($filasHA[2]['d32_spain'] * $filasHA[2]['peso_d32']) + ($filasHA[3]['d32_spain'] * $filasHA[3]['peso_d32']) + ($filasHA[4]['d32_spain'] * $filasHA[4]['peso_d32']) ;
$sumCold40 = ($filasHA[1]['d40_spain'] * $filasHA[1]['peso_d40']) + ($filasHA[2]['d40_spain'] * $filasHA[2]['peso_d40']) + ($filasHA[3]['d40_spain'] * $filasHA[3]['peso_d40']) + ($filasHA[4]['d40_spain'] * $filasHA[4]['peso_d40']) ;
$totalFila = 0; 
$totalFila = $sumCold6 + $sumCold8 + $sumCold9 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;
$totalBarras = $totalFila;

$totalBarrasBobinas = $totalBobinas + $totalBarras;
$porcenTotalBarras = round(($totalBarras*100)/$totalBarrasBobinas,1);
$porcenTotalBobinas = round(($totalBobinas*100)/$totalBarrasBobinas,1);

//% TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(226,148,87);
$pdf->Cell(74,4,utf8_decode('% Bobines pour Diametre'),'LTBR',0,'C',TRUE);

//($requestVars->_name == '') ? $redText : ''; 

($filasHA[0]['d6_spain'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d6_spain'] * $filasHA[0]['peso_d6'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d8_spain'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d8_spain'] * $filasHA[0]['peso_d8'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d9_spain'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d9_spain'] * $filasHA[0]['peso_d9'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d10_spain'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d10_spain'] * $filasHA[0]['peso_d10'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d12_spain'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d12_spain'] * $filasHA[0]['peso_d12'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d14_spain'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d14_spain'] * $filasHA[0]['peso_d14'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d16_spain'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d16_spain'] * $filasHA[0]['peso_d16'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d20_spain'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d20_spain'] * $filasHA[0]['peso_d20'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d25_spain'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d25_spain'] * $filasHA[0]['peso_d25'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d32_spain'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d32_spain'] * $filasHA[0]['peso_d32'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);
($filasHA[0]['d40_spain'] > 0) ? $pdf->Cell(17,4,round(($filasHA[0]['d40_spain'] * $filasHA[0]['peso_d40'] * 100)/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0%'),'LTBR',0,'C',TRUE);


$pdf->Cell(17,4,utf8_decode($porcenTotalBobinas.'%'),'LTBR',1,'C',TRUE);

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 6 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d6_spain'] * $filasHA[1]['peso_d6']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d8_spain'] * $filasHA[1]['peso_d8']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d9_spain'] * $filasHA[1]['peso_d9']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d10_spain'] * $filasHA[1]['peso_d10']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d12_spain'] * $filasHA[1]['peso_d12']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d14_spain'] * $filasHA[1]['peso_d14']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d16_spain'] * $filasHA[1]['peso_d16']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d20_spain'] * $filasHA[1]['peso_d20']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d25_spain'] * $filasHA[1]['peso_d25']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d32_spain'] * $filasHA[1]['peso_d32']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[1]['d40_spain'] * $filasHA[1]['peso_d40']),'LTBR',0,'C');

$totalFila =  ($filasHA[1]['d6_spain'] * $filasHA[1]['peso_d6']) +
($filasHA[1]['d8_spain'] * $filasHA[1]['peso_d8']) +
($filasHA[1]['d9_spain'] * $filasHA[1]['peso_d9']) + 
($filasHA[1]['d10_spain'] * $filasHA[1]['peso_d10']) +
($filasHA[1]['d12_spain'] * $filasHA[1]['peso_d12']) +
($filasHA[1]['d14_spain'] * $filasHA[1]['peso_d14']) +
($filasHA[1]['d16_spain'] * $filasHA[1]['peso_d16']) +
($filasHA[1]['d20_spain'] * $filasHA[1]['peso_d20']) +
($filasHA[1]['d25_spain'] * $filasHA[1]['peso_d25']) +
($filasHA[1]['d32_spain'] * $filasHA[1]['peso_d32']) +
($filasHA[1]['d40_spain'] * $filasHA[1]['peso_d40']);

$totalColumnaFila = $totalColumnaFila + $totalFila;

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 12 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d6_spain'] * $filasHA[2]['peso_d6']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d8_spain'] * $filasHA[2]['peso_d8']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d9_spain'] * $filasHA[2]['peso_d9']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d10_spain'] * $filasHA[2]['peso_d10']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d12_spain'] * $filasHA[2]['peso_d12']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d14_spain'] * $filasHA[2]['peso_d14']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d16_spain'] * $filasHA[2]['peso_d16']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d20_spain'] * $filasHA[2]['peso_d20']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d25_spain'] * $filasHA[2]['peso_d25']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d32_spain'] * $filasHA[2]['peso_d32']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[2]['d40_spain'] * $filasHA[2]['peso_d40']),'LTBR',0,'C');

$totalFila =  ($filasHA[2]['d6_spain'] * $filasHA[2]['peso_d6']) +
($filasHA[2]['d8_spain'] * $filasHA[2]['peso_d8']) +
($filasHA[2]['d9_spain'] * $filasHA[2]['peso_d9']) + 
($filasHA[2]['d10_spain'] * $filasHA[2]['peso_d10']) +
($filasHA[2]['d12_spain'] * $filasHA[2]['peso_d12']) +
($filasHA[2]['d14_spain'] * $filasHA[2]['peso_d14']) +
($filasHA[2]['d16_spain'] * $filasHA[2]['peso_d16']) +
($filasHA[2]['d20_spain'] * $filasHA[2]['peso_d20']) +
($filasHA[2]['d25_spain'] * $filasHA[2]['peso_d25']) +
($filasHA[2]['d32_spain'] * $filasHA[2]['peso_d32']) +
($filasHA[2]['d40_spain'] * $filasHA[2]['peso_d40']);

$totalColumnaFila = $totalColumnaFila + $totalFila;

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');
//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 14 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d6_spain'] * $filasHA[3]['peso_d6']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d8_spain'] * $filasHA[3]['peso_d8']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d9_spain'] * $filasHA[3]['peso_d9']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d10_spain'] * $filasHA[3]['peso_d10']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d12_spain'] * $filasHA[3]['peso_d12']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d14_spain'] * $filasHA[3]['peso_d14']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d16_spain'] * $filasHA[3]['peso_d16']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d20_spain'] * $filasHA[3]['peso_d20']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d25_spain'] * $filasHA[3]['peso_d25']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d32_spain'] * $filasHA[3]['peso_d32']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[3]['d40_spain'] * $filasHA[3]['peso_d40']),'LTBR',0,'C');

$totalFila =  ($filasHA[3]['d6_spain'] * $filasHA[3]['peso_d6']) +
($filasHA[3]['d8_spain'] * $filasHA[3]['peso_d8']) +
($filasHA[3]['d9_spain'] * $filasHA[3]['peso_d9']) + 
($filasHA[3]['d10_spain'] * $filasHA[3]['peso_d10']) +
($filasHA[3]['d12_spain'] * $filasHA[3]['peso_d12']) +
($filasHA[3]['d14_spain'] * $filasHA[3]['peso_d14']) +
($filasHA[3]['d16_spain'] * $filasHA[3]['peso_d16']) +
($filasHA[3]['d20_spain'] * $filasHA[3]['peso_d20']) +
($filasHA[3]['d25_spain'] * $filasHA[3]['peso_d25']) +
($filasHA[3]['d32_spain'] * $filasHA[3]['peso_d32']) +
($filasHA[3]['d40_spain'] * $filasHA[3]['peso_d40']);

$totalColumnaFila = $totalColumnaFila + $totalFila;

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');

//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRAS 16 M'),'LTBR',0,'R');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d6_spain'] * $filasHA[4]['peso_d6']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d8_spain'] * $filasHA[4]['peso_d8']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d9_spain'] * $filasHA[4]['peso_d9']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d10_spain'] * $filasHA[4]['peso_d10']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d12_spain'] * $filasHA[4]['peso_d12']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d14_spain'] * $filasHA[4]['peso_d14']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d16_spain'] * $filasHA[4]['peso_d16']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d20_spain'] * $filasHA[4]['peso_d20']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d25_spain'] * $filasHA[4]['peso_d25']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d32_spain'] * $filasHA[4]['peso_d32']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[4]['d40_spain'] * $filasHA[4]['peso_d40']),'LTBR',0,'C');

$totalFila =  ($filasHA[4]['d6_spain'] * $filasHA[4]['peso_d6']) +
($filasHA[4]['d8_spain'] * $filasHA[4]['peso_d8']) +
($filasHA[4]['d9_spain'] * $filasHA[4]['peso_d9']) + 
($filasHA[4]['d10_spain'] * $filasHA[4]['peso_d10']) +
($filasHA[4]['d12_spain'] * $filasHA[4]['peso_d12']) +
($filasHA[4]['d14_spain'] * $filasHA[4]['peso_d14']) +
($filasHA[4]['d16_spain'] * $filasHA[4]['peso_d16']) +
($filasHA[4]['d20_spain'] * $filasHA[4]['peso_d20']) +
($filasHA[4]['d25_spain'] * $filasHA[4]['peso_d25']) +
($filasHA[4]['d32_spain'] * $filasHA[4]['peso_d32']) +
($filasHA[4]['d40_spain'] * $filasHA[4]['peso_d40']);

$totalColumnaFila = $totalColumnaFila + $totalFila;

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');

//CALCULO SUMATORIOS COLUMNA
$sumCold6 = ($filasHA[1]['d6_spain'] * $filasHA[1]['peso_d6']) + ($filasHA[2]['d6_spain'] * $filasHA[2]['peso_d6']) + ($filasHA[3]['d6_spain'] * $filasHA[3]['peso_d6']) + ($filasHA[4]['d6_spain'] * $filasHA[4]['peso_d6']) ;
$sumCold8 = ($filasHA[1]['d8_spain'] * $filasHA[1]['peso_d8']) + ($filasHA[2]['d8_spain'] * $filasHA[2]['peso_d8']) + ($filasHA[3]['d8_spain'] * $filasHA[3]['peso_d8']) + ($filasHA[4]['d8_spain'] * $filasHA[4]['peso_d8']) ;
$sumCold9 = ($filasHA[1]['d9_spain'] * $filasHA[1]['peso_d9']) + ($filasHA[2]['d9_spain'] * $filasHA[2]['peso_d9']) + ($filasHA[3]['d9_spain'] * $filasHA[3]['peso_d9']) + ($filasHA[4]['d9_spain'] * $filasHA[4]['peso_d9']) ;
$sumCold10 = ($filasHA[1]['d10_spain'] * $filasHA[1]['peso_d10']) + ($filasHA[2]['d10_spain'] * $filasHA[2]['peso_d10']) + ($filasHA[3]['d10_spain'] * $filasHA[3]['peso_d10']) + ($filasHA[4]['d10_spain'] * $filasHA[4]['peso_d10']) ;
$sumCold12 = ($filasHA[1]['d12_spain'] * $filasHA[1]['peso_d12']) + ($filasHA[2]['d12_spain'] * $filasHA[2]['peso_d12']) + ($filasHA[3]['d12_spain'] * $filasHA[3]['peso_d12']) + ($filasHA[4]['d12_spain'] * $filasHA[4]['peso_d12']) ;
$sumCold14 = ($filasHA[1]['d14_spain'] * $filasHA[1]['peso_d14']) + ($filasHA[2]['d14_spain'] * $filasHA[2]['peso_d14']) + ($filasHA[3]['d14_spain'] * $filasHA[3]['peso_d14']) + ($filasHA[4]['d14_spain'] * $filasHA[4]['peso_d14']) ;
$sumCold16 = ($filasHA[1]['d16_spain'] * $filasHA[1]['peso_d16']) + ($filasHA[2]['d16_spain'] * $filasHA[2]['peso_d16']) + ($filasHA[3]['d16_spain'] * $filasHA[3]['peso_d16']) + ($filasHA[4]['d16_spain'] * $filasHA[4]['peso_d16']) ;
$sumCold20 = ($filasHA[1]['d20_spain'] * $filasHA[1]['peso_d20']) + ($filasHA[2]['d20_spain'] * $filasHA[2]['peso_d20']) + ($filasHA[3]['d20_spain'] * $filasHA[3]['peso_d20']) + ($filasHA[4]['d20_spain'] * $filasHA[4]['peso_d20']) ;
$sumCold25 = ($filasHA[1]['d25_spain'] * $filasHA[1]['peso_d25']) + ($filasHA[2]['d25_spain'] * $filasHA[2]['peso_d25']) + ($filasHA[3]['d25_spain'] * $filasHA[3]['peso_d25']) + ($filasHA[4]['d25_spain'] * $filasHA[4]['peso_d25']) ;
$sumCold32 = ($filasHA[1]['d32_spain'] * $filasHA[1]['peso_d32']) + ($filasHA[2]['d32_spain'] * $filasHA[2]['peso_d32']) + ($filasHA[3]['d32_spain'] * $filasHA[3]['peso_d32']) + ($filasHA[4]['d32_spain'] * $filasHA[4]['peso_d32']) ;
$sumCold40 = ($filasHA[1]['d40_spain'] * $filasHA[1]['peso_d40']) + ($filasHA[2]['d40_spain'] * $filasHA[2]['peso_d40']) + ($filasHA[3]['d40_spain'] * $filasHA[3]['peso_d40']) + ($filasHA[4]['d40_spain'] * $filasHA[4]['peso_d40']) ;
$totalFila = 0; 
$totalFila = $sumCold6 + $sumCold8 + $sumCold9 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;



//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->Cell(74,4,utf8_decode('TOTAL BARRAS'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold6),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold8),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold9),'LTBR',0,'C',TRUE);
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
($sumCold6 > 0) ? $pdf->Cell(17,4,round((100* $sumCold6 )/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold8 > 0) ? $pdf->Cell(17,4,round((100* $sumCold8 )/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold9 > 0) ? $pdf->Cell(17,4,round((100* $sumCold9 )/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
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
$sumCold6 = ($filasHA[0]['d6_spain'] * $filasHA[0]['peso_d6']) + ($filasHA[1]['d6_spain'] * $filasHA[1]['peso_d6']) + ($filasHA[2]['d6_spain'] * $filasHA[2]['peso_d6']) + ($filasHA[3]['d6_spain'] * $filasHA[3]['peso_d6']) + ($filasHA[4]['d6_spain'] * $filasHA[4]['peso_d6']) ;
$sumCold8 = ($filasHA[0]['d8_spain'] * $filasHA[0]['peso_d8']) + ($filasHA[1]['d8_spain'] * $filasHA[1]['peso_d8']) + ($filasHA[2]['d8_spain'] * $filasHA[2]['peso_d8']) + ($filasHA[3]['d8_spain'] * $filasHA[3]['peso_d8']) + ($filasHA[4]['d8_spain'] * $filasHA[4]['peso_d8']) ;
$sumCold9 = ($filasHA[0]['d9_spain'] * $filasHA[0]['peso_d9']) + ($filasHA[1]['d9_spain'] * $filasHA[1]['peso_d9']) + ($filasHA[2]['d9_spain'] * $filasHA[2]['peso_d9']) + ($filasHA[3]['d9_spain'] * $filasHA[3]['peso_d9']) + ($filasHA[4]['d9_spain'] * $filasHA[4]['peso_d9']) ;
$sumCold10 = ($filasHA[0]['d10_spain'] * $filasHA[0]['peso_d10']) + ($filasHA[1]['d10_spain'] * $filasHA[1]['peso_d10']) + ($filasHA[2]['d10_spain'] * $filasHA[2]['peso_d10']) + ($filasHA[3]['d10_spain'] * $filasHA[3]['peso_d10']) + ($filasHA[4]['d10_spain'] * $filasHA[4]['peso_d10']) ;
$sumCold12 = ($filasHA[0]['d12_spain'] * $filasHA[0]['peso_d12']) + ($filasHA[1]['d12_spain'] * $filasHA[1]['peso_d12']) + ($filasHA[2]['d12_spain'] * $filasHA[2]['peso_d12']) + ($filasHA[3]['d12_spain'] * $filasHA[3]['peso_d12']) + ($filasHA[4]['d12_spain'] * $filasHA[4]['peso_d12']) ;
$sumCold14 = ($filasHA[0]['d14_spain'] * $filasHA[0]['peso_d14']) + ($filasHA[1]['d14_spain'] * $filasHA[1]['peso_d14']) + ($filasHA[2]['d14_spain'] * $filasHA[2]['peso_d14']) + ($filasHA[3]['d14_spain'] * $filasHA[3]['peso_d14']) + ($filasHA[4]['d14_spain'] * $filasHA[4]['peso_d14']) ;
$sumCold16 = ($filasHA[0]['d16_spain'] * $filasHA[0]['peso_d16']) + ($filasHA[1]['d16_spain'] * $filasHA[1]['peso_d16']) + ($filasHA[2]['d16_spain'] * $filasHA[2]['peso_d16']) + ($filasHA[3]['d16_spain'] * $filasHA[3]['peso_d16']) + ($filasHA[4]['d16_spain'] * $filasHA[4]['peso_d16']) ;
$sumCold20 = ($filasHA[0]['d20_spain'] * $filasHA[0]['peso_d20']) + ($filasHA[1]['d20_spain'] * $filasHA[1]['peso_d20']) + ($filasHA[2]['d20_spain'] * $filasHA[2]['peso_d20']) + ($filasHA[3]['d20_spain'] * $filasHA[3]['peso_d20']) + ($filasHA[4]['d20_spain'] * $filasHA[4]['peso_d20']) ;
$sumCold25 = ($filasHA[0]['d25_spain'] * $filasHA[0]['peso_d25']) + ($filasHA[1]['d25_spain'] * $filasHA[1]['peso_d25']) + ($filasHA[2]['d25_spain'] * $filasHA[2]['peso_d25']) + ($filasHA[3]['d25_spain'] * $filasHA[3]['peso_d25']) + ($filasHA[4]['d25_spain'] * $filasHA[4]['peso_d25']) ;
$sumCold32 = ($filasHA[0]['d32_spain'] * $filasHA[0]['peso_d32']) + ($filasHA[1]['d32_spain'] * $filasHA[1]['peso_d32']) + ($filasHA[2]['d32_spain'] * $filasHA[2]['peso_d32']) + ($filasHA[3]['d32_spain'] * $filasHA[3]['peso_d32']) + ($filasHA[4]['d32_spain'] * $filasHA[4]['peso_d32']) ;
$sumCold40 = ($filasHA[0]['d40_spain'] * $filasHA[0]['peso_d40']) + ($filasHA[1]['d40_spain'] * $filasHA[1]['peso_d40']) + ($filasHA[2]['d40_spain'] * $filasHA[2]['peso_d40']) + ($filasHA[3]['d40_spain'] * $filasHA[3]['peso_d40']) + ($filasHA[4]['d40_spain'] * $filasHA[4]['peso_d40']) ;
$totalFila = 0; 
$totalFila = $sumCold6 + $sumCold8 + $sumCold9 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;

//% TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(108,157,221);
$pdf->Cell(74,4,utf8_decode('TOTAL'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold6),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold8),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold9),'LTBR',0,'C',TRUE);
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
($sumCold6 > 0) ? $pdf->Cell(17,4,round((100* $sumCold6 )/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold8 > 0) ? $pdf->Cell(17,4,round((100* $sumCold8 )/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
($sumCold9 > 0) ? $pdf->Cell(17,4,round((100* $sumCold9 )/$totalFila,1).'%','LTBR',0,'C',TRUE) : $pdf->Cell(17,4,utf8_decode('0,0'),'LTBR',0,'C',TRUE);
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
//TABLA HA
//CABECERA TABLA
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('TONNES ADX'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 6'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 9'),'LTBR',0,'C',TRUE);
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
$pdf->Cell(74,4,utf8_decode('BOBINAS ADX'),'LTBR',0,'R');
$pdf->Cell(17,4,round($filasADX[0]['d6_spain']*$filasADX[0]['peso_d6'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[0]['d8_spain']*$filasADX[0]['peso_d8'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[0]['d9_spain']*$filasADX[0]['peso_d9'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[0]['d10_spain']*$filasADX[0]['peso_d10'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[0]['d12_spain']*$filasADX[0]['peso_d12'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[0]['d14_spain']*$filasADX[0]['peso_d14'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[0]['d16_spain']*$filasADX[0]['peso_d16'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[0]['d20_spain']*$filasADX[0]['peso_d20'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[0]['d25_spain']*$filasADX[0]['peso_d25'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[0]['d32_spain']*$filasADX[0]['peso_d32'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[0]['d40_spain']*$filasADX[0]['peso_d40'],1),'LTBR',0,'C');
$totalFila =  $filasADX[0]['d6_spain']*$filasADX[0]['peso_d6'] +
$filasADX[0]['d8_spain']*$filasADX[0]['peso_d8'] +
$filasADX[0]['d9_spain']*$filasADX[0]['peso_d9'] +
$filasADX[0]['d10_spain']*$filasADX[0]['peso_d10'] +
$filasADX[0]['d12_spain']*$filasADX[0]['peso_d12'] +
$filasADX[0]['d14_spain']*$filasADX[0]['peso_d14'] +
$filasADX[0]['d16_spain']*$filasADX[0]['peso_d16'] +
$filasADX[0]['d20_spain']*$filasADX[0]['peso_d20'] +
$filasADX[0]['d25_spain']*$filasADX[0]['peso_d25'] +
$filasADX[0]['d32_spain']*$filasADX[0]['peso_d32'] +
$filasADX[0]['d40_spain']*$filasADX[0]['peso_d40'];

$totalColumnaFila = $totalColumnaFila + $totalFila;

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');


//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRA 12 M LISA ADX'),'LTBR',0,'R');
$pdf->Cell(17,4,round($filasADX[1]['d6_spain']*$filasADX[1]['peso_d6'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[1]['d8_spain']*$filasADX[1]['peso_d8'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[1]['d9_spain']*$filasADX[1]['peso_d9'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[1]['d10_spain']*$filasADX[1]['peso_d10'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[1]['d12_spain']*$filasADX[1]['peso_d12'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[1]['d14_spain']*$filasADX[1]['peso_d14'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[1]['d16_spain']*$filasADX[1]['peso_d16'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[1]['d20_spain']*$filasADX[1]['peso_d20'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[1]['d25_spain']*$filasADX[1]['peso_d25'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[1]['d32_spain']*$filasADX[1]['peso_d32'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[1]['d40_spain']*$filasADX[1]['peso_d40'],1),'LTBR',0,'C');
$totalFila =  $filasADX[1]['d6_spain']*$filasADX[1]['peso_d6'] +
$filasADX[1]['d8_spain']*$filasADX[1]['peso_d8'] +
$filasADX[1]['d9_spain']*$filasADX[1]['peso_d9'] +
$filasADX[1]['d10_spain']*$filasADX[1]['peso_d10'] +
$filasADX[1]['d12_spain']*$filasADX[1]['peso_d12'] +
$filasADX[1]['d14_spain']*$filasADX[1]['peso_d14'] +
$filasADX[1]['d16_spain']*$filasADX[1]['peso_d16'] +
$filasADX[1]['d20_spain']*$filasADX[1]['peso_d20'] +
$filasADX[1]['d25_spain']*$filasADX[1]['peso_d25'] +
$filasADX[1]['d32_spain']*$filasADX[1]['peso_d32'] +
$filasADX[1]['d40_spain']*$filasADX[1]['peso_d40'];

$totalColumnaFila = $totalColumnaFila + $totalFila;

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');


//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('BARRA 6 M LISA'),'LTBR',0,'R');
$pdf->Cell(17,4,round($filasADX[2]['d6_spain']*$filasADX[2]['peso_d6'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[2]['d8_spain']*$filasADX[2]['peso_d8'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[2]['d9_spain']*$filasADX[2]['peso_d9'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[2]['d10_spain']*$filasADX[2]['peso_d10'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[2]['d12_spain']*$filasADX[2]['peso_d12'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[2]['d14_spain']*$filasADX[2]['peso_d14'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[2]['d16_spain']*$filasADX[2]['peso_d16'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[2]['d20_spain']*$filasADX[2]['peso_d20'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[2]['d25_spain']*$filasADX[2]['peso_d25'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[2]['d32_spain']*$filasADX[2]['peso_d32'],1),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasADX[2]['d40_spain']*$filasADX[2]['peso_d40'],1),'LTBR',0,'C');
$totalFila =  $filasADX[2]['d6_spain']*$filasADX[2]['peso_d6'] +
$filasADX[2]['d8_spain']*$filasADX[2]['peso_d8'] +
$filasADX[2]['d9_spain']*$filasADX[2]['peso_d9'] +
$filasADX[2]['d10_spain']*$filasADX[2]['peso_d10'] +
$filasADX[2]['d12_spain']*$filasADX[2]['peso_d12'] +
$filasADX[2]['d14_spain']*$filasADX[2]['peso_d14'] +
$filasADX[2]['d16_spain']*$filasADX[2]['peso_d16'] +
$filasADX[2]['d20_spain']*$filasADX[2]['peso_d20'] +
$filasADX[2]['d25_spain']*$filasADX[2]['peso_d25'] +
$filasADX[2]['d32_spain']*$filasADX[2]['peso_d32'] +
$filasADX[2]['d40_spain']*$filasADX[2]['peso_d40'];

$totalColumnaFila = $totalColumnaFila + $totalFila;

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C');


//CALCULO SUMATORIOS COLUMNA
$sumCold6 = $filasADX[0]['d6_spain']*$filasADX[0]['peso_d6'] + $filasADX[1]['d6_spain']*$filasADX[1]['peso_d6'] + $filasADX[2]['d6_spain']*$filasADX[2]['peso_d6'];
$sumCold8 = $filasADX[0]['d8_spain']*$filasADX[0]['peso_d8'] + $filasADX[1]['d8_spain']*$filasADX[1]['peso_d8'] + $filasADX[2]['d8_spain']*$filasADX[2]['peso_d8'];
$sumCold9 = $filasADX[0]['d9_spain']*$filasADX[0]['peso_d9'] + $filasADX[1]['d9_spain']*$filasADX[1]['peso_d9'] + $filasADX[2]['d9_spain']*$filasADX[2]['peso_d9'];
$sumCold10 = $filasADX[0]['d10_spain']*$filasADX[0]['peso_d10'] + $filasADX[1]['d10_spain']*$filasADX[1]['peso_d10'] + $filasADX[2]['d10_spain']*$filasADX[2]['peso_d10'];
$sumCold12 = $filasADX[0]['d12_spain']*$filasADX[0]['peso_d12'] + $filasADX[1]['d12_spain']*$filasADX[1]['peso_d12'] + $filasADX[2]['d12_spain']*$filasADX[2]['peso_d12'];
$sumCold14 = $filasADX[0]['d14_spain']*$filasADX[0]['peso_d14'] + $filasADX[1]['d14_spain']*$filasADX[1]['peso_d14'] + $filasADX[2]['d14_spain']*$filasADX[2]['peso_d14'];
$sumCold16 = $filasADX[0]['d16_spain']*$filasADX[0]['peso_d16'] + $filasADX[1]['d16_spain']*$filasADX[1]['peso_d16'] + $filasADX[2]['d16_spain']*$filasADX[2]['peso_d16'];
$sumCold20 = $filasADX[0]['d20_spain']*$filasADX[0]['peso_d20'] + $filasADX[1]['d20_spain']*$filasADX[1]['peso_d20'] + $filasADX[2]['d20_spain']*$filasADX[2]['peso_d20'];
$sumCold25 = $filasADX[0]['d25_spain']*$filasADX[0]['peso_d25'] + $filasADX[1]['d25_spain']*$filasADX[1]['peso_d25'] + $filasADX[2]['d25_spain']*$filasADX[2]['peso_d25'];
$sumCold32 = $filasADX[0]['d32_spain']*$filasADX[0]['peso_d32'] + $filasADX[1]['d32_spain']*$filasADX[1]['peso_d32'] + $filasADX[2]['d32_spain']*$filasADX[2]['peso_d32'];
$sumCold40 = $filasADX[0]['d40_spain']*$filasADX[0]['peso_d40'] + $filasADX[1]['d40_spain']*$filasADX[1]['peso_d40'] + $filasADX[2]['d40_spain']*$filasADX[2]['peso_d40'];
$totalFila = 0; 
$totalFila = $sumCold6 + $sumCold8 + $sumCold9 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;


//% TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(108,157,221);
$pdf->Cell(74,4,utf8_decode('TOTAL'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold6),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold8),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold9),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold10),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold12),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold14),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold16),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold20),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold25),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold32),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($sumCold40),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);


$pdf->SetFillColor(99,218,64);
$pdf->Cell(74,4,utf8_decode('TOTAL ADX'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);

$TOTALSTOCKEXCEL = $TOTALSTOCKEXCEL + $totalFila;


//SEPARADOR CELDA
$pdf->Cell(15,4,utf8_decode(''),'',1,'C');


//TABLA UNITES TREILLIS SOUDES EN PANNEAUX
$totalColumnaFila = 0;

//CABECERA TABLA
$pdf->SetFillColor(255,146,228);
$pdf->Cell(74,4,utf8_decode('TONNES TREILLIS SOUDES EN PANNEAUX'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('PAF10'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST20'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST25'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST25C'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST35'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST40C'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST50'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST50C'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST60'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST65C'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('ST15C'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('TOTAL'),'LTBR',1,'C',TRUE);


//FILA TABLA
$pdf->SetFont('Helvetica','',9);
$pdf->Cell(74,4,utf8_decode('B500B'),'LTBR',0,'R');
$pdf->Cell(17,4,round($filasTrellis[0]['paf10_spain']*$filasTrellis[0]['peso_paf10'],3),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasTrellis[0]['st20_spain']*$filasTrellis[0]['peso_st20'],3),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasTrellis[0]['st25_spain']*$filasTrellis[0]['peso_st25'],3),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasTrellis[0]['st25c_spain']*$filasTrellis[0]['peso_st25c'],3),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasTrellis[0]['st35_spain']*$filasTrellis[0]['peso_st35'],3),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasTrellis[0]['st40c_spain']*$filasTrellis[0]['peso_st40c'],3),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasTrellis[0]['st50_spain']*$filasTrellis[0]['peso_st50'],3),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasTrellis[0]['st50c_spain']*$filasTrellis[0]['peso_st50c'],3),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasTrellis[0]['st60_spain']*$filasTrellis[0]['peso_st60'],3),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasTrellis[0]['st65c_spain']*$filasTrellis[0]['peso_st65c'],3),'LTBR',0,'C');
$pdf->Cell(17,4,round($filasTrellis[0]['st15c_spain']*$filasTrellis[0]['peso_st15c'],3),'LTBR',0,'C');
$totalFila =  $filasTrellis[0]['paf10_spain']  *$filasTrellis[0]['peso_paf10'] +
$filasTrellis[0]['st20_spain']*$filasTrellis[0]['peso_st20'] + 
$filasTrellis[0]['st25_spain']*$filasTrellis[0]['peso_st25'] + 
$filasTrellis[0]['st25c_spain']*$filasTrellis[0]['peso_st25c'] + 
$filasTrellis[0]['st35_spain']*$filasTrellis[0]['peso_st35'] +
$filasTrellis[0]['st40c_spain']*$filasTrellis[0]['peso_st40c'] +
$filasTrellis[0]['st50_spain']*$filasTrellis[0]['peso_st50'] +
$filasTrellis[0]['st50c_spain']*$filasTrellis[0]['peso_st50c'] +
$filasTrellis[0]['st60_spain']*$filasTrellis[0]['peso_st60']+
$filasTrellis[0]['st65c_spain']*$filasTrellis[0]['peso_st65c'] +
$filasTrellis[0]['st15c_spain']*$filasTrellis[0]['peso_st15c'];

$pdf->SetFillColor(69,185,68);
$pdf->Cell(17,4,round($totalFila,3),'LTBR',1,'C',TRUE);



//PIE TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(255,196,240);
$pdf->Cell(74,4,utf8_decode('Total'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasTrellis[0]['paf10_spain']*$filasTrellis[0]['peso_paf10'],1),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasTrellis[0]['st20_spain']*$filasTrellis[0]['peso_st20'],1),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasTrellis[0]['st25_spain']*$filasTrellis[0]['peso_st25'],1),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasTrellis[0]['st25c_spain']*$filasTrellis[0]['peso_st25c'],1),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasTrellis[0]['st35_spain']*$filasTrellis[0]['peso_st35'],1),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasTrellis[0]['st40c_spain']*$filasTrellis[0]['peso_st40c'],1),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasTrellis[0]['st50_spain']*$filasTrellis[0]['peso_st50'],1),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasTrellis[0]['st50c_spain']*$filasTrellis[0]['peso_st50c'],1),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasTrellis[0]['st60_spain']*$filasTrellis[0]['peso_st60'],1),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasTrellis[0]['st65c_spain']*$filasTrellis[0]['peso_st65c'],1),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasTrellis[0]['st15c_spain']*$filasTrellis[0]['peso_st15c'],1),'LTBR',0,'C',TRUE);
$totalFila =  $filasTrellis[0]['paf10_spain']  *$filasTrellis[0]['peso_paf10'] +
$filasTrellis[0]['st20_spain']*$filasTrellis[0]['peso_st20'] + 
$filasTrellis[0]['st25_spain']*$filasTrellis[0]['peso_st25'] + 
$filasTrellis[0]['st25c_spain']*$filasTrellis[0]['peso_st25c'] + 
$filasTrellis[0]['st35_spain']*$filasTrellis[0]['peso_st35'] +
$filasTrellis[0]['st40c_spain']*$filasTrellis[0]['peso_st40c'] +
$filasTrellis[0]['st50_spain']*$filasTrellis[0]['peso_st50'] +
$filasTrellis[0]['st50c_spain']*$filasTrellis[0]['peso_st50c'] +
$filasTrellis[0]['st60_spain']*$filasTrellis[0]['peso_st60']+
$filasTrellis[0]['st65c_spain']*$filasTrellis[0]['peso_st65c'] +
$filasTrellis[0]['st15c_spain']*$filasTrellis[0]['peso_st15c'];

$pdf->SetFillColor(108,157,221);
$pdf->Cell(17,4,round($totalFila,1),'LTBR',1,'C',TRUE);

$pdf->SetFillColor(99,218,64);
$pdf->Cell(74,4,utf8_decode('TOTAL TREILLIS'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($totalFila,1),'LTBR',1,'C',TRUE);

$TOTALSTOCKEXCEL = $TOTALSTOCKEXCEL + $totalFila;


//SEPARADOR CELDA
$pdf->Cell(15,4,utf8_decode(''),'',1,'C');
//TABLA CONGIGURACION CONSUMOS
//CABECERA TABLA
$pdf->SetFillColor(255,237,51);
$pdf->Cell(74,4,utf8_decode('Usine Sendin Spain'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 6'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 9'),'LTBR',0,'C',TRUE);
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
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d6'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d8'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d9'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d10'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d12'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d14'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d16'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d20'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d25'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d32'],2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d40'],2),'LTBR',0,'C',TRUE);
$totalFila = 
$filasConsumos[0]['consumo_d6'] + 
$filasConsumos[0]['consumo_d8'] + 
$filasConsumos[0]['consumo_d9'] + 
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
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d6']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d8']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d9']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d10']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d12']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d14']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d16']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d20']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d25']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d32']*$diasMes,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($filasConsumos[0]['consumo_d40']*$diasMes,2),'LTBR',0,'C',TRUE);
$totalFila = 
$filasConsumos[0]['consumo_d6'] * $diasMes + 
$filasConsumos[0]['consumo_d8'] * $diasMes + 
$filasConsumos[0]['consumo_d9'] * $diasMes + 
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
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d6']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d8']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d9']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d10']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d12']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d14']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d16']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d20']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d25']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d32']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round(($filasConsumos[0]['consumo_d40']*$diasMes)/$totalPorcenConsumo*100,2),'LTBR',0,'C',TRUE);

$totalFila = 
($filasConsumos[0]['consumo_d6']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos[0]['consumo_d8']*$diasMes)/$totalPorcenConsumo*100 +
($filasConsumos[0]['consumo_d9']*$diasMes)/$totalPorcenConsumo*100 +
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
$pdf->Cell(17,4,utf8_decode('Ø 6'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 8'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,utf8_decode('Ø 9'),'LTBR',0,'C',TRUE);
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
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d6_spain'] * $filasHA[0]['peso_d6']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d8_spain'] * $filasHA[0]['peso_d8']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d9_spain'] * $filasHA[0]['peso_d9']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d10_spain'] * $filasHA[0]['peso_d10']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d12_spain'] * $filasHA[0]['peso_d12']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d14_spain'] * $filasHA[0]['peso_d14']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d16_spain'] * $filasHA[0]['peso_d16']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d20_spain'] * $filasHA[0]['peso_d20']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d25_spain'] * $filasHA[0]['peso_d25']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d32_spain'] * $filasHA[0]['peso_d32']),'LTBR',0,'C');
$pdf->Cell(17,4,utf8_decode($filasHA[0]['d40_spain'] * $filasHA[0]['peso_d40']),'LTBR',0,'C');

$totalFila =  ($filasHA[0]['d6_spain'] * $filasHA[0]['peso_d6']) +
($filasHA[0]['d8_spain'] * $filasHA[0]['peso_d8']) +
($filasHA[0]['d9_spain'] * $filasHA[0]['peso_d9']) + 
($filasHA[0]['d10_spain'] * $filasHA[0]['peso_d10']) +
($filasHA[0]['d12_spain'] * $filasHA[0]['peso_d12']) +
($filasHA[0]['d14_spain'] * $filasHA[0]['peso_d14']) +
($filasHA[0]['d16_spain'] * $filasHA[0]['peso_d16']) +
($filasHA[0]['d20_spain'] * $filasHA[0]['peso_d20']) +
($filasHA[0]['d25_spain'] * $filasHA[0]['peso_d25']) +
($filasHA[0]['d32_spain'] * $filasHA[0]['peso_d32']) +
($filasHA[0]['d40_spain'] * $filasHA[0]['peso_d40']);



$stockBobines['d6'] =  $filasHA[0]['d6_spain'] * $filasHA[0]['peso_d6'];
$stockBobines['d8'] =  $filasHA[0]['d8_spain'] * $filasHA[0]['peso_d8'];
$stockBobines['d9'] =  $filasHA[0]['d9_spain'] * $filasHA[0]['peso_d9'];
$stockBobines['d10'] =  $filasHA[0]['d10_spain'] * $filasHA[0]['peso_d10'];
$stockBobines['d12'] =  $filasHA[0]['d12_spain'] * $filasHA[0]['peso_d12'];
$stockBobines['d14'] =  $filasHA[0]['d14_spain'] * $filasHA[0]['peso_d14'];
$stockBobines['d16'] =  $filasHA[0]['d16_spain'] * $filasHA[0]['peso_d16'];
$stockBobines['d20'] =  $filasHA[0]['d20_spain'] * $filasHA[0]['peso_d20'];
$stockBobines['d25'] =  $filasHA[0]['d25_spain'] * $filasHA[0]['peso_d25'];
$stockBobines['d32'] =  $filasHA[0]['d32_spain'] * $filasHA[0]['peso_d32'];
$stockBobines['d40'] =  $filasHA[0]['d40_spain'] * $filasHA[0]['peso_d40'];
$stockBobines['total'] =  $totalFila;



$stockActualTotal['d6'] =  $filasHA[0]['d6_spain'] * $filasHA[0]['peso_d6'];
$stockActualTotal['d8'] =  $filasHA[0]['d8_spain'] * $filasHA[0]['peso_d8'];
$stockActualTotal['d9'] =  $filasHA[0]['d9_spain'] * $filasHA[0]['peso_d9'];
$stockActualTotal['d10'] =  $filasHA[0]['d10_spain'] * $filasHA[0]['peso_d10'];
$stockActualTotal['d12'] =  $filasHA[0]['d12_spain'] * $filasHA[0]['peso_d12'];
$stockActualTotal['d14'] =  $filasHA[0]['d14_spain'] * $filasHA[0]['peso_d14'];
$stockActualTotal['d16'] =  $filasHA[0]['d16_spain'] * $filasHA[0]['peso_d16'];
$stockActualTotal['d20'] =  $filasHA[0]['d20_spain'] * $filasHA[0]['peso_d20'];
$stockActualTotal['d25'] =  $filasHA[0]['d25_spain'] * $filasHA[0]['peso_d25'];
$stockActualTotal['d32'] =  $filasHA[0]['d32_spain'] * $filasHA[0]['peso_d32'];
$stockActualTotal['d40'] =  $filasHA[0]['d40_spain'] * $filasHA[0]['peso_d40'];
$stockActualTotal['total'] =  $totalFila;


$totalBobinas  = $totalFila;
$pdf->SetFillColor(108,157,221);

$pdf->Cell(17,4,utf8_decode($totalFila),'LTBR',1,'C',TRUE);


//CALCULO SUMATORIOS COLUMNA
$sumCold6 = ($filasHA[1]['d6_spain'] * $filasHA[1]['peso_d6']) + ($filasHA[2]['d6_spain'] * $filasHA[2]['peso_d6']) + ($filasHA[3]['d6_spain'] * $filasHA[3]['peso_d6']) + ($filasHA[4]['d6_spain'] * $filasHA[4]['peso_d6']) ;
$sumCold8 = ($filasHA[1]['d8_spain'] * $filasHA[1]['peso_d8']) + ($filasHA[2]['d8_spain'] * $filasHA[2]['peso_d8']) + ($filasHA[3]['d8_spain'] * $filasHA[3]['peso_d8']) + ($filasHA[4]['d8_spain'] * $filasHA[4]['peso_d8']) ;
$sumCold9 = ($filasHA[1]['d9_spain'] * $filasHA[1]['peso_d9']) + ($filasHA[2]['d9_spain'] * $filasHA[2]['peso_d9']) + ($filasHA[3]['d9_spain'] * $filasHA[3]['peso_d9']) + ($filasHA[4]['d9_spain'] * $filasHA[4]['peso_d9']) ;
$sumCold10 = ($filasHA[1]['d10_spain'] * $filasHA[1]['peso_d10']) + ($filasHA[2]['d10_spain'] * $filasHA[2]['peso_d10']) + ($filasHA[3]['d10_spain'] * $filasHA[3]['peso_d10']) + ($filasHA[4]['d10_spain'] * $filasHA[4]['peso_d10']) ;
$sumCold12 = ($filasHA[1]['d12_spain'] * $filasHA[1]['peso_d12']) + ($filasHA[2]['d12_spain'] * $filasHA[2]['peso_d12']) + ($filasHA[3]['d12_spain'] * $filasHA[3]['peso_d12']) + ($filasHA[4]['d12_spain'] * $filasHA[4]['peso_d12']) ;
$sumCold14 = ($filasHA[1]['d14_spain'] * $filasHA[1]['peso_d14']) + ($filasHA[2]['d14_spain'] * $filasHA[2]['peso_d14']) + ($filasHA[3]['d14_spain'] * $filasHA[3]['peso_d14']) + ($filasHA[4]['d14_spain'] * $filasHA[4]['peso_d14']) ;
$sumCold16 = ($filasHA[1]['d16_spain'] * $filasHA[1]['peso_d16']) + ($filasHA[2]['d16_spain'] * $filasHA[2]['peso_d16']) + ($filasHA[3]['d16_spain'] * $filasHA[3]['peso_d16']) + ($filasHA[4]['d16_spain'] * $filasHA[4]['peso_d16']) ;
$sumCold20 = ($filasHA[1]['d20_spain'] * $filasHA[1]['peso_d20']) + ($filasHA[2]['d20_spain'] * $filasHA[2]['peso_d20']) + ($filasHA[3]['d20_spain'] * $filasHA[3]['peso_d20']) + ($filasHA[4]['d20_spain'] * $filasHA[4]['peso_d20']) ;
$sumCold25 = ($filasHA[1]['d25_spain'] * $filasHA[1]['peso_d25']) + ($filasHA[2]['d25_spain'] * $filasHA[2]['peso_d25']) + ($filasHA[3]['d25_spain'] * $filasHA[3]['peso_d25']) + ($filasHA[4]['d25_spain'] * $filasHA[4]['peso_d25']) ;
$sumCold32 = ($filasHA[1]['d32_spain'] * $filasHA[1]['peso_d32']) + ($filasHA[2]['d32_spain'] * $filasHA[2]['peso_d32']) + ($filasHA[3]['d32_spain'] * $filasHA[3]['peso_d32']) + ($filasHA[4]['d32_spain'] * $filasHA[4]['peso_d32']) ;
$sumCold40 = ($filasHA[1]['d40_spain'] * $filasHA[1]['peso_d40']) + ($filasHA[2]['d40_spain'] * $filasHA[2]['peso_d40']) + ($filasHA[3]['d40_spain'] * $filasHA[3]['peso_d40']) + ($filasHA[4]['d40_spain'] * $filasHA[4]['peso_d40']) ;
$totalFila = 0; 
$totalFila = $sumCold6 + $sumCold8 + $sumCold9 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;


$stockActualTotal['d6'] = $stockActualTotal['d6'] + $sumCold6;
$stockActualTotal['d8'] = $stockActualTotal['d8'] + $sumCold8;
$stockActualTotal['d9'] = $stockActualTotal['d9'] + $sumCold9;
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
$pdf->Cell(17,4,round($sumCold6,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold8,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold9,0),'LTBR',0,'C');
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
$sumCold6 = $filasADX[0]['d6_spain']*$filasADX[0]['peso_d6'] + $filasADX[1]['d6_spain']*$filasADX[1]['peso_d6'] + $filasADX[2]['d6_spain']*$filasADX[2]['peso_d6'];
$sumCold8 = $filasADX[0]['d8_spain']*$filasADX[0]['peso_d8'] + $filasADX[1]['d8_spain']*$filasADX[1]['peso_d8'] + $filasADX[2]['d8_spain']*$filasADX[2]['peso_d8'];
$sumCold9 = $filasADX[0]['d9_spain']*$filasADX[0]['peso_d9'] + $filasADX[1]['d9_spain']*$filasADX[1]['peso_d9'] + $filasADX[2]['d9_spain']*$filasADX[2]['peso_d9'];
$sumCold10 = $filasADX[0]['d10_spain']*$filasADX[0]['peso_d10'] + $filasADX[1]['d10_spain']*$filasADX[1]['peso_d10'] + $filasADX[2]['d10_spain']*$filasADX[2]['peso_d10'];
$sumCold12 = $filasADX[0]['d12_spain']*$filasADX[0]['peso_d12'] + $filasADX[1]['d12_spain']*$filasADX[1]['peso_d12'] + $filasADX[2]['d12_spain']*$filasADX[2]['peso_d12'];
$sumCold14 = $filasADX[0]['d14_spain']*$filasADX[0]['peso_d14'] + $filasADX[1]['d14_spain']*$filasADX[1]['peso_d14'] + $filasADX[2]['d14_spain']*$filasADX[2]['peso_d14'];
$sumCold16 = $filasADX[0]['d16_spain']*$filasADX[0]['peso_d16'] + $filasADX[1]['d16_spain']*$filasADX[1]['peso_d16'] + $filasADX[2]['d16_spain']*$filasADX[2]['peso_d16'];
$sumCold20 = $filasADX[0]['d20_spain']*$filasADX[0]['peso_d20'] + $filasADX[1]['d20_spain']*$filasADX[1]['peso_d20'] + $filasADX[2]['d20_spain']*$filasADX[2]['peso_d20'];
$sumCold25 = $filasADX[0]['d25_spain']*$filasADX[0]['peso_d25'] + $filasADX[1]['d25_spain']*$filasADX[1]['peso_d25'] + $filasADX[2]['d25_spain']*$filasADX[2]['peso_d25'];
$sumCold32 = $filasADX[0]['d32_spain']*$filasADX[0]['peso_d32'] + $filasADX[1]['d32_spain']*$filasADX[1]['peso_d32'] + $filasADX[2]['d32_spain']*$filasADX[2]['peso_d32'];
$sumCold40 = $filasADX[0]['d40_spain']*$filasADX[0]['peso_d40'] + $filasADX[1]['d40_spain']*$filasADX[1]['peso_d40'] + $filasADX[2]['d40_spain']*$filasADX[2]['peso_d40'];
$totalFila = 0; 
$totalFila = $sumCold6 + $sumCold8 + $sumCold9 + $sumCold10 + $sumCold12 + $sumCold14 + $sumCold16+ $sumCold20+ $sumCold25+ $sumCold32+ $sumCold40;


$stockActualTotalBobinas['d6'] = $stockActualTotal['d6'];
$stockActualTotalBobinas['d8'] = $stockActualTotal['d8'];
$stockActualTotalBobinas['d9'] = $stockActualTotal['d9'];
$stockActualTotalBobinas['d10'] = $stockActualTotal['d10'];
$stockActualTotalBobinas['d12'] = $stockActualTotal['d12'];
$stockActualTotalBobinas['d14'] = $stockActualTotal['d14'];
$stockActualTotalBobinas['d16'] = $stockActualTotal['d16'];
$stockActualTotalBobinas['d20'] = $stockActualTotal['d20'];
$stockActualTotalBobinas['d25'] = $stockActualTotal['d25'];
$stockActualTotalBobinas['d32'] = $stockActualTotal['d32'];
$stockActualTotalBobinas['d40'] = $stockActualTotal['d40'];
$stockActualTotalBobinas['total'] = $stockActualTotal['total'];

$stockActualTotal['d6'] = $stockActualTotal['d6'] + $sumCold6;
$stockActualTotal['d8'] = $stockActualTotal['d8'] + $sumCold8;
$stockActualTotal['d9'] = $stockActualTotal['d9'] + $sumCold9;
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
$pdf->Cell(74,4,utf8_decode('Stock ADX'),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold6,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold8,0),'LTBR',0,'C');
$pdf->Cell(17,4,round($sumCold9,0),'LTBR',0,'C');
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



//% TABLA
$pdf->SetFont('Helvetica','B',9);
$pdf->SetFillColor(108,157,221);
$pdf->Cell(74,4,utf8_decode('STOCK ACTUELTotal'),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d6'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d8'],0),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,round($stockActualTotal['d9'],0),'LTBR',0,'C',TRUE);
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


$consumoMes['d6']=round($filasConsumos[0]['consumo_d6']*$diasMes,2);
$consumoMes['d8']=round($filasConsumos[0]['consumo_d8']*$diasMes,2);
$consumoMes['d9']=round($filasConsumos[0]['consumo_d9']*$diasMes,2);
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
$pdf->Cell(17,4,$consumoMes['d6'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d8'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$consumoMes['d9'],'LTBR',0,'C',TRUE);
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
$pdf->Cell(17,4,$stockActualTotalBobinas['d6']-$consumoMes['d6'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d8']-$consumoMes['d8'],'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,$stockActualTotalBobinas['d9']-$consumoMes['d9'],'LTBR',0,'C',TRUE);
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


$diasStock['d6']=round($stockActualTotal['d6']/$filasConsumos[0]['consumo_d6'],0);
$diasStock['d8']=round($stockActualTotal['d8']/$filasConsumos[0]['consumo_d8'],0);
$diasStock['d9']=round($stockActualTotal['d9']/$filasConsumos[0]['consumo_d9'],0);
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
($diasStock['d6'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d6'],'LTBR',0,'C',TRUE);
($diasStock['d8'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d8'],'LTBR',0,'C',TRUE);
($diasStock['d9'] > 10) ? $pdf->SetFillColor(99,218,64) : $pdf->SetFillColor(255,0,0);
$pdf->Cell(17,4,$diasStock['d9'],'LTBR',0,'C',TRUE);
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
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d6'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d8'].' weekdays')),'LTBR',0,'C',TRUE);
$pdf->Cell(17,4,date('d/m/Y', strtotime(' + '.$diasStock['d9'].' weekdays')),'LTBR',0,'C',TRUE);
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

// no lo presentamos 
// $pdf->Output();
// lo guardamos para enviar
$attachment= $pdf->Output('sotck-spain.pdf', 'S');
$nombreAdjunto = 'STOCK-AFCAB-SPAIN.'.$fecha.'.pdf';


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


// correos dmolina@sendin.com  s.sendin@sendin.com l.besnard@sendin.com jlafuente@sendin.com
$recipientesSpain = array(
   //'aaznar@sendin.com' => 'Álvaro Aznar',
    'jlafuente@sendin.com' => 'Javier Lafuente',
    'dmolina@sendin.com' => 'Daniel Molina',
    'l.besnard@sendin.com' => 'Lionel Besnard',
    's.sendin@sendin.com' => 'Sergio Sendin',
    'produccion@sendin.com' => 'Produccion'
   //,'desarrolloweb@infoter.net' => 'Infoter Desarrollo'
);
foreach($recipientesSpain as $email => $name)
{
   $mail->AddCC($email, $name);
}

$mail->Subject = 'STOCK AFCAB SPAIN '.$fechaBonita;
$mail->msgHTML('STOCK AFCAB SPAIN '.$fechaBonita . '<br><br><p style="margin: 0cm;font-size:15px;font-family: Calibri, sans-serif;color: rgb(0, 0, 0);font-style: normal;font-weight: normal;text-align: start;text-indent: 0px;text-decoration: none;"><strong><span style="color: rgb(79, 129, 189);">Centrale d&rsquo;Achats</span></strong><span style="font-size:13px;"><br>P.I. Platea &ndash; Calle Viena N&ordm;6&nbsp;<br>44195 &ndash; Teruel &ndash; Espa&ntilde;a</span></p>
<p style="margin: 0cm;font-size:15px;font-family: Calibri, sans-serif;color: rgb(0, 0, 0);font-style: normal;font-weight: normal;text-align: start;text-indent: 0px;text-decoration: none;"><span style="font-size:13px;">Telf.&nbsp;</span><span style="font-size:13px;">+34 978 61 40 22</span></p>'); 
$mail->AltBody = 'STOCK AFCAB SPAIN '.$fechaBonita;
$mail->AddStringAttachment($attachment, $nombreAdjunto);
//$mail->addAttachment('docs/brochure.pdf'); //Attachment, can be skipped

$mail->send();

print json_encode(true);


//$pdf->Output();


?>