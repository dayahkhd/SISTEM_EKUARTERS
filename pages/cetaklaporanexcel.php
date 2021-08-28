<?php
session_start();

require ('../config/dbconnect.php');
   
$user       =   $_SESSION['user'];
$jabatan    =   $_SESSION['jabatan'];
$authlevel  =   $_SESSION['authlevel'];
$namapegawai  =   $_SESSION['namapegawai'];
$status = 1;

$tarikhmula	 = $_GET['tarikhmula'];
$tarikhakhir = $_GET['tarikhakhir'];
$flokasi = $_GET['lokasi'];

$ptarikhmula = date('d-m-Y',strtotime($tarikhmula));
$ptarikhakhir = date('d-m-Y',strtotime($tarikhakhir));

$querylokasi     = "SELECT * FROM tbllokasi where l_id ='$flokasi' order by l_susun asc";
$resultlokasi    = mysql_query($querylokasi) or die(mysql_error());
$datalokasi      = mysql_num_rows($resultlokasi);
$flokasinama	 = $datalokasi['l_nama'];
  
$file="laporankendirikuarters.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#headdd {
	font-weight: bold;
	font-size: 18px;
}
</style>
</head>

<body>
<table width="1024" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td colspan="15" id="headdd">SENARAI PEMERIKSAAN KENDIRI KESELAMATAN KUARTERS (<?php echo $ptarikhmula;?> HINGGA <?php echo $ptarikhakhir; ?>)</td>
  </tr>
  
    <tr>
    <td colspan="15" id="headdd">LOKASI : <?php echo $flokasinama; ?></td>
  </tr>
  
</table>
<table width="1024" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td colspan="15"></td>
  </tr>
</table>
<table border="1">
  <thead>

<tr>
<th width="19" rowspan="3">Bil</th>
<th width="45" rowspan="3">Tarikh</th>
<th width="40" rowspan="3">Nama</th>
<th width="52" rowspan="3">No MyKad</th>
<th width="51" rowspan="3">No Telefon</th>
<th width="46" rowspan="3">Lokasi</th>
<th width="48" rowspan="3">Alamat</th>
<th width="67" rowspan="3">No Bangunan</th>
<th width="47" rowspan="3">Jenis Binaan</th>
<th width="48" rowspan="3">Jenis Rumah</th>
<th width="52" rowspan="3">Jumlah Bilik</th>
<th width="45" rowspan="3">Latihan Pencegahan Kebakaran</th>
<th width="91" colspan="2">Pemeriksaan Keselamatan</th>
<th width="53" rowspan="3">Fire Blanket</th>
<th width="88" rowspan="3">Fire Extinguisher </th>
<th colspan="9">Elektrikal</th>
<th colspan="13">Mekanikal</th>
<th colspan="18">Sivil , Struktur & Seni Bina</th>
<th colspan="22">LUAR RUMAH & KAWASAN GUNA SAMA</th>
<th colspan="6">KESELAMATAN KEBAKARAN</th>
<th width="44" colspan="1" rowspan="3">LAIN-LAIN</th>
<th colspan="27">SENARAI KUNCI</th>
<th colspan="6">METER</th>


<th colspan="18">MASTER BEDROOM</th>
<th colspan="18">BATHROOM 2</th>
<th colspan="18">BATHROOM 3</th>

<th colspan="3">KITCHEN</th>

<th colspan="3">CAR PORCH</th>

<th colspan="3">YARD</th>

<th colspan="24">ELECTRICAL SCHEDULE</th>

</tr>
<tr>
  <th width="91" rowspan="2">Status</th>
  <th width="45" rowspan="2">Catatan</th>
  <th colspan="2">Soket / suis</th>
  <th colspan="2">Kipas</th>
  <th colspan="2">Lampu</th>
  <th colspan="2">Pendawaian</th>
  <th width="35" rowspan="2">Lain-lain</th>
  
  <th colspan="2">Tekanan air rendah/tiada air</th>
  <th colspan="2">Alat pendingin hawa</th>
  <th colspan="2">Tangki septik tersumbat</th>
  <th colspan="2">Pam tandas rosak/bocor</th>
  <th colspan="2">Sinki bocor/tersumbat</th>
  <th colspan="2">Paip pecah/bocor</th>
  <th width="35" rowspan="2">Lain-lain</th>
  
  <th colspan="2">Retak</th>
  <th colspan="2">Patah</th>
  <th colspan="2">Tercabut/ Tertanggal</th>
  <th colspan="2">Bocor</th>
  <th colspan="2">Karat</th>
  <th colspan="2">Reput</th>
  <th colspan="2">Anai-anai</th>
  <th colspan="2">Kelawar</th>
  <th colspan="2">Tidak boleh ditutup / dikunci (Pintu/Tingkap)</th>  
  
  <th colspan="2">Tanah Runtuh</th>
  <th colspan="2">Pokok teduhan reput/mati/berisiko untuk tumbang</th>
  <th colspan="2">Tembok penahan retak/pecah</th>
  <th colspan="2">Taman permainan/rekreasi rosak/tidak selamat</th>
  <th colspan="2">Pagar Rosak</th>
  <th colspan="2">Longkang pecah/banjir/tersumbat/air bertakung</th>
  <th colspan="2">Parkir pecah/ berlubang</th>
  <th colspan="2">Lampu kawasan/parkir rosak</th>
  <th colspan="2">Lampu tangga rosak</th>  
  <th colspan="2">Tangga pecah/tidak selamat</th>
  <th colspan="2">Lif rosak</th>  

  <th colspan="2">Berbau hangit</th>  
  <th colspan="2">Kesan terbakar</th>
  <th colspan="2">Percikan api</th>  
  
  <th colspan="3">Pintu Utama</th>
  <th colspan="3">Bilik Tidur Utama</th>
  <th colspan="3">Bilik Tidur 2</th>
  <th colspan="3">Bilik Tidur 3</th>
  <th colspan="3">Bilik Tidur 4</th>
  <th colspan="3">Stor</th>
  <th colspan="3">Yard / Dapur</th>
  <th colspan="3">Ruang Makan / Ruang Tamu</th>
  <th colspan="3">Pantri</th>
  
  <th colspan="3">Meter Elektrik TNB</th>
  <th colspan="3">Meter Air SAJR</th>  
  
  <th colspan="3">Pedestal WC</th>
  <th colspan="3">Shower rose</th>
  <th colspan="3">Wash basin</th>
  <th colspan="3">Toilet paper holder</th>
  <th colspan="3">Soap disk/ ledge</th>
  <th colspan="3">Bib tap</th>
  
  <th colspan="3">Pedestal WC</th>
  <th colspan="3">Shower rose</th>
  <th colspan="3">Wash basin</th>
  <th colspan="3">Toilet paper holder</th>
  <th colspan="3">Soap disk/ ledge</th>
  <th colspan="3">Bib tap</th>
  
  <th colspan="3">Pedestal WC</th>
  <th colspan="3">Shower rose</th>
  <th colspan="3">Wash basin</th>
  <th colspan="3">Toilet paper holder</th>
  <th colspan="3">Soap disk/ ledge</th>
  <th colspan="3">Bib tap</th>

  <th colspan="3">Kitchen Sink</th>
  
  <th colspan="3">Bib Tap</th>
    
  <th colspan="3">Bib Tap</th>

  <th colspan="3">Lighting Point</th>
  <th colspan="3">Fan Point</th>
  <th colspan="3">Power point (13A)</th>
  <th colspan="3">Telephone point</th>
  <th colspan="3">TV point</th>
  <th colspan="3">Heater point</th>
  <th colspan="3">Air-cond point</th>
  <th colspan="3">Gate Bell point</th>

      
  </tr>
