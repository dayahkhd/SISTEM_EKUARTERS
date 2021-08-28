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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Senarai Aduan kerosakan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Bil</th>
                                            <th>Nama Penghuni</th>
                                            <th>Jabatan</th>
                                            <th>Tarikh Aduan</th>
                                            <th>Tindakan</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                   

                                        $queryguna      = "SELECT * FROM tablepengguna WHERE nokadpengenalan='$user2'";
                                        $resultguna     = mysql_query($queryguna) or die (mysql_error());
                                        $dataguna       = mysql_fetch_array($resultguna);

                                        $idp            =$dataguna['id'];
                                        $namapengguna   = $dataguna ['namapemohon'];
                                        $jabatan        = $dataguna ['jabatan'];

                                        // TABLE kendiri
                                            $querykendiri   = "SELECT * FROM  tblkendiri where kidstaff='$idp'";
                                            $resultkendiri    = mysql_query($querykendiri) or die(mysql_error());
                                            $datakendiri     = mysql_num_rows($resultkendiri);

                                            


                                            

                                        if($datakendiri < 1)
                                        {
                                            ?>
                                            <tr><td colspan="5" align="center"> Tiada Maklumat </td></tr>
                                            <?php
                                        }
                                        else
                                        {
                                            $sn = 1;
                                            while($datakendiri2 = mysql_fetch_array($resultkendiri))
                                            {
                                                $xid            = $datakendiri2['kid'];
                                                $xidstaff       = $datakendiri2 ['kidstaff'];
                                                $xjabatan       = $datakendiri2 ['kjabatan'];
                                                $xtarikh        = $datakendiri2 ['ftarikh'];

                                            ?>

                                                <tr class="odd gradeX">
                                                    <td align='center'><?php echo $sn?></td>
                                                    <td><?php echo htmlentities(strtoupper($namapengguna));?></td>

                                                    <td><?php echo htmlentities(strtoupper($xjabatan));?></td>
                                                    <td><?php echo htmlentities(strtoupper(date("m-d-Y", strtotime($xtarikh))));?></td>
                                                  
                                                                                      
                                                    <td align='center'>&nbsp;&nbsp;<a href="paparkendiri.php?id=<?php echo htmlentities($xid);?>">
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
