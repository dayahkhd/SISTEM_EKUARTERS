<?php 
	require('../config/dbconnect.php');

	$status = 1;

	$r 				= date("Ymdhis");	// 14
	$r2 			= rand(1000,9999);	//4
	$randomno 		= "$r$r2"; 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Kelas- Admin</title>
	<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
	<link href="../bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
	<link href="../bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
</head>
<body>
	<form method="post">
		<div id="wrapper">
			<?php include('leftbar.php'); ?>
			<div id="page-wrapper">

	<?php 
		if(isset($_POST['submit']) == "Daftar"){
			//code to declare
			$kkelas = $_POST['kelas'];
			$sdepo = $_POST['deposit'];

			$queryfirst = "INSERT into tbl_kelas(s_nama, s_deposit, s_status)

			VALUES(
			'".mysql_real_escape_string($kkelas)."',
			'".mysql_real_escape_string($sdepo)."',
			1
			)";


			$resultpat = mysql_query($queryfirst) or die (mysql_error());
			$idpat     =mysql_insert_id();


			$queryf = "SELECT MAX(s_susun) AS bilsusun FROM tbl_kelas";
			$resultf = mysql_query($queryf) or die (mysql_error());
			$databil = mysql_fetch_array($resultf);

			$maxbil = $databil['bilsusun'];
			$maxbilla = $maxbil + 1;

			$queryupdate = "UPDATE tbl_kelas SET s_susun = $maxbilla WHERE s_id = $idpat";
			$resultupdate = mysql_query($queryupdate) or die (mysql_error());


			printf("<script> alert('Maklumat telah berjaya disimpan.'); window.location='listkelas.php?s_nama=$kkelas'</script>");
		}
	 ?>
	
				<div class="row">
					<?php 
					$query      =   "SELECT * FROM tbluser WHERE user='$user'";
				    $result     =   mysql_query($query) or die(mysql_error());
				    $data       =   mysql_fetch_array($result);

				    $biluser                  = $data['bil'];
					
					$status = 1;

					$r 				= date("Ymdhis");	// 14
					$r2 			= rand(1000,9999);	//4
					$randomno 		= "$r$r2"; 
					?>
					<div class="col-lg-12">
						<h4 class="page-header">
							<?php echo strtoupper("selamat datang"." ".htmlentities($_SESSION['namapegawai']));?>	
						</h4>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<div align="center">
										<strong>DAFTAR KELAS</strong>
									</div>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-10">
											<div class="form-group">
												<div class="col-lg-4">
													<label>Kelas Kuarters: <span id="" style="font-size:11px;color:red">*</span></label>
												</div>
												<div class="col-lg-6">
												<input class="form-control" name="kelas" id="kelas">
			 								</div>
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-10">
											<div class="col-lg-4">
												<label>Jumlah Deposit(RM): <span id="" style="font-size:11px;color:red">*</span></label>
											</div>
											<div class="col-lg-6">
												<input class="form-control" name="deposit" id="deposit">
			 								</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-10" align="center">
											<div class="form-group">
												<input name="submit" type="submit" class="btn btn-primary" id="daftar" value="Daftar"></button>
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