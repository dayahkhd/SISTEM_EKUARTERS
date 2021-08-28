<?php
session_start ();

require('../config/dbconnect.php');


if (! (isset ( $_SESSION ['login'] ))) 
{
	header ( 'location:../index.php' );
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
<title>Senarai Daftar</title>
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
    <?php
    $querynama     = "SELECT * FROM  tablepengguna WHERE nokadpengenalan = '" .$_SESSION['login']."'";
    $resultnama    = mysql_query($querynama) or die(mysql_error());
    $datanama     = mysql_fetch_array($resultnama);

    $rnama   = $datanama ['namapemohon'];
    ?>
<?php include('leftbar.php');?>
<div id="page-wrapper">

    <div class="row">

          <div class="col-lg-12">
                    <h4 class="page-header"> SELAMAT DATANG <strong><em><?php echo  $rnama;?></strong></em></h4>
                        <?php //echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?>
        <!-- /.col-lg-12 -->
    </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Senarai Daftar
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Bil</th>
                                            <th>Aset</th>
                                            <th>Kelas</th>
                                            <th>Lokasi</th>
                                            <th>Gred</th>
                                            <th>Tindakan</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                         // TABLE DAFTARKUARTERS
											$querydaftar     = "SELECT * FROM  tbl_daftarkuarter ";
											$resultdaftar    = mysql_query($querydaftar) or die(mysql_error());
											$datadaftar     = mysql_fetch_array($resultdaftar);

											$xdaftarasset   = $datadaftar ['k_idasset'];
											$xalamat		= $datadaftar ['k_alamatrumah'];
											$xkelas 		= $datadaftar ['k_kelas'];
											$xgred          = $datadaftar ['k_gred'];
											$xlokasi        = $datadaftar ['k_lokasi'];
											$xjenisasset    = $datadaftar ['k_jenisasset'];
											$xjenisrumah    = $datadaftar ['k_jenisrumah'];

                                        if($datadaftar < 1)
                                        {
                                            ?>
                                            <tr><td colspan="5" align="center"> Tiada Maklumat </td></tr>
                                            <?php
                                        }
                                        else
                                        {
                                            $sn = 1;
                                            while($datadaftar2 = mysql_fetch_array($resultdaftar))
                                            {
                                                $xdaftarasset   = $datadaftar2 ['k_idasset'];
                                                $xkelas 		= $datadaftar2 ['k_kelas'];
                                              	$xlokasi        = $datadaftar2 ['k_lokasi'];
                                               	$xgred          = $datadaftar2 ['k_gred'];
                                          		$xid            = $datadaftar2 ['k_id'];
                                                
                                               //TABLE KELAS
												$querykelas     = "SELECT * FROM  tbl_kelas WHERE s_id = '$xkelas'";
												$resultkelas    = mysql_query($querykelas) or die(mysql_error());
												$datakelas      = mysql_fetch_array($resultkelas);

												$ykelas			= $datakelas['s_nama'];
												$ykelasdeposit  = $datakelas['s_deposit'];

                                                //TABLE LOKASI
												$querylokasi   = "SELECT * FROM  tbl_lokasi WHERE l_id = '$xlokasi'";
												$resultlokasi  = mysql_query($querylokasi) or die(mysql_error());
												$datalokasi    = mysql_fetch_array($resultlokasi);

												$ylokasi       = $datalokasi['l_nama'];

												// TABLE GRED
												$querygred     = "SELECT * FROM  tbl_gred WHERE g_id = '$xgred'";
												$resultgred    = mysql_query($querygred) or die(mysql_error());
												$datagred      = mysql_fetch_array($resultgred);

												$ygred         = $datagred['g_jawatan'];
                                                
                                            ?>

                                                <tr class="odd gradeX">
                                                    <td align='center'><?php echo $sn?></td>
                                                    <td><?php echo htmlentities(strtoupper($xdaftarasset));?></td>
                                                    <td><?php echo htmlentities(strtoupper($ykelas	));?></td>
                                                    <td><?php echo htmlentities(strtoupper($ylokasi ));?></td>
                                                    <td><?php echo htmlentities(strtoupper($ygred ));?></td>  
                                                                                      
                                                    <td align='center'>&nbsp;&nbsp;<a href="kemaskini.php?id=<?php echo htmlentities($xid);?>">
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
