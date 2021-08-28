<?php
include '../config/dbconnect.php';

$id = $_GET['id'];

// if(isset($_POST['submit'])  == "DELETE")
// {

$sql = "delete from tbllokasi where l_id = '$id'";
mysql_query($sql);

header("location: listlokasi.php");
// }


?>


