<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Kemaskini Kontrak</title>
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="../bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
</head>

<form id=form1 name=form1 method="post" action="">
<body>
	<div id="wrapper">
	<?php include('leftbar.php'); ?>


		<div id="page-wrapper">
			<?php



$ic 	=	$_SESSION['nokadpengenalan'];
//$j		=	$_SESSION['jabatan'];

$xid 	= $_GET['id'];



//$ic = $_GET['nokadpengenalan'];

$query_guna	= "SELECT * FROM tablepengguna WHERE nokadpengenalan = '$ic'";
$result_guna	= mysql_query($query_guna) or die(mysql_error());
$data_guna	= mysql_fetch_array($result_guna);

$idstaff 		= $data_guna['id'];
$id				= $data_guna['nokadpengenalan'];
$nama			= $data_guna['namapemohon'];
$jawatan		= $data_guna['jawatan'];



$query	= "SELECT * FROM tbl_pemohonan WHERE p_id = '$xid'";
$result	= mysql_query($query) or die(mysql_error());
$data	= mysql_fetch_array($result);

$xtmohon			= $data['p_tarikhmohon'];
$xlokasimohon		= $data['p_lokasi'];
//$xidic				= $data['p_ic'];
//$xnama				= $data['p_nama'];
$xjantina			= $data['p_jantina'];
$xstatusperkahwinan	= $data['p_statusperkahwinan'];
$xtelrumah			= $data['p_telrumah'];
$xtelhp				= $data['p_telhp'];
$xtelpejabat		= $data['p_telpejabat'];
$xkatjawatan        = $data['p_katjawatan'];
$xjawatan			= $data['p_jawatan'];
$xtbertugas			= $data['p_jabatan'];
$xunit				= $data['p_unit'];
$xtberkhidmat		= $data['p_tmulabertugas'];
$xofficehour		= $data['p_waktubertugas'];
$xnamapasangan		= $data['p_namapasangan'];
$xnokppasangan		= $data['p_icpasangan'];
$xjawatanpasangan	= $data['p_jawatanpasangan'];
$xkatkeluarga       = $data['p_katkeluarga'];
$xtbpasangan		= $data['p_tkerjapasangan'];
$xwbpasangan		= $data['p_wbpasangan'];
$xbilanak			= $data['p_bilanak'];
$xalamatlama		= $data['p_alamatsekarang'];
$xcheckbox1			= $data['p_checkbox1'];
$xcheckbox2			= $data['p_checkbox2'];
$xcheckbox3			= $data['p_checkbox3'];
$xalamatsendiri		= $data['p_alamatrumahsd'];
$xjarakrumah		= $data['p_jarakrumah'];
$xsebabmohon		= $data['p_sebabmohon'];
$xpengesahan		= $data['p_pengesahan'];

$xhantar			= $data['p_stathantar'];

//checkbox tandatangan
$xtandamohon        = $data['p_tandamohon'];


//table jawatan
$queryjawatan	= "SELECT * FROM tablejawatan WHERE id = '$xjawatan'";
$resultjawatan	= mysql_query($queryjawatan) or die(mysql_error());
$data_jawatan	= mysql_fetch_array($resultjawatan);

$yjawatid		= $data_jawatan['id'];
$yjawatanama   	= $data_jawatan['jawatan'];


//table jabatan
$queryjabatan	= "SELECT * FROM tablejabatan WHERE kodjabatan = '$xtbertugas'";
$resultjabatan	= mysql_query($queryjabatan) or die(mysql_error());
$datajabatan	= mysql_fetch_array($resultjabatan);

$yidjabatan      = $datajabatan['id'];
$ykodjabatan	= $datajabatan['kodjabatan'];
$ynamajabatan   = $datajabatan['jabatan'];

//table unit
$query_unit 	= "select * from tableunit WHERE kodunit = '$xunit'";
$result_unit 	= mysql_query($query_unit);
$data_unit 		= mysql_fetch_array($result_unit);

$unitid			= $data_unit['kodunit'];
$namaunit		= $data_unit['unit'];

//lokasidiphon
$query_lokasi 	= "SELECT * FROM tbllokasi WHERE l_id = '$xlokasimohon'";
$result_lokasi 	= mysql_query($query_lokasi);
$data_lokasi	= mysql_fetch_array($result_lokasi);

