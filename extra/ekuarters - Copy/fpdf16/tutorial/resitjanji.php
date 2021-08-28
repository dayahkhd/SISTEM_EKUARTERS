<?php
session_start();
require('../fpdf.php');
require('../../../conskk.php');
require('../../checklogged.php');

$u = $_SESSION['uid'];
$ptj = $_SESSION['ptj'];
$ptj2 = $_SESSION['ptj2'];

$qu = mysql_query("select * from user where id = '$u'");
$du = mysql_fetch_array($qu);

require('../../array.php');
function tukar($tukardate)
{
    $y = substr($tukardate, 0,4);
    $m = substr($tukardate, 5,2);
    $d = substr($tukardate, 8,2);
    return $tarikh = "$d-$m-$y";
}

class PDF extends FPDF
{
//Load data


 
function LoadData($file)
{
	//Read file lines
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
		$data[]=explode(';',chop($line));
	return $data;
}

//Simple table
function BasicTable($header,$data)
{
	//Header
	foreach($header as $col)
		$this->Cell(40,7,$col,1);
	$this->Ln();
	//Data
	foreach($data as $row)
	{
		foreach($row as $col)
			$this->Cell(40,6,$col,1);
		$this->Ln();
	}
}

//Better table
function ImprovedTable($header,$data)
{
	//Column widths
	$w=array(40,35,40,45);
	//Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	//Data
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR');
		$this->Cell($w[1],6,$row[1],'LR');
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		$this->Ln();
	}
	//Closure line
	$this->Cell(array_sum($w),0,'','T');
}

//Colored table
function FancyTable($header,$data)
{
	//Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	//Header
	$w=array(40,35,40,45);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	//Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	//Data
	$fill=false;
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
		$this->Ln();
		$fill=!$fill;
	}
	$this->Cell(array_sum($w),0,'','T');
}
}
$tarikh = date("d/m/Y");

$no = $_GET['no'];//$_GET['id'];

$sq1 = mysql_query("select * from temujanji where no='$no' and ptj='$ptj'");
$rq1 = mysql_fetch_array($sq1);

$sq3 = mysql_query("select * from kodptj where kod='$ptj' and abbr='$ptj2'");
$rq3 = mysql_fetch_array($sq3);

$sq4 = mysql_query("select * from bandar where susun = '$rq1[bandar]'");
$rq4 = mysql_fetch_array($sq4);

$sq5 = mysql_query("select * from negeri where id = '$rq1[negeri]'");
$rq5 = mysql_fetch_array($sq5);

$qa3 = mysql_query("select * from pakar where susun = '$rq1[pakar]'");
$da3 = mysql_fetch_array($qa3);

$q15 = mysql_query("select * from zon where zonid = '$rq1[zon]'");
$d15 = mysql_fetch_array($q15);

$zon = $d15[zon];

$q16 = mysql_query("select * from kampung where kmpgid = '$rq1[kmpg]'");
$d16 = mysql_fetch_array($q16);
$kmpg = strtoupper($d16[kmpg]);

