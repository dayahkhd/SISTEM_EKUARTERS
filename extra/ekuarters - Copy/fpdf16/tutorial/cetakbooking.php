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

//$sq3 		= mysql_query("select * from kodptj where id='$rqbook[bptj]'");
//$rq3 		= mysql_fetch_array($sq3);
//$namaptj 	= $rq3['nama'];
//$alamatptj 	= $rq3['alamat'];
//$abbrptj 	= $rq3['abbr'];
//$daerahptj 	= $rq3['daerah'];





			// TABLE BOOKING
			$querybook 		= mysql_query("SELECT * FROM tablebooking WHERE bidbook = '$bidbook'");
			$databook		= mysql_fetch_array($querybook);
			
			$bidbook 		= $databook['bidbook'];
			$bidpatient 	= $databook['bidpatient'];
			$bhaid 			= $databook['bhaid'];
			$bchaid 		= $databook['bchaid'];
			$bscan 			= $databook['bscan'];
			$btarikhjangka 	= $databook['btarikhjangka'];
			$bgravida 		= $databook['bgravida'];
			$bpara 			= $databook['bpara'];
			$bgugur 		= $databook['bgugur'];
			
			$bsuami 				= $databook['bsuami'];
			$bnokpsuami				= $databook['bnokpsuami'];
			$bkerjasuami 			= $databook['bkerjasuami'];
			$balamatkerjasuami 		= $databook['balamatkerjasuami'];
			$bnotelsuamir 			= $databook['bnotelsuamir'];
			$bnotelsuamihp 			= $databook['bnotelsuamihp'];
			$btempatbersalin 		= $databook['btempatbersalin'];
			$bnamatempatbersalin 	= $databook['bnamatempatbersalin'];
			$balamatlepasbersalin 	= $databook['balamatlepasbersalin'];
			
			$btahunlahir1 			= $databook['btahunlahir1'];
			$busiakandungan1 		= $databook['busiakandungan1'];
			$bjeniskelahiran1 		= $databook['bjeniskelahiran1'];
			$btempatbersalin1 		= $databook['btempatbersalin1'];
			$btempatbersalin1lain 	= $databook['btempatbersalin1lain'];
			$bsambut1 				= $databook['bsambut1'];
			$bsambut1lain 			= $databook['bsambut1lain'];
			$bjantinaanak1 			= $databook['bjantinaanak1'];
			$bberatlahir1 			= $databook['bberatlahir1'];
			$bkomplikasiibu1 		= $databook['bkomplikasiibu1'];
			$bkomplikasianak1 		= $databook['bkomplikasianak1'];
			$bsusuibu1 				= $databook['bsusuibu1'];
			$btempohsusu1 			= $databook['btempohsusu1'];
			$bkeadaananak1 			= $databook['bkeadaananak1'];
			
			$btahunlahir2 			= $databook['btahunlahir2'];
			$busiakandungan2 		= $databook['busiakandungan2'];
			$bjeniskelahiran2 		= $databook['bjeniskelahiran2'];
			$btempatbersalin2 		= $databook['btempatbersalin2'];
			$btempatbersalin2lain 	= $databook['btempatbersalin2lain'];
			$bsambut2 				= $databook['bsambut2'];
			$bsambut2lain 			= $databook['bsambut2lain'];
			$bjantinaanak2 			= $databook['bjantinaanak2'];
			$bberatlahir2 			= $databook['bberatlahir2'];
			$bkomplikasiibu2 		= $databook['bkomplikasiibu2'];
			$bkomplikasianak2 		= $databook['bkomplikasianak2'];
			$bsusuibu2 				= $databook['bsusuibu2'];
			$btempohsusu2 			= $databook['btempohsusu2'];
			$bkeadaananak2 			= $databook['bkeadaananak2'];
			
			$bdiabetes 		= $databook['bdiabetes'];
			$bhipertensi 	= $databook['bhipertensi'];
			$balergi 		= $databook['balergi'];
			$bpsikiatri 	= $databook['bpsikiatri'];
			$basma 			= $databook['basma'];
			$bjantung 		= $databook['bjantung'];
			$btibi 			= $databook['btibi'];
			$banemia 		= $databook['banemia'];
			$btalasemia 	= $databook['btalasemia'];
			$bthyroid 		= $databook['bthyroid'];
			$bkanser		= $databook['bkanser'];
			$blainlain		= $databook['blainlain'];
			$btibibatuk 	= $databook['btibibatuk'];
			
			$bdiabetesk 	= $databook['bdiabetesk'];
			$bhipertensik 	= $databook['bhipertensik'];
			$balergik 		= $databook['balergik'];
			$basmak 		= $databook['basmak'];
			$bjantungk 		= $databook['bjantungk'];
			$btibik 		= $databook['btibik'];
			$banemiak 		= $databook['banemiak'];
			$btalasemiak 	= $databook['btalasemiak'];
			$bpsikiatrik 	= $databook['bpsikiatrik'];
			$blainlaink 	= $databook['blainlaink'];
			
			$bdiabetesk2 	= $databook['bdiabetesk2'];
			$bhipertensik2 	= $databook['bhipertensik2'];
			$balergik2		= $databook['balergik2'];
			$basmak2 		= $databook['basmak2'];
			$bjantungk2 	= $databook['bjantungk2'];
			$btibik2 		= $databook['btibik2'];
			$banemiak2 		= $databook['banemiak2'];
			$btalasemiak2 	= $databook['btalasemiak2'];
			$bpsikiatrik2 	= $databook['bpsikiatrik2'];
			$blainlaink2 	= $databook['blainlaink2'];
			
			
			$brefno			= $databook['brefno'];
			$btarikh 		= $databook['btarikh'];
			$bmasa 			= $databook['bmasa'];
			$bptj 			= $databook['bptj'];
			$bstatus 		= $databook['bstatus'];