$lokasidb		= $data_lokasi['l_nama'];
$lokasid		= $data_lokasi['l_id'];

//TABLE JANTINA
$query_jantina 	= "select * from tbl_jantina where id = '$xjantina'";
$result_jantina = mysql_query($query_jantina);
$djantina		= mysql_fetch_array($result_jantina);

$yidjantina		= $djantina['id'];		
$ynamajantina	= $djantina['nama'];									                           

//TABLE STATUS KAWIN
$query_sp 		= "select * from tbl_statusperkahwinan where p_id = '$xstatusperkahwinan'";			
$result_sp 		= mysql_query($query_sp);
$dsp			= mysql_fetch_array($result_sp);	

$yspid			= $dsp['p_id'];
$yspnama         = $dsp['p_nama'];

//TABLE KATEGORI JAWATAN
$query_katjawatan 	  = "SELECT * FROM tbl_katjawatan WHERE t_id = '$xkatjawatan'";
$result_katjawatan    = mysql_query($query_katjawatan);
$data_katjawatan	  = mysql_fetch_array($result_katjawatan);

$ykatid 			  = $data_katjawatan['t_id'];
$ykatnama             = $data_katjawatan['t_kategori'];

//TABLE WAKTUBERTUGAS
$querywbetugas  = "SELECT * FROM tbl_waktubertugas WHERE id ='$xofficehour'";
$resultwbetugas = mysql_query($querywbetugas);
$datawbetugas   = mysql_fetch_array($resultwbetugas);

$ywbid 			= $datawbetugas['id'];
$ywbnama        = $datawbetugas['nama'];

//TABLE KATEGORI KELUARGA PEGAWAI PERUBATAN
$queryfam      = "SELECT * FROM tblkeluargapp WHERE k_id ='$xkatkeluarga'";
$resultfam     = mysql_query($queryfam);
$datafam       = mysql_fetch_array($resultfam);

$yid           = $datafam['k_id'];
$ynama         = $datafam['k_nama'];

//TABLE BILANGAN ANAK
$queryba = "SELECT * from tbl_bilanak WHERE id = '$xbilanak'";
$resultba = mysql_query($queryba);
$databa = mysql_fetch_array($resultba);
$yidanak	= $databa['id'];
$ynamanak	= $databa['bilangan'];


