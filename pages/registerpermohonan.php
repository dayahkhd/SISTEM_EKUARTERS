<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Daftar Permohonan</title>
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="../bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
</head>

<body>
<form method="post" bgcolor="#c7d3d9" >
	<div id="wrapper">
	<?php include('leftbar.php');?> 
	<div id="page-wrapper">
<style >
	
	body {
  
	/*background-color:#c7d3d9;*/
}
</style>




<?php
//temporary date printing
date_default_timezone_set("Asia/Kuala_Lumpur"); 
$today = date("Y-m-d");
$tmohon=$today;

$query	= "SELECT * FROM tablepengguna WHERE nokadpengenalan = '$user2'";
$result	= mysql_query($query) or die(mysql_error());
$data	= mysql_fetch_array($result);

$idstaff 		= $data['id'];
$id				= $data['nokadpengenalan'];
$nama			= $data['namapemohon'];
$jawatan		= $data['jawatan'];

$tbertugas		= $data['jabatan'];
$unit			= $data['unit'];
$tberkhidmat	= $data['tarikhlantik'];

//table jawatan
$queryjawatan	= "SELECT * FROM tablejawatan WHERE id = '$jawatan'";
$resultjawatan	= mysql_query($queryjawatan) or die(mysql_error());
$datajawatan	= mysql_fetch_array($resultjawatan);

$idjawat	 	= $datajawatan['id'];
$namajawat      =$datajawatan['jawatan'];

//table jabatan//tempat bertugas
$queryjabatan	= "SELECT * FROM tablejabatan WHERE kodjabatan = '$tbertugas'";
$resultjabatan	= mysql_query($queryjabatan) or die(mysql_error());
$datajabatan	= mysql_fetch_array($resultjabatan);

$idjabat        = $datajabatan['kodjabatan'];
$namajabat      = $datajabatan['jabatan'];


//table unit
$queryunit		= "SELECT * FROM tableunit WHERE kodunit = '$unit'";
$resultunit		= mysql_query($queryunit) or die(mysql_error());
$_POSTunit		= mysql_fetch_array($resultunit);




