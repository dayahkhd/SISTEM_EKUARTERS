<?php
/*
		========================================================
		CREATED BY:
					AMIRAH NABILAH BINTI MOHD SAPINYE
					JABATAN KESIHATAN NEGERI JOHOR
								2017 
					AKUAN PENERIMAAN LAPORAN PERUBATAN
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
			
			$id = $_GET['id'];
			//TABLE SURAT
				$querysurat 	= "SELECT * FROM tblsurat WHERE norujukan = '$id'";
				$resultsurat	= mysql_query($querysurat) or die(mysql_error());
				$datasurat 		= mysql_fetch_array($resultsurat);
				
				$ptjlogin 		= $datasurat['ptj'];
			
			// *********************************************
			//		1. HOSPITAL SULTANAH NORA ISMAIL 
			// *********************************************
			if($ptjlogin == 30101)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_112.jpg';
				$this->Image($image_file, 10,7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		2. HOSPITAL SULTANAH AMINAH JOHOR BAHRU
			// *********************************************
			else if($ptjlogin == 30201)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_113.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		3. HOSPITAL SULTAN ISMAIL
			// *********************************************
			else if($ptjlogin == 30202)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_114.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		4. HOSPITAL PERMAI
			// *********************************************
			else if($ptjlogin == 30203)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_115.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		5. HOSPITAL ENCHE' BESAR HAJJAH KHALSOM
			// *********************************************
			else if($ptjlogin == 30301)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_116.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		6. HOSPITAL KOTA TINGGI
			// *********************************************
			else if($ptjlogin == 30401)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_117.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// ***********************************************************
			//		7. HOSPITAL TEMENGGONG MAHARAJA TUN IBRAHIM KULAI
			// ***********************************************************
			else if($ptjlogin == 30501)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_118.jpg';
				$this->Image($image_file, 10,7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		8. HOSPITAL TANGKAK
			// *********************************************
			else if($ptjlogin == 30601)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_119.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		9. HOSPITAL MERSING
			// *********************************************
			else if($ptjlogin == 30701)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_120.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			
			// *********************************************
			// 		10. HOSPITAL PAKAR SULTANAH FATIMAH, MUAR
			// *********************************************
			else if($ptjlogin == 30801)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_121.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		11. HOSPITAL PONTIAN
			// *********************************************
			else if($ptjlogin == 30901)
			{
				// Logo
				$image_file = K_PATH_IMAGES.'../LH/LH_122.jpg';
				$this->Image($image_file, 10, 7, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			
			
			// *********************************************
			//		12. HOSPITAL SEGAMAT
			// *********************************************
			else if($ptjlogin == 31001)
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
		$id = $_GET['id'];
		
		//TABLE SURAT
		$querysurat 	= "SELECT * FROM tblsurat WHERE norujukan = '$id'";
		$resultsurat	= mysql_query($querysurat) or die(mysql_error());
		$datasurat 		= mysql_fetch_array($resultsurat);
				
		$ptjlogin 		= $datasurat['ptj'];
		if($this->page == 1)
		{
			if($ptjlogin == 30501)
			{
				
				// Position at 15 mm from bottom
				$this->SetY(-15);
				$image_file2 = K_PATH_IMAGES.'footerKulai.png';
				$this->Image($image_file2, 10, 270, 190, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			else if($ptjlogin == 30101)
			{
				
				// Position at 15 mm from bottom
				$this->SetY(-15);
				$image_file2 = K_PATH_IMAGES.'footerBP.jpg';
				$this->Image($image_file2, 10, 270, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}
			else
			{
				// Position at 15 mm from bottom
				$this->SetY(-15);
				$image_file2 = K_PATH_IMAGES.'footer2.jpg';
				$this->Image($image_file2, 10, 270, 190, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			}			
		}
    }

    // =========================================
	//					BODY
	// =========================================
    public function Body() 
	{
		
		
		//==========================================
		//					DATABASE
		//==========================================
		
		include("new.php");
		
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$today2 		= date('d-m-Y');
		
		$statusaktif = 1;			
		$id = $_GET['id'];
		
		// TABLE SURAT | ID
		$querycari 		= "SELECT * FROM tblsurat WHERE norujukan ='$id' ";
		$resultcari 	= mysql_query($querycari) or die(mysql_error());
		$datacari 		= mysql_fetch_array($resultcari); 
		
		$rujuktuan		= $datacari['rujuktuan'];
		$rujukkami		= $datacari['rujukkami'];
		$pemohon		= $datacari['pemohon'];
		$alamatpe		= $datacari['alamatpe'];
		$pesakit		= $datacari['pesakit'];
		$docno			= $datacari['docno'];
		$dtdaftara		= $datacari['dtdaftar'];
		$dtdaftara2		= $datacari['dtdaftar2'];
		$noresit		= $datacari['noresit'];
		$dtresita		= $datacari['dtresit'];
		$norujukan		= $datacari['norujukan'];
		$amaun			= $datacari['amaun'];
		$catatan		= $datacari['catatan'];
		$ptjlogin 		= $datacari['ptj'];
		$lengkap		= $datacari['lengkap'];
		$tidaklengkap	= $datacari['tidaklengkap'];
		$kadrawatan		= $datacari['kadrawatan'];
		$lain			= $datacari['lain'];
		$suratizin		= $datacari['suratizin'];
		$bayaran		= $datacari['bayaran'];
		$yangbenar		= $datacari['yangbenar'];
		//$pengarah		= $datacari['pengarah'];
		$jawatan 		= $datacari['jawatan'];

	// TABLE PERMOHONAN
		$query 			= "SELECT * FROM tblpermohonan WHERE norujukan='$norujukan'";
		$result 		= mysql_query($query) or die(mysql_error());
		$data 			= mysql_fetch_array($result);

		$disiplin 		= $data['disiplin'];
		$noresit3 		= $data['noresit3'];
		$dtresita3 		= $data['dtresit3'];

	// TABLE DISIPLIN
		$query 			= "SELECT * FROM disiplin WHERE id = '$disiplin'";
		$result 		= mysql_query($query) or die(mysql_error());
		$data 			= mysql_fetch_array($result);

		$disiplin 		= $data['perihal'];
		
		
		
		// ** TARIKH DAFTAR **
		if (($dtdaftara == '1970-01-01')||($dtdaftara == '0000-00-00')||($dtdaftara == ''))
		{$dtdaftar 		= '00-00-0000';}
		else
		{$dtdaftar 		= date('d-m-Y',strtotime($dtdaftara));}
		
		// ** TARIKH RESIT **
		if (($dtresita == '1970-01-01')||($dtresita == '0000-00-00')||($dtresita == ''))
		{$dtresit		= '00-00-0000';}
		else
		{$dtresit 		= date('d-m-Y',strtotime($dtresita));}

		// ** TARIKH RESIT TAMBAHAN **
		if (($dtresita3 == '1970-01-01')||($dtresita3 == '0000-00-00')||($dtresita3 == ''))
		{$dtresit3 = '0000-00-00';}
		else
		{$dtresit3 		= date('Y-m-d',strtotime($dtresita3));}
		
		if(($dtdaftara2 == '1970-01-01')||($dtdaftara2 == '0000-00-00')||($dtdaftara2 == ''))
		{
			if(($dtdaftara == '1970-01-01')||($dtdaftara == '0000-00-00')||($dtdaftara == ''))
			{
				$today = $today2;
			}
			else
			{
				$dtdaftarn 		= date('d-m-Y',strtotime($dtdaftara));
				$today 			= $dtdaftarn;
			}
		}
		else
		{
			$dtdaftar2n 		= date('d-m-Y',strtotime($dtdaftara2));
			$today				= $dtdaftar2n ;
		}
		
		// TABLE PTJ
		$queryptj 		= "SELECT * FROM kodptj where kodjabatan = '$ptjlogin'";
		$resultptj 		= mysql_query($queryptj) or die(mysql_error());
		$dataptj 		= mysql_fetch_array($resultptj);
		
		$ptjnama 		= $dataptj['jabatan'];
		$email			= $dataptj['emel'];
		$notel			= $dataptj['notel'];
		
		
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
			$this->Cell(1,1,"$rujuktuan",0,0,'L');
		
		
		//RUJ KAMI
			$this->Ln(5);
			$this->Cell(90);
			$this->Cell(1,1,'Ruj. Kami',0,0,'L');
			$this->Cell(25);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$rujukkami",0,0,'L');
			
			
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
								
		$this->SetFont('arial', 'B', 11, '', true);	
		
		//MEMO
			$this->Ln(9);
			$this->Cell(10);
			$this->MultiCell(90, 4, "$pemohon", 0, 'L', 0, 0, '', '', true);			
		
		$this->SetFont('arial', '', 10, '', true);	
		//NAMA ALAMAT	
			$this->Ln(5);
			$this->Cell(10);
			$this->MultiCell(100, 4, "$alamatpe", 0, 'L', 0, 0, '', '', true);
			
			
		// Y Bhg Dato`/Datin/Tuan/Puan	
			$this->Ln(23);
			$this->Cell(10);
			$this->Cell(1,1,'Y Bhg Dato`/Datin/Tuan/Puan',0,0,'L');
		
		//====================================================
		//			TAJUK | NAMA ANGGOTA | NO MYKAD 
		//====================================================
		
		$this->SetFont('arial', 'B', 11, '', true);	
		
		//TAJUK SURAT
			$this->Ln(5);
			$this->Cell(10);
			$this->Cell(1,1,'SURAT AKUAN PENERIMAAN PERMOHONAN LAPORAN PERUBATAN',0,0,'L');
			
		$this->SetFont('arial', '', 9, '', true);
		
		//NAMA ANGGOTA
			$this->Ln(5);
			$this->Cell(10);
			$this->Cell(1,1,'NAMA',0,0,'L');
			$this->Cell(58);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->SetFont('arial', 'B', 10, '', true);	
			$this->Cell(1,1,"$pesakit",0,0,'L');
		
		$this->SetFont('arial', '', 9, '', true);	
		//NO. K/P
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'NO KAD PENGENALAN / PASSPORT',0,0,'L');
			$this->Cell(58);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->SetFont('arial', 'B', 10, '', true);	
			$this->Cell(1,1,"$docno",0,0,'L');
		
		$this->SetFont('arial', '', 9, '', true);
		//DISIPLIN
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'DISIPLIN',0,0,'L');
			$this->Cell(58);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->SetFont('arial', 'B', 10, '', true);	
			$this->Cell(1,1,"$disiplin",0,0,'L');

		$this->SetFont('arial', '', 9, '', true);
		//NO RESIT BAYARAN
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'NO RESIT BAYARAN',0,0,'L');
			$this->Cell(50);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->SetFont('arial', 'B', 10, '', true);	
			$this->Cell(1,1,"$noresit",0,0,'L');

		$this->SetFont('arial', '', 9, '', true);
		// TARIKH RESIT BAYARAN
			$this->Cell(28);
			$this->Cell(1,1,'TARIKH RESIT BAYARAN',0,0,'L');
			$this->Cell(60);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->SetFont('arial', 'B', 10, '', true);	
			$this->Cell(1,1,"$dtresit",0,0,'L');


		$this->SetFont('arial', '', 9, '', true);
		//NO RESIT BAYARAN TAMBAHAN
			$this->Ln(4);
			$this->Cell(10);
			$this->Cell(1,1,'NO RESIT BAYARAN TAMBAHAN',0,0,'L');
			$this->Cell(50);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->SetFont('arial', 'B', 10, '', true);	
			$this->Cell(1,1,"$noresit3",0,0,'L');

		$this->SetFont('arial', '', 9, '', true);
		// TARIKH RESIT BAYARAN TAMBAHAN
			$this->Cell(28);
			$this->Cell(1,1,'TARIKH RESIT BAYARAN TAMBAHAN',0,0,'L');
			$this->Cell(60);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->SetFont('arial', 'B', 10, '', true);	
			$this->Cell(1,1,"$dtresit3",0,0,'L');
	
		
		//===============================
		//				AYAT 
		//===============================
		
		$this->SetFont('arial', '', 10, '', true);	
		
		//AYAT PEMBUKA
			$this->Ln(6);
			$this->Cell(10);
			$this->MultiCell(170, 4,"Dengan segala hormatnya merujuk kepada permohonan tuan / puan  bertarikh $dtdaftar no resit bayaran $noresit, bertarikh $dtresit berhubung dengan perkara di atas.", 0, 'L', 0, 0, '', '', true);
			
		//2.
			$this->Ln(10);
			$this->Cell(10);
			$this->MultiCell(170, 4,"2.      Permohonan yang diterima adalah :", 0, 'L', 0, 0, '', '', true);
			
		// LENGKAP
			$this->Ln(5);
			$this->Cell(20);
			
			if ($lengkap == '0')
			{
				$this->Image('images/unchecked.jpg', '', '', 5, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);
			}
			else
			{
				$this->Image('images/checked.jpg', '', '', 5, 5, '', '', '', false, 2250, '', false, false, 1, false, false, false);
			}
			
			$this->Cell(10);
			$this->Cell(1,1,'Lengkap',0,0,'L');
			
			// HOSPITAL PAKAR
			if (($ptjlogin=="30201")||($ptjlogin=="30202")||($ptjlogin=="30801")||($ptjlogin=="30101")||($ptjlogin=="31001")||($ptjlogin=="30301")||($ptjlogin=="30203"))
			{			
				$this->Ln(6);
				$this->Cell(20);
				$this->MultiCell(160, 4,"Nombor pendaftaran permohonan adalah $norujukan. Laporan perubatan akan disiapkan dalam tempoh", 0, 'L', 0, 0, '', '', true);
				
				
				$this->SetFont('arial', 'B', 10, '', true);
				
				$this->Ln(5);
				$this->Cell(45);				
				$this->MultiCell(50.1, 1,"empat (4) minggu bekerja.", 0, 'L', 0, 0, '', '', true);
				
				$this->SetFont('arial', '', 10, '', true);
				
				//$this->Ln(5);
				$this->Cell(1);				
				$this->MultiCell(155, 1,"Pihak hospital akan memaklumkan tuan / puan", 0, 'L', 0, 0, '', '', true);
				
				$this->Ln(5);
				$this->Cell(20);				
				$this->MultiCell(155, 1,"secara bertulis apabila laporan siap.", 0, 'L', 0, 0, '', '', true);								
			}
			
			else
			{			
				$this->Ln(5);
				$this->Cell(20);
				$this->MultiCell(155, 4,"Nombor pendaftaran permohonan adalah $norujukan. Laporan perubatan akan disiapkan dalam tempoh", 0, 'L', 0, 0, '', '', true);
				
				
				$this->SetFont('arial', 'B', 10, '', true);
				
				$this->Ln(5);
				$this->Cell(45);				
				$this->MultiCell(46, 1,"dua (2) minggu bekerja.", 0, 'L', 0, 0, '', '', true);
				
				$this->SetFont('arial', '', 10, '', true);
				
				$this->Ln(5);
				$this->Cell(1);				
				$this->MultiCell(100, 1,"Pihak hospital akan memaklumkan tuan / puan secara", 0, 'L', 0, 0, '', '', true);
				
				$this->Ln(5);
				$this->Cell(20);				
				$this->MultiCell(155, 1,"bertulis apabila laporan siap.", 0, 'L', 0, 0, '', '', true);
			}
			
		// TIDAK LENGKAP
			$this->Ln(5);
			$this->Cell(20);
			if ($tidaklengkap == '0')
			{
				$this->Image('images/unchecked.jpg', '', '', 5, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);
			}
			else
			{
				$this->Image('images/checked.jpg', '', '', 5, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);
			}
			$this->Cell(10);
			$this->Cell(1,1,'Tidak Lengkap',0,0,'L');
			
			$this->Ln(5);
			$this->Cell(20);
			$this->MultiCell(155, 4,"Nombor pendaftaran permohonan adalah $norujukan. Sila kemukakan ke pejabat ini:", 0, 'L', 0, 0, '', '', true);
			
			// SURAT KEIZINAN PESAKIT / WARIS
				$this->Ln(6);
				$this->Cell(30);
				
				if($suratizin == '0')
				{
					$this->Image('images/unchecked.jpg', '', '', 5, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);
				}
				else
				{
					$this->Image('images/checked.jpg', '', '', 5, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);
				}
				
				$this->Cell(10);
				$this->Cell(1,1,'Surat keizinan ASAL pesakit / waris berserta dengan tandatangan saksi.',0,0,'L');
				
			// SALINAN KAD RAWTAN / KAD TEMUJANJI PESAKIT
				$this->Ln(6);
				$this->Cell(30);
				if($kadrawatan == '0')
				{
					$this->Image('images/unchecked.jpg', '', '', 5, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);
				}
				else
				{
					$this->Image('images/checked.jpg', '', '', 5, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);
				}
				$this->Cell(10);
				$this->Cell(1,1,'Salinan Kad Rawatan / Kad Temujanji pesakit.',0,0,'L');
				
			// BAYARAN
				$this->Ln(6);
				$this->Cell(30);
				if($bayaran == '0')
				{
					$this->Image('images/unchecked.jpg', '', '', 5, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);
				}
				else
				{
					$this->Image('images/checked.jpg', '', '', 5, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);
				}
				$this->Cell(10);
				$this->Cell(1,1,"Bayaran sebanyak $amaun.",0,0,'L');
				
			// LAIN-LAIN
				$this->Ln(6);
				$this->Cell(30);
				if($lain == '0')
				{
					$this->Image('images/unchecked.jpg', '', '', 5, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);
				}
				else
				{
					$this->Image('images/checked.jpg', '', '', 5, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);
				}
				$this->Cell(10);
				$this->Cell(1,1,"Lain-lain : $catatan",0,0,'L');
			
		//3.
			$this->Ln(7);
			$this->Cell(10);
			$this->MultiCell(170, 4,"3.    Permohonan tuan / puan hanya dapat diproses setelah maklumat lengkap diterima. Sekiranya maklumat lengkap tidak diterima dalam tempoh dua bulan dari tarikh ini maka permohonan ini akan dianggap batal. Sekiranya Laporan Perubatan masih diperlukan, tuan / puan diminta mengemukakan permohonan baru yang lengkap. Sila hubungi pejabat ini di talian", 0, 'J', 0, 0, '', '', true);
			$this->Ln(18);
			$this->Cell(10);
			$this->MultiCell(155, 4,"$notel dan $email untuk pertanyaan lanjut.", 0, 'L', 0, 0, '', '', true);
			
			
		//SEKIAN TERIMA KASIH
			$this->Ln(7);
			$this->Cell(10);
			$this->Cell(1,1,'Sekian, terima kasih.',0,0,'L');
			
			
		//===============================
		//				SLOGAN
		//===============================
			
		$this->SetFont('arial', 'B', 10, '', true);	
			
						
		//SLOGAN 1
			$this->Ln(9);
			$this->Cell(10);
			$this->Cell(1,1,'"BEKHIDMAT UNTUK NEGARA"',0,0,'L');
			

		//===============================
		//			SIGN
		//===============================
			
		$this->SetFont('arial', '', 10, '', true);
			
		//SAYA YANG MENURUT PERINTAH
			$this->Ln(11);
			$this->Cell(10);
			$this->Cell(1,1,'Saya yang menjalankan amanah,',0,0,'L');
			
			
			
		//..............................
			$this->Ln(10);
			$this->Cell(10);
			$this->Cell(1,1,'.........................................',0,0,'L');
			
		$this->SetFont('arial', 'B', 10, '', true);	
		//NAMA PENGARAH
			/*$this->Ln(4);
			$this->Cell(10);
			$this->MultiCell(110, 4,"$yangbenar", 0, 'L', 0, 0, '', '', true);*/
		
			$this->Ln(4);
			$this->Cell(10);
			if($ptjlogin == 30101)
			{
				$this->SetFont('arial','B', 10, '', true);
				$this->MultiCell(110, 4,"DR KHURSIAH BINTI DAUD", 0, 'L', 0, 0, '', '', true);
			}
			else
			{
				$this->SetFont('arial', '', 10, '', true);
				$this->MultiCell(110, 4,"$yangbenar", 0, 'L', 0, 0, '', '', true);
			}
			
		$this->SetFont('arial', '', 10, '', true);
		//NAMA PENGARAH
			$this->Ln(4);
			$this->Cell(10);
			if($ptjlogin == 30101)
			{
				$this->MultiCell(110, 4,"PENGARAH HOSPITAL", 0, 'L', 0, 0, '', '', true);
			}
			else
			{	
				$this->MultiCell(110, 4,"$jawatan", 0, 'L', 0, 0, '', '', true);
			}
			
		//PTJ
			$this->Ln(4);
			$this->Cell(10);
			$this->MultiCell(110, 4,"$ptjnama", 0, 'L', 0, 0, '', '', true);

		//NOTA
			$this->SetFont('arial', '', 9, '', true);

			$this->Ln(7);
			$this->Cell(35);
			$this->Cell(1,1,'(Surat ini tidak memerlukan tandatangan kerana ia dihasilkan terus dari komputer.)',0,0,'L');

	}
	
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
		
			

// ---------------------------------------------------------
 
//Close and output PDF document
$pdf->Output('akuanpenerimanlaporan.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
?>