$sq3 = mysql_query("select * from kodptj where id='$bptj'");
$rq3 = mysql_fetch_array($sq3);
$namaptj = $rq3['nama'];
$alamatptj = $rq3['alamat'];
$abbrptj = $rq3['abbr'];
$daerahptj = $rq3['daerah'];
			

//echo $daepat;
// TABLE PESAKIT
$querypt 	= mysql_query("SELECT * FROM patient WHERE id = '$bidpatient'");
$datapt		= mysql_fetch_array($querypt);
//$namapat = $datapt['nama'];
//$mykadpat = $datapt['docno'];

			$fid			= $datapt['id'];
			$fnama			= $datapt['nama'];
			$fmykad			= $datapt['docno'];
			$fjantina		= 2;
			$falamat		= $datapt['alamat'];
			$fposkod		= $datapt['poskod'];
			$fbandar		= $datapt['bandar'];
			$fnegeri		= $datapt['negeri'];
			$fensetrumah	= $datapt['tepon'];
			$fenset			= $datapt['enset'];
			$fensetpejabat	= $datapt['majphone'];
						
			$ftarikhlahir1 	= $datapt['bday'];
			$ftarikhlahir 	= date('d-m-Y',strtotime($ftarikhlahir1));
			$fumur 			= $datapt['umur'];
			$fumurbln 		= $datapt['umurbln'];
			$fumurhr 		= $datapt['umurhr'];
			$fbangsa 		= $datapt['bangsa'];
			$fwarga 		= $datapt['warga'];
			$fpendidikan 	= $datapt['pendidikan'];
			$fkerja 		= $datapt['kerja'];
			
// query panggil 

$q2a = mysql_query("select * from bangsa where id = '$fbangsa'");
$d2a = mysql_fetch_array($q2a);
$fbangsanama = $d2a['nama'];

$q3x = mysql_query("select * from warga where id = '$fwarga'");
$d3x = mysql_fetch_array($q3x);
$fwarganama = $d3x['nama'];

$q6x = mysql_query("select * from bandar where susun = '$fbandar'");
$d6x = mysql_fetch_array($q6x);
$fbandarnama = $d6x['nama'];

$q7x = mysql_query("select * from negeri where id = '$fnegeri' ");
$d7x = mysql_fetch_array($q7x);
$fnegerinama = $d7x['nama'];

$queryynd1x = mysql_query("select * from tableyesnomch where ynid ='$bscan'");
$dataynd1x = mysql_fetch_array($queryynd1x);
$bscannama = $dataynd1x['ynname'];

$queryynd1t = mysql_query("select * from tablekuantiti where kid ='$bgravida'");
$dataynd1t = mysql_fetch_array($queryynd1t);
$bgravidanama = $dataynd1t['kname'];

