<?php
	$host 	= 	"localhost";
	$user 	= 	'root';
	$pass 	=	'';
	$db 	= 	'dbkuarters';
	
	$con = mysql_connect($host,$user,$pass) or die ('Unable to connect');
	mysql_select_db($db) or ('Unable to select database');
?>









