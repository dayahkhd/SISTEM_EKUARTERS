
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Senarai kemaskini penghuni</title>
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

<style>
	
.blinking{
    animation:blinkingText 1.2s infinite;
}
@keyframes blinkingText{
    0%{     color: red;    }
    49%{    color: red; }
    60%{    color: transparent; }
    99%{    color:transparent;  }
    100%{   color: red;    }
    200%{   color: red;    }
}

</style>


<?php

 	
    //table user
    //s*f tbl user w user= $user
    $query      =   "SELECT * FROM tablepengguna WHERE nokadpengenalan='$user2'";
    $result     =   mysql_query($query) or die(mysql_error());
    $data       =   mysql_fetch_array($result);

    $biluser                  = $data['id'];
    
    $status = 1;

if (! (isset ( $_SESSION ['nokadpengenalan'] ))) 
{
	header ( 'location:../index.php' );
}

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
	$staff 				= $datalast['p_staff'];
	$terima             =$datalast['p_statterima'];

	$xkilo				= $datalast['p_kilometer'];



// echo $querylast;

$query	= "SELECT * FROM tablepengguna WHERE id = '$staff'";
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

// $markahpp2 = $data2['mpp'];

//tbl kelas
$query_kelas = "select * from tbl_kelas where s_id = '$dkelasrumah' || s_nama = '$dkelasrumah'";
$result_kelas=  mysql_query($query_kelas);
$kelasb  = mysql_fetch_array($result_kelas);

$kelasnama = $kelasb['s_nama'];
$kelasdeposit = $kelasb['s_deposit'];

//tbl alamat
$query_alamat = "select * from tblalamat where a_id = '$dalamattawaran'";
$result_alamat=  mysql_query($query_alamat);
$alamatb  = mysql_fetch_array($result_alamat);

$sdalamatdb = $alamatb['a_nama'];

//TABLE KILOMETER
$querykilo  = "SELECT * from tbl_kilometer WHERE idkilo = '$xkilo'";
$resultkilo = mysql_query($querykilo);
$datakilo 	= mysql_fetch_array($resultkilo);

