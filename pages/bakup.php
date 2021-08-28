<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Senarai</title>
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
    rel="stylesheet">
<link href="../bower_components/metisMenu/dist/metisMenu.min.css"
    rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../bower_components/font-awesome/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
</head>
<body>
    
</body>

<form method="post" >
    <div id="wrapper">
<?php include('leftbar.php'); ?>
    

<!--<div id="page-wrapper">-->
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
                <?php //echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?>
             </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Senarai Permohon
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Bil</th>
                                            <th>Nama Pemohon</th>
                                            <th>ID Pemohonan</th>
                                            <th>Tarikh Mohon</th>
                                            <th>Lokasi Kuarters</th>
                                            <th>Status</th>
                                            <th>Tindakan</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 

                              //table pengguna
                                                $queryguna      = "SELECT * FROM tablepengguna where nokadpengenalan='$user2'";
                                                $resultguna     = mysql_query($queryguna) or die (mysql_error());
                                                $dataguna       = mysql_fetch_array($resultguna);

                                                $idstaff             = $dataguna['id'];
                                                $namapengguna   = $dataguna ['namapemohon'];
                                                $icpengguna     = $dataguna ['nokadpengenalan'];

                                         // TABLE PERMOHON
                                            $querymohon     = "SELECT * FROM  tbl_pemohonan where p_kontrak ='2' and p_staff ='$idstaff' ";
                                            $resultmohon    = mysql_query($querymohon) or die(mysql_error());
                                            $datamohon     = mysql_num_rows($resultmohon);

                                            


                                            

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
                                                $xtmohon        = $datamohon2 ['p_tarikhmohon'];
                                                $xlokasimohon   = $datamohon2 ['p_lokasi'];
                                                $xstatushantar  = $datamohon2 ['p_stathantar'];
                                                $xidstaff       = $datamohon2 ['p_staff'];
                                                
                                                //TABLE LOKASI
                                                $querylokasimohon   = "SELECT * FROM  tbllokasi WHERE l_id = '$xlokasimohon'";
                                                $resultlokasimohon  = mysql_query($querylokasimohon) or die(mysql_error());
                                                $datalokasimohon    = mysql_fetch_array($resultlokasimohon);

                                                $ylokasi            = $datalokasimohon['l_nama'];

                                                //TABLE STATUS MOHON

                                                $querystatus   = "SELECT * FROM  tbl_stathantar WHERE h_id = '$xstatushantar'";
                                                $resultstatus  = mysql_query($querystatus) or die(mysql_error());
                                                $datastatus    = mysql_fetch_array ($resultstatus);

                                                $yhantar        = $datastatus['h_nama'];

                                                
                                            ?>

                                                <tr class="odd gradeX">
                                                    <td align='center'><?php echo $sn?></td>
                                                    <td><?php echo htmlentities(strtoupper($namapengguna));?></td>

                                                    <td><?php echo htmlentities(strtoupper($xid));?></td>
                                                    <td><?php echo htmlentities(strtoupper(date("m-d-Y", strtotime($xtmohon))));?></td>
                                                    <td><?php echo htmlentities(strtoupper($ylokasi ));?></td>
                                                    <td><?php echo htmlentities(strtoupper($yhantar ));?></td>  

                                                    <?php
                                                    if ($xid !== '0')  
                                                    {  
                                                        ?>                       
                                                    <td align='center'>&nbsp;&nbsp;<a href="kemaskinikontrak.php?id=<?php echo htmlentities($xid);?>">
                                                        <p class="fa fa-edit"></p></a>
                                                          
                                                    </td>  
                                                    <?php }


                                                     ?>

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
</div>

</form>           
           
  
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
