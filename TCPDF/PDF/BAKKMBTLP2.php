<?php
/*
		========================================================
		CREATED BY:
					AMIRAH NABILAH BINTI MOHD SAPINYE
					JABATAN KESIHATAN NEGERI JOHOR
								2017
							[BAKKM / BTLP]
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
        $this->SetFont('arial', 'B', 12, '', true);
		
		$this->Ln(5);
		$this->Cell(180);
		$this->Cell(1,1,"BA.KKM / BTLP",0,0,'R');
		
		$this->Ln(15);
		$this->Cell(90);	
		$this->Cell(1,1,"BORANG TUNTUTAN BAYARAN BALIK LAPORAN PERUBATAN (BTLP)",0,0,'C');
        
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
		
		
		//Connect database
		include("database.php");
		include("new.php");
		
		date_default_timezone_set('Asia/Kuala_Lumpur');
		$today 		= date('d-m-Y');
		
		$ic 		= $_SESSION['ic'];
		$clogin 	= $_SESSION['clogin'];
		$cbaha 		= $_SESSION['cbaha'];
			
		$statusaktif = 1;			
		$id = $_GET['id']; 
		
		// TABLE SURAT
			$querymohon 	= "SELECT * FROM tblpermohonan where norujukan = '$id' AND ptjlogin='$cbaha'";
			$resultmohon 	= mysql_query($querymohon) or die(mysql_error());
			$datamohon 		= mysql_fetch_array($resultmohon);
			
			$katbayar 		= $datamohon['katbayar'];
			$noresit 		= $datamohon['noresit'];
			$noresit2 		= $datamohon['noresit2'];
			$noresit3		= $datamohon['noresit3'];
			$dtresita 		= $datamohon['dtresit'];
			$dtresit2a 		= $datamohon['dtresit2'];
			$dtresit3a 		= $datamohon['dtresit3']; 
			$amaun 			= $datamohon['amaun'];
			$amaun2			= $datamohon['amaun2'];	
			$amaun3			= $datamohon['amaun3'];		
			$norujukan		= $datamohon['norujukan'];
			$pesakit 		= $datamohon['pesakit'];
			$docno	 		= $datamohon['docno'];
			$jenismohon 	= $datamohon['jenismohon'];
			$jenislaporan 	= $datamohon['jenislaporan'];
			$subjenislaporan = $datamohon['subjenislaporan']; 
			
			$nocek			= $datamohon['nocek'];
			$namabank		= $datamohon['namabank'];
			$nodokument		= $datamohon['nodokument'];
						
			$doktor 		= $datamohon['doktor'];
			
		// TABLE PATIENT | ID
			$querypatient 	= "SELECT * FROM tblpatient WHERE norujukan ='$id' ";
			$resultpatient 	= mysql_query($querypatient) or die(mysql_error());
			$datapatient 	= mysql_fetch_array($resultpatient);
			
			$warga			= $datapatient['warga'];
		
		// TABLE BAYAR
			$querybayar		= "SELECT * FROM tblkatbayar WHERE id ='$katbayar'";
			$resultbayar	= mysql_query($querybayar) or die(mysql_error());
			$databayar		= mysql_fetch_array($resultbayar);
			
			$idkat			= $databayar['id'];
			$kategoribayar	= $databayar['katbayar'];
		
			
		
		// TABLE JENIS MOHON
			$qrmohon 		= "SELECT * FROM jenismohon WHERE id ='$jenismohon'";
		 	$rsmohon 		= mysql_query($qrmohon) or die(mysql_error());
			$pemohon 		= mysql_fetch_array($rsmohon);
			
		 	$agensi 		= $pemohon['jenismohon'];
			
		// JENIS LAPORAN
			$queryt 		= "SELECT * FROM jenislaporan WHERE idlap ='$jenislaporan'";
			$resultt 		= mysql_query($queryt) or die(mysql_error());
			$datat 			= mysql_fetch_array($resultt);
			
			$jenislaporana 	= $datat['jenislaporan'];
			
		// TABLE JENIS MOHON
			$querjm			= "SELECT * FROM jenismohon WHERE id ='$jenismohon'";
			$resuljm 		= mysql_query($querjm) or die(mysql_error());
			$datajm			= mysql_fetch_array($resuljm);
			$jenismohonnama = $datajm['jenismohon'];
		
		// TABLE DOKTOR
			$dok 			= "SELECT * FROM tbldoktor WHERE id ='$doktor'";
	  		$rsdok 			= mysql_query($dok) or die(mysql_error());
	  		$rwdok 			= mysql_fetch_array($rsdok);
			
			$doktornama 	= $rwdok['doktor'];
		  	$nokpdok		= $rwdok['nokp'];
		  	$jawatan 		= $rwdok['jawatan'];
		  	$gred 			= $rwdok['gred'];
		  	$nohpdok 		= $rwdok['nohp'];
		  	$noakaun 		= $rwdok['noakaun'];
		  	$namabank 		= $rwdok['namabank'];
		  	$emeldok 		= $rwdok['emel'];
		  	$unit 			= $rwdok['unit'];
			
		// FORMAT TARIKH
		if (($dtresita == '1970-01-01')||($dtresita == '0000-00-00')||($dtresita == ''))
		{$dtresit = '00-00-0000';}
		else
		{$dtresit = date('d-m-Y',strtotime($dtresita));}
		
		
		if (($dtresit2a == '1970-01-01')||($dtresit2a == '0000-00-00')||($dtresit2a == ''))
		{$dtresit2 = '00-00-0000';}
		else
		{$dtresit2 = date('d-m-Y',strtotime($dtresit2a));}
		
		
		if (($dtresit3a == '1970-01-01')||($dtresit3a == '0000-00-00')||($dtresit3a == ''))
		{$dtresit3 = '00-00-0000';}
		else
		{$dtresit3 = date('d-m-Y',strtotime($dtresit3a));}								
		
		//========================================================================
		// BAHAGIAN A [ UNTUK KEGUNAAN JABATAN REKOD PERUBATAN / UNIT HASIL ]
		//========================================================================
				
		$this->SetFont('arial', 'B', 11, '', true);
		
		// TAJUK
			$this->Ln(13);
			$this->Cell(10);
			$this->MultiCell(158, 5,"BAHAGIAN A - UNTUK KEGUNAAN JABATAN REKOD PERUBATAN / UNIT HASIL", 1, 'L', 0, 0, '', '', true);
		
		$this->SetFont('arial', '', 10, '', true);
		// 1. KAEDAH BAYARAN
			$this->Ln(12);
			$this->Cell(9);
			$this->Cell(1,1,'1. KAEDAH BAYARAN',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			
			if($katbayar == '1')
			{
				//LINE THROUGH
				$this->SetFont('arial', 'D', 10, '', true);
				$this->MultiCell(75, 5,"Tunai / Wang Pos / Kiriman Wang / Kad Kredit", 0, 'C', 0, 0, '', '', true);
				
				$this->SetFont('arial', '', 10, '', true);
				$this->MultiCell(12, 5,"/ Cek", 0, 'C', 0, 0, '', '', true);
			}
			
			elseif($katbayar == '2')
			{
				//LINE THROUGH
				$this->SetFont('arial', 'D', 10, '', true);
				$this->MultiCell(57, 5,"Tunai / Wang Pos / Kiriman Wang", 0, 'C', 0, 0, '', '', true);
				
				$this->SetFont('arial', '', 10, '', true);
				$this->MultiCell(21, 5,"/ Kad Kredit", 0, 'C', 0, 0, '', '', true);
				
				//LINE THROUGH
				$this->SetFont('arial', 'D', 10, '', true);
				$this->MultiCell(11, 5,"/ Cek", 0, 'C', 0, 0, '', '', true);
			}
			
			elseif($katbayar == '3')
			{
				//LINE THROUGH
				$this->SetFont('arial', 'D', 10, '', true);
				$this->MultiCell(31, 5,"Tunai / Wang Pos", 0, 'C', 0, 0, '', '', true);	
				
				$this->SetFont('arial', '', 10, '', true);		
				$this->MultiCell(28, 5,"/ Kiriman Wang", 0, 'C', 0, 0, '', '', true);	
				
				//LINE THROUGH
				$this->SetFont('arial', 'D', 10, '', true);
				$this->MultiCell(30, 5,"/ Kad Kredit / Cek", 0, 'C', 0, 0, '', '', true);
			}
			elseif($katbayar == '4')
			{
				//LINE THROUGH
				$this->SetFont('arial', 'D', 10, '', true);
				$this->MultiCell(11, 5,"Tunai", 0, 'C', 0, 0, '', '', true);		
				
				$this->SetFont('arial', '', 10, '', true);			
				$this->MultiCell(22, 5,"/ Wang Pos", 0, 'C', 0, 0, '', '', true);	
				
				//LINE THROUGH
				$this->SetFont('arial', 'D', 10, '', true);		
				$this->MultiCell(56, 5,"/ Kiriman Wang / Kad Kredit / Cek", 0, 'C', 0, 0, '', '', true);
			}
			else
			{		
				$this->SetFont('arial', '', 10, '', true);	
				$this->MultiCell(12, 3,"Tunai", 0, 'C', 0, 0, '', '', true);			
				
				//LINE THROUGH
				$this->SetFont('arial', 'D', 10, '', true);		
				$this->MultiCell(75, 5,"/ Wang Pos / Kiriman Wang / Kad Kredit / Cek", 0, 'C', 0, 0, '', '', true);
			}
			
		$this->SetFont('arial', '', 10, '', true);	
		// 2. NO DOKUMEN BAYARAN
		
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'2. NO DOKUMEN BAYARAN',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$nodokument",0,0,'L');
						
		// 3. NO RESIT
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'3. NO RESIT',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			
			if($amaun2 == '0')
			{		
				$this->MultiCell(70, 5,"$noresit", 0, 'L', 0, 0, '', '', true);
			}
			
			elseif($amaun3 == '0')
			{
				$this->MultiCell(70, 5,"$noresit / $noresit2", 0, 'L', 0, 0, '', '', true);
			}
			else
			{
				$this->MultiCell(70, 5,"$noresit / $noresit2 / $noresit3", 0, 'L', 0, 0, '', '', true); 
            }
			
		// 4. TARIKH
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'4. TARIKH',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			
			if($amaun2 == '0')
			{		
				$this->MultiCell(70, 5,"$dtresit", 0, 'L', 0, 0, '', '', true);
			}
			
			elseif($amaun3 == '0')
			{
				$this->MultiCell(70, 5,"$dtresit / $dtresit2", 0, 'L', 0, 0, '', '', true);
			}
			else
			{
				$this->MultiCell(70, 5,"$dtresit / $dtresit2 / $dtresit3", 0, 'L', 0, 0, '', '', true); 
            }
			
		// 5. AMAUN (RM)
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'5. AMAUN (RM)',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			
			if($amaun2 == '0')
			{		
				$this->MultiCell(70, 5,"RM $amaun", 0, 'L', 0, 0, '', '', true);
			}
			
			elseif($amaun3 == '0')
			{
				$this->MultiCell(70, 5,"RM $amaun / RM $amaun2", 0, 'L', 0, 0, '', '', true);
			}
			else
			{
				$this->MultiCell(70, 5,"RM $amaun / RM $amaun2 / RM $amaun3", 0, 'L', 0, 0, '', '', true); 
            }
			
		// 6. NO. SIRI JRP
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'6. NO. SIRI JRP',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$norujukan",0,0,'L');
			
		// 7. NAMA PESAKIT
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'7. NAMA PESAKIT',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$pesakit",0,0,'L');
			
		// 8. NO. KAD PENGENALAN / PASSPORT 
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'8. NO. KAD PENGENALAN / PASSPORT',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$docno",0,0,'L');
			
		// 9. KEWARGANEGARAAN
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'9. KEWARGANEGARAAN',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			
			if($warga == '1')
			{
				//LINE THROUGH
				$this->SetFont('arial', '', 10, '', true);
				$this->MultiCell(31, 5,"WARGANEGARA", 0, 'C', 0, 0, '', '', true);		
				
				$this->SetFont('arial', 'D', 10, '', true);			
				$this->MultiCell(50, 5,"/ BUKAN WARGANEGARA", 0, 'C', 0, 0, '', '', true);
			}
			
			else
			{
				//LINE THROUGH
				$this->SetFont('arial', 'D', 10, '', true);
				$this->MultiCell(31, 5,"WARGANEGARA", 0, 'C', 0, 0, '', '', true);		
				
				$this->SetFont('arial', '', 10, '', true);			
				$this->MultiCell(50, 5,"/ BUKAN WARGANEGARA", 0, 'C', 0, 0, '', '', true);
			}
		
		$this->SetFont('arial', '', 10, '', true);	
		// 10. PERMOHONAN DARI
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'10. PEMOHONAN DARI',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			
			if($jenismohon == '21')
			{
				//LINE THROUGH
				$this->SetFont('arial', '', 10, '', true);
				$this->MultiCell(19, 5,"PESAKIT", 0, 'C', 0, 0, '', '', true);		
				
				$this->SetFont('arial', 'D', 10, '', true);			
				$this->MultiCell(35, 5,"/PERKESO /KWSP /", 0, 'C', 0, 0, '', '', true);				
				
				$this->Ln(5);
				$this->Cell(80);
				$this->Cell(1,1,"LAIN-LAIN (Sila nyatakan : ..............................................)",0,0,'L');
			}
			
			else
			{
				//LINE THROUGH
				$this->SetFont('arial', 'D', 10, '', true);			
				$this->MultiCell(50, 5,"PESAKIT/PERKESO/KWSP/", 0, 'C', 0, 0, '', '', true);				
				
				$this->SetFont('arial', '', 10, '', true);
				$this->Ln(5);
				$this->Cell(80);				
				$this->MultiCell(75, 5,"LAIN-LAIN (Sila nyatakan : $agensi )", 0, 'L', 0, 0, '', '', true);
			}
		
		$this->SetFont('arial', '', 10, '', true);
			
		// 11. JENIS LAPORAN
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'11. JENIS LAPORAN',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			
			if($jenislaporan == '1')
			{
				if($subjenislaporan == '13')
				{
					$this->SetFont('arial', '', 10, '', true);
					$this->MultiCell(44, 5,"LAPORAN PERUBATAN", 0, 'C', 0, 0, '', '', true);
					
					$this->SetFont('arial', 'D', 10, '', true);
					$this->MultiCell(28, 5," BIASA/PAKAR/", 0, 'C', 0, 0, '', '', true);
					
					$this->SetFont('arial', '', 10, '', true);
					$this->MultiCell(16, 5,"SPIKPA", 0, 'C', 0, 0, '', '', true);
				}
				
				else
				{
					$this->SetFont('arial', '', 10, '', true);
					$this->MultiCell(53, 5,"LAPORAN PERUBATAN BIASA", 0, 'L', 0, 0, '', '', true);
					
					$this->SetFont('arial', 'D', 10, '', true);
					$this->MultiCell(34, 5," /PAKAR/SPIKPA", 0, 'L', 0, 0, '', '', true);
				}
			}
			
			elseif(($jenislaporan == '2') || ($jenislaporan == '3'))
			{
				$this->SetFont('arial', '', 10, '', true);
				$this->MultiCell(42, 5,"LAPORAN PERUBATAN", 0, 'L', 0, 0, '', '', true);
					
				$this->SetFont('arial', 'D', 10, '', true);
				$this->MultiCell(15, 5,"BIASA /", 0, 'C', 0, 0, '', '', true);
				
				$this->SetFont('arial', '', 10, '', true);
				$this->MultiCell(15, 5," PAKAR", 0, 'C', 0, 0, '', '', true);
					
				$this->SetFont('arial', 'D', 10, '', true);
				$this->MultiCell(17, 5,"/ SPIKPA", 0, 'C', 0, 0, '', '', true);
			}		
		
		//==========================================
		// BAHAGIAN B [ MAKLUMAT PEGAWAI PENUNTUT ]
		//==========================================
				
		$this->SetFont('arial', 'B', 11, '', true);
		
		// TAJUK
			$this->Ln(7);
			$this->Cell(10);
			$this->MultiCell(158, 5,"BAHAGIAN B - MAKLUMAT PEGAWAI PENUNTUT", 1, 'L', 0, 0, '', '', true);
		
		$this->SetFont('arial', '', 10, '', true);
		// 1. NAMA PEGAWAI
			$this->Ln(12);
			$this->Cell(9);
			$this->Cell(1,1,'1. NAMA PEGAWAI',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$doktornama",0,0,'L');
			
		// 2. NO KAD PENGENALAN
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'2. NO KAD PENGENALAN',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$nokpdok",0,0,'L');
			
		// 3. JAWATAN
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'3. JAWATAN',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$jawatan",0,0,'L');
			
		// 4. GRED JAWATAN
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'4. GRED JAWATAN',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$gred",0,0,'L');
			
		// 5. UNIT / TEMPAT BERTUGAS
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'5. UNIT / TEMPAT BERTUGAS',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$unit",0,0,'L');
			
		// 6. NO. TELEFON BIMBIT
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'6. NO. TELEFON BIMBIT',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$nohpdok",0,0,'L');
			
		// 7. EMEL
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'7. EMEL',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$emeldok",0,0,'L');
			
		// 8. NO. AKAUN BANK
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'8. NO. AKAUN BANK',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$noakaun",0,0,'L');
			
		// 9. NAMA DAN CAWANGAN BANK
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'9. NAMA DAN CAWANGAN BANK',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"$namabank",0,0,'L');
			
		// TARIKH & TANDATANGAN
			$this->Ln(15);
			$this->Cell(13);
			$this->Cell(1,1,'TARIKH',0,0,'L');
			$this->Cell(15);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"",0,0,'L');
			$this->Cell(52);
			$this->Cell(1,1,'______________________________',0,0,'L');
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,'',0,0,'L');
			$this->Cell(15);
			$this->Cell(1,1,'Tandatangan & Cop Rasmi',0,0,'L');
			
			
		//===============================================
		// BAHAGIAN C [ UNTUK JABATAN REKOD PERUBATAN ]
		//===============================================
				
		$this->SetFont('arial', 'B', 11, '', true);
		
		// TAJUK
			$this->Ln(16);
			$this->Cell(10);
			$this->MultiCell(158, 5,"BAHAGIAN C - UNTUK JABATAN REKOD PERUBATAN", 1, 'L', 0, 0, '', '', true);
		
		$this->SetFont('arial', '', 10, '', true);
		// 1. NAMA PEGAWAI
			$this->Ln(12);
			$this->Cell(9);
			$this->Cell(1,1,'Disahkan bahawa Pegawai / Pakar di atas telah menyediakan Laporan ini',0,0,'L');
			
		// TARIKH & TANDATANGAN
			$this->Ln(15);
			$this->Cell(13);
			$this->Cell(1,1,'TARIKH',0,0,'L');
			$this->Cell(15);
			$this->Cell(1,1,':',0,0,'L');
			$this->Cell(2);
			$this->Cell(1,1,"",0,0,'L');
			$this->Cell(52);
			$this->Cell(1,1,'______________________________',0,0,'L');
			$this->Ln(5);
			$this->Cell(9);
			$this->Cell(1,1,'',0,0,'L');
			$this->Cell(67);
			$this->Cell(1,1,'',0,0,'L');
			$this->Cell(15);
			$this->Cell(1,1,'Tandatangan & Cop Rasmi',0,0,'L');
			
		//================================
		// BAHAGIAN D [ SENARAI SEMAK ]
		//================================
				
		$this->SetFont('arial', 'B', 11, '', true);
		
		// TAJUK
			$this->Ln(16);
			$this->Cell(10);
			$this->MultiCell(158, 5,"BAHAGIAN D - SENARAI SEMAK", 1, 'L', 0, 0, '', '', true);
		
		$this->SetFont('arial', '', 10, '', true);
		// 1. NAMA PEGAWAI
			$this->Ln(12);
			$this->Cell(9);
			$this->Cell(1,1,'Salinan Kad Pengenalan & Penyata Akaun Bank yang disahkan (bagi tuntutan kali pertama)',0,0,'L');		
			$this->Cell(150);
			$this->Image('images/unchecked.jpg', '', '', 5, 4, '', '', '', false, 300, '', false, false, 1, false, false, false);	
			   
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
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->AddPage("P");
$pdf->body();		
			

// ---------------------------------------------------------
 
//Close and output PDF document
$pdf->Output('BAKKM/BTLP.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
?>