$pdf=new PDF();
//Column titles
//$header=array('Country','Capital','Area (sq km)','Pop. (thousands)');
//Data loading
//$data=$pdf->LoadData('countries.txt');
$namas = htmlspecialchars_decode($d[nama], ENT_QUOTES);
$pdf->AddPage();
//$pdf->BasicTable($header,$data);
for($i=1;$i<3;$i++)
{
    if($i == 1)
    {
        $hdr = "SALINAN PESAKIT";
    }
    elseif($i == 2)
    {
        $hdr = "SALINAN KLINIK KESIHATAN";
    }
    elseif($i == 3)
    {
    $hdr = "Salinan Pejabat";
    }
//$pdf->AddPage();

$pdf->Image('jata.jpg',10,8,33);
$pdf->Image('jata.jpg',10,145,33);

$pdf->Cell(40,1,' ');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,5,$rq3[nama]);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(65,5,$hdr);
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,1,' ');
$pdf->Cell(100,5,'KEMENTERIAN KESIHATAN MALAYSIA');
$pdf->Cell(45,5,"Resit Temujanji");
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,1,' ');
$pdf->Cell(95,5,$rq3[alamat]);
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,1,' ');
$pdf->Cell(95,5,"No Tel : ".$rq3[tel]."      Faks : ".$rq3[fax]);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial','B',10);
$pdf->Cell(115,5,'MAKLUMAT PESAKIT');
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(25,5,'Nama Pesakit ');
$pdf->SetFont('Arial','',10);
$pdf->Cell(95,5,": ".$rq1[nama]);
$pdf->Ln();
$pdf->Cell(25,5,'No KP/Pasport ');
$pdf->Cell(65,5,": ".$rq1[docno]);
$pdf->Ln();
$pdf->Cell(25,5,'Alamat ');
$pdf->Cell(95,5,": ".$rq1[alamat]);
$pdf->Ln();
$pdf->Cell(25,5,' ');
$daerah = strtoupper($rq4[nama]);
$pdf->Cell(95,5,"  ".$kmpg."  ".$rq1[poskod]." ".$daerah);
$pdf->Ln();
$pdf->Cell(25,5,' ');
$negeri = strtoupper($rq5[nama]);
$pdf->Cell(95,5,"  ".$negeri);
$pdf->Ln();
$pdf->Cell(25,5,'No Tel ');
$pdf->Cell(95,5,": ".$rq1[enset]);

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(115,5,'TEMUJANJI PESAKIT');
$pdf->SetFont('Arial','',10);
$pdf->Ln();
$pdf->Cell(25,5,'Disiplin');
$pdf->Cell(95,5,": ".$da3[nama]);
$pdf->Ln();

$pdf->Cell(25,5,'Tarikh ');
$tarikh = tukar($rq1[tarikh]);
$pdf->Cell(95,5,": ".$tarikh);
$pdf->Ln();
$pdf->Cell(25,5,'Masa ');
foreach($waktu as $key => $value)
{
  if($rq1[masa] == $key)
  {
    $masa = $value;
  }
}
$pdf->Cell(95,5,": ".$masa);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(8,5,' ');
$pdf->Cell(90,5,'(Ini adalah cetakan komputer. Tandatangan tidak diperlukan)',0,0,'R');
$pdf->Ln();
$pdf->Cell(1,5,'.......................................................................................................................................................................................................................');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
