$yidkilo	= $datakilo['idkilo'];
$ykilometer = $datakilo['kilometer'];


		$querynama     = "SELECT * FROM  tablepengguna WHERE nokadpengenalan = '$user2'";
	    $resultnama    = mysql_query($querynama) or die(mysql_error());
	    $datanama     = mysql_fetch_array($resultnama);

	    $rnama   = $datanama ['namapemohon'];

	    ?>
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> SELAMAT DATANG <?php echo  $rnama;?></h4>
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
		    <div class="col-lg-4">Tarikh Memohon</div>
			<div class="col-lg-6">
			  <label for="ftmohon">:</label>
              <!-- <input type="date" name="ftmohon" id="ftmohon" value=" --><?php echo (date("d-m-Y", strtotime($dtmohon))); ?>
			</div>								
			</div>

			<br><br>					
			<div class="form-group">
			<div class="col-lg-4">
			Lokasi Kuarters Yang Dipohon</div>
			<div class="col-lg-8">
			  <label  for="flokasimohon">:</label>  
              
				  <?php
				  echo $sdlokasidb;

                                    
				  	// $lokasi_2 = "SELECT * FROM tbllokasi WHERE l_jabatan = '$dtbertugas'"; //
				  	// $query = mysql_query($lokasi_2);
				  	
				 //  	$qlokasi2 = "select * from tbllokasi";
					// $rlokasi2 = mysql_query($qlokasi2);
							
     //                echo "<select name =flokasimohon id =flokasimohon >";
     //                echo "<option value = '$dlokasimohon'>$sdlokasidb</option>";
							
     //                while($lokasiquery = mysql_fetch_array($rlokasi2))
     //                {
     //                    echo "<option value = $lokasiquery[l_id]>$lokasiquery[l_nama]</option>";
     //                } 
     //                 echo "</select>";
                    // echo $lokasi_2;

  ?> 
             
			</div>
		 </div>	

	 <br><br>								
		<div class="form-group">							
		</div>								
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		 <div class="row">
				<div class="col-lg-12">
				<div class="panel panel-primary">
				<div class="panel-heading" align="center">A) MAKLUMAT KEDIAMAN PEMOHON</div>
				<div class="panel-body">
				<div class="row">
				
				    <div class="form-group">
				      <div class="col-lg-4">Alamat tempat tinggal sekarang (* sewa / rumah sendiri / keluarga)</div>
				      <div class="col-lg-6">
				        <label for="falamatlama">:</label>
				        <!-- <input type="text" name="falamatlama" id="falamatlama" size="50" rows="3" value=" --><?php echo $dalamatlama ?>
			          </div>
			        </div>
				    <br>
				    <br>
				    <div class="form-group">
				      <div class="col-lg-4">
				        <p>Adakah suami / isteri tuan / puan mempunyai rumah sendiri? </p>
				        <p>(ya / tidak)</p>
				        <p>jika ya, sila nyatakan *</p>
				        <p>dan sila nyatakan,</p>
				      </div>
				      <div class="col-lg-6">
				        <p>
						<div>
						<input type="checkbox" name="fcheckbox1" id="fcheckbox1" <?php if (isset($dcheckbox1) && $dcheckbox1 == "1") echo "checked"; ?> value="1" disabled/>
				          <label for="fcheckbox1">Pinjaman Perumahan Kerajaan</label>
				        </p>
						</div>
				        <p>
				          <input type="checkbox" name="fcheckbox2" id="fcheckbox2" <?php if (isset($dcheckbox2) && $dcheckbox2 == "1") echo "checked"; ?> value="1" disabled />
	                      <label for="fcheckbox2">Pinjaman Bank</label></p>
				        <p>
				          <input type="checkbox" name="fcheckbox3" id="fcheckbox3" <?php if (isset($dcheckbox3) && $dcheckbox3 == "1") echo "checked"; ?> value="1" disabled/>
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
				      <div class="col-lg-4">Alamat Rumah</div>
				      <div class="col-lg-6">
				        <label for="falamatsendiri">:</label>
	                   <!--  <input name="falamatsendiri" type="text" id="falamatsendiri" size="50" value=" --><?php echo $dalamatsendiri ?>
				      </div>
				      <br>
			        </div>
				    <br>
				    <div class="form-group">
				       <div class="col-lg-4">Jarak rumah sendiri ke tempat bertugas </div>
			      		<div class="col-lg-8">
			      		<label for="kilo">:</label>
			      		<?php echo $ykilometer ?>
			        </div>
			         <div class="col-lg-4"></div>
				      <div class="col-lg-6">
				        <label for="fjarakrumah">:</label>
	                    <!-- <input type="text" name="fjarakrumah" id="fjarakrumah" value=" --><?php echo $djarakrumah ?>
				      </div>
				     
			      </div>
				</div>
		</div>
	</div>
