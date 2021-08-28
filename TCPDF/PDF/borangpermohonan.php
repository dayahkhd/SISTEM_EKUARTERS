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
			else
			{
				// Logo
				$image_file = K_PATH_IMAGES.'header1.jpg';
				$this->Image($image_file, 10, 10, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
		 }
    }

    // =========================================
	//					FOOTER
	// =========================================
    public function Footer() 
	{
		if($this->page == 1 )
		{
			// Position at 15 mm from bottom
			$this->SetY(-15);
			$image_file2 = K_PATH_IMAGES.'footer2.jpg';
			$this->Image($image_file2, 10, 270, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

		}
		if($this->page == 2)
		{
			// Position at 15 mm from bottom
			$this->SetY(-15);
			$image_file2 = K_PATH_IMAGES.'footer2.jpg';
			$this->Image($image_file2, 10, 270, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

		}
    }


	
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
				$querylmohon 		= "SELECT * FROM tbl_lokasi WHERE l_id = '$lokasimohon'";
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
						
		//FORMAT SURAT
			//$dtdaftarn		= date('d-m-Y',strtotime($dtdaftar));
			//$dtresitn			= date('d-m-Y',strtotime($dtresit));

			$dtmohon		= date('d-m-Y',strtotime($tmohon));
			$dtkhidmat      = date('d-m-Y',strtotime($tberkhidmat));

			date_default_timezone_set('Asia/Kuala_Lumpur');
			$today 		= date('d-m-Y');
			

		//==========================================
		//			TARIKH DAN NO RUJUKAN
		//==========================================
				
		$this->SetFont('arial', '', 10, '', true);	
			
		//RUJ TUAN
			$this->Ln(14);
			$this->Cell(90);
			$this->Cell(1,1,'Ruj. Tuan',0,0,'L');
			$this->Cell(25);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			//$this->Cell(1,1,"$rujuktuan",0,0,'L');
		
		
		//RUJ KAMI
			$this->Ln(5);
			$this->Cell(90);
			$this->Cell(1,1,'Ruj. Kami',0,0,'L');
			$this->Cell(25);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			//$this->Cell(1,1,"$rujukkami",0,0,'L');
			
			
		//TARIKH
			$this->Ln(5);
			$this->Cell(90);
			$this->Cell(1,1,'Tarikh',0,0,'L');
			$this->Cell(25);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$today",0,0,'L');
		
		//==========================================
		//				ALAMAT MAJIKAN
		//==========================================
								
		$this->SetFont('arial', '', 11, '', true);	
		
		//MEMO
			$this->Ln(9);
			$this->Cell(10);
			//$this->MultiCell(90, 4, "$hubungi", 0, 'L', 0, 0, '', '', true);			
		
		//NAMA ALAMAT	
			$this->Ln(5);
			$this->Cell(10);
			//$this->MultiCell(120, 4, "$alamatpe", 0, 'L', 0, 0, '', '', true);
			
		// Y Bhg Dato`/Datin/Tuan/Puan	
			$this->Ln(1);
			$this->Cell(10);
			$this->Cell(1,1,'Y Bhg Dato`/Datin/Tuan/Puan',0,0,'L');
		
		//====================================================
		//			TAJUK | NAMA ANGGOTA | NO MYKAD 
		//====================================================
		
		$this->SetFont('arial', 'B', 11, '', true);	
		
		//TAJUK SURAT
			$this->Ln(7);
			$this->Cell(10);
			$this->Cell(1,1,'PERMOHONAN MENDUDUKI KUARTERS',0,0,'L');
			$this->Ln(5);

		$this->SetFont('arial', '', 11, '', true);	
		//A)MAKLUMAT PEMOHON
			$this->Ln(7);
			$this->Cell(10);
			$this->Cell(1,1,'A. MAKLUMAT PEMOHON',0,0,'L');
			$this->Ln(2);

		$this->SetFont('arial', '', 10, '', true);	
		//NAMA ANGGOTA
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Nama',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$namapengguna",0,0,'L');
			$this->Ln(2);
			
		//NO. K/P
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'No K/P',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$icpengguna",0,0,'L');
			$this->Ln(2);

		//TARIKH MOHON
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Tarikh mohon',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$dtmohon",0,0,'L');
			$this->Ln(2);
		//LOKASI MOHON
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Lokasi mohon',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$lokasinama",0,0,'L');
			$this->Ln(2);

		//JANTINA
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Jantina',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$jantinadb",0,0,'L');
			$this->Ln(2);

		//STATUS PERKAHWINAN
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Status perkahwinan',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$spdb",0,0,'L');
			$this->Ln(2);

		//NO TELEFON RUMAH
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'No telefon Rumah',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$telrumah",0,0,'L');
			$this->Ln(2);

		//NO TELEFON RUMAH
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'No telefon HP',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$telhp",0,0,'L');
			$this->Ln(2); 

		//NO TELEFON PEJABAT
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'No telefon Pejabat',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$telpejabat",0,0,'L');
			$this->Ln(2);

		$this->SetFont('arial', '', 11, '', true);	
		//B)MAKLUMAT PEKERJAAN PEMOHON
			$this->Ln(7);
			$this->Cell(10);
			$this->Cell(1,1,'B. MAKLUMAT PEKERJAAN PEMOHON',0,0,'L');
			$this->Ln(3);

		$this->SetFont('arial', '', 10, '', true);
		//KATEGORI JAWATAN
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Kategori jawatan',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$ykatnama ",0,0,'L');
			$this->Ln(2);

		//JAWATAN
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Jawatan',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$yjawatanama ",0,0,'L');
			$this->Ln(2);

		//TEMPAT BERTUGAS
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Tempat Bertugas',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$result_tbertugas",0,0,'L');
			$this->Ln(2);

		//UNIT
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Unit',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$unit ",0,0,'L');
			$this->Ln(2);

		//TARIKH MULA BERKHIDMAT
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Tarikh mula berkhidmat',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$dtkhidmat",0,0,'L');
			$this->Ln(2);

		//WAKTU BETUGAS
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Waktu bertugas',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$ywbnama  ",0,0,'L');
			$this->Ln(2);

		$this->SetFont('arial', '', 11, '', true);	
		//C)MAKLUMAT KELUARGA PEMOHON
			$this->Ln(7);
			$this->Cell(10);
			$this->Cell(1,1,'C. MAKLUMAT KELUARGA PEMOHON',0,0,'L');
			$this->Ln(3);


		//NAMA SUAMI ATAU ISTERI
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Nama suami/isteri',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$namapasangan",0,0,'L');
			$this->Ln(2);
		//NO KP SUAMI ATAU ISTERI
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'No k/p',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$nokppasangan",0,0,'L');
			$this->Ln(2);
		//JAWATAN SUAMI ATAU ISTERI
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Jawatan pasangan',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$jawatanpasangan",0,0,'L');
			$this->Ln(2);
		//KATEGORI KELUARGA
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Kategori keluarga',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$ykelnama",0,0,'L');
			$this->Ln(2);
		//TEMPAT BERTUGAS SUAMI ATAU ISTERI
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Tempat bertugas',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$tbpasangan",0,0,'L');
			$this->Ln(2);
		//WAKTU BERTUGAS SUAMI ATAU ISTERI
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Waktu bertugas pasangan',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$ywbnama",0,0,'L');
			$this->Ln(2);

		//BILANGAN ANAK
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Bilangan anak',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$resultbil",0,0,'L');
			$this->Ln(2);

        $this->SetFont('arial', '', 11, '', true);	
		//D)MAKLUMAT KEDIAMAN PEMOHON
			$this->Ln(44);
			$this->Cell(10);
			$this->Cell(1,1,'D. MAKLUMAT KEDIAMAN PEMOHON',0,0,'L');
			$this->Ln(3);

		$this->SetFont('arial', '', 10, '', true);	
		//	ALAMAT TEMPAT TINGGAL SEKARANG
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Alamat sekarang ',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$alamatlama",0,0,'L');
			$this->Ln(2);


		//ADA RUMAH SENDIRI KE TAK, CHECKBOX

			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Adakah suami/isteri Tuan/Puan mempunyai rumah sendiri. Jika ya sila nyatakan alamat rumah:',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			//$this->Cell(1,1,"$alamatlama",0,0,'L');
			$this->Ln(2);

		//checkbox 1
			$this->Ln(5);
			$this->Cell(20);
			
			if ($xcheckbox1	 == '0')
			{
				$this->Image('images/unchecked.jpg', '', '', 7, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);
			}
			else
			{
				$this->Image('images/checked.jpg', '', '', 7, 5, '', '', '', false, 2250, '', false, false, 1, false, false, false);
			}

			
			$this->Cell(10);
			$this->Cell(1,1,'Pinjaman Perumahan kerajaan',0,0,'L');
			$this->Ln(2);

		//checkbox 2
			$this->Ln(5);
			$this->Cell(20);
			
			if ($xcheckbox2	 == '0')
			{
				$this->Image('images/unchecked.jpg', '', '', 7, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);
			}
			else
			{
				$this->Image('images/checked.jpg', '', '', 7, 5, '', '', '', false, 2250, '', false, false, 1, false, false, false);
			}
			
			$this->Cell(10);
			$this->Cell(1,1,'Pinjaman Bank',0,0,'L');
			$this->Ln(2);

		//checkbox 3
			$this->Ln(5);
			$this->Cell(20);
			
			if ($xcheckbox3	 == '0')
			{
				$this->Image('images/unchecked.jpg', '', '', 7, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);
			}
			else
			{
				$this->Image('images/checked.jpg', '', '', 7, 5, '', '', '', false, 2250, '', false, false, 1, false, false, false);
			}
			
			$this->Cell(10);
			$this->Cell(1,1,'Lain-lain punca',0,0,'L');
			$this->Ln(3);

		//ALAMAT RUMAH
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Alamat rumah ',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$alamatsendiri",0,0,'L');
			$this->Ln(2);

		//JARAK RUMAH

			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'Jarak rumah',0,0,'L');
			$this->Cell(70);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$jarakrumah",0,0,'L');
			$this->Ln(2);
		//===============================
		//				AYAT 
		//===============================
		
		$this->SetFont('arial', '', 11, '', true);	
		
		//AYAT PEMBUKA
			$this->Ln(7);
			$this->Cell(10);
			$this->MultiCell(170, 4,"Dengan segala hormatnya merujuk kepada permohonan tuan / puan  bertarikh $dtmohon  berhubung dengan perkara di atas.", 0, 'L', 0, 0, '', '', true);
			
		//2.
			$this->Ln(15);
			$this->Cell(10);
			$this->MultiCell(170, 4,"2.      Saya memohon menduduki rumah kerajaan Hospital Sultanah Aminah kerana $sebabmohon ", 0, 'L', 0, 0, '', '', true);
			
	
			
		//3.
			$this->Ln(15);
			$this->Cell(10);
			$this->MultiCell(170, 4,"3.      Saya mengaku bahawa segala keterangan yang diberikan di atas adalah benar. Sekiranya keterangan saya adalah palsu, pihak pengurusan Hospital Sultanah Aminah Johor Bahru berhak mengambil sebarang tindakan ke atas saya. Saya juga bersedia/tidak bersedia untuk bertugas pada bila-bila masa diperlukan.", 0, 'L', 0, 0, '', '', true);
		
	   // TANDATANGAN PEMOHON
			$this->Ln(30);
			$this->Cell(10);
			$this->Cell(1,1,'.........................................',0,0,'L');
			

			$this->Ln(7);
			$this->Cell(11);
			$this->Cell(1,1,'(Tandatangan pemohon)',0,0,'L');

		//4.
			$this->Ln(17);
			$this->Cell(10);
			$this->MultiCell(170, 4,"4.      Dengan ini, saya mengesahkan bahawa segala butiran di atas adalah benar. Saya menyokong ini kerana $pengesahan", 0, 'L', 0, 0, '', '', true);

		// TANDATANGAN COP KETUA UNIT/JABATAN
			$this->Ln(20);
			$this->Cell(10);
			$this->Cell(1,1,'.........................................',0,0,'L');
			


			$this->Ln(7);
			$this->Cell(11);
			$this->Cell(1,1,'(Tandatangan & Cop Ketua Unit/ Jabatan)',0,0,'L');

		//SEKIAN TERIMA KASIH
			$this->Ln(30);
			$this->Cell(10);
			$this->Cell(1,1,'Sekian, terima kasih.',0,0,'L');
			
			
		//===============================
		//				SLOGAN
		//===============================
			
		$this->SetFont('arial', 'B', 11, '', true);	
			
						
		//SLOGAN 1
			$this->Ln(9);
			$this->Cell(10);
			$this->Cell(1,1,'"BERKHIDMAT UNTUK NEGARA"',0,0,'L');
			

		//===============================
		//			SIGN
		//===============================
			
		$this->SetFont('arial', '', 11, '', true);
			
		//SAYA YANG MENURUT PERINTAH
		// 	$this->Ln(11);
		// 	$this->Cell(10);
		// 	$this->Cell(1,1,'Saya yang menurut perintah,',0,0,'L');
			
			
			
		// //..............................
		// 	$this->Ln(17);
		// 	$this->Cell(10);
		// 	$this->Cell(1,1,'.........................................',0,0,'L');
			
			
		//NAMA PENGARAH
			$this->Ln(4);
			$this->Cell(10);
		//	$this->MultiCell(110, 4,"$pengarah1", 0, 'L', 0, 0, '', '', true);	 
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
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->AddPage("P");
$pdf->body();




			
			

// ---------------------------------------------------------
 
//Close and output PDF document
$pdf->Output('BORANG PERMOHONAN KUARTERS.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
?>