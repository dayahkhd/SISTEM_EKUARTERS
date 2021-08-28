<?php
session_start ();
include('../config/dbconnect.php');

if(isset($_POST['submit'])=="Daftar")
{
		$sistem 	         = 	$_POST['sistem'];
		$jabatan           	 = 	$_POST['jabatan'];
		$kk_kd           	 = 	$_POST['kk_kd'];
		$modul   	         = 	$_POST['modul'];
		$no_tel 	         = 	$_POST['no_tel'];
		$nama_pemohon      	 =	$_POST['nama_pemohon'];
		$date		         =  $_POST['date'];
		$date2		         =	$_POST['date2'];
		$keutamaan 	      	 =	$_POST['keutamaan'];
		$comments 	      	 =  $_POST['comments'];
		$justifikasi      	 = 	$_POST['justifikasi'];
		
		$query_permohonan = "INSERT INTO
		tblpermohonan(sistem,Jabatan,kk_kd,modul,no_tel,nama_pemohon,date,date_diperlukan,keutamaan,comments,justifikasi,permohonan)
		VALUES(
				'".mysql_real_escape_string($sistem)."',
				'".mysql_real_escape_string($jabatan)."',
				'".mysql_real_escape_string($kk_kd)."',
				'".mysql_real_escape_string($modul)."',
				'".mysql_real_escape_string($no_tel)."',
				'".mysql_real_escape_string($nama_pemohon)."',
				'".mysql_real_escape_string($date)."',
				'".mysql_real_escape_string($date2)."',
				'".mysql_real_escape_string($keutamaan)."',
				'".mysql_real_escape_string($comments)."',
				'".mysql_real_escape_string($justifikasi)."',
				'".mysql_real_escape_string(1)."'
		)";
		
		$resultpat =  mysql_query($query_permohonan) or die(mysql_error());
		$idpat     =  mysql_insert_id();

		printf("<script> alert('Tahniah maklumat anda telah berjaya disimpan .'); </script>");
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
<title>Borang Permohonan Change Request</title>
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<form method="post" >
	<div id="wrapper">

		<!-- Navigation -->
		


<!-- 		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> <?php echo strtoupper("selamat datang"." ".htmlentities($_SESSION['user']));?></h4>
				</div> -->
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">BORANG PERMOHONAN ONLINE PENAMBAHBAIKAN SISTEM (Change Request) / ADUAN / PERUBAHAN KUOTA TCA-ONLINE</div>
						<div class="panel-body">
							<div class="row">
						 	<div class="col-lg-10">	

						 				<!-- NAMA SISTEM -->								
										<div class="form-group">
											<div class="col-lg-4">
					 							<label>Nama Sistem<span id="" style="font-size:11px;color:Red">*</span>	</label>
											</div>
			
											<div class="col-lg-6">
											<?php
											   	$query_sistem = "select * from tblsistem order by nama ASC";
											   	$result_sistem = mysql_query($query_sistem) or die (mysql_error());
											   	echo "<select class=form-control name=sistem id=sistem required=required>";
											   	echo "<option>Sila Pilih</option>";
											   	while($data_sistem = mysql_fetch_array($result_sistem))
											   	{
												 	echo "<option value =$data_sistem[id]>$data_sistem[nama]</option>";	  
												}
											    echo "</select>";
											 ?>
											 <span id="course-availability-status" style="font-size:12px;"></span>	
											</div>
					    				</div>	
										
										<br><br>

										<!-- MODUL -->
										<div class="form-group">
											<div class="col-lg-4">
					 							<label>Modul<span id="" style="font-size:11px;color:Red">*</span>	</label>
											</div>
			
											<div class="col-lg-6">
											<input name="modul" id="" type="text" class="form-control" required>
											 <span id="course-availability-status" style="font-size:12px;"></span>	
											</div>
					    				</div>

					    				<br><br>

					    				<!-- PTJ / Unit -->
										<div class="form-group">
											<div class="col-lg-4">
					 							<label>PTJ / Unit<span id="" style="font-size:11px;color:Red">*</span>	</label>
											</div>

											<div class="col-lg-6">
											 <?php
											   $query_jabatan = "select * from tbljabatan order by kodjabatan ASC";
											   $result_jabatan = mysql_query($query_jabatan) or die (mysql_error());
											   echo "<select class=form-control name=jabatan id=jabatan required=required>";
											   echo "<option>Sila Pilih</option>";
											   while($data_jabatan = mysql_fetch_array($result_jabatan))
											   	{
												 	echo "<option value =$data_jabatan[kodjabatan]>$data_jabatan[jabatan]</option>";	  
												}
											   	echo "</select>";
											 ?>
											 <span id="course-availability-status" style="font-size:12px;"></span>	
											</div>
					    				</div>

					    				<br><br>

					    				<!-- KK / KD -->
										<div class="form-group">
											<div class="col-lg-4">
					 							<label>KK / KD<span id="" style="font-size:11px;color:Red">*</span>	</label>
											</div>
			
											<div class="col-lg-6">
											<input name="kk_kd" id="" type="kk_kd" class="form-control" required>
											 <span id="course-availability-status" style="font-size:12px;"></span>	
											</div>
					    				</div>

					    				<br><br>

					    				<!-- NAMA PEMOHON -->
					    				<div class="form-group">
											<div class="col-lg-2">
												<label>Nama Pemohon<span id="" style="font-size:11px;color:Red">*</span>	</label>
											</div>

										<div class="col-lg-4">
										<input class="form-control" name="nama pemohon" placeholder="Nama Penuh" required>
										</div>

										<!--No Tel-->
										 	<div class="col-lg-2">
												<label>No. Tel<span id="" style="font-size:11px;color:Red">*</span></label>
											</div>

										<div class="col-lg-4">
											<input class="form-control" name="no tel" id="" required>
										</div>
										</div>

										<br><br>

										<!-- TARIKH PERMOHONAN -->
					    				<div class="form-group">
										<div class="col-lg-2">
											<label>Tarikh Permohonan<span id="" style="font-size:11px;color:Red">*</span>	</label>
										</div>

										<div class="col-lg-4">
											<input class="form-control" type="date" name="date" required>
										</div>

										<!--Tarikh DIPERLUKAN-->
										 <div class="col-lg-2">
											<label>Tarikh Kuatkuasa/ Dilaksanakan<span id="" style="font-size:11px;color:Red">*</span></label>
										</div>

										<div class="col-lg-4">
											<input class="form-control" type="date" name="date2" id="date2">
										</div>
										</div>

										<br><br>

										<!--KEUTAMAAN-->
										<div class="form-group">
											<div class="col-lg-2">
												<label>Keutamaan<span id="" style="font-size:11px;color:Red">*</span>	</label>
											</div>

										<div class="col-lg-7">
										  <input type="radio" name="keutamaan" id="keutamaan" value="Rendah"    required> &nbsp; Rendah&nbsp;
										  <input type="radio" name="keutamaan" id="keutamaan" value="Sederhana" required> &nbsp; Sederhana&nbsp;
										  <input type="radio" name="keutamaan" id="keutamaan" value="Tinggi"    required> &nbsp; Tinggi&nbsp;
										  <input type="radio" name="keutamaan" id="keutamaan" value="Kritikal"  required> &nbsp; Kritikal&nbsp;
										</div>


										 <br><br>

										 <!-- PENAMBAHBAIKAN YANG DIPOHON / ADUAN -->
										<div class="form-group">
											<div class="col-lg-4">
					 							<label>Penambahbaikan yang dipohon / aduan<span id="" style="font-size:11px;color:Red">*</span>	</label>
											</div>
			
											<div class="col-lg-6">
												<textarea name="comments" rows="15" cols="60"></textarea >
											</div>
					    				</div>

										 <br><br>

										 <!-- JUSTIFIKASI -->
										<div class="form-group">
											<div class="col-lg-4">
					 							<label>Justifikasi<span id="" style="font-size:11px;color:Red">*</span>	</label>
											</div>
			
											<div class="col-lg-6">
											<textarea name="justifikasi" rows="15" cols="60"></textarea >
											</div>
					    				</div>

										 <br><br>

										 <!--BUTTON SUBMIT-->
										<div class="form-group">
										<div class="col-lg-4">
										</div>

											<div class="col-lg-6"><br><br>
												<input type="submit" class="btn btn-primary" name="submit" value="Daftar"></button>
											</div>
										</div>

									
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		

	</div>
	

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
	
	<script>

</script>
</form>
</body>

</html>
