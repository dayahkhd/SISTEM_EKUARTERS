<?php
		
session_start();

require	('dbeprs.php');

date_default_timezone_set('Asia/Kuala_Lumpur');
$today = date('d-m-Y');

$hariini = date('Y-m-d');

$ic = $_SESSION['ic'];
$clogin = $_SESSION['clogin'];
$cbaha = $_SESSION['cbaha'];

$id = $_GET['id']; 

	 $qptj = "SELECT * FROM kodptj WHERE kodjabatan ='$cbaha'";
	 $rsptj = mysql_query($qptj) or die(mysql_error());
	 $perihal = mysql_fetch_array($rsptj);
	 $fasilitianama = $perihal['jabatan'];
	 $pengarah = $perihal['ketuajawatan'];
	 $notel = $perihal['notel'];
     $ptjimage = $perihal['ptjimage'];
	 

$querymohon = "SELECT * FROM tblpermohonan where idmohon = '$id'";
$resultmohon = mysql_query($querymohon) or die(mysql_error());
$datacari = mysql_fetch_array($resultmohon);


$dtdaftara = $datacari['dtdaftar'];
$getid = $datacari['idmohon'];
$rn = $datacari['rn'];
$disiplin = $datacari['disiplin'];
$katpermohonan = $datacari['katpermohonan'];
$jenislaporan = $datacari['jenislaporan'];
$patdie = $datacari['patdie'];
$jenismohon = $datacari['jenismohon'];
$alamat = $datacari['alamat'];
$notel = $datacari['notel'];
$emel = $datacari['emel'];
$dihubungia = $datacari['dihubungi'];
$pesakit = $datacari['pesakit'];
$nokpnew = $datacari['docno'];
$nokpold = $datacari['nokpold'];
$passport = $datacari['passport'];
$mykid = $datacari['mykid'];
$dtmulrawpakar = $datacari['dtmulrawpakar'];
$dtmashosp = $datacari['dtmashosp'];
$dtkelhosp = $datacari['dtkelhosp'];
$dtpatdie = $datacari['dtpatdie'];
$dtbedsiasat = $datacari['dtbedsiasat'];
$bayaran = $datacari['bayaran'];
$carabayar = $datacari['carabayar'];
$noresit = $datacari['noresit'];
$nocek = $datacari['nocek'];
$namabank = $datacari['namabank'];
$tindakan = $datacari['tindakan'];
$kaedahserah = $datacari['kaedahserah'];
$dtserah = $datacari['dtserah'];
$statlap = $datacari['statlap'];
$norujukan1 = $datacari['norujukan'];
$doktor = $datacari['doktor'];
$tarikhreg = $datacari['tarikhreg'];
$noresit = $datacari['noresit'];
$dtresita = $datacari['dtresit'];
$amaun = $datacari['amaun'];
$status = $datacari['status'];

$namaagen = $datacari['namaagen'];
$nokpnewagen = $datacari['nokpnewagen'];
$nokpoldagen = $datacari['nokpoldagen'];
$alamatagen = $datacari['alamatagen'];
$notelagen = $datacari['notelagen'];
$nohpagen = $datacari['nohpagen'];
$emelagen = $datacari['emelagen'];



if (($dtdaftara == '1970-01-01')||($dtdaftara == '0000-00-00')||($dtdaftara == ''))
{$dtdaftar = '00-00-0000';}
else
{$dtdaftar = date('d-m-Y',strtotime($dtdaftara));}


if (($dtresita == '1970-01-01')||($dtresita == '0000-00-00')||($dtresita == ''))
{$dtresit = '00-00-0000';}
else
{$dtresit = date('d-m-Y',strtotime($dtresita));}




	$qrdisp = "SELECT * FROM disiplin WHERE id = '$disiplin'";
	$rsdisp = mysql_query($qrdisp) or die(mysql_error());
	$rwds = mysql_fetch_array($rsdisp);
	$fdisiplinnama = $rwds['perihal'];


    $dok = "SELECT * FROM tbldoktor WHERE id ='$doktor'";
	$rsdok = mysql_query($dok) or die(mysql_error());
	$rwdok = mysql_fetch_array($rsdok);
	$doktornama = $rwdok['doktor'];


	 $qrdisp = "SELECT * FROM disiplin WHERE id = '$disiplin'";
     $rsdisp = mysql_query($qrdisp) or die(mysql_error());
     $rwds = mysql_fetch_array($rsdisp);
     $disiplinnama = $rwds['perihal'];


	  $qlp = "SELECT * FROM jenislaporan WHERE idlap = '$jenislaporan'";
	  $rslp = mysql_query($qlp) or die(mysql_error());
	  $dtlp = mysql_fetch_array($rslp);
	  $jenislaporana = $dtlp['jenislaporan']; 
	

	  $querymt = "SELECT * FROM jenismohon WHERE id ='$jenismohon'";
	  $resultmt = mysql_query($querymt) or die(mysql_error());
	  $datamt = mysql_fetch_array($resultmt);
	  $jenismohonnama = $datamt['jenismohon'];




