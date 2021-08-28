<?php
session_start();
require('../../../conskk.php');

// set Barcode39 object 
$u = $_SESSION['uid'];
$ptj = $_SESSION['ptj'];
$ptj2 = $_SESSION['ptj2'];

$qu = mysql_query("select * from usergg where id = '$u'");
$du = mysql_fetch_array($qu);

$refno = $_GET['refno'];
$q = mysql_query("select * from visitkk where refno = '$refno' and ptj='$ptj'");
$d = mysql_fetch_array($q);

$q2 = mysql_query("select * from patient where id = '$d[patientid]'");
$d2 = mysql_fetch_array($q2);

$nokp = "$d[docno]";

$q3 = mysql_query("select * from dokumen where id = '$d2[docs]'");
$d3 = mysql_fetch_array($q3);

$q4 = mysql_query("select * from bandar where susun = '$d2[bandar]'");
$d4 = mysql_fetch_array($q4);

$q5 = mysql_query("select * from negeri where id = '$d2[negeri]'");
$d5 = mysql_fetch_array($q5);

$q6 = mysql_query("select * from jantina where id = '$d2[jantina]'");
$d6 = mysql_fetch_array($q6);

$q7 = mysql_query("select * from agama where id = '$d2[agama]'");
$d7 = mysql_fetch_array($q7);

$q8 = mysql_query("select * from bangsa where id = '$d2[bangsa]'");
$d8 = mysql_fetch_array($q8);

$q9 = mysql_query("select * from warga where id = '$d2[warga]'");
$d9 = mysql_fetch_array($q9);

$q10 = mysql_query("select * from aduan where id = '$d[aduan]'");
$d10 = mysql_fetch_array($q10);

$q12 = mysql_query("select * from punca where id = '$d[punca]'");
$d12 = mysql_fetch_array($q12);

$q13 = mysql_query("select * from pakar where susun = '$d[pakar]'");
$d13 = mysql_fetch_array($q13);

$q14 = mysql_query("select * from disiplin2 where susun = '$d[disiplin]'");
$d14 = mysql_fetch_array($q14);

$q15 = mysql_query("select * from zon where zonid = '$d[zon]'");
$d15 = mysql_fetch_array($q15);

$zon = $d15[zon];

$q16 = mysql_query("select * from kampung where kmpgid = '$d2[kmpg]'");
$d16 = mysql_fetch_array($q16);
$kmpg = $d16[kmpg];

if($zon == "") { $zon = "ZON LKO"; }

$by = explode("-",$d2[bday]);
$tr = explode("-",$d[tarikh]);
$rns = "RN $rn";
$tm = "$tr[2]/$tr[1]/$tr[0]";

$pr = explode(" ", $d13[nama]);
$pakar = "$d13[nama2]";
$pakar2 = "$d13[nama]";

$docs = "$d3[kod] $d2[docno]";
$umur = "$d2[umur] TH $d2[umurbln] BL $d2[umurhr] HR";

$bday = "T/L $by[2]/$by[1]/$by[0]";
$waris = "Waris : $d[waris]";
$add2 = strtoupper("$d2[poskod] $d4[nama] $d5[nama]");
$tel = "Tel : $d2[tepon] $d2[enset]";

$kelas = "Kelas : $d[kelaswad]";
$wad = "$d[wad] ($d[disiplin])";

$jantina = strtoupper("$d6[nama]/$d7[nama]");
$telwaris = "Tel : $d[wenset]";
$kerja = "$d2[kerja]";
$didik = ", $d2[pendidikan]";

if($d[masa] < 12){ $ante = "AM"; }else{ $ante = "PM"; }
$masa = "$d[masa] $ante";
$bayar = "RM $d[deposit]";
$namas = htmlspecialchars_decode($d2[nama], ENT_QUOTES);
$nama = substr($namas,0,56);
$nama2 = substr($namas,0,20);
$alamat = substr($d2[alamat],0,56);