</div>

		<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
			<div class="panel-heading" align="center">B) MAKLUMAT PEMOHONAN</div>
			<div class="panel-body">
			<div class="row">

			 
			    <div class="form-group">
			      <div class="col-lg-4">Nama</div>
			      <div class="col-lg-8">
			        <label for="fnama">:</label>
			        <!-- <input type="text" name="fnama" id="fnama" size="50" value=" --><?php echo $spnama; ?>
		          </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">No K/P</div>
			      <div class="col-lg-6">
			        <label for="fnokp">:</label>
			       <!--  <input type="text" name="fnokp" id="fnokp" value=" --><?php echo $spic; ?>
		          </div>
		        </div>
			    <br>
			    <br>

			    <div class="form-group">
			      <div class="col-lg-4">Jantina</div>
			      <div class="col-lg-6">
			        <label  name="fjantina" id="fjantina"  for="fjantina">:</label>
			  
					 <?php
					 echo $sdjantinadb

					 	// $jantina_2 = "SELECT * FROM tbl_jantina";
					  // 	$query = mysql_query($jantina_2);
					  			
	      //               echo "<select name = fjantina id = fjantina >";
	      //               echo "<option value = '$djantina'>$sdjantinadb</option>";
								
	      //               while($janquery = mysql_fetch_array($query))
	      //               {
	      //                   $idjantina = $janquery['id'];
       //                      $xxjantina = $janquery['nama'];
       //                      echo "<option value =$idjantina>$xxjantina</option>";
	      //               } 
	      //                echo "</select>";

					?>
		     
			      </div>
			      <br> <br>
		        </div>
			    <div class="form-group">
			      <div class="col-lg-4">Status Perkahwinan</div>
			      <div class="col-lg-6">
			        <p>
			          <label name="fstatusperkahwinan" id="fstatusperkahwinan" for="fstatusperkahwinan">:</label>
                     
						<?php
						echo $sddb

						// 		$sp_2 = "SELECT * FROM tbl_statusperkahwinan";
						// 	  	$query = mysql_query($sp_2);
							  	
							  	
										
			   //                  echo "<select name = fstatusperkahwinan id = fstatusperkahwinan >";
			   //                  echo "<option value = '$dstatusperkahwinan'>$sddb</option>";
										
			   //                  while($spquery = mysql_fetch_array($query))
			   //                  {
			   //                      echo "<option value = $spquery[p_id]>$spquery[p_nama]</option>";
			   //                  } 
			   //                   echo "</select>";

						?> 
              
			        </p>
			      </div>
		        </div>  
			    <br><br>

			    <div class="form-group">
			      <div class="col-lg-4">No. Telefon</div>
			      <div class="col-lg-6">
			        <p>
			          <label for="ftelrumah">:</label>
                     <!--  <input type="text" name="ftelrumah" id="ftelrumah" value=" --><?php echo $dtelrumah ?>
			        (Rumah)</p>
			        <p>
			          <label for="ftelhp">:</label>
                    <!--   <input type="text" name="ftelhp" id=ftelhp value=" --><?php echo $dtelhp ?>
(H/P)</p>
			        <p>
			          <label for="ftelpejabat">:</label>
                      <!-- <input type="text" name="ftelpejabat" id="ftelpejabat" value="--><?php echo $dtelpejabat ?>
