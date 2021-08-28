<?php
session_start();

require('../fpdf.php');
require('../../../conskk.php');
//require('../../checklogged.php');

$u = $_SESSION['uid'];
$ptj = $_SESSION['ptj'];
$ptj2 = $_SESSION['ptj2'];

$qu = mysql_query("select * from user where id = '$u'");
$du = mysql_fetch_array($qu);

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
//$refno = "201306251007232106733677";
$refno = $_GET['refno'];
$q = mysql_query("select * from visitkk where refno = '$refno' and ptj='$ptj'");
$d = mysql_fetch_array($q);

$q2 = mysql_query("select * from patient where docno = '$d[docno]'");
$d2 = mysql_fetch_array($q2);

//$nokp = "481224085796";
$nokp = "$d2[docno]";

$url = $_SERVER[SERVER_ADDR];
$imgurl = "http://$url/eprskk/fpdf16/tutorial/barcode.php?text=$nokp&size=23"; 

file_put_contents("/var/www/eprskk/fpdf16/tutorial/image/$nokp.png", file_get_contents("$imgurl"));



$q3 = mysql_query("select * from dokumen where id = '$d2[docs]'");
$d3 = mysql_fetch_array($q3);

$q4 = mysql_query("select * from bandar where susun = '$d2[bandar]'");
$d4 = mysql_fetch_array($q4);

$q5 = mysql_query("select * from negeri where id = '$d2[negeri]'");
$d5 = mysql_fetch_array($q5);

$q6 = mysql_query("select * from jantina where id = '$d2[jantina]'");
$d6 = mysql_fetch_array($q6);

$q7 = mysql_query("select * from agama where id = '$d2[agama]'");
$d7 = mysql_fetch_array($q7);

$q8 = mysql_query("select * from bangsa where id = '$d2[bangsa]'");
$d8 = mysql_fetch_array($q8);

$q9 = mysql_query("select * from warga where id = '$d2[warga]'");
$d9 = mysql_fetch_array($q9);

$q10 = mysql_query("select * from aduan where id = '$d[aduan]'");
$d10 = mysql_fetch_array($q10);

$q12 = mysql_query("select * from punca where id = '$d[punca]'");
$d12 = mysql_fetch_array($q12);

$q13 = mysql_query("select * from pakar where susun = '$d[pakar]'");
$d13 = mysql_fetch_array($q13);

$q14 = mysql_query("select * from disiplin2 where susun = '$d[disiplin]'");
$d14 = mysql_fetch_array($q14);

$q15 = mysql_query("select * from zon where zonid = '$d[zon]'");
$d15 = mysql_fetch_array($q15);

$zon = $d15[zon];

$q16 = mysql_query("select * from kampung where kmpgid = '$d2[kmpg]'");
$d16 = mysql_fetch_array($q16);
$kmpg = $d16[kmpg];

if($zon == "") { $zon = "ZON LKO"; }

$by = explode("-",$d2[bday]);
$tr = explode("-",$d[tarikh]);
$rns = "RN $rn";
$tm = "$tr[2]/$tr[1]/$tr[0]";

$pr = explode(" ", $d13[nama]);
$pakar = "$d13[nama2]";
$pakar2 = "$d13[nama]";

$docs = "$d3[kod] $d2[docno]";
$umur = "$d2[umur] TH $d2[umurbln] BL $d2[umurhr] HR";

$bday = "T/L $by[2]/$by[1]/$by[0]";
$waris = "Waris : $d[waris]";
$add2 = strtoupper("$d2[poskod] $d4[nama] $d5[nama]");
$tel = "Tel : $d2[tepon] $d2[enset]";

$kelas = "Kelas : $d[kelaswad]";
$wad = "$d[wad] ($d[disiplin])";

$jantina = strtoupper("$d6[nama]/$d7[nama]");
$telwaris = "Tel : $d[wenset]";

if($d[masa] < 12){ $ante = "AM"; }else{ $ante = "PM"; }
$masa = "$d[masa] $ante";
$bayar = "RM $d[deposit]";
$namas = htmlspecialchars_decode($d2[nama], ENT_QUOTES);
$nama = substr($namas,0,56);
$nama2 = substr($namas,0,20);
$alamat = substr($d2[alamat],0,56);

$qrnp = mysql_query("select * from patientrec where pakar='$d[pakar]'  and patientid='$d[patientid]'");
$rowp = mysql_fetch_array($qrnp);				
$nopenyakit = $rowp[pakarno];

if($d[namahosp] != "")
{
	$punca = "$d12[nama] ($d[namahosp])";
}
else
{	
	$punca = "$d12[nama]";
}

$pdf = new FPDF('P','mm',array(110,80));

$pdf->SetTopMargin(4);

