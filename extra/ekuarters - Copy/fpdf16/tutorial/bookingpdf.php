<?php
session_start();
require('../fpdf.php');
require('../../../conskklab.php');
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



$bidbook	= $_GET['bidbook'];

$sq3 		= mysql_query("select * from kodptj where id='$rqbook[bptj]'");
$rq3 		= mysql_fetch_array($sq3);
$namaptj 	= $rq3['nama'];
$alamatptj 	= $rq3['alamat'];
$abbrptj 	= $rq3['abbr'];
$daerahptj 	= $rq3['daerah'];




$sqbook		= mysql_query("select * from tablebooking where bidbook='$bidbook' and bstatus = '1' ");
$rqbook		= mysql_fetch_array($sqbook);

$xthaid		= date('d-m-Y',strtotime($rqbook['bhaid']));
$xtjangkab	= date('d-m-Y',strtotime($rqbook['btarikhjangka']));


$sqyn 		= mysql_query("select * from tableyesnomch where ynid='$rqbook[bscan]' and ynstatus = '1' ");
$rqyn 		= mysql_fetch_array($sqyn);

$sqtb		= mysql_query("select * from tabletempatbersalin where tbid	='$rqbook[btempatbersalin]' and tbstatus = '1' ");
$rqtb		= mysql_fetch_array($sqtb);

$sqjan		= mysql_query("select * from tablejantinamch where jid ='$rqbook[bjantinaanak1]' and jstatus  = '1' ");
$rqjan		= mysql_fetch_array($sqjan);

$sqss		= mysql_query("select * from tablesusu where suid ='$rqbook[bsusuibu1]' and sustatus  = '1' ");
$rqss		= mysql_fetch_array($sqss);

$sqhp		= mysql_query("select * from tablehidupmati where hmid ='$rqbook[bkeadaananak1]' and hmstatus  = '1' ");
$rqhp		= mysql_fetch_array($sqhp);


$sqjan2		= mysql_query("select * from tablejantinamch where jid ='$rqbook[bjantinaanak2]' and jstatus  = '1' ");
$rqjan2		= mysql_fetch_array($sqjan2);

$sqss2		= mysql_query("select * from tablesusu where suid ='$rqbook[bsusuibu2]' and sustatus  = '1' ");
$rqss2		= mysql_fetch_array($sqss2);

$sqhp2		= mysql_query("select * from tablehidupmati where hmid ='$rqbook[bkeadaananak2]' and hmstatus  = '1' ");
$rqhp2		= mysql_fetch_array($sqhp2);



$sqyn1		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[bdiabetes]' and ynsstatus  = '1' ");
$rqyn1		= mysql_fetch_array($sqyn1);

$sqyn2		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[bhipertensi]' and ynsstatus  = '1' ");
$rqyn2		= mysql_fetch_array($sqyn2);

$sqyn3		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[balergi]' and ynsstatus  = '1' ");
$rqyn3		= mysql_fetch_array($sqyn3);

$sqyn4		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[bpsikiatri]' and ynsstatus  = '1' ");
$rqyn4		= mysql_fetch_array($sqyn4);

$sqyn5		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[basma]' and ynsstatus  = '1' ");
$rqyn5		= mysql_fetch_array($sqyn5);

$sqyn6		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[bjantung]' and ynsstatus  = '1' ");
$rqyn6		= mysql_fetch_array($sqyn6);

$sqyn7		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[btibi]' and ynsstatus  = '1' ");
$rqyn7		= mysql_fetch_array($sqyn7);

$sqyn8		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[banemia]' and ynsstatus  = '1' ");
$rqyn8		= mysql_fetch_array($sqyn8);

$sqyn9		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[btalasemia]' and ynsstatus  = '1' ");
$rqyn9		= mysql_fetch_array($sqyn9);

$sqyn10		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[bthyroid]' and ynsstatus  = '1' ");
$rqyn10		= mysql_fetch_array($sqyn10);

$sqyn11		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[bkanser]' and ynsstatus  = '1' ");
$rqyn11		= mysql_fetch_array($sqyn11);

$sqyntibib	= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[btibibatuk]' and ynsstatus  = '1' ");
$rqyntibib	= mysql_fetch_array($sqyntibib);



$sqyn1k		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[bdiabetesk]' and ynsstatus  = '1' ");
$rqyn1k		= mysql_fetch_array($sqyn1k);

$sqyn2k		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[bhipertensik]' and ynsstatus  = '1' ");
$rqyn2k		= mysql_fetch_array($sqyn2k);

