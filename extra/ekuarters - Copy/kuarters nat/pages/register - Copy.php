<?php

session_start ();

$u 	=	$_SESSION['nokadpengenalan'];
$j	=	$_SESSION['jabatan'];

require('../config/dbconnect.php');

$query	= "SELECT * FROM tablepengguna WHERE nokadpengenalan = '$u'";
$result	= mysql_query($query) or die(mysql_error());
$data	= mysql_fetch_array($result);


$id				= $data['nokadpengenalan'];
$nama			= $data['namapemohon'];
$jawatan		= $data['jawatan'];

$tbertugas		= $data['jabatan'];
$unit			= $data['unit'];
$tberkhidmat	= $data['tarikhlantik'];

//table jawatan
$queryjawatan	= "SELECT * FROM tablejawatan WHERE kod = '$jawatan'";
$resultjawatan	= mysql_query($queryjawatan) or die(mysql_error());
$datajawatan	= mysql_fetch_array($resultjawatan);

//table jabatan
$queryjabatan	= "SELECT * FROM tablejabatan WHERE kodjabatan = '$tbertugas'";
$resultjabatan	= mysql_query($queryjabatan) or die(mysql_error());
$_POSTjabatan	= mysql_fetch_array($resultjabatan);

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
		$tmohon				= $_POST['tmohon'];
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
		$kategoripemohon    = '2';
		//declare terus status (cth:pemohon=2)
		
		$querylast = "SELECT * from tbl_pemohonan order by p_id desc limit 1";
		$resultlast = mysql_query($querylast) or die(mysql_error());
		$datalast = mysql_fetch_array($resultlast);
		
		$query = "INSERT INTO tbl_pemohonan 
		(p_tarikhmohon, p_lokasi, p_ic, p_nama, p_jantina, p_statusperkahwinan, p_telrumah, p_telhp, p_telpejabat,p_katjawatan, p_jawatan, p_jabatan, p_unit, p_tmulabertugas, p_waktubertugas,  p_namapasangan, p_icpasangan, p_jawatanpasangan, p_tkerjapasangan, p_wbpasangan, p_bilanak, p_alamatsekarang, p_checkbox1, p_checkbox2, p_checkbox3, p_alamatrumahsd, p_jarakrumah, p_sebabmohon, p_pengesahan)
		VALUES
		('$tmohon', '$lokasimohon', '$id', '$nama', '$jantina', '$statusperkahwinan', '$telrumah', '$telhp', '$telpejabat','$katjawatan','$jawatan', '$tbertugas', '$unit', '$tberkhidmat', '$officehour', '$namapasangan', '$nokppasangan', '$jawatanpasangan', '$tbpasangan','$wbpasangan', '$bilanak', '$alamatlama', '$checkbox1', '$checkbox2', '$checkbox3', '$alamatsendiri', '$jarakrumah', '$sebabmohon', '$pengesahan')";
		
		$result = mysql_query($query) or die(mysql_error());
		$fid = mysql_insert_id();