for($i=1; $i<=1; $i++)
{
	$pdf->AddPage();

	$pdf->Image("image/$nokp.png",0,4, 60, 9);

	$pdf->SetLeftMargin(3);
	$pdf->SetFont('Arial','B',10);	
	//$pdf->Cell(43,5,' ',0);
	$pdf->Cell(50,5,'',0,0,'L');
	$pdf->Cell(41,4,$ptj2." - ".$zon,0,0,'R');
	$pdf->Ln();
	$pdf->SetFont('Arial','B',10);	
	$pdf->Cell(50,5,'',0,0,'L');
	$pdf->Cell(48,5,$d2[parentid],0,0,'R');
	$pdf->Ln();
	//$pdf->Cell(70,4,'');
	//$pdf->Cell(30,4,'',0,0,'R');
	//$pdf->Ln();
	$pdf->SetFont('Arial','B',14);
	//$pdf->Cell(45,5,' ');
	$pdf->Cell(50,5,$pakar." ".$nopenyakit,0,0,'L');
	$pdf->Cell(49,5,$docs,0,0,'R');

	$pdf->Ln();
	$pdf->SetFont('Arial','B',10);
	//$pdf->Cell(45,4,' ');
	$nama = wordwrap($nama, 30, "\n");
	$pdf->Cell(50,4,$nama);
	$pdf->SetFont('Arial','',9);

	$pdf->Ln();
	//$pdf->Cell(45,4,' ');
	$pdf->Cell(50,4,$alamat);

	$pdf->Ln();
	//$pdf->Cell(45,4,' ');
	$pdf->Cell(50,4,$kmpg." ".$add2);

	$pdf->Ln();
	//$pdf->Cell(45,4,' ');
	$xx = "$umur $bday"; 
	$pdf->Cell(70,4,$xx);
	$pdf->Cell(29,4,$jantina,0,0,'R');

	$pdf->Ln();
	//$pdf->Cell(45,4,' ');
	$pdf->Cell(50,4,$tel);
	$pdf->Cell(49,4,$d8[nama]."/".$d9[nama],0,0,'R');

	$pdf->Ln();
	//$pdf->Cell(45,4,' ');
	$pdf->Cell(50,4,$waris);
	$pdf->Cell(49,4,$d14[nama],0,0,'R');

	$pdf->Ln();
	//$pdf->Cell(45,4,' ');
	$pdf->Cell(50,4,$telwaris);
	$pdf->Cell(49,4,"No Resit : ".$d[noresit]."    ".$bayar,0,0,'R');

	$pdf->Ln();
	//$pdf->Cell(45,6,' ');
	$pdf->Cell(50,4,"T/Daftar : ".$tm."  ".$masa);
	$pdf->Cell(49,4,$punca,0,0,'R');
}	

$pdf->AddPage();
$pdf->SetLeftMargin(3);
$pdf->SetFont('Arial','B',11);
//$pdf->Cell(43,4,' ');
$pdf->Cell(50,4,$pakar);
$pdf->Cell(50,4,$pakar);
$pdf->Ln();
$pdf->SetFont('Arial','',9);
//$pdf->Cell(43,4,' ');
$pdf->Cell(50,4,'Tkh      /     /');
$pdf->Cell(50,4,'Tkh      /     /');
$pdf->Ln();
//$pdf->Cell(43,4,' ');
$pdf->Cell(50,4,$d2[docno]);
$pdf->Cell(50,4,$d2[docno]);
$pdf->Ln();
//$pdf->Cell(43,4,' ');
$pdf->Cell(50,4,$nama2);
$pdf->Cell(50,4,$nama2);
$pdf->Ln();
//$pdf->Cell(43,4,' ');
$pdf->Cell(50,4,'Unit');
$pdf->Cell(50,4,'Unit');
$pdf->Ln();
$pdf->Cell(50,4,' ');
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
//$pdf->Cell(43,4,' ');
$pdf->Cell(50,4,$pakar);
$pdf->Cell(50,4,$pakar);
$pdf->Ln();
$pdf->SetFont('Arial','',9);
//$pdf->Cell(43,4,' ');
$pdf->Cell(50,4,'Tkh      /     /');
$pdf->Cell(50,4,'Tkh      /     /');
$pdf->Ln();
//$pdf->Cell(43,4,' ');
$pdf->Cell(50,4,$d2[docno]);
$pdf->Cell(50,4,$d2[docno]);
$pdf->Ln();
//$pdf->Cell(43,4,' ');
$pdf->Cell(50,4,$nama2);
$pdf->Cell(50,4,$nama2);
$pdf->Ln();
//$pdf->Cell(43,4,' ');
$pdf->Cell(50,4,'Unit');
$pdf->Cell(50,4,'Unit');
$pdf->Ln();

$pdf->Output();
?>
