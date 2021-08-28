	
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Semak Data Permohonan</title>
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="../bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
</head>

<body>
<form method="post" >
	<div id="wrapper">
		<?php include('leftbar.php');?>
	<div id="page-wrapper">
	
			<div class="row">
				<?php


    
    //table user
    //s*f tbl user w user= $user
    $query      =   "SELECT * FROM tbluser WHERE user='$user'";
    $result     =   mysql_query($query) or die(mysql_error());
    $data       =   mysql_fetch_array($result);

    $biluser                  = $data['bil'];
    
    $status = 1;


    $r              = date("Ymdhis");   // 14
    $r2             = rand(1000,9999);  //4
    $randomno       = "$r$r2";


$fid = $_GET['id'];

	$querylast = "SELECT * from tbl_pemohonan WHERE p_id = '$fid'";
	$resultlast = mysql_query($querylast) or die(mysql_error());

	$datalast = mysql_fetch_array($resultlast); 
	
	$dtmohon			= $datalast['p_tarikhmohon'];
	$dlokasimohon		= $datalast['p_lokasi'];

	$djantina			= $datalast['p_jantina'];
	$dstatusperkahwinan	= $datalast['p_statusperkahwinan'];
	$dtelrumah			= $datalast['p_telrumah'];
	$dtelhp				= $datalast['p_telhp'];
	$dtelpejabat		= $datalast['p_telpejabat'];

	$dkatjawatan		= $datalast['p_katjawatan'];
	$djawatan			= $datalast['p_jawatan'];
	$dtbertugas			= $datalast['p_jabatan'];
	$dunitp				= $datalast['p_unit'];
	$dtrkberkhidmat		= $datalast['p_tmulabertugas'];
	$dmtrkberkhidmat 	= $datalast['p_markahtmulabertugas'];
	$dofficehour		= $datalast['p_waktubertugas'];
	$dmofficehour 		= $datalast['p_markahwaktubertugas'];

	$dnamapasangan		= $datalast['p_namapasangan'];
	$dnokppasangan		= $datalast['p_icpasangan'];
	$dkeluarga			= $datalast['p_katkeluarga'];
	$dmkeluarga 		= $datalast['p_markahkatkeluarga'];
	$djawatanpasangan	= $datalast['p_jawatanpasangan'];
	$dtbpasangan		= $datalast['p_tkerjapasangan'];
	$dwbpasangan		= $datalast['p_wbpasangan'];
	$dbilanak			= $datalast['p_bilanak'];
	$dmbilanak 			= $datalast['p_markahbilanak'];

	$dalamatlama		= $datalast['p_alamatsekarang'];
	$dcheckbox1			= $datalast['p_checkbox1'];
	$dcheckbox2			= $datalast['p_checkbox2'];
	$dcheckbox3			= $datalast['p_checkbox3'];
	$dalamatsendiri		= $datalast['p_alamatrumahsd'];
	$djarakrumah		= $datalast['p_jarakrumah'];

	$dsebabmohon		= $datalast['p_sebabmohon'];
	$dpengesahan		= $datalast['p_pengesahan'];

	//admin update
	$dlulus 			= $datalast['p_statmohon'];
	$dkelasrumah 		= $datalast['p_kelasrumah'];
	$dalamattawaran		= $datalast['p_alamattawaran'];

	$dmasuk				= $datalast['p_tmasuk'];
	$dkeluar 			= $datalast['p_tkeluar'];
	$dterima 			= $datalast['p_terimadepo'];
	$djumlah 			= $datalast['p_jumlahdepo'];
	$dresit 			= $datalast['p_resit'];
	$markah 			= $datalast['p_totalmarkah'];
	
	$idstaff			= $datalast['p_staff'];

	//add
	$dkilo 				= $datalast['p_kilometer'];


// echo $querylast;

$query	= "SELECT * FROM tablepengguna WHERE id = '$idstaff'";
$result	= mysql_query($query) or die(mysql_error());
$data	= mysql_fetch_array($result);

// $idstaff 		= $data['id'];
$spic 			= $data['nokadpengenalan'];
$spnama			= $data['namapemohon'];
//$sjawatan		= $data['jawatan'];

