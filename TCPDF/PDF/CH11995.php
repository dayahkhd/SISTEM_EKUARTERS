<?php
/*
		========================================================
		CREATED BY:
					AMIRAH NABILAH BINTI MOHD SAPINYE
					JABATAN KESIHATAN NEGERI JOHOR
								2017 
						[CH 1/1995] - DOKTOR
		========================================================
*/
require_once('tcpdf_include.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{
    // =========================================
	//					HEADER
	// =========================================
    public function Header() 
	{
		if ($this->page == 1)
		{       
			// Logo
			$image_file = K_PATH_IMAGES.'header2.jpg';
			$this->Image($image_file, 10, 10, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		
    	}
        
    }
	
	// =========================================
	//					FOOTER
	// =========================================
    public function Footer() 
	{
		
    }

    // =========================================
	//					BODY
	// =========================================
    public function Body() 
	{
		
		//==========================================
		//					DATABASE
		//==========================================
		
		//session_start();
		//Connect database
		include("database.php");
		include("new.php");
		
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$today 		= date('d-m-Y');
			
		$statusaktif = 1;
		
		$idch = $_GET['id']; 
				
		
		//TABLE PEMOHONAN
		$querymohon		= "SELECT * FROM tblch WHERE norujukan = '$idch'";
		$resultmohon 	= mysql_query($querymohon) or die(mysql_error());
		$datamohon 		= mysql_fetch_array($resultmohon);
		
		$norujukan		= $datamohon['norujukan'];
		$pesakit		= $datamohon['pesakit'];
		$jumbayaran		= $datamohon['jumbayaran'];
		$dtsiapa		= $datamohon['dtsiap'];
		$doktor			= $datamohon['doktor'];
		$nokp			= $datamohon['nokp'];
		//$gajipokok		= $datamohon['gajipokok'];
		$chbayaran1		= $datamohon['chbayaran1'];
		$chbayaran2		= $datamohon['chbayaran2'];
		
		// TABLE PERMOHONAN
		$querycari 		= "SELECT * FROM tblpermohonan WHERE norujukan='$norujukan'";
		$resultcari 	= mysql_query($querycari) or die(mysql_error());
		$datacari 		= mysql_fetch_array($resultcari); 		
		
		$noresit		= $datacari['noresit'];		
		$noresit2		= $datacari['noresit2'];
		$noresit3		= $datacari['noresit3'];		
		
		$dtresita		= $datacari['dtresit'];
		$dtresita2		= $datacari['dtresit2'];
		$dtresita3		= $datacari['dtresit3'];
				
			// FORMAT TARIKH
			// TARIKH SIAP
			if (($dtsiapa == '1970-01-01')||($dtsiapa == '0000-00-00')||($dtsiapa == ''))
			{$dtsiap 		= '00-00-0000';}
			else
			{$dtsiap 		= date('d-m-Y',strtotime($dtsiapa));}
			
			// TARIKH RESIT I
			if (($dtresita == '1970-01-01')||($dtresita == '0000-00-00')||($dtresita == ''))
			{$dtresit		= '00-00-0000';}
			else
			{$dtresit 		= date('d-m-Y',strtotime($dtresita));}
			
			// TARIKH RESIT II
			if (($dtresita2 == '1970-01-01')||($dtresita2 == '0000-00-00')||($dtresita2 == ''))
			{$dtresit2		= '00-00-0000';}
			else
			{$dtresit2		= date('d-m-Y',strtotime($dtresita2));}
			
			// TARIKH RESIT TAMBAHAN
			if (($dtresita3 == '1970-01-01')||($dtresita3 == '0000-00-00')||($dtresita3 == ''))
			{$dtresit3		= '00-00-0000';}
			else
			{$dtresit3 		= date('d-m-Y',strtotime($dtresita3));}
			
				
		$i	= 1;
		
		$this->SetFont('arial', '', 10, '', true);
			
		//Ayat1
		$this->Ln(20);
		$this->Cell(5);
		$this->MultiCell(180, 4,"Saya mengesahkan bahawa laporan perubatan bagi penama tersebut telah disediakan oleh saya dan bayaran berkenaan telah dibuat. Butir-butir lanjut adalah seperti berikut :-", 0, 'L', 0, 0, '', '', true);
			
		//TAJUK TABLE 	: NO DAFTAR | NAMA PESKIT | BAYARAN
		$this->Ln(17);
		$this->Cell(5);
		$this->MultiCell(25, 8,"NO LAPORAN PERUBATAN", 0, 'C', 0, 0, '', '', true);
		$this->Cell(1);
		$this->MultiCell(25, 8,"TARIKH LAPORAN DISIAPKAN", 0, 'C', 0, 0, '', '', true);
		$this->Cell(1);
		$this->MultiCell(95, 4,"NAMA PESAKIT", 0, 'C', 0, 0, '', '', true);
		$this->Cell(1);
		$this->MultiCell(25, 4,"BAYARAN YANG DIKENAKAN (RM)", 0, 'C', 0, 0, '', '', true);
			
			// put virable
			$this->Ln(20);
			$this->Cell(5);
			$this->MultiCell(25, 8,"$norujukan", 0, 'C', 0, 0, '', '', true);
			$this->Cell(1);
			$this->MultiCell(25, 8,"$dtsiap", 0, 'C', 0, 0, '', '', true);
			$this->Cell(1);
			$this->MultiCell(95, 4,"$pesakit", 0, 'C', 0, 0, '', '', true);
			$this->Cell(1);
			$this->MultiCell(25, 4,"RM $chbayaran1", 0, 'C', 0, 0, '', '', true);
				
		
		$this->SetFont('arial', '', 10, '', true);
			
		//Ayat2
		$this->Ln(10);
		$this->Cell(5);
		$this->MultiCell(180, 4,"Dengan ini saya memohon mendapatkan bayaran bagi laporan berkenanan yang telah disiapkan pada $dtsiap.", 0, 'L', 0, 0, '', '', true);
					
			$this->Ln(10);
			$this->Cell(5);
			$this->MultiCell(180, 4,"", 0, 'L', 0, 0, '', '', true);
			
			// TANDATANGAN
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'Tandatangan',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"",0,0,'L');
						
			// TARIKH
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'Tarikh',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"",0,0,'L');
			
			// COP RASMI PAKAR /PEGAWAI PERUBATAN
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'Cop Rasmi Pakar/ Pegawai Perubatan',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"",0,0,'L');
			
			// NAMA PAKAR/ PEGAWAI PERUBATAN
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'Nama Pakar/ Pegawai Perubatan',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$doktor",0,0,'L');
			
			// NO KADPENGENALAN
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'No Kad Pengenalan',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$nokp",0,0,'L');
			
			// GAJI POKOK
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'Gaji Pokok pada Tarikh Laporan disiapkan',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"",0,0,'L');
						
			$this->SetFont('arial', 'BU', 10, '', true);
			
			// Pengesahan Ketua Jabatan
			$this->Ln(10);
			$this->Cell(5);
			$this->MultiCell(180, 4,"Pengesahan Ketua Jabatan", 0, 'L', 0, 0, '', '', true);
			
			
			$this->SetFont('arial', '', 10, '', true);
						
			// a)
			$this->Ln(10);
			$this->Cell(5);
			$this->Cell(1,1,'a)',0,0,'L');
			$this->Cell(10);
			$this->MultiCell(148, 4,"Saya mengesahkan bahawa adalah benar dan betul bayaran yang tersebut di atas berjumlah", 0, 'L', 0, 0, '', '', true);
			$this->SetFont('arial', 'BU', 10, '', true);
			$this->MultiCell(20, 4,"RM $chbayaran1 ",0 , 'L', 0, 0, '', '', true);
			
			
			$this->SetFont('arial', '', 10, '', true);
			$this->Ln(4);
			$this->Cell(5);
			$this->Cell(1,1,'',0,0,'L');
			$this->Cell(10);
			$this->MultiCell(180, 4,"dan telah diterima dan dimasukkan ke dalam kira-kira Perbendaharaan. Nombor Resit yang telah dikeluarkan ", 0, 'L', 0, 0, '', '', true);
			
			if($noresit2 == '0')
			{
				$this->Ln(4);
				$this->Cell(5);
				$this->Cell(1,1,'',0,0,'L');
				$this->Cell(10);
				$this->MultiCell(10, 4,"ialah", 0, 'C', 0, 0, '', '', true);
				
				$this->SetFont('arial', 'BU', 10, '', true);
				$this->MultiCell(25, 4,"$noresit", 0, 'C', 0, 0, '', '', true);
				
				$this->SetFont('arial', '', 10, '', true);
				$this->MultiCell(18, 4,"bertarikh ", 0, 'L', 0, 0, '', '', true);
				
				$this->SetFont('arial', 'BU', 10, '', true);
				$this->MultiCell(25, 4,"$dtresit", 0, 'C', 0, 0, '', '', true);
			}
			
			elseif($noresit3 == '0')
			{
				$this->Ln(4);
				$this->Cell(5);
				$this->Cell(1,1,'',0,0,'L');
				$this->Cell(10);
				$this->MultiCell(10, 4,"ialah", 0, 'C', 0, 0, '', '', true);
				
				$this->SetFont('arial', 'BU', 10, '', true);
				$this->MultiCell(45, 4,"$noresit,  $noresit2", 0, 'C', 0, 0, '', '', true);
				
				$this->SetFont('arial', '', 10, '', true);
				$this->MultiCell(18, 4,"bertarikh ", 0, 'L', 0, 0, '', '', true);
				
				$this->SetFont('arial', 'BU', 10, '', true);
				$this->MultiCell(45, 4,"$dtresit,  $dtresit2.", 0, 'C', 0, 0, '', '', true);
			}
			
			else
			{
				$this->Ln(4);
				$this->Cell(5);
				$this->Cell(1,1,'',0,0,'L');
				$this->Cell(10);
				$this->MultiCell(10, 4,"ialah", 0, 'C', 0, 0, '', '', true);
				
				$this->SetFont('arial', 'BU', 10, '', true);
				$this->MultiCell(70, 4,"$noresit,  $noresit2,  $noresit3", 0, 'C', 0, 0, '', '', true);
				
				$this->SetFont('arial', '', 10, '', true);
				$this->MultiCell(18, 4,"bertarikh ", 0, 'L', 0, 0, '', '', true);
				
				$this->SetFont('arial', 'BU', 10, '', true);
				$this->MultiCell(64, 4,"$dtresit,  $dtresit2,  $dtresit3 .", 0, 'C', 0, 0, '', '', true);
			}
			
			
			$this->SetFont('arial', '', 10, '', true);
			
			// b)
			$this->Ln(7);
			$this->Cell(5);
			$this->Cell(1,1,'b)',0,0,'L');
			$this->Cell(10);
			$this->MultiCell(160, 4,"Saya mengesahkan tuntutan yang dibuat dalam bulan ini termasuk tuntutan ini berjumlah RM $chbayaran2 dan jumlah ini tidak melebihi 1/2 daripada gaji bulan pakar/ pegawai perubatan ini pada tarikh laporan disiapkan.", 0, 'L', 0, 0, '', '', true);
			
			// c)
			$this->Ln(12);
			$this->Cell(5);
			$this->Cell(1,1,'c)',0,0,'L');
			$this->Cell(10);
			$this->MultiCell(160, 4,"Saya mengesahkan tuntutan ini adalah mengikut/tidak mengikut tatacara yang ditetapkan dan bayaran adalah disokong / tidak disokong.", 0, 'L', 0, 0, '', '', true);
			
			
			// TAJUK TANDATANGAN PENGARAH
			$this->Ln(20);
			$this->Cell(5);
			$this->Cell(1,1,'Tandatangan Pengarah Hospital',0,0,'L');
			$this->Cell(55);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"",0,0,'L');
			
			//NAMA
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'Nama',0,0,'L');
			$this->Cell(55);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"",0,0,'L');
			
			// JAWATAN
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'Jawatan',0,0,'L');
			$this->Cell(55);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"",0,0,'L');
			
			// PENGARAH
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'Tarikh',0,0,'L');
			$this->Cell(55);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"",0,0,'L');
			
	
			
    } // CLOSE BODY
	
}
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->AddPage("P");
$pdf->body();
//$pdf->Rect(18, 44, 171, 217, 'D');
//$pdf->AddPage("P");
//$pdf->SenaraiSemak();

//kanan atas lebar panjang			
			

// ---------------------------------------------------------
 
//Close and output PDF document
$pdf->Output('CH1995.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
?>