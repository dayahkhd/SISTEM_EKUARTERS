<?php
require('../fpdf.php');
require('../../cons.php');
require('../../checklogged.php');
$u = $_SESSION['uid'];
$qu = mysql_query("select * from user where id = '$u'");
$du = mysql_fetch_array($qu);
$qp = mysql_query("select * from kodptj where id = '$du[phone]'");
$dp = mysql_fetch_array($qp);

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

$bln = $_POST['bln'];
$thn = $_POST['thn'];

$tar = date("Y-m-d");
$mas = date("H:i:s");
$cet = "Cetak Lampiran A Laporan JKNJ Bulan $bln";
$qn3 = mysql_query("insert into logs (tarikh, masa, author, remarks, ptj) values ('$tar', '$mas', '$u', '$cet', '$du[phone]')");
$bull = "Bulan Terdahulu $thn";
$lap2 = "Lampiran A Bulan $bln";
$pdf=new PDF('L','mm','A4');
//$pdf=new PDF();
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->Cell(25,15,$lap2);
$pdf->Ln();
$pdf->SetFont('Arial','',8);
$pdf->Cell(25,5,'Nama PTJ',1);
$pdf->Cell(204,5,$dp[nama],1);
$pdf->Ln();
$pdf->Cell(25,5,' ',1);
$pdf->Cell(34,5,'Bayaran Dikenakan',1);
$pdf->Cell(34,5,'Amaun Dikutip',1);
$pdf->Cell(68,5,'Tunggakan',1);
$pdf->Cell(68,5,'Jumlah Kutipan Bagi Bil-bil Tertunggak',1);
$pdf->Ln();
$pdf->Cell(25,5,'Kelas/Kategori',1);
$pdf->Cell(16,5,' ',1);
$pdf->Cell(18,5,' ',1);
$pdf->Cell(16,5,' ',1);
$pdf->Cell(18,5,' ',1);
$pdf->Cell(34,5,'Bulan Ini',1);
$pdf->Cell(34,5,$bull,1);
$pdf->Cell(34,5,$bull,1);
$pdf->Cell(34,5,'Tahun-tahun Lepas',1);
$pdf->Ln();
$pdf->Cell(25,5,' ',1);
$pdf->Cell(16,5,'Bil.Pesakit',1);
$pdf->Cell(18,5,'Amaun (RM)',1);
$pdf->Cell(16,5,'Bil.Pesakit',1);
$pdf->Cell(18,5,'Amaun (RM)',1);
$pdf->Cell(16,5,'Bil.Pesakit',1);
$pdf->Cell(18,5,'Amaun (RM)',1);
$pdf->Cell(16,5,'Bil.Pesakit',1);
$pdf->Cell(18,5,'Amaun (RM)',1);
$pdf->Cell(16,5,'Bil.Pesakit',1);
$pdf->Cell(18,5,'Amaun (RM)',1);
$pdf->Cell(16,5,'Bil.Pesakit',1);
$pdf->Cell(18,5,'Amaun (RM)',1);
$pdf->Ln();

    $qks = mysql_query("select * from kes2");
	$nks = mysql_num_rows($qks);
	$na1b = 0; $na2b = 0; $na3b = 0; $na4b = 0; $na5b = 0;
    $jdis1b = 0; $jpay1b = 0; $jbil1b = 0; $jbil2b = 0; $jpay2b = 0; $jpay3b = 0;
	for($iks=0;$iks<$nks;$iks++){
	$dks = mysql_fetch_array($qks);
	$kks = $iks + 1;

$pdf->Cell(25,5,$dks[nama],1);
$pdf->Cell(16,5,' ',1);
$pdf->Cell(18,5,' ',1);
$pdf->Cell(16,5,' ',1);
$pdf->Cell(18,5,' ',1);
$pdf->Cell(16,5,' ',1);
$pdf->Cell(18,5,' ',1);
$pdf->Cell(16,5,' ',1);
$pdf->Cell(18,5,' ',1);
$pdf->Cell(16,5,' ',1);
$pdf->Cell(18,5,' ',1);
$pdf->Cell(16,5,' ',1);
$pdf->Cell(18,5,' ',1);
$pdf->Ln();

	for($jks=1;$jks<4;$jks++){
	$jdis1 = 0; $jpay1 = 0; $jbil1 = 0; $jbil2 = 0; $jpay2 = 0; $jpay3 = 0;
	$qa1 = mysql_query("select * from hasil where discaj like '$thn-$bln%' and ptj = '$du[phone]' and kes = '$kks' and kelaswad = '$jks'");
	$na1 = mysql_num_rows($qa1);
	for($ia1=0;$ia1<$na1;$ia1++){
	$da1 = mysql_fetch_array($qa1);
	$jdis1 = $jdis1 + $da1[jumdiscaj];
	}
	$qa2 = mysql_query("select * from hasil where discaj like '$thn-$bln%' and ptj = '$du[phone]' and kes = '$kks' and kelaswad = '$jks' and bakibil > '0.00'");
	$na2 = mysql_num_rows($qa2);
	for($ia2=0;$ia2<$na2;$ia2++){
	$da2 = mysql_fetch_array($qa2);
	$jpay1 = $jpay1 + $da2[deposit] + $da2[bpenuh] + $da2[bans1];
	$jbil1 = $jbil1 + $da2[bakibil];
	}
	$qa3 = mysql_query("select * from hasil where discaj like '$thn%' and ptj = '$du[phone]' and kes = '$kks' and kelaswad = '$jks' and bakibil > '0.00'");
	$na3 = mysql_num_rows($qa3);
	for($ia3=0;$ia3<$na3;$ia3++){
	$da3 = mysql_fetch_array($qa3);
	$jbil2 = $jbil2 + $da3[bakibil];
	}
	$jbil2 = $jbil2 - $jbil1;
	$qa4 = mysql_query("select * from hasil where discaj like '$thn%' and ptj = '$du[phone]' and kes = '$kks' and kelaswad = '$jks'");
	$na4 = mysql_num_rows($qa4);
	for($ia4=0;$ia4<$na4;$ia4++){
	$da4 = mysql_fetch_array($qa4);
	$jpay2 = $jpay2 + $da4[deposit] + $da4[bpenuh] + $da4[bans1];
	}
	$qa5 = mysql_query("select * from hasil where ptj = '$du[phone]' and kes = '$kks' and kelaswad = '$jks'");
	$na5 = mysql_num_rows($qa5);
	for($ia5=0;$ia5<$na5;$ia5++){
	$da5 = mysql_fetch_array($qa5);
	$jpay3 = $jpay3 + $da5[deposit] + $da5[bpenuh] + $da5[bans1];
	}
	$kelas = "Kelas $jks";

$pdf->Cell(25,5,$kelas,1);
$pdf->Cell(16,5,$na1,1);
$pdf->Cell(18,5,$jdis1,1);
$pdf->Cell(16,5,$na2,1);
$pdf->Cell(18,5,$jpay1,1);
$pdf->Cell(16,5,$na2,1);
$pdf->Cell(18,5,$jbil1,1);
$pdf->Cell(16,5,$na3,1);
$pdf->Cell(18,5,$jbil2,1);
$pdf->Cell(16,5,$na4,1);
$pdf->Cell(18,5,$jpay2,1);
$pdf->Cell(16,5,$na5,1);
$pdf->Cell(18,5,$jpay3,1);
$pdf->Ln();

    $na1b = $na1b + $na1;
	$jdis1b = $jdis1b + $jdis1;
	$na2b = $na2b + $na2;
	$jpay1b = $jpay1b + $jpay1;
	$jbil1b = $jbil1b + $jbil1;
	$na3b = $na3b + $na3;
	$jbil2b = $jbil2b + $jbil2;
	$na4b = $na4b + $na4;
	$jpay2b = $jpay2b + $jpay2;
	$na5b = $na5b + $na5;
	$jpay3b = $jpay3b + $jpay3;
	}
	}

$pdf->Cell(25,5,'Jumlah Besar',1);
$pdf->Cell(16,5,$na1b,1);
$pdf->Cell(18,5,$jdis1b,1);
$pdf->Cell(16,5,$na2b,1);
$pdf->Cell(18,5,$jpay1b,1);
$pdf->Cell(16,5,$na2b,1);
$pdf->Cell(18,5,$jbil1b,1);
$pdf->Cell(16,5,$na3b,1);
$pdf->Cell(18,5,$jbil2b,1);
$pdf->Cell(16,5,$na4b,1);
$pdf->Cell(18,5,$jpay2b,1);
$pdf->Cell(16,5,$na5b,1);
$pdf->Cell(18,5,$jpay3b,1);
$pdf->Ln();

$pdf->Output();
?>
