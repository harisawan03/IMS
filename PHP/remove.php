<?php

$file = 'db-connect.php';
include $file;

$upc = $_COOKIE["upc"];

$amountRemoved = $_POST['amount'];

$sqlremove = "UPDATE it_inventory SET owned = owned - $amountRemoved, available = available - $amountRemoved WHERE upc LIKE (?)"; // figure out how removal will work if item is associated with an employee
$params = array($upc);
$sqldata = sqlsrv_query($conn, $sqlremove, $params) or die(sqlsrv_errors());

header("Location: /../confirm-remove.html");

?>