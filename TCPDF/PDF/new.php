<?php

session_start();

require	('database.php');


$ic 	= $_SESSION['ic'];
$clogin = $_SESSION['clogin'];
$cbaha 	= $_SESSION['cbaha'];


if($_SESSION['ic'] == '')

{
	header('Location: mpageerror.php');
}

?>