if(isset($_POST['hantar']) == "Hantar")
		{

			//$tmohon				= $_POST['hantar'];

		$query_btnhantar   		 = "UPDATE  tbl_pemohonan SET

		p_stathantar        	 =  '1'

		where p_id = '".mysql_real_escape_string($xid)."'";

		//echo $query_btnhantar;
		$resulthantar =  mysql_query($query_btnhantar) or die(mysql_error()
	);

		printf("<script> alert('DATA TELAH DI HANTAR.'); window.location ='listkontrak.php?id=$xid' </script>");

		}


	if(isset($_POST['submit'])== "Kemaskini")

	{

		$tmohon				= $_POST['tarikhm'];
		$lokasimohon		= $_POST['lokasi'];
		$id					= $_POST['nokp'];
		$nama				= $_POST['nama'];
		$jantina			= $_POST['jantina'];
		$statusperkahwinan	= $_POST['statusperkahwinan'];
		$telrumah			= $_POST['telrumah'];
		$telhp				= $_POST['telhp'];
		$telpejabat			= $_POST['telpejabat'];
		$katjawatan         = $_POST['kategori'];
		$jawatan			= $_POST['jawatan'];
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
		$pengesahan			= $_POST['pengesahan'];
	// checkbox tandatangan mohon 
		$tandamohon        = isset($_POST['checkmohon'])?1:0;

		
		$query_mohon   		 = "UPDATE  tbl_pemohonan SET

		
		p_tarikhmohon	     =	'".mysql_real_escape_string($tmohon	)."',
		p_lokasi  	         =	'".mysql_real_escape_string($lokasimohon)."',
		
		p_jantina	 	 	 =	'".mysql_real_escape_string($jantina)."',

		p_statusperkahwinan	 =	'".mysql_real_escape_string($statusperkahwinan)."',
		p_telrumah	    	 =	'".mysql_real_escape_string($telrumah)."',
		p_telhp 	     	 =	'".mysql_real_escape_string($telhp)."',
		p_telpejabat         =  '".mysql_real_escape_string($telpejabat)."',
		p_katjawatan	     =	'".mysql_real_escape_string($katjawatan	)."',
		p_jawatan  	         =	'".mysql_real_escape_string($jawatan)."',
		p_jabatan	 	 	 =	'".mysql_real_escape_string($tbertugas)."',
		p_unit				 =	'".mysql_real_escape_string($unit)."',
		p_tmulabertugas    	 =	'".mysql_real_escape_string($tberkhidmat)."',
		p_waktubertugas	     =	'".mysql_real_escape_string($officehour	)."',
		p_namapasangan       =  '".mysql_real_escape_string($namapasangan)."',
		p_icpasangan	     =	'".mysql_real_escape_string($nokppasangan	)."',
		p_jawatanpasangan 	 =	'".mysql_real_escape_string($jawatanpasangan)."',
		p_katkeluarga		 =	'".mysql_real_escape_string($katkeluarga)."',
		p_tkerjapasangan	 =	'".mysql_real_escape_string($tbpasangan	)."',
		p_wbpasangan	     =	'".mysql_real_escape_string($wbpasangan	)."',
		p_bilanak   		 =	'".mysql_real_escape_string($bilanak)."',
		p_alamatsekarang	 =	'".mysql_real_escape_string($alamatlama	)."',
		p_checkbox1        	 =  '".mysql_real_escape_string($checkbox1)."',
		p_checkbox2	         =	'".mysql_real_escape_string($checkbox2)."',
		p_checkbox3 	     =	'".mysql_real_escape_string($checkbox3)."',
		p_alamatrumahsd		 =	'".mysql_real_escape_string($alamatsendiri	)."',
		p_jarakrumah    	 =	'".mysql_real_escape_string($jarakrumah	)."',
		p_sebabmohon	     =	'".mysql_real_escape_string($sebabmohon	)."',
		p_pengesahan         =  '".mysql_real_escape_string($pengesahan)."',
		p_tandamohon         =  '".mysql_real_escape_string($tandamohon)."'


		where p_id = '".mysql_real_escape_string($xid)."'";
		$resultpat =  mysql_query($query_mohon) or die(mysql_error()
	);
		
		printf("<script> alert('PERMOHONAN KONTRAK TELAH DIHANTAR.'); window.location ='kemaskinikontrak.php?id=$xid' </script>");
	}

