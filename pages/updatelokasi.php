<?php 
	require('../config/dbconnect.php');

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Kemaskini Lokasi- Admin</title>
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

					<?php

					$laid = $_GET['id'];

					$queryalamat = "SELECT * from tbllokasi WHERE l_id = '$laid'";
					$resultalamat = mysql_query($queryalamat) or die(mysql_error());
					$dataalamat = mysql_fetch_array($resultalamat);

					//table alamat
					$xalamat 	= $dataalamat['l_nama'];
                    $xkodjabatan = $dataalamat['l_jabatan'];
                    $idalamat = $dataalamat['l_id'];
				 	?>

				<?php


				if(isset($_POST['submit'])  == "Update")

				{
		
					$alamat		   	= $_POST ['lokasi'];
					$jabatan 		= $_POST ['kjabatan'];

					$query_admin   		 = "UPDATE  tbllokasi SET

					l_nama	     ='".mysql_real_escape_string($alamat)."',
					l_jabatan    ='".mysql_real_escape_string($jabatan)."'
			
					where l_id = '".mysql_real_escape_string($idalamat)."'";
					$resultpat =  mysql_query($query_admin) or die(mysql_error());
		
					 printf("<script> alert('DATA TELAH DIKEMASKINI .'); window.location = 'listlokasi.php?id=$laid' </script>");
				}

			?>

					<div class="col-lg-12">
						<h4 class="page-header">
							<?php echo strtoupper("selamat datang"." ".htmlentities($_SESSION['namapegawai']));?>	
						</h4>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div align="center">
										<strong>DAFTAR LOKASI</strong>
									</div>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-10">
											<div class="form-group">
												<div class="col-lg-4">
													<label>Lokasi Kuarters: <span id="" style="font-size:11px;color:red">*</span></label>
												</div>
												<div class="col-lg-6">
												<textarea class="form-control" name="lokasi" id="lokasi"><?php echo $xalamat;?></textarea> 
			 								</div>
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-10">
											<div class="col-lg-4">
												<label>Kod Jabatan: <span id="" style="font-size:11px;color:red">*</span></label>
											</div>
											<div class="col-lg-6">
												<!-- <textarea class="form-control" name="kjabatan" id="kjabatan"><?php echo $xkodjabatan;?></textarea>  -->

												<?php

												$query_gred = "select * from tablejabatan";
												$result_gred = mysql_query($query_gred) or die (mysql_error());

												echo "<select class=form-control name=kjabatan id=kjabatan>";
												echo "<option value= >$xkodjabatan</option>";

												while($data_gred = mysql_fetch_array($result_gred))
												{
													echo "<option value = $data_gred[kodjabatan]>$data_gred[kodjabatan]- $data_gred[jabatan]</option>";
												}
													echo "</select>";		   
												?>
			 								</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-10" align="center">
											<div class="form-group">
												<input name="submit" type="submit" class="btn btn-primary" id="daftar" value="Update"></button>
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