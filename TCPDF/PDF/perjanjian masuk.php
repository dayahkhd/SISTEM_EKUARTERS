<?php
/*
		========================================================
		CREATED BY:
					AMIRAH NABILAH BINTI MOHD SAPINYE
					JABATAN KESIHATAN NEGERI JOHOR
								2017
				[AKUAN PENERIMAAN PERMOHONAN LAPORAN PERUBATAN]
		========================================================
*/
require_once('tcpdf_include.php');

//Connect database
		include("database.php");
		//include("new.php");
			

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
			$statusaktif = 1;
			
			//TABLE Pemohonan
				$querymohon 	= "SELECT * FROM tbl_pemohonan";
				$resultmohon	= mysql_query($querymohon) or die(mysql_error());
				$datamohon 		= mysql_fetch_array($resultmohon);
				

				$idmohon 		= $datamohon['p_id'];
			
			// *********************************************
			//		1. HOSPITAL SULTANAH NORA ISMAIL 
			// *********************************************
			if($idmohon == 30101)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_112.jpg';
				$this->Image($image_file, 10,7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		2. HOSPITAL SULTANAH AMINAH JOHOR BAHRU
			// *********************************************
			else if($idmohon == 30201)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_113.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		3. HOSPITAL SULTAN ISMAIL
			// *********************************************
			else if($idmohon == 30202)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_114.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		4. HOSPITAL PERMAI
			// *********************************************
			else if($idmohon == 30203)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_115.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		5. HOSPITAL ENCHE' BESAR HAJJAH KHALSOM
			// *********************************************
			else if($idmohon == 30301)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_116.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		6. HOSPITAL KOTA TINGGI
			// *********************************************
			else if($idmohon == 30401)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_117.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// ***********************************************************
			//		7. HOSPITAL TEMENGGONG MAHARAJA TUN IBRAHIM KULAI
			// ***********************************************************
			else if($idmohon == 30501)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_118.jpg';
				$this->Image($image_file, 10,7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		8. HOSPITAL TANGKAK
			// *********************************************
			else if($idmohon == 30601)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_119.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		9. HOSPITAL MERSING
			// *********************************************
			else if($idmohon == 30701)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_120.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			
			// *********************************************
			// 		10. HOSPITAL PAKAR SULTANAH FATIMAH, MUAR
			// *********************************************
			else if($idmohon == 30801)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_121.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		11. HOSPITAL PONTIAN
			// *********************************************
			else if($idmohon == 30901)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_122.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		12. HOSPITAL SEGAMAT
			// *********************************************
			else if ($idmohon == 31001)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_123.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		13. JABATAN KESIHATAN NEGERI JOHOR
			// *********************************************
			// else
			// {
			// 	// Logo
			// 	$image_file = K_PATH_IMAGES.'header1.jpg';
			// 	$this->Image($image_file, 10, 10, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			// }
			
		 }
    }

    // =========================================
	//					FOOTER
	// =========================================
 //    public function Footer() 
	// {
	// 	if($this->page == 1 )
	// 	{
	// 		// Position at 15 mm from bottom
	// 		$this->SetY(-15);
	// 		$image_file2 = K_PATH_IMAGES.'footer2.jpg';
	// 		$this->Image($image_file2, 10, 270, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

	// 	}
	// 	if($this->page == 2)
	// 	{
	// 		// Position at 15 mm from bottom
	// 		$this->SetY(-15);
	// 		$image_file2 = K_PATH_IMAGES.'footer2.jpg';
	// 		$this->Image($image_file2, 10, 270, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

	// 	}
 //    }


	
	// =========================================
	//					BODY
	// =========================================
    public function Body() 
	{
		$statusaktif = 1;
			
		$id = $_GET['id']; 



		// TABLE PERMOHONAN
				$querymohonan 	= "SELECT * FROM tbl_pemohonan WHERE p_id = '$id' ";
				$resultmohonan 	= mysql_query($querymohonan) or die(mysql_error());
				$datacari 		= mysql_fetch_array($resultmohonan);

				$idstaff			= $datacari['p_staff'];
				$tmohon				= $datacari['p_tarikhmohon'];
				$lokasimohon		= $datacari['p_lokasi'];
				$jantina			= $datacari['p_jantina'];
				$statusperkahwinan	= $datacari['p_statusperkahwinan'];
				$telrumah			= $datacari['p_telrumah'];
				$telhp				= $datacari['p_telhp'];
				$telpejabat			= $datacari['p_telpejabat'];
				$katjawatan         = $datacari['p_katjawatan'];
				$jawatan			= $datacari['p_jawatan'];
				$katkeluarga        = $datacari['p_katkeluarga'];
				$tbertugas			= $datacari['p_jabatan'];
				$unit				= $datacari['p_unit'];
				$tberkhidmat		= $datacari['p_tmulabertugas'];
				$officehour			= $datacari['p_waktubertugas'];
				$namapasangan		= $datacari['p_namapasangan'];
				$nokppasangan		= $datacari['p_icpasangan'];
				$jawatanpasangan	= $datacari['p_jawatanpasangan'];
				$tbpasangan			= $datacari['p_tkerjapasangan'];
				$wbpasangan			= $datacari['p_wbpasangan'];
				$bilanak			= $datacari['p_bilanak'];
				$alamatlama			= $datacari['p_alamatsekarang'];
				$alamatsendiri		= $datacari['p_alamatrumahsd'];
				$jarakrumah			= $datacari['p_jarakrumah'];
				$sebabmohon			= $datacari['p_sebabmohon'];
				$pengesahan			= $datacari['p_pengesahan'];
				
				$tawaran 			= $datacari['p_alamattawaran'];
				$pmasuk 			= $datacari['p_tmasuk'];

		//CHECKBOX
				$xcheckbox1			= $datacari['p_checkbox1'];
				$xcheckbox2			= $datacari['p_checkbox2'];	
				$xcheckbox3			= $datacari['p_checkbox3'];

		//TABLE PENGGUNA
				$queryguna      = "SELECT * FROM tablepengguna WHERE id ='$idstaff'";
				$resultguna     = mysql_query($queryguna) or die (mysql_error());
				$dataguna       = mysql_fetch_array($resultguna);

				
				$namapengguna   = $dataguna ['namapemohon'];
				$icpengguna     = $dataguna ['nokadpengenalan'];
		
		//TABLE LOKASI
				$querylmohon 		= "SELECT * FROM tbllokasi WHERE l_id = '$lokasimohon'";
				$resultlmohon 		= mysql_query($querylmohon) or die(mysql_error());
				$datalmohon			= mysql_fetch_array($resultlmohon );

				$lokasid 			= $datalmohon['l_id'];
				$lokasinama			= $datalmohon['l_nama'];

		//TABLE JANTINA
				$query_jantina 	= "SELECT * from tbl_jantina WHERE id = '$jantina'";
				$result_jantina = mysql_query($query_jantina);
				$djantina		= mysql_fetch_array($result_jantina);

				$jantinadb		= $djantina['nama'];	

		//TABLE STATUS PERKAHWINAN	

				$query_sp 		= "SELECT * from tbl_statusperkahwinan WHERE p_id = '$statusperkahwinan'";			
				$result_sp 		= mysql_query($query_sp);
				$dsp			= mysql_fetch_array($result_sp);	

				$spdb			= $dsp['p_nama'];	
		//TABLE KATEGORI JAWATAN
				$query_katjawatan 	  = "SELECT * FROM tbl_katjawatan WHERE t_id = '$katjawatan'";
				$result_katjawatan    = mysql_query($query_katjawatan);
				$data_katjawatan	  = mysql_fetch_array($result_katjawatan);

				$ykatid 			  = $data_katjawatan['t_id'];
				$ykatnama             = $data_katjawatan['t_kategori'];

		//TABLE JAWATAN
				$queryjawatan	= "SELECT * FROM tablejawatan WHERE id = '$jawatan'";
				$resultjawatan	= mysql_query($queryjawatan) or die(mysql_error());
				$data_jawatan	= mysql_fetch_array($resultjawatan);

				$yjawatid		= $data_jawatan['id'];
				$yjawatanama   	= $data_jawatan['jawatan'];

		//TABLE UNIT
				$query_unit 	= "select * from tableunit WHERE kodunit = '$unit'";
				$result_unit 	= mysql_query($query_unit);
				$data_unit 		= mysql_fetch_array($result_unit);

				$unit	= $data_unit['unit'];

		//TABLE WAKTU BETUGAS
				$querywbetugas  = "SELECT * FROM tbl_waktubertugas WHERE id ='$officehour'";
				$resultwbetugas = mysql_query($querywbetugas);
				$datawbetugas   = mysql_fetch_array($resultwbetugas);

				$ywbid 			= $datawbetugas['id'];
				$ywbnama        = $datawbetugas['nama'];

		//TABLE BIL ANAK
				$querybil 		= "select * from tbl_bilanak WHERE id = '$bilanak'";
				$resultbil 		= mysql_query($querybil);
				$databil 		= mysql_fetch_array($resultbil);

				$resultbil		= $databil['bilangan'];

        // TEMPAT BETUGAS
				$query_tbertugas = "select * from tablejabatan WHERE kodjabatan = '$tbertugas'";
				$result_tbertugas = mysql_query($query_tbertugas);
				$data_tbertugas = mysql_fetch_array($result_tbertugas);

				$result_tbertugas	= $data_tbertugas['jabatan'];

		//TABLE KATEGORI KELUARGA
				$querykel	= "SELECT * FROM tblkeluargapp WHERE k_id = '$katkeluarga'";
				$resultkel	= mysql_query($querykel) or die(mysql_error());
				$datakel	= mysql_fetch_array($resultkel);

				$ykelid		= $datakel['k_id'];
				$ykelnama  	= $datakel['k_nama'];

		//TABLE ALAMAT
				$queryalamat 	="SELECT * FROM tblalamat WHERE a_id ='$tawaran'";
				$resultalamat	= mysql_query($queryalamat ) or die(mysql_error());
				$dataalamat		= mysql_fetch_array($resultalamat);

				$idtawaran     = $dataalamat['a_id'];
				$namatawaran   = $dataalamat['a_nama'];

						
		//FORMAT SURAT
			//$dtdaftarn		= date('d-m-Y',strtotime($dtdaftar));
			//$dtresitn			= date('d-m-Y',strtotime($dtresit));

			$dtmohon		= date('d-m-Y',strtotime($tmohon));
			$dtkhidmat      = date('d-m-Y',strtotime($tberkhidmat));

			date_default_timezone_set('Asia/Kuala_Lumpur');
			$today 		= date('d-m-Y');
			

		
		//==========================================
		//				TAJUK
		//==========================================

		//row
		$t=0;
		$ln=265+$t;
		$this->Line(15,$ln,198,$ln,'');

		// //line kiri
		// $ln=5+$t;
		// $h=290+$t;
		// $ha=54+$t;
		// $this->Line(16,$h,16,$ln,'');

		// //line kanan
		// $ln=5+$t;
		// $h=290+$t;
		// $ha=54+$t;
		// $this->Line(196,$h,196,$ln,'');


		$this->SetFont('arial', 'B', 11, '', true);	
		
		//LAMPIRAN
			$this->Ln(0);
			$this->Cell(158);
			$this->Cell(1,1,'Lampiran V',0,0,'L');
		//DALAM SALINAN	 
			$this->Ln(13);
			$this->Cell(1);
			$this->Cell(1,1,'Dalam 2 Salinan',0,0,'L');
			
		// AKUAN MASUK RUMAH
			$this->Ln(10);
			$this->Cell(70);
			$this->Cell('',1,'SIJIL AKUAN MASUK RUMAH',0,0,'L');
		// KOD
			$this->Ln(7);
			$this->Cell(85);
			$this->Cell(1,1,"(P.A 'E' 29)",0,0,'L');

		$this->SetFont('arial', '', 11, '', true);	
		//BRACKET
			$this->Ln(6);
			$this->Cell(40);
			$this->Cell(1,1,'(Satu salinan hendaklah dihantar kepada Pegawai Perumahan)',0,0,'L');
		
		
		
		//====================================================
		//	TARIKH MASUK RUMAH | NOMBOR RUMAH | TEMPAT
		//====================================================
		
		$this->SetFont('arial', '', 11, '', true);	
		
		//TARIKH MASUK RUMAH |NOMBOR RUMAH | TEMPAT
			$this->Ln(10);
			$this->Cell(1);
			$this->Cell(87,1,'Tarikh Masuk Rumah',0,0,'L');
			$this->Cell(30,1,'Nombor Rumah',0,0,'L');
			$this->MultiCell(62, 4, "$namatawaran", 0, 'L', 0, 0, '', '', true);
			$this->Ln(12);
			$this->Cell(1);
			$this->Cell(87,1,"$pmasuk",0,0,'L');
			$this->Cell(30,1,'Tempat',0,0,'L');
			$this->MultiCell(62, 4, "$lokasinama", 0, 'L', 0, 0, '', '', true);
			
		
		$this->SetFont('arial', '', 11, '', true);	
		//NAMA ANGGOTA
			$this->Ln(17);
			$this->Cell(1);
			$this->setCellHeightRatio(1.5);
			$this->MultiCell(170, 4,"Dengan ini diakui bahawa saya telah menduduki rumah tersebut di atas mulai tarikh seperti yang ditulis. Semua alat,perabot,seperti dalam Buku Daftar Barang-Barang dan kawasan rumah ini didapati dalam keadaan yang baik, kecuali yang tersebut di bawah. Dengan ini juga saya membenarkan sewa rumah dan perabot dipotong daripada gaji saya.", 0, 'J', 0, 0, '', '', true);
			
		

		$this->SetFont('arial', '', 11, '', true);
		//TANDATANGAN PEGAWAI
			$this->Ln(30);
			$this->Cell(1);
			$this->Cell(1,1,'Catatan pegawai masuk tentang keadaan rumah/perabot:*',0,0,'L');
			$this->Ln(10);
			$this->Cell(10);
			$this->Cell(55,1,'Tandatangan pegawai',0,0,'L');
			$this->Cell('',1,'................................................................................................',0,0,'L');	
			$this->Ln(2);

		//Nama
			$this->Ln(7);
			$this->Cell(1);
			$this->Cell(9);
			$this->Cell(55,1,'Nama Penuhnya',0,0,'L');
			$this->Cell('',1,"$namapengguna",0,0,'L');	
			$this->Ln(2);

		//Jawatan
			$this->Ln(7);
			$this->Cell(1);
			$this->Cell(9);
			$this->Cell(55,1,'Jawatan',0,0,'L');
			$this->MultiCell('', 4, "$yjawatanama ", 0, 'L', 0, 0, '', '', true);
			//$this->Cell('',1,"$yjawatanama ",0,0,'L');	
			$this->Ln(2);

		//Jabatan
			$this->Ln(17);
			$this->Cell(1);
			$this->Cell(9);
			$this->Cell(55,1,'Jabatan',0,0,'L');
			$this->Cell('',1,"$result_tbertugas",0,0,'L');	
			$this->Ln(2);

		//Tarikh
			$this->Ln(7);
			$this->Cell(1);
			$this->Cell(9);
			$this->Cell(55,1,'Tarikh',0,0,'L');
			$this->Cell('',1,"$dtmohon",0,0,'L');	
			$this->Ln(2);

		$this->SetFont('arial', '', 11, '', true);
		//TANDATANGAN PP
			$this->Ln(10);
			$this->Cell(1);
			$this->Cell(1,1,'Catatan Pegawai Perumahan:',0,0,'L');
			$this->Ln(10);
			$this->Cell(10);
			$this->Cell(55,1,'Tandatangan pegawai',0,0,'L');
			$this->Cell('',1,'.................................................................................................',0,0,'L');	
			$this->Ln(2);

		//Nama PP
			$this->Ln(7);
			$this->Cell(1);
			$this->Cell(9);
			$this->Cell(55,1,'Nama Penuhnya',0,0,'L');
			$this->Cell('',1,'.................................................................................................',0,0,'L');	
			$this->Ln(2);

		//Jawatan PP
			$this->Ln(7);
			$this->Cell(1);
			$this->Cell(9);
			$this->Cell(55,1,'Jawatan',0,0,'L');
			$this->Cell('',1,'.................................................................................................',0,0,'L');	
			$this->Ln(2);


		//Tarikh PP
			$this->Ln(7);
			$this->Cell(1);
			$this->Cell(9);
			$this->Cell(55,1,'Tarikh',0,0,'L');
			$this->Cell('',1,'.................................................................................................',0,0,'L');		
$this->SetFont('arial', '', 9, '', true);
		//BAWAH LINE
			$this->Ln(28);
			$this->Cell(52);
			$this->Cell(9);
			$this->Cell(55,1,'*Jika rumah dan perabot dalam keadaan yang memuaskan tulis "Tiada" di ruang ini',0,0,'C');	
			$this->Ln(2);


		
		 
    }
	
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

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




			
			

// ---------------------------------------------------------
 
//Close and output PDF document
$pdf->Output('SIJIL AKUAN MASUK RUMAH.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
?>