?>
			<?php
			$querynama     = "SELECT * FROM  tablepengguna WHERE nokadpengenalan = '" .$_SESSION['nokadpengenalan']."'";
			$resultnama    = mysql_query($querynama) or die(mysql_error());
			$datanama     = mysql_fetch_array($resultnama);

			$rnama   = $datanama ['namapemohon'];
			?>
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> SELAMAT DATANG <?php echo  $rnama;?></h4>
				</div>
				<!-- /.col-lg-12 -->
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
			<label>Tarikh Memohon</label></div>
			<div class="col-lg-6">
			  <label for="tarikhm">:</label>
              <input type="date" name="tarikhm" id="tarikhm" value="<?php echo $xtmohon; ?>">
			</div>								
			</div>	
										 
			<br><br>					
			<div class="form-group">
			<div class="col-lg-5">
			<label>Lokasi Kuarters Yang Dipohon</label></div>
			<div class="col-lg-6">
			  <label name="lokasi" id="lokasi" for="lokasi">:</label>
        
				  <?php
				  				$lokasi2 = "SELECT * FROM tbllokasi where l_jabatan ='$xtbertugas'";
				  				$query   = mysql_query($lokasi2);

									// $query_lokasi = "select * from tbllokasi";
									// $result_lokasi = mysql_query($query_lokasi) or die (mysql_error());
									echo "<select name=lokasi id=lokasi >";
									echo "<option value=$lokasid>$lokasidb</option>";
									while($data_lokasi = mysql_fetch_array($query))
									{
										echo "<option value = $data_lokasi[l_id]>$data_lokasi[l_nama]</option>";
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
<div class="panel panel-default">
	<div class="panel-heading">A) MAKLUMAT PEMOHONAN</div>
		<div class="panel-body">
			<div class="row">
			  						
			    	<div class="form-group">
			      		<div class="col-lg-4">Nama</div>
			      			<div class="col-lg-6">
			       				<label for="nama">:</label>
			        			<input type="text" name="nama" id="nama" size="70" value="<?php echo $nama; ?>">
		          			</div>
		        	</div>
 					<br><br>

					<div class="form-group">
						<div class="col-lg-4">No K/P</div>
							<div class="col-lg-6">
								<label for="nokp">:</label>
								 <input type="text" name="nokp" id="nokp" value="<?php echo $id; ?>">
							 </div>
					</div>
					<br><br>

					<div class="form-group">
						<div class="col-lg-4">Jantina</div>
							<div class="col-lg-6">
								<label  name="jantina" id="jantina" for="jantina">:</label>
								    														
										 <?php
																		
												$qjantina = "select * from tbl_jantina";
												$rjantina = mysql_query($qjantina);		
																		
					                            echo "<select name=jantina id=jantina>";
					                            echo "<option value = $yidjantina>$ynamajantina</option>";
												while($data_jantina = mysql_fetch_array($rjantina))
					                              {
													echo "<option value =$data_jantina[id]>$data_jantina[nama]</option>";
					                              }
					                            echo "</select>";
										?>
							        
							</div>
					 </div>
					 <br> <br>

					<div class="form-group">
						<div class="col-lg-4">Status Perkahwinan</div>
							<div class="col-lg-6">
								<p>
								<label name="statusperkahwinan" id="statusperkahwinan" for="statusperkahwinan">:</label>
					             											  
								   <?php		  
										$query_sp = "select * from tbl_statusperkahwinan";					
										$result_sp = mysql_query($query_sp);											  
										echo "<select name=statusperkahwinan id=statusperkahwinan>";
										echo "<option value = $yspid>$yspnama</option>";
										while($data_sp = mysql_fetch_array($result_sp))
										{
											echo "<option value =$data_sp[p_id]>$data_sp[p_nama]</option>";
										}
											echo "</select>";
											?> 
					              
								 </p>
							</div>
					</div>

					<div class="form-group">
						<div class="col-lg-4">No. Telefon</div>
							<div class="col-lg-6">
								<p>
								<label for="telrumah">:</label>
					              <input type="text" name="telrumah" id="telrumah" value="<?php echo $xtelrumah; ?>">(Rumah)
								</p>
								<p>
									<label for="telhp">:</label>
					            	<input type="text" name="telhp" id="telhp" value="<?php echo $xtelhp; ?>">(H/P)</p>
								<p>
									<label for="telpejabat">:</label>
					            	<input type="text" name="telpejabat" id="telpejabat" value="<?php echo $xtelpejabat; ?>">(Pejabat)
					        	</p>
							</div>
					 </div>
							     
					  <br><br>
			</div>
		</div>
</div>
			