$sqyn3k		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[balergik]' and ynsstatus  = '1' ");
$rqyn3k		= mysql_fetch_array($sqyn3k);

$sqyn4k		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[bpsikiatrik]' and ynsstatus  = '1' ");
$rqyn4k		= mysql_fetch_array($sqyn4k);

$sqyn5k		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[basmak]' and ynsstatus  = '1' ");
$rqyn5k		= mysql_fetch_array($sqyn5k);

$sqyn6k		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[bjantungk]' and ynsstatus  = '1' ");
$rqyn6k		= mysql_fetch_array($sqyn6k);

$sqyn7k		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[btibik]' and ynsstatus  = '1' ");
$rqyn7k		= mysql_fetch_array($sqyn7k);

$sqyn8k		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[banemiak]' and ynsstatus  = '1' ");
$rqyn8k		= mysql_fetch_array($sqyn8k);

$sqyn9k		= mysql_query("select * from tableyesnosakit where ynsid ='$rqbook[btalasemiak]' and ynsstatus  = '1' ");
$rqyn9k		= mysql_fetch_array($sqyn9k);


$pdf=new PDF();
$namas = htmlspecialchars_decode("", ENT_QUOTES);
$pdf->AddPage();
$pdf->Image('jata.jpg',10,8,33);

$pdf->Cell(40,1,' ');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,5,$namaptj);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(65,5,$hdr);
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,1,' ');
$pdf->Cell(100,5,'KEMENTERIAN KESIHATAN MALAYSIA');
$pdf->Cell(45,5,"RESIT TEMUJANJI MCH");
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



/* REKOD KESIHATAN IBU */
$pdf->Ln(12);
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(160, 160, 160);
$pdf->MultiCell(180, 6, "REKOD KESIHATAN IBU", 1, 'L', 1);


$pdf->SetFont('Arial','',10);

$pdf->Cell(10,5,'1.');
$pdf->Cell(85,5,'Tarikh Haid Terakhir');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$xthaid", 0, 'L', 0);

$pdf->Cell(10,5,'2.');
$pdf->Cell(85,5,'Jika tidak pasti tarikh haid terakhir, adakah');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "", 0, 'L', 0);

	$pdf->Cell(10,5,' ');
	$pdf->Cell(85,5,'Scan dilakukan');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqyn[ynname]", 0, 'L', 0);
	
	$pdf->Cell(10,5,' ');	
	$pdf->Cell(85,5,'Bilakah tarikh jangka bersalin');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$xtjangkab", 0, 'L', 0);

$pdf->Cell(10,5,'3.');
$pdf->Cell(85,5,'Gravida');
$pdf->Cell(20, 5,'');
$pdf->MultiCell(85, 6, "", 0, 'L', 0);