$sjabatan 		= $data['jabatan'];
// $sunit			= $data['unit'];
$stlantik		= $data['tarikhlantik'];

//table jawatan
$queryjawatan	= "SELECT * FROM tablejawatan WHERE id = '$djawatan'";
$resultjawatan	= mysql_query($queryjawatan) or die(mysql_error());
$datajawatan = mysql_fetch_array($resultjawatan);

$sdjawatan = $datajawatan['jawatan'];

//table jabatan
$queryjabatan	= "SELECT * FROM tablejabatan WHERE kodjabatan = '$sjabatan'";
$resultjabatan	= mysql_query($queryjabatan) or die(mysql_error());
$datajabatan	= mysql_fetch_array($resultjabatan);

$sdjabatan = $datajabatan['jabatan'];

//table unit
$queryunit		= "SELECT * FROM tableunit WHERE kodunit = '$dunitp'";
$resultunit		= mysql_query($queryunit) or die(mysql_error());
$dataunit		= mysql_fetch_array($resultunit);

$sdunit = $dataunit['unit'];

//table lokasi
$query_lokasi 	= "select * from tbllokasi where l_id = '$dlokasimohon'";
$result_lokasi 	= mysql_query($query_lokasi);
$dlokasi		= mysql_fetch_array($result_lokasi);
$sdlokasidb		= $dlokasi['l_nama'];

// $querylokasi2 = "select * tbl_lokasi where l_jabatan = "

//table jantina
$query_jantina 	= "select * from tbl_jantina where id = '$djantina'";											                           
$result_jantina = mysql_query($query_jantina);
$dsjantina		= mysql_fetch_array($result_jantina);
$sdjantinadb	= $dsjantina['nama'];

//table status perkahwinan
$query_sp 		= "select * from tbl_statusperkahwinan where p_id = '$dstatusperkahwinan'";			
$result_sp 		= mysql_query($query_sp);
$dsp			= mysql_fetch_array($result_sp);	
$sddb			= $dsp['p_nama'];

//table katjawatan
$query_katjawatan = "select * from tbl_katjawatan where t_id = '$dkatjawatan' ";
$result_katjawatan = mysql_query($query_katjawatan);
$dskatjawatan = mysql_fetch_array($result_katjawatan);
$sdkatjawatandb = $dskatjawatan['t_kategori'];

//table waktubertugas
$query_wbertugas = "select * from tbl_waktubertugas where id  = '$dofficehour' ";
$result_wbertugas =  mysql_query($query_wbertugas);
$wbertugas = mysql_fetch_array($result_wbertugas);
$sdbertugasdb = $wbertugas['nama'];

// $markahpp1 = $data1['mpp'];
// $markahpp12 = $data1['mkb'];

//table bilanak
$query_bilanak = "select * from tbl_bilanak where id  = '$dbilanak'";
$result_bilanak =  mysql_query($query_bilanak);
$bilanakb  = mysql_fetch_array($result_bilanak);
$sdbilanakdb = $bilanakb['bilangan'];

// $markahpp3 = $data3['mpp'];
// $markahpp32 = $data3['mkb'];

//table statmohon
$query_statmohon = "select * from tbl_statmohon where m_id  = '$dlulus'";
$result_statmohon =  mysql_query($query_statmohon);
$statmohonb  = mysql_fetch_array($result_statmohon);
$sdstatmohondb = $statmohonb['m_nama'];

//table keluarga
$query_keluarga = "select * from tblkeluargapp where k_id  = '$dkeluarga'";
$result_keluarga=  mysql_query($query_keluarga);
$keluargab  = mysql_fetch_array($result_keluarga);
$sdkeluargadb = $keluargab['k_nama'];

//table kelas
$query_kelas= "select * from tbl_kelas where s_id  = '$dkelasrumah'";
$result_kelas=  mysql_query($query_kelas);
$kelasb  = mysql_fetch_array($result_kelas);
$skelasnama = $kelasb['s_nama'];
$skelasdeposit = $kelasb['s_deposit'];


