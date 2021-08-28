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
    
    <div class="row">
        <?php
        $querynama     = "SELECT * FROM  tablepengguna WHERE nokadpengenalan = '$user2'";
        $resultnama    = mysql_query($querynama) or die(mysql_error());
        $datanama     = mysql_fetch_array($resultnama);

        $rnama   = $datanama ['namapemohon'];
    if(isset($_POST['submit']))
{
    $fqrnoic        = $_POST['qrnoic'];
    
$querysemak     = "SELECT * FROM tablepengguna where nokadpengenalan='$fqrnoic'";
$resultsemak    = mysql_query($querysemak) or die(mysql_error());
$semak2         = mysql_num_rows($resultsemak);
$semakt2        = mysql_fetch_array($resultsemak);

    //$q121         = mysql_query("SELECT * FROM tablepengguna where nokadpengenalan='$fqrnoic'");
    //$semak2   = mysql_num_rows($q121);
    //$semakt2  = mysql_fetch_array($q121);

    $r              = date("Ymdhis");   // 14
    $r2             = rand(1000,9999);  //4
    $randomno       = "$r$r2";
                
    // DATA TIADA DALAM DATABASE
    if ($semak2 < 1)
    {
        printf("<script> alert ('Data anda tidak wujud. Sila hubungi bahagian SUMBER MANUSIA di jabatan anda untuk mendaftarkan maklumat anda di dalam SISTEM ESPK.'); window.location = 'carianic.php'</script>");
    }
    
    // DATA TELAH WUJUD DALAM DATABASE
    else
    {
        printf("<script>window.location = 'kendiri.php?nomykad=$fqrnoic&randomno=$randomno'</script>");
    }                
    //$fqdaerah     = $_POST['qrdaerah'];
    //$fqkk         = $_POST['qrkk'];


}
    
?>


          <div class="col-lg-12">
                <h4 class="page-header"> SELAMAT DATANG <?php echo  $rnama;?></h4>
                <?php //echo strtoupper("welcome"." ".htmlentities($_SESSION['login']));?>
             </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Carian No Kad Pengenalan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                 <form id="form1" name="form1" method="post" action="">
                                    <div class="form-group">
                                          <div class="col-lg-4">No kad pengenalan</div>
                                          <div class="col-lg-6">
                                            <label for="nama">:</label>
                                             <input type="text" id="qrnoic" required="required" name="qrnoic" maxlength="12" placeholder="900201010000">
                                          </div>
                                        </div>

                               <br><br>
                               <span class="col-lg-6" align="right">
                                     <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Carian">
                                    </span>
                               


                            </form>
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
