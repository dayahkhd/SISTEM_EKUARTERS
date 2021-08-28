<?php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Senarai Alamat Berdaftar</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
    rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css"
        rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
</head>


<body>
    <form method="POST" onsubmit="return confirm('Adakah anda pasti untuk buang?');">
        <div id="wrapper">
            <?php include('leftbar.php');?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="page-header">
                            <?php echo strtoupper("selamat datang"." ".htmlentities($_SESSION['namapegawai']));?>
                        </h4>
                    </div>
                    <?php 
                        $query      =   "SELECT * FROM tbluser WHERE user='$user'";
                        $result     =   mysql_query($query) or die(mysql_error());
                        $data       =   mysql_fetch_array($result);

                        $biluser                  = $data['bil'];
                        
                        $status = 1;

                        $r              = date("Ymdhis");   // 14
                        $r2             = rand(1000,9999);  //4
                        $randomno       = "$r$r2";
                    ?>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Senarai Kuarters Berdaftar
                            </div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr class="success">
                                            <th>Bil</th>
                                            <th>Aset</th>
                                            <th>Kelas</th>
                                            <th>Lokasi</th>
                                            <!-- <th>Gred</th> -->
                                            <th>Tindakan</th>
                                            <th>Padam</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                    <?php 
                                         // TABLE DAFTARKUARTERS
                                             $querydaftar     = "SELECT * FROM  tbl_daftarkuarter ";
                                            $resultdaftar    = mysql_query($querydaftar) or die(mysql_error());
                                            $datadaftarow     = mysql_num_rows($resultdaftar);

                                            // $xdaftarasset   = $datadaftar ['k_idasset'];
                                            // $xalamat        = $datadaftar ['k_alamatrumah'];
                                            // $xkelas         = $datadaftar ['k_kelas'];
                                            // $xgred          = $datadaftar ['k_gred'];
                                            // $xlokasi        = $datadaftar ['k_lokasi'];
                                            // $xjenisasset    = $datadaftar ['k_jenisasset'];
                                            // $xjenisrumah    = $datadaftar ['k_jenisrumah'];
                                            // $xxid = $datadaftar['k_id'];


                                        if($datadaftarow < 1)
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
                                                $xkelas         = $datadaftar2 ['k_kelas'];
                                                $xlokasi        = $datadaftar2 ['k_lokasi'];
                                                // $xgred          = $datadaftar2 ['k_gred'];
                                                $xid            = $datadaftar2 ['k_id'];
                                                
                                               //TABLE KELAS
                                                $querykelas     = "SELECT * FROM  tbl_kelas WHERE s_id = '$xkelas'";
                                                $resultkelas    = mysql_query($querykelas) or die(mysql_error());
                                                $datakelas      = mysql_fetch_array($resultkelas);

                                                $ykelas         = $datakelas['s_nama'];
                                                $ykelasdeposit  = $datakelas['s_deposit'];

                                                //TABLE LOKASI
                                                $querylokasi   = "SELECT * FROM  tbllokasi WHERE l_id = '$xlokasi'";
                                                $resultlokasi  = mysql_query($querylokasi) or die(mysql_error());
                                                $datalokasi    = mysql_fetch_array($resultlokasi);

                                                $ylokasi       = $datalokasi['l_nama'];

                                                // TABLE GRED
                                                // $querygred     = "SELECT * FROM  tbl_gred WHERE g_id = '$xgred'";
                                                // $resultgred    = mysql_query($querygred) or die(mysql_error());
                                                // $datagred      = mysql_fetch_array($resultgred);

                                                // $ygred         = $datagred['g_jawatan'];
                                                
                                                
                                            ?>

                                                <tr class="odd gradeX">
                                                
                                                    
                                                    <td align='center'><?php echo $sn?>
                                                    <input type="hidden" name="fid" value="<?php echo $xid?>"></td>
                                                    <td><?php echo htmlentities(strtoupper($xdaftarasset));?></td>
                                                    <td><?php echo htmlentities(strtoupper($ykelas  ));?></td>
                                                    <td><?php echo htmlentities(strtoupper($ylokasi ));?></td>
                                                    <!-- <td><?php echo htmlentities(strtoupper($ygred ));?></td> -->

                                                                                      
                                                    <td align='center'>&nbsp;&nbsp;<a href="kemaskini.php?id=<?php echo htmlentities($xid);?>">
                                                        <p class="fa fa-edit"></p></a>
                                                          
                                                    </td> 
                                                    <td align='center'>&nbsp;&nbsp;<a href="padamkuarters.php?id=<?php echo htmlentities($xid);?>">
                                                        <p class="fa fas fa-trash"></p> 
                                                    </a>
                                                          
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
    <?php

        if(isset($_GET["delete"])){
            $delete = $_GET["delete"];

            $query = "DELETE FROM tbl_daftarkarter WHERE k_id = '$delete'";
            mysql_query($query);

            printf("<script>alert('MAKLUMAT TELAH DIHAPUSKAN'); window.location='testing2.php'</script>");
        }

    ?>

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