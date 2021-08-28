<?php
session_start ();
    // CONNECT DATABASE
    require ('../config/dbconnect.php');

if (! (isset ( $_SESSION ['user'] )))
    {
        header ( 'location:../index.php' );
    }

$bil = ($_GET['del']);

$querystatus       = "SELECT * FROM permohonan WHERE bil='$bil'";
$resultstatus      = mysql_query($querystatus) or die (mysql_error());
$datastatus        = mysql_fetch_array($resultstatus);

$perkara = $datastatus['perkara'];
//echo $querystatus;

if(isset($_POST['PADAM']) == "PADAM")
    {
        //$id = $_POST['del'];

        //echo $_GET['del'];
        //$id = isset($_GET['id']);

        //echo "<br>bil dalam delete.$bil";
        $query      = "DELETE FROM permohonan WHERE bil='$bil'"; 
        mysql_query($query) or die (mysql_error());
        header ( 'location: status.php' );

        //echo "<br>DELETE FROM permohonan WHERE bil='$bil'";
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

    <title>Status Permohonan</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
</head>

<body>

    <div id="wrapper">

    <!-- Navigation -->
    <?php include('leftbar.php')?>;

           
         <nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   <h4 class="page-header"> <?php echo strtoupper("selamat datang"." ".htmlentities($_SESSION['user']));?></h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Status Permohonan Dihapus
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="col-md-3"><div align="center">Bil</th>
                                            <th class="col-md-3"><div align="center">Status Permohonan</th>
                                            <th class="col-md-3"><div align="center">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <tr height=40>
                                        <td height="30" class="col-md-1"><div align="center"><?php echo $bil; ?></div></td>
                                        <td class="col-md-3"><div align="center"><?php echo $perkara; ?></div></td>

                                        <td align="center"><form name="form1" method="post" action="" onsubmit="return confirm('Anda Pasti Ingin Hapus Maklumat?')">
                                          <input type="submit" class="btn btn-primary" name="PADAM" id="PADAM" value="PADAM">
                                        </form></td>
                                    </tr>
                                                       
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
    <script></script>

    </script>

</body>

</html>