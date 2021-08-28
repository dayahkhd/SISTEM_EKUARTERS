<?php
	session_start();
	
	// CONNECT DATABASE
	require ('../config/dbconnect.php');
	//time
	date_default_timezone_set("Asia/Kuala_Lumpur"); 
	$today 		= date('d-m-Y');
	$hariini 	= date('Y-m-d H:i:s');
	
	$ip 		= $_SERVER['REMOTE_ADDR'];
	$browser 	= $_SERVER['HTTP_USER_AGENT'];
	$port		= $_SERVER['REMOTE_PORT'];
?>

<?php  	
// BUTTON LOGIN
if(isset($_POST['submit']))
{
	
		
		// Declaration
		$user 		=	 $_POST['id'];
		$password 	=	 $_POST['password'];
		$jabatan 	=	 $_POST['jabatan'];
		
		// TABLE USER | USERNAME | PTJ
		$query_user 	 =	 "SELECT * FROM tablepengguna WHERE nokadpengenalan='$user' and jabatan='$jabatan' LIMIT 1 ";
		$result_user 	 =	 mysql_query($query_user) or die(mysql_error());
		$data_user 		 =	 mysql_fetch_array($result_user);
		
		$nouser 	= mysql_num_rows($result_user);
		
		//DECLARATION	
		$countatt 		= $data_user['logatt'];
		$blockid 		= $data_user['logerr'];
		$user2 			= $data_user['nokadpengenalan'];
		$password2 		= $data_user['katalaluan'];
		$jabatan2 		= $data_user['jabatan'];
		$status 		= $data_user['status'];
		$authlevel2 	=$data_user['authlevel'];
		// NO ID CREATE		
		if($nouser < 1)
		{
			echo "<p align=center><strong><font color=#FF0000 size=2 face=Verdana, Calibri, Tahoma>
			Daftar Masuk Gagal ! Sila hubungi Pegawai ICT JKNJ.</font></strong></p>";
		}
		
		// ID DONE CREATE
		else //nouser !=0
		{
			// CAN ACCESS
			if ($blockid < 1)
			{
				// USER HAVE 2 ACCESS
				if ($countatt < 3)
				{
					// SUCCESS | PASSWORD & PTJ
					if(($password2 == $password) && ($jabatan == $jabatan2))
					{
						$_SESSION['nokadpengenalan']= $user2;
						$_SESSION['jabatan']		= $jabatan2;
						$_SESSION['authlevel'] 		=$authlevel2;
						
						header("Location: index.php");
									
						// TABLE USER | USERNAME & PTJ		
						$queryunblock 	= "UPDATE tablepengguna SET logatt = '0' WHERE nokadpengenalan='$user' and jabatan='$jabatan'";
						$resultunblock 	= mysql_query($queryunblock) or die(mysql_error());
						
//						$perkara	= 'Log Masuk';
						$status		= 1;
						
//						// TABLE LOG
//						$querlog = "INSERT INTO loggerp(username,date,ip,browser,port,perkara,status)
//						VALUES(
//						'".mysql_real_escape_string($user2)."',
//						'".mysql_real_escape_string($hariini)."',
//						'".mysql_real_escape_string($ip)."',
//						'".mysql_real_escape_string($browser)."',
//						'".mysql_real_escape_string($port)."',
//						'".mysql_real_escape_string($perkara)."',
//						'".mysql_real_escape_string($status)."')";
//						
//						$resullog = mysql_query($querlog) or die(mysql_error());
						
					}
					// **if user no pass to login
					else//if(($pass != $data['tpassword'])) 
					{
						// CALCULATION TO BLOCK USER
						$countatt 	= $countatt + 1;
						$cuba 		= 3 - $countatt;
						
						if ($cuba > 0)
						{
							echo "<p align=center><strong><font color=#FF0000 size=2 face=Verdana, Calibri, Tahoma>
							Anda hanya mempunyai $cuba kali cubaan sahaja.</font></strong></p>";
							
							// TABLE USER | USERNAME & PTJ
							$queryblock 	= "UPDATE tablepengguna SET logatt = '$countatt' WHERE nokadpengenalan='$user' and jabatan='$jabatan'";
							$resultblock 	= mysql_query($queryblock) or die(mysql_error());
						}
						else
						{
							echo "<p align=center><strong><font color=#FF0000 size=2 face=Verdana, Calibri, Tahoma>
							AKAUN ANDA TELAH DISEKAT.</font></strong></p>";
							echo "<p align=center><strong><font color=#FF0000 size=2 face=Verdana, Calibri, Tahoma>Sila hubungi Pegawai ICT JKNJ.</font></strong></p>";
							
							// TABLE USER | USERNAME & PTJ
							$queryblock 	= "UPDATE tablepengguna SET logerr= '1' WHERE nokadpengenalan='$user' and jabatan='$jabatan'";
							$resultblock 	= mysql_query($queryblock) or die(mysql_error());
						}
					}//else
				}//if count
			}//if blockid
			else
			{
				echo "<p align=center><strong><font color=#FF0000 size=2 face=Verdana, Calibri, Tahoma>
				AKAUN ANDA TELAH DISEKAT.Sila hubungi Pegawai ICT JKNJ.</font></strong></p>";
			}	
		} //else
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

    <title>log masuk pemohon</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="../dist/css/jquery.validate.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<style>

div.c {
  font-size: 150%;
}

body,td,th{

  font-family: Georgia, Times New Roman, Times, serif;
	background-image: url('../image/white.jpg');
	background-size:20px;
	background-position: center;
}
.img-container
	{
    text-align: center;
    display: block;
}



</style>

<body>
	<center><img src="../image/kuarter.jpg" width="930" height="125"></center>


<!--  <div class="w3-container w3-black w3-center w3-allerta"> -->
 	<!-- <h2  class="w3-xxxlarge" align="center">SISTEM KUATERS</h2></div> -->
   <!--  <div class="container"> -->
        <br><br>
<h2 align="center">&nbsp;</h2>
    <div class="container">
        
              
            <div class="col-md-6 col-md-offset-3">
            <span class="img-container">

                <div class="panel panel-primary">

                    <div class="panel-heading">
                     <h3 class="panel-title">LOG MASUK</h3>
                    </div>
                    <div class="panel-body" >
                        <form method="post">

                            <fieldset>
                                <div class="form-group">
             					<input class="form-control" placeholder="No Kad Pengenalan"  id="id" name="id" type="text" autofocus autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Kata Laluan" id="password"name="password" type="password" value="">
                                </div>
                              	<div class="form-group">
								<?php
                                    $query_jabatan = "select * from tablejabatan order by kodjabatan ASC";
                                    $result_jabatan = mysql_query($query_jabatan) or die (mysql_error());
                                    echo "<select name=jabatan id=jabatan class=form-control>";
                                    echo "<option>Sila Pilih</option>";
                                    while($data_jabatan = mysql_fetch_array($result_jabatan))
                                    {
                                        echo "<option value =$data_jabatan[kodjabatan]>$data_jabatan[jabatan]</option>";
                                     }
                                     echo "</select>";
                                ?>
                          		</div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="login" name="submit" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
 <script src="../dist/jquery-1.3.2.js" type="text/javascript"></script>
 <script src="../dist/jquery.validate.js" type="text/javascript"></script>
 <script type="text/javascript">
            
            jQuery(function(){
                jQuery("#id").validate({
                    expression: "if (VAL.match(/^[a-z]$/)) return true; else return false;",
                    message: "Should be a valid id"
                });
                jQuery("#password").validate({
                    expression: "if (VAL.match(/^[a-z]$/)) return true; else return false;",
                    message: "Should be a valid password"
                });
                
            });
            
        </script>
</body>


</html>
