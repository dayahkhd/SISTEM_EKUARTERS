<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Senarai Permohonan Gagal</title>
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
    <?php
    // $querynama     = "SELECT * FROM  tablepengguna WHERE nokadpengenalan = '" .$_SESSION['login']."'";
    // $resultnama    = mysql_query($querynama) or die(mysql_error());
    // $datanama     = mysql_fetch_array($resultnama);

    // $rnama   = $datanama ['namapemohon'];
    ?>
<?php include('leftbar.php');?>
<div id="page-wrapper">

<div class="row">

    <?php


    //table user
    //s*f tbl user w user= $user
    $query      =   "SELECT * FROM tbluser WHERE user='$user'";
    $result     =   mysql_query($query) or die(mysql_error());
    $data       =   mysql_fetch_array($result);

    $biluser    = $data['bil'];
    
    $status = 1;


    $r              = date("Ymdhis");   // 14
    $r2             = rand(1000,9999);  //4
    $randomno       = "$r$r2";




?>

  <div class="col-lg-12">
                <h4 class="page-header"> <!-- SELAMAT DATANG <strong><em><?php echo  $rnama;?></strong></em> -->
                    <?php echo strtoupper("selamat datang"." ".htmlentities($_SESSION['namapegawai']));?></h4>
    <!-- /.col-lg-12 -->
</div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Senarai Permohonan yang Gagal
                    </div>
                    <div class="panel-body">
                        <table width="900" border="0">
                            <tr>
                                <td width="300" align="right"><label>Tarikh Mula</label></td>
                                <td width="300" align="center"><label>:</label></td> 
                                <td width="300"><input id="date1" name="date1" type="date"  class="datepicker, form-control" required/></td> 
                                
                                <td width="300" align="right"><label>Tarikh Akhir</label></td>              
                                <td width="300" align="center"><label>:</label></td> 
                                <td width="300"><input id="date2" name="date2" type="date"  class="datepicker, form-control" required/></td>
                                
                                <td width="300" align="center"><label></label></td>  
                                <td width="300" rowspan="1"><input type="submit"  name="submit" class="btn btn-primary" value="Hantar"></td> 
                            </tr>

                            <?php 
                              $querymohon     = "SELECT * FROM  tbl_pemohonan WHERE p_statmohon = 3" ;
                              
                                

                               if(isset($_POST['submit']) == "Hantar")
                                { 
                                    $tarikhm = $_POST['date1'];
                                    $tarikha = $_POST['date2'];
                                    

                                   $querymohon   = $querymohon." AND p_tarikhmohon between '$tarikhm' and '$tarikha'  ";
                                  

                                }

                                $resultmohon    = mysql_query($querymohon) or die(mysql_error());
                                $datamohon      = mysql_num_rows($resultmohon);

                             ?>
                            <tr>
                                    <td colspan="9" align="right"><?php //echo $he; ?><?php //echo $tarikhm.$tarikha; ?></td>
                                    <td width="53" rowspan="3">&nbsp;</td> 
                            </tr>
                        </table>
                    </div>
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Nama</th>
                                        <th>Tarikh Memohon</th>
                                        <th>Lokasi Kuarters yang Dipohon</th>
                                        <th>Status</th>
                                        <!--<th>Kategori Kontrak</th>-->
                                        <th>Tindakan</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                      <!-- this page will call list of pemohon who apply for kuarters: call table pemohonan-->
                      <?php 
                      // TABLE PEMOHONAN
                      //select * dari tble pemohon, dapatkan p_idstaff              
                        $querymohon     = "SELECT * FROM  tbl_pemohonan  where p_statmohon = '3' " ; // && p_kontrak = '1'
                        $resultmohon    = mysql_query($querymohon) or die(mysql_error());
                        $datamohon      = mysql_fetch_array($resultmohon); //mysql_num_rows
                    

                      if($datamohon < 1)
                      {
                          ?>
                          <tr><td colspan="5" align="center"> Tiada Maklumat </td></tr>
                          <?php
                      }
                      else
                      {
                          $sn = 1;
                          while($datamohon2 = mysql_fetch_array($resultmohon))
                          {
                              $xid            = $datamohon2 ['p_id'];  
                              $xidstaff       = $datamohon2 ['p_staff'];

                                $xtarikhmohon   = $datamohon2 ['p_tarikhmohon'];
                                $xlokasi        = $datamohon2 ['p_lokasi'];
                                $xstatus        = $datamohon2 ['p_statmohon']; 
                                $xkatpemohonan  = $datamohon2 ['p_kontrak'];

                        // call for TABLE LOKASI
                        $querylokasi     = "SELECT * FROM  tbl_lokasi WHERE l_id = '$xlokasi'";
                        $resultlokasi    = mysql_query($querylokasi) or die(mysql_error());
                        $datalokasi      = mysql_fetch_array($resultlokasi);

                        $ylokasi         = $datalokasi ['l_nama'];

                        //call for TABLE STATUS PEMOHONAN
                        $querymohon     = "SELECT * FROM  tbl_statmohon WHERE m_id = '$xstatus'";
                        $resultmohon    = mysql_query($querymohon) or die(mysql_error());
                        $datastatus     = mysql_fetch_array($resultmohon);

                        $ystatus         = $datastatus ['m_nama'];

                        // call for TABLE STATUS KONTRAK
                        // $querymohon     = "SELECT * FROM  tbl_statkontrak WHERE idkontrak = '$xkatpemohonan'";
                        // $resultmohon    = mysql_query($querymohon) or die(mysql_error());
                        // $datastatus     = mysql_fetch_array($resultmohon);

                        // $xstatkontrak         = $datastatus ['namakontrak'];
                        
                        //select tblepenguna utk nama
                        $querypengguna = "SELECT * FROM tablepengguna WHERE id = '$xidstaff'";
                        $resultpengguna = mysql_query($querypengguna) or die (mysql_error());
                        $penggunak = mysql_fetch_array($resultpengguna);

                        $nama = $penggunak['namapemohon'];
                                                
                        ?>
                        <!--to display on the list-->
                        <tr class="odd gradeX">
                            <td align='center'><?php echo $sn?></td>
                            <td><?php echo htmlentities(strtoupper($nama));?></td>
                            <td><?php echo htmlentities(strtoupper($xtarikhmohon));?></td>
                            <td><?php echo htmlentities(strtoupper($ylokasi ));?></td> 
                            <td><?php echo htmlentities(strtoupper($ystatus ));?></td>
                            <!--<td><?php //echo htmlentities(strtoupper($xstatkontrak ));?></td>  -->   
                                                              
                            <td align='center'>&nbsp;&nbsp;<a href="kemaskinipenghuni2.php?id=<?php echo htmlentities($xidstaff);?>">
                                <p class="fa fa-edit"></p></a>
                                  
                            </td>                                                    
                        </tr>
                        <?php
                        $sn++;
                        }
                          }
                          ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
    </div>
            <!-- /.row -->
</div>  
</form>           
           
  
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- date -->
    <script type="text/javascript">
        $(function() {
            $( "#date1" ).datepicker({dateFormat: 'dd-mm-yy'});
            $( "#date2" ).datepicker({dateFormat: 'dd-mm-yy'});
           
            $("#tabs").tabs();
            oTable = $('#example').dataTable({
                "sPaginationType": "full_numbers"
            });
            oTable = $('#example2').dataTable({
                "sPaginationType": "full_numbers"
            });
        });
    </script>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