<div class="panel panel-default">
	<div class="panel-heading">B) MAKLUMAT PEKERJAAN PEMOHONAN</div>
		<div class="panel-body">
			<div class="row">
			    <!--<div class="col-lg-8">-->
			    	<div class="form-group">
			  	     	<div class="col-lg-4">Kategori Jawatan</div>
			            	<div class="col-lg-6">
			             		<label name="kategori" id="kategori" for="kategori" size="50">:</label>
						            <?php
										$query_kat = "select * from tbl_katjawatan";
										$result_kat = mysql_query($query_kat) or die (mysql_error());
										echo "<select name=kategori id=kategori >";
										echo "<option value= $ykatid>$ykatnama</option>";
										while($data_kat = mysql_fetch_array($result_kat))
											{
											echo "<option value = $data_kat[t_id]>$data_kat[t_kategori]</option>";
											}
											echo "</select>";		   
									?>
			 			 	</div>
			 		</div>

			  		<br>

			  		<div class="form-group">
			      		<div class="col-lg-4">Jawatan</div>
			       			<div class="col-lg-6">
			          			<label name="jawatan" id="jawatan" for="jawatan">:</label>
                      		
								<?php
			                         $query_jawatan = "select * from tablejawatan ";
			                         $result_jawatan = mysql_query($query_jawatan) or die (mysql_error());
				                      	echo "<select name=jawatan id=jawatan>";
				                        echo "<option value= $yjawatid>$yjawatanama </option>";
			                       		 while($data_result = mysql_fetch_array($result_jawatan))
			                       		{
			                               echo "<option value= $data_result[id]>$data_result[jawatan]</option>";
			                            }
			                                echo "</select>";
								?>
                      		</div>	
		       		</div>
		      
		    

			    <br><br>
			    <div class="form-group">
			      	<div class="col-lg-4">Tempat Bertugas</div>
			     			<div class="col-lg-6">
			        			<label name="jabatan" id="jabatan"for="tbertugas">:</label>
									<?php
										$query1 = "select * from tablejabatan order by id ASC";
										$result1 = mysql_query($query1) or die (mysql_error());

										echo "<select name=jabatan id=jabatan>";
										echo "<option value=$yidjabatan>$ynamajabatan</option>";

										while($data = mysql_fetch_array($result1))
											{
											echo "<option value =$data[kodjabatan]>$data[jabatan]</option>";
											}
										echo "</select>";		   
									?>
			      			</div>
		        </div>
				<br><br>

			    <div class="form-group">
			      	<div class="col-lg-4">Unit </div>
			      		<div class="col-lg-6">
			        		<label name="unit" id="unit" for="unit">:</label>

								<?php
						
								$query2		= "select * from tableunit ";
								$result2	= mysql_query($query2);

								echo "<select name=unit id=unit>";
								echo "<option value='$unitid'>$namaunit</option>";

								while($_data = mysql_fetch_array($result2))
									{
										echo "<option value = $_data[kodunit]>$_data[unit]</option>";
									}
										echo "</select>";		   
									?>
			     		</div>
		        </div>
			    <br><br>

			    <div class="form-group">
			      	<div class="col-lg-4">Tarikh Mula Berkhidmat </div>
			     		<div class="col-lg-6">
			        		<label for="tberkhidmat">:</label>
                    		<input type="date" name="tberkhidmat" id="tberkhidmat" value="<?php echo $xtberkhidmat; ?>">
			      		</div>
		        </div>
		        <br><br>

			    <div class="form-group">
			     	<div class="col-lg-4">Waktu Bertugas</div>
			     		<div class="col-lg-6">
							<label name="officehour" id="officehour"for="officehour">:</label>																
									<?php
										$query_waktu = "select * from tbl_waktubertugas";
										$result_waktu = mysql_query($query_waktu) or die (mysql_error());
										echo "<select name=officehour id=officehour >";
										echo "<option value=$ywbid>$ywbnama</option>";
										while($data_waktu = mysql_fetch_array($result_waktu))
										{
											echo "<option value = $data_waktu[id]>$data_waktu[nama]</option>";
										}
											echo "</select>";		   
									?>
								</div>
				        
						</div>
				</div>
		</div>			 
</div>

