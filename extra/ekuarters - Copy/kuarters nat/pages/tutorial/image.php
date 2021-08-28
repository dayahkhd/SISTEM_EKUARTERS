<?php
include("barcode2.php"); 
$nokp = $_GET[nokp];
$bc = new Barcode39("$nokp"); 
$bc->draw();
?>