(Pejabat)</p>
		          </div>
			      <p><br>
		          </p>
		        </div>

		      

			 <br><br>
		</div>
      	</div>
		</div>
			
			<div class="panel panel-primary">
			<div class="panel-heading" align="center">C) MAKLUMAT PEKERJAAN PEMOHONAN</div>
			<div class="panel-body">
			<div class="row">
			 
			     <div class="form-group">
			      <div class="col-lg-4">Kategori Jawatan</div>
			      <div class="col-lg-8">
			      		 <label for="fkatjawatan">:</label>
			        <?php echo $sdkatjawatandb
						
								// $query_kj = "SELECT * FROM tbl_katjawatan";
							 //  	$result_kj  = mysql_query($query_kj);
							  	
							  	
										
			     //                echo "<select name = fkatjawatan id = fkatjawatan >";
			     //                echo "<option value = '$dkatjawatan'>$sdkatjawatandb</option>";
										
			     //                 while($kj_2query = mysql_fetch_array($result_kj))
			     //                {
			     //                    $idkatjawatan = $kj_2query['t_id'];
        //                     		$xxkatjawatan = $kj_2query['t_kategori'];
        //                     		echo "<option value =$idkatjawatan>$xxkatjawatan</option>";
			     //                } 
			     //                 echo "</select>";
	   
					?>

			  </div>
			</div>

			  <div class="form-group">
			     <div class="col-lg-4">Jawatan</div>
			      		<div class="col-lg-8">
			        
			          <label name="fjawatan" id="fjawatan"for="fjawatan">:</label>
                      
						   <?php echo $sdjawatan
         //                            $query_jawatan = "select * from tablejawatan";
         //                            $result_jawatan = mysql_query($query_jawatan) or die (mysql_error());
         //                            // $data_jawatan = mysql_fetch_array($result_jawatan);

         //                            // $result_jawatan = $data_jawatan['jawatan'];

         //                            echo "<select name=fjawatan id=fjawatan>";
         //                            echo "<option value='$djawatan'>$sdjawatan</option>";

         // //                            $query = "select * from tablejawatan order by id ASC";
									// // $result = mysql_query($query);

									// // echo "<select name=jawatan id=jawatan>";
									// // echo "<option value='$jawatan'>$result_jawatan</option>";

                                    
         //                            while($datajawatan  = mysql_fetch_array($result_jawatan))
         //                            {
         //                            	$idjawatan = $datajawatan['id'];
         //                            	$xxjawatan = $datajawatan['jawatan'];
         //                                echo "<option value =$idjawatan>$xxjawatan</option>";
         //                             }
         //                             echo "</select>";
						  ?>
                    
			       
			      </div>
		        </div>
			      
		<br><br>
			     
		
		  
		
			    <br>
			    <br>
			    <div class="form-group">
			      	<div class="col-lg-4">Tempat Bertugas </div>
			      		<div class="col-lg-6">
			        		<label ame="ftbertugas" id="ftbertugas"for="ftbertugas">:</label>
							<?php echo $sdjabatan 
							// 	$query_tbertugas = "select * from tablejabatan ";
							// 	$result_tbertugas = mysql_query($query_tbertugas) or die(mysql_error());
							
							// 	echo "<select name=ftbertugas id=ftbertugas >";
							// 	echo "<option value='$sjabatan'>$sdjabatan</option>";


							// // $result_tbertugas	= $data_tbertugas['jabatan'];

							// // $query1 = "select * from tablejabatan order by id ASC";
							// // $result1 = mysql_query($query1);

							
							// 	while($dataresult = mysql_fetch_array($result_tbertugas))
							// 	{
							// 	$kjabatan = $dataresult['kodjabatan'];
							// 	$xxjabatan = $dataresult['jabatan'];
							// 	echo "<option value = $kjabatan>$xxjabatan</option>";
							// 	}
							// 	echo "</select>";		   
							?>
			      		</div>
			 	</div>

				<br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Unit</div>
			        
			      <div class="col-lg-6">
			        <label for="unitp">:</label>
						<?php echo $sdunit
							
							// $query_unit = "select * from tableunit ";
							// $result_unit = mysql_query($query_unit) or die(mysql_error());
							
							// echo "<select name=funitp id=funitp >";
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
			    <br><br>

			    <div class="form-group">
			      <div class="col-lg-4">Tarikh Mula Berkhidmat </div>
			      <div class="col-lg-6">
			        <label for="ftrkberkhidmat">:</label>
			        <!-- <?php echo $trkberkhidmat; ?> -->
                    <!-- <input type="date" name="ftrkberkhidmat" id="ftrkberkhidmat" value=" --><?php echo $dtrkberkhidmat; ?>
			      </div> <?php //"Markah: echo $dmtrkberkhidmat ";?>
			      <br>
			      <br>
		        </div>


			    <div class="form-group">
			      <div class="col-lg-4">Waktu Bertugas</div>
			      	<div class="col-lg-6">
			        
			          <label name="fofficehour" id="fofficehour" for="fofficehour">:</label>
                    
						   <?php echo $sdbertugasdb
                                    // $queryofficehour = "select * from tbl_waktubertugas";
                                    // $resultofficehour = mysql_query($queryofficehour) or die (mysql_error());

                                    // echo "<select name=fofficehour id=fofficehour >";
                                    // echo "<option value=$dofficehour>$sdbertugasdb</option>";

                                    // while($dataofficehour = mysql_fetch_array($resultofficehour))
                                    // {
                                    //     echo "<option value =$dataofficehour[id]>$dataofficehour[nama]</option>";
                                    //  }
                                    //  echo "</select>";
						  ?>
		       		</div>  
				</div>
		</div>
	</div>
