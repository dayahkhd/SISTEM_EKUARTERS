<?php
	$host	= "localhost";
	$user	= 'root';
	$pass	= '';
	$db		= 'kuarter2';

	$con	= mysql_connect($host,$user,$pass) or die ('Unable to connect');
	mysql_select_db($db) or ('Unable to connect');
?>


