<?php
session_start();
require('../fpdf.php');
require ('../config/dbconnect.php');


// ---------------------------------------- FETCH DATA ------------------------------------

$querykendiri2     = "SELECT * FROM  tblkendiri WHERE kid = '$kendiriid' AND kstatus = '$status'";
$resultkendiri2     = mysql_query($querykendiri2) or die(mysql_error());
$datakendiri2      = mysql_fetch_array($resultkendiri2);
										
$kfid	   		= $datakendiri2['kid'];
$kfidstaff   	= $datakendiri2['kidstaff'];
$kfjabatan   	= $datakendiri2['kjabatan'];
$kftarikh     	= $datakendiri2['ftarikh'];

$kfbangunan		=	$datakendiri2['fbangunan'];
$kfalamat		=	$datakendiri2['falamat'];
$kfjenisbinaan	=	$datakendiri2['fjenisbinaan'];
$kfjenisrumah	=	$datakendiri2['fjenisrumah'];
$kfjumbil		=	$datakendiri2['fjumbil'];
$kfcegahbakar	=	$datakendiri2['fcegahbakar'];
$kfperiksa		=	$datakendiri2['fperiksa'];
$kfperiksa2		=	$datakendiri2['fperiksa2'];
$kffblanket		=	$datakendiri2['ffblanket'];
$kffext			=	$datakendiri2['ffext'];
$kfsoket			=	$datakendiri2['fsoket'];
$kfsoketc		=	$datakendiri2['fsoketc'];
$kfkipas			=	$datakendiri2['fkipas'];
$kfkipasc		=	$datakendiri2['fkipasc'];
$kflampu			=	$datakendiri2['flampu'];
$kflampuc		=	$datakendiri2['flampuc'];
$kfdawai			=	$datakendiri2['fdawai'];
$kfdawaic		=	$datakendiri2['fdawaic'];
$kflaine			=	$datakendiri2['flaine'];
$kftekananair	=	$datakendiri2['ftekananair'];
$kftekananairc	=	$datakendiri2['ftekananairc'];
$kfhawadingin	=	$datakendiri2['fhawadingin'];
$kfhawadinginc	=	$datakendiri2['fhawadinginc'];
$kftangkiseptik	=	$datakendiri2['ftangkiseptik'];
$kftangkiseptikc	=	$datakendiri2['ftangkiseptikc'];
$kfpambocor		=	$datakendiri2['fpambocor'];
$kfpambocorc		=	$datakendiri2['fpambocorc'];
$kfsinkibocor	=	$datakendiri2['fsinkibocor'];
$kfsinkibocorc	=	$datakendiri2['fsinkibocorc'];
$kfpaippecah		=	$datakendiri2['fpaippecah'];
$kfpaippecahc	=	$datakendiri2['fpaippecahc'];
$kflainm			=	$datakendiri2['flainm'];
$kfretak			=	$datakendiri2['fretak'];
$kfretakc		=	$datakendiri2['fretakc'];
$kfpatah			=	$datakendiri2['fpatah'];
$kfpatahc		=	$datakendiri2['fpatahc'];
$kfcabut			=	$datakendiri2['fcabut'];
$kfcabutc		=	$datakendiri2['fcabutc'];
$kfbocor			=	$datakendiri2['fbocor'];
$kfbocorc		=	$datakendiri2['fbocorc'];
$kfkarat			=	$datakendiri2['fkarat'];
$kfkaratc		=	$datakendiri2['fkaratc'];
$kfreput			=	$datakendiri2['freput'];
$kfreputc		=	$datakendiri2['freputc'];
$kfanai			=	$datakendiri2['fanai'];
$kfanaic			=	$datakendiri2['fanaic'];
$kfkelawar		=	$datakendiri2['fkelawar'];
$kfkelawarc		=	$datakendiri2['fkelawarc'];
$kftutup			=	$datakendiri2['ftutup'];
$kftutupc		=	$datakendiri2['ftutupc'];
$kftanahruntuh	=	$datakendiri2['ftanahruntuh'];
$kftanahruntuhc	=	$datakendiri2['ftanahruntuhc'];
$kfteduhan		=	$datakendiri2['fteduhan'];
$kfteduhanc		=	$datakendiri2['fteduhanc'];
$kftembok		=	$datakendiri2['ftembok'];
$kftembokc		=	$datakendiri2['ftembokc'];
$kftaman			=	$datakendiri2['ftaman'];
$kftamanc		=	$datakendiri2['ftamanc'];
$kfpagar			=	$datakendiri2['fpagar'];
$kfpagarc		=	$datakendiri2['fpagarc'];
$kflongkang		=	$datakendiri2['flongkang'];
$kflongkangc		=	$datakendiri2['flongkangc'];
$kfparkir		=	$datakendiri2['fparkir'];
$kfparkirc		=	$datakendiri2['fparkirc'];
$kflampukawasan	=	$datakendiri2['flampukawasan'];
$kflampukawasanc	=	$datakendiri2['flampukawasanc'];
$kflamputangga	=	$datakendiri2['flamputangga'];
$kflamputanggac	=	$datakendiri2['flamputanggac'];
$kftanggapecah	=	$datakendiri2['ftanggapecah'];
$kftanggapecahc	=	$datakendiri2['ftanggapecahc'];
$kflifrosak		=	$datakendiri2['flifrosak'];
$kflifrosakc		=	$datakendiri2['flifrosakc'];
$kfhangit		=	$datakendiri2['fhangit'];
$kfhangitc		=	$datakendiri2['fhangitc'];
$kfkesanbakar		=	$datakendiri2['fkesanbakar'];
$kfkesanbakarc		=	$datakendiri2['fkesanbakarc'];
$kfpercikanapi	=	$datakendiri2['fpercikanapi'];
$kfpercikanapic	=	$datakendiri2['fpercikanapic'];
$kflainlain		=	$datakendiri2['flainlain'];
$kfpintuutama	=	$datakendiri2['fpintuutama'];
$kfpintuutamas	=	$datakendiri2['fpintuutamas'];
$kfpintuutamac	=	$datakendiri2['fpintuutamac'];
$kfbilikutama	=	$datakendiri2['fbilikutama'];
$kfbilikutamas	=	$datakendiri2['fbilikutamas'];
$kfbilikutamac	=	$datakendiri2['fbilikutamac'];
$kfbilikdua		=	$datakendiri2['fbilikdua'];
$kfbilikduas		=	$datakendiri2['fbilikduas'];
$kfbilikduac		=	$datakendiri2['fbilikduac'];
$kfbiliktiga		=	$datakendiri2['fbiliktiga'];
$kfbiliktigas	=	$datakendiri2['fbiliktigas'];
$kfbiliktigac	=	$datakendiri2['fbiliktigac'];
$kfbilikempat	=	$datakendiri2['fbilikempat'];
$kfbilikempats	=	$datakendiri2['fbilikempats'];
$kfbilikempatc	=	$datakendiri2['fbilikempatc'];
$kfstor			=	$datakendiri2['fstor'];
$kfstors			=	$datakendiri2['fstors'];
$kfstorc			=	$datakendiri2['fstorc'];
$kfdapur			=	$datakendiri2['fdapur'];
$kfdapurs		=	$datakendiri2['fdapurs'];
$kfdapurc		=	$datakendiri2['fdapurc'];
$kfruangmakan	=	$datakendiri2['fruangmakan'];
$kfruangmakans	=	$datakendiri2['fruangmakans'];
$kfruangmakanc	=	$datakendiri2['fruangmakanc'];
$kfpantri		=	$datakendiri2['fpantri'];
$kfpantris		=	$datakendiri2['fpantris'];
$kfpantric		=	$datakendiri2['fpantric'];
$kfmetertnb		=	$datakendiri2['fmetertnb'];
$kfmetertnbb		=	$datakendiri2['fmetertnbb'];
$kfmetertnbc		=	$datakendiri2['fmetertnbc'];
$kfmetersaj		=	$datakendiri2['fmetersaj'];
$kfmetersajb		=	$datakendiri2['fmetersajb'];
$kfmetersajc		=	$datakendiri2['fmetersajc'];
$kfpedestal		=	$datakendiri2['fpedestal'];
$kfpedestals		=	$datakendiri2['fpedestals'];
$kfpedestalc		=	$datakendiri2['fpedestalc'];
$kfshower		=	$datakendiri2['fshower'];
$kfshowers		=	$datakendiri2['fshowers'];
$kfshowerc		=	$datakendiri2['fshowerc'];
$kfwashbasin		=	$datakendiri2['fwashbasin'];
$kfwashbasins	=	$datakendiri2['fwashbasins'];
$kfwashbasinc	=	$datakendiri2['fwashbasinc'];
$kfholder		=	$datakendiri2['fholder'];
$kfholders		=	$datakendiri2['fholders'];
$kfholderc		=	$datakendiri2['fholderc'];
$kfsoap			=	$datakendiri2['fsoap'];
$kfsoaps			=	$datakendiri2['fsoaps'];
$kfsoapc			=	$datakendiri2['fsoapc'];
$kfbib			=	$datakendiri2['fbib'];
$kfbibs			=	$datakendiri2['fbibs'];
$kfbibc			=	$datakendiri2['fbibc'];
$kfpedestal2		=	$datakendiri2['fpedestal2'];
$kfpedestal2s	=	$datakendiri2['fpedestal2s'];
$kfpedestal2c	=	$datakendiri2['fpedestal2c'];
$kfshower2		=	$datakendiri2['fshower2'];
$kfshower2s		=	$datakendiri2['fshower2s'];
$kfshower2c		=	$datakendiri2['fshower2c'];
$kfwashbasin2	=	$datakendiri2['fwashbasin2'];
$kfwashbasin2s	=	$datakendiri2['fwashbasin2s'];
$kfwashbasin2c	=	$datakendiri2['fwashbasin2c'];
$kfholder2		=	$datakendiri2['fholder2'];
$kfholder2s		=	$datakendiri2['fholder2s'];
$kfholder2c		=	$datakendiri2['fholder2c'];
$kfsoap2			=	$datakendiri2['fsoap2'];
$kfsoap2s		=	$datakendiri2['fsoap2s'];
$kfsoap2c		=	$datakendiri2['fsoap2c'];
$kfbib2			=	$datakendiri2['fbib2'];
$kfbib2s			=	$datakendiri2['fbib2s'];
$kfbib2c			=	$datakendiri2['fbib2c'];
$kfpedestal3		=	$datakendiri2['fpedestal3'];
$kfpedestal3s	=	$datakendiri2['fpedestal3s'];
$kfpedestal3c	=	$datakendiri2['fpedestal3c'];
$kfshower3		=	$datakendiri2['fshower3'];
$kfshower3s		=	$datakendiri2['fshower3s'];
$kfshower3c		=	$datakendiri2['fshower3c'];
$kfwashbasin3	=	$datakendiri2['fwashbasin3'];
$kfwashbasin3s	=	$datakendiri2['fwashbasin3s'];
$kfwashbasin3c	=	$datakendiri2['fwashbasin3c'];
$kfholder3		=	$datakendiri2['fholder3'];
$kfholder3s		=	$datakendiri2['fholder3s'];
$kfholder3c		=	$datakendiri2['fholder3c'];
$kfsoap3			=	$datakendiri2['fsoap3'];
$kfsoap3s		=	$datakendiri2['fsoap3s'];
$kfsoap3c		=	$datakendiri2['fsoap3c'];
$kfbib3			=	$datakendiri2['fbib3'];
$kfbib3s			=	$datakendiri2['fbib3s'];
$kfbib3c			=	$datakendiri2['fbib3c'];
$kfkitchensink	=	$datakendiri2['fkitchensink'];
$kfkitchensinks	=	$datakendiri2['fkitchensinks'];
$kfkitchensinkc	=	$datakendiri2['fkitchensinkc'];
$kfbibtap		=	$datakendiri2['fbibtap'];
$kfbibtaps		=	$datakendiri2['fbibtaps'];
$kfbibtapc		=	$datakendiri2['fbibtapc'];
$kfbibtapy		=	$datakendiri2['fbibtapy'];
$kfbibtapys		=	$datakendiri2['fbibtapys'];
$kfbibtapyc		=	$datakendiri2['fbibtapyc'];
$kflighting		=	$datakendiri2['flighting'];
$kflightings		=	$datakendiri2['flightings'];
$kflightingc		=	$datakendiri2['flightingc'];
$kffanpoint		=	$datakendiri2['ffanpoint'];
$kffanpoints		=	$datakendiri2['ffanpoints'];
$kffanpointc		=	$datakendiri2['ffanpointc'];
$kfpowerpoint	=	$datakendiri2['fpowerpoint'];
$kfpowerpoints	=	$datakendiri2['fpowerpoints'];
$kfpowerpointc	=	$datakendiri2['fpowerpointc'];
$kfphonepoint	=	$datakendiri2['fphonepoint'];
$kfphonepoints	=	$datakendiri2['fphonepoints'];
$kfphonepointc	=	$datakendiri2['fphonepointc'];
$kftvpoint		=	$datakendiri2['ftvpoint'];
$kftvpoints		=	$datakendiri2['ftvpoints'];
$kftvpointc		=	$datakendiri2['ftvpointc'];
$kfheaterpoint	=	$datakendiri2['fheaterpoint'];
$kfheaterpoints	=	$datakendiri2['fheaterpoints'];
$kfheaterpointc	=	$datakendiri2['fheaterpointc'];
$kfaircondpoint	=	$datakendiri2['faircondpoint'];
$kfaircondpoints	=	$datakendiri2['faircondpoints'];
$kfaircondpointc	=	$datakendiri2['faircondpointc'];
$kfgatepoint		=	$datakendiri2['fgatepoint'];
$kfgatepoints	=	$datakendiri2['fgatepoints'];
$kfgatepointc	=	$datakendiri2['fgatepointc'];