// $markahpp2 = $data2['mpp'];

$query_kelas = "select * from tbl_kelas where s_id = '$dkelasrumah' || s_nama = '$dkelasrumah'";
$result_kelas=  mysql_query($query_kelas);
$kelasb  = mysql_fetch_array($result_kelas);

$kelasnama = $kelasb['s_nama'];
$kelasdeposit = $kelasb['s_deposit'];

$query_alamat = "select * from tblalamat where a_id = '$dalamattawaran'";
$result_alamat=  mysql_query($query_alamat);
$alamatb  = mysql_fetch_array($result_alamat);

$sdalamatdb = $alamatb['a_nama'];
// $sdstatusalamatdb = $alamatb['a_buka'];

$querykilo = "select * from tbl_kilometer where idkilo = '$dkilo'";
$resultkilo=  mysql_query($querykilo);
$kilob  = mysql_fetch_array($resultkilo);

$sdkilob = $kilob['kilometer'];


?>
				<div class="col-lg-12">
					<h4 class="page-header"> <?php echo strtoupper("selamat datang"." ".htmlentities($_SESSION['namapegawai']));?> </h4>
					<!-- SELAMAT DATANG <strong><em> <?php echo  $spnama  ;?></strong></em> -->
				</div>
			</div>

			<!-- /.row -->
			<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading"></div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-10">
			<div class="form-group">
		    <div class="col-lg-5">
			<label>Tarikh Memohon:</label></div>
			<div class="col-lg-6"><label for="ftmohon">:</label>
			  <?php echo $dtmohon; ?>
			</div>								
			</div>								 
			<br><br>					
			<div class="form-group">
			<div class="col-lg-5">
			<label>Lokasi Kuarters Yang Dipohon:</label></div>
			<div class="col-lg-4">
			  <!-- <label for="flokasimohon">:</label> -->
			  <div name="flokasimohon" id="flokasimohon"><label for="flokasimohon">:</label>
				<?php

				$querykelas     = "SELECT * FROM  tbllokasi WHERE l_id = '$dlokasimohon'";
                $resultkelas    = mysql_query($querykelas) or die(mysql_error());
                $datakelas      = mysql_fetch_array($resultkelas);

                $ymohon         = $datakelas['l_nama'];

                echo $ymohon; 

  				?> 

              </div>
			</div>
		 </div>									
	 <br><br>								
		

		</div>
		</div>
		</div>
		</div>
		</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading">A) MAKLUMAT KEDIAMAN PEMOHON</div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-10">
				<div class="form-group">
				      <div class="col-lg-5">Alamat tempat tinggal sekarang (* sewa / rumah sendiri / keluarga) :</div>
				      <div class="col-lg-6">
				        <!-- <label for="falamatlama">:</label> -->
				        <!-- <input type="text" name="falamatlama" id="falamatlama" size="80" rows="3" class=form-control value=""> --><?php echo $dalamatlama ?>
			          </div>
			        </div>
				    <br>
				    <br>
				    <div class="form-group">
				      <div class="col-lg-5">
				        <p>Adakah suami / isteri tuan / puan mempunyai rumah sendiri? </p>
				        <p>(ya / tidak)</p>
				        <p>jika ya, sila nyatakan *</p>
				        <p>dan sila nyatakan,</p>
				      </div>
				      <div class="col-lg-6">
				        <p>
						<div>
						<input type="checkbox" name="fcheckbox1" id="fcheckbox1" <?php if (isset($dcheckbox1) && $dcheckbox1 == "1") echo "checked"; ?> value="1" />
				          <label for="fcheckbox1">Pinjaman Perumahan Kerajaan</label>
				        </p>
						</div>
				        <p>
				          <input type="checkbox" name="fcheckbox2" id="fcheckbox2" <?php if (isset($dcheckbox2) && $dcheckbox2 == "1") echo "checked"; ?> value="1" />
	                      <label for="fcheckbox2">Pinjaman Bank</label></p>
				        <p>
				          <input type="checkbox" name="fcheckbox3" id="fcheckbox3" <?php if (isset($dcheckbox3) && $dcheckbox3 == "1") echo "checked"; ?> value="1"/>
	                    <label for="fcheckbox3">Lain - lain Punca </label></p>
				      </div>
			        </div>
				    <br>
				    <br>
				    <div class="form-group"><br>
				      <br>
			        </div>
				    <div class="form-group"></div>
				    <br>
				    <br>
				    <div class="form-group">
				      <div class="col-lg-5">Alamat Rumah :</div>
				      <div class="col-lg-6">
				        <!-- <label for="falamatsendiri">:</label> -->
	                    <!-- <input name="falamatsendiri" type="text" id="falamatsendiri" size="50" class=form-control value=""> --><?php echo $dalamatsendiri ?>
				      </div>
				      <br>
			        </div>
				    <br>
				    <div class="form-group">
				      <div class="col-lg-5">Jarak rumah sendiri ke tempat bertugas :</div>
				      <div class="col-lg-6">
				        <!-- <label for="fjarakrumah">:</label> -->
	                    <!-- <input type="text" name="fjarakrumah" id="fjarakrumah" class=form-control value=""> --><?php echo $djarakrumah ?>
				      </div>
				      <br><br>
			      <div class="col-lg-5"></div>
			      <div class="col-lg-6">
			      	<!-- <label for="kilo">:</label> -->
			      	<?php	

			      	$querykelas     = "SELECT * FROM  tbl_kilometer WHERE idkilo = '$dkilo'";
	                $resultkelas    = mysql_query($querykelas) or die(mysql_error());
	                $datakelas      = mysql_fetch_array($resultkelas);

	                $ymohon         = $datakelas['kilometer'];

                	echo $ymohon; 	
					?>
			      </div>
			      <br>
			        </div>

			</div>
			</div>
			</div>
			</div>
			</div>
			</div>

			<div class="panel panel-default">
			<div class="panel-heading">B) MAKLUMAT PEMOHONAN</div>
			<div class="panel-body">
			<div class="row">
			  <div class="col-lg-12">
			    <div class="form-group">
			      <div class="col-lg-4">Nama :</div>
			      <div class="col-lg-6"><!-- <label for="fnama">:</label> -->
			        <?php echo $spnama; ?>
		          </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">No K/P : </div>
			      <div class="col-lg-6"><!-- <label for="fnokp">:</label> -->

			        <?php echo $spic; ?>
		          </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Jantina : </div>
			      <div class="col-lg-6">
			        
			        <div name="fjantina" id="fjantina"><!-- <label for="fjantina">:</label> -->
					 <?php

						$querykelas     = "SELECT * FROM  tbl_jantina WHERE id = '$djantina'";
		                $resultkelas    = mysql_query($querykelas) or die(mysql_error());
		                $datakelas      = mysql_fetch_array($resultkelas);

		                $ymohon         = $datakelas['nama'];

		                echo $ymohon;
					?>
		            </div>
			      </div>
			      <br>
			      <br>
		        </div>
			    <div class="form-group">
			      <div class="col-lg-4">Status Perkahwinan : </div>
			      <div class="col-lg-6">
			        <p>
			      
                      <div name="fstatusperkahwinan" id="fstatusperkahwinan"><!-- <label for="fstatusperkahwinan">:</label> -->
						<?php

							$querykelas     = "SELECT * FROM  tbl_statusperkahwinan WHERE p_id = '$dstatusperkahwinan'";
			                $resultkelas    = mysql_query($querykelas) or die(mysql_error());
			                $datakelas      = mysql_fetch_array($resultkelas);

			                $ymohon         = $datakelas['p_nama'];

			                echo $ymohon;
							

						?> 
                      </div>
			        </p>
			      </div>
		        </div>
			    <p>&nbsp;</p>
			    <p><br>
		        </p>

		        
			    <br>

			    <div class="form-group">
			      <div class="col-lg-4">No. Telefon :</div>
			      <div class="col-lg-6">
			        <p>
			         <!--  <label for="ftelrumah">:</label> --> <?php echo $dtelrumah ?>
                      <!-- <input type="text" name="ftelrumah" id="ftelrumah" value=""> -->
			        -(Rumah)</p>
			        <p>
			          <!-- <label for="ftelhp">:</label> --> <?php echo $dtelhp ?>
                      <!-- <input type="text" name="ftelhp" id=ftelhp value=""> -->
