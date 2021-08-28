<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
extract($_GET);
extract($_POST);


require('checklogged.php');
require('cons.php');
require('sharedfunc.php');

$u = $_SESSION['uid'];
$g = $_SESSION['gid'];

include("js.php");  

$docno 		= $_POST['docno'];
$nama 		= $_POST['nama'];
$keyword 	= $_POST['keyword'];
$trkh 		= $_POST['trkh'];

if($tarikh == "")
{
	$y 	= date("Y-m-d");
	$y2 = date("d-m-Y");	
}
else
{
	$y 	= dbdate($tarikh);
	$y2 = dbdate($y);
}


if($tarikh2 == "")
{
	$yx	 = date("Y-m-d");
	$y22 = date("d-m-Y");	
}
else
{
	$yx  = dbdate($tarikh2);
	$y22 = dbdate($yx);
}

?>
<title>iCare about you</title>
<script type="text/javascript">
$(function() {
	$( "#tarikh" ).datepicker({dateFormat: 'dd-mm-yy'});
	$( "#tarikh2" ).datepicker({dateFormat: 'dd-mm-yy'});
	$( "#tarikh3" ).datepicker({dateFormat: 'dd-mm-yy'});
	$( "#tarikh4" ).datepicker({dateFormat: 'dd-mm-yy'});
	$("#tabs").tabs();
	oTable = $('#example').dataTable({
		"sPaginationType": "full_numbers"
	});
	oTable = $('#example2').dataTable({
		"sPaginationType": "full_numbers"
	});
});
</script>
</head>

<body>
<div id="tabs">
<?php
?>
<ul>
  <li><a href="#tabsenarai">Senarai Pra Daftar Neuklear </a></li>
  <li><a href="#tabcarian">Tarikh</a></li>
  <li><a href="#tabcarian2">Carian</a></li> 
</ul>

<div id="tabcarian">
<table width="100%" border="0" cellpadding="4">
<tr>
	<form method="post" action="temujanjipakarnuklearp.php">
    <?php
    $sebelum = date("d-m-Y", mktime(0,0,0,date("m"), date("d")-7, date("Y")));
    ?>
    <td>Sila Pilih Tarikh</td>
    <td>
    	Mula <input name="tarikh" id="tarikh" type="text" value="<?php print date("d-m-Y"); ?>">&nbsp;&nbsp;&nbsp;
	    Akhir <input name="tarikh2" id="tarikh2" type="text" value="<?php print date("d-m-Y"); ?>">&nbsp;&nbsp;&nbsp;
		<input type="hidden" name="trkh" value="1" />
	    <input type="submit" name="tukar" value="Ubah Tarikh" /></td>
	</form>
</tr>
</table>
</div>




<div id="tabcarian2">
<table width="100%" border="0" cellpadding="4">
<form action="temujanjipakarnuklearp.php#tabsenarai" method=post> 
<tr>
    <td>
    	<input type="text" name="keyword" size="60" />
      	<select name="keyitem">
        <option value="docno" selected="selected">IC</option>
        <option value="nama">Nama</option>
      	</select>
    	<input type="submit" value="Find" />
    </td>	
</tr>
</form>
</table>
</div>




<div id="tabsenarai">
<div id="demo">
	<form method="post" action="xlaptemujanjinuklearp.php">
    <td>
    	<input type="submit" value="Cetak Laporan Ini" />
		<input type="hidden" name="tarikh" value="<?php echo $y ?>" />
		<input name="tarikh2" id="tarikh2" type="hidden" value="<?php print $yx; ?>">
		<input name="nama" id="nama" type="hidden" value="<?php print $keyitem; ?>">
		<input name="keyword" id="keyword" type="hidden" value="<?php print $keyword; ?>">
		<input name="trkh" id="trkh" type="hidden" value="<?php print $trkh; ?>">	
	</td>
	</form>
    
    <br />

<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
<thead>
<tr bgcolor="#0a196c">
    <th>Bil</th>
    <th>Temujanji</th>
    <th>No IC</th>
    <th>Procedure</th>
    <th>Nama Pesakit</th>
    <th>Tarikh</th>
    <th>Masa</th>		
    <th>No Daftar</th>
    <th>Jenis Scan</th>
    <th>No Telefon</th>
    <th>Alamat</th>	
    <th>Rujukan Dari Mana</th>	
    <th>Dr Yang Memohon</th>
    <th>Terima/Tolak</th>			
</tr>
</thead>
<tbody>
<?php

$yy =1;
if($keyword != "")
{ 
	$qr = mysql_query("select * from temujanjinuklearpra where $keyitem like '%$keyword%' order by tarikhreg desc");
}

if($trkh == "1") 
{	 
	$qr = mysql_query("select * from temujanjinuklearpra where (tarikhreg between '$y' and '$yx') order by tarikhreg desc");
}

