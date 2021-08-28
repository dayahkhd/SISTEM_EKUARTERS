
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Senarai Admin Berdaftar - Kemaskini</title>
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="../bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
</head>


<body>
<form method="POST">

	<div id="wrapper">
		<?php include('leftbar.php');?>
		<div id="page-wrapper">
			<div class="row">

<?php
// session_start ();

// require('../config/dbconnect.php');

//     $user2     =   $_SESSION['user'];
//     $jabatan2    =   $_SESSION['jabatan'];
//     $akses  =   $_SESSION['authlevel'];
//     $namapegawai = $_SESSION['namapegawai'];

    //table user
    //s*f tbl user w user= $user
    $query      =   "SELECT * FROM tbluser WHERE user='$user'";
    $result     =   mysql_query($query) or die(mysql_error());
    $data       =   mysql_fetch_array($result);

    $biluser                  = $data['bil'];
    
    $status = 1;


// if (! (isset ( $_SESSION ['user'] ))) 
// {
// 	header ( 'location:../index.php' );
// }


    $r              = date("Ymdhis");   // 14
    $r2             = rand(1000,9999);  //4
    $randomno       = "$r$r2";

?>

<?php

$fdaftarasset = $_GET['id'];
// echo $fdaftarasset;

// TABLE DAFTARKUARTERS
	$querydaftar     = "SELECT * FROM  tbl_daftarkuarter WHERE k_id = '$fdaftarasset'";
	$resultdaftar    = mysql_query($querydaftar) or die(mysql_error());
	$datadaftar     = mysql_fetch_array($resultdaftar);

//
	$xdaftarasset   = $datadaftar ['k_idasset'];
	$xalamat		= $datadaftar ['k_alamatrumah'];
	$xkelas 		= $datadaftar ['k_kelas'];
	// $xgred          = $datadaftar ['k_gred'];
	$xlokasi        = $datadaftar ['k_lokasi'];
	$xjenisasset    = $datadaftar ['k_jenisasset'];
	$xjenisrumah    = $datadaftar ['k_jenisrumah'];

	//table alamat
	$queryalamat     = "SELECT * FROM  tblalamat WHERE a_id = '$xalamat'";
	$resultalamat    = mysql_query($queryalamat) or die(mysql_error());
	$dataalamat      = mysql_fetch_array($resultalamat);

	$yalamat			= $dataalamat['a_nama'];
	$yalamatj  = $dataalamat['a_jabatan'];

//TABLE KELAS
	$querykelas     = "SELECT * FROM  tbl_kelas WHERE s_id = '$xkelas'";
	$resultkelas    = mysql_query($querykelas) or die(mysql_error());
	$datakelas      = mysql_fetch_array($resultkelas);

	$ykelas			= $datakelas['s_nama'];
	$ykelasdeposit  = $datakelas['s_deposit'];

// TABLE GRED
	// $querygred     = "SELECT * FROM  tbl_gred WHERE g_id = '$xgred'";
	// $resultgred    = mysql_query($querygred) or die(mysql_error());
	// $datagred      = mysql_fetch_array($resultgred);


	// $ygred         = $datagred['g_jawatan'];

//TABLE LOKASI
	$querylokasi   = "SELECT * FROM  tbllokasi WHERE l_id = '$xlokasi'";
	$resultlokasi  = mysql_query($querylokasi) or die(mysql_error());
	$datalokasi    = mysql_fetch_array($resultlokasi);

	$ylokasi       = $datalokasi['l_nama'];


//TABLE JENIS ASSET
	$queryasset   = "SELECT * FROM  tbl_asset WHERE a_idasset = '$xjenisasset'";
	$resultasset  = mysql_query($queryasset) or die(mysql_error());
	$dataasset    = mysql_fetch_array($resultasset);

	$yasset       = $dataasset['a_nama'];

//TABLE JENIS RUMAH
	$queryrumah   = "SELECT * FROM  tbljenisrumah WHERE jrid = '$xjenisrumah'";
	$resultrumah  = mysql_query($queryrumah) or die(mysql_error());
	$datarumah    = mysql_fetch_array($resultrumah);

	$yjenisrumah  = $datarumah['jrnama'];