/*
//$disc = $dh[discaj];
if($dh[tbil] > 0){
  $disc = $dh[tbil];
  $dsc = explode("-",$disc);
  $dis = "$dsc[2]/$dsc[1]/$dsc[0]";
}else{
  $disc = date("Y-m-d");
  $dsc = mysql_query("update hasil set tbil = '$disc' where rn = '$rn' and ptj = '$du[phone]'");
  $dis = date("d/m/Y");
}
$pdf->Cell(70,5,$namas);
$pdf->Cell(65,5,' ');
$pdf->Cell(25,5,'Tarikh Bil',1);
$pdf->Cell(30,5,$dis,1);
$pdf->Ln();
$pdf->Cell(70,5,$d[alamat]);
$pdf->Cell(65,5,' ');
$pdf->Cell(25,5,'RN',1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,5,$rn,1);
$pdf->SetFont('Arial','',9);
$pdf->Ln();
$pdf->Cell(70,5,$addr);
$pdf->Cell(65,5,' ');
$pdf->Cell(25,5,'Pengenalan',1);
$pdf->Cell(30,5,$d[docno],1);
$pdf->Ln();
$pdf->Cell(70,5,$jamin);
$pdf->Cell(65,5,' ');
$pdf->Cell(25,5,'Warganegara',1);
$pdf->Cell(30,5,$dwr[nama],1);
$pdf->Ln();
$pdf->Cell(70,5,' ');
$pdf->Cell(65,5,' ');
$pdf->Cell(25,5,'Wad / Kelas',1);
$pdf->Cell(30,5,$wad,1);
$pdf->Ln();
$pdf->Cell(30,1,' ');
$pdf->Ln();
$pdf->Cell(180,4,'Sila sempurnakan bayaran untuk perkhidmatan yang tersebut di bawah seberapa segera. Cek, Kiriman Wang atau Wang Pos ');
$pdf->Ln();
$pdf->Cell(180,4,$addptj);
$pdf->Ln();
$pdf->Cell(30,1,' ');
$pdf->Ln();
$pdf->Cell(65,5,'Butir-butir Caj',1);
$pdf->Cell(20,5,'RM',1);
$pdf->Cell(10,5,'sen',1);
$pdf->Cell(65,5,'Butir-butir Caj',1);
$pdf->Cell(20,5,'RM',1);
$pdf->Cell(10,5,'sen',1);
$pdf->Ln();
$pdf->Cell(65,5,'Wad',1);
if($cajwad[0] > 0){
  $pdf->Cell(20,5,$cajwad[0],1,0,'R');
  $pdf->Cell(10,5,$cajwad[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Cell(65,5,'Ujian Makmal',1);
if($cajmakmal[0] > 0){
  $pdf->Cell(20,5,$cajmakmal[0],1,0,'R');
  $pdf->Cell(10,5,$cajmakmal[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Ln();
$pdf->Cell(65,5,'Bersalin',1);
if($cajbersalin[0] > 0){
  $pdf->Cell(20,5,$cajbersalin[0],1,0,'R');
  $pdf->Cell(10,5,$cajbersalin[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Cell(65,5,'Radiologi',1);
if($cajxray[0] > 0){
  $pdf->Cell(20,5,$cajxray[0],1,0,'R');
  $pdf->Cell(10,5,$cajxray[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Ln();
$pdf->Cell(65,5,'Bilik Bersalin',1);
if($cajfisio[0] > 0){
  $pdf->Cell(20,5,$cajfisio[0],1,0,'R');
  $pdf->Cell(10,5,$cajfisio[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Cell(65,5,'Pembedahan',1);
if($cajbedah[0] > 0){
  $pdf->Cell(20,5,$cajbedah[0],1,0,'R');
  $pdf->Cell(10,5,$cajbedah[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Ln();
$pdf->Cell(65,5,'Anggota Tiruan',1);
if($cajeeg[0] > 0){
  $pdf->Cell(20,5,$cajeeg[0],1,0,'R');
  $pdf->Cell(10,5,$cajeeg[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Cell(65,5,'Kardiologi',1);
if($cajecg[0] > 0){
  $pdf->Cell(20,5,$cajecg[0],1,0,'R');
  $pdf->Cell(10,5,$cajecg[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Ln();
$pdf->Cell(65,5,'Radioterapi',1);
if($cajradio[0] > 0){
  $pdf->Cell(20,5,$cajradio[0],1,0,'R');
  $pdf->Cell(10,5,$cajradio[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Cell(65,5,'Nefrologi',1);
if($cajnefro[0] > 0){
  $pdf->Cell(20,5,$cajnefro[0],1,0,'R');
  $pdf->Cell(10,5,$cajnefro[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Ln();
$pdf->Cell(65,5,'Oftalmologi',1);
if($cajoftal[0] > 0){
  $pdf->Cell(20,5,$cajoftal[0],1,0,'R');
  $pdf->Cell(10,5,$cajoftal[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Cell(65,5,'ENT',1);
if($cajent[0] > 0){
  $pdf->Cell(20,5,$cajent[0],1,0,'R');
  $pdf->Cell(10,5,$cajent[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Ln();
$pdf->Cell(65,5,'Pergigian',1);
if($cajgigi[0] > 0){
  $pdf->Cell(20,5,$cajgigi[0],1,0,'R');
  $pdf->Cell(10,5,$cajgigi[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Cell(65,5,'Neurologi',1);
if($cajneuro[0] > 0){
  $pdf->Cell(20,5,$cajneuro[0],1,0,'R');
  $pdf->Cell(10,5,$cajneuro[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Ln();
$pdf->Cell(65,5,'Psikiatrik',1);
if($cajpsi[0] > 0){
  $pdf->Cell(20,5,$cajpsi[0],1,0,'R');
  $pdf->Cell(10,5,$cajpsi[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Cell(65,5,'Kegunaan Prostesis',1);
if($cajpros[0] > 0){
  $pdf->Cell(20,5,$cajpros[0],1,0,'R');
  $pdf->Cell(10,5,$cajpros[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Ln();
$pdf->Cell(65,5,'Laporan Perubatan',1);
if($cajjangkit[0] > 0){
  $pdf->Cell(20,5,$cajjangkit[0],1,0,'R');
  $pdf->Cell(10,5,$cajjangkit[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Cell(65,5,'Rawatan',1);
if($cajrawat[0] > 0){
  $pdf->Cell(20,5,$cajrawat[0],1,0,'R');
  $pdf->Cell(10,5,$cajrawat[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Ln();
$pdf->Cell(10,2,' ');
$pdf->Ln();
$pdf->Cell(65,5,'Tarikh Masuk',1);
$pdf->Cell(30,5,$masuk,1);
$pdf->Cell(65,5,'Jumlah Bil Hospital',1);
if($jumdiscaj[0] > 0){
  $pdf->Cell(20,5,$jumdiscaj[0],1,0,'R');
  $pdf->Cell(10,5,$jumdiscaj[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Ln();
$pdf->Cell(65,5,'Tarikh Discaj',1);
$pdf->Cell(30,5,$discaj,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(65,5,$deps,1);
if($deposit[0] > 0){
  $pdf->Cell(20,5,$deposit[0],1,0,'R');
  $pdf->Cell(10,5,$deposit[1],1);
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->Cell(65,5,$ans,1);
if($ansuran[0] > 0){
  $pdf->Cell(20,5,$ansuran[0],1,0,'R');
  if($ansuran[1] > 0){
  $pdf->Cell(10,5,$ansuran[1],1);
  }else{
  $pdf->Cell(10,5,'00',1);
  }
}else{
  $pdf->Cell(20,5,' ',1,0,'R');
  $pdf->Cell(10,5,' ',1);
}
$pdf->Cell(65,5,'Jumlah Perlu Dibayar',1);
//if(($bakibil[0] > 0)||($bakibil[0] < 0)){
  $pdf->Cell(20,5,$bakibil[0],1,0,'R');
  if($bakibil[1] > 0){
  $pdf->Cell(10,5,$bakibil[1],1);
  }else{
  $pdf->Cell(10,5,'00',1);
  }
//}else{
//  $pdf->Cell(20,5,' ',1,0,'R');
//  $pdf->Cell(10,5,' ',1);
//}
$pdf->Ln();
$pdf->Cell(15,5,'Majikan : ');
$pdf->Cell(15,5,$d[majikan]);
$pdf->Ln();
$pdf->Cell(15,5,' ');
$pdf->Cell(15,5,$d[majalamat]);
$pdf->Ln();
$pdf->Cell(100,5,$mad);
$pdf->Cell(90,5,'(Ini adalah cetakan komputer. Tandatangan tidak diperlukan)',0,0,'R');
$pdf->Ln();
$pdf->Cell(30,5,'.......................................................................................................................................................................................................................');
$pdf->Ln();
$pdf->Cell(30,6,' ');
$pdf->Ln();
*/
}

//$pdf->ImprovedTable($header,$data);
//$pdf->AddPage();
//$pdf->FancyTable($header,$data);
$pdf->Output();
?>
