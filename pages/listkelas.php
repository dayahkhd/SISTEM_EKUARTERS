<!DOCTYPE html>
<html>
<head>
    <title>Senarai Kelas Kuarters Berdaftar</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
    rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css"
        rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
</head>
<body>
    <form method="post" onsubmit="return confirm('Adakah anda pasti untuk buang?');">
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
                                Senarai Kelas Berdaftar
                            </div>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr class="success">
                                            <th>Bil</th>
                                            <th>Kelas Kuarters</th>
                                            <th>Deposit</th>
                                            <th>Tindakan</th>
                                            <th>Padam</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                    <?php 
                                         // TABLE DAFTARKUARTERS
                                            $querydaftar     = "SELECT * FROM  tbl_kelas ";
                                            $resultdaftar    = mysql_query($querydaftar) or die(mysql_error());
                                            $datadaftar     = mysql_fetch_array($resultdaftar);

                                            $xalamat = $datadaftar['s_nama'];
                                            $xkodjabatan = $datadaftar['s_deposit'];

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
                                                $xid = $datadaftar2['s_id'];
                                                $xalamat = $datadaftar2['s_nama'];
                                                $xkodjabatan = $datadaftar2['s_deposit'];
                                                
                                            ?>

                                                <tr class="odd gradeX">
                                                    <td align='center'><?php echo $sn?></td>
                                                    <td><?php echo htmlentities(strtoupper($xalamat));?></td>
                                                    <td><?php echo htmlentities(strtoupper($xkodjabatan));?></td> 
                                                                                      
                                                    <td align='center'>&nbsp;&nbsp;<a href="updatekelas.php?id=<?php echo $xid;?>">
                                                        <p class="fa fa-edit"></p></a>
                                                          
                                                    </td> 

                                                    <td align='center'>&nbsp;&nbsp;<a href="padamkelas.php?id=<?php echo htmlentities($xid);?>">
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

            $query = "DELETE FROM tbl_kelas WHERE s_id = '$delete'";
            mysql_query($query);

            printf("<script>alert('MAKLUMAT TELAH DIHAPUSKAN'); window.location='listkelas.php'</script>");
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