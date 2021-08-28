<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Data Permohonan</title>
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

	//add new
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
			<div class="panel panel-primary">
			<div class="panel-heading"></div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-10">
			<div class="form-group">
		    <div class="col-lg-5">
			<label>Tarikh Memohon :</label></div>
			<div class="col-lg-6">
			  <!-- <label for="ftmohon">:</label> -->
              <input type="date" name="ftmohon" id="ftmohon" class=form-control value="<?php echo $dtmohon; ?>">
              <input type="hidden" name="idstaff" id="idstaff" size="80" rows="3" class=form-control value="<?php echo $idstaff ?>">
			</div>								
			</div>								 
			<br><br>					
			<div class="form-group">
			<div class="col-lg-5">
			<label>Lokasi Kuarters Yang Dipohon :</label></div>
			<div class="col-lg-6">
			  <!-- <label for="flokasimohon">:</label> -->
              <div name="flokasimohon" id="flokasimohon">

				<?php
       
				  	$lokasi_2 = "SELECT * FROM tbllokasi"; //WHERE l_jabatan = '$dlokasimohon'
				  	$query = mysql_query($lokasi_2);
							
                    echo "<select name =flokasimohon id =flokasimohon class=form-control>";
                    echo "<option value = '$dlokasimohon'>$sdlokasidb</option>";
							
                    while($lokasiquery = mysql_fetch_array($query))
                    {
                        echo "<option value = $lokasiquery[l_id]>$lokasiquery[l_nama]</option>";
                    } 
                     echo "</select>";
     // //                echo $lokasi_2;

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
			<div class="panel panel-primary">
			<div class="panel-heading" align="center"><b>A) MAKLUMAT KEDIAMAN PEMOHON</b></div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-10">
				<div class="form-group">
				      <div class="col-lg-5">Alamat tempat tinggal sekarang (* sewa / rumah sendiri / keluarga) :</div>
				      <div class="col-lg-6">
				        <!-- <label for="falamatlama">:</label> -->
				        <input type="text" name="falamatlama" id="falamatlama" size="80" rows="3" class=form-control value="<?php echo $dalamatlama ?>">

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
	                    <input name="falamatsendiri" type="text" id="falamatsendiri" size="50" class=form-control value="<?php echo $dalamatsendiri ?>">
				      </div>
				      <br>
			        </div>
				    <br>
				    <div class="form-group">
				      <div class="col-lg-5">Jarak rumah sendiri ke tempat bertugas :</div>
				      <div class="col-lg-6">
				        <!-- <label for="fjarakrumah">:</label> -->
	                    <input type="text" name="fjarakrumah" id="fjarakrumah" class=form-control value="<?php echo $djarakrumah ?>">
				      </div>
				      <br><br>
			      <div class="col-lg-5"></div>
			      <div class="col-lg-6">
			      	<!-- <label for="kilo">:</label> -->
			      	<?php		

						$querykilo = "SELECT * FROM tbl_kilometer";
					  	$resultkilo = mysql_query($querykilo);
					  	
					  	
								
	                    echo "<select name = fjantina id = fjantina class=form-control>";
	                    echo "<option value = '$kilob'>$sdkilob</option>";
								
	                    while($janquery = mysql_fetch_array($resultkilo))
	                    {
	                        $idjantina = $janquery['idkilo'];
                            $xxjantina = $janquery['kilometer'];
                            echo "<option value =$idjantina>$xxjantina</option>";
	                    } 
	                     echo "</select>";
   
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

			<div class="panel panel-primary">
			<div class="panel-heading" align="center"><b>B) MAKLUMAT PEMOHON</b></div>
			<div class="panel-body">
			<div class="row">
			  <div class="col-lg-12">
			    <div class="form-group">
			      <div class="col-lg-4">Nama :</div>
			      <div class="col-lg-6">
			        <!-- <label for="fnama">:</label> -->
			        <input type="text" name="fnama" id="fnama" size="70" class=form-control value="<?php echo $spnama; ?>">
		          </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">No K/P :</div>
			      <div class="col-lg-6">
			        <!-- <label for="fnokp">:</label> -->
			        <input type="text" name="fnokp" id="fnokp" class=form-control value="<?php echo $spic; ?>">
		          </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Jantina :</div>
			      <div class="col-lg-6">
			        <!-- <label for="fjantina">:</label> -->
			        <div name="fjantina" id="fjantina">
					 <?php

					 	$jantina_2 = "SELECT * FROM tbl_jantina";
					  	$query = mysql_query($jantina_2);
					  	
					  	
								
	                    echo "<select name = fjantina id = fjantina class=form-control>";
	                    echo "<option value = '$djantina'>$sdjantinadb</option>";
								
	                    while($janquery = mysql_fetch_array($query))
	                    {
	                        $idjantina = $janquery['id'];
                            $xxjantina = $janquery['nama'];
                            echo "<option value =$idjantina>$xxjantina</option>";
	                    } 
	                     echo "</select>";

					?>
		            </div>
			      </div>
			      <br>
			      <br>
		        </div>
			    <div class="form-group">
			      <div class="col-lg-4">Status Perkahwinan :</div>
			      <div class="col-lg-6">
			        <p>
			          <!-- <label for="fstatusperkahwinan">:</label> -->
                      <div name="fstatusperkahwinan" id="fstatusperkahwinan">
						<?php
								$sp_2 = "SELECT * FROM tbl_statusperkahwinan";
							  	$query = mysql_query($sp_2);
							  	
							  	
										
			                    echo "<select name = fstatusperkahwinan id = fstatusperkahwinan class=form-control>";
			                    echo "<option value = '$dstatusperkahwinan'>$sddb</option>";
										
			                    while($spquery = mysql_fetch_array($query))
			                    {
			                        echo "<option value = $spquery[p_id]>$spquery[p_nama]</option>";
			                    } 
			                     echo "</select>";

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
			          <!-- <label for="ftelrumah">:</label> -->
                      <input type="text" name="ftelrumah" id="ftelrumah" class=form-control value="<?php echo $dtelrumah ?>">(Rumah)</p>
			        <p>
			          <!-- <label for="ftelhp">:</label> -->
                      <input type="text" name="ftelhp" id=ftelhp class=form-control value="<?php echo $dtelhp ?>">(H/P)</p>
			        <p>
			          <!-- <label for="ftelpejabat">:</label> -->
                      <input type="text" name="ftelpejabat" id="ftelpejabat" class=form-control value="<?php echo $dtelpejabat ?>">(Pejabat)</p>
		          </div>
			      <p><br>
		          </p>
		        </div>

		      </div>
			  <br><br>
		</div>
      	</div>
		</div>
			
			<div class="panel panel-primary">
			<div class="panel-heading" align="center"><b>C) MAKLUMAT PEKERJAAN PEMOHON</b></div>
			<div class="panel-body">
			<div class="row">
			  <div class="col-lg-12">
			     <div class="form-group">
			      <div class="col-lg-4">Kategori Jawatan :</div>
			      <div class="col-lg-6">
			      	<p>
			      		 <!-- <label for="fkatjawatan">:</label> -->
			        <?php
						
								$query_kj = "SELECT * FROM tbl_katjawatan";
							  	$result_kj  = mysql_query($query_kj);
							  	
							  	
										
			                    echo "<select name = fkatjawatan id = fkatjawatan class=form-control>";
			                    echo "<option value = '$dkatjawatan'>$sdkatjawatandb</option>";
										
			                     while($kj_2query = mysql_fetch_array($result_kj))
			                    {
			                        $idkatjawatan = $kj_2query['t_id'];
                            		$xxkatjawatan = $kj_2query['t_kategori'];
                            		echo "<option value =$idkatjawatan>$xxkatjawatan</option>";
			                    } 
			                     echo "</select>";
	   
					?>

			  </div>

			  		</p>
			  	    <div class="form-group">
			      <div class="col-lg-4">Jawatan :</div>
			      <div class="col-lg-6">
			        <p>
			          <!-- <label for="fjawatan">:</label> -->
                      <div name="fjawatan" id="fjawatan">
						   <?php
                                    $query_jawatan = "select * from tablejawatan";
                                    $result_jawatan = mysql_query($query_jawatan) or die (mysql_error());
                                    // $data_jawatan = mysql_fetch_array($result_jawatan);

                                    // $result_jawatan = $data_jawatan['jawatan'];

                                    echo "<select name=fjawatan id=fjawatan class=form-control>";
                                    echo "<option value='$djawatan'>$sdjawatan</option>";

         //                            $query = "select * from tablejawatan order by id ASC";
									// $result = mysql_query($query);

									// echo "<select name=jawatan id=jawatan>";
									// echo "<option value='$jawatan'>$result_jawatan</option>";

                                    
                                    while($datajawatan  = mysql_fetch_array($result_jawatan))
                                    {
                                    	$idjawatan = $datajawatan['id'];
                                    	$xxjawatan = $datajawatan['jawatan'];
                                        echo "<option value =$idjawatan>$xxjawatan</option>";
                                     }
                                     echo "</select>";
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
			      <div class="col-lg-6">
			        <!-- <label for="ftbertugas">:</label> -->
						<?php
							$query_tbertugas = "select * from tablejabatan ";
							$result_tbertugas = mysql_query($query_tbertugas) or die(mysql_error());
							
							echo "<select name=ftbertugas id=ftbertugas class=form-control>";
							echo "<option value='$sjabatan'>$sdjabatan</option>";


							// $result_tbertugas	= $data_tbertugas['jabatan'];

							// $query1 = "select * from tablejabatan order by id ASC";
							// $result1 = mysql_query($query1);

							
							while($dataresult = mysql_fetch_array($result_tbertugas))
							{
								$kjabatan = $dataresult['kodjabatan'];
								$xxjabatan = $dataresult['jabatan'];
								echo "<option value = $kjabatan>$xxjabatan</option>";
							}
							echo "</select>";		   
						?>
			      </div>
		 

				
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">
			        <label>Unit :</label></div>
			      <div class="col-lg-6">
			        <!-- <label for="unitp">:</label> -->
						<?php
							
							$query_unit = "select * from tableunit ";
							$result_unit = mysql_query($query_unit) or die(mysql_error());
							
							echo "<select name=funitp id=funitp class=form-control>";
							echo "<option value='$dunitp'>$sdunit</option>";
							
							while($dataresult = mysql_fetch_array($result_unit))
							{
								$ppunit = $dataresult['kodunit'];
								$xxunit = $dataresult['unit'];
								echo "<option value = $ppunit>$xxunit</option>";
							}
							echo "</select>";		   
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
			        <!-- <?php echo $trkberkhidmat; ?> -->
                    <input type="date" name="ftrkberkhidmat" id="ftrkberkhidmat" class=form-control value="<?php echo $dtrkberkhidmat; ?>">
			      <p><font color="#FF0000"><b><?php echo "Markah: $dmtrkberkhidmat ";?></b></font><p></div> 
			      <br>
			      <br>
		        </div>


			    <div class="form-group">
			      <div class="col-lg-4">Waktu Bertugas :</div>
			      <div class="col-lg-6">
			        
			          <!-- <label for="fofficehour">:</label> -->
                      <div name="fofficehour" id="fofficehour">
						   <?php
                                    $queryofficehour = "select * from tbl_waktubertugas";
                                    $resultofficehour = mysql_query($queryofficehour) or die (mysql_error());

                                    echo "<select name=fofficehour id=fofficehour class=form-control>";
                                    echo "<option value=$dofficehour>$sdbertugasdb</option>";

                                    while($dataofficehour = mysql_fetch_array($resultofficehour))
                                    {
                                        echo "<option value =$dataofficehour[id]>$dataofficehour[nama]</option>";
                                     }
                                     echo "</select>";
						  ?>
                      </div> <font color="#FF0000"><b><?php echo "Markah: $dmofficehour"; ?></b></font><p>
			        
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
			<div class="panel panel-primary">
			<div class="panel-heading" align="center"><b>D) MAKLUMAT KELUARGA PEMOHON</b></div>
			<div class="panel-body">
			<div class="row">
			  <div class="col-lg-12">
			    <div class="form-group">
			      <div class="col-lg-4">Nama Suami / Isteri :</div>
			      <div class="col-lg-6">
			        <!-- <label for="fnamapasangan">:</label> -->
			        <input type="text" name="fnamapasangan" id="fnamapasangan" size="70"class=form-control value="<?php echo $dnamapasangan ?>">
		          </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">
			        <label>No.K/P :</label>
		          </div>
			      <div class="col-lg-6">
			        <!-- <label for="fnokppasangan">:</label> -->
			        <input type="text" name="fnokppasangan" id="fnokppasangan" class=form-control value="<?php echo $dnokppasangan ?>">
		          </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			    	<div class="col-lg-4">
			    		<label>Kategori Keluarga :</label>
			    	</div>
			    	<div class="col-lg-6">
			        <!-- <label for="fkatkeluarga">:</label> -->
			        <div name="fkatkeluarga" id="fkatkeluarga">
						   <?php
                                    $querykatkeluarga = "select * from tblkeluargapp";
                                    $resultkatkeluarga = mysql_query($querykatkeluarga) or die (mysql_error());

                                    echo "<select name=fkatkeluarga id=fkatkeluarga class=form-control>";
                                    echo "<option value=$dkeluarga>$sdkeluargadb</option>";

                                    while($datakatkeluarga = mysql_fetch_array($resultkatkeluarga))
                                    {
                                        echo "<option value =$datakatkeluarga[k_id]>$datakatkeluarga[k_nama]</option>";
                                     }
                                     echo "</select>";
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
			        <!-- <label for="fjawatanpasangan">:</label> -->
                    <input type="text" name="fjawatanpasangan" id="fjawatanpasangan" size="70" class=form-control value="<?php echo $djawatanpasangan ?>">
			      </div>
			      <br>
			      <br>
		        </div>
			    <div class="form-group">
			      <div class="col-lg-4">Tempat Bertugas :</div>
			      <div class="col-lg-6">
			        <!-- <label for="ftbpasangan">:</label> -->
			        <input type="text" name="ftbpasangan" id="ftbpasangan" size="70" class=form-control value="<?php echo $dtbpasangan ?>">
			      </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Waktu Bertugas :</div>
			      <div class="col-lg-6">
			        <!-- <label for="fwbpasangan">:</label> -->
                    <div name="fwbpasangan" id="fwbpasangan">
						<?php
                                    $queryofficehour2 = "select * from tbl_waktubertugas";
                                    $resultofficehour2 = mysql_query($queryofficehour2) or die (mysql_error());

                                    echo "<select name=fwbpasangan id=fwbpasangan class=form-control>";
                                    echo "<option value=$dwbpasangan>$sdbertugasdb</option>";

                                    while($dataofficehour2 = mysql_fetch_array($resultofficehour2))
                                    {
                                        echo "<option value =$dataofficehour2[id]>$dataofficehour2[nama]</option>";
                                     }
                                     echo "</select>";
						  ?>
                    </div>
			      </div>
			      <br>
		        </div>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Bilangan Anak :</div>
			      <div class="col-lg-6">
			        <!-- <label for="fbilanak">:</label> -->
					<div name="fbilanak" id="fbilanak">
						<?php
                                $query_bilanak = "select * from tbl_bilanak";
                                $result_bilanak = mysql_query($query_bilanak) or die (mysql_error());

                                echo "<select name=fbilanak id=fbilanak class=form-control>";
                                echo "<option value=$dbilanak>$sdbilanakdb</option>";

                                while($bilanakdata = mysql_fetch_array($result_bilanak))
                                {
                                    echo "<option value =$bilanakdata[id]>$bilanakdata[bilangan]</option>";
                                 }
                                 echo "</select>";  
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

      		<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-primary">
			<div class="panel-heading" align="center"><b>E) SEBAB - SEBAB MEMOHON RUMAH </b></div>
			<div class="panel-body">
				<div class="row">
            	<div class="col-lg-12">
              	<div class="form-group">
                <div class="col-lg-10">Saya memohon menduduki Rumah Kerajaan kerana; </div>
              	</div>
              	<div class="col-lg-10">
                <p>
                  <input type="text" name="fsebabmohon" id="fsebabmohon" size="80" class="form-control" value="<?php echo $dsebabmohon ?>">
                </p>
            </div>
        </div>
    </div>
			</div>	
			</div>
      		</div>
      		</div>

    <!--.............................untuk kegunaan pejabat..............................-->
 <div class="row">
			<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading" align="center"><b>UNTUK KEGUNAAN PEJABAT </b></div>
			        <!--  <form name="form1" method="post" action=""> -->
			 		<div class="panel-body">
			 		<div class="form-group">
			 			<div class="form-group">
					 <div class="col-lg-4"><font color="#FF0000"><b>Markah terkumpul :</b></font></div> <!-- need to call tbl_kelas for s_nama -->
					 <div class="col-lg-6">
					 <!-- <label for="fkelasrumah">:</label> -->
					
				     <input name="fkelasrumah" type="text" id="fkelasrumah" size="50" class=form-control 
				     value=" <?php echo $markah ?>">
					 </div>
						<br>
					</div>
					<div class="col-lg-4">Permohonan ini :</div>
					<div class="col-lg-6">
				 	<!-- <label for="flulus">:</label> -->
			        	<?php
			        		echo "<select name=flulus id=flulus class=form-control>";
                            echo "<option value='$dlulus'>$sdstatmohondb</option>";

			        		$query_flulus = "select * from tbl_statmohon";
							$result_flulus = mysql_query($query_flulus) or die (mysql_error());

							while($data_flulus = mysql_fetch_array($result_flulus))
							{
								$lid = $data_flulus['m_id'];
								$lnama = $data_flulus['m_nama'];
								echo "<option value = $lid>$lnama</option>";
							}
								echo "</select>";
 
					  
			        	?> 
			   
			      
				 	</div>
				    <!-- <label for="lulus"></label> -->
				   	<!-- <div class="panel-body"> -->
				     <div class="form-group">
					 <div class="col-lg-4">Kelas rumah yang layak diduduki :</div> <!-- need to call tbl_kelas for s_nama -->
					 <div class="col-lg-6">
					 <!-- <label for="fkelasrumah">:</label> -->
				     <!--<input name="fkelasrumah" type="text" id="fkelasrumah" size="50" 
				     value="<?php //echo $dkelasrumah ?>" > -->
                     
                     
                     
                     		<?php
			        		echo "<select name=fkelasrumah id=fkelasrumah class=form-control>";
                            echo "<option value='$dkelasrumah'>$skelasnama - $skelasdeposit</option>";

			        		$query_fkelas = "select * from tbl_kelas";
							$result_fkelas = mysql_query($query_fkelas) or die (mysql_error());

							while($data_fkelas = mysql_fetch_array($result_fkelas))
							{
								$sid = $data_fkelas['s_id'];
								$snama = $data_fkelas['s_nama'];
								$sdeposit = $data_fkelas['s_deposit'];
								
								echo "<option value = $sid>$snama - $sdeposit</option>";
							}
								echo "</select>";
 							// echo $query_falamattawaran;
					  
			        	?> 
                        
                        
					 </div>
						<br>
					</div>

					
						<br>
				     <div class="form-group">
					 <div class="col-lg-4">Pemohon ditawarkan menduduki rumah di alamat :</div>
					 <div class="col-lg-6">
					 <!-- <label for="falamattawaran">:</label> -->
				     <!-- <input name="falamattawaran" type="text" id="falamattawaran" size="50" value="<?php echo $dalamattawaran ?>"> -->
				     <?php
			        		echo "<select name=falamattawaran id=falamattawaran class=form-control >";
                            echo "<option value='$dlulus'>$sdalamatdb</option>";

			        		$query_falamattawaran = "select * from tblalamat WHERE a_buka = 2"; //WHERE a_jabatan = '$dtbertugas' && 
							$result_falamattawaran = mysql_query($query_falamattawaran) or die (mysql_error());

							while($data_falamattawaran = mysql_fetch_array($result_falamattawaran))
							{
								$aid = $data_falamattawaran['a_id'];
								$anama = $data_falamattawaran['a_nama'];
								echo "<option value = $aid>$anama</option>";
							}
								echo "</select>";
 							// echo $query_falamattawaran;
					  
			        	?> 
					 </div>
						<br>
					</div>
			   
				</div>
			</div>
		</div>
	</div>
