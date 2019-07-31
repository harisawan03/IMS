<?php

$file = 'db-connect.php';
include $file;

$sqlupdate = "INSERT INTO it_inventory VALUES ('new_id', 'item', 'category', 'amount', 'bin', 'available')";
$sqldata = sqlsrv_query($conn, $sqlupdate) or die( print_r( sqlsrv_errors(), true));

?>