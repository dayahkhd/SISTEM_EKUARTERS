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

$no = $_GET['no'];//$_GET['id'];
$pakar = $_GET['pakar'];

if ($pakar == '5')
{ $namapakar = 'KLINIK PERGIGIAN'; }


else

{$qpakar = mysql_query("select * from pakar where susun = '$pakar' ");
$rpakar = mysql_fetch_array($qpakar);
$namapakar = $rpakar['nama'];
}
$sq1 = mysql_query("select * from tablesaring where srefno='$no'");
$rq1 = mysql_fetch_array($sq1);
$spatientid = $rq1['sidpatient']; 
$ptj = $rq1['sptj'];
$srisiko = $rq1['srisiko'];


$sq3 = mysql_query("select * from kodptj where id='$ptj'");
$rq3 = mysql_fetch_array($sq3);
$namaptj = $rq3['nama'];
$alamatptj = $rq3['alamat'];
$abbrptj = $rq3['abbr'];
$daerahptj = $rq3['daerah'];

if ($daerahptj == '01') //BATU PAHAT
{ $nophone = '0193973155';}

elseif ($daerahptj == '02') //JOHOR BAHRU
{ $nophone = '0193981324 atau 0193982645';}

elseif ($daerahptj == '03') //KLUANG
{ $nophone = '0193967517';}

elseif ($daerahptj == '04') //KOTA TINGGI
{ $nophone = '0193967270';}

elseif ($daerahptj == '05') //MERSING
{ $nophone = '0193970203';}

elseif ($daerahptj == '06') //MUAR
{ $nophone = '0193979674';}

elseif ($daerahptj == '07') //PONTIAN
{ $nophone = '0193972160';}

elseif ($daerahptj == '08') //SEGAMAT
{ $nophone = '0193968361';}


elseif ($daerahptj == '09') //KULAI
{ $nophone = '0193972281';}

elseif ($daerahptj == '10') //TANGKAK
{ $nophone = '0193977028';}

if ($srisiko == '1')
{
	$berisiko = "YA";
	$border = "1";
	$warna = "1";
	$mesej = "ANDA DISARANKAN UNTUK MENGHUBUNGI NO TELEFON : $nophone  - BILIK GERAKAN CPRC";
	$mesej2 = " SEBELUM HADIR KE KLINIK. (Waktu Operasi Talian : 8.00 Pagi - 8.00 Malam)";
}

elseif ($srisiko == '2')
{
	$berisiko = "YA";
	$border = "1";
	$warna = "1";
	$mesej = "MOHON UNTUK ANDA KE KLINIK SARINGAN DEMAM TERLEBIH DAHULU SEBELUM MENDAFTAR.";
	$mesej2 ="";
}

else
{
	$berisiko = "";
	$border = "0";
	$warna = "0";
	$mesej = "";
	$mesej2 ="";
}
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



if ($pakar == 5)
{
$sqt = mysql_query("select * from temujanjiggonline where no='$no' and ptj2='$abbrptj'");
$rqt = mysql_fetch_array($sqt);
}

else
{
$sqt = mysql_query("select * from temujanjionline where no='$no' and ptj2='$abbrptj'");
$rqt = mysql_fetch_array($sqt);
}

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
//Column titles
//$header=array('Country','Capital','Area (sq km)','Pop. (thousands)');
//Data loading
//$data=$pdf->LoadData('countries.txt');
$namas = htmlspecialchars_decode("d[nama]", ENT_QUOTES);
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
$pdf->Image('jata.jpg',10,105,33);

$pdf->Cell(40,1,' ');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,5,$namaptj);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(65,5,$hdr);
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,1,' ');
$pdf->Cell(100,5,'KEMENTERIAN KESIHATAN MALAYSIA');
$pdf->Cell(45,5,"RESIT TEMUJANJI ONLINE");
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

//$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',16);
// Move to 8 cm to the right
$pdf->Cell(160);
$pdf->SetFillColor(200,100,14);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(20,10,$berisiko,$border,0,'C',$warna);
$pdf->Ln();
//$pdf->Ln();


$pdf->SetFont('Arial','B',10);
$pdf->Cell(115,5,'MAKLUMAT PESAKIT');
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(25,5,'No KP/Pasport ');
$pdf->Cell(65,5,": ".$docnopat);
$pdf->Ln();

$pdf->Ln();
$pdf->Cell(25,5,'Disiplin');
$pdf->Cell(95,5,": $namapakar");
$pdf->Ln();

$pdf->Ln();
$pdf->SetFont('Arial','B',10);
// Move to 8 cm to the right
//$pdf->Cell(8);
$pdf->SetTextColor(200,100,14);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(190,10,$mesej,0,0,'C',0);
$pdf->Ln();
$pdf->Cell(190,10,$mesej2,0,0,'C',0);
$pdf->Ln();
$pdf->Cell(8,5,' ');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',10);
//$pdf->Cell(90,5,'(Ini adalah cetakan komputer. Tandatangan tidak diperlukan)',0,0,'R');
//$pdf->Ln();
$pdf->Ln();
$pdf->Cell(1,5,'.......................................................................................................................................................................................................................');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


}

//$pdf->ImprovedTable($header,$data);
//$pdf->AddPage();
//$pdf->FancyTable($header,$data);
$pdf->Output();
?>
