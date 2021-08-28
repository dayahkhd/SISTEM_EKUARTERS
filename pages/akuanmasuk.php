<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Sijil Akuan Masuk Rumah</title>
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
    <?php include('leftbar.php'); ?>
    <div id="page-wrapper">
      <div class="row">
        <div  class="col-lg-12">
          <h4 class="page-header"><?php echo strtoupper("selamat datang"." ".htmlentities($_SESSION['namapegawai']));?></h4>
        </div>
      </div>
      <div class="row">
        <?php 
          $query      =   "SELECT * FROM tbluser WHERE user='$user'";
          $result     =   mysql_query($query) or die(mysql_error());
          $data       =   mysql_fetch_array($result);

          $biluser    = $data['bil'];
          
          $status     = 1;


          $r          = date("Ymdhis");   // 14
          $r2         = rand(1000,9999);  //4
          $randomno   = "$r$r2";

          // $fid = $_GET['id'];

          $queryp     = "SELECT * from tbl_pemohonan "; //WHERE p_id = '$id'"
          $resultp    = mysql_query($queryp) or die(mysql_error());
          $datap      = mysql_fetch_array($resultp);

          $idstaff          = $datap['p_staff'];
          $dalamattawaran   = $datap['p_alamattawaran'];

          $queryq     = "SELECT * from tablepengguna WHERE id = '$idstaff'";
          $resultq    = mysql_query($queryq) or die(mysql_error());
          $dataq      = mysql_fetch_array($resultq);

          $spic       = $dataq['nokadpengenalan'];
          $spnama     = $dataq['namapemohon'];
          $sjabatan   = $dataq['jabatan'];
          

          //table jabatan
          $queryjabatan = "SELECT * FROM tablejabatan WHERE kodjabatan = '$sjabatan'";
          $resultjabatan  = mysql_query($queryjabatan) or die(mysql_error());
          $datajabatan  = mysql_fetch_array($resultjabatan);

          $sdjabatan = $datajabatan['jabatan'];

          $queryalamat = "SELECT * from tblalamat WHERE a_id = '$dalamattawaran'";
          $resultalamat = mysql_query($queryalamat);
          $dataalamat = mysql_fetch_array($resultalamat);
          $sdalamat = $dataalamat ['a_nama'];

        ?>
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">SIJIL AKUAN MASUK RUMAH - P.A 'E' 29 </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                      <div class="col-lg-4">
                        <label>Tarikh Masuk Rumah:</label>
                      </div>
                          <div class="col-lg-6">
                            <input type="date" name="tmasuk" id="tmasuk">
                          </div>
                      
                    </div><br>
                    <div class="form-group">
                      <div class="col-lg-4">
                        <label>Alamat Rumah Tawaran:</label>
                      </div>
                          <div class="col-lg-6">
                            <!-- <input class="form-control" name="tmasuk" id="tmasuk" value=""> --><?php echo $sdalamat ?>
                          </div>
                      
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <div class="col-lg-10">
                      <p>Dengan ini diakui bahawa saya telah menduduki rumah tersebut di atas mulai tarikh seperti yang tertera. Semua alat, perabot seperti dalam Buku Daftar Barang-Barang, dan kawasan rumah ini didapati dalam keadaan yang baik, kecuali yang tersebut di bawah. Dengan ini saya membenarkan sewa rumah dan perabot dipotong daripada gaji saya.</p>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <div class="col-lg-4">
                        <label>Maklumat Penerima Rumah</label>
                      </div>
                  </div><br>
                  <div class="form-group">
                    <div class="col-lg-4">
                        <label>Nama:</label>
                      </div>
                          <div class="col-lg-6">
                            <?php echo $spnama; ?>
                          </div>
                  </div><br>
                  <div class="form-group">
                    <div class="col-lg-4">
                        <label>No Kad Pengenalan:</label>
                      </div>
                          <div class="col-lg-6">
                            <?php echo $spic; ?>
                          </div>
                  </div><br>
                  <div class="form-group">
                    <div class="col-lg-4">
                        <label>Jabatan:</label>
                      </div>
                          <div class="col-lg-6">
                            <?php echo $sdjabatan; ?>
                          </div>
                  </div><br>
                </div><br>
                <div class="row">
                  <div class="form-group">
                      <div class="col-lg-10">
                        <label>Catatan pegawai masuk tentang keadaan rumah/perabot<span id="" style="font-size:11px;color:red">*</span> </label>
                      </div>
                  </div><br>
                  <div class="form-group">
                    <div class="col-lg-4">
                        <label>Nama:</label>
                      </div>
                          <div class="col-lg-6">
                            <input class="form-control" name="pnama" id="pnama">
                          </div>
                  </div><br>
                  <div class="form-group">
                    <div class="col-lg-4">
                        <label>Jabatan:</label>
                      </div>
                          <div class="col-lg-6">
                            <input class="form-control" name="jabatan" id="jabatan">
                          </div>
                  </div><br>
                  <div class="form-group">
                    <div class="col-lg-4">
                        <label>Jawatan:</label>
                      </div>
                          <div class="col-lg-6">
                            <input class="form-control" name="jawatan" id="jawatan">
                          </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <div class="col-lg-10">
                        <label>Catatan Pegawai Perumahan</label>
                    </div>
                </div><br>
                <div class="form-group">
                  <div class="col-lg-4">
                        <label>Nama:</label>
                      </div>
                          <div class="col-lg-6">
                            <input class="form-control" name="ppnama" id="ppnama">
                          </div>
                </div><br>
                <div class="form-group">
                  <div class="col-lg-4">
                        <label>Jawatan:</label>
                      </div>
                          <div class="col-lg-6">
                            <input class="form-control" name="pjawatan" id="pjawatan">
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


  <span class="col-lg-6" align="center">
     <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan">
  </span>
    </body>
</html>
