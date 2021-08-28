<?php
session_start();

//require('cons.php');
//include 'dbconnect.php';

require('../../connkklab.php');
require('../../conskklab.php');

// WAKTU || MASA
date_default_timezone_set('Asia/Kuala_Lumpur');
$starikh 		= date('Y-m-d');
$smasa 			= date('h:i:s');
  
$idpat 			= $_GET['idpat'];
$daepat 		= $_GET['dae'];
$status 		= 1;
//$sptj			= 1;

//echo $daepat;
// TABLE PESAKIT
$querypt 	= mysql_query("SELECT * FROM patient WHERE id = '$idpat'");
$datapt	= mysql_fetch_array($querypt);
$namapat = $datapt['nama'];
$mykadpat = $datapt['docno'];

$r = date("Ymdhis");
$r2 = rand(1000,9999);
$random = "$r$r2";
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title>QR eprs</title>
<style type="text/css">
.italicf {
	font-style: italic;
	font-size: 14px;
	color: #690;
	font-weight: bold;
}
.boldf {
	font-weight: bold;
	color: #000;
}
</style>
</head>


<?php
if(isset($_POST['Pengesahan']) == "Pengesahan") 
{

	$sbalikluarnegara	= $_POST['balikluarnegara'];						
	$snamanegara		= $_POST['namanegara'];	
	$ssertaikluster		= $_POST['sertaikluster'];
	$snamakluster		= $_POST['namakluster'];
	$skontakrapat		= $_POST['kontakrapat'];
	$sdemam				= $_POST['demam'];	
	$sbatuk				= $_POST['batuk'];
	$ssakittekak		= $_POST['sakittekak'];
	$ssesaknafas		= $_POST['sesaknafas'];
	$sptj				= $_POST['listkk'];

if (($sbalikluarnegara == 1)||($snamanegara == 1)||($ssertaikluster == 1)||($snamakluster == 1)||($skontakrapat == 1)||($sdemam == 1)||($sbatuk == 1)||($ssakittekak == 1)||($ssesaknafas == 1))

{ $srisiko = 1;  }

else

{ $srisiko = 0;  }
	
$querypat = "INSERT INTO tablesaring
(sidpatient,sbalikluarnegara,snamanegara,ssertaikluster,snamakluster,skontakrapat,sdemam,sbatuk,ssakittekak,ssesaknafas,starikh,smasa,sptj,srisiko,srefno)

			VALUES(
					'".mysql_real_escape_string($idpat)."',
					'".mysql_real_escape_string($sbalikluarnegara)."',
					'".mysql_real_escape_string($snamanegara)."',
					'".mysql_real_escape_string($ssertaikluster)."',
					'".mysql_real_escape_string($snamakluster)."',
					'".mysql_real_escape_string($skontakrapat)."',
					'".mysql_real_escape_string($sdemam)."',
					'".mysql_real_escape_string($sbatuk)."',
					'".mysql_real_escape_string($ssakittekak)."',
					'".mysql_real_escape_string($ssesaknafas)."',
					'".mysql_real_escape_string($starikh)."',
					'".mysql_real_escape_string($smasa)."',
					'".mysql_real_escape_string($sptj)."',
					'".mysql_real_escape_string($srisiko)."',
					'".mysql_real_escape_string($random)."'
					)";
					
					$resultpat 	= mysql_query($querypat) or die(mysql_error());
					
					
printf("<script>alert('Pengesahan deklarasi dihantar.');window.location = '../fpdf16/tutorial/saring.php?no=$random' </script>");
					

}


  
?>
<body onload='loadCategories()'>


<div align="center">
<form id="form1" name="form1" method="post" action="">
<table width="50%" border="0">	

<!-- NAMA PESAKIT -->
<tr height="90" align="center">
  <td colspan="5"><img src="qrimage.png" width="757" height="117" /></td>
</tr>
<tr>
  <td colspan="5">&nbsp;</td>
  </tr>
<tr>
  <td height="32" colspan="5" bgcolor="#FFFF00"><b>SILA PILIH KLINIK KESIHATAN YANG INGIN ANDA LAWATI : </b>
    <select name="listkk" id="listkk" style="display: inline-block;">
      <?php
	$q10 = mysql_query("select * from kodptj where daerah = '$daepat'");
	while($d10 = mysql_fetch_array($q10))
	{
			$abbrkkk = $d10['abbr'];
			if((eregi('KD', $abbrkkk)) ||(eregi('KP', $abbrkkk)))
			{
				
			}
			
			else
			{
				print "<option value='$d10[id]'>$d10[nama]</option>";
			}
	}
	?>
    </select></td>
  </tr>
<tr>
  <td colspan="5">
  </td>
    
</tr>
<tr>
  <td colspan="5">
  
  
  
  </td>
</tr>
<tr>
  <td colspan="5">&nbsp;</td>
</tr>
<tr>
  <td height="28" colspan="5" bgcolor="#3399FF"><b>MAKLUMAT DEKLARASI SARINGAN PENYAKIT COVID-19</b></td>
  </tr>
<tr>
  <td width="5%">&nbsp;</td>
  <td colspan="4">&nbsp;</td>
</tr>
<tr>
  <td height="27" colspan="5" bgcolor="#CCCCCC">RISIKO</td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td colspan="4">&nbsp;</td>
