<?php

$file = 'db-connect.php';
include $file;

$date = date("Y-m-d H:i:s");

$upc1 = $_COOKIE["upc"];
$upc2 = $_COOKIE["upc"];

$amountRemoved = $_POST['amount'];
$reason = $_POST['reason'];

$sqlremove = "UPDATE it_inventory SET owned = owned - $amountRemoved, available = available - $amountRemoved WHERE upc LIKE (?)"; // figure out how removal will work if item is associated with an employee
$params1 = array($upc1);
$sqldata = sqlsrv_query($conn, $sqlremove, $params1) or die(sqlsrv_errors());

$sqlrlog = "INSERT INTO add_remove_log VALUES ('removed', '$date', (SELECT id FROM it_inventory WHERE upc LIKE (?)), $amountRemoved, '$reason')";
$params2 = array($upc2);
$sqllog = sqlsrv_query($conn, $sqlrlog, $params2);
if ($sqllog === false) {
    die( print_r( sqlsrv_errors(), true));
}

header("Location: /../confirm-remove.html");

?>