if (! (isset ( $_SESSION ['nokadpengenalan'] ))) {
	
	/*header ( 'location:../index.php' );*/
}
	//$res1->session;
	if(isset($_POST['submit']) == "submit"){
	{
		//$tmohon				= $_POST['tmohon'];
		$lokasimohon		= $_POST['lokasi'];
		$id					= $_POST['nokp'];
		$nama				= $_POST['nama'];
		$jantina			= $_POST['jantina'];
		$statusperkahwinan	= $_POST['statusperkahwinan'];
		$telrumah			= $_POST['telrumah'];
		$telhp				= $_POST['telhp'];
		$telpejabat			= $_POST['telpejabat'];
		$jawatan			= $_POST['jawatan'];
		$katjawatan         = $_POST['kategori'];
		$tbertugas			= $_POST['jabatan'];
		$unit				= $_POST['unit'];
		$tberkhidmat		= $_POST['tberkhidmat'];
		$officehour			= $_POST['officehour'];
		$namapasangan		= $_POST['npasangan'];
		$nokppasangan		= $_POST['icpasangan'];
		$jawatanpasangan	= $_POST['jawatanpasangan'];

		$katkeluarga		= $_POST['kategorikeluarga'];

		$tbpasangan			= $_POST['tbertugaspasangan'];
		$wbpasangan			= $_POST['ohpasangan'];
		$bilanak			= $_POST['bilanak'];
		$alamatlama			= $_POST['alamatlama'];
		$checkbox1			= isset($_POST['fcheckbox1'])?1:0;
		$checkbox2			= isset($_POST['fcheckbox2'])?1:0;
		$checkbox3			= isset($_POST['fcheckbox3'])?1:0;
		$alamatsendiri		= $_POST['alamatrumah'];
		$jarakrumah			= $_POST['jarakrumah'];
		$sebabmohon			= $_POST['sebabmohon'];
		//$pengesahan			= $_POST['pengesahan'];
		$kategoripemohon    = '2';
		//declare terus status (cth:pemohon=2)
		$renewal    = '1'; //bukan renewal

	//  checkbox tandatangan
		$tandamohon        = isset($_POST['checkmohon'])?1:0;
		$tandaketua        = isset($_POST['checkketua'])?1:0;

		$kilo			   = $_POST['kilo'];
		


		
		$querylast = "SELECT * from tbl_pemohonan order by p_id desc limit 1";
		$resultlast = mysql_query($querylast) or die(mysql_error());
		$datalast = mysql_fetch_array($resultlast);
		if ($katjawatan == 1) {

			//table waktu bertugas = call
			$query1 = "SELECT * FROM tbl_waktubertugas WHERE id = '$officehour'" ;
			$result1 = mysql_query($query1) or die(mysql_error());
			$data1 = mysql_fetch_array($result1);

			$markahpp1 = $data1['mpp'];

			//table keluarga pegawai perubatan = keluarga
			$query2 = "SELECT * FROM tblkeluargapp WHERE k_id = '$katkeluarga'" ;
			$result2 = mysql_query($query2) or die(mysql_error());
			$data2 = mysql_fetch_array($result2);

			$markahpp2 = $data2['mpp'];

			//table bil anak = anak
			$query3 = "SELECT * FROM tbl_bilanak WHERE id = '$bilanak'" ;
			$result3 = mysql_query($query3) or die(mysql_error());
			$data3 = mysql_fetch_array($result3);

			$markahpp3 = $data3['mpp'];

			// lama mohon : duration of application
			$diff = abs(strtotime($today) - strtotime($tmohon));
			//differrence of date in months
			$months = floor(($diff / (365*60*60*24)* 365*60*60*24) / (30*60*60*24));
			$markahpp4 = floor($months/6);	

			//year of service = current date - inserted date
			$diff2 = abs(strtotime($today) - strtotime($tberkhidmat));
			$years5 = floor($diff2 / (365*60*60*24));

			//total up pegawai perubatan
			$xtotalmarkah = $markahpp1 + $markahpp2 + $markahpp3 + $markahpp4 + $years5;	

			//declaration for markah field
			$xk1 = $markahpp1;
			$xk2 = $markahpp2;
			$xk3 = $markahpp3;
			$xk4 = $markahpp4;
			$xk5 = $years5;
		} else {
			//table waktu bertugas = call
			$query6 = "SELECT * FROM tbl_waktubertugas WHERE id = '$officehour'" ;
			$result6 = mysql_query($query6) or die(mysql_error());
			$data6 = mysql_fetch_array($result6);

			$markahkb6 = $data6['mkb'];	

			// table keluarga kakitangan biasa
			$query7 = "SELECT * FROM tblkeluargapp WHERE k_id = '$katkeluarga'";
			$result7 = mysql_query($query7) or die(mysql_error());
			$data7 = mysql_fetch_array($result7);

			$markahkb7 = $data7['mkb'];

			//table bilangan anak
			$query8 = "SELECT * FROM tbl_bilanak WHERE id = '$bilanak'" ;
			$result8 = mysql_query($query8) or die(mysql_error());
			$data8 = mysql_fetch_array($result8);

			$markahkb8 = $data8['mkb'];

			// lama mohon : duration of application
			$diff2 = abs(strtotime($today) - strtotime($tmohon));
			$months2 = floor(($diff2 / (365*60*60*24)* 365*60*60*24) / (30*60*60*24));

			$markahkb9 = floor($months2/6);	

			//year of service = current date - inserted date
			$diff = abs(strtotime($today) - strtotime($tberkhidmat));
			$years10 = floor($diff / (365*60*60*24));

			//total up kakitangan biasa
			$xtotalmarkah = $markahkb6 + $markahkb7 + $markahkb8 + $markahkb9 + $years10;

			//declaration for markah field	
			$xk1 = $markahkb6;
			$xk2 = $markahkb7;
			$xk3 = $markahkb8;
			$xk4 = $markahkb9;
			$xk5 = $years10;
		}

		
		
		$query = "INSERT INTO tbl_pemohonan 
			(p_tarikhmohon, p_lokasi, p_staff, p_jantina, p_statusperkahwinan, p_telrumah, p_telhp, p_telpejabat ,p_katjawatan, p_jawatan, p_jabatan, p_unit, p_tmulabertugas, p_markahtmulabertugas, p_waktubertugas, p_markahwaktubertugas,  p_namapasangan, p_icpasangan, p_jawatanpasangan, p_katkeluarga, p_markahkatkeluarga, p_tkerjapasangan, p_wbpasangan, p_bilanak,p_markahbilanak,
				 p_alamatsekarang, p_checkbox1, p_checkbox2, p_checkbox3, p_alamatrumahsd, p_jarakrumah, p_sebabmohon, p_tandamohon,p_tandaketua,p_totalmarkah,p_kilometer)
		VALUES
		('$tmohon', '$lokasimohon', '$idstaff', '$jantina', '$statusperkahwinan', '$telrumah', '$telhp', '$telpejabat','$katjawatan','$jawatan', '$tbertugas', '$unit', '$tberkhidmat', '$xk5', '$officehour','$xk1', '$namapasangan', '$nokppasangan', '$jawatanpasangan','$katkeluarga','$xk2', '$tbpasangan','$wbpasangan', '$bilanak', '$xk3','$alamatlama', '$checkbox1', '$checkbox2', '$checkbox3', '$alamatsendiri', '$jarakrumah', '$sebabmohon','$tandamohon','$tandaketua','$xtotalmarkah','$kilo')";
		
		$result = mysql_query($query) or die(mysql_error());
		$fid = mysql_insert_id();

//update
		$queryUpd     = "UPDATE tablepengguna SET
		kategori	  =	'".mysql_real_escape_string($kategoripemohon)."'
	
		where nokadpengenalan = '".mysql_real_escape_string($id)."'";
		$resultpat =  mysql_query($queryUpd) or die(mysql_error());
		
		printf("<script> alert('PERMOHONAN TELAH DIDAFTAR .'); window.location = 'listpemohon.php?id=$id' </script>");
	}  
	 
}
			          

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
			<div class="panel panel panel-primary">
			<div class="panel-heading"></div>
			<div class="panel-body">
			<div class="row">
			<div class="col-lg-10">
			<div class="form-group" >

		    <div class="col-lg-4">
			 <label>Tarikh Memohon</label></div>
			<div class="col-lg-6">
			  <label for="tmohon">:</label>
              <!-- <input type="date" name="tmohon" id="tmohon"> -->
              <?php echo(date("d-m-Y", strtotime($tmohon)));?>
			</div>								
			</div>								
			<br><br>

			<div class="form-group">
			<div class="col-lg-4">
			<label>Lokasi Kuarters Yang Dipohon</label></div>
			<div class="col-lg-8">
			  <label for="lokasi"name="lokasi" id="lokasi" >:</label>
            
				  <?php
				  					// $lokasi2     = "SELECT * FROM tbllokasi WHERE l_jabatan ='$tbertugas'";
				  					// $query = mysql_query($lokasi2);

                                     $query_lokasi = "select * from tbllokasi order by l_id ASC";
                                     $result_lokasi = mysql_query($query_lokasi) or die (mysql_error());
                                    echo "<select name=lokasi id=lokasi >";
                                    echo "<option>Sila Pilih...</option>";
                                    while($data_lokasi = mysql_fetch_array($result_lokasi))
                                    {
                                        echo "<option value =$data_lokasi[l_id]>$data_lokasi[l_nama]</option>";
                                     }
                                     echo "</select>";
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
			        <label for="alamatlama">:</label>
			        <input type="text" name="alamatlama" id="alamatlama" size="50" >
		          </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">
			        <p>Adakah suami / isteri tuan / puan mempunyai rumah sendiri?(ya / tidak) </p>
			   
			        <p>jika ya, sila nyatakan *</p>
			        <p>dan sila nyatakan,</p>
			      </div>

			      <div class="col-lg-6">
			        <p>
					<div>
					<input type="checkbox" name="fcheckbox1" id="fcheckbox1" <?php if (isset($checkbox1) && $checkbox1 == "1") echo "checked"; ?> value="1" />
			          <label for="fcheckbox1">Pinjaman Perumahan Kerajaan</label>
			        </p>
					</div>

			        <p>
			          <input type="checkbox" name="fcheckbox2" id="fcheckbox2" <?php if (isset($checkbox2) && $checkbox2 == "1") echo "checked"; ?> value="1" />
                      <label for="fcheckbox2">Pinjaman Bank</label></p>
			        <p>
			          <input type="checkbox" name="fcheckbox3" id="fcheckbox3" <?php if (isset($checkbox3) && $checkbox3 == "1") echo "checked"; ?> value="1"/>
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
			        <label for="alamatrumah">:</label>
                    <input name="alamatrumah" type="text" id="alamatrumah" size="50">
			      </div>
			      <br>
		        </div>
			    <br>
			    <div class="form-group">
			      
			      <div class="col-lg-4">Jarak rumah sendiri ke tempat bertugas</div>
			      <div class="col-lg-8">
			      	<label for="kilo">:</label>
			      	<?php
						$querykilo = "select * from tbl_kilometer";
						$resultkilo = mysql_query($querykilo) or die (mysql_error());
						echo "<select name=kilo id=kilo >";
						echo "<option value = ->Sila Pilih...</option>";
						while($datakilo = mysql_fetch_array($resultkilo))
						{
						echo "<option value = $datakilo[idkilo]>$datakilo[kilometer]</option>";
						}
						echo "</select>";		   
					?>
			      </div>
			      <div class="col-lg-4"> </div>
			      <div class="col-lg-6">
			        <label for="jarakrumah">:</label>
                    <input type="text" name="jarakrumah" id="jarakrumah">
			      </div>

			      <br><br>
			      <br>
		        </div>
		      </div>
			</div>
	</div>

			<div class="panel panel panel-primary">
			<div class="panel-heading" align="center">B) MAKLUMAT PEMOHONAN</div>
			<div class="panel-body">
			<div class="row">

			  
			    <div class="form-group">
			      <div class="col-lg-4">Nama</div>
			      <div class="col-lg-8">
			        <label for="nama">:</label>
			        <input type="text" name="nama" id="nama" size="70" value="<?php echo $nama; ?>">
		          </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">No K/P</div>
			      <div class="col-lg-6">
			        <label for="nokp">:</label>
			        <input type="text" name="nokp" id="nokp" value="<?php echo $id; ?>">
		          </div>
		        </div>
			    <br>
			    <br>

			    <div class="form-group">
			      <div class="col-lg-4">Jantina</div>
			      <div class="col-lg-6">
			        <label for="jantina" name="jantina" id="jantina">:</label>
			        
					 <?php
                             $query_jantina = "select * from tbl_jantina order by id ASC";										
                             $result_jantina = mysql_query($query_jantina) or die (mysql_error());
                            echo "<select name=jantina id=jantina >";
                            echo "<option>Sila Pilih...</option>";
							while($data_jantina = mysql_fetch_array($result_jantina))
                              {
										echo "<option value =$data_jantina[id]>$data_jantina[nama]</option>";
                              }
                            echo "</select>";
					?>
		        
			      </div>
			       </div>
			      <br><br>
		       
			    <div class="form-group">
			      <div class="col-lg-4">Status Perkahwinan</div>
			      <div class="col-lg-6">
			      
			          <label name="statusperkahwinan" id="statusperkahwinan" for="statusperkahwinan">:</label>
                     
						<?php
								 $query_sp = "select * from tbl_statusperkahwinan order by p_id ASC";							
								 $result_sp = mysql_query($query_sp) or die (mysql_error());
								echo "<select name=statusperkahwinan id=statusperkahwinan >";
								echo "<option>Sila Pilih...</option>";
								while($data_sp = mysql_fetch_array($result_sp))
								  {
											echo "<option value =$data_sp[p_id]>$data_sp[p_nama]</option>";
								  }
								echo "</select>";
						?> 
                      
			     
			      </div>
		        </div>    
			    <br><br>

			    <div class="form-group">
			      <div class="col-lg-4">No. Telefon</div>
			      <div class="col-lg-6">
			        <p>
			          <label for="telrumah">:</label>
                      <input type="text" name="telrumah" id="telrumah">
			        (Rumah)</p>
			        <p>
			          <label for="telhp">:</label>
                      <input type="text" name="telhp" id="telhp">
