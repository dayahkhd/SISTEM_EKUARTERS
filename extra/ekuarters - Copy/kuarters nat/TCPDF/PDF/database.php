<?php

	$conn = mysql_connect("localhost","root","") or die ("Database Connection Error");
	$db = mysql_select_db("kuarter2",$conn) or die(mysql_error());
?>