<tr>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="67">Keadaan</th>
  <th width="57">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="69">Keadaan</th>
  <th width="59">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="92">Keadaan</th>
  <th width="80">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  <th width="60">Keadaan</th>
  <th width="53">Catatan</th>
  
  
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  
  <th width="43" colspan="1">No Meter</th>
  <th width="50">Bacaan</th>
  <th width="53">Catatan</th>
  <th width="43" colspan="1">No Meter</th>
  <th width="50">Bacaan</th>
  <th width="53">Catatan</th>
  
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>

  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  
    <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>    

  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>
  <th width="54">Kuantiti</th>
  <th width="42">Status</th>
  <th width="53">Catatan</th>  
    
  </tr>
  

    
</thead>

<tbody>

<?php 

if ($flokasi == '0')
{	
$querykendiri     = "SELECT * FROM  tblkendiri WHERE (kstatus = '$status') AND (ftarikh BETWEEN '$tarikhmula' AND '$tarikhakhir') order by ftarikh asc";
$resultkendiri    = mysql_query($querykendiri) or die(mysql_error());
$datakendiri      = mysql_num_rows($resultkendiri);
}

else
{
$querykendiri     = "SELECT * FROM  tblkendiri WHERE (kstatus = '$status') AND (ftarikh BETWEEN '$tarikhmula' AND '$tarikhakhir') AND (flokasi = '$flokasi') order by ftarikh asc";
$resultkendiri    = mysql_query($querykendiri) or die(mysql_error());
$datakendiri      = mysql_num_rows($resultkendiri);
}

