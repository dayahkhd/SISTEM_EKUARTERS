<?php
/*
		========================================================
		CREATED BY:
					AMIRAH NABILAH BINTI MOHD SAPINYE
					JABATAN KESIHATAN NEGERI JOHOR
								2017 
							[KKMLP12008]
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
			$image_file = K_PATH_IMAGES.'header.jpg';
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
		
		session_start();
		//Connect database
		include("database.php");
		//include("new.php");
		
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$today 		= date('d-m-Y');
			
		$statusaktif = 1;
			
		$id = $_GET['id']; 
		
		//TABLE PEMOHONAN
			$querymohon 	= "SELECT * FROM tblpermohonan where norujukan = '$id'";
			$resultmohon 	= mysql_query($querymohon) or die(mysql_error());
			$datamohon 		= mysql_fetch_array($resultmohon);
		
		//TABLE PATIENT
			$querypatient 	= "SELECT * FROM tblpatient where norujukan = '$id'";
			$resultpatient	= mysql_query($querypatient) or die(mysql_error());
			$datapatient	= mysql_fetch_array($resultpatient);
			
			
			// 1. MAKLUMAT PEMOHON
			$dihubungi		= $datamohon['dihubungi'];
			$nokpnewagen	= $datamohon['nokpnewagen'];
			$hubungan		= $datamohon['hubungan'];
			$alamatagen		= $datamohon['alamatagen'];
			$nohpagen		= $datamohon['nohpagen'];
			$notelagen		= $datamohon['notelagen'];					
			
			$katpermohonan	= $datamohon['katpermohonan'];	
			
			// 2. MAKLUMAT PESAKIT
			$nama			= $datapatient['nama'];
			$rn				= $datamohon['rn'];
			$docno			= $datapatient['docno'];	
			$patjantina		= $datapatient['patjantina'];
			$umur			= $datapatient['umur'];
			$wad			= $datapatient['wad'];
			$dtmularawatan	= $datapatient['dtmularawatan'];
			$dtmasukhosp	= $datapatient['dtmasukhosp'];
			$dtkeluarhosp	= $datapatient['dtkeluarhosp'];
			$dtpatdie		= $datapatient['dtpatdie'];
			$dtbedah		= $datapatient['dtbedah'];	
			
			// 3. LAPORAN YANG DIPOHON		
			$jenislaporan	= $datamohon['jenislaporan'];
			
			// 4. MAKLUMAT BAYARAN
			$bayaran		= $datamohon['bayaran'];
			$katbayar		= $datamohon['katbayar'];
			$amaun			= $datamohon['amaun'];
			$nocek			= $datamohon['nocek'];
			$nokadkredit	= $datamohon['nokadkredit'];
			$nokirimanwang	= $datamohon['nokirimanwang'];
			$namabank		= $datamohon['namabank'];
			$noresit		= $datamohon['noresit'];
			$dtresit		= $datamohon['dtresit'];
			$dtdaftar		= $datamohon['dtdaftar'];
		
			$norujukan		= $datamohon['norujukan'];
		
					
		//TABLE JANTINA
			$queryjantina 	= "SELECT * FROM tbljantina where id = '$patjantina'";
			$resultjantina 	= mysql_query($queryjantina) or die(mysql_error());
			$datajantina 	= mysql_fetch_array($resultjantina);
			
			$jantina		= $datajantina['jantina'];
		
		//TABLE JANTINA
			$querylaporan 	= "SELECT * FROM jenislaporan where idlap = '$jenislaporan'";
			$resultlaporan 	= mysql_query($querylaporan) or die(mysql_error());
			$datalaporan 	= mysql_fetch_array($resultlaporan);
			
			$laporan		= $datalaporan['jenislaporan'];
		
		//TABLE BAYAR
			$querybayar 	= "SELECT * FROM tblkatbayar where id = '$katbayar'";
			$resultbayar 	= mysql_query($querybayar) or die(mysql_error());
			$databayar		= mysql_fetch_array($resultbayar);
			
			$kadarbayaran	= $databayar['katbayar'];
				
		// TABLE JADUAL 	
			$querycari24 	= "SELECT * FROM tbljadual WHERE norujukan='$id'";
			$resultcari24 	= mysql_query($querycari24) or die(mysql_error());
			$datacari24 	= mysql_fetch_array($resultcari24);
			
			$dtjangkasiapa 	= $datacari24['dtjangkasiap'];
			$dtterima 		= $datacari24['dtterima'];
				
		//FORMAT TARIKH
		
		// 1. TARIK MULA RAWATAN
		if (($dtmularawatan == '1970-01-01')||($dtmularawatan == '0000-00-00')||($dtmularawatan == ''))
		{$dtmularawatann = '00-00-0000';}
		else
		{$dtmularawatann	= date('d-m-Y',strtotime($dtmularawatan));}
		
		// 2. TARIKH MASUK HOSPITAL
		if (($dtmasukhosp == '1970-01-01')||($dtmasukhosp == '0000-00-00')||($dtmasukhosp == ''))
		{$dtmasukhospn = '00-00-0000';}
		else
		{$dtmasukhospn	= date('d-m-Y',strtotime($dtmasukhosp));}
		
		// 3. TARIKH KELUAR HOSPITAL
		if (($dtkeluarhosp == '1970-01-01')||($dtkeluarhosp == '0000-00-00')||($dtkeluarhosp == ''))
		{$dtkeluarhospn = '00-00-0000';}
		else
		{$dtkeluarhospn	= date('d-m-Y',strtotime($dtkeluarhosp));}
		
		// 4. TARIKH PATIEN DIE
		if (($dtpatdie == '1970-01-01')||($dtpatdie == '0000-00-00')||($dtpatdie == ''))
		{$dtpatdien = '00-00-0000';}
		else
		{$dtpatdien		= date('d-m-Y',strtotime($dtpatdie));}
		
		// 5. TARIKH BEDAH
		if (($dtbedah == '1970-01-01')||($dtbedah == '0000-00-00')||($dtbedah == ''))
		{$dtbedahn = '00-00-0000';}
		else
		{$dtbedahn		= date('d-m-Y',strtotime($dtbedah));}
		
		// 6. TARIKH RESIT
		if (($dtresit == '1970-01-01')||($dtresit == '0000-00-00')||($dtresit == ''))
		{$dtresitn = '00-00-0000';}
		else
		{$dtresitn		= date('d-m-Y',strtotime($dtresit));}
		
		// 7. TARIKH TERIMA
		if (($dtterima == '1970-01-01')||($dtterima == '0000-00-00')||($dtterima == ''))
		{$dtteriman = '00-00-0000';}
		else
		{$dtteriman		= date('d-m-Y',strtotime($dtterima));}
		
		// 8. TARIKH DAFTAR
		if (($dtdaftar == '1970-01-01')||($dtdaftar == '0000-00-00')||($dtdaftar == ''))
		{$dtdaftarn = '00-00-0000';}
		else
		{$dtdaftarn		= date('d-m-Y',strtotime($dtdaftar));}
		
		//9. TARIKH JANGKA SIAP	
		if (($dtjangkasiapa == '1970-01-01')||($dtjangkasiapa == '0000-00-00')||($dtjangkasiapa == ''))
		{$dtjangkasiap = '00-00-0000';}
		else
		{$dtjangkasiap = date('d-m-Y',strtotime($dtjangkasiapa));}
		
		// PEGAWAI NAMA
			//$querypeg 	= "SELECT * FROM user where username = '$clogin' AND phone = '$cbaha'";
			//$resultpeg 	= mysql_query($querypeg) or die(mysql_error());
			//$datapeg 		= mysql_fetch_array($resultpeg);
			//$pegnama 		= $datapeg['name'];
				
											
		
		if($katpermohonan == 1) // sendiri
		{
			//==========================================
			//			1. MAKLUMAT PEMOHON
			//==========================================
					
			$this->SetFont('arial', 'B', 9, '', true);	
				
			// TAJUK
				$this->Ln(18);
				$this->Cell(40);
				$this->Cell(1,1,'1. Maklumat pemohon',0,0,'R');
			
			
			$this->SetFont('arial', '', 9, '', true);				
			// NAMA PEMOHON
				$this->Ln(5);
				$this->Cell(5);
				$this->Cell(1,1,'Nama pemohon',0,0,'L');
				$this->Cell(44);
				$this->Cell(1,1,':',0,0,'L');
				$this->Cell(2);
				$this->Cell(1,1,"$nama",0,0,'L');
				
			// NO KAD PENGENALAN / PASSPORT
				$this->Ln(5);
				$this->Cell(5);
				$this->Cell(1,1,'*No Kad Pengenalan/Passport',0,0,'L');
				$this->Cell(44);
				$this->Cell(1,1,':',0,0,'L');
				$this->Cell(2);
				$this->Cell(1,1,"$docno",0,0,'L');
				
			// HUBUNGAN DENGAN PESAKIT
				$this->Ln(5);
				$this->Cell(5);
				$this->Cell(1,1,'Hubungan dengan Pesakit',0,0,'L');
				$this->Cell(44);
				$this->Cell(1,1,':',0,0,'L');
				$this->Cell(2);
				$this->Cell(1,1,"-",0,0,'L');
				
			// ALAMAT
				$this->Ln(5);
				$this->Cell(5);
				$this->Cell(1,1,'Alamat Pemohon',0,0,'L');
				$this->Cell(44);
				$this->Cell(1,1,':',0,0,'L');
				$this->Cell(2);
				$this->MultiCell(140, 4,"$alamatagen", 0, 'L', 0, 0, '', '', true);
				
			// NO TEL RUMAH
				$this->Ln(14);
				$this->Cell(5);
				$this->Cell(1,1,'No Tel Bimbit',0,0,'L');
				$this->Cell(44);
				$this->Cell(1,1,':',0,0,'L');
				$this->Cell(2);
				$this->Cell(1,1,"$nohpagen",0,0,'L');
			
			// NO TEL HANDPHONE	
				$this->Cell(40);
				$this->Cell(1,1,'No Tel Rumah/Pejabat',0,0,'L');
				$this->Cell(33);
				$this->Cell(1,1,':',0,0,'L');
				$this->Cell(2);
				$this->Cell(1,1,"$notelagen",0,0,'L');	
			
		}
		
		else
		{
			//==========================================
			//			1. MAKLUMAT PEMOHON
			//==========================================
					
			$this->SetFont('arial', 'B', 9, '', true);	
				
			// TAJUK
				$this->Ln(18);
				$this->Cell(40);
				$this->Cell(1,1,'1. Maklumat pemohon',0,0,'R');
			
			
			$this->SetFont('arial', '', 9, '', true);				
			// NAMA PEMOHON
				$this->Ln(5);
				$this->Cell(5);
				$this->Cell(1,1,'Nama pemohon',0,0,'L');
				$this->Cell(44);
				$this->Cell(1,1,':',0,0,'L');
				$this->Cell(2);
				$this->Cell(1,1,"$dihubungi",0,0,'L');
				
			// NO KAD PENGENALAN / PASSPORT
				$this->Ln(5);
				$this->Cell(5);
				$this->Cell(1,1,'*No Kad Pengenalan/Passport',0,0,'L');
				$this->Cell(44);
				$this->Cell(1,1,':',0,0,'L');
				$this->Cell(2);
				$this->Cell(1,1,"$nokpnewagen",0,0,'L');
				
			// HUBUNGAN DENGAN PESAKIT
				$this->Ln(5);
				$this->Cell(5);
				$this->Cell(1,1,'Hubungan dengan Pesakit',0,0,'L');
				$this->Cell(44);
				$this->Cell(1,1,':',0,0,'L');
				$this->Cell(2);
				$this->Cell(1,1,"$hubungan",0,0,'L');
				
			// ALAMAT
				$this->Ln(5);
				$this->Cell(5);
				$this->Cell(1,1,'Alamat Pemohon',0,0,'L');
				$this->Cell(44);
				$this->Cell(1,1,':',0,0,'L');
				$this->Cell(2);
				$this->MultiCell(140, 4,"$alamatagen", 0, 'L', 0, 0, '', '', true);
				
			// NO TEL RUMAH
				$this->Ln(12);
				$this->Cell(5);
				$this->Cell(1,1,'No Tel Handpone',0,0,'L');
				$this->Cell(44);
				$this->Cell(1,1,':',0,0,'L');
				$this->Cell(2);
				$this->Cell(1,1,"$nohpagen",0,0,'L');
			
			// NO TEL HANDPHONE	
				$this->Cell(57);
				$this->Cell(1,1,'No Tel',0,0,'L');
				$this->Cell(26);
				$this->Cell(1,1,':',0,0,'L');
				$this->Cell(2);
				$this->Cell(1,1,"$notelagen",0,0,'L');	
			
		}	
		
		
		//==========================================
		//		2. MAKLUMAT PESAKIT/SIMATI
		//==========================================
				
		$this->SetFont('arial', 'B', 9, '', true);	
			
		// TAJUK
			$this->Ln(5);
			$this->Cell(48);
			$this->Cell(1,1,'2. Maklumat Pesakit / Simati',0,0,'R');
		
		
		$this->SetFont('arial', '', 9, '', true);	
		// NAMA PESKAIT/SIMATI
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'Nama pesakit / simati',0,0,'L');
			$this->Cell(44);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$nama",0,0,'L');
		
		// MRN
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'MRN',0,0,'L');
			$this->Cell(9);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$rn",0,0,'L');
		
		// NO KP(BARU)/PASSPORT/MYKID/NO KP LAMA
			$this->Cell(32);
			$this->Cell(1,1,'No K.P(Baru)/Passport/Mykid/No K.P. Lama',0,0,'L');
			$this->Cell(63);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(3);
			$this->Cell(1,1,"$docno",0,0,'L');
		
		// JANTINA
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'Jantina',0,0,'L');
			$this->Cell(11);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$jantina",0,0,'L');
			
		// UMUR
			$this->Cell(30);
			$this->Cell(1,1,'Umur',0,0,'L');
			$this->Cell(9);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1, "$umur Tahun",0,0,'L');
			
		// *KLINIK/WAD
			$this->Cell(31);
			$this->Cell(1,1,'Klinik/Wad',0,0,'L');
			$this->Cell(18);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$wad",0,0,'L');
			
		// TARIKH RAWATAN KLINIK/MASUK HOSPITAL
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'Tarikh mula rawatan di Klinik Pakar/ Tarikh Masuk Hospital',0,0,'L');
			$this->Cell(85);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$dtmularawatann  /  $dtmasukhospn",0,0,'L');
			
		// TARIKH RAWATAN KLINIK/MASUK HOSPITAL
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'Tarikh keluar hospital/ Tarikh meninggal dunia/ Tarikh bedah siasat',0,0,'L');
			$this->Cell(98);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$dtkeluarhospn  /  $dtpatdien  /  $dtbedahn",0,0,'L');
			
		
		//==========================================
		//		3. LAPORAN YANG DIPOHON
		//==========================================
			
		$this->SetFont('arial', 'B', 9, '', true);	
			
		// TAJUK
			$this->Ln(8);
			$this->Cell(44);
			$this->Cell(1,1,'3. Laporan yang dipohon',0,0,'R');
		
		$this->SetFont('arial', '', 9, '', true);
		
		// JENIS LAPORAN
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,"$laporan",0,0,'L');
		
	
		//==========================================
		//		4. BUTIRAN BAYARAN
		//==========================================
			
		$this->SetFont('arial', 'B', 9, '', true);	
			
		// TAJUK
			$this->Ln(8);
			$this->Cell(58);
			$this->Cell(1,1,'4. Butiran Bayaran (jika berkaitan)',0,0,'R');
		
		
		$this->SetFont('arial', '', 9, '', true);
		
		// BAYARAN
		
		if($bayaran	== '1') //PERCUMA
		{
				$this->Ln(5);
				$this->Cell(5);
				$this->MultiCell(170, 4,"* Bersama ini disediakan Cek bernombor / No Kad Kredit ............... / Kiriman Wang / Kiriman Wang Pos / Wang Tunai berjumlah RM ..... (Ringgit Malaysia .......................) bagi bayaran laporan tersebut. ", 0, 'L', 0, 0, '', '', true);
			
		}
		else
		{
			if($katbayar  == '1') // CEK
			{
				$this->Ln(5);
				$this->Cell(5);
				$this->MultiCell(170, 4,"* Bersama ini disediakan Cek bernombor $nocek, berjumlah RM$amaun (Ringgit Malaysia) bagi bayaran laporan tersebut.", 0, 'L', 0, 0, '', '', true);
			}
			elseif($katbayar  == '2') // KAD KREDIT
			{
				$this->Ln(5);
				$this->Cell(5);
				$this->MultiCell(170, 4,"* Bersama ini disediakan Kad Kredit bernombor $nokadkredit, berjumlah RM$amaun (Ringgit Malaysia) bagi bayaran laporan tersebut.", 0, 'L', 0, 0, '', '', true);
			}
			elseif($katbayar  == '3') // KIRIMAN WANG
			{
				$this->Ln(5);
				$this->Cell(5);
				$this->MultiCell(170, 4,"* Bersama ini disediakan Kiriman Wang bernombor $nokirimanwang, berjumlah RM$amaun (Ringgit Malaysia) bagi bayaran laporan tersebut.", 0, 'L', 0, 0, '', '', true);
			}		
			elseif($katbayar  == '4') // KIRIMAN WANG POS
			{
				$this->Ln(5);
				$this->Cell(5);
				$this->MultiCell(170, 4,"* Bersama ini disediakan Kiriman Wang Pos bernombor $nokirimanwang, berjumlah RM$amaun (Ringgit Malaysia) bagi bayaran laporan tersebut.", 0, 'L', 0, 0, '', '', true);
			}
			else
			{
				$this->Ln(5);
				$this->Cell(5);
				$this->MultiCell(170, 4,"* Bersama ini disediakan Wang Tunai berjumlah RM$amaun (Ringgit Malaysia) bagi bayaran laporan tersebut.", 0, 'L', 0, 0, '', '', true);
			}
		}
		
		
		
		
		
		
		//==========================================
		//	5. KEIZINAN DARIPADA PESAKIT/WARIS
		//==========================================
			
		$this->SetFont('arial', 'B', 9, '', true);	
			
		// TAJUK
			$this->Ln(13);
			$this->Cell(58);
			$this->Cell(1,1,'5. Keizinan daripada pesakit/waris',0,0,'R');
		
		
		$this->SetFont('arial', '', 9, '', true);
		
		// KEIZINAN
		
		if($katpermohonan == 1) // sendiri
		{
			$this->Ln(5);
			$this->Cell(5);
			$this->MultiCell(170, 4,"Saya membenarkan pihak hospital mengeluarkan Laporan Perubatan (*saya/pesakit/simati) yang bernama seperti di ruangan maklumat *pesakit / simati di atas kepada wakil saya yang bernama $nama * No. Kad Pengenalan / Passport : $docno . Dengan ini saya juga melepaskan pihak hospital dari sebarang tindakan perundangan yang berkaitan dengannya.", 0, 'L', 0, 0, '', '', true);
		}
		else
		{
			$this->Ln(5);
			$this->Cell(5);
			$this->MultiCell(170, 4,"Saya membenarkan pihak hospital mengeluarkan Laporan Perubatan (*saya/pesakit/simati) yang bernama seperti di ruangan maklumat *pesakit / simati di atas kepada wakil saya yang bernama $dihubungi * No. Kad Pengenalan / Passport : $nokpnewagen . Dengan ini saya juga melepaskan pihak hospital dari sebarang tindakan perundangan yang berkaitan dengannya.", 0, 'L', 0, 0, '', '', true);
		}
		
		
		
			
		
		// TANDATANGAN/COP JARI
			$this->Ln(30);
			$this->Cell(5);
			$this->Cell(1,1,'*Tandatangan/Cop Jari',0,0,'L');
			$this->Cell(35);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			
		// TANDATANGAN
			$this->Cell(51);
			$this->Cell(1,1,'Tandatangan',0,0,'L');
			$this->Cell(25);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
		
		// NAMA PESAKIT / WARIS
		if($katpermohonan == 1) // sendiri
		{
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'*Nama pesakit/waris',0,0,'L');
			$this->Cell(35);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->MultiCell(50, 4,"$nama", 0, 'L', 0, 0, '', '', true);
		}
		else
		{
			$this->Ln(5);
			$this->Cell(5);
			$this->Cell(1,1,'*Nama pesakit/waris',0,0,'L');
			$this->Cell(35);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->MultiCell(50, 4,"", 0, 'L', 0, 0, '', '', true);
		}
		// SAKSI
			$this->Cell(1);
			$this->Cell(1,1,'Saksi',0,0,'L');
			$this->Cell(25);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			
		// NO KAD PENGENALAN
		if($katpermohonan == 1) // sendiri
		{
			$this->Ln(8);
			$this->Cell(5);
			$this->Cell(1,1,'No Kad Pengenalan',0,0,'L');
			$this->Cell(35);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$docno",0,0,'L');
		}
		else
		{
			$this->Ln(8);
			$this->Cell(5);
			$this->Cell(1,1,'No Kad Pengenalan',0,0,'L');
			$this->Cell(35);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"",0,0,'L');
		}
		// Nama
			$this->Cell(50);
			$this->Cell(1,1,'Nama',0,0,'L');
			$this->Cell(25);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->MultiCell(65, 4,"", 0, 'L', 0, 0, '', '', true);
		
		// TARIKH
			$this->Ln(8);
			$this->Cell(5);
			$this->Cell(1,1,'Tarikh',0,0,'L');
			$this->Cell(35);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$today",0,0,'L');
			
		// NO KAD PENGENALAN
			$this->Cell(50);
			$this->Cell(1,1,'No. Kad Pengenalan',0,0,'L');
			$this->Cell(30);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,'',0,0,'L');	
			   
		// TARIKH
			$this->Ln(5);
			$this->Cell(95);
			$this->Cell(1,1,'Tarikh',0,0,'L');
			$this->Cell(25);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$today",0,0,'L');
			
		// SURAT KEIZINAN YANG DIBAWA OLEH WAKIL
			$this->Ln(10);
			$this->Cell(85);
			$this->Cell(1,1,'Surat Keizinan yang dibawa oleh wakil',0,0,'L');
			$this->Cell(55);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Image('images/unchecked.jpg', '', '', 7, 5, '', '', '', false, 300, '', false, false, 1, false, false, false);	
			   
		//==========================================
		//	6. UNTUK KEGUNAAN PEJABAT
		//==========================================
			
		$this->SetFont('arial', 'B', 9, '', true);	
			
		// TAJUK
			$this->Ln(10);
			$this->Cell(47);
			$this->Cell(1,1,'6. Untuk kegunaan pejabat',0,0,'R');
		
		
		$this->SetFont('arial', '', 9, '', true);
		// TANDATANGAN
			$this->Ln(8);
			$this->Cell(6);
			$this->Cell(1,1,'Tandatangan',0,0,'L');
			$this->Cell(25);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,'',0,0,'L'); 
			
		// NO RESIT
			$this->Cell(61);
			$this->Cell(1,1,'No Resit',0,0,'L');
			$this->Cell(18);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$noresit",0,0,'L'); 
		
		// NAMA KAKITANGAN BERTUGAS
			$this->Ln(5);
			$this->Cell(6);
			$this->Cell(1,1,'Nama Kakitangan bertugas',0,0,'L');
			$this->Cell(40);
			$this->Cell(1,1,':',0,0,'L');
			//$this->Ln(5);
			$this->Cell(2);
			//$this->MultiCell(46, 8,"$pegnama", 0, 'L', 0, 0, '', '', true);	 
			
		// TARIKH RESIT
			$this->Cell(47);
			$this->Cell(1,1,'Tarikh Resit',0,0,'L');
			$this->Cell(18);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$dtresitn",0,0,'L');  
		
		// TARIKH
			$this->Ln(5);
			$this->Cell(6);
			$this->Cell(1,1,'Tarikh',0,0,'L');
			$this->Cell(25);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$dtdaftarn",0,0,'L');
			
		// No Rujukan
			$this->Cell(61);
			$this->Cell(1,1,'No Rujukan',0,0,'L');
			$this->Cell(18);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$norujukan",0,0,'L');
		
		// LAPORAN SIAP
			$this->Ln(5);
			$this->Cell(6);
			$this->Cell(1,1,'(*) Laporan Siap',0,0,'L');
			$this->Cell(25);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$dtjangkasiap",0,0,'L');
		
		//==========================================
		//				NOTA
		//==========================================
			
		$this->SetFont('arial', 'B', 9, '', true);	
			
		// TAJUK
			$this->Ln(20);
			$this->Cell(95);
			$this->Cell(1,1,'(Nota : *Potong yang mana tidak berkenaan)',0,0,'C'); 
			   
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
$pdf->Rect(18, 44, 171, 217, 'D');

//kanan atas lebar panjang			
			

// ---------------------------------------------------------
 
//Close and output PDF document
$pdf->Output('KKMLPP12008.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
?>