<?php
session_start ();
    // CONNECT DATABASE
    require ('../config/dbconnect.php');

    $user       =   $_SESSION['user'];
    $jabatan    =   $_SESSION['jabatan'];
    $authlevel  =   $_SESSION['authlevel'];
	$namapegawai  =   $_SESSION['namapegawai'];

    //table user
    //s*f tbl user w user= $user
    $query      =   "SELECT * FROM tbluser WHERE user='$user'";
    $result     =   mysql_query($query) or die(mysql_error());
    $data       =   mysql_fetch_array($result);

    $biluser                  = $data['bil'];
	
	$status = 1;


if (! (isset ( $_SESSION ['user'] )))
{
    header ( 'location:../index.php' );
} 

	$r 				= date("Ymdhis");	// 14
	$r2 			= rand(1000,9999);	//4
	$randomno 		= "$r$r2";
	
?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Senarai Borang Kendiri</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<style type="text/css">
.wsc {
	white-space: pre;
	word-wrap: break-word;
	max-width:60;
}

.fw {
	word-wrap:
}

</style>
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      
    <!--  <?php include('leftbar.php')?>; -->

           
         <nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   <h4 class="page-header"> <?php echo strtoupper("selamat datang"." ".htmlentities($_SESSION['namapegawai']));?></h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Senarai Borang Kendiri
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Bil</th>
                                            <th>Tarikh</th>
                                            <th>Nama</th>
                                            <th>No MyKad</th>
                                            <th>Lokasi</th>
                                            <th>Alamat</th>
                                            <th>No Bangunan</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                         // TABLE PERMOHONAN
                                        //if($authlevel==1)
                                        //{
                                            $querykendiri     = "SELECT * FROM  tblkendiri WHERE kstatus = '$status' order by ftarikh asc";
                                        //}
                                        //else
                                        //{
                                        //    $querykendiri     = "SELECT * FROM  tblkendiri WHERE kendiri = '1' and id='$biluser'";   
                                        //}
                                        
                                        $resulkendiri     = mysql_query($querykendiri) or die(mysql_error());
                                        $datakendiri      = mysql_num_rows($resulkendiri);

                                        if($datakendiri < 1)
                                        {
                                            ?>
                                            <tr><td colspan="5" align="center"> Tiada Maklumat </td></tr>
                                            <?php
                                        }
                                        else
                                        {
                                            $sn = 1;
                                            while($datakendiri2 = mysql_fetch_array($resulkendiri))
                                            {
                                                $kid	   = $datakendiri2['kid'];
												$kidstaff   = $datakendiri2['kidstaff'];
												$kjabatan   = $datakendiri2['kjabatan'];
                                                $ftarikh     = $datakendiri2['ftarikh'];
                                                $falamat    = $datakendiri2['falamat'];
                                                $fbangunan      = $datakendiri2['fbangunan'];
												$flokasi      = $datakendiri2['flokasi'];
                                                
                                                
                                                // TABLE PENGGUNA
                                                $querystaff     = "SELECT * FROM  tablepengguna WHERE id = '$kidstaff'";
                                                $resultstaff     = mysql_query($querystaff) or die(mysql_error());
                                                $datastaff      = mysql_fetch_array($resultstaff);

                                                $namastaff          = $datastaff['namapemohon'];
												$nomykadstaff       = $datastaff['nokadpengenalan'];

                                                // TABLE JABATAN
                                                $queryjabatan     = "SELECT * FROM  tablejabatan WHERE kodjabatan = '$kjabatan'";
                                                $resultjabatan     = mysql_query($queryjabatan) or die(mysql_error());
                                                $datajabatan      = mysql_fetch_array($resultjabatan);

                                                $namajabatan      = $datajabatan['jabatan'];
												
												// TABLE LOKASI
                                                $querylokasi     = "SELECT * FROM  tbllokasi WHERE l_id = '$flokasi'";
                                                $resultlokasi     = mysql_query($querylokasi) or die(mysql_error());
                                                $datalokasi      = mysql_fetch_array($resultlokasi);

                                                $namalokasi      = $datalokasi['l_nama'];
                                                
                                            ?>

                                                <tr class="odd gradeX">
                                                    <td align='center'><?php echo $sn?></td>
                                                    <td align='center'><?php echo htmlentities(strtoupper($ftarikh));?></td>
                                                    <td><?php echo htmlentities(strtoupper($namastaff));?></td>
                                                    <td><?php echo htmlentities(strtoupper($nomykadstaff));?></td>
                                                    <td><?php echo htmlentities(strtoupper($namalokasi));?></td>
                                                    <td class="wsc"><?php echo htmlentities(strtoupper($falamat));?></td>
                                                    <td><?php echo htmlentities(strtoupper($fbangunan));?></td>                                          
                                                    <td align='center'>&nbsp;&nbsp;<a href="paparkendiri.php?kendiriid=<?php echo htmlentities($kid);?>&randomno=<?php echo $randomno ;?>">
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