-(H/P)</p>
			        <p>
			         <!--  <label for="ftelpejabat">:</label> --> <?php echo $dtelpejabat ?>
                      <!-- <input type="text" name="ftelpejabat" id="ftelpejabat" value=""> -->
-(Pejabat)</p>
		          </div>
			      <p><br>
		          </p>
		        </div>

		      </div>
			  <br><br>
		</div>
      	</div>
		</div>
			
			<div class="panel panel-default">
			<div class="panel-heading">C) MAKLUMAT PEKERJAAN PEMOHONAN</div>
			<div class="panel-body">
			<div class="row">
			  <div class="col-lg-12">
			     <div class="form-group">
			      <div class="col-lg-4">Kategori Jawatan :</div>
			      <div class="col-lg-6">
			      	<p> <div name="fkatjawatan" id="fkatjawatan"><!-- <label for="fkatjawatan">:</label> -->
			      		 
			        <?php

			        $querykelas     = "SELECT * FROM  tbl_katjawatan WHERE t_id = '$dkatjawatan'";
	                $resultkelas    = mysql_query($querykelas) or die(mysql_error());
	                $datakelas      = mysql_fetch_array($resultkelas);

	                $ymohon         = $datakelas['t_kategori'];

	                echo $ymohon;
						   
					?>

			  </div></div>

			  		</p>
			  	    <div class="form-group">
			      <div class="col-lg-4">Jawatan :</div>
			      <div class="col-lg-6">
			        <p><div name="fjawatan" id="fjawatan"><!-- <label for="fjawatan">:</label> -->
			          
						   <?php

						   	$querykelas     = "SELECT * FROM  tablejawatan WHERE id = '$djawatan'";
			                $resultkelas    = mysql_query($querykelas) or die(mysql_error());
			                $datakelas      = mysql_fetch_array($resultkelas);

			                $ymohon         = $datakelas['jawatan'];

			                echo $ymohon;
						   
						  ?>
                      </div>
			        </p>
			      </div>
		        </div>
			      <!-- <br> -->

			      
		    
		</div>
		    </div>
		</div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">
			        <label>Tempat Bertugas :</label></div>
			      <div class="col-lg-6"><!-- <label for="ftbertugas">:</label> -->
			      	<p><div name="ftbertugas" id="ftbertugas">
			      		<?php

			      			// $querykelas     = "SELECT * FROM  tablejabatan WHERE id = '$sdjabatan'";
			         //        $resultkelas    = mysql_query($querykelas) or die(mysql_error());
			         //        $datakelas      = mysql_fetch_array($resultkelas);

			         //        $ymohon         = $datakelas['jabatan'];

			                echo $sdjabatan;


							// $query_tbertugas = "select * from tablejabatan ";
							// $result_tbertugas = mysql_query($query_tbertugas) or die(mysql_error());
							
							// echo "<select name=ftbertugas id=ftbertugas class=form-control>";
							// echo "<option value='$sjabatan'>$sdjabatan</option>";
							
							// while($dataresult = mysql_fetch_array($result_tbertugas))
							// {
							// 	$kjabatan = $dataresult['kodjabatan'];
							// 	$xxjabatan = $dataresult['jabatan'];
							// 	echo "<option value = $kjabatan>$xxjabatan</option>";
							// }
							// echo "</select>";		   
						?>
			      	</p>
			       </div>
			      </div>
		 

				<br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">
			        <label>Unit :</label></div>
			      <div class="col-lg-6">
			        <!-- <label for="unitp">:</label> -->
						<?php
							
							$querykelas     = "SELECT * FROM  tableunit WHERE kodunit = '$dunitp'";
			                $resultkelas    = mysql_query($querykelas) or die(mysql_error());
			                $datakelas      = mysql_fetch_array($resultkelas);

			                $ymohon         = $datakelas['unit'];

			                echo $ymohon;

							// $query_unit = "select * from tableunit ";
							// $result_unit = mysql_query($query_unit) or die(mysql_error());
							
							// echo "<select name=funitp id=funitp class=form-control>";
							// echo "<option value='$sunit'>$sdunit</option>";
							
							// while($dataresult = mysql_fetch_array($result_unit))
							// {
							// 	$ppunit = $dataresult['kodunit'];
							// 	$xxunit = $dataresult['unit'];
							// 	echo "<option value = $ppunit>$xxunit</option>";
							// }
							// echo "</select>";		   
						?>
			      </div>
		        </div>

			    <p>&nbsp;</p>
			    <p><br>
		        </p>

		        
			    <br>

			    <div class="form-group">
			      <div class="col-lg-4">Tarikh Mula Berkhidmat :</div>
			      <div class="col-lg-6">
			        <!-- <label for="ftrkberkhidmat">:</label> -->
			       <?php echo $dtrkberkhidmat; ?>
                    <!-- <input type="date" name="ftrkberkhidmat" id="ftrkberkhidmat" value=""> -->
			      <p><font color="#FF0000"><b><?php echo "Markah: $dmtrkberkhidmat ";?></b></font><p>
			      </div> 
			      <br>
			      <br>
		        </div>


			    <div class="form-group">
			      <div class="col-lg-4">Waktu Bertugas :</div>
			      <div class="col-lg-6"><div name="fofficehour" id="fofficehour"><!-- <label for="fofficehour">:</label> -->
			        
						   <?php

						   	$querykelas     = "SELECT * FROM  tbl_waktubertugas WHERE id = '$dofficehour'";
			                $resultkelas    = mysql_query($querykelas) or die(mysql_error());
			                $datakelas      = mysql_fetch_array($resultkelas);

			                $ymohon         = $datakelas['nama'];

			                echo $ymohon;

                                    // $queryofficehour = "select * from tbl_waktubertugas";
                                    // $resultofficehour = mysql_query($queryofficehour) or die (mysql_error());

                                    // echo "<select name=fofficehour id=fofficehour class=form-control>";
                                    // echo "<option value=$dofficehour>$sdbertugasdb</option>";

                                    // while($dataofficehour = mysql_fetch_array($resultofficehour))
                                    // {
                                    //     echo "<option value =$dataofficehour[id]>$dataofficehour[nama]</option>";
                                    //  }
                                    //  echo "</select>";
						  ?>
                      </div> <font color="#FF0000"><b><?php echo "Markah: $dmofficehour"; ?></b></font>
			     
			      </div>
		        </div>
			    <br>
			    <div class="form-group"><br>
		        </div>
		      </div>
			  <br><br>
			</div>
	</div>

		<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading">D) MAKLUMAT KELUARGA PEMOHON</div>
			<div class="panel-body">
			<div class="row">
			  <div class="col-lg-12">
			    <div class="form-group">
			      <div class="col-lg-4">Nama Suami / Isteri :</div>
			      <div class="col-lg-6">
			        <!-- <label for="fnamapasangan">:</label> --><?php echo $dnamapasangan ?>
			        <!-- <input type="text" name="fnamapasangan" id="fnamapasangan" size="70" value=""> -->
		          </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">
			        <label>No.K/P :</label>
		          </div>
			      <div class="col-lg-6">
			        <!-- <label for="fnokppasangan">:</label> --><?php echo $dnokppasangan ?>
			        <!-- <input type="text" name="fnokppasangan" id="fnokppasangan" value=""> -->
		          </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			    	<div class="col-lg-4">
			    		<label>Kategori Keluarga :</label>
			    	</div>
			    	<div class="col-lg-6"><div name="fkatkeluarga" id="fkatkeluarga"><!-- <label for="fkatkeluarga">:</label> -->
			       
						   <?php

						   	$querykelas     = "SELECT * FROM  tblkeluargapp WHERE k_id = '$dkeluarga'";
			                $resultkelas    = mysql_query($querykelas) or die(mysql_error());
			                $datakelas      = mysql_fetch_array($resultkelas);

			                $ymohon         = $datakelas['k_nama'];

			                echo $ymohon;

						  ?>
                      </div><font color="#FF0000"><b><?php echo "Markah: $dmkeluarga"; ?></b></font><p>
			    </div>
			</div>
			<br>
			<br>
			<br>
			<!-- <br> -->
			    <div class="form-group">
			      <div class="col-lg-4">Jawatan :</div>
			      <div class="col-lg-6">
			        <!-- <label for="fjawatanpasangan">:</label> --><?php echo $djawatanpasangan ?>
                    <!-- <input type="text" name="fjawatanpasangan" id="fjawatanpasangan" size="70" value=""> -->
			      </div>
			      <br>
			      <br>
		        </div>
			    <div class="form-group">
			      <div class="col-lg-4">Tempat Bertugas :</div>
			      <div class="col-lg-6">
			        <!-- <label for="ftbpasangan">:</label> --><?php echo $dtbpasangan ?>
			        <!-- <input type="text" name="ftbpasangan" id="ftbpasangan" size="70" value=""> -->
			      </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Waktu Bertugas :</div>
			      <div class="col-lg-6"><div name="fwbpasangan" id="fwbpasangan"><!-- <label for="fwbpasangan">:</label> -->
			       
						<?php

							$querykelas     = "SELECT * FROM  tbl_waktubertugas WHERE id = '$dwbpasangan'";
			                $resultkelas    = mysql_query($querykelas) or die(mysql_error());
			                $datakelas      = mysql_fetch_array($resultkelas);

			                $ymohon         = $datakelas['nama'];

			                echo $ymohon;

                            ?>
                    </div>
			      </div>
			      <br>
		        </div>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Bilangan Anak :</div>
			      <div class="col-lg-6"><div name="fbilanak" id="fbilanak"><!-- <label for="fbilanak">:</label>
 -->
						<?php

							$querykelas     = "SELECT * FROM  tbl_bilanak WHERE id = '$dbilanak'";
			                $resultkelas    = mysql_query($querykelas) or die(mysql_error());
			                $datakelas      = mysql_fetch_array($resultkelas);

			                $ymohon         = $datakelas['bilangan'];

			                echo $ymohon;

                             
					  ?>
                    </div><font color="#FF0000"><b><?php echo "Markah: $dmbilanak"; ?></b></font><p>
			      </div>
			      <br>
		        </div>
		      </div>
			  <br><br>
		</div>
      		</div>
      		</div>	
      		</p>
      		</div>

      	<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading"></div>

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
<!-- <div class="col-lg-12">
  <div class="panel panel-default">
        <div class="panel-heading">E) SEBAB - SEBAB MEMOHON RUMAH </div>
    <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <div class="col-lg-10">Saya memohon menduduki Rumah Kerajaan kerana; </div>
              </div>
              <div class="col-lg-10">
                <p>
                	<?php echo $dsebabmohon ?>
                   <input type="text" name="fsebabmohon" id="fsebabmohon" size="80" value=""> 
                </p>
              </div>
              <p><br>
              </p>
              <p><br>
              </p> -->