</div>

		<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-primary">
			<div class="panel-heading" align="center">D) MAKLUMAT KELUARGA PEMOHON</div>
			<div class="panel-body">
			<div class="row">
			  
			    <div class="form-group">
			      <div class="col-lg-4">Nama Suami / Isteri</div>
			      <div class="col-lg-8">
			        <label for="fnamapasangan">:</label>
			       <!--  <input type="text" name="fnamapasangan" id="fnamapasangan" size="50" value=" --><?php echo $dnamapasangan ?>
		          </div>
		        </div>
			    <br>
			    <br>

			    <div class="form-group">
			      <div class="col-lg-4">No K/P</div>
			      <div class="col-lg-6">
			        <label for="fnokppasangan">:</label>
			       <!--  <input type="text" name="fnokppasangan" id="fnokppasangan" value=" --><?php echo $dnokppasangan ?>
		          </div>
		        </div>
			    <br> <br>

			    <div class="form-group">
			    	<div class="col-lg-4">Kategori Keluarga</div>
			    	<div class="col-lg-6">
			        <label name="fkatkeluarga" id="fkatkeluarga"for="fkatkeluarga">:</label>
			      
						   <?php echo $sdkeluargadb
                                    // $querykatkeluarga = "select * from tblkeluargapp";
                                    // $resultkatkeluarga = mysql_query($querykatkeluarga) or die (mysql_error());

                                    // echo "<select name=fkatkeluarga id=fkatkeluarga >";
                                    // echo "<option value=$dkeluarga>$sdkeluargadb</option>";

                                    // while($datakatkeluarga = mysql_fetch_array($resultkatkeluarga))
                                    // {
                                    //     echo "<option value =$datakatkeluarga[k_id]>$datakatkeluarga[k_nama]</option>";
                                    //  }
                                    //  echo "</select>";
						  ?>
                      
			    </div>
			</div>
			<br>
			<br>
			<!-- <br> -->
			    <div class="form-group">
			      <div class="col-lg-4">Jawatan</div>
			      <div class="col-lg-8">
			        <label for="fjawatanpasangan">:</label>
                   <!--  <input type="text" name="fjawatanpasangan" id="fjawatanpasangan" size="50" value=" --><?php echo $djawatanpasangan ?>
			      </div>
			      <br>
			      <br>
		        </div>
			    <div class="form-group">
			      <div class="col-lg-4">Tempat Bertugas</div>
			      <div class="col-lg-8">
			        <label for="ftbpasangan">:</label>
			       <!--  <input type="text" name="ftbpasangan" id="ftbpasangan" size="50" value=" --><?php echo $dtbpasangan ?>
			      </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Waktu Bertugas</div>
			      <div class="col-lg-6">
			        <label  name="fwbpasangan" id="fwbpasangan" for="fwbpasangan">:</label>
                  
						<?php echo $sdbertugasdb
                                    // $queryofficehour2 = "select * from tbl_waktubertugas";
                                    // $resultofficehour2 = mysql_query($queryofficehour2) or die (mysql_error());

                                    // echo "<select name=fwbpasangan id=fwbpasangan>";
                                    // echo "<option value=$dwbpasangan>$sdbertugasdb</option>";

                                    // while($dataofficehour2 = mysql_fetch_array($resultofficehour2))
                                    // {
                                    //     echo "<option value =$dataofficehour2[id]>$dataofficehour2[nama]</option>";
                                    //  }
                                    //  echo "</select>";
						  ?>
                   
			      </div>
			      <br>
		        </div>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Bilangan Anak</div>
			      <div class="col-lg-6">
			        <label name="fbilanak" id="fbilanak" for="fbilanak">:</label>
				
						<?php echo $sdbilanakdb
                                // $query_bilanak = "select * from tbl_bilanak";
                                // $result_bilanak = mysql_query($query_bilanak) or die (mysql_error());

                                // echo "<select name=fbilanak id=fbilanak >";
                                // echo "<option value=$dbilanak>$sdbilanakdb</option>";

                                // while($bilanakdata = mysql_fetch_array($result_bilanak))
                                // {
                                //     echo "<option value =$bilanakdata[id]>$bilanakdata[bilangan]</option>";
                                //  }
                                //  echo "</select>";  
					  ?>
                   
			      </div>
			      <br>
		        </div>
		  
			  <br><br>
		</div>
      		</div>
      		</div>				
	       



