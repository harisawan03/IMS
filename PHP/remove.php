<?php

$file = 'db-connect.php';
include $file;

$amountRemoved = $_POST['amount'];

$sqlremove = "UPDATE it_inventory SET owned = owned - $amountRemoved, available = available - $amountRemoved WHERE id = 1"; // figure out how removal will work if item is associated with an employee
$sqldata = sqlsrv_query($conn, $sqlremove) or die( print_r( sqlsrv_errors(), true));

header("Location: /../confirm-remove.html");

?>