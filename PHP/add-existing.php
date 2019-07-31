<?php

$file = 'db-connect.php';
include $file;

$sqlupdate = "UPDATE it_inventory SET owned = owned + 1, available = available + 1 WHERE id = 1";
$sqldata = sqlsrv_query($conn, $sqlupdate) or die( print_r( sqlsrv_errors(), true));

?>