if(isset($_POST['Kemaskini']) == "Kemaskini")

{

$rujuktuan = $_POST['rujuktuan'];
$rujukkami = $_POST['rujukkami'];
$pemohon = $_POST['pemohon'];
$alamat = $_POST['alamat'];
$lengkap = $_POST['lengkap'];
$tidaklengkap = $_POST['tidaklengkap'];
$suratizin = $_POST['suratizin'];
$kadrawatan = $_POST['kadrawatan'];
$bayaran = $_POST['bayaran'];
$lain = $_POST['lain'];
$catatan = $_POST['catatan'];
$kenabayar = $_POST['kenabayar'];
$yangbenar = $_POST['yangbenar'];

$pengaraha = $pengarah;
$dtsurat = $hariini;
$norujukan = $norujukan1;
$noresit = $noresit;
$dtresit = $dtresit;
$amaun = $amaun;
//$docno = $nokpnew;
$pesakit = $pesakit;
$hubungi = $dihubungia;
$alamatpe = $alamatagen;


$queryins = "INSERT INTO tblsurat(norujukan,docno,rujuktuan,rujukkami,pesakit,hubungi,noresit,dtresit,dtdaftar,ptj,lengkap,tidaklengkap,suratizin,kadrawatan,lain,bayaran,catatan,pengarah,kenabayar,pemohon,alamatpe)
VALUES('".mysql_real_escape_string($norujukan1)."',
'".mysql_real_escape_string($nokpnew)."',
'".mysql_real_escape_string($rujuktuan)."',
'".mysql_real_escape_string($rujukkami)."',
'".mysql_real_escape_string($pesakit)."',
'".mysql_real_escape_string($hubungi)."',
'".mysql_real_escape_string($noresit)."',
'".mysql_real_escape_string($dtresita)."',
'".mysql_real_escape_string($dtdaftara)."',
'".mysql_real_escape_string($cbaha)."',
'".mysql_real_escape_string($lengkap)."',
'".mysql_real_escape_string($tidaklengkap)."',
'".mysql_real_escape_string($suratizin)."',
'".mysql_real_escape_string($kadrawatan)."',
'".mysql_real_escape_string($lain)."',
'".mysql_real_escape_string($bayaran)."',
'".mysql_real_escape_string($catatan)."',
'".mysql_real_escape_string($pengarah)."',
'".mysql_real_escape_string($kenabayar)."',
'".mysql_real_escape_string($namaagen)."',
'".mysql_real_escape_string($alamatpe)."')";


$resultins = mysql_query($queryins) or die(mysql_error());	
//$idw = mysql_insert_id();

//TABLE SURAT
	$querysurat 	= "SELECT * FROM tblsurat WHERE norujukan = '$norujukan1'";
	$resultsurat	= mysql_query($querysurat) or die(mysql_error());
	$datasurat		= mysql_fetch_array($resultsurat);
	
	$idsurat		= $datasurat['id'];
	

if (($dtdaftara == '1970-01-01')||($dtdaftara == '0000-00-00')||($dtdaftara == ''))
{$dtdaftar = '00-00-0000';}
else
{$dtdaftar = date('d-m-Y',strtotime($dtdaftara));}


if (($dtresita == '1970-01-01')||($dtresita == '0000-00-00')||($dtresita == ''))
{$dtresit = '00-00-0000';}
else
{$dtresit = date('d-m-Y',strtotime($dtresita));}






print"<br><table width=850>
  <tr>
    <td><br><center><img src='
	images/save.gif' border='0'></img><br>Maklumat telah dikemaskini.</center></td>
  </tr></table>";

}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eLP</title>

<style type="text/css">
.letterbold {
	font-weight: bold;
}
.bold {
	font-weight: bold;
}
.justify {
	text-align: justify;
}
.textface {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	font-weight: bold;
}
.style30 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: normal;
	text-align: justify;
}
.boldie {	font-weight: bold;
}
.style3011 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; font-size: 12px; }
.style302 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: normal;
}
.style78 {	color: #FF0000;
	font-style: italic;
	font-size: 10px;
}
.style301 {	font-size: 12px;
	font-weight: normal;
	font-family: Verdana, Geneva, sans-serif;
}
.style303 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; font-size: 12px; }
.unbold {
	font-weight: normal;
}