$queryynd1tx = mysql_query("select * from tablekuantiti where kid ='$bpara'");
$dataynd1tx = mysql_fetch_array($queryynd1tx);
$bparanama = $dataynd1tx['kname'];

$queryynd1ts = mysql_query("select * from tablekuantiti where kid ='$bgugur'");
$dataynd1ts = mysql_fetch_array($queryynd1ts);
$bgugurnama = $dataynd1ts['kname'];

$queryynd33x = mysql_query("select * from tablejeniskelahiran where jkid ='$bjeniskelahiran1'");
$dataynd33x = mysql_fetch_array($queryynd33x);
$bjeniskelahiran1nama = $dataynd33x['jkname'];

$queryynd34x = mysql_query("select * from tabletempatbersalin where tbid ='$btempatbersalin1'");
$dataynd34x = mysql_fetch_array($queryynd34x);
$btempatbersalin1nama = $dataynd34x['tbname'];

$queryynd35x = mysql_query("select * from tablesambut where soid ='$bsambut1'");
$dataynd35x = mysql_fetch_array($queryynd35x);
$bsambut1nama = $dataynd35x['soname'];

$queryynd3x = mysql_query("select * from tablejantinamch where jid ='$bjantinaanak1'");
$dataynd3x = mysql_fetch_array($queryynd3x);
$bjantinaanak1nama = $dataynd3x['jname'];

$queryynd36x = mysql_query("select * from tableyesnosihatibu where ynsiid ='$bkomplikasiibu1'");
$dataynd36x = mysql_fetch_array($queryynd36x);
$bkomplikasiibu1nama = $dataynd36x['ynsiname'];

$queryynd37x = mysql_query("select * from tableyesnosihatanak where ynsaid = '$bkomplikasianak1'");
$dataynd37x = mysql_fetch_array($queryynd37x);
$bkomplikasianak1nama = $dataynd37x['ynsaname'];

$queryynd4x = mysql_query("select * from tablesusu where suid ='$bsusuibu1'");
$dataynd4x = mysql_fetch_array($queryynd4x);
$bsusuibu1nama = $dataynd4x['suname'];  

$queryynd40x = mysql_query("select * from tablesusutempoh where sutid ='$btempohsusu1'");
$dataynd40x = mysql_fetch_array($queryynd40x);
$btempohsusu1nama = $dataynd40x['sutname'];

$queryynd5x = mysql_query("select * from tablehidupmati where hmid ='$bkeadaananak1'");
$dataynd5x = mysql_fetch_array($queryynd5x);
$bkeadaananak1nama = $dataynd5x['hmname'];

$querys1x = mysql_query("select * from tableyesnosakit where ynsid ='$bdiabetes'");
$datas1x = mysql_fetch_array($querys1x);
$bdiabetesnama = $datas1x['ynsname'];

$querys2x = mysql_query("select * from tableyesnosakit where ynsid ='$bhipertensi'");
$datas2x = mysql_fetch_array($querys2x);
$bhipertensinama = $datas2x['ynsname'];

$querys3x = mysql_query("select * from tableyesnosakit where ynsid ='$balergi'");
$datas3x = mysql_fetch_array($querys3x);
$balerginama = $datas3x['ynsname'];
            
$querys4x = mysql_query("select * from tableyesnosakit where ynsid ='$bpsikiatri'");
$datas4x = mysql_fetch_array($querys4x);
$bpsikiatrinama = $datas4x['ynsname'];

$querys5x = mysql_query("select * from tableyesnosakit where ynsid ='$basma'");
$datas5x = mysql_fetch_array($querys5x);
$basmanama = $datas5x['ynsname'];

$querys6x = mysql_query("select * from tableyesnosakit where ynsid ='$bjantung'");
$datas6x = mysql_fetch_array($querys6x);
$bjantungnama = $datas6x['ynsname'];

$querys7x = mysql_query("select * from tableyesnosakit where ynsid ='$btibi'");
$datas7x = mysql_fetch_array($querys7x);
$btibinama = $datas7x['ynsname'];

$querys8x = mysql_query("select * from tableyesnosakit where ynsid ='$banemia'");
$datas8x = mysql_fetch_array($querys8x);
$banemianama = $datas8x['ynsname'];

