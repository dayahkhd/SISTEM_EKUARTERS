<?php

session_start ();

$ic 	=	$_SESSION['nokadpengenalan'];
//$j		=	$_SESSION['jabatan'];

require('../config/dbconnect.php');

//$ic = $_GET['nokadpengenalan'];

$query	= "SELECT * FROM tbl_pemohonan WHERE p_ic = '$ic'";
$result	= mysql_query($query) or die(mysql_error());
$data	= mysql_fetch_array($result);

$tmohon				= $data['p_tarikhmohon'];
$lokasimohon		= $data['p_lokasi'];
$id					= $data['p_ic'];
$nama				= $data['p_nama'];
$jantina			= $data['p_jantina'];
$statusperkahwinan	= $data['p_statusperkahwinan'];
$telrumah			= $data['p_telrumah'];
$telhp				= $data['p_telhp'];
$telpejabat			= $data['p_telpejabat'];
$jawatan			= $data['p_jawatan'];
$tbertugas			= $data['p_jabatan'];
$unit				= $data['p_unit'];
$tberkhidmat		= $data['p_tmulabertugas'];
$officehour			= $data['p_waktubertugas'];
$namapasangan		= $data['p_namapasangan'];
$nokppasangan		= $data['p_icpasangan'];
$jawatanpasangan	= $data['p_jawatanpasangan'];
$tbpasangan			= $data['p_tkerjapasangan'];
$wbpasangan			= $data['p_wbpasangan'];
$bilanak			= $data['p_bilanak'];
$alamatlama			= $data['p_alamatsekarang'];
$checkbox1			= $data['p_checkbox1'];
$checkbox2			= $data['p_checkbox2'];
$checkbox3			= $data['p_checkbox3'];
$alamatsendiri		= $data['p_alamatrumahsd'];
$jarakrumah			= $data['p_jarakrumah'];
$sebabmohon			= $data['p_sebabmohon'];
$pengesahan			= $data['p_pengesahan'];

//table jawatan
$queryjawatan	= "SELECT * FROM tablejawatan WHERE kod = '$jawatan'";
$resultjawatan	= mysql_query($queryjawatan) or die(mysql_error());
$_POSTjawatan	= mysql_fetch_array($resultjawatan);

//table jabatan
$queryjabatan	= "SELECT * FROM tablejabatan WHERE kodjabatan = '$tbertugas'";
$resultjabatan	= mysql_query($queryjabatan) or die(mysql_error());
$_POSTjabatan	= mysql_fetch_array($resultjabatan);

//table unit
$queryunit		= "SELECT * FROM tableunit WHERE kodunit = '$unit'";
$resultunit		= mysql_query($queryunit) or die(mysql_error());
$_POSTunit		= mysql_fetch_array($resultunit);

$query_lokasi 	= "select * from tbl_lokasi where l_id = '$lokasimohon'";
$result_lokasi 	= mysql_query($query_lokasi);
$dlokasi		= mysql_fetch_array($result_lokasi);
$lokasidb		= $dlokasi['l_nama'];

$query_jantina 	= "select * from tbl_jantina where id = '$jantina'";											                           
$result_jantina = mysql_query($query_jantina);
$djantina		= mysql_fetch_array($result_jantina);
$jantinadb		= $djantina['nama'];