//------------------------------------- END FETCH DATA ------------------------------------
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
$pdf->Image('jata.jpg',10,125,33);

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
$pdf->SetFont('Arial','B',10);
$pdf->Cell(115,5,'TEMUJANJI PESAKIT');
$pdf->SetFont('Arial','',10);
$pdf->Ln();
$pdf->Cell(25,5,'Disiplin');
$pdf->Cell(95,5,": $namapakar");
$pdf->Ln();

$pdf->Cell(25,5,'Tarikh ');
$tarikh = tukar($rqt['tarikh']);
$pdf->Cell(95,5,": ".$tarikh);
$pdf->Ln();
$pdf->Cell(25,5,'Masa ');
foreach($waktu as $key => $value)
{
  if($rqt['masa'] == $key)
  {
    $masa = $value;
  }
}
$pdf->Cell(95,5,": ".$masa);
$pdf->SetFont('Arial','',10);
$pdf->Ln();
$pdf->Cell(36,5,'Sebab Hadir Ke Klinik');
$pdf->MultiCell(140,4,": ".$rqt['aduan']);
$pdf->Ln();

$pdf->Ln();
$pdf->SetFont('Arial','B',8);
// Move to 8 cm to the right
//$pdf->Cell(8);
$pdf->SetTextColor(200,100,14);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(190,4,$mesej,0,0,'C',0);
$pdf->Ln();
$pdf->Cell(190,4,$mesej2,0,0,'C',0);
$pdf->Ln();
$pdf->Cell(190,4,$mesej3,0,0,'C',0);
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