</tr>
<tr>
  <td>1.</td>
  <td colspan="2">Adakah anda baru pulang dari luar negara dalam masa 30 hari sebelum?</td>
  <td width="23%" colspan="2"><select name="balikluarnegara" required="required" id="balikluarnegara">
    
    <?php
        $queryyna = mysql_query("select * from tableyesno where ynstatus ='$status' order by ynsusun desc");
		while($datayna = mysql_fetch_array($queryyna))
		{?>
    		
            <option value="<?php echo $datayna['ynid'] ?>"><?php echo $datayna['ynname'] ?></option>
    <?php 
            }   
            ?>
  </select></td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td colspan="2">Jika YA, sila nyatakan negara tersebut.</td>
  <td colspan="2"><input name="namanegara" id="namanegara" type="text" /></td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td colspan="4">&nbsp;</td>
</tr>
<tr>
  <td>2.</td>
  <td colspan="2">Adakah anda pernah menyertai mana-mana perhimpunan dalam masa 30 hari?</td>
  <td colspan="2"><select name="sertaikluster" required="required" id="sertaikluster">
    
    <?php
        $queryynb = mysql_query("select * from tableyesno where ynstatus ='$status' order by ynsusun desc");
		while($dataynb = mysql_fetch_array($queryynb))
		{?>
    		
            <option value="<?php echo $dataynb['ynid'] ?>"><?php echo $dataynb['ynname'] ?></option>
    <?php 
            }   
            ?>
  </select></td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td colspan="2">Jika YA, sila nyatakan perhimpunan tersebut.</td>
  <td colspan="2"><input name="namakluster" id="namakluster" type="text" /></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td colspan="2">&nbsp;</td>
  <td colspan="2">&nbsp;</td>
  </tr>
<tr>
  <td>3.</td>
  <td colspan="2">Adakah anda KONTAK RAPAT dengan individu DISAHKAN POSITIF COVID-19 atau PESAKIT DIBAWAH SIASATAN (PUI)?</td>
  <td colspan="2"><select name="kontakrapat" required="required" id="kontakrapat">
    
    <?php
        $queryync = mysql_query("select * from tableyesno where ynstatus ='$status' order by ynsusun desc");
		while($dataync = mysql_fetch_array($queryync))
		{?>
    		
            <option value="<?php echo $dataync['ynid'] ?>"><?php echo $dataync['ynname'] ?></option>
    <?php 
            }   
            ?>
  </select></td>
  </tr>
<tr>
  <td colspan="5">&nbsp;</td>
  </tr>
<tr>
  <td colspan="5" bgcolor="#CCCCCC">SIMPTOM</td>
</tr>
<tr>
  <td colspan="5">&nbsp;</td>
  </tr>
<tr>
  <td>1.</td>
  <td>DEMAM</td>
  <td><select name="demam" required="required" id="demam">
    
    <?php
        $queryynd = mysql_query("select * from tableyesno where ynstatus ='$status' order by ynsusun desc");
		while($dataynd = mysql_fetch_array($queryynd))
		{?>
    		
            <option value="<?php echo $dataynd['ynid'] ?>"><?php echo $dataynd['ynname'] ?></option>
    <?php 
            }   
            ?>
  </select></td>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td>2.</td>
  <td width="23%">BATUK</td>
  <td><select name="batuk" required="required" id="batuk">
    
    <?php
        $queryyne = mysql_query("select * from tableyesno where ynstatus ='$status' order by ynsusun desc");
		while($datayne = mysql_fetch_array($queryyne))
		{?>
    		
            <option value="<?php echo $datayne['ynid'] ?>"><?php echo $datayne['ynname'] ?></option>
    <?php 
            }   
            ?>
  </select></td>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td>3.</td>
  <td>SAKIT TEKAK</td>
  <td><select name="sakittekak" required="required" id="sakittekak">
    
    <?php
        $queryynf = mysql_query("select * from tableyesno where ynstatus ='$status' order by ynsusun desc");
		while($dataynf = mysql_fetch_array($queryynf))
		{?>
    		
            <option value="<?php echo $dataynf['ynid'] ?>"><?php echo $dataynf['ynname'] ?></option>
    <?php 
            }   
            ?>
  </select></td>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td>4.</td>
  <td>SESAK NAFAS</td>
  <td><select name="sesaknafas" required="required" id="sesaknafas">
    
    <?php
        $queryyng = mysql_query("select * from tableyesno where ynstatus ='$status' order by ynsusun desc");
		while($datayng = mysql_fetch_array($queryyng))
		{?>
    		
            <option value="<?php echo $datayng['ynid'] ?>"><?php echo $datayng['ynname'] ?></option>
    <?php 
            }   
            ?>
  </select></td>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="5" class="italicf">Kejujuran anda boleh menyelamatkan ramai nyawa termasuk anggota kesihatan. Terima kasih.</td>
  </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
    <td colspan="5" class="boldf">Dengan ini, saya <?php echo $namapat ." nomykad ".$mykadpat ?> mengaku bahawa maklumat yang saya diberikan di atas adalah benar.</td>
    </tr>

<tr>
    <td></td>
</tr>


<!-- BUTTON SIMPAN -->
<tr align="center" height="30">
  <td colspan="5">&nbsp;</td>
</tr>
<tr align="center" height="30">
    <td colspan="5"><input type="submit"  name="Pengesahan" value="Hantar Pengesahan" id="Pengesahan"></td>
</tr>

</table>
</form>
</div>

</body>
</html>