$pdf->Cell(10,5,' ');
$pdf->Cell(85,5,'(Jumlah kehamilan semasa termasuk keguguran)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqbook[bgravida] Kali", 0, 'L', 0);


$pdf->Cell(10,5,'4.');
$pdf->Cell(85,5,'Para');
$pdf->Cell(20, 5,'');
$pdf->MultiCell(85, 6, "", 0, 'L', 0);

$pdf->Cell(10,5,' ');
$pdf->Cell(85,5,'(Jumlah kelahiran termasuk lahir hidup atau mati)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqbook[bpara] Kali", 0, 'L', 0);

$pdf->Cell(10,5,'5.');
$pdf->Cell(85,5,'Bilangan keguguran');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqbook[bgugur] Kali", 0, 'L', 0);

$pdf->Cell(10,5,'6.');
$pdf->Cell(85,5,'Tempat bersalin pilihan');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqtb[tbname]", 0, 'L', 0);

$pdf->Cell(10,5,'');
$pdf->Cell(85,5,'Nyatakan');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqbook[bnamatempatbersalin]", 0, 'L', 0);

$pdf->Cell(10,5,'7.');
$pdf->Cell(85,5,'Alamat selepas bersalin');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqbook[balamatlepasbersalin]", 0, 'L', 0);






/* MAKLUMAT SUAMI */
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(160, 160, 160);
$pdf->MultiCell(180, 6, "MAKLUMAT SUAMI", 1, 'L', 1);

$pdf->SetFont('Arial','',10);

$pdf->Cell(10,5,'1.');
$pdf->Cell(85,5,'Nama Suami');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqbook[bsuami]", 0, 'L', 0);

$pdf->Cell(10,5,'2.');
$pdf->Cell(85,5,'No Kad Pengenalan Suami');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqbook[bnokpsuami]", 0, 'L', 0);

$pdf->Cell(10,5,'3.');
$pdf->Cell(85,5,'Pekerjaan Suami');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqbook[bkerjasuami]", 0, 'L', 0);

$pdf->Cell(10,5,'4.');
$pdf->Cell(85,5,'Alamat Tempat Kerja Suami');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqbook[balamatkerjasuami]", 0, 'L', 0);

$pdf->Cell(10,5,'5.');
$pdf->Cell(85,5,'No Tel Suami (Rumah)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqbook[bnotelsuamir]", 0, 'L', 0);

$pdf->Cell(10,5,'6.');
$pdf->Cell(85,5,'No Tel Suami (H/P)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqbook[bnotelsuamihp]", 0, 'L', 0);







/* PERIHAL KANDUNGAN LALU ( DUA TERAKHIR) */
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(160, 160, 160);
$pdf->MultiCell(180, 6, "PERIHAL KANDUNGAN LALU ( DUA TERAKHIR)", 1, 'L', 1);

	/* KANDUNGAN KEDUA TERAKHIR SEBELUM KANDUNGAN SEKARANG */
	$pdf->Ln(4);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(135, 206, 250);
	$pdf->MultiCell(180, 6, "KANDUNGAN KEDUA TERAKHIR SEBELUM KANDUNGAN SEKARANG", 1, 'L', 1);
	
	
	$pdf->SetFont('Arial','',10);

	$pdf->Cell(10,5,'1.');
	$pdf->Cell(85,5,'Tahun kelahiran');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "Tahun $rqbook[btahunlahir1]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'2.');
	$pdf->Cell(85,5,'Usia kandungan');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[busiakandungan1]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'3.');
	$pdf->Cell(85,5,'Jenis kelahiran');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[bjeniskelahiran1]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'4.');
	$pdf->Cell(85,5,'Tempat bersalin');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[btempatbersalin1]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'5.');
	$pdf->Cell(85,5,'Disambut oleh');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[bsambut1]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'6.');
	$pdf->Cell(85,5,'Jantina');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqjan[jname]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'7.');
	$pdf->Cell(85,5,'Berat lahir');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[bberatlahir1] kg ", 0, 'L', 0);
	
	$pdf->Cell(10,5,'8.');
	$pdf->Cell(130,5,'Komplikasi (masalah kesihatan semasa kehamilan dan selepas bersalin');
	$pdf->Cell(2, 5,'');
	$pdf->MultiCell(85, 6, "", 0, 'L', 0);
	
	$pdf->Cell(10,5,' ');
	$pdf->Cell(85,5,'Komplikasi Ibu');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[bkomplikasiibu1]", 0, 'L', 0);
	
	$pdf->Cell(10,5,' ');
	$pdf->Cell(85,5,'Komplikasi Anak');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[bkomplikasianak1] ", 0, 'L', 0);
	
	$pdf->Cell(10,5,'9.');
	$pdf->Cell(85,5,'Penyusuan Ibu');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqss[suname]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'10.');
	$pdf->Cell(85,5,'Tempoh Penyusuan');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[btempohsusu1]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'11.');
	$pdf->Cell(85,5,'Keadaan anak sekarang (hidup/mati)');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqhp[hmname]", 0, 'L', 0);
	
	
	
	
	
	
	

	/* KANDUNGAN TERAKHIR SEBELUM KANDUNGAN SEKARANG */
	$pdf->Ln(4);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(135, 206, 250);
	$pdf->MultiCell(180, 6, "KANDUNGAN TERAKHIR SEBELUM KANDUNGAN SEKARANG", 1, 'L', 1);

	$pdf->SetFont('Arial','',10);

	$pdf->Cell(10,5,'1.');
	$pdf->Cell(85,5,'Tahun kelahiran');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "Tahun $rqbook[btahunlahir2]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'2.');
	$pdf->Cell(85,5,'Usia kandungan');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[busiakandungan2]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'3.');
	$pdf->Cell(85,5,'Jenis kelahiran');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[bjeniskelahiran2]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'4.');
	$pdf->Cell(85,5,'Tempat bersalin');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[btempatbersalin2]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'5.');
	$pdf->Cell(85,5,'Disambut oleh');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[bsambut2]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'6.');
	$pdf->Cell(85,5,'Jantina');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqjan2[jname]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'7.');
	$pdf->Cell(85,5,'Berat lahir');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[bberatlahir2] kg ", 0, 'L', 0);
	
	$pdf->Cell(10,5,'8.');
	$pdf->Cell(130,5,'Komplikasi (masalah kesihatan semasa kehamilan dan selepas bersalin');
	$pdf->Cell(2, 5,'');
	$pdf->MultiCell(85, 6, "", 0, 'L', 0);
	
	$pdf->Cell(10,5,' ');
	$pdf->Cell(85,5,'Komplikasi Ibu');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[bkomplikasiibu2]", 0, 'L', 0);
	
	$pdf->Cell(10,5,' ');
	$pdf->Cell(85,5,'Komplikasi Anak');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[bkomplikasianak2] ", 0, 'L', 0);
	
	$pdf->Cell(10,5,'9.');
	$pdf->Cell(85,5,'Penyusuan Ibu');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqss2[suname]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'10.');
	$pdf->Cell(85,5,'Tempoh Penyusuan');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqbook[btempohsusu2]", 0, 'L', 0);
	
	$pdf->Cell(10,5,'11.');
	$pdf->Cell(85,5,'Keadaan anak sekarang (hidup/mati)');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(85, 6, "$rqhp2[hmname]", 0, 'L', 0);
	
	
	
	
	


