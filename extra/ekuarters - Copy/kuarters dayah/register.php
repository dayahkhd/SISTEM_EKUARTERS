
<?php
session_start ();

require('../config/dbconnect.php');


if (! (isset ( $_SESSION ['login'] ))) 
{
	header ( 'location:../index.php' );
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Daftar</title>
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="../bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
</head>


<body>

<?php
if(isset($_POST['daftar']) == "Daftar")
{
	$fdaftarasset = $_POST['daftaraset'];
	$falamat 	  = $_POST['alamatrumah'];
	$fkelas 	  = $_POST['kelas'];
	$fgred		  = $_POST['gred'];
	$flokasi      = $_POST['lokasi'];
	$fjenisas  	  = $_POST['jenisasset'];
	$fjenisru     = $_POST['jenisrumah'];


	$querylast = "INSERT into tbl_daftarkuarter(k_idasset,k_alamatrumah,k_kelas,k_gred,k_lokasi,k_jenisasset,k_jenisrumah) 

	VALUES (
	'".mysql_real_escape_string($fdaftarasset)."',
	'".mysql_real_escape_string($falamat)."',
	'".mysql_real_escape_string($fkelas)."',
	'".mysql_real_escape_string($fgred)."',
	'".mysql_real_escape_string($flokasi)."',
	'".mysql_real_escape_string($fjenisas)."',
	'".mysql_real_escape_string($fjenisru)."'

	
)";

$resultpat = mysql_query($querylast) or die (mysql_error());
$idpat     =mysql_insert_id();

printf("<script> alert('Maklumat telah berjaya disimpan.'); window.location='listadmin.php?k_idasset=$fdaftarasset'</script>");

}

?>
<form method="post" >
	<div id="wrapper">
	<?php
	$querynama     = "SELECT * FROM  tablepengguna WHERE nokadpengenalan = '" .$_SESSION['login']."'";
	$resultnama    = mysql_query($querynama) or die(mysql_error());
	$datanama     = mysql_fetch_array($resultnama);

	$rnama   = $datanama ['namapemohon'];
	?>
		<?php include('leftbar.php');?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> SELAMAT DATANG <?php echo  $rnama;?></h4>
						<?php //echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?>
				</div>	




				<div class="row">
					<div class="col-lg-12">
			  			<div class="panel panel-default">
							<div class="panel-heading">
								<div align="center"><strong>DAFTAR KUARTERS</strong></div>
							</div>

							<div class="panel-body">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">

											<!-- 1 Pendaftaran -->
										    <div class="col-lg-4">
												<label>No pendaftaran Aset<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="daftaraset" id="daftaraset">
			 								</div>

			 							</div>
									</div>
								</div>

								<br>

			 					<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
			 								<!-- 2 Pendaftaran -->
										    <div class="col-lg-4">
												<label>Alamat Rumah<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
												<textarea name="alamatrumah" rows="3" class="form-control" id="alamatrumah"></textarea>
			 								</div>
										</div>
									</div>
								</div>

								<br>

			 					<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
			 								<!-- 3 Kelas -->
										    <div class="col-lg-4">
												<label>Kelas<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
												<?php
												$query_kelas = "select * from tbl_kelas order by s_nama ASC";
												$result_kelas = mysql_query($query_kelas) or die (mysql_error());
												echo "<select class=form-control name=kelas id=kelas required=required>";
												echo "<option value = ->Sila Pilih...</option>";
												while($data_kelas = mysql_fetch_array($result_kelas))
												{
													echo "<option value = $data_kelas[s_id]>$data_kelas[s_nama]- $data_kelas[s_deposit]</option>";
												}
													echo "</select>";		   
												?>
			 								</div>
										</div>
									</div>
								</div>	
										
								<br>

			 				<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
			 							<!-- 3 lokasi -->
										<div class="col-lg-4">
											<label> Gred <span id="" style="font-size:11px;color:red">*</span>	</label>
										</div> 
											<div class="col-lg-6">
											<?php
												$query_gred = "select * from tbl_gred";
												$result_gred = mysql_query($query_gred) or die (mysql_error());
												echo "<select class=form-control name=gred id=gred required=required>";
												echo "<option value = ->Sila Pilih...</option>";
												while($data_gred = mysql_fetch_array($result_gred))
												{
													echo "<option value = $data_gred[g_id]>$data_gred[g_jawatan]</option>";
												}
													echo "</select>";		   
												?>

			 								</div>
										</div>
								</div>
							</div>	


							<br>

			 				<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
			 							<!-- 3 lokasi -->
										<div class="col-lg-4" id="lokasi">
											<label> Lokasi <span id="" style="font-size:11px;color:red">*</span>	</label>
										</div> 
											<div class="col-lg-6">
												<!--connect database here-->
												<?php
												$query_lokasi = "select * from tbl_lokasi";
												$result_lokasi = mysql_query($query_lokasi) or die (mysql_error());
												echo "<select class=form-control name=lokasi id=lokasi required=required>";
												echo "<option value = ->Sila Pilih...</option>";
												while($data_lokasi = mysql_fetch_array($result_lokasi))
												{
													echo "<option value = $data_lokasi[l_id]>$data_lokasi[l_nama]</option>";
												}
													echo "</select>";		   
												?>

			 								</div>
									</div>
								</div>
							</div>	


							<br>

			 				<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
			 							<!-- 4 jenisrumah -->
										<div class="col-lg-4">
											<label> Jenis Asset <span id="" style="font-size:11px;color:red">*</span>	</label>
										</div> 
											<div class="col-lg-6">
												<!--connect database here-->
												<?php
												$query_jenisas = "select * from tbl_asset";
												$result_jenisas = mysql_query($query_jenisas) or die (mysql_error());
												echo "<select class=form-control name=jenisasset id=jenisasset required=required>";
												echo "<option value = ->Sila Pilih...</option>";
												while($data_jenisas = mysql_fetch_array($result_jenisas))
												{
													echo "<option value = $data_jenisas[a_idasset]>$data_jenisas[a_nama]</option>";
												}
													echo "</select>";		   
												?>
			 								</div>
									</div>
								</div>
							</div>	

							<br>

			 				<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
			 							<!-- 4 jenisrumah -->
										<div class="col-lg-4">
											<label> Jenis Rumah <span id="" style="font-size:11px;color:red">*</span>	</label>
										</div> 
											<div class="col-lg-6">
												<!--connect database here-->
												<?php
												$query_jenisru = "select * from tbl_jenisrumah";
												$result_jenisru = mysql_query($query_jenisru) or die (mysql_error());
												echo "<select class=form-control name=jenisrumah id=jenisrumah required=required>";
												echo "<option value = ->Sila Pilih...</option>";
												while($data_jenisru = mysql_fetch_array($result_jenisru))
												{
													echo "<option value = $data_jenisru[j_id]>$data_jenisru[j_nama]</option>";
												}
													echo "</select>";		   
												?>
			 								</div>
									</div>
								</div>
							</div>	

							<br>

			 				<div class="row">
								<div class="col-lg-10" align="center">
									<div class="form-group">
			 							<input name="daftar" type="submit" class="btn btn-primary" id="daftar" value="Daftar"></button>
									</div>
								</div>
							</div>	
										
						</div>



						</div>
					</div>
				</div>


			</div>
		</div>
	</div>	
</form>

<!-- insert data put here-->
	




	<!-- jQuery -->
	<script src="../bower_components/jquery/dist/jquery.min.js"
		type="text/javascript"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"
		type="text/javascript"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="../bower_components/metisMenu/dist/metisMenu.min.js"
		type="text/javascript"></script>

	<!-- Custom Theme JavaScript -->
	<script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>

</body>

</html>
