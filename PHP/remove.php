<?php

$file = 'db-connect.php';
include $file;

$sqlremove = "UPDATE it_inventory SET owned = owned - 1, available = available - 1 WHERE id = 1"; // figure out how removal will work if item is associated with an employee
$sqldata = sqlsrv_query($conn, $sqlremove) or die( print_r( sqlsrv_errors(), true));

?>