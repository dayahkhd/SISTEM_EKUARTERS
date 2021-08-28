 <?php
session_start();
  
  // CONNECT DATABASE
  require ('../config/dbconnect.php');

    // $user       =   $_SESSION['user'];
    // $jabatan    =   $_SESSION['jabatan'];
    // $authlevel  =   $_SESSION['authlevel'];

  $user2       = $_SESSION['nokadpengenalan'];
  $jabatan2    = $_SESSION['jabatan'];
  $authlevel2  = $_SESSION['authlevel'];

 
?>  
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">

<nav class="navbar navbar-default navbar-static-top" role="navigation"
			style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">Sistem Pengurusan Kuarters</a>
			</div>
						 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    
                    <?php
                    if($authlevel2==2)
                    {
                    ?>

                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="?"><i class="fa fa-dashboard fa-fw"></i> Menu Utama</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Permohonan <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                <a href="registerpermohonan.php" >Permohonan Baru</a>
                              </li>
                               
                               <li>
                                <a href="listpemohon.php" >Senarai Permohonan</a>
                               </li>
                                <li>
                                <a href="#">Cetakan permohonan</a>
                               </li>


                          </ul>
                      </li>
                      <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Penghuni <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              
                                 <li>
                                    <a href="#">Aduan Kerosakan</a>
                                </li>

                                <li>
                                    <a href="#">Pembahruan Kontrak</a>
                                </li>

                          </ul>
                            <!-- /.nav-second-level -->
                      </li>

                        
                      <li>
                      	<a href="logout.php"><i class="fa fa-bar-chart-o fa-fw"></i>Keluar Sistem<span class="fa arrow"></span></a>
                     </li>
                  </ul>
                  
                  <!-- <?php

                    }
                    else
                    {
                        ?>
                        <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="?"><i class="fa fa-dashboard fa-fw"></i> Menu Utama</a>
                        </li>
                        <li> <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Keselamatan Kuarters <span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                            <li> <a href="../../../qrkuarters" target="new">Soalan Kendiri</a></li>
                            <li> <a href="senaraikendiri.php">Senarai Borang Kendiri</a></li>
                          </ul>
                        </li>
                        <li> <a href="logout.php"><i class="fa fa-bar-chart-o fa-fw"></i>Keluar Sistem<span class="fa arrow"></span></a></li>
                        <li></li>
                    </ul>
                    
                    <?php
                    }
                    ?> -->
      				  
                </div>
            </div>

        </nav>
        <!-- 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header"><?php echo strtoupper("selamat datang"." ".htmlentities($_SESSION['user']));?></h4>
                </div>
               /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