<!--              <div class="form-group">
                <div class="col-lg-10">
                  <p>Saya mengaku bahawa segala keterangan yang diberikaan di atas adalah benar. Sekiranya keterangan saya adalah palsu, pihak pengurusan berhak mengambil sebarang tindakan ke atas saya. Saya juga *bersedia / tidak bersedia untuk bertugas jika dipanggil pada bila-bila masa diperlukan </p>
                </div>
              </div>
              <p>&nbsp;</p>
              <p><br>
              </p>
				<br>
              <div class="col-lg-4">.......................................</div>
              <p><br>
              </p>
              <div class="form-group">
                <div class="col-lg-4">(Tandatangan Pemohon)</div>
              </div>
              <br>
              <br>
              <div class="form-group">
                <div class="col-lg-10">Dengan ini, saya mengesahkan bahawa segala butiran di atas adalah benar, saya menyokong permohonan ini kerana (sila berikan ulasan):</div>
                <br>
              </div>
              <div class="form-group">
                <input name="fpengesahan" type="text" id="fpengesahan" size="80" value="<?php echo $dpengesahan ?>">
                <br>
              </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="form-group"></div>
          </div>
		<br>
		 <div class="col-lg-4">.......................................</div>
              <p><br>
              </p>
              <div class="form-group">
                <div class="col-lg-4">(Tandatangan & cop Ketua Unit/Jabatan)</div>
              </div>
              <br>
              <br>
 
    </div>
     </div>-->
 <!-- </div> -->