<br>
		<div class="panel panel-default">
			<div class="panel-heading">c) MAKLUMAT KELUARGA PEMOHON</div>
				<div class="panel-body">
					<div class="row">
				
				<div class="form-group">
				    <div class="col-lg-4"> Nama Suami/Isteri 
				     </div>
				     	<div class="col-lg-6">
					       	<label for="npasangan">:</label>
					        <input type="text" name="npasangan" id="npasangan" size="70" value="<?php echo $xnamapasangan; ?>">
			          	</div>
			    </div>
							<br><br>

					 <div class="form-group">
						<div class="col-lg-4">No.K/P
							
						</div>
							<div class="col-lg-6">
								<label for="icpasangan">:</label>
								<input type="text" name="icpasangan" id="icpasangan" value="<?php echo $xnokppasangan; ?>">
							</div>
					</div>
				  <br> <br>

					<div class="form-group">
						<div class="col-lg-4">Jawatan</div>
							<div class="col-lg-6">
								<label for="jawatan">:</label>
						    	<input type="text" name="jawatanpasangan" id="jawatanpasangan" size="70" value="<?php echo $xjawatanpasangan; ?>">
							</div>
					</div>
				
				<br><br>

				<div class="form-group">
			      	<div class="col-lg-4">Kategori Keluarga	</div>
			      			<div class="col-lg-6">
			        			<label name="kategorikeluarga" id="kategorikeluarga" for="kategorikeluarga">:</label>
		                    	<!--<div name="kategorikeluarga" id="kategorikeluarga">-->
																 
									<?php
										$query_keluarga = "select * from tblkeluargapp";
										$result_keluarga = mysql_query($query_keluarga) or die (mysql_error());
										echo "<select name=kategorikeluarga id=kategorikeluarga >";
										echo "<option value=$yid>$ynama</option>";
										while($data_keluarga = mysql_fetch_array($result_keluarga))
										{
													echo "<option value = $data_keluarga[k_id]>$data_keluarga[k_nama]</option>";
										}
													echo "</select>";		   
									?>
							
		                    </div>
			    </div>
			    
			    <br>

			    <div class="form-group">
			      	<div class="col-lg-4">Tempat Bertugas</div>
			      		<div class="col-lg-6">
				        	<label for="tbertugaspasangan">:</label>
				        	<input type="text" name="tbertugaspasangan" id="tbertugaspasangan" size="70" value="<?php echo $xtbpasangan; ?>">
				      	</div>
		        </div>
			    <br><br>

			    <div class="form-group">
			      	<div class="col-lg-4">Waktu Bertugas</div>
			      		<div class="col-lg-6">
			        		<label name="ohpasangan" id="ohpasagan" for="ohpasangan">:</label>								 
								<?php
									$query_waktu = "select * from tbl_waktubertugas";
									$result_waktu = mysql_query($query_waktu) or die (mysql_error());
									echo "<select name=ohpasangan id=ohpasangan >";
									echo "<option value=$ywbid>$ywbnama</option>";
									while($data_waktu = mysql_fetch_array($result_waktu))
									{
										echo "<option value = $data_waktu[id]>$data_waktu[nama]</option>";
									}
										echo "</select>";		   
								?>
		                    
			    		</div>
			    </div>
			    <br>

			    <div class="form-group">
			      	<div class="col-lg-4">Bilangan Anak</div>
			      		<div class="col-lg-6">
			        		<label name="bilanak" id="bilanak" for="bilanak">:</label>
						
									<?php

									
										$qba	= "select * from tbl_bilanak";
										$rba	= mysql_query($qba);

										echo "<select name=bilanak id=bilanak>";
										echo "<option value= $yidanak>$ynamanak</option>";

										while($databa = mysql_fetch_array($rba))
										{
											echo "<option value = $databa[id]>$databa[bilangan]</option>";
										}
										echo "</select>";		   
									?>							
							
			     		</div>
			   
			    </div>
		</div>
	</div>
</div>


<br> 				
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">D) MAKLUMAT KEDIAMAN PEMOHON</div>
				<div class="panel-body">
					<div class="row">
			
			   		 <div class="form-group">
			      		<div class="col-lg-4">Alamat tempat tinggal sekarang (* sewa / rumah sendiri / keluarga)</div>
			     		 <div class="col-lg-6">
				        	<label for ="alamatlama">:</label>
				        	<input type="text" name="alamatlama" id="alamatlama" size="50" value="<?php echo $xalamatlama; ?>">
		         		</div>
		        	</div>
			    <br><br>

			    <div class="form-group">
				     <div class="col-lg-4">
				        <p>Adakah suami / isteri tuan / puan mempunyai rumah sendiri?(ya / tidak)jika ya, sila nyatakan * </p>
				        <!--<p>(ya / tidak)</p>
				        <p>jika ya, sila nyatakan *</p>-->
				      <br>
				        <!--<p>dan sila nyatakan,</p>-->
				     </div>
			      <div class="col-lg-6">
			      	<div>

				        <p>
							<input type="checkbox" name="fcheckbox1" id="fcheckbox1" <?php if (isset($xcheckbox1) && $xcheckbox1 == "1") echo "checked"; ?> value="1"> </input>
					        <label for="fcheckbox1">Pinjaman Perumahan Kerajaan</label>
				        </p>
					</div>
				        <p>
				          <input type="checkbox" name="fcheckbox2" id="fcheckbox2" <?php if (isset($xcheckbox2) && $xcheckbox2 == "1") echo "checked"; ?> value="1" />
	                      <label for="fcheckbox2">Pinjaman Bank</label></p>
				        <p>
				          <input type="checkbox" name="fcheckbox3" id="fcheckbox3" <?php if (isset($xcheckbox3) && $xcheckbox3 == "1") echo "checked"; ?> value="1"/>
	                    <label for="fcheckbox3">Lain - lain Punca </label></p>
			      </div>
		        </div>
			    <br><br>

			     <div class="form-group">
			      		<div class="col-lg-4">Alamat rumah</div>
			     		 <div class="col-lg-6">
				        	<label for ="alamatrumah">:</label>
				        	<input type="text" name="alamatrumah" id="alamatrumah" size="40" rows="3" value="<?php echo $xalamatsendiri; ?>">
		         		</div>
		        	</div>
			    <br><br>

			    <div class="form-group">
			      <div class="col-lg-4">Jarak rumah sendiri ke tempat bertugas </div>
			      <div class="col-lg-6">
			        <label for="jarakrumah">:</label>
                    <input type="text" name="jarakrumah" id="jarakrumah" value="<?php echo $xjarakrumah; ?>">
			      </div>
			      <br>
		        </div>
		     </div>
		 </div>
	</div> 