$sn = 1;
while($datakendiri2 = mysql_fetch_array($resultkendiri))
{
	
$kfid	   		= $datakendiri2['kid'];
$kfidstaff   	= $datakendiri2['kidstaff'];
$kfjabatan   	= $datakendiri2['kjabatan'];
$kftarikh     	= $datakendiri2['ftarikh'];

$kfbangunan		=	$datakendiri2['fbangunan'];
$kflokasi		=	$datakendiri2['flokasi'];
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
                                                
// TABLE PENGGUNA
$querystaff     = "SELECT * FROM  tablepengguna WHERE id = '$kfidstaff'";
$resultstaff    = mysql_query($querystaff) or die(mysql_error());
$datastaff      = mysql_fetch_array($resultstaff);

$kfnama          = $datastaff['namapemohon'];
$kfnomykad       = $datastaff['nokadpengenalan'];
$kfnotel 		 = $datastaff['notel'];


// TABLE JABATAN
$queryjabatan     = "SELECT * FROM  tablejabatan WHERE kodjabatan = '$kfjabatan'";
$resultjabatan    = mysql_query($queryjabatan) or die(mysql_error());
$datajabatan      = mysql_fetch_array($resultjabatan);
$namajabatan      = $datajabatan['jabatan'];
												
// TABLE LOKASI
$querylokasi     = "SELECT * FROM  tbllokasi WHERE l_id = '$kflokasi'";
$resultlokasi    = mysql_query($querylokasi) or die(mysql_error());
$datalokasi      = mysql_fetch_array($resultlokasi);
$kflokasinama      = $datalokasi['l_nama'];

$queryb    				= "SELECT * FROM tbljenisbinaan where jbid = '$kfjenisbinaan'";
$resultb  				= mysql_query($queryb) or die(mysql_error());
$datab 					= mysql_fetch_array($resultb);
$kfjenisbinaannama 		= $datab['jbnama'];

$queryr    				= "SELECT * FROM tbljenisrumah where jrid = '$kfjenisrumah'";
$resultr    			= mysql_query($queryr) or die(mysql_error());
$datar 					= mysql_fetch_array($resultr);
$kfjenisrumahnama 		= $datar['jrnama'];

$queryjb    			= "SELECT * FROM tblbilik where bilid ='$kfjumbil'";
$resultjb    			= mysql_query($queryjb) or die(mysql_error());
$datajb 				= mysql_fetch_array($resultjb);
$kfjumbilnama  			= $datajb['bilnama'];

$querycb   				= "SELECT * FROM tblyesno where ynid ='$kfcegahbakar'";
$resultcb   			= mysql_query($querycb) or die(mysql_error());
$datacb 				= mysql_fetch_array($resultcb);
$kfcegahbakarnama 		= $datacb['ynnama'];

$querype    			= "SELECT * FROM tblyesno where ynid ='$kfperiksa'";
$resultpe   			= mysql_query($querype) or die(mysql_error());
$datape 				= mysql_fetch_array($resultpe);
$kfperiksanama 			= $datape['ynnama'];

$queryfbl   			= "SELECT * FROM tblyesno where ynid ='$kffblanket'";
$resultfbl   			= mysql_query($queryfbl) or die(mysql_error());
$datafbl 				= mysql_fetch_array($resultfbl);
$kffblanketnama 		= $datafbl['ynnama'];
				
$queryfbex   			= "SELECT * FROM tblyesno where ynid ='$kffext'";
$resultfbex  			= mysql_query($queryfbex) or die(mysql_error());
$datafbex 				= mysql_fetch_array($resultfbex);
$kffextnama				= $datafbex['ynnama'];

$queryfsoket    		= "SELECT * FROM tblstatus where stid ='$kfsoket'";
$resultfsoket   		= mysql_query($queryfsoket) or die(mysql_error());
$datafsoket 			= mysql_fetch_array($resultfsoket);
$kfsoketnama			= $datafsoket['stnama'];

$queryfkipas   			= "SELECT * FROM tblstatus where stid ='$kfkipas'";
$resultfkipas   		= mysql_query($queryfkipas) or die(mysql_error());
$datafkipas 			= mysql_fetch_array($resultfkipas);
$kfkipasnama			= $datafkipas['stnama'];

$queryflampu   			= "SELECT * FROM tblstatus where stid ='$kflampu'";
$resultflampu  			= mysql_query($queryflampu) or die(mysql_error());
$dataflampu				= mysql_fetch_array($resultflampu);
$kflampunama			= $dataflampu['stnama'];

$queryfdawai   			= "SELECT * FROM tblstatus where stid ='$kfdawai'";
$resultfdawai   		= mysql_query($queryfdawai) or die(mysql_error());
$datafdawai 			= mysql_fetch_array($resultfdawai);
$kfdawainama			= $datafdawai['stnama'];

$queryftekananair  	 	= "SELECT * FROM tblstatus where stid ='$kftekananair'";
$resultftekananair   	= mysql_query($queryftekananair) or die(mysql_error());
$dataftekananair 		= mysql_fetch_array($resultftekananair);
$kftekananairnama		= $dataftekananair['stnama'];

$queryfhawadingin   	= "SELECT * FROM tblstatus where stid ='$kfhawadingin'";
$resultfhawadingin  	= mysql_query($queryfhawadingin) or die(mysql_error());
$datafhawadingin 		= mysql_fetch_array($resultfhawadingin);
$kfhawadinginnama		= $datafhawadingin['stnama'];

$queryftangkiseptik   	= "SELECT * FROM tblstatus where stid ='$kftangkiseptik'";
$resultftangkiseptik  	= mysql_query($queryftangkiseptik) or die(mysql_error());
$dataftangkiseptik 		= mysql_fetch_array($resultftangkiseptik);
$kftangkiseptiknama		= $dataftangkiseptik['stnama'];

$queryfpambocor   		= "SELECT * FROM tblstatus where stid ='$kfpambocor'";
$resultfpambocor   		= mysql_query($queryfkipas) or die(mysql_error());
$datafpambocor 			= mysql_fetch_array($resultfpambocor);
$kfpambocornama			=	$datafpambocor['stnama'];

$queryfsinkibocor   	= "SELECT * FROM tblstatus where stid ='$kfsinkibocor'";
$resultfsinkibocor  	= mysql_query($queryfsinkibocor) or die(mysql_error());
$datafsinkibocor 		= mysql_fetch_array($resultfsinkibocor);
$kfsinkibocornama 		= $datafsinkibocor['stnama'];

$queryfpaippecah		= "SELECT * FROM tblstatus where stid ='$kfpaippecah'";
$resultfpaippecah   	= mysql_query($queryfpaippecah) or die(mysql_error());
$datafpaippecah 		= mysql_fetch_array($resultfpaippecah);
$kfpaippecahnama		= $datafpaippecah['stnama'];

$queryfretak   			= "SELECT * FROM tblstatus where stid ='$kfretak '";
$resultfretak   		= mysql_query($queryfretak) or die(mysql_error());
$datafretak 			= mysql_fetch_array($resultfretak);
$kfretaknama 			= $datafretak['stnama'];

$queryfpatah  			= "SELECT * FROM tblstatus where ststatus ='$status'";
$resultfpatah   		= mysql_query($queryfpatah) or die(mysql_error());
$datafpatah 			= mysql_fetch_array($resultfpatah);
$kfpatahnama			= $datafpatah['stnama'];

$queryfcabut   			= "SELECT * FROM tblstatus where stid ='$kfcabut'";
$resultfcabut  			= mysql_query($queryfcabut) or die(mysql_error());
$datafcabut 			= mysql_fetch_array($resultfcabut);
$kfcabutnama			= $datafcabut['stnama'];

$queryfbocor   			= "SELECT * FROM tblstatus where stid ='$kfbocor'";
$resultfbocor   		= mysql_query($queryfbocor) or die(mysql_error());
$datafbocor 			= mysql_fetch_array($resultfbocor);
$kfbocornama			= $datafbocor['stnama'];

$queryfkarat   			= "SELECT * FROM tblstatus where stid ='$kfkarat'";
$resultfkarat   		= mysql_query($queryfkarat) or die(mysql_error());
$datafkarat 			= mysql_fetch_array($resultfkarat);
$kfkaratnama			= $datafkarat['stnama'];

$queryfreput  			= "SELECT * FROM tblstatus where stid ='$kfreput'";
$resultfreput   		= mysql_query($queryfreput) or die(mysql_error());
$datafreput 			= mysql_fetch_array($resultfreput);
$kfreputnama			= $datafreput['stnama'];

$queryfanai   			= "SELECT * FROM tblstatus where stid ='$kfanai'";
$resultfanai   			= mysql_query($queryfanai) or die(mysql_error());
$datafanai 				= mysql_fetch_array($resultfanai);
$kfanainama				= $datafanai['stnama'];

$queryfkelawar   		= "SELECT * FROM tblstatus where stid ='$kfkelawar'";
$resultfkelawar  		= mysql_query($queryfkelawar) or die(mysql_error());
$datafkelawar 			= mysql_fetch_array($resultfkelawar);
$kfkelawarnama 			= $datafkelawar['stnama'];

$queryftutup   			= "SELECT * FROM tblstatus where stid ='$kftutup'";
$resultftutup   		= mysql_query($queryftutup) or die(mysql_error());
$dataftutup 			= mysql_fetch_array($resultftutup);
$kftutupnama				= $dataftutup['stnama'];

$queryftanahruntuh   	= "SELECT * FROM tblstatus where stid ='$kftanahruntuh'";
$resultftanahruntuh  	= mysql_query($queryftanahruntuh) or die(mysql_error());
$dataftanahruntuh 		= mysql_fetch_array($resultftanahruntuh);
$kftanahruntuhnama 		= $dataftanahruntuh['stnama'];

$queryfteduhan  		= "SELECT * FROM tblstatus where stid ='$kfteduhan'";
$resultfteduhan 		= mysql_query($queryfteduhan) or die(mysql_error());
$datafteduhan 			= mysql_fetch_array($resultfteduhan);
$kfteduhannama			= $datafteduhan['stnama'];

$queryftembok   		= "SELECT * FROM tblstatus where stid ='$kftembok'";
$resultftembok  		= mysql_query($queryftembok) or die(mysql_error());
$dataftembok 			= mysql_fetch_array($resultftembok);
$kftemboknama 			= $dataftembok['stnama'];

$queryftaman   			= "SELECT * FROM tblstatus where stid ='$kftaman'";
$resultftaman   		= mysql_query($queryftaman) or die(mysql_error());
$dataftaman 			= mysql_fetch_array($resultftaman);
$kftamannama 			= $dataftaman['stnama'];

$queryfpagar   			= "SELECT * FROM tblstatus where stid ='$kfpagar'";
$resultfpagar   		= mysql_query($queryfpagar) or die(mysql_error());
$datafpagar 			= mysql_fetch_array($resultfpagar);
$kfpagarnama 			= $datafpagar['stnama'];

$queryflongkang   		= "SELECT * FROM tblstatus where stid ='$kflongkang'";
$resultflongkang   		= mysql_query($queryflongkang) or die(mysql_error());
$dataflongkang 			= mysql_fetch_array($resultflongkang);
$kflongkangnama 		= $dataflongkang['stnama'];


$queryfparkir   		= "SELECT * FROM tblstatus where stid ='$kfparkir'";
$resultfparkir   		= mysql_query($queryfparkir) or die(mysql_error());
$datafparkir 			= mysql_fetch_array($resultfparkir);
$kfparkirnama 			= $datafparkir['stnama'];

$queryflampukawasan   	= "SELECT * FROM tblstatus where stid ='$kflampukawasan'";
$resultflampukawasan   	= mysql_query($queryflampukawasan) or die(mysql_error());
$dataflampukawasan 		= mysql_fetch_array($resultflampukawasan);
$kflampukawasannama 	= $dataflampukawasan['stnama'];

$queryflamputangga   	= "SELECT * FROM tblstatus where stid ='$kflamputangga'";
$resultflamputangga   	= mysql_query($queryflamputangga) or die(mysql_error());
$dataflamputangga 		= mysql_fetch_array($resultflamputangga);
$kflamputangganama 		= $dataflamputangga['stnama'];

$queryftanggapecah   	= "SELECT * FROM tblstatus where stid ='$kftanggapecah'";
$resultftanggapecah   	= mysql_query($queryftanggapecah) or die(mysql_error());
$dataftanggapecah 		= mysql_fetch_array($resultftanggapecah);
$kftanggapecahnama 			= $dataftanggapecah['stnama'];

$queryflifrosak   		= "SELECT * FROM tblstatus where stid ='$kflifrosak'";
$resultflifrosak   		= mysql_query($queryflifrosak) or die(mysql_error());
$dataflifrosak 			= mysql_fetch_array($resultflifrosak);
$kflifrosaknama			= $dataflifrosak['stnama'];

$queryfhangit   		= "SELECT * FROM tblstatus where stid ='$kfhangit'";
$resultfhangit   		= mysql_query($queryfhangit) or die(mysql_error());
$datafhangit 			= mysql_fetch_array($resultfhangit);
$kfhangitnama 			= $datafhangit['stnama'];

$queryfkesanbakar   	= "SELECT * FROM tblstatus where stid ='$kfkesanbakar'";
$resultfkesanbakar   	= mysql_query($queryfkesanbakar) or die(mysql_error());
$datafkesanbakar 		= mysql_fetch_array($resultfkesanbakar);
$kfkesanbakarnama 		= $datafkesanbakar['stnama'];

$queryfpercikanapi   	= "SELECT * FROM tblstatus where stid ='$kfpercikanapi'";
$resultfpercikanapi  	= mysql_query($queryfpercikanapi) or die(mysql_error());
$datafpercikanapi 		= mysql_fetch_array($resultfpercikanapi);
$kfpercikanapinama 		= $datafpercikanapi['stnama'];

$queryfpintuutama   	= "SELECT * FROM tblpilihan where pid ='$kfpintuutamas'";
$resultfpintuutama    	= mysql_query($queryfpintuutama) or die(mysql_error());
$datafpintuutama 		= mysql_fetch_array($resultfpintuutama);
$kfpintuutamasnama 		= $datafpintuutama['pnama'];
 
$queryfbilikutama   	= "SELECT * FROM tblpilihan where pid ='$status'";
$resultfbilikutama    	= mysql_query($queryfbilikutama) or die(mysql_error());
$datafbilikutama 		= mysql_fetch_array($resultfbilikutama);
$kfbilikutamasnama 		= $datafbilikutama['pnama'];

$queryfbilikdua   		= "SELECT * FROM tblpilihan where pid ='$kfbilikduas'";
$resultfbilikdua    	= mysql_query($queryfbilikdua) or die(mysql_error());
$datafbilikdua 			= mysql_fetch_array($resultfbilikdua);
$kfbilikduasnama 		= $datafbilikdua['pnama'];

$queryfbiliktiga   		= "SELECT * FROM tblpilihan where pid ='$kfbiliktigas'";
$resultfbiliktiga    	= mysql_query($queryfbiliktiga) or die(mysql_error());
$datafbiliktiga 		= mysql_fetch_array($resultfbiliktiga);
$kfbiliktigasnama 		= $datafbiliktiga['pnama'];

$queryfbilikempat   	= "SELECT * FROM tblpilihan where pid ='$kfbilikempats'";
$resultfbilikempat    	= mysql_query($queryfbilikempat) or die(mysql_error());
$datafbilikempat 		= mysql_fetch_array($resultfbilikempat);
$kfbilikempatsnama 		= $datafbilikempat['pnama'];

$queryfstor  			= "SELECT * FROM tblpilihan where pid ='$kfstors'";
$resultfstor    		= mysql_query($queryfstor) or die(mysql_error());
$datafstor 				= mysql_fetch_array($resultfstor);
$kfstorsnama 			= $datafstor['pnama'];

$queryfdapur   			= "SELECT * FROM tblpilihan where pid ='$kfdapurs'";
$resultfdapur    		= mysql_query($queryfdapur) or die(mysql_error());
$datafdapur 			= mysql_fetch_array($resultfdapur);
$kfdapursnama 			= $datafdapur['pnama'];

$queryfruangmakan  		= "SELECT * FROM tblpilihan where pid ='$kfruangmakans'";
$resultfruangmakan    	= mysql_query($queryfruangmakan) or die(mysql_error());
$datafruangmakan 		= mysql_fetch_array($resultfruangmakan);
$kfruangmakansnama 		= $datafruangmakan['pnama'];

$queryfpantri   		= "SELECT * FROM tblpilihan where pid ='$kfpantris'";
$resultfpantri    		= mysql_query($queryfpantri) or die(mysql_error());
$datafpantri 			= mysql_fetch_array($resultfpantri);
$kfpantrisnama 			= $datafpantri['pnama'];

$queryfpedestal   		= "SELECT * FROM tblpilihan where pid ='$kfpedestals'";
$resultfpedestal    	= mysql_query($queryfpedestal) or die(mysql_error());
$datafpedestal 			= mysql_fetch_array($resultfpedestal);
$kfpedestalsnama 		= $datafpedestal['pnama'];

$queryfshower   		= "SELECT * FROM tblpilihan where pid ='$kfshowers'";
$resultfshower    		= mysql_query($queryfshower) or die(mysql_error());
$datafshower 			= mysql_fetch_array($resultfshower);
$kfshowersnama 			= $datafshower['pnama'];

$queryfwashbasin   		= "SELECT * FROM tblpilihan where pid ='$kfwashbasins'";
$resultfwashbasin    	= mysql_query($queryfwashbasin) or die(mysql_error());
$datafwashbasin 		= mysql_fetch_array($resultfwashbasin);
$kfwashbasinsnama 		= $datafwashbasin['pnama'];

$queryfholder   		= "SELECT * FROM tblpilihan where pid ='$kfholders'";
$resultfholder    		= mysql_query($queryfholder) or die(mysql_error());
$datafholder 			= mysql_fetch_array($resultfholder);
$kfholdersnama 			= $datafholder['pnama'];

$queryfsoap   			= "SELECT * FROM tblpilihan where pid ='$kfsoaps'";
$resultfsoap    		= mysql_query($queryfsoap) or die(mysql_error());
$datafsoap 				= mysql_fetch_array($resultfsoap);
$kfsoapsnama			= $datafsoap['pnama'];

$queryfbib   			= "SELECT * FROM tblpilihan where pid ='$kfbibs'";
$resultfbib    			= mysql_query($queryfbib) or die(mysql_error());
$datafbib 				= mysql_fetch_array($resultfbib);
$kfbibsnama 			= $datafbib['pnama'];

$queryfpedestal2   		= "SELECT * FROM tblpilihan where pid ='$kfpedestal2s'";
$resultfpedestal2    	= mysql_query($queryfpedestal2) or die(mysql_error());
$datafpedestal2 		= mysql_fetch_array($resultfpedestal2);
$kfpedestal2snama		= $datafpedestal2['pnama'];

$queryfshower2   		= "SELECT * FROM tblpilihan where pid ='$kfshower2s'";
$resultfshower2    		= mysql_query($queryfshower2) or die(mysql_error());
$datafshower2 			= mysql_fetch_array($resultfshower2);
$kfshower2snama 		= $datafshower2['pnama'];

$queryfwashbasin2  		= "SELECT * FROM tblpilihan where pid ='$kfwashbasin2s'";
$resultfwashbasin2    	= mysql_query($queryfwashbasin2) or die(mysql_error());
$datafwashbasin2	 	= mysql_fetch_array($resultfwashbasin2);
$kfwashbasin2snama		= $datafwashbasin2['pnama'];

$queryfholder2   		= "SELECT * FROM tblpilihan where pid ='$kfholder2s'";
$resultfholder2    		= mysql_query($queryfholder2) or die(mysql_error());
$datafholder2 			= mysql_fetch_array($resultfholder2);
$kfholder2snama 		= $datafholder2['pnama'];

$queryfsoap2   			= "SELECT * FROM tblpilihan where pid ='$kfsoap2s'";
$resultfsoap2    		= mysql_query($queryfsoap2) or die(mysql_error());
$datafsoap2 			= mysql_fetch_array($resultfsoap2);
$kfsoap2snama 			= $datafsoap2['pnama'];

$queryfbib2   			= "SELECT * FROM tblpilihan where pid ='$kfbib2s'";
$resultfbib2    		= mysql_query($queryfbib2) or die(mysql_error());
$datafbib2 				= mysql_fetch_array($resultfbib2);
$kfbib2snama 			= $datafbib2['pnama'];

$queryfpedestal3   		= "SELECT * FROM tblpilihan where pid ='$kfpedestal3s'";
$resultfpedestal3    	= mysql_query($queryfpedestal3) or die(mysql_error());
$datafpedestal3 		= mysql_fetch_array($resultfpedestal3);
$kfpedestal3snama 		= $datafpedestal3['pnama'];

$queryfshower3   		= "SELECT * FROM tblpilihan where pid ='$kfshower3s'";
$resultfshower3    		= mysql_query($queryfshower3) or die(mysql_error());
$datafshower3 			= mysql_fetch_array($resultfshower3);
$kfshower3snama			= $datafshower3['pnama'];

$queryfwashbasin3 		= "SELECT * FROM tblpilihan where pid ='$kfwashbasin3s'";
$resultfwashbasin3    	= mysql_query($queryfwashbasin3) or die(mysql_error());
$datafwashbasin3	 	= mysql_fetch_array($resultfwashbasin3);
$kfwashbasin3snama		= $datafwashbasin3['pnama'];

$queryfholder3   		= "SELECT * FROM tblpilihan where pid ='$kfholder3s'";
$resultfholder3    		= mysql_query($queryfholder3) or die(mysql_error());
$datafholder3 			= mysql_fetch_array($resultfholder3);
$kfholder3snama 		= $datafholder3['pnama'];

$queryfsoap3   			= "SELECT * FROM tblpilihan where pid ='$kfsoap3s'";
$resultfsoap3    		= mysql_query($queryfsoap3) or die(mysql_error());
$datafsoap3 			= mysql_fetch_array($resultfsoap3);
$kfsoap3snama 			= $datafsoap3['pnama'];

$queryfbib3   			= "SELECT * FROM tblpilihan where pid ='$kfbib3s'";
$resultfbib3    		= mysql_query($queryfbib3) or die(mysql_error());
$datafbib3 				= mysql_fetch_array($resultfbib3);
$kfbib3snama 			= $datafbib3['pnama'];

$queryfkitchensink   	= "SELECT * FROM tblpilihan where pid ='$kfkitchensinks'";
$resultfkitchensink    	= mysql_query($queryfkitchensink) or die(mysql_error());
$datafkitchensink 		= mysql_fetch_array($resultfkitchensink);
$kfkitchensinksnama 	= $datafkitchensink['pnama'];


$queryfbibtap   		= "SELECT * FROM tblpilihan where pid ='$kfbibtaps'";
$resultfbibtap    		= mysql_query($queryfbibtap) or die(mysql_error());
$datafbibtap 			= mysql_fetch_array($resultfbibtap);
$kfbibtapsnama 			= $datafbibtap['pnama'];

$queryfbibtapy   		= "SELECT * FROM tblpilihan where pid ='$kfbibtapys'";
$resultfbibtapy    		= mysql_query($queryfbibtapy) or die(mysql_error());
$datafbibtapy 			= mysql_fetch_array($resultfbibtapy);
$kfbibtapysnama  		= $datafbibtapy['pnama'];

$queryflighting   		= "SELECT * FROM tblpilihan where pid ='$kflightings'";
$resultflighting    	= mysql_query($queryflighting) or die(mysql_error());
$dataflighting 			= mysql_fetch_array($resultflighting);
$kflightingsnama 		= $dataflighting['pnama'];

$queryffanpoint   		= "SELECT * FROM tblpilihan where pid ='$kffanpoints'";
$resultffanpoint    	= mysql_query($queryffanpoint) or die(mysql_error());
$dataffanpoint 			= mysql_fetch_array($resultffanpoint);
$kffanpointsnama 		= $dataffanpoint['pnama'];

$queryfpowerpoint   	= "SELECT * FROM tblpilihan where pid ='$kfpowerpoints'";
$resultfpowerpoint    	= mysql_query($queryfpowerpoint) or die(mysql_error());
$datafpowerpoint 		= mysql_fetch_array($resultfpowerpoint);
$kfpowerpointsnama 			= $datafpowerpoint['pnama'];

$queryfphonepoint   	= "SELECT * FROM tblpilihan where pid ='$kfphonepoints'";
$resultfphonepoint    	= mysql_query($queryfphonepoint) or die(mysql_error());
$datafphonepoint 		= mysql_fetch_array($resultfphonepoint);
$kfphonepointsnama 		= $datafphonepoint['pnama'];

$queryftvpoint   		= "SELECT * FROM tblpilihan where pid ='$kftvpoints'";
$resultftvpoint    		= mysql_query($queryftvpoint) or die(mysql_error());
$dataftvpoint 			= mysql_fetch_array($resultftvpoint);
$kftvpointsnama 		= $dataftvpoint['pnama'];

$queryfheaterpoint   	= "SELECT * FROM tblpilihan where pid ='$kfheaterpoints'";
$resultfheaterpoint    	= mysql_query($queryfpantri) or die(mysql_error());
$datafheaterpoint 		= mysql_fetch_array($resultfheaterpoint);
$kfheaterpointsnama 	= $datafheaterpoint['pnama'];

$queryfaircondpoint   	= "SELECT * FROM tblpilihan where pid ='$kfaircondpoints'";
$resultfaircondpoint    = mysql_query($queryfaircondpoint) or die(mysql_error());
$datafaircondpoint 		= mysql_fetch_array($resultfaircondpoint);
$kfaircondpointsnama 	= $datafaircondpoint['pnama'];

$queryfgatepoint   		= "SELECT * FROM tblpilihan where pid ='$kfgatepoints'";
$resultfgatepoint    	= mysql_query($queryfpantri) or die(mysql_error());
$datafgatepoint 		= mysql_fetch_array($resultfgatepoint);
$kfgatepointsnama  		= $datafgatepoint['pnama'];


                                                
?>

<tr>
<td><?php echo $sn?></td>
<td><?php echo htmlentities(strtoupper($kftarikh));?></td>
<td><?php echo htmlentities(strtoupper($kfnama));?></td>
<td><?php echo htmlentities(strtoupper($kfnomykad));?></td>
<td><?php echo htmlentities(strtoupper($kfnotel));?></td>
<td><?php echo htmlentities(strtoupper($kflokasinama));?></td>
<td><?php echo htmlentities(strtoupper($kfalamat));?></td>  
<td><?php echo htmlentities(strtoupper($kfbangunan));?></td>

<td><?php echo htmlentities(strtoupper($kfjenisbinaannama));?></td>
<td><?php echo htmlentities(strtoupper($kfjenisrumahnama));?></td>
<td><?php echo htmlentities(strtoupper($kfjumbilnama));?></td>

<td><?php echo htmlentities(strtoupper($kfcegahbakarnama));?></td>
<td><?php echo htmlentities(strtoupper($kfperiksanama));?></td>
<td><?php echo htmlentities(strtoupper($kfperiksa2));?></td>
<td><?php echo htmlentities(strtoupper($kffblanketnama));?></td>
<td><?php echo htmlentities(strtoupper($kffextnama));?></td>
<td><?php echo htmlentities(strtoupper($kfsoketnama));?></td>
<td><?php echo htmlentities(strtoupper($kfsoketc));?></td>
<td><?php echo htmlentities(strtoupper($kfkipasnama));?></td>
<td><?php echo htmlentities(strtoupper($kfkipasc));?></td>
<td><?php echo htmlentities(strtoupper($kflampunama));?></td>
<td><?php echo htmlentities(strtoupper($kflampuc));?></td>
<td><?php echo htmlentities(strtoupper($kfdawainama));?></td>
<td><?php echo htmlentities(strtoupper($kfdawaic));?></td>
<td><?php echo htmlentities(strtoupper($kflaine));?></td>
<td><?php echo htmlentities(strtoupper($kftekananairnama));?></td>
<td><?php echo htmlentities(strtoupper($kftekananairc));?></td>
<td><?php echo htmlentities(strtoupper($kfhawadinginnama));?></td>
<td><?php echo htmlentities(strtoupper($kfhawadinginc));?></td>
<td><?php echo htmlentities(strtoupper($kftangkiseptiknama));?></td>
<td><?php echo htmlentities(strtoupper($kftangkiseptikc));?></td>
<td><?php echo htmlentities(strtoupper($kfpambocornama));?></td>
<td><?php echo htmlentities(strtoupper($kfpambocorc));?></td>
<td><?php echo htmlentities(strtoupper($kfsinkibocornama));?></td>
<td><?php echo htmlentities(strtoupper($kfsinkibocorc));?></td>
<td><?php echo htmlentities(strtoupper($kfpaippecahnama));?></td>
<td><?php echo htmlentities(strtoupper($kfpaippecahc));?></td>
<td><?php echo htmlentities(strtoupper($kflainm));?></td>
<td><?php echo htmlentities(strtoupper($kfretaknama));?></td>
<td><?php echo htmlentities(strtoupper($kfretakc));?></td>
<td><?php echo htmlentities(strtoupper($kfpatahnama));?></td>
<td><?php echo htmlentities(strtoupper($kfpatahc));?></td>
<td><?php echo htmlentities(strtoupper($kfcabutnama));?></td>
<td><?php echo htmlentities(strtoupper($kfcabutc));?></td>
<td><?php echo htmlentities(strtoupper($kfbocornama));?></td>
<td><?php echo htmlentities(strtoupper($kfbocorc));?></td>
<td><?php echo htmlentities(strtoupper($kfkaratnama));?></td>
<td><?php echo htmlentities(strtoupper($kfkaratc));?></td>
<td><?php echo htmlentities(strtoupper($kfreputnama));?></td>
<td><?php echo htmlentities(strtoupper($kfreputc));?></td>
<td><?php echo htmlentities(strtoupper($kfanainama));?></td>
<td><?php echo htmlentities(strtoupper($kfanaic));?></td>
<td><?php echo htmlentities(strtoupper($kfkelawarnama));?></td>
<td><?php echo htmlentities(strtoupper($kfkelawarc));?></td>
<td><?php echo htmlentities(strtoupper($kftutupnama));?></td>
<td><?php echo htmlentities(strtoupper($kftutupc));?></td>
<td><?php echo htmlentities(strtoupper($kftanahruntuhnama));?></td>
<td><?php echo htmlentities(strtoupper($kftanahruntuhc));?></td>
<td><?php echo htmlentities(strtoupper($kfteduhannama));?></td>
<td><?php echo htmlentities(strtoupper($kfteduhanc));?></td>
<td><?php echo htmlentities(strtoupper($kftemboknama));?></td>
<td><?php echo htmlentities(strtoupper($kftembokc));?></td>
<td><?php echo htmlentities(strtoupper($kftamannama));?></td>
<td><?php echo htmlentities(strtoupper($kftamanc));?></td>
<td><?php echo htmlentities(strtoupper($kfpagarnama));?></td>
<td><?php echo htmlentities(strtoupper($kfpagarc));?></td>
<td><?php echo htmlentities(strtoupper($kflongkangnama));?></td>
<td><?php echo htmlentities(strtoupper($kflongkangc));?></td>
<td><?php echo htmlentities(strtoupper($kfparkirnama));?></td>
<td><?php echo htmlentities(strtoupper($kfparkirc));?></td>
<td><?php echo htmlentities(strtoupper($kflampukawasannama));?></td>
<td><?php echo htmlentities(strtoupper($kflampukawasanc));?></td>
<td><?php echo htmlentities(strtoupper($kflamputangganama));?></td>
<td><?php echo htmlentities(strtoupper($kflamputanggac));?></td>
<td><?php echo htmlentities(strtoupper($kftanggapecahnama));?></td>
<td><?php echo htmlentities(strtoupper($kftanggapecahc));?></td>
<td><?php echo htmlentities(strtoupper($kflifrosaknama));?></td>
<td><?php echo htmlentities(strtoupper($kflifrosakc));?></td>
<td><?php echo htmlentities(strtoupper($kfhangitnama));?></td>
<td><?php echo htmlentities(strtoupper($kfhangitc));?></td>
<td><?php echo htmlentities(strtoupper($kfkesanbakarnama));?></td>
<td><?php echo htmlentities(strtoupper($kfkesanbakarc));?></td>
<td><?php echo htmlentities(strtoupper($kfpercikanapinama));?></td>
<td><?php echo htmlentities(strtoupper($kfpercikanapic));?></td>
<td><?php echo htmlentities(strtoupper($kflainlain));?></td>
<td><?php echo htmlentities(strtoupper($kfpintuutama));?></td>
<td><?php echo htmlentities(strtoupper($kfpintuutamasnama));?></td>
<td><?php echo htmlentities(strtoupper($kfpintuutamac));?></td>
<td><?php echo htmlentities(strtoupper($kfbilikutama));?></td>
<td><?php echo htmlentities(strtoupper($kfbilikutamasnama));?></td>
<td><?php echo htmlentities(strtoupper($kfbilikutamac));?></td>
<td><?php echo htmlentities(strtoupper($kfbilikdua));?></td>
<td><?php echo htmlentities(strtoupper($kfbilikduasnama));?></td>
<td><?php echo htmlentities(strtoupper($kfbilikduac));?></td>
<td><?php echo htmlentities(strtoupper($kfbiliktiga));?></td>
<td><?php echo htmlentities(strtoupper($kfbiliktigasnama));?></td>
<td><?php echo htmlentities(strtoupper($kfbiliktigac));?></td>
<td><?php echo htmlentities(strtoupper($kfbilikempat));?></td>
<td><?php echo htmlentities(strtoupper($kfbilikempatsnama));?></td>
<td><?php echo htmlentities(strtoupper($kfbilikempatc));?></td>
<td><?php echo htmlentities(strtoupper($kfstor));?></td>
<td><?php echo htmlentities(strtoupper($kfstorsnama));?></td>
<td><?php echo htmlentities(strtoupper($kfstorc));?></td>
<td><?php echo htmlentities(strtoupper($kfdapur));?></td>
<td><?php echo htmlentities(strtoupper($kfdapursnama));?></td>
<td><?php echo htmlentities(strtoupper($kfdapurc));?></td>
<td><?php echo htmlentities(strtoupper($kfruangmakan));?></td>
<td><?php echo htmlentities(strtoupper($kfruangmakansnama));?></td>
<td><?php echo htmlentities(strtoupper($kfruangmakanc));?></td>
<td><?php echo htmlentities(strtoupper($kfpantri));?></td>
<td><?php echo htmlentities(strtoupper($kfpantrisnama));?></td>
<td><?php echo htmlentities(strtoupper($kfpantric));?></td>
<td><?php echo htmlentities(strtoupper($kfmetertnb));?></td>
<td><?php echo htmlentities(strtoupper($kfmetertnbb));?></td>
<td><?php echo htmlentities(strtoupper($kfmetertnbc));?></td>
<td><?php echo htmlentities(strtoupper($kfmetersaj));?></td>
<td><?php echo htmlentities(strtoupper($kfmetersajb));?></td>
<td><?php echo htmlentities(strtoupper($kfmetersajc));?></td>
<td><?php echo htmlentities(strtoupper($kfpedestal));?></td>
<td><?php echo htmlentities(strtoupper($kfpedestalsnama));?></td>
<td><?php echo htmlentities(strtoupper($kfpedestalc));?></td>
<td><?php echo htmlentities(strtoupper($kfshower));?></td>
<td><?php echo htmlentities(strtoupper($kfshowersnama));?></td>
<td><?php echo htmlentities(strtoupper($kfshowerc));?></td>
<td><?php echo htmlentities(strtoupper($kfwashbasin));?></td>
<td><?php echo htmlentities(strtoupper($kfwashbasinsnama));?></td>
<td><?php echo htmlentities(strtoupper($kfwashbasinc));?></td>
<td><?php echo htmlentities(strtoupper($kfholder));?></td>
<td><?php echo htmlentities(strtoupper($kfholdersnama));?></td>
<td><?php echo htmlentities(strtoupper($kfholderc));?></td>
<td><?php echo htmlentities(strtoupper($kfsoap));?></td>
<td><?php echo htmlentities(strtoupper($kfsoapsnama));?></td>
<td><?php echo htmlentities(strtoupper($kfsoapc));?></td>
<td><?php echo htmlentities(strtoupper($kfbib));?></td>
<td><?php echo htmlentities(strtoupper($kfbibsnama));?></td>
<td><?php echo htmlentities(strtoupper($kfbibc));?></td>
<td><?php echo htmlentities(strtoupper($kfpedestal2));?></td>
<td><?php echo htmlentities(strtoupper($kfpedestal2snama));?></td>
<td><?php echo htmlentities(strtoupper($kfpedestal2c));?></td>
<td><?php echo htmlentities(strtoupper($kfshower2));?></td>
<td><?php echo htmlentities(strtoupper($kfshower2snama));?></td>
<td><?php echo htmlentities(strtoupper($kfshower2c));?></td>
<td><?php echo htmlentities(strtoupper($kfwashbasin2));?></td>
<td><?php echo htmlentities(strtoupper($kfwashbasin2snama));?></td>
<td><?php echo htmlentities(strtoupper($kfwashbasin2c));?></td>
<td><?php echo htmlentities(strtoupper($kfholder2));?></td>
<td><?php echo htmlentities(strtoupper($kfholder2snama));?></td>
<td><?php echo htmlentities(strtoupper($kfholder2c));?></td>
<td><?php echo htmlentities(strtoupper($kfsoap2));?></td>
<td><?php echo htmlentities(strtoupper($kfsoap2snama));?></td>
<td><?php echo htmlentities(strtoupper($kfsoap2c));?></td>
<td><?php echo htmlentities(strtoupper($kfbib2));?></td>
<td><?php echo htmlentities(strtoupper($kfbib2snama));?></td>
<td><?php echo htmlentities(strtoupper($kfbib2c));?></td>
<td><?php echo htmlentities(strtoupper($kfpedestal3));?></td>
<td><?php echo htmlentities(strtoupper($kfpedestal3snama));?></td>
<td><?php echo htmlentities(strtoupper($kfpedestal3c));?></td>
<td><?php echo htmlentities(strtoupper($kfshower3));?></td>
<td><?php echo htmlentities(strtoupper($kfshower3snama));?></td>
<td><?php echo htmlentities(strtoupper($kfshower3c));?></td>
<td><?php echo htmlentities(strtoupper($kfwashbasin3));?></td>
<td><?php echo htmlentities(strtoupper($kfwashbasin3snama));?></td>
<td><?php echo htmlentities(strtoupper($kfwashbasin3c));?></td>
<td><?php echo htmlentities(strtoupper($kfholder3));?></td>
<td><?php echo htmlentities(strtoupper($kfholder3snama));?></td>
<td><?php echo htmlentities(strtoupper($kfholder3c));?></td>
<td><?php echo htmlentities(strtoupper($kfsoap3));?></td>
<td><?php echo htmlentities(strtoupper($kfsoap3snama));?></td>
<td><?php echo htmlentities(strtoupper($kfsoap3c));?></td>
<td><?php echo htmlentities(strtoupper($kfbib3));?></td>
<td><?php echo htmlentities(strtoupper($kfbib3snama));?></td>
<td><?php echo htmlentities(strtoupper($kfbib3c));?></td>
<td><?php echo htmlentities(strtoupper($kfkitchensink));?></td>
<td><?php echo htmlentities(strtoupper($kfkitchensinksnama));?></td>
<td><?php echo htmlentities(strtoupper($kfkitchensinkc));?></td>
<td><?php echo htmlentities(strtoupper($kfbibtap));?></td>
<td><?php echo htmlentities(strtoupper($kfbibtapsnama));?></td>
<td><?php echo htmlentities(strtoupper($kfbibtapc));?></td>
<td><?php echo htmlentities(strtoupper($kfbibtapy));?></td>
<td><?php echo htmlentities(strtoupper($kfbibtapysnama));?></td>
<td><?php echo htmlentities(strtoupper($kfbibtapyc));?></td>
<td><?php echo htmlentities(strtoupper($kflighting));?></td>
<td><?php echo htmlentities(strtoupper($kflightingsnama));?></td>
<td><?php echo htmlentities(strtoupper($kflightingc));?></td>
<td><?php echo htmlentities(strtoupper($kffanpoint));?></td>
<td><?php echo htmlentities(strtoupper($kffanpointsnama));?></td>
<td><?php echo htmlentities(strtoupper($kffanpointc));?></td>
<td><?php echo htmlentities(strtoupper($kfpowerpoint));?></td>
<td><?php echo htmlentities(strtoupper($kfpowerpointsnama));?></td>
<td><?php echo htmlentities(strtoupper($kfpowerpointc));?></td>
<td><?php echo htmlentities(strtoupper($kfphonepoint));?></td>
<td><?php echo htmlentities(strtoupper($kfphonepointsnama));?></td>
<td><?php echo htmlentities(strtoupper($kfphonepointc));?></td>
<td><?php echo htmlentities(strtoupper($kftvpoint));?></td>
<td><?php echo htmlentities(strtoupper($kftvpointsnama));?></td>
<td><?php echo htmlentities(strtoupper($kftvpointc));?></td>
<td><?php echo htmlentities(strtoupper($kfheaterpoint));?></td>
<td><?php echo htmlentities(strtoupper($kfheaterpointsnama));?></td>
<td><?php echo htmlentities(strtoupper($kfheaterpointc));?></td>
<td><?php echo htmlentities(strtoupper($kfaircondpoint));?></td>
<td><?php echo htmlentities(strtoupper($kfaircondpointsnama));?></td>
<td><?php echo htmlentities(strtoupper($kfaircondpointc));?></td>
<td><?php echo htmlentities(strtoupper($kfgatepoint));?></td>
<td><?php echo htmlentities(strtoupper($kfgatepointsnama));?></td>
<td><?php echo htmlentities(strtoupper($kfgatepointc));?></td>

</tr>
<?php
$sn++;
}
?>

  </tbody>
</table>
                                
</body>
</html>