//update
		$queryUpd     = "UPDATE tablepengguna SET
		kategori	  =	'".mysql_real_escape_string($kategoripemohon)."'
	
		where nokadpengenalan = '".mysql_real_escape_string($id)."'";
		$resultpat =  mysql_query($queryUpd) or die(mysql_error());
		
		printf("<script> alert('DATA TELAH DIKEMASKINI .'); window.location = 'listpemohon.php?id=$id' </script>");
	}  
	 
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
<title>Permohonan Kuarters</title>
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
	<!--<?php include('leftbar.php');?>-->
	<div id="page-wrapper">
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
              <input type="date" name="tmohon" id="tmohon">
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
                                    $query_lokasi = "select * from tbl_lokasi order by l_id ASC";
                                    $result_lokasi = mysql_query($query_lokasi) or die (mysql_error());
                                    echo "<select name=lokasi id=lokasi class=form-control>";
                                    echo "<option></option>";
                                    while($data_lokasi = mysql_fetch_array($result_lokasi))
                                    {
                                        echo "<option value =$data_lokasi[l_id]>$data_lokasi[l_nama]</option>";
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
                            $query_jantina = "select * from tbl_jantina order by id ASC";											                               $result_jantina = mysql_query($query_jantina) or die (mysql_error());
                            echo "<select name=jantina id=jantina class=form-control>";
                            echo "<option></option>";
							while($data_jantina = mysql_fetch_array($result_jantina))
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
								$query_sp = "select * from tbl_statusperkahwinan order by p_id ASC";											                               $result_sp = mysql_query($query_sp) or die (mysql_error());
								echo "<select name=statusperkahwinan id=statusperkahwinan class=form-control>";
								echo "<option></option>";
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

		        
			    <br>

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
			      <div class="col-lg-4">Kategori Jawatan</div>
			      <div class="col-lg-6">
			        <label for="kategori"></label>
			        <?php
						$query_kat = "select * from tbl_katjawatan";
						$result_kat = mysql_query($query_kat) or die (mysql_error());
						echo "<select class=form-control name=kategori id=kategori >";
						echo "<option value = ->Sila Pilih...</option>";
						while($data_kat = mysql_fetch_array($result_kat))
						{
						echo "<option value = $data_kat[t_id]>$data_kat[t_kategori]</option>";
						}
						echo "</select>";		   
			?>

			  </div>

			  	    <div class="form-group">
			      <div class="col-lg-4">Jawatan</div>
			      <div class="col-lg-6">
			        <p>
			          <label for="jawatan">:</label>
                      <div name="jawatan" id="jawatan">
						   <?php
                                    $query_jawatan = "select * from tablejawatan order by id ASC";
                                    $result_jawatan = mysql_query($query_jawatan) or die (mysql_error());
                                    echo "<select name=jawatan id=jawatan class=form-control>";
                                    echo "<option></option>";
                                    while($dataresult = mysql_fetch_array($result_jawatan))
                                    {
                                        echo "<option value =$dataresult[id]>$dataresult[jawatan]</option>";
                                     }
                                     echo "</select>";
						  ?>
                      </div>
			        </p>
			      </div>
		        </div>
			      <br>

			      
		    
		</div>
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
		 

				<br>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">
			        <label>Unit</label></div>
			      <div class="col-lg-6">
			        <label for="unit">:</label>
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
			        <p>
			          <label for="officehour">:</label>
                      <div name="officehour" id="officehour">
						   <?php
                                    $queryofficehour = "select * from tbl_waktubertugas order by id ASC";
                                    $resultofficehour = mysql_query($queryofficehour) or die (mysql_error());
                                    echo "<select name=officehour id=officehour class=form-control>";
                                    echo "<option></option>";
                                    while($dataofficehour = mysql_fetch_array($resultofficehour))
                                    {
                                        echo "<option value =$dataofficehour[id]>$dataofficehour[nama]</option>";
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
			      <div class="col-lg-6">
			        <label for="jawatan">:</label>
                    <input type="text" name="jawatanpasangan" id="jawatanpasangan" size="70">
			      </div>
			      <br>
			      <br>
		        </div>
			    <div class="form-group">
			      <div class="col-lg-4">Tempat Bertugas</div>
			      <div class="col-lg-6">
			        <label for="tbertugaspasangan">:</label>
			        <input type="text" name="tbertugaspasangan" id="tbertugaspasangan" size="70">
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
                                    $queryofficehour2 = "select * from tbl_waktubertugas order by id ASC";
                                    $resultofficehour2 = mysql_query($queryofficehour2) or die (mysql_error());
                                    echo "<select name=ohpasangan id=ohpasangan class=form-control>";
                                    echo "<option></option>";
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
			      <div class="col-lg-4">Bilangan Anak</div>
			      <div class="col-lg-6">
			        <label for="bilanak">:</label>
					<div name="bilanak" id="bilanak">
						<?php
                                    $querybilanak = "select * from tbl_bilanak order by id ASC";
                                    $resultbilanak = mysql_query($querybilanak) or die (mysql_error());
                                    echo "<select name=bilanak id=bilanak class=form-control>";
                                    echo "<option></option>";
                                    while($databilanak = mysql_fetch_array($resultbilanak))
                                    {
                                        echo "<option value =$databilanak[id]>$databilanak[bilangan]</option>";
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
			        <input type="text" name="alamatlama" id="alamatlama" size="80" rows="3">
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
                    <input name="alamatrumah" type="text" id="alamatrumah" size="50">
			      </div>
			      <br>
		        </div>
			    <br>
			    <div class="form-group">
			      <div class="col-lg-4">Jarak rumah sendiri ke tempat bertugas </div>
			      <div class="col-lg-6">
			        <label for="jarakrumah">:</label>
                    <input type="text" name="jarakrumah" id="jarakrumah">
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
                  <input type="text" name="sebabmohon" id="sebabmohon" size="80">
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
                <div class="col-lg-10">Dengan ini, saya mengesahkan bahawa segala butiran di atas adalah benar, saya menyokong permohonan ini kerana (sila berikan ulasan);</div>
                <br>
              </div>
              <div class="form-group">
                <input name="pengesahan" type="text" id="pengesahan" size="80">
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
</div>
</p>



	<span class="col-lg-6" align="right">
     <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan">
    </span>
    </body>
</html>

			          