<!-- .............................untuk kegunaan pejabat..............................-->
 <!-- <div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">UNTUK KEGUNAAN PEJABAT </div>
			        <form name="form1" method="post" action=""> 
			 		<div class="panel-body">
			 		<div class="form-group">
			 			<div class="form-group">
					 <div class="col-lg-4"><font color="#FF0000"><b>Markah terkumpul</b></font></div> need to call tbl_kelas for s_nama 
					 <div class="col-lg-6">
					 <label for="fkelasrumah">:</label> <?php echo $markah ?>
					 -->
				     <!-- <input name="fkelasrumah" type="text" id="fkelasrumah" size="50" 
				     value=" "> -->
					 <!-- </div>
						<br>
					</div>
					<div class="col-lg-4">Permohonan ini</div>
					<div class="col-lg-6"><div name="flulus" id="flulus"><label for="flulus">:</label>
				 	
			        	<?php

			        		// $querykelas     = "SELECT * FROM  tbl_statmohon WHERE m_id = '$dlulus'";
			          //       $resultkelas    = mysql_query($querykelas) or die(mysql_error());
			          //       $datakelas      = mysql_fetch_array($resultkelas);

			          //       $sdstatmohondb         = $datakelas['m_nama'];

			          //       echo $sdstatmohondb;				  
			        	?> 
			   
			      
				 	</div></div>
				    
				     
	</div></div></div> -->

<!-- 	 <div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">

			<div class="panel-heading">KEMASKINI PENGHUNI </div>
		 	
			 <div class="panel-body">
			 	<div class="form-group">
					<div class="col-lg-4">Tarikh masuk rumah</div>
					<div class="col-lg-6">
				 	<label for="fmasuk">:</label>
			        <input type="date" name="fmasuk" id="fmasuk" value="<?php echo $dmasuk; ?>">
			 	</div>
			   
			   
			     <div class="form-group">
				 <div class="col-lg-4">Tarikh keluar rumah</div>
				 <div class="col-lg-6">
				 <label for="fkeluar">:</label>
			     <input type="date" name="fkeluar" id="fkeluar" value="<?php echo $dkeluar; ?>">
				 </div>
				<br>
			</div>

			<div class="form-group">
				 <div class="col-lg-4">Tarikh terima deposit</div>
				 <div class="col-lg-6">
				 <label for="fterima">:</label>
			     <input type="date" name="fterima" id="fterima" value="<?php echo $dterima; ?>">
				 </div>
				<br>
			</div>

			<div class="form-group">
				 <div class="col-lg-4">Jumlah deposit</div> 
				 <div class="col-lg-6">
				 <label for="fjumlah">:</label> <?php echo $kelasdeposit; ?>
			     
				 </div>
				<br>
			</div>

			<div class="form-group">
				 <div class="col-lg-4">No resit</div>
				 <div class="col-lg-6">
				 <label for="fresit">:</label>
			     <input type="text
			     " name="fresit" id="fresit" value="<?php echo $dresit; ?>">
				 </div>
				<br>
			</div>
		    
    	</div>
	</div>
</div>

</div></div> -->




	<span class="col-lg-6" align="right">
     <!-- <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan"> -->
     <input type="submit" class="btn btn-primary" name="submit" id="submit" value="KEMBALI">
    </span>
    <p></p>
    </form>
    </body>
</html>

<?php
	if((isset($_POST['submit']) == "KEMBALI"))
	{

	printf("<script>  window.location = 'listtolak.php?id=$fid' </script>");
 
	};  
	 
		

		?>
		
<?php



?>


			          