(H/P)</p>
			        <p>
			          <label for="telpejabat">:</label>
                      <input type="text" name="telpejabat" id="telpejabat">
(Pejabat)</p>
		          </div>
			      <p><br>
		          </p>
		        </div>

			  <br><br>
		</div>
      	</div>
		</div>
			
			<div class="panel panel panel-primary">
			<div class="panel-heading" align="center">C) MAKLUMAT PEKERJAAN PEMOHONAN</div>
			<div class="panel-body">
			<div class="row">
		
			     <div class="form-group">
			      <div class="col-lg-4">Kategori Jawatan</div>
			      <div class="col-lg-8">
			        <label name="kategori" id="kategori" for="kategori">:</label>
			        <?php
						$query_kat = "select * from tbl_katjawatan";
						$result_kat = mysql_query($query_kat) or die (mysql_error());
						echo "<select name=kategori id=kategori >";
						echo "<option value = ->Sila Pilih...</option>";
						while($data_kat = mysql_fetch_array($result_kat))
						{
						echo "<option value = $data_kat[t_id]>$data_kat[t_kategori]</option>";
						}
						echo "</select>";		   
					?>

			  </div>
			</div>


		<div class="form-group">
			<div class="col-lg-4">Jawatan</div>
			    <div class="col-lg-8">
					<label name="jawatan" id="jawatan" for="jawatan" size="40">:</label>
						   <?php
                                    $query_jawatan = "select * from tablejawatan order by id ASC";
                                    $result_jawatan = mysql_query($query_jawatan) or die (mysql_error());
                                    echo "<select name=jawatan id=jawatan>";
                                    echo "<option value=$idjawat>$namajawat</option>";
                                    while($dataresult = mysql_fetch_array($result_jawatan))
                                    {
                                        echo "<option value =$dataresult[id]>$dataresult[jawatan]</option>";
                                     }
                                     echo "</select>";
						   ?>
                    
			     
			      </div>
		        </div>
			      <br><br>

			    <div class="form-group">
			      <div class="col-lg-4"> Tempat Bertugas</div>
			      <div class="col-lg-6">
				        <label name="jabatan" id="jabatan" for="tbertugas">:</label>
							<?php
								
								$query1 = "select * from tablejabatan order by id ASC";
								$result1 = mysql_query($query1);

								echo "<select name=jabatan id=jabatan>";
								echo "<option value=$idjabat>$namajabat</option>";

								// while($datajabatan = mysql_fetch_array($result1))
								// {
								// 	echo "<option value = $datajabatan[kodjabatan]>$datajabatan[jabatan]</option>";
								// }
								echo "</select>";		   
							?>
			      </div>
			</div>

				<br><br>
			    <div class="form-group">
			      <div class="col-lg-4">Unit</div>
			      <div class="col-lg-6">
			        <label name="unit" id="unit" for="unit">:</label>
						<?php
							$query_unit = "select * from tableunit order by kodunit ASC";
							$result_unit = mysql_query($query_unit) or die (mysql_error());
							
							echo "<select name=unit id=unit>";
							echo "<option =->Sila Pilih...</option>";

							while($_POST = mysql_fetch_array($result_unit))
							{
								echo "<option value = $_POST[kodunit]>$_POST[unit]</option>";
							}
							echo "</select>";		   
						?>
			      </div>
		        </div>

			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Tarikh Mula Berkhidmat </div>
			      <div class="col-lg-6">
			        <label for="tberkhidmat">:</label>
                    <input type="date" name="tberkhidmat" id="tberkhidmat" value="<?php echo $tberkhidmat; ?>">
			      </div>
			      <br>
			      <br>
		        </div>

			    <div class="form-group">
			      <div class="col-lg-4">Waktu Bertugas</div>
			      <div class="col-lg-6">
			      
			          <label name="officehour" id="officehour" for="officehour">:</label>
                     
						   <?php
                                    $queryofficehour = "select * from tbl_waktubertugas order by id ASC";
                                    $resultofficehour = mysql_query($queryofficehour) or die (mysql_error());
                                    echo "<select name=officehour id=officehour >";
                                    echo "<option>Sila Pilih...</option>";
                                    while($dataofficehour = mysql_fetch_array($resultofficehour))
                                    {
                                        echo "<option value =$dataofficehour[id]>$dataofficehour[nama]</option>";
                                     }
                                     echo "</select>";
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
			        <label for="npasangan">:</label>
			        <input type="text" name="npasangan" id="npasangan" size="70">
		          </div>
		        </div>
			    <br>
			    <br>
			    
			    <div class="form-group">
			      <div class="col-lg-4">
			        <label>No.K/P</label>
		          </div>
			      <div class="col-lg-6">
			        <label for="icpasangan">:</label>
			        <input type="text" name="icpasangan" id="icpasangan">
		          </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Jawatan</div>
			      <div class="col-lg-8">
			        <label for="jawatan">:</label>
                    <input type="text" name="jawatanpasangan" id="jawatanpasangan" size="70">
			      </div>
			      <br>
			      <br> 
		        </div>
		         <!--KATEGORI KELUARGA-->
		         <div class="form-group">
			      <div class="col-lg-4">Kategori Keluarga</div>
			      <div class="col-lg-6">
			        <label name="kategorikeluarga" id="kategorikeluarga" for="kategorikeluarga">:</label>
                 
						<?php
                                    $querykeluarga = "select * from tblkeluargapp order by k_id ASC";
                                    $resultkeluarga = mysql_query($querykeluarga) or die (mysql_error());
                                    echo "<select name=kategorikeluarga id=kategorikeluarga >";
                                    echo "<option>Sila Pilih...</option>";
                                    while($datakel = mysql_fetch_array($resultkeluarga))
                                    {
                                        echo "<option value =$datakel[k_id]>$datakel[k_nama]</option>";
                                     }
                                     echo "</select>";
						  ?>
                 
			      </div>
			      <br>
		        </div>
			    <div class="form-group">
			      <div class="col-lg-4">Tempat Bertugas</div>
			      <div class="col-lg-8">
			        <label for="tbertugaspasangan">:</label>
			        <input type="text" name="tbertugaspasangan" id="tbertugaspasangan" size="70">
			      </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Waktu Bertugas</div>
			      <div class="col-lg-8">
			        <label name="ohpasangan" id="ohpasagan" for="ohpasangan">:</label>
           
						<?php
                                    $queryofficehour2 = "select * from tbl_waktubertugas order by id ASC";
                                    $resultofficehour2 = mysql_query($queryofficehour2) or die (mysql_error());
                                    echo "<select name=ohpasangan id=ohpasangan >";
                                    echo "<option>Sila Pilih...</option>";
                                    while($dataofficehour2 = mysql_fetch_array($resultofficehour2))
                                    {
                                        echo "<option value =$dataofficehour2[id]>$dataofficehour2[nama]</option>";
                                     }
                                     echo "</select>";
						  ?>
                  
			      </div>
		        </div>
			    <br><br>

			    <div class="form-group">
			      <div class="col-lg-4">Bilangan Anak</div>
			      <div class="col-lg-6">
			        <label name="bilanak" id="bilanak" for="bilanak" >:</label>
				
						<?php
                                    $querybilanak = "select * from tbl_bilanak order by id ASC";
                                    $resultbilanak = mysql_query($querybilanak) or die (mysql_error());
                                    echo "<select name=bilanak id=bilanak>";
                                    echo "<option>Sila Pilih...</option>";
                                    while($databilanak = mysql_fetch_array($resultbilanak))
                                    {
                                        echo "<option value =$databilanak[id]>$databilanak[bilangan]</option>";
                                     }
                                     echo "</select>";
						  ?>
                  
			      </div>
			    
		        </div>
		     
			  <br><br>
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
                  <input type="text" name="sebabmohon" id="sebabmohon" size="80">
                </p>
              </div>
               
              <div class="form-group">
                <div class="col-lg-10">
                  <p>Saya mengaku bahawa segala keterangan yang diberikaan di atas adalah benar. Sekiranya keterangan saya adalah palsu, pihak pengurusan berhak mengambil sebarang tindakan ke atas saya. Saya juga *bersedia / tidak bersedia untuk bertugas jika dipanggil pada bila-bila masa diperlukan </p>
                </div>
              </div>
              <!-- change tanda tangan to checkbox
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
              <br> <br>
				-->
				<div class="col-lg-10">
			        <p>
					<div>
					<input type="checkbox" name="checkmohon" id="checkmohon" <?php if (isset($checkmohon) && $checkmohon == "1") echo "checked"; ?> value="1" required='required'/>
			          <label for="checkmohon"><i> Sila klik bagi setuju untuk mohon</i></label>
			        </p>
					</div>

             <!-- <div class="form-group">
                <div class="col-lg-10">
               <div> Dengan ini, saya mengesahkan bahawa segala butiran di atas adalah benar, saya menyokong permohonan ini kerana (sila berikan ulasan);</div>
            	</div>  
              </div>
 -->
            <!--   <div class="form-group">
              	<br>
                <input name="pengesahan" type="text" id="pengesahan" size="80">
                <br>
                <div class="col-lg-10">
			        <p>
					<div>

					<input type="checkbox" name="checkketua" id="checkketua" <?php if (isset($checkketua) && $checkketua == "1") echo "checked"; ?> value="1" required='required'/><label for="checkketua"><i>Ketua Jabatan/Unit perlu klik untuk setuju</i></label>
			          
			        </p>
					</div> 
              </div>
             -->
            
            <div class="form-group"></div>
          </div>

   <!--  change tandatangan to checkbox   -->  
		<br>

		<!--  <div class="col-lg-4">.......................................</div>
              <p><br>
              </p>
              <div class="form-group">
                <div class="col-lg-4">(Tandatangan & cop Ketua Unit/Jabatan)</div>
              </div> -->
              <br><br>
		 
    </div>
     </div>
 </div>
</div>
</p>



	<span class="col-lg-6" align="right">
     <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan">
    </span>
    </body>
</html>