$querys9x = mysql_query("select * from tableyesnosakit where ynsid ='$btalasemia'");
$datas9x = mysql_fetch_array($querys9x);
$btalasemianama = $datas9x['ynsname'];

$querys10x = mysql_query("select * from tableyesnosakit where ynsid ='$bthyroid'");
$datas10x = mysql_fetch_array($querys10x);
$bthyroidnama = $datas10x['ynsname'];

$querys11x = mysql_query("select * from tableyesnosakit where ynsid ='$bkanser'");
$datas11x = mysql_fetch_array($querys11x);
$bkansernama = $datas11x['ynsname'];

$querys12x = mysql_query("select * from tableyesnosakit where ynsid ='$btibibatuk'");
$datas12x = mysql_fetch_array($querys12x);
$btibibatuknama = $datas12x['ynsname'];

$querys1xx = mysql_query("select * from tableyesnosakit where ynsid ='$bdiabetesk'");
$datas1xx = mysql_fetch_array($querys1xx);
$bdiabetesknama = $datas1xx['ynsname'];

$querys2xx = mysql_query("select * from tableyesnosakit where ynsid ='$bhipertensik'");
$datas2xx = mysql_fetch_array($querys2xx);
$bhipertensiknama = $datas2xx['ynsname'];

$querys3xx = mysql_query("select * from tableyesnosakit where ynsid ='$balergik'");
$datas3xx = mysql_fetch_array($querys3xx);
$balergiknama = $datas3xx['ynsname'];

$querys4xx = mysql_query("select * from tableyesnosakit where ynsid ='$bpsikiatrik'");
$datas4xx = mysql_fetch_array($querys4xx);
$bpsikiatriknama = $datas4xx['ynsname'];

$querys5xx = mysql_query("select * from tableyesnosakit where ynsid ='$basmak'");
$datas5xx = mysql_fetch_array($querys5xx);
$basmaknama = $datas5xx['ynsname'];

$querys6xx = mysql_query("select * from tableyesnosakit where ynsid ='$bjantungk'");
$datas6xx = mysql_fetch_array($querys6xx);
$bjantungknama = $datas6xx['ynsname'];

$querys7xx = mysql_query("select * from tableyesnosakit where ynsid ='$btibik'");
$datas7xx = mysql_fetch_array($querys7xx);
$btibiknama = $datas7xx['ynsname'];

$querys8xx = mysql_query("select * from tableyesnosakit where ynsid ='$banemiak'");
$datas8xx = mysql_fetch_array($querys8xx);
$banemiaknama = $datas8xx['ynsname'];

$querys9xx = mysql_query("select * from tableyesnosakit where ynsid ='$btalasemiak'");
$datas9xx = mysql_fetch_array($querys9xx);
$btalasemiaknama = $datas9xx['ynsname'];

$querys1xxq = mysql_query("select * from tableyesnosakit where ynsid ='$bdiabetesk2'");
$datas1xxq = mysql_fetch_array($querys1xxq);
$bdiabetesk2nama = $datas1xxq['ynsname'];

$querys2xxq = mysql_query("select * from tableyesnosakit where ynsid ='$bhipertensik2'");
$datas2xxq = mysql_fetch_array($querys2xxq);
$bhipertensik2nama = $datas2xxq['ynsname'];

$querys3xxq = mysql_query("select * from tableyesnosakit where ynsid ='$balergik2'");
$datas3xxq = mysql_fetch_array($querys3xxq);
$balergik2nama = $datas3xxq['ynsname'];

$querys4xxq = mysql_query("select * from tableyesnosakit where ynsid ='$bpsikiatrik2'");
$datas4xxq = mysql_fetch_array($querys4xxq);
$bpsikiatrik2nama = $datas4xxq['ynsname'];

$querys5xxq = mysql_query("select * from tableyesnosakit where ynsid ='$basmak2'");
$datas5xxq = mysql_fetch_array($querys5xxq);
$basmak2nama = $datas5xxq['ynsname'];

$querys6xxq = mysql_query("select * from tableyesnosakit where ynsid ='$bjantungk2'");
$datas6xxq = mysql_fetch_array($querys6xxq);
$bjantungk2nama = $datas6xxq['ynsname'];

$querys7xxq = mysql_query("select * from tableyesnosakit where ynsid ='$btibik2'");
$datas7xxq = mysql_fetch_array($querys7xxq);
$btibik2nama = $datas7xxq['ynsname'];

