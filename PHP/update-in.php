<?php

$file = 'db-connect.php';
include $file;

$date = date("Y-m-d H:i");

// two upc cookies due to how php handles parameters for sql
$upc1 = $_COOKIE["upc"];
$upc2 = $_COOKIE["upc"];
$person = $_COOKIE["name"];

// updates available in server with checked-in item
$sqlupdate = "UPDATE it_inventory SET available = available + 1 WHERE upc LIKE (?)";
$params1 = array($upc1);
$sqldata = sqlsrv_query($conn, $sqlupdate, $params1);
if ($sqldata === false) {
    die( print_r( sqlsrv_errors(), true));
}

// writes check-in to log on server
$sqlin = "INSERT INTO item_tracker VALUES ('checked in', '$date', (SELECT id FROM employees WHERE name = (?)), (SELECT id FROM it_inventory WHERE upc LIKE (?)))";
$params2 = array($person, $upc2);
$sqlcheckin = sqlsrv_query($conn, $sqlin, $params2);
if ($sqlcheckin === false) {
    die( print_r( sqlsrv_errors(), true));
}

?>