?>
				<div class="col-lg-12">
					<h4 class="page-header">
                        <?php echo strtoupper("selamat datang"." ".htmlentities($_SESSION['namapegawai']));?></h4>
				</div>	

								<div class="form-group">

			 						<div class="row">
			 							<div class="col-lg-10">
											<div class="form-group">
											<!-- 1 Pendaftaran -->
										    	<div class="col-lg-4">
												<label>No pendaftaran Aset<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>

											<div class="col-lg-6">
												<input class="form-control" name="daftaraset" id="daftaraset" value=<?php echo $xdaftarasset?>> 
												</input>  
			 								</div>

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
											<!-- <div class="col-lg-6">
												<textarea name="alamatrumah" rows="3" class="form-control" id="alamatrumah"><?php //echo $xalamat?>  </textarea>
			 								</div> -->
			 								<div class="col-lg-6">
												<?php
												$query_kelas = "select * from tblalamat order by a_nama ASC";
												$result_kelas = mysql_query($query_kelas) or die (mysql_error());
												
												echo "<select class=form-control name=alamatrumah id=alamatrumah ";
												echo "<option value=$yalamat>$yalamat-$yalamatj</option>";

												while($data_kelas = mysql_fetch_array($result_kelas))
												{
													echo "<option value = $data_kelas[a_id]>$data_kelas[a_nama]- $data_kelas[a_jabatan]</option>";
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
			 								<!-- 3 Kelas -->
										    <div class="col-lg-4">
												<label>Kelas<span id="" style="font-size:11px;color:red">*</span>	</label>
											</div>
											<div class="col-lg-6">
												<?php
												$query_kelas = "select * from tbl_kelas order by s_nama ASC";
												$result_kelas = mysql_query($query_kelas) or die (mysql_error());
												
												echo "<select class=form-control name=kelas id=kelas ";
												echo "<option value=$ykelas>$ykelas-$ykelasdeposit</option>";

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

			 				<!-- <div class="row">
								<div class="col-lg-10">
									<div class="form-group">
			 							
										<div class="col-lg-4">
											<label> Gred <span id="" style="font-size:11px;color:red">*</span>	</label>
										</div> 
											<div class="col-lg-6">
											<?php
												// $query_gred = "select * from tbl_gred";
												// $result_gred = mysql_query($query_gred) or die (mysql_error());
												// echo "<select class=form-control name=gred id=gred>";
												// echo "<option value=$ygredid >$ygred</option>";
												// while($data_gred = mysql_fetch_array($result_gred))
												// {
												// 	echo "<option value = $data_gred[g_id]>$data_gred[g_jawatan]</option>";
												// }
												// 	echo "</select>";		   
												?>

			 								</div>
										</div>
								</div>
							</div>	 -->


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
												$query_lokasi = "select * from tbllokasi";
												$result_lokasi = mysql_query($query_lokasi) or die (mysql_error());
												echo "<select class=form-control name=lokasi id=lokasi >";
												echo "<option value=$ylokasi>$ylokasi</option>";
												while($data_lokasi = mysql_fetch_array($result_lokasi))
												{
													echo "<option value = $data_lokasi[l_id]>$data_lokasi[l_jabatan]-$data_lokasi[l_nama]</option>";
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
												$query_jenisas = "select * from tbl_asset W";
												$result_jenisas = mysql_query($query_jenisas) or die (mysql_error());
												echo "<select class=form-control name=jenisasset id=jenisasset >";
												echo "<option value=$yasset>$yasset</option>";
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
												$query_jenisru = "select * from tbljenisrumah";
												$result_jenisru = mysql_query($query_jenisru) or die (mysql_error());
												echo "<select class=form-control name=jenisrumah id=jenisrumah >";
												echo "<option value=$yjenisrumah>$yjenisrumah</option>";
												while($data_jenisru = mysql_fetch_array($result_jenisru))
												{
													echo "<option value = $data_jenisru[jrid]>$data_jenisru[jrnama]</option>";
												}
													echo "</select>";		   
												?>
			 								</div>
									</div>
								</div>
							</div>

							<br>

							 <!--BUTTON SUBMIT-->
								<div class="form-group">
										<div class="col-lg-4"></div>
									<div class="col-lg-6">
										<input type="submit" class="btn btn-primary" name="submit" value="Kemaskini"></button>
									</div>
								</div>
						</div>
					</div>
				</div>



	<?php


	if(isset($_POST['submit'])== "Kemaskini")

	{

		//$daftarasset   = $_POST ['daftaraset'];
		$alamat		   = $_POST ['alamatrumah'];
		$kelas 		   = $_POST ['kelas'];
		// $gred          = $_POST ['gred'];
		$lokasi        = $_POST ['lokasi'];
		$jenisasset    = $_POST ['jenisasset'];
		$jenisrumah    = $_POST ['jenisrumah'];

		
		$query_admin   		 = "UPDATE  tbl_daftarkuarter SET

		k_alamatrumah	     =	'".mysql_real_escape_string($alamat)."',
		k_kelas   	         =	'".mysql_real_escape_string($kelas)."',
		
		k_lokasi	         =	'".mysql_real_escape_string($lokasi)."',
		k_jenisasset 	     =	'".mysql_real_escape_string($jenisasset)."',
		k_jenisrumah 	     =	'".mysql_real_escape_string($jenisrumah)."'

		where k_id = '".mysql_real_escape_string($fdaftarasset)."'";
		$resultpat =  mysql_query($query_admin) or die(mysql_error());
		
		printf("<script> alert('DATA TELAH DIKEMASKINI .'); window.location = 'kemaskini.php?id=$fdaftarasset' </script>");
	}

?>






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
</form>
</html>