$qrnp = mysql_query("select * from patientrec where pakar2='$d[pakar2]' and pakar='3' and patientid='$d[patientid]'");
$rowp = mysql_fetch_array($qrnp);				
$nopenyakit = $rowp[pakarno];

if($d[namahosp] != "")
{
	$punca = "$d12[nama] ($d[namahosp])";
}
else
{	
	$punca = "$d12[nama]";
}


// display new barcode 
?>
<style>
.a1{ font-size: 16px; font-family:arial; font-weight:normal; font-weight: bold; font-style:normal; color:#000}
.a2{ font-size: 19px; font-family:arial; font-weight:normal; font-weight: bold; font-style:normal; color:#000}
.a3{ font-size: 12px; font-family:arial; font-weight:normal;  font-style:normal; color:#000}
.a4{ font-size: 12px; font-family:arial; font-weight:normal; font-weight: bold; font-style:normal; color:#000}
</style>
<table  border="0" cellspacing=0 cellpadding=0 style="height: 170px; width:480px; ">
  <tr>
    <td width="" rowspan="3"><img src="image.php?nokp=<?php print $nokp; ?>"></td>
    <td colspan="2" class="a4" align=right><?php print $ptj2." - ".$zon; ?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="a1" align=right><?php print $pakar." ".$nopenyakit; ?>/ <?php print $d2[parentid]; ?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="a2" align=right><?php print $docs; ?>&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="a1"><?php print $nama; ?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="a3"><?php print $alamat; ?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="a3"><?php print $kmpg." ".$add2; ?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="a3"><?php
	print $xx = "$umur $bday";
	?></td>
    <td class="a3" align=right><?php print $jantina; ?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="a3"><?php print $tel; ?></td>
    <td width="" class="a3" align=right><?php print $d8[nama]."-".$d88[nama]."/".$d9[nama];?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="a3"><?php print $waris." ".$telwaris; ?></td>
    <td class="a3" align=right><?php print $d14[nama];?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="a3"><?php print $kerja."  ".$didik; ?></td>
    <td class="a3" align=right><?php print "No Resit : ".$d[noresit]."    ".$bayar;?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" class="a3"><?php print "T/Daftar : ".$tm."  ".$masa; ?></td>
    <td class="a3" align=right><?php print $punca; ?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>
<br>
<br>
<br>
<br>
<table width="480" border="0" cellspacing=0 cellpadding=0>
  <tr>
    <td class="a1"><?php print $pakar; ?></td>
    <td class="a1"><?php print $pakar; ?></td>
  </tr>
  <tr>
    <td class="a3"><?php print "Tkh"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/"; ?></td>
    <td class="a3"><?php print "Tkh"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/"; ?></td>
  </tr>
  <tr>
    <td class="a3"><?php print $d2[docno]; ?></td>
    <td class="a3"><?php print $d2[docno]; ?></td>
  </tr>
  <tr>
    <td class="a3"><?php print $nama2; ?></td>
    <td class="a3"><?php print $nama2; ?></td>
  </tr>
  <tr>
    <td class="a3">Unit</td>
    <td class="a3">Unit</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="a1"><?php print $pakar; ?></td>
    <td class="a1"><?php print $pakar; ?></td>
  </tr>
  <tr>
    <td class="a3"><?php print "Tkh"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/"; ?></td>
    <td class="a3"><?php print "Tkh"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/"; ?></td>
  </tr>
  <tr>
    <td class="a3"><?php print $d2[docno]; ?></td>
    <td class="a3"><?php print $d2[docno]; ?></td>
  </tr>
  <tr>
    <td class="a3"><?php print $nama2; ?></td>
    <td class="a3"><?php print $nama2; ?></td>
  </tr>
  <tr>
    <td class="a3">Unit</td>
    <td class="a3">Unit</td>
  </tr>
</table>
