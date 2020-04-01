<?php

$file = 'db-connect.php';
include $file;

$date = date("Y-m-d H:i");

$upc1 = $_COOKIE["upc"];
$upc2 = $_COOKIE["upc"];

// POST data from remove inventory form
$amountRemoved = $_POST['amount'];
$reason = $_POST['reason'];

// update owned and available
$sqlremove = "UPDATE it_inventory SET owned = owned - $amountRemoved, available = available - $amountRemoved WHERE upc LIKE (?)";
$params1 = array($upc1);
$sqldata = sqlsrv_query($conn, $sqlremove, $params1) or die(sqlsrv_errors());

// writes removal of item to log on server
$sqlrlog = "INSERT INTO add_remove_log VALUES ('removed', '$date', (SELECT id FROM it_inventory WHERE upc LIKE (?)), $amountRemoved, '$reason')";
$params2 = array($upc2);
$sqllog = sqlsrv_query($conn, $sqlrlog, $params2);
if ($sqllog === false) {
    die( print_r( sqlsrv_errors(), true));
}

header("Location: /../confirm-remove.html");

?>