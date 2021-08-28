<?php
//require('../connkklab.php');
//require('../conskklab.php');

require ('../config/dbconnect.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PEMERIKSAAN KENDIRI</title>
</head>
<link rel="stylesheet" href="login.css" type="text/css">
<style>
body
{ 
	background-color: #fff;
}

#loginall { width: 400px; height: 320px; background: url(loginbox.png); padding: 0; position: absolute; margin: -180px auto auto -210px; left: 50%; top: 50% }

#loginheaderbox h1, #logininputbox h3 { display: none }

#logininputbox {
	width: 425px;
	height: 100px;
	position: absolute;
	margin: 0 auto auto -170px;
	left: 185px;
	top: 50%;
	padding: 0;
}
</style>


<?php
if(isset($_POST['submit']))
{
	$fqrnoic		= $_POST['qrnoic'];
	
	$q121 		= mysql_query("SELECT * FROM tablepengguna where nokadpengenalan='$fqrnoic'");
	$semak2 	= mysql_num_rows($q121);
	$semakt2 	= mysql_fetch_array($q121);

	$r 				= date("Ymdhis");	// 14
	$r2 			= rand(1000,9999);	//4
	$randomno 		= "$r$r2";
				
	// DATA TIADA DALAM DATABASE
	if ($semak2 < 1)
	{
		printf("<script> alert ('Data anda tidak wujud. Sila hubungi bahagian SUMBER MANUSIA di jabatan anda untu mendaftarkan maklumat anda di dalam SISTEM ESPK.'); window.location = 'appsjknj.moh.gov.my'</script>");
	}
	
	// DATA TELAH WUJUD DALAM DATABASE
	else
	{
		printf("<script>window.location = 'kendiri.php?nomykad=$fqrnoic&randomno=$randomno'</script>");
	}                
	//$fqdaerah		= $_POST['qrdaerah'];
	//$fqkk			= $_POST['qrkk'];


}
	
?>
<body>
	
    <center><img src="kuarter.jpg" width="930" height="125" /><br /><br /></center>
	<div align="center">
	  <h1>PEMERIKSAAN KENDIRI <br />KESELAMATAN KUARTERS</h1></div>

    <form id="form1" name="form1" method="post" action="">
<br /><br />
<br /><br />
<div id="loginall">
   <br><br><br><br><br><br><br><center><label><font color="#FFFFFF">Sila Masukkan No IC Anda :</label><br>
<div id="logininputbox">
	
  <!--  <label>Sila masukkan no ic anda :</label><br>-->
    <!-- NO KAD PENGENALAN -->
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
	<!--<label for="qrnoic">NOIC</label>--><input type="text" id="qrnoic" required="required" name="qrnoic" maxlength="12" placeholder="900201010000"><br><br>
	

	<!-- DAERAH -->
	<!--<label for="qrdaerah">DAERAH KEDIAMAN</label><select name="qrdaerah" required="required" id="qrdaerah" style="margin : 0 0 20px 0; height: 30px; border: 2px solid #bb6; padding: 10px; opacity: .7; filter: alpha(opacity=70)">
	<option></option>
	<?php
       /* $querybandar = mysql_query("SELECT * FROM bandar ORDER BY nama");
		while($databandar = mysql_fetch_array($querybandar))
		{
			if($datapt['bandar'] == $databandar['id'])
	        {
		        ?>
		        <option selected="selected" value="<?php echo $databandar['susun'] ?>"><?php echo strtoupper($databandar['nama']); ?></option>
		        <?php
	        }
	        else 
		    {
		        ?>
		        <option value="<?php echo $databandar['susun'] ?>"><?php echo strtoupper($databandar['nama']); ?></option>
		        <?php
		            
        	} 
		}*/
	?>
	</select><br><br>-->

	<!-- PILIHAN KK / KP -->
<!--	<label for="qrkk">KLINIK</label><select name="qrkk" required="required" id="qrkk"  style="margin : 0 0 10px 0; height: 30px; border: 2px solid #bb6; padding: 2px; opacity: .7; filter: alpha(opacity=70)">
	<option></option>
	<option value="kk" >KLINIK KESIHATAN</option>
	<option value="kp" >KLINIK PERGIGIAN</option>
	</select><br>	
	<!--input class="loginbtn" type="submit" value="login"-->
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit"  name="submit" value="Masuk" /> 
	<div id="logindisclaimer"></div>
</div>
	</form>
</div>

<div id="footerright" style="width: 100%; text-align: center; position:absolute; bottom: 100px; text-shadow: 3px 3px 3px #333333;">
Hakcipta Terpelihara Unit ICT, Jabatan Kesihatan Negeri Johor. 2020&copy;
</div>
<div id="footerdisclaimner" style="width: 100%; text-align: center; position:absolute; bottom: 20px; font-size: 80%; text-shadow: 3px 3px 3px #333333;">
<?php if (isset($_GET['err'])) { ?><div id="loginerror">Sila Pilih Daerah dan Jenis Klinik yang ingin dilawati.</div><?php } ?>

</body>
</html>

