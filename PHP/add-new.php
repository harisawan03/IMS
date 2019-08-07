<?php

$file = 'db-connect.php';
include $file;

$owned = $_POST['amount'];
$available = $_POST['amount'];

$sqlinsert = "INSERT INTO it_inventory VALUES (12, 'Speakers', 'Peripheral', $owned, 12, $available)";
$sqldata = sqlsrv_query($conn, $sqlinsert) or die( print_r( sqlsrv_errors(), true));

?>