/* MASALAH PERUBATAN IBU */
$pdf->Ln(12);
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(160, 160, 160);
$pdf->MultiCell(180, 6, "MASALAH PERUBATAN IBU", 1, 'L', 1);


$pdf->SetFont('Arial','',10);

$pdf->Cell(10,5,'1.');
$pdf->Cell(85,5,'Diabetes (Kencing Manis)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn1[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'2.');
$pdf->Cell(85,5,'Hipertensi (Darah Tinggi)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn2[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'3.');
$pdf->Cell(85,5,'Alergi (Alahan)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn3[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'4.');
$pdf->Cell(85,5,'Psikiatri (Mental)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn4[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'5.');
$pdf->Cell(85,5,'Asthma');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn5[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'6.');
$pdf->Cell(85,5,'Sakit Jantung');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn6[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'7.');
$pdf->Cell(85,5,'Tibi');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn7[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'8.');
$pdf->Cell(85,5,'Anemia');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn8[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'9.');
$pdf->Cell(85,5,'Talasemia');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn9[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'10.');
$pdf->Cell(85,5,'Thyroid');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "rqyn10[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'11.');
$pdf->Cell(85,5,'Kanser');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn11[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'12.');
$pdf->Cell(85,5,'Lain-lain (nyatakan)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqbook[blainlain]", 0, 'L', 0);


/* SARINGAN TIBI */
$pdf->Ln(12);
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(160, 160, 160);
$pdf->MultiCell(180, 6, "SARINGAN TIBI", 1, 'L', 1);


$pdf->SetFont('Arial','',10);

$pdf->Cell(10,5,'1.');
$pdf->Cell(85,5,'Adakah anda mengalami batuk lebih dari 2 minggu ?');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyntibib[ynsname]", 0, 'L', 0);







/* MASALAH PERUBATAN KELUARGA */
$pdf->Ln(12);
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(160, 160, 160);
$pdf->MultiCell(180, 6, "MASALAH PERUBATAN KELUARGA", 1, 'L', 1);




$pdf->SetFont('Arial','',10);

$pdf->Cell(10,5,'1.');
$pdf->Cell(85,5,'Diabetes (Kencing Manis)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn1k[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'2.');
$pdf->Cell(85,5,'Hipertensi (Darah Tinggi)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn2k[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'3.');
$pdf->Cell(85,5,'Alergi (Alahan)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn3k[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'4.');
$pdf->Cell(85,5,'Psikiatri (Mental)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn4k[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'5.');
$pdf->Cell(85,5,'Asthma');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn5k[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'6.');
$pdf->Cell(85,5,'Sakit Jantung');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn6k[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'7.');
$pdf->Cell(85,5,'Tibi');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn7k[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'8.');
$pdf->Cell(85,5,'Anemia');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn8k[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'9.');
$pdf->Cell(85,5,'Talasemia');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqyn9k[ynsname]", 0, 'L', 0);

$pdf->Cell(10,5,'10.');
$pdf->Cell(85,5,'Lain-lain (nyatakan)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 6, "$rqbook[blainlaink]", 0, 'L', 0);




$pdf->Ln();




//$pdf->ImprovedTable($header,$data);
//$pdf->AddPage();
//$pdf->FancyTable($header,$data);
$pdf->Output();
?>