<div class="row">
<div class="col-lg-12">
  <div class="panel panel-primary">
        <div class="panel-heading" align="center">E) SEBAB - SEBAB MEMOHON RUMAH </div>
    <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <div class="col-lg-10">Saya memohon menduduki Rumah Kerajaan kerana; </div>
              </div>
              <div class="col-lg-10">
                <p>
                  <!-- <input type="text" name="fsebabmohon" id="fsebabmohon" size="80" value=" --><B><?php echo $dsebabmohon ?></B>
                </p>
              </div>
              <div class="form-group">
                <div class="col-lg-10">Pemohon ditawarkan di alamat</div>
              </div>
              <div class="col-lg-10">
                <p>
                  <!-- <input type="text" name="fsebabmohon" id="fsebabmohon" size="80" value=" --><B><?php echo $sdalamatdb ?></B>
                </p>
              </div>
              <p><br>
              </p>
              <p><br>
              </p>
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
                <input name="fpengesahan" type="text" id="fpengesahan" size="80" value="<?php //echo $dpengesahan ?>">
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
     </div>
 </div>
<!-- .............................untuk kegunaan pejabat..............................-->
<!-- <div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">UNTUK KEGUNAAN PEJABAT </div>
			        <!--  <form name="form1" method="post" action=""> -->
<!--			 		<div class="panel-body">
			 		<div class="form-group">
			 			<div class="form-group">
					 <div class="col-lg-4">Markah terkumpul</div> <!-- need to call tbl_kelas for s_nama -->
<!--					 <div class="col-lg-6">
					 <label for="fkelasrumah">:</label>
					
				     <input name="fkelasrumah" type="hidden" id="fkelasrumah" size="50" 
				     value=" <?php //echo $markah ?>" >
					 </div>
						<br>
					</div>
					<div class="col-lg-4">Permohonan ini</div>
					<div class="col-lg-6">
				 	<label for="flulus">:</label>
			        	<?php
			        		echo "<select name=flulus id=flulus hidden=hidden >";
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
<!--				     <div class="form-group">
					 <div class="col-lg-4">Kelas rumah yang layak diduduki</div> <!-- need to call tbl_kelas for s_nama -->
<!--					 <div class="col-lg-6">
					 <label for="fkelasrumah">:</label>
				     <input name="fkelasrumah" type="text" id="fkelasrumah" size="50" 
				     value="<?php //echo $dkelasrumah ?>" >
					 </div>
						<br>
					</div>

					
						<br>
				     <div class="form-group">
					 <div class="col-lg-4">Pemohon yang ditawarkan menduduki rumah di alamat</div>
					 <div class="col-lg-6">
					 <label for="falamattawaran">:</label>
				     <!-- <input name="falamattawaran" type="text" id="falamattawaran" size="50" value="<?php echo $dalamattawaran ?>"> -->
				     <?php
			        		echo "<select name=falamattawaran id=falamattawaran hidden=hidden >";
                            echo "<option value='$dlulus'>$sdalamatdb</option>";

			        		$query_falamattawaran = "select * from tblalamat WHERE a_jabatan = '$dtbertugas' && a_buka = 2";
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
	</div></div></div>

<!--	 <div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">

			<div class="panel-heading">KEMASKINI PENGHUNI </div>
		 	<!-- <form name="form2" method="post" action=""> -->
<!--			 <div class="panel-body">
			 	<div class="form-group">
					<div class="col-lg-4">Tarikh masuk rumah</div>
					<div class="col-lg-6">
				 	<label for="fmasuk">:</label>
			        <input type="date" name="fmasuk" id="fmasuk" value="<?php //echo $dmasuk; ?>">
			 	</div>
			    <!-- <label for="lulus"></label> -->
			   