$query_sp 		= "select * from tbl_statusperkahwinan where p_id = '$statusperkahwinan'";			
$result_sp 		= mysql_query($query_sp);
$dsp			= mysql_fetch_array($result_sp);	
$spdb		= $dsp['p_nama'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>register</title>
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link href="../bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
</head>

<body>
	<div id="wrapper">
	<?php include('leftbar.php');?>


		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> <?php echo strtoupper("welcome"." ".htmlentities($_SESSION['nokadpengenalan']));?></h4>
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
		    <div class="col-lg-4">
			<label>Tarikh Memohon</label></div>
			<div class="col-lg-6">
			  <label for="tmohon">:</label>
              <input type="date" name="tmohon" id="tmohon" value="<?php echo $tmohon; ?>">
			</div>								
			</div>								
			<br><br>					
			<div class="form-group">
			<div class="col-lg-4">
			<label>Lokasi Kuarters Yang Dipohon</label></div>
			<div class="col-lg-6">
			  <label for="lokasi">:</label>
              <div name="lokasi" id="lokasi">        
				  <?php
                                    
										
									$qlokasi2 = "select * from pwarganegara";
									$rlokasi2 = mysql_query($qlokasi2);
											
                                    echo "<select name = lokasi id = lokasi>";
                                    echo "<option value = '$lokasimohon'>$lokasidb</option>";
											
                                    while($_POSTlokasi = mysql_fetch_array($rlokasi2))
                                    {
                                        echo "<option value = $_POSTlokasi[l_id]>$_POSTlokasi[l_nama]</option>";
                                    } 
                                     echo "</select>";
                  ?>
              </div>
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
			  <div class="col-lg-12">
			    <div class="form-group">
			      <div class="col-lg-4">Nama</div>
			      <div class="col-lg-6">
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
			        <label for="jantina">:</label>
			        <div name="jantina" id="jantina">							
													
					 <?php
													
							$qjantina = "select * from pwarganegara";
							$rjantina = mysql_query($qjantina);		
													
                            echo "<select name=jantina id=jantina>";
                            echo "<option value = '$jantina'>$jantinadb</option>";
							while($data_jantina = mysql_fetch_array($rjantina))
                              {
										echo "<option value =$data_jantina[id]>$data_jantina[nama]</option>";
                              }
                            echo "</select>";
					?>
		            </div>
			      </div>
			      <br>
			      <br>
		        </div>
			    <div class="form-group">
			      <div class="col-lg-4">Status Perkahwinan</div>
			      <div class="col-lg-6">
			        <p>
			          <label for="statusperkahwinan">:</label>
                      <div name="statusperkahwinan" id="statusperkahwinan">											  
						<?php

																		  
								$query_sp = "select * from tbl_statusperkahwinan";					
								$result_sp = mysql_query($query_sp);
																		  
								echo "<select name=statusperkahwinan id=statusperkahwinan>";
								echo "<option value = '$statusperkahwinan'>$spdb</option>";
								while($data_sp = mysql_fetch_array($result_sp))
								  {
											echo "<option value =$data_sp[p_id]>$data_sp[p_nama]</option>";
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
			    <div class="form-group">
			      <div class="col-lg-4">No. Telefon</div>
			      <div class="col-lg-6">
			        <p>
			          <label for="telrumah">:</label>
                      <input type="text" name="telrumah" id="telrumah" value="<?php echo $telrumah; ?>">
			        (Rumah)</p>
			        <p>
			          <label for="telhp">:</label>
                      <input type="text" name="telhp" id="telhp" value="<?php echo $telhp; ?>">
(H/P)</p>
			        <p>
			          <label for="telpejabat">:</label>
                      <input type="text" name="telpejabat" id="telpejabat" value="<?php echo $telpejabat; ?>">
(Pejabat)</p>
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
			<div class="panel-heading">B) MAKLUMAT PEKERJAAN PEMOHONAN</div>
			<div class="panel-body">
			<div class="row">
			  <div class="col-lg-12">
			    <div class="form-group">
			      <div class="col-lg-4">Jawatan</div>
			      <div class="col-lg-8">
			        <label for="jawatan">:</label>
						<?php

							$query_jawatan = "select * from tablejawatan WHERE kod = '$jawatan'";
							$result_jawatan = mysql_query($query_jawatan);
							$data_jawatan = mysql_fetch_array($result_jawatan);

							$result_jawatan	= $data_jawatan['jawatan'];

							$query = "select * from tablejawatan order by id ASC";
							$result = mysql_query($query);

							echo "<select name=jawatan id=jawatan>";
							echo "<option value='$jawatan'>$result_jawatan</option>";

							while($_POST = mysql_fetch_array($result_jawatan))
							{
								echo "<option value = $_POST[kod]>$_POST[jawatan]</option>";
							}
							echo "</select>";		   
						?>		
		          </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">
			        <label>Tempat Bertugas</label></div>
			      <div class="col-lg-6">
			        <label for="tbertugas">:</label>
						<?php
							$query_tbertugas = "select * from tablejabatan WHERE kodjabatan = '$tbertugas'";
							$result_tbertugas = mysql_query($query_tbertugas);
							$data_tbertugas = mysql_fetch_array($result_tbertugas);

							$result_tbertugas	= $data_tbertugas['jabatan'];

							$query1 = "select * from tablejabatan order by id ASC";
							$result1 = mysql_query($query1);

							echo "<select name=jabatan id=jabatan>";
							echo "<option value='$tbertugas'>$result_tbertugas</option>";

							while($_POST = mysql_fetch_array($result_tbertugas))
							{
								echo "<option value = $_POST[kodjabatan]>$_POST[jabatan]</option>";
							}
							echo "</select>";		   
						?>
			      </div>
		        </div>
				<br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">
			        <label>Unit</label></div>
			      <div class="col-lg-6">
			        <label for="unit">:</label>
						<?php

							$query_unit = "select * from tableunit WHERE kodunit = '$unit'";
							$result_unit = mysql_query($query_unit);
							$data_unit = mysql_fetch_array($result_unit);

							$result_unit	= $data_unit['unit'];

							$query2		= "select * from tableunit order by id ASC";
							$result2	= mysql_query($query2);

							echo "<select name=unit id=unit>";
							echo "<option value='$unit'>$result_unit</option>";

							while($_POST = mysql_fetch_array($result_unit))
							{
								echo "<option value = $_POST[kodunit]>$_POST[unit]</option>";
							}
							echo "</select>";		   
						?>
			      </div>
		        </div>
			    <br>
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
			        <p>
			          <label for="officehour">:</label>
                      <div name="officehour" id="officehour">
															
						<?php

							$queryoh = "select * from tbl_waktubertugas WHERE id = '$wbpasangan'";
							$resultoh = mysql_query($queryoh);
							$dataoh = mysql_fetch_array($resultoh);

							$resultoh	= $dataoh['nama'];

							$queryoh2	= "select * from tbl_waktubertugas";
							$resultoh2	= mysql_query($queryoh2);

							echo "<select name=ohpasangan id=ohpasangan>";
							echo "<option value='$wbpasangan'>$resultoh</option>";

							while($_POSToh = mysql_fetch_array($resultoh2))
							{
								echo "<option value = $_POSToh[id]>$_POSToh[nama]</option>";
							}
							echo "</select>";		   
						?>	
															
                      </div>
			        </p>
			      </div>
		        </div>
			    <br>
			    <div class="form-group"><br>
		        </div>
		      </div>
			  <br><br>
		</div>
      	</div>
		</div>
			
		<div class="row">
			<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading">c) MAKLUMAT KELUARGA PEMOHON</div>
			<div class="panel-body">
			<div class="row">
			  <div class="col-lg-12">
			    <div class="form-group">
			      <div class="col-lg-4">Nama Suami / Isteri</div>
			      <div class="col-lg-6">
			        <label for="npasangan">:</label>
			        <input type="text" name="npasangan" id="npasangan" size="70" value="<?php echo $namapasangan; ?>">
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
			        <input type="text" name="icpasangan" id="icpasangan" value="<?php echo $nokppasangan; ?>">
		          </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Jawatan</div>
			      <div class="col-lg-6">
			        <label for="jawatan">:</label>
                    <input type="text" name="jawatanpasangan" id="jawatanpasangan" size="70" value="<?php echo $jawatanpasangan; ?>">
			      </div>
			      <br>
			      <br>
		        </div>
			    <div class="form-group">
			      <div class="col-lg-4">Tempat Bertugas</div>
			      <div class="col-lg-6">
			        <label for="tbertugaspasangan">:</label>
			        <input type="text" name="tbertugaspasangan" id="tbertugaspasangan" size="70" value="<?php echo $tbpasangan; ?>">
			      </div>
		        </div>
			    <br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Waktu Bertugas</div>
			      <div class="col-lg-6">
			        <label for="ohpasangan">:</label>
                    <div name="ohpasangan" id="ohpasagan">
														 
						<?php

							$queryoh2 = "select * from tbl_waktubertugas WHERE id = '$wbpasangan'";
							$resultoh2 = mysql_query($queryoh2);
							$dataoh2 = mysql_fetch_array($resultoh2);

							$resultoh	= $dataoh2['nama'];

							$queryoh3	= "select * from tbl_waktubertugas";
							$resultoh3	= mysql_query($queryoh2);

							echo "<select name=ohpasangan id=ohpasangan>";
							echo "<option value='$wbpasangan'>$resultoh</option>";

							while($_POSToh3 = mysql_fetch_array($resultoh3))
							{
								echo "<option value = $_POSToh3[id]>$_POSToh3[nama]</option>";
							}
							echo "</select>";		   
						?>
                    </div>
			      </div>
			      <br>
		        </div>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Bilangan Anak</div>
			      <div class="col-lg-6">
			        <label for="bilanak">:</label>
					<div name="bilanak" id="bilanak">
						<?php

							$queryba = "select * from tbl_bilanak WHERE id = '$bilanak'";
							$resultba = mysql_query($queryba);
							$databa = mysql_fetch_array($resultba);

							$resultba	= $databa['bilangan'];

							$qba	= "select * from tbl_bilanak";
							$rba	= mysql_query($qba);

							echo "<select name=bilanak id=bilanak>";
							echo "<option value='$bilanak'>$resultba</option>";

							while($_POSTba = mysql_fetch_array($rba))
							{
								echo "<option value = $_POSTba[id]>$_POSTba[bilangan]</option>";
							}
							echo "</select>";		   
						?>							
						
                    </div>
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
			<div class="panel panel-default">
			<div class="panel-heading">D) MAKLUMAT KEDIAMAN PEMOHON</div>
			<div class="panel-body">
			<div class="row">
			
			    <div class="form-group">
			      <div class="col-lg-4">Alamat tempat tinggal sekarang (* sewa / rumah sendiri / keluarga)</div>
			      <div class="col-lg-6">
			        <label for="alamatlama">:</label>
			        <input type="text" name="alamatlama" id="alamatlama" size="80" rows="3" value="<?php echo $alamatlama; ?>">
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
                    <input name="alamatrumah" type="text" id="alamatrumah" size="50" value="<?php echo $alamatsendiri; ?>">
			      </div>
			      <br>
		        </div>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Jarak rumah sendiri ke tempat bertugas </div>
			      <div class="col-lg-6">
			        <label for="jarakrumah">:</label>
                    <input type="text" name="jarakrumah" id="jarakrumah" value="<?php echo $jarakrumah; ?>">
			      </div>
			      <br>
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
<div class="col-lg-12">
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
                  <input type="text" name="sebabmohon" id="sebabmohon" size="150" value="<?php echo $sebabmohon; ?>">
                </p>
              </div>
              <p><br>
              </p>
              <p><br>
              </p>
              <div class="form-group">
                <div class="col-lg-10">
                  <p>Saya mengaku bahawa segala keterangan yang diberikaan di atas adalah benar. Sekiranya keterangan saya adalah palsu, pihak pengurusan berhak mengambil sebarang tindakan ke atas saya. Saya juga *bersedia / tidak bersedia untuk bertugas jika dipanggil pada bila-bila masa diperlukan </p>
                </div>
              </div>
              <p><br>
              </p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <div class="col-lg-4">.......................................</div>
              <p><br>
              </p>
              <div class="form-group">
                <div class="col-lg-4">(Tandatangan Pemohon)</div>
              </div>
              <br>
              <br>
              <div class="form-group">
                <div class="col-lg-10">Dengan ini, saya mengesahkan bahawa segala butiran di atas adalah benar, saya menyokong permohonan ini kerana (sila berikan ulasan);</div>
                <br>
              </div>
              <div class="form-group">
                <input type="text" name="pengesahan" id="pengesahan" size="150" value="<?php echo $pengesahan; ?>">
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
    </div>
    <!--row!-->
    <span class="col-lg-6" align="center">
    </span></div>
</div>
<script>

</script>
</body>

</html>