.cetak {font-weight: bold;
}
.style77 {font-family: Arial, Helvetica, sans-serif}
.nextpage { page-break-before: always; }
.style304 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: normal;
}
</style>

<script type="text/javascript" src="includes/date-picker.js">
</script>

</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table width="850" border="0">
  <tr>
    <td colspan="5" align="left"><img src="images/letterhead/<?php echo $ptjimage ?>.jpg" width="845" height="120" align="top" /></td>
  </tr>
  <tr>
    <td colspan="5"><span class="letterbold"><hr /></span></td>
  </tr>
  <tr>
    <td colspan="5">&nbsp;</td>
  </tr>
<table width="850" border="0">
  <tr>
    <td colspan="3" class="textface">&nbsp;</td>
    <td width="328" colspan="3" align="left" class="style30">Ruj Tuan : <span class="style304">
      <input name="rujuktuan" type="text" id="rujuktuan"  value="<?php echo $rujuktuan; ?>" size="30" />
    </span></td>
  </tr>
  <tr>
    <td colspan="3" class="textface">&nbsp;</td>
    <td colspan="3" align="left" class="style30">Ruj Kami : <span class="style304">
      <input name="rujukkami" type="text" id="rujukkami"  value="<?php echo $rujukkami; ?>" size="30" />
    </span></td>
  </tr>
  <tr>
    <td colspan="3" class="textface">&nbsp;</td>
    <td colspan="3" align="left" class="style30">Tarikh : <span class="style30"> <?php echo $today; ?> </span></td>
  </tr>
  <tr>
    <td colspan="3" class="textface">&nbsp;</td>
    <td colspan="3" align="right" class="textface">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="textface"><span class="boldie">
      <?php echo $dihubungia?> 
    </span></td>
    <td colspan="3" align="right" class="textface">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="textface"><span class="boldie">
           <?php echo $alamatagen; ?></span></td>
    <td colspan="3" align="right" class="textface">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="textface">&nbsp;</td>
    <td colspan="3" align="right" class="textface">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="textface"><span class="unbold">Y.Bhg Dato'/Datin/Tuan/Puan,</span></td>
    <td colspan="3" align="right" class="textface">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="textface">&nbsp;</td>
    <td colspan="3" align="right" class="textface">&nbsp;</td>
  </tr>
  <tr>
    <td height="27" colspan="3" class="textface">AKUAN PENERIMAAN PERMOHONAN LAPORAN PERUBATAN</td>
    <td colspan="3" align="right" class="textface">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="3" class="textface">NAMA : <span class="boldie"><?php echo $pesakit; ?></span></td>
    <td colspan="3" align="right" class="textface">&nbsp;</td>
  </tr>
  <tr>
    <td height="28" colspan="3" class="textface">NO KAD PENGENALAN / PASSPORT : <span class="boldie"><?php echo $nokpnew; ?></span></td>
    <td colspan="3" align="right" class="textface">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="3" class="textface">&nbsp;</td>
    <td colspan="3" align="right" class="textface">&nbsp;</td>
  </tr>