$querys8xxq = mysql_query("select * from tableyesnosakit where ynsid ='$banemiak2'");
$datas8xxq = mysql_fetch_array($querys8xxq);
$banemiak2nama = $datas8xxq['ynsname'];

$querys9xxq = mysql_query("select * from tableyesnosakit where ynsid ='$btalasemiak2'");
$datas9xxq = mysql_fetch_array($querys9xxq);
$btalasemiak2nama = $datas9xxq['ynsname'];
                                                                                                                                   
if ($bchaid == '1')
{
	$haid = "TIDAK PASTI";
}

else
{
	$haid = "";
}

$datehaid = date('d-m-Y',strtotime($bhaid));

$datejangka = date('d-m-Y',strtotime($btarikhjangka));

// ------------------MULA PDF -------------------------------

$pdf=new PDF();
$namas = htmlspecialchars_decode("", ENT_QUOTES);
$pdf->AddPage();
//$pdf->Image('jata.jpg',10,8,33);
$pdf->SetMargins(5,1,5);
$pdf->Ln(3);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(200, 6, "REKOD KESIHATAN IBU",0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(200, 6, $namaptj,0,0,'C');


/* REKOD KESIHATAN IBU */
$pdf->Ln(7);
$pdf->SetFont('Arial','B',7);
$pdf->SetFillColor(160, 160, 160);
$pdf->Cell(98, 6, "MAKLUMAT IBU", 1, 0, 'C', 1);
$pdf->Cell(4, 5,'');
$pdf->Cell(98, 6, "MAKLUMAT SUAMI", 1 , 0, 'C', 1);


$pdf->SetFont('Arial','',7);
$pdf->Ln(6);
$pdf->Cell(4,5,'1.');
$pdf->Cell(15,5,'Nama');
$pdf->Cell(2, 5,':');
$pdf->Cell(77, 5, "$fnama");

$pdf->Cell(4, 5,''); //divider

$pdf->Cell(4,5,'1.');
$pdf->Cell(15,5,'Nama Suami');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(77, 5, "$bsuami", 0, 'L', 0);


$pdf->Cell(4,5,'2.');
$pdf->Cell(15,5,'No Dokumen');
$pdf->Cell(2, 5,':');
$pdf->Cell(77, 5, "$fmykad");

$pdf->Cell(4, 5,''); //divider

$pdf->Cell(4,5,'2.');
$pdf->Cell(15,5,'No MyKad');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(77, 5, "$bnokpsuami", 0, 'L', 0);

$pdf->Cell(4,5,'3.');
$pdf->Cell(15,5,'Tarikh Lahir');
$pdf->Cell(2, 5,':');
$pdf->Cell(77, 5, "$ftarikhlahir - $fumur tahun");

$pdf->Cell(4, 5,''); //divider

$pdf->Cell(4,5,'3.');
$pdf->Cell(15,5,'Pekerjaan');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(77, 5, "$bkerjasuami", 0, 'L', 0);

$pdf->Cell(4,5,'4.');
$pdf->Cell(15,5,'Alamat');
$pdf->Cell(2, 5,':');
$pdf->Cell(77, 5, "$falamat");

$pdf->Cell(4, 5,''); //divider

$pdf->Cell(4,5,'4.');
$pdf->Cell(15,5,'Tempat Kerja');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(77, 5, "$balamatkerjasuami", 0, 'L', 0);


$pdf->Cell(4,5,'5.');
$pdf->Cell(15,5,'Bandar');
$pdf->Cell(2, 5,':');
$pdf->Cell(77, 5, "$fbandarnama");

$pdf->Cell(4, 5,''); //divider

$pdf->Cell(4,5,'5.');
$pdf->Cell(15,5,'No Tel (R)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(77, 5, "$bnotelsuamir", 0, 'L', 0);

$pdf->Cell(4,5,'6.');
$pdf->Cell(15,5,'Poskod');
$pdf->Cell(2, 5,':');
$pdf->Cell(77, 5, "$fposkod");

$pdf->Cell(4, 5,''); //divider

$pdf->Cell(4,5,'6.');
$pdf->Cell(15,5,'No Tel(H/P)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(77, 5, "$bnotelsuamihp", 0, 'L', 0);

$pdf->Cell(4,5,'7.');
$pdf->Cell(15,5,'Negeri');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(77, 5, "$fnegerinama", 0, 'L', 0);	




$pdf->Cell(4,5,'8.');
$pdf->Cell(15,5,'Etnik');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(77, 5, "$fbangsanama", 0, 'L', 0);



$pdf->Cell(4,5,'9.');
$pdf->Cell(15,5,'Warganegara');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(77, 5, "$fwarganama", 0, 'L', 0);



$pdf->Cell(4,5,'10.');
$pdf->Cell(15,5,'Pendidikan');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(77, 5, "$fpendidikan", 0, 'L', 0);

$pdf->Cell(4,5,'11.');
$pdf->Cell(15,5,'Pekerjaan');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(77, 5, "$fkerja", 0, 'L', 0);



$pdf->Cell(4,5,'12.');
$pdf->Cell(15,5,'No Tel (R)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(77, 5, "$fensetrumah", 0, 'L', 0);

$pdf->Cell(4,5,'13.');
$pdf->Cell(15,5,'No HP');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(77, 5, "$fenset", 0, 'L', 0);

$pdf->Cell(4,5,'14.');
$pdf->Cell(15,5,'No Tel (P)');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(77, 5, "$fensetpejabat", 0, 'L', 0);


/* MAKLUMAT KESIHATAN IBU */
$pdf->Ln(4);
$pdf->SetFont('Arial','B',7);

$pdf->SetFillColor(160, 160, 160);
$pdf->Cell(68, 6, "MAKLUMAT KESIHATAN IBU", 1, 0, 'C', 1);
$pdf->Cell(4, 5,'');
$pdf->Cell(128, 6, "PERIHAL KANDUNGAN LALU", 1 , 0, 'C', 1);

$pdf->SetFont('Arial','',7);
$pdf->Ln(7);
$pdf->Cell(4,5,'1.');
$pdf->Cell(25,5,'Tarikh Haid Terakhir');
$pdf->Cell(2, 5,':');
$pdf->Cell(37, 5, "$haid $datehaid");

$pdf->Cell(4, 5,''); //divider

	$pdf->Cell(4,5,'1.');
	$pdf->Cell(20,5,'Tahun kelahiran');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(102, 5, "$btahunlahir1", 0, 'L', 0);


$pdf->Cell(4,5,'2.');
$pdf->Cell(25,5,'Scan Dilakukan');
$pdf->Cell(2, 5,':');
$pdf->Cell(37, 5, "$bscannama");

$pdf->Cell(4, 5,''); //divider
	
	$pdf->Cell(4,5,'2.');
	$pdf->Cell(20,5,'Usia kandungan');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(102, 5, "$busiakandungan1", 0, 'L', 0);
	
$pdf->Cell(4,5,'3.');
$pdf->Cell(25,5,'Tarikh Jangka Bersalin');
$pdf->Cell(2, 5,':');
$pdf->Cell(37, 5, "$datejangka");

$pdf->Cell(4, 5,''); //divider

	$pdf->Cell(4,5,'3.');
	$pdf->Cell(20,5,'Jenis kelahiran');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(102, 5, "$bjeniskelahiran1nama", 0, 'L', 0);

		
$pdf->Cell(4,5,'4.');
$pdf->Cell(25,5,'Gravida');
$pdf->Cell(2, 5,':');
$pdf->Cell(37, 5, "$bgravida kali");

$pdf->Cell(4, 5,''); //divider

	$pdf->Cell(4,5,'4.');
	$pdf->Cell(20,5,'Tempat bersalin');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(102, 5, "$btempatbersalin1nama $btempatbersalin1lain", 0, 'L', 0);
	
	
$pdf->Cell(4,5,'5.');
$pdf->Cell(25,5,'Para');
$pdf->Cell(2, 5,':');
$pdf->Cell(37, 5, "$bpara kali");

$pdf->Cell(4, 5,''); //divider

	$pdf->Cell(4,5,'5.');
	$pdf->Cell(20,5,'Disambut oleh');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(102, 5, "$bsambut1nama $bsambut1lain", 0, 'L', 0);
	

	
$pdf->Cell(4,5,'6.');
$pdf->Cell(25,5,'Keguguran');
$pdf->Cell(2, 5,':');
$pdf->Cell(37, 5, "$bgugur kali");

$pdf->Cell(4, 5,''); //divider

	$pdf->Cell(4,5,'6.');
	$pdf->Cell(20,5,'Jantina');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(102, 5, "$bjantinaanak1nama", 0, 'L', 0);
	
	
$pdf->Cell(4,5,'');
$pdf->Cell(25,5,'');
$pdf->Cell(2, 5,'');
$pdf->Cell(37, 5, "");

$pdf->Cell(4, 5,''); //divider

	$pdf->Cell(4,5,'7.');
	$pdf->Cell(20,5,'Berat lahir');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(102, 5, "$bberatlahir1 kg ", 0, 'L', 0);
	
$pdf->Cell(4,5,'');
$pdf->Cell(25,5,'');
$pdf->Cell(2, 5,'');
$pdf->Cell(37, 5, "");

$pdf->Cell(4, 5,''); //divider

	$pdf->Cell(4,5,'8.');
	$pdf->Cell(75,5,'Masalah kesihatan dalam tempoh kehamilan dan selepas bersalin');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(47, 5, "$bkomplikasiibu1nama", 0, 'L', 0);

$pdf->Cell(4,5,'');
$pdf->Cell(25,5,'');
$pdf->Cell(2, 5,'');
$pdf->Cell(37, 5, "");

$pdf->Cell(4, 5,''); //divider
	
	$pdf->Cell(4,5,'9.');
	$pdf->Cell(45,5,'Masalah bayi selepas bersalin');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(77, 5, "$bkomplikasianak1nama", 0, 'L', 0);

$pdf->Cell(4,5,'');
$pdf->Cell(25,5,'');
$pdf->Cell(2, 5,'');
$pdf->Cell(37, 5, "");

$pdf->Cell(4, 5,''); //divider
	
	$pdf->Cell(4,5,'10.');
	$pdf->Cell(45,5,'Penyusuan Ibu');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(77, 5, "$bsusuibu1nama", 0, 'L', 0);

$pdf->Cell(4,5,'');
$pdf->Cell(25,5,'');
$pdf->Cell(2, 5,'');
$pdf->Cell(37, 5, "");

$pdf->Cell(4, 5,''); //divider
	
	$pdf->Cell(4,5,'11.');
	$pdf->Cell(45,5,'Tempoh Penyusuan');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(77, 5, "$btempohsusu1nama", 0, 'L', 0);

$pdf->Cell(4,5,'');
$pdf->Cell(25,5,'');
$pdf->Cell(2, 5,'');
$pdf->Cell(37, 5, "");

$pdf->Cell(4, 5,''); //divider
	
	$pdf->Cell(4,5,'12.');
	$pdf->Cell(45,5,'Keadaan anak sekarang (hidup/mati)');
	$pdf->Cell(2, 5,':');
	$pdf->MultiCell(77, 5, "$bkeadaananak1nama", 0, 'L', 0);
	

/* MASALAH PERUBATAN IBU */
$pdf->Ln(7);
$pdf->SetFont('Arial','B',7);
$pdf->SetFillColor(160, 160, 160);
$pdf->MultiCell(200, 5, "MASALAH PERUBATAN IBU DAN KELUARGA (IBU & AYAH )", 1, 'L', 1);

$pdf->Ln(2);
$pdf->SetFont('Arial','B',7);
$pdf->Cell(42, 5, "", 0,0, 'C');
$pdf->Cell(49, 5, "IBU", 1,0, 'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "KELUARGA (IBU)", 1,0, 'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "KELUARGA (AYAH)", 1,0, 'C');


$pdf->SetFont('Arial','',7);

$pdf->Ln(6);

$pdf->Cell(4,5,'1.');
$pdf->Cell(35,5,'Diabetes (Kencing Manis)',0);
$pdf->Cell(3, 5,':',0);
$pdf->Cell(49, 5, "$bdiabetesnama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$bdiabetesknama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$bdiabetesk2nama",0,0,'C');

$pdf->Ln(4);

$pdf->Cell(4,5,'2.');
$pdf->Cell(35,5,'Hipertensi (Darah Tinggi)');
$pdf->Cell(3, 5,':');
$pdf->Cell(49, 5, "$bhipertensinama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$bhipertensiknama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$bhipertensik2nama",0,0,'C');

$pdf->Ln(4);

$pdf->Cell(4,5,'3.');
$pdf->Cell(35,5,'Alergi (Alahan)');
$pdf->Cell(3, 5,':');
$pdf->Cell(49, 5, "$balerginama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$balergiknama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$balergik2nama",0,0,'C');

$pdf->Ln(4);

$pdf->Cell(4,5,'4.');
$pdf->Cell(35,5,'Psikiatri (Mental)');
$pdf->Cell(3, 5,':');
$pdf->Cell(49, 5, "$bpsikiatrinama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$bpsikiatriknama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$bpsikiatrik2nama",0,0,'C');

$pdf->Ln(4);

$pdf->Cell(4,5,'5.');
$pdf->Cell(35,5,'Asthma');
$pdf->Cell(3, 5,':');
$pdf->Cell(49, 5, "$basmanama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$basmaknama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$basmak2nama",0,0,'C');

$pdf->Ln(4);

$pdf->Cell(4,5,'6.');
$pdf->Cell(35,5,'Sakit Jantung');
$pdf->Cell(3, 5,':');
$pdf->Cell(49, 5, "$bjantungnama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$bjantungknama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$bjantungk2nama",0,0,'C');

$pdf->Ln(4);

$pdf->Cell(4,5,'7.');
$pdf->Cell(35,5,'Tibi');
$pdf->Cell(3, 5,':');
$pdf->Cell(49, 5, "$btibinama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$btibiknama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$btibik2nama",0,0,'C');

$pdf->Ln(4);

$pdf->Cell(4,5,'8.');
$pdf->Cell(35,5,'Anemia');
$pdf->Cell(3, 5,':');
$pdf->Cell(49, 5, "$banemianama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$banemiaknama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$banemiak2nama",0,0,'C');

$pdf->Ln(4);

$pdf->Cell(4,5,'9.');
$pdf->Cell(35,5,'Talasemia');
$pdf->Cell(3, 5,':');
$pdf->Cell(49, 5, "$btalasemianama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$btalasemiaknama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "$btalasemiak2nama",0,0,'C');

$pdf->Ln(4);

$pdf->Cell(4,5,'10.');
$pdf->Cell(35,5,'Thyroid');
$pdf->Cell(3, 5,':');
$pdf->Cell(49, 5, "$bthyroidnama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "-",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "-",0,0,'C');

$pdf->Ln(4);

$pdf->Cell(4,5,'11.');
$pdf->Cell(35,5,'Kanser');
$pdf->Cell(3, 5,':');
$pdf->Cell(49, 5, "$bkansernama",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "-",0,0,'C');
$pdf->Cell(4,5,'');
$pdf->Cell(49, 5, "-",0,0,'C');

$pdf->Ln(4);



$pdf->Cell(4,5,'12.');
$pdf->Cell(35,5,'Lain-lain (nyatakan)');
$pdf->Cell(3, 5,':');

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

$cell_width = 49;

$pdf->MultiCell(49, 5, "$blainlain",0,'C');

$pdf->SetXY($current_x + $cell_width, $current_y);

$current_x = $pdf->GetX();

$pdf->Cell(4,5,'');

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

$cell_width = 49;

$pdf->MultiCell(49, 6, "$blainlaink",0,'C');

$pdf->SetXY($current_x + $cell_width, $current_y);

$current_x = $pdf->GetX();

$pdf->Cell(4,5,'');

$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

$cell_width = 49;

$pdf->MultiCell(49, 6, "$blainlaink2",0,'C');


/* SARINGAN TIBI */
$pdf->Ln(8);
$pdf->SetFont('Arial','B',7);
$pdf->SetFillColor(160, 160, 160);
$pdf->MultiCell(200, 5, "SARINGAN TIBI", 1, 'L', 1);


$pdf->SetFont('Arial','',7);
$pdf->Ln(2);
$pdf->Cell(5,5,'1.');
$pdf->Cell(60,5,'Adakah anda mengalami batuk lebih dari 2 minggu ?');
$pdf->Cell(2, 5,':');
$pdf->MultiCell(85, 5, "$btibibatuknama", 0, 'L', 0);

$pdf->Ln();




//$pdf->ImprovedTable($header,$data);
//$pdf->AddPage();
//$pdf->FancyTable($header,$data);
$pdf->Output();
?>