<div class="row">
<div class="col-lg-12">
  	<div class="panel panel-default">
        <div class="panel-heading">E) SEBAB - SEBAB MEMOHON RUMAH </div>
   			 <div class="panel-body">
          		<div class="row">	
             		<div class="form-group">
                		<div class="col-lg-10">Saya memohon menduduki Rumah Kerajaan kerana; </div>
							<div class="col-lg-10">
				                 <input type="text" name="sebabmohon" id="sebabmohon" size="150" value="<?php echo $xsebabmohon; ?>">
				             </div>
				                <div class="col-lg-10">
				                  <p>Saya mengaku bahawa segala keterangan yang diberikaan di atas adalah benar. Sekiranya keterangan saya adalah palsu, pihak pengurusan berhak mengambil sebarang tindakan ke atas saya. Saya juga *bersedia / tidak bersedia untuk bertugas jika dipanggil pada bila-bila masa diperlukan </p>
				                </div>
				     			<br>

				              <p><br></p>
				              <p>&nbsp;</p>
				              <p>&nbsp;</p>


				              <!-- tandatangan pemohon
				              	
				              <div class="col-lg-4">.......................................</div>
				              <p><br></p>
			             <div class="form-group">
			                <div class="col-lg-4">(Tandatangan Pemohon)</div>
			             </div>
              			<br><br>
							-->
						<div class="col-lg-6">
			      	<div>

				        <p>
							<input type="checkbox" name="tandamohon" id="tandamohon" <?php if (isset($xtandamohon) && $xtandamohon == "1") echo "checked"; ?> value="1"> </input>
					        <label for="tandamohon"><i>Sila klik bagi setuju untuk mohon</i></label>
				        </p>
					</div>
					</div>
						<div class="form-group">
			                <div class="col-lg-10">Dengan ini, saya mengesahkan bahawa segala butiran di atas adalah benar, saya menyokong permohonan ini kerana (sila berikan ulasan);
			                </div>
			            <br>
		              </div>

		              <div class="form-group">
		              	<div class="col-lg-10">
		                <input type="text" name="pengesahan" id="pengesahan" size="150" value="<?php echo $xpengesahan; ?>">
		               <br>
		              </div>
            		</div>
            		</div>
            	</div>
    		</div>
    		<span class="col-lg-6" align="center"></span>
	</div>
		<div class="form-group">
			<div class="col-lg-10" align="center">
				<!--<div class="col-lg-6"></div>-->
					<p>Sila pastikan kesemua maklumat adalah <b>TEPAT</b> sebelum menekan butang <b>HANTAR</b></p>
					<?php 


					if ($xhantar != '1')
					{ ?>
						<br>

						<input type="submit" class="btn btn-primary" name="submit"  value="Kemaskini Kontrak">
						
						<input type="submit" class="btn btn-primary" name="hantar" value="Hantar">


					<?php }


					else
					{	 ?>
					<a href="../TCPDF/PDF/borangpermohonan.php?id=<?php echo $xid; ?>"><input type="" class="btn btn-primary" name="cetak" value="Cetak Perjanjian Kontrak">
					<?php 
					}

					?>
				</a>

				</a>

				</div>
			
				
			</div>
		</div>	

		
</form>
</a>
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

</body>

</html>