else
{ 
	$qr = mysql_query("select * from temujanjinuklearpra where (tarikhreg between '$y' and '$yx')  order by tarikhreg desc");
}

while($dd = mysql_fetch_array($qr))
{
	$qa33 = mysql_query("select * from pakarcardiology where id = '$dd[xprosedure]'");
	$da33 = mysql_fetch_array($qa33);
	
	// $qa44 = mysql_query("select * from doktornuklear where susun = '$dd[doktor]'");
	// $da44 = mysql_fetch_array($qa44);

	
	$qa55 = mysql_query("select * from rejectnuklear where id = '$dd[reject]'");
	$da55 = mysql_fetch_array($qa55);
	
	$qa66 = mysql_query("select * from rujukannuklear where id = '$dd[rujukan]'");
	$da66 = mysql_fetch_array($qa66);

	$qaus = mysql_query("select * from user where id = '$dd[doktor]'");
	$daus = mysql_fetch_array($qaus);

	$sqltj = mysql_query("select * from temujanjinuklear where nodaftar = '$dd[nodaftar]'");
	$resultj = mysql_fetch_array($sqltj);	

?>
    <tr>
		<td><?php print $yy; ?></td>	
		<td align=center>
		<?php
			if($dd['reject'] == "")
			{			
				$q111x 		= mysql_query("SELECT * FROM temujanjinuklear where nodaftar = '$dd[nodaftar]' ");
				// $resultappt = mysql_fetch_array($q111x);
				$semakk 	= mysql_num_rows($q111x);
				if($semakk < 1)
				{	
					?>
					<a href="borangtemujanjinuklear.php?xid=<?php print $dd['id']; ?>&patientid=<?php print $dd['patientid']; ?>"><strong>Daftar Temujanji</strong></a>
					<?php
				}
				else
				{	
					print "Daftar Temujanji";
				}			
			}
			else
			{
				print "";
			}
		?>	
		</td>
		<td align=center>
			<?php
			
			$q111x2 	= mysql_query("SELECT * FROM visitpakarnuklear where rn='$dd[nodaftar]' ");
			$semakk2 	= mysql_num_rows($q111x2);


			if($semakk2 < 1)
			{	
				?>
				<strong><a href="edittemujanjinuklearp.php?xid=<?php print $dd['id']; ?>&patientid=<?php print $dd['patientid']; ?>&jenis=pra"><?php echo $dd['docno']; ?>
				<?php
			}	
			else
			{
				?><strong><?php echo $dd['docno'];
			}	
			?>	
					<?php

					?>

			</strong></a>
            </td>
            <td align=center><?php echo $da33['nama']; ?></td>
			<td><?php echo $dd['nama']; ?></td>
			<td><?php echo dbdate($dd['tarikhreg']); ?></td>
			<td><?php echo $dd['masareg']; ?></td>		
			<td align=center><?php echo $dd['nodaftar']; ?></td>
			<td align=center><?php echo $dd['typescan']; ?></td>		
			<td align=center><?php echo $dd['enset']; ?></td>
			<td align=center><?php 					
					print "$dd[alamat] $dd[poskod]";
					$q1 = mysql_query("select * from bandar where id='$dd[bandar]'");
					$r1 = mysql_fetch_array($q1);
					print " ".$r1['nama']; 
					$q2 = mysql_query("select * from negeri where id='$dd[negeri]'");
					$r2 = mysql_fetch_array($q2);
					print " ".$r2['nama']; 
			?></td>
			<td align=center><?php echo strtoupper($da66['nama']); ?></td>		
			<td align=center><?php echo strtoupper($daus['name']); ?></td>		
			<td align=center><?php echo "Tarikh Temujanji : ".$resultj['nodaftar'];
			if($dd['reject'] != "")
			{	
				if ($dd['rejectid'] == '1')
				{
					echo "TERIMA<br>";
					echo "Tarikh Temujanji : ".$resultj['nodaftar'];

				}
				else
				{
				echo $da55['nama']; 
				echo "<br>Catatan : ".strtoupper($dd['note']); 
				}
			}	
			?></td>			
	</tr>
	<?php
	$yy++;
}
?>
</tbody>
<tfoot>
<tr bgcolor="#87a61c">
    <th>Bil</th>
    <th>Temujanji</th>
    <th>No IC</th>
    <th>Procedure</th>
    <th>Nama Pesakit</th>
    <th>Tarikh</th>
    <th>Masa</th>		
    <th>No Daftar</th>
    <th>Jenis Scan</th>
    <th>No Telefon</th>
    <th>Alamat</th>	
    <th>Rujukan Dari Mana</th>	
    <th>Dr Yang Memohon</th>
    <th>Terima/Tolak</th>			
</tr>
</tfoot>
</table>
</div>
</div>




</body>
</html>
