<?php
include '../config/dbconnect.php';

$id = $_GET['id'];

// if(isset($_POST['submit'])  == "DELETE")
// {

$sql = "delete from tbl_kelas where s_id = '$id'";
mysql_query($sql);

header("location: listkelas.php");
// }


?>