</table>
<table width="850" border="0" cellpadding="5">
  <tr>
    <td height="39" colspan="3"><p><span class="style30">Dengan segala hortmatnya merujuk kepada permohonan tuan / puan bertarikh 
      <?php echo $dtdaftar; ?>
    no resit bayaran </span><span class="style30"><?php echo $noresit; ?></span>, <span class="style30">bertarikh </span><span class="style30"><?php echo $dtresit; ?>,</span><span class="style30"> berhubung dengan perkara di atas.</span></p></td>
  </tr>
  <tr>
    <td width="12" height="29" valign="top" class="style30">2.</td>
    <td colspan="2" valign="top" class="style30">Permohonan yang diterima adalah:</td>
  </tr>
  <tr>
    <td height="48" valign="top">&nbsp;</td>
    <td colspan="2" valign="top" class="style30"><p>
      <input name="lengkap2" type="checkbox" id="lengkap2" <?php if (isset($lengkap) && $lengkap == "1") echo "checked";?> value="1" />
      <label for="checkbox1" >Lengkap</label>
      </p>
      <p><span class="style30">Nombor pendaftaran permohonan adalah <?php echo $norujukan; ?>. Laporan perubatan akan disiapkan dalam tempoh </span><span class="style30">dua (2) minggu.</span> <span class="style30">Pihak hospital akan memaklumkan tuan / puan secara bertulis apabila laporan siap.</span></p></td>
  </tr>
 <tr>
   <td height="231" valign="top">&nbsp;</td>
   <td colspan="2" valign="top" class="style30"><p>
      <input name="tidaklengkap" type="checkbox" id="tidaklengkap" <?php if (isset($tidaklengkap) && $tidaklengkap == "1") echo "checked";?> value="1" />
      <label for="checkbox2" >Tidak Lengkap</label></p>
     <p class="style30">Nombor pendaftaran permohonan adalah  <?php echo $norujukan; ?>. Sila kemukakan ke pejabat ini:</p>
     <p class="style30">
       <input name="suratizin" type="checkbox" id="suratizin" <?php if (isset($suratizin) && $suratizin == "1") echo "checked";?> value="1" />
      <label for="checkbox3" >Surat keizinan daripada pesakit / waris beserta dengan tandatangan saksi.</label>
     </p>
     <p class="style30">
       <input name="kadrawatan" type="checkbox" id="kadrawatan" <?php if (isset($kadrawatan) && $kadrawatan == "1") echo "checked";?> value="1" />
       <label for="checkbox4" >Salinan Kad Rawatan / Kad Temujanji pesakit.</label>
     <p class="style30">
       <input name="bayaran" type="checkbox" id="bayaran" <?php if (isset($bayaran) && $bayaran == "1") echo "checked";?> value="1" />
       <label for="checkbox5" >Bayaran sebanyak RM</label>
       <input name="kenabayar" type="text" id="kenabayar"  value="<?php echo $kenabayar; ?>" size="40" />
     </p>
     <p><span class="style30">
       <input name="lain" type="checkbox" id="lain" <?php if (isset($lain) && $lain == "1") echo "checked";?> value="1" />
       <label for="checkbox6" >Lain-lain.</label>  
       <input name="catatan" type="text" id="catatan"  value="<?php echo $catatan; ?>" size="60" />
     </span></p></td>
 </tr>
  <tr>
    <td height="65" colspan="2" valign="top" class="style30">3.</td>
    <td width="811" height="65" valign="top"><span class="style30">Permohonan tuan / puan hanya dapat diproses setelah maklumat lengkap diterima.</span> <span class="style30">Sekiranya maklumat lengkap tidak diterima dalam tempoh dua bulan dari tarikh surat ini maka permohonan ini akan dianggap batal.</span><span class="style30"> Sekiranya Laporan Perubatan masih diperlukan, tuan / puan diminta mengemukakan permohonan baru yang lengkap.</span> <span class="style30">Sila hubungi pejabat ini di talian <?php echo $notel; ?> untuk pertanyaan lanjut.</span></td>
    </tr>
  <tr>
    <td height="48" valign="top">&nbsp;</td>
    <td colspan="2" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="25" colspan="3" class="style30">Sekian, terima kasih.</td>
  </tr>
  <tr>
    <td height="28" colspan="3"><span class="textface">&quot;BERKHIDMAT UNTUK NEGARA&quot;</span></td>
  </tr>
  <tr>
    <td height="24" colspan="3" class="textface">&quot;PENYAYANG, BEKERJASAMA BERPASUKAN DAN PROFESIONALISMA ADALAH BUDAYA KERJA KITA&quot;</td>
  </tr>
  <tr>
    <td height="42" colspan="3" class="style30">Saya yang menurut perintah,</td>
  </tr>
  <tr>
    <td height="59" colspan="3" align="left" valign="bottom" class="textface">...............................................</td>
  </tr>
  <tr>
    <td colspan="3" valign="top" class="boldie">
      <?php echo $pengarah; ?><br /><?php echo $fasilitianama; ?></td>
  </tr>
   <tr>
     <td height="29" colspan="3" valign="top" class="textface">&nbsp;</td>
   </tr>
  <tr>
      <td colspan="3" class="style30"><div align="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><span class="style77">
        <input name="Kemaskini" type="submit" id="Kemaskini" value="Kemaskini"/>
      </span></font></strong><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><a href="TCPDF/PDF/AKUAN PENERIMAAN PERMOHONAN LAPORAN PERUBATAN .php?id=<?php echo $idsurat ?>" target="_blank" class="cetak">[CETAK] </a></font></strong></div></td>
    </tr>
  <tr>
    <td colspan="3" class="style30"><div align="center"><span class="textface"><img src="images/ksm.jpg" alt="" width="377" height="58"></span></div></td>
  </tr>
</table>
</form>
</body>
</html>