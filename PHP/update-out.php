<?php
$file = 'db-connect.php';
include $file;

$sqlupdate = "UPDATE it_inventory SET available = available - 1 WHERE id = 1";
$sqldata = sqlsrv_query($conn, $sqlupdate) or die( print_r( sqlsrv_errors(), true));
?>