<!--			     <div class="form-group">
				 <div class="col-lg-4">Tarikh keluar rumah</div>
				 <div class="col-lg-6">
				 <label for="fkeluar">:</label>
			     <input type="date" name="fkeluar" id="fkeluar" value="<?php //echo $dkeluar; ?>">
				 </div>
				<br>
			</div>

			<div class="form-group">
				 <div class="col-lg-4">Tarikh terima deposit</div>
				 <div class="col-lg-6">
				 <label for="fterima">:</label>
			     <input type="date" name="fterima" id="fterima" value="<?php //echo $dterima; ?>">
				 </div>
				<br>
			</div>

			<div class="form-group">
				 <div class="col-lg-4">Jumlah deposit</div> 
				 <div class="col-lg-6">
				 <label for="fjumlah">:</label>
			     <input type="text" name="fjumlah" id="fjumlah" value="<?php //echo $kelasdeposit; ?>">
				 </div>
				<br>
			</div>

			<div class="form-group">
				 <div class="col-lg-4">No resit</div>
				 <div class="col-lg-6">
				 <label for="fresit">:</label>
			     <input type="text
			     " name="fresit" id="fresit" value="<?php //echo $dresit; ?>">
				 </div>
				<br>
			</div>
		    
    	</div>
	</div>
</div>

</div></div>
</p>


-->
	<div class="form-group">
			<div class="col-lg-10" align="center">
				<!--<div class="col-lg-6"></div>
					<p>Sila pastikan kesemua maklumat adalah <b>TEPAT</b> sebelum menekan butang <b>HANTAR</b></p>-->

					<?php 


					if ($terima =='0')
					{ ?>
						<br>

						<input type="submit" class="btn btn-primary" name="Terima" id="Terima" value="Terima">
      					<input type="submit" class="btn btn-primary" name="TidakTerima" id="TidakTerima" value="TidakTerima"> 


					<?php }


					else
					{
						if($terima=='1')
						{
 							?>
								<a href="../TCPDF/PDF/perjanjian masuk.php?id=<?php echo $fid; ?>"><input type="" class="btn btn-primary" name="cetak" value="Cetak Akuan Masuk Rumah" align="right">
									<?php

							?>
							<a href="../TCPDF/PDF/perjanjian keluar.php?id=<?php echo $fid; ?>"><input type="" class="btn btn-primary" name="cetak" value="Cetak Akuan Keluar Rumah" align="left">
									<?php

						}
						
						else
						{
 							?>
								<b> <span class="blinking">ANDA TELAH MENOLAK PERMOHONAN INI!!!.</span> </b>

						<?php

						}
					
					}

					?>


					

				</a>

				</a>

				</div>
			
				
			</div>
		</div>	

    </span>
    <p></p>
    </form>
    </body>
</html>

 <?php


	if((isset($_POST['Terima']) == "Terima"))
	{

	

		$queryupdate = "UPDATE tbl_pemohonan SET

		p_statterima        = '1'
		
		where p_id = '".mysql_real_escape_string($fid)."'";

		$resultupdate = mysql_query($queryupdate) or die (mysql_error());


		printf("<script> alert('ANDA TELAH BERSETUJU UNTUK MENERIMA TAWARAN INI.'); window.location = 'listsetujuterima.php?id=$fid' </script>");

}
	
	

if((isset($_POST['TidakTerima']) == "TidakTerima"))
	
{

			//$tmohon				= $_POST['hantar'];

		$query_btntidak  		 = "UPDATE  tbl_pemohonan SET p_statterima        	 =  '2'

		where p_id = '".mysql_real_escape_string($fid)."'";

		//echo $query_btnhantar;
		$resulttidak =  mysql_query($query_btntidak) or die(mysql_error());

printf("<script> alert('ANDA TELAH MENOLAK UNTUK MENERIMA TAWARAN INI.'); window.location ='listsetujuterima.php?id=$fid' </script>");
		
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


			          