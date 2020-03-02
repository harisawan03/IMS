<?php
$file = 'db-connect.php';
include $file;

$date = date("Y-m-d H:i");

$upc1 = $_COOKIE["upc"];
$upc2 = $_COOKIE["upc"];
$person = $_COOKIE["name"];

$sqlupdate = "UPDATE it_inventory SET available = available - 1 WHERE upc LIKE (?)";
$params1 = array($upc1);
$sqldata = sqlsrv_query($conn, $sqlupdate, $params1);
if ($sqldata === false) {
    die( print_r( sqlsrv_errors(), true));
}

$sqlout = "INSERT INTO item_tracker VALUES ('checked out', '$date', (SELECT id FROM employees WHERE name = (?)), (SELECT id FROM it_inventory WHERE upc LIKE (?)))";
$params2 = array($person, $upc2);
$sqlcheckout = sqlsrv_query($conn, $sqlout, $params2);
if ($sqlcheckout === false) {
    die( print_r( sqlsrv_errors(), true));
}

?>