</div>

 <div class="row">
			<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading" align="center"><b>KEPUTUSAN BAHAGIAN PEJABAT </b></div>
				<div class="panel-body">
					<!-- <div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default"> -->

			<!-- <div class="panel-heading">KEMASKINI PENGHUNI </div> -->
		 	
			 <div class="panel-body">
			 	<div class="form-group">
					<div class="col-lg-4">Tarikh masuk rumah :</div>
					<div class="col-lg-6">
				 	<!-- <label for="fmasuk">:</label> -->
			        <input type="date" name="fmasuk" id="fmasuk" class="form-control" value="<?php echo $dmasuk; ?>">
			 	</div>
			    
			   
			     <div class="form-group">
				 <div class="col-lg-4">Tarikh keluar rumah :</div>
				 <div class="col-lg-6">
				 <!-- <label for="fkeluar">:</label> -->
			     <input type="date" name="fkeluar" id="fkeluar" class="form-control" value="<?php echo $dkeluar; ?>">
				 </div>
				<br>
			</div>

			<div class="form-group">
				 <div class="col-lg-4">Tarikh terima deposit :</div>
				 <div class="col-lg-6">
				 <!-- <label for="fterima">:</label> -->
			     <input type="date" name="fterima" id="fterima" class="form-control" value="<?php echo $dterima; ?>">
				 </div>
				<br>
			</div>

			<div class="form-group">
				 <div class="col-lg-4">Jumlah deposit :</div> 
				 <div class="col-lg-6">
				 <!-- <label for="fjumlah">:</label> -->
			     <input type="text" name="fjumlah" id="fjumlah" class="form-control" value="<?php echo $kelasdeposit; ?>" >
				 </div>
				<br>
			</div>

			<div class="form-group">
				 <div class="col-lg-4">No resit :</div>
				 <div class="col-lg-6">
				 <!-- <label for="fresit">:</label> -->
			     <input type="text
			     " name="fresit" id="fresit" class="form-control" value="<?php echo $dresit; ?>">
				 </div>
				<br>
			</div>
		    
    	</div>
	</div>
<!-- </div>

</div>
</div> --> 
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





	<span class="col-lg-6" align="right">
     <input type="submit" class="btn btn-primary" name="submit" id="submit" value="KEMASKINI">
    </span>
    <p></p>
    </form>
    </body>
</html>

<?php
	if((isset($_POST['submit']) == "KEMASKINI"))
	{

		$xtmohon			= $_POST['ftmohon'];
		$xlokasimohon		= $_POST['flokasimohon'];
		// $id					= $_POST['nokp'];
		// $nama				= $_POST['nama'];
		$xjantina			= $_POST['fjantina'];
		$xstatusperkahwinan	= $_POST['fstatusperkahwinan'];
		$xtelrumah			= $_POST['ftelrumah'];
		$xtelhp				= $_POST['ftelhp'];
		$xtelpejabat		= $_POST['ftelpejabat'];

		$xjawatan			= $_POST['fjawatan'];
		$xkatjawatan        = $_POST['fkatjawatan'];
		$xtbertugas			= $_POST['ftbertugas'];
		$xunitp				= $_POST['funitp'];
		$xtrkberkhidmat		= $_POST['ftrkberkhidmat'];
		$xofficehour		= $_POST['fofficehour'];

		$xnamapasangan		= $_POST['fnamapasangan'];
		$xnokppasangan		= $_POST['fnokppasangan'];
		$xkeluarga 			= $_POST['fkatkeluarga'];
		$xjawatanpasangan	= $_POST['fjawatanpasangan'];
		$xtbpasangan		= $_POST['ftbpasangan'];
		$xwbpasangan		= $_POST['fwbpasangan'];
		$xbilanak			= $_POST['fbilanak'];

		$xalamatlama		= $_POST['falamatlama'];
		$xcheckbox1			= isset($_POST['fcheckbox1'])?1:0;
		$xcheckbox2			= isset($_POST['fcheckbox2'])?1:0;
		$xcheckbox3			= isset($_POST['fcheckbox3'])?1:0;
		$xalamatsendiri		= $_POST['falamatsendiri'];
		$xjarakrumah		= $_POST['fjarakrumah'];

		$xsebabmohon		= $_POST['fsebabmohon'];
		// $xpengesahan		= $_POST['fpengesahan'];
		// $kategoripemohon    = '2';

		$xflulus 			= $_POST['flulus'];
		$xkelasrumah		= $_POST['fkelasrumah'];
		$xalamattawaran     = $_POST['falamattawaran'];
		//$pemohon			= $_POST['fpemohon']; 

		$xmasuk 			= $_POST['fmasuk'];
		$xkeluar 			= $_POST['fkeluar'];
		$xterima 			= $_POST['fterima'];
		$xjumlah 			= $_POST['fjumlah'];
		$xresit 			= $_POST['fresit'];

		$idstaff 			= $_POST['idstaff'];


		

		$queryupdate = "UPDATE tbl_pemohonan SET
		p_tarikhmohon	  	=	'".mysql_real_escape_string($xtmohon)."',
		p_lokasi	  		=	'".mysql_real_escape_string($xlokasimohon)."',
		p_jantina			=	'".mysql_real_escape_string($xjantina)."',
		p_statusperkahwinan	=	'".mysql_real_escape_string($xstatusperkahwinan)."',
		p_telrumah			=	'".mysql_real_escape_string($xtelrumah)."',
		p_telhp				=	'".mysql_real_escape_string($xtelhp)."',
		p_telpejabat		=	'".mysql_real_escape_string($xtelpejabat)."',

		p_jawatan			=	'".mysql_real_escape_string($xjawatan)."',
		p_katjawatan		=	'".mysql_real_escape_string($xkatjawatan)."',
		p_jabatan			=	'".mysql_real_escape_string($xtbertugas)."',
		p_unit				=	'".mysql_real_escape_string($xunitp)."',
		p_tmulabertugas		=	'".mysql_real_escape_string($xtrkberkhidmat)."',
		p_waktubertugas		=	'".mysql_real_escape_string($xofficehour)."',

		p_namapasangan		=	'".mysql_real_escape_string($xnamapasangan)."',
		p_icpasangan		=	'".mysql_real_escape_string($xnokppasangan)."',
		p_katkeluarga 		=	'".mysql_real_escape_string($xkeluarga)."',
		p_jawatanpasangan	=	'".mysql_real_escape_string($xjawatanpasangan)."',
		p_tkerjapasangan	=	'".mysql_real_escape_string($xtbpasangan)."',
		p_wbpasangan		=	'".mysql_real_escape_string($xwbpasangan)."',
		p_bilanak			=	'".mysql_real_escape_string($xbilanak)."',

		p_alamatsekarang	=	'".mysql_real_escape_string($xalamatlama)."',
		p_checkbox1			=	'".mysql_real_escape_string($xcheckbox1)."',
		p_checkbox2			=	'".mysql_real_escape_string($xcheckbox2)."',
		p_checkbox3			=	'".mysql_real_escape_string($xcheckbox3)."',
		p_alamatrumahsd		=	'".mysql_real_escape_string($xalamatsendiri)."',
		p_jarakrumah		=	'".mysql_real_escape_string($xjarakrumah)."',

		p_sebabmohon		=	'".mysql_real_escape_string($xsebabmohon)."',

		p_statmohon			= 	'".mysql_real_escape_string($xflulus)."',
		p_kelasrumah 		= 	'".mysql_real_escape_string($xkelasrumah)."',
		p_alamattawaran 	= 	'".mysql_real_escape_string($xalamattawaran)."',
		
		p_tmasuk			=	'".mysql_real_escape_string($xmasuk)."',
		p_tkeluar			=	'".mysql_real_escape_string($xkeluar)."',
		p_terimadepo		=	'".mysql_real_escape_string($xterima)."',
		p_jumlahdepo		=	'".mysql_real_escape_string($xjumlah)."',
		p_resit				=	'".mysql_real_escape_string($xresit)."'
		
		
		where p_id = '".mysql_real_escape_string($fid)."'";
		$resultupdate = mysql_query($queryupdate) or die (mysql_error());

		$queryupdate2 = "UPDATE tblalamat SET a_buka = '1' WHERE a_id = '".mysql_real_escape_string($xalamattawaran)."'";
		$resultupdate2 = mysql_query($queryupdate2) or die (mysql_error());


		$queryupdate3 = "UPDATE tablepengguna SET authlevel = '3' WHERE id = '$idstaff'";
		$resultupdate3 = mysql_query($queryupdate3) or die (mysql_error());


		// if($xflulus == 2){
		// //update status to ppenghuni once click the KEMASKINI button
		// $queryupdate3 = "UPDATE tablepengguna SET kategori = '3', authlevel = '3' WHERE id = '".mysql_real_escape_string($idstaff)."'";
		// $resultupdate3 = mysql_query($queryupdate3) or die (mysql_error());
		// }
		// else ($xflulus ==3){
		// 	$queryupdate3 = "UPDATE tablepengguna SET kategori = '2', authlevel = '2' WHERE id = '".mysql_real_escape_string($idstaff)."'";
		// $resultupdate3 = mysql_query($queryupdate3) or die (mysql_error());
		// }

		?>
		
<?php

		printf("<script> alert('DATA TELAH DIKEMASKINI.'); window.location = 'kemaskinipenghuni4.php?id=$fid' </script>");
 
	};  
	 
		

?>


			          