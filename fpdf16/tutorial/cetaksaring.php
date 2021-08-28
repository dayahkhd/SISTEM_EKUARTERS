<?php
session_start();
require('../fpdf.php');
require('../../../conskklab.php');
//require('../../checklogged.php');

//$u = $_SESSION['uid'];
//$ptj = $_SESSION['ptj'];
//$ptj2 = $_SESSION['ptj2'];

//$qu = mysql_query("select * from user where id = '$u'");
//$du = mysql_fetch_array($qu);

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



$no = $_GET['idsaring'];//$_GET['id'];
//$pakar = $_GET['pakar'];

//if ($pakar == '5')
//{ $namapakar = 'KLINIK PERGIGIAN'; }


//else 

//{

//$qpakar = mysql_query("select * from pakar where susun = '$pakar' ");
//$rpakar = mysql_fetch_array($qpakar);
//$namapakar = $rpakar['nama'];

//}

$sq1 = mysql_query("select * from tablesaring where sidsaring='$no'");
$rq1 = mysql_fetch_array($sq1);

$spatientid = $rq1['sidpatient']; 
$ptj = $rq1['sptj'];
$srisiko = $rq1['srisiko'];

if ($srisiko == '1')
{
	$berisiko = "YA";
	$border = "1";
	$warna = "1";

}

elseif ($srisiko == '2')
{
	$berisiko = "YA";
	$border = "1";
	$warna = "1";

}

else
{
	$berisiko = "";
	$border = "0";
	$warna = "0";

}

$starikh = $rq1['starikh'];
$smasa = $rq1['smasa'];


//$format="%H:%M";
//$smasa=date($format,$smasa1);

$smasa1 = date('H:i',strtotime($smasa));

$srokokvape1 	= $rq1['srokokvape'];

if ($srokokvape1 == 1)
{
	$srokokvape = "YA";
}

else
{
	$srokokvape = "TIDAK";
}

$ssakitlains1	= $rq1['ssakitlains'];

if ($ssakitlains1 == 1)
{
	$ssakitlains = "YA";
}

else
{
	$ssakitlains = "TIDAK";
}

$ssakitlain		= $rq1['ssakitlain'];	

$sbalikluarnegara1	= $rq1['sbalikluarnegara'];	

if ($sbalikluarnegara1 == 1)
{
	$sbalikluarnegara = "YA";
}

else
{
	$sbalikluarnegara = "TIDAK";
}
					
$snamanegara		= $rq1['snamanegara'];	

$ssertaikluster1		= $rq1['ssertaikluster'];

if ($ssertaikluster1 == 1)
{
	$ssertaikluster = "YA";
}

else
{
	$ssertaikluster = "TIDAK";
}

$snamakluster		= $rq1['snamakluster'];

$skontakrapat1		= $rq1['skontakrapat'];

if ($skontakrapat1 == 1)
{
	$skontakrapat = "YA";
}

else
{
	$skontakrapat = "TIDAK";
}

$skontakrapatoversea1 = $rq1['skontakrapatoversea'];	

if ($skontakrapatoversea1 == 1)
{
	$skontakrapatoversea = "YA";
}

else
{
	$skontakrapatoversea = "TIDAK";
}

$szonmerah1			= $rq1['szonmerah'];

if ($szonmerah1 == 1)
{
	$szonmerah = "YA";
}

else
{
	$szonmerah = "TIDAK";
}
		
$sdemam1			= $rq1['sdemam'];

if ($sdemam1 == 1)
{
	$sdemam = "YA";
}

else
{
	$sdemam = "TIDAK";
}
	
$sbatuk1				= $rq1['sbatuk'];

if ($sbatuk1 == 1)
{
	$sbatuk = "YA";
}

else
{
	$sbatuk = "TIDAK";
}

$ssakittekak1		= $rq1['ssakittekak'];

if ($ssakittekak1 == 1)
{
	$ssakittekak = "YA";
}

else
{
	$ssakittekak = "TIDAK";
}

$ssesaknafas1		= $rq1['ssesaknafas'];

if ($ssesaknafas1 == 1)
{
	$ssesaknafas = "YA";
}

else
{
	$ssesaknafas = "TIDAK";
}

	
$sselsema1	= $rq1['sselsema'];

if ($sselsema1 == 1)
{
	$sselsema = "YA";
}

else
{
	$sselsema = "TIDAK";
}

$slainlain	= $rq1['slainlain'];

$starikh	= $rq1['starikh'];
$smasa		= $rq1['smasa'];
$srisiko	= $rq1['srisiko'];


$sq3 = mysql_query("select * from kodptj where id='$ptj'");
$rq3 = mysql_fetch_array($sq3);
$namaptj = $rq3['nama'];
$alamatptj = $rq3['alamat'];
$abbrptj = $rq3['abbr'];
$daerahptj = $rq3['daerah'];

$sq2 = mysql_query("select * from patient where id='$spatientid'");
$rq2 = mysql_fetch_array($sq2);
$pbandar = $rq2['bandar'];
$pnegeri = $rq2['negeri'];
$pzon = $rq2['zon'];
$pkmpg = $rq2['kmpg'];
$namapat = $rq2['nama'];
$docnopat = $rq2['docno'];
$alamatpat = $rq2['alamat'];
$poskodpat = $rq2['poskod'];


//if ($pakar == 5)
//{
//$sqt = mysql_query("select * from temujanjiggonline where no='$no' and ptj2='$abbrptj'");
//$rqt = mysql_fetch_array($sqt);
//}

//else
//{
//$sqt = mysql_query("select * from temujanjionline where no='$no' and ptj2='$abbrptj'");
//$rqt = mysql_fetch_array($sqt);
//}

$sq4 = mysql_query("select * from bandar where id = '$pbandar'");
$rq4 = mysql_fetch_array($sq4);
$bandar = $rq4['nama'];

$sq5 = mysql_query("select * from negeri where id = '$pnegeri'");
$rq5 = mysql_fetch_array($sq5);


$q15 = mysql_query("select * from zon where zonid = '$pzon'");
$d15 = mysql_fetch_array($q15);


$q16 = mysql_query("select * from kampung where kmpgid = '$pkmpg'");
$d16 = mysql_fetch_array($q16);
$kmpg = strtoupper($d16['kmpg']);

$pdf=new PDF();
$namas = htmlspecialchars_decode("d[nama]", ENT_QUOTES);
$pdf->AddPage();

//for($i=1;$i<3;$i++)
//{
    //if($i == 1)
   // {
    //    $hdr = "SALINAN PESAKIT";
   // }
    //elseif($i == 2)
   // {
    //    $hdr = "SALINAN KLINIK KESIHATAN";
   // }
   // elseif($i == 3)
   // {
   // $hdr = "Salinan Pejabat";
   // }
//$pdf->AddPage();

$pdf->Image('jata.jpg',10,8,33);
//$pdf->Image('jata.jpg',10,125,33);

$pdf->Cell(40,1,' ');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,5,$namaptj);
//$pdf->SetFont('Arial','B',11);
//$pdf->Cell(65,5,$hdr);
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,1,' ');
$pdf->Cell(100,5,'KEMENTERIAN KESIHATAN MALAYSIA');
//$pdf->Cell(45,5,"RESIT TEMUJANJI ONLINE");
//$pdf->Ln();
//$pdf->Ln();
// Set font

$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,1,' ');
$pdf->Cell(95,5,$alamatptj);
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,1,' ');
$pdf->Cell(95,5,"No Tel : ".$rq3['tel']."      Faks : ".$rq3['fax']);

$pdf->Ln();
$pdf->SetFont('Arial','B',16);
// Move to 8 cm to the right
$pdf->Cell(160);
$pdf->SetFillColor(200,100,14);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(20,10,$berisiko,$border,0,'C',$warna);
$pdf->Ln();


$pdf->SetFont('Arial','B',10);
$pdf->Cell(150,5,'MAKLUMAT PESAKIT');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(25,5,'Nama ');
$pdf->Cell(65,5,": ".$namapat);
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(25,5,'No KP/Pasport ');
$pdf->Cell(65,5,": ".$docnopat);
$pdf->Ln();
//$pdf->Cell(25,5,'Disiplin');
//$pdf->Cell(95,5,": $namapakar");
//$pdf->Ln();

$pdf->Cell(25,5,'Tarikh ');
$tarikh = tukar($starikh);
$pdf->Cell(50,5,": ".$tarikh);
//$pdf->Ln();
$pdf->Cell(25,5,'Masa ');
//foreach($waktu as $key => $value)
//{
//  if($smasa == $key)
//  {
//    $masa = $value;
 // }
//}
$pdf->Cell(95,5,": ".$smasa1);
$pdf->SetFont('Arial','',10);
$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(160,160,160);
$pdf->Cell(185,6,'MAKLUMAT DEKLARASI SURVELAN COVID-19 NEGERI JOHOR',0,0,'',1);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(100,5,'1. Adakah anda mempunyai tabiat merokok/ vape ?');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,": ".$srokokvape);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(100,5,'2. Adakah anda mempunyai penyakit lain ?');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,": ".$ssakitlains);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,5,'    Jika YA, sila nyatakan');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(140,5,": $ssakitlain");
$pdf->Ln();
$pdf->Ln();



$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(160,160,160);
$pdf->Cell(185,6,'RISIKO',0,0,'',1);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(160,5,'1. Adakah anda baru balik dari luar negara dalam masa 40 hari yang lalu?');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,": ".$sbalikluarnegara);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,5,'    Jika YA, sila nyatakan');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,5,": ".$snamanegara);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(160,5,'2. Adakah anda pernah menyertai ijtimak tabligh atau mana-mana perhimpunan dalam masa 40 hari?');
//$pdf->Ln();
//$pdf->Cell(135,5,'    masa 40 hari?');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,": ".$ssertaikluster);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,5,'    Jika YA, sila nyatakan');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,5,": ".$snamakluster);
$pdf->Ln();

$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(160,5,'3. Adakah anda KONTAK RAPAT dengan individu DISAHKAN POSITIF COVID-19?');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,": ".$skontakrapat);
$pdf->Ln();

$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(160,5,'4. Adakah anda KONTAK RAPAT dengan individu yang balik dari luar negara dalam masa 40 hari?');
//$pdf->Ln();
//$pdf->Cell(135,5,'    masa 40 hari?');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,": ".$skontakrapatoversea);
$pdf->Ln();

$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(160,5,'5. Adakah anda mempunyai sejarah pulang dari kawasan yang diisytiharkan Zon Merah* dalam');
$pdf->Ln();
$pdf->Cell(160,5,'    masa 14 hari?');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,": ".$szonmerah);
$pdf->Ln();
$pdf->SetFont('Arial','I',8);
$pdf->Cell(135,5,'    *Sila rujuk telegram CPRC KKM di pautan t.me/cprckkm untuk status zon merah');

//--------------------------SIMPTOM -----------------------------

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(160,160,160);
$pdf->Cell(185,6,'SIMPTOM',0,0,'',1);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,5,'1. Demam (37.5 C ke atas)');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,": ".$sdemam);
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,5,'2. Batuk');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,": ".$sbatuk);
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,5,'3. Sakit Tekak');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,": ".$ssakittekak);
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,5,'4. Sesak Nafas');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,": ".$ssesaknafas);
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,5,'5. Selsema');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,": ".$sselsema);
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,5,'6. Lain-lain, sila nyatakan');
//$pdf->Cell(8);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,": ".$slainlain);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','',10);
$pdf->Cell(160,5,'Dengan ini, saya, no dokumen '.$docnopat.' mengaku bahawa maklumat yang saya berikan di atas adalah benar.');
//$pdf->Cell(8);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','I',8);
$pdf->Cell(190,5,'(Ini adalah cetakan komputer. Tandatangan tidak diperlukan)',0,0,'C');
// Move to 8 cm to the right
//$pdf->Cell(8);
$pdf->SetTextColor(200,100,14);
// Centered text in a framed 20*10 mm cell and line break
//$pdf->Cell(190,10,$mesej,0,0,'C',0);
//$pdf->ImprovedTable($header,$data);
//$pdf->AddPage();
//$pdf->FancyTable($header,$data);
$pdf->Output();
?>
