<?php
$file = 'db-connect.php';
include $file;

$date = date("Y-m-d H:i:s");

$upc = $_COOKIE["upc"];
$person = $_POST["name"];

$sqlupdate = "UPDATE it_inventory SET available = available - 1 WHERE upc LIKE (?)";
$params = array($upc);

$sqldata = sqlsrv_query($conn, $sqlupdate, $params);
if ($sqldata === false) {
    die( print_r( sqlsrv_errors(), true));
}

$sqlemployeeid = "SELECT id FROM employees WHERE name = $person";
$sqleid = sqlsrv_query($conn, $sqlemployeeid);

$sqlitemid = "SELECT id FROM it_inventory WHERE upc LIKE (?))";
$sqliid = sqlsrv_query($conn, $sqlitemid, $params);

$sqlout = "INSERT INTO checked_out VALUES ('$date', '$sqlemployeeid', '$sqlitemid')";
$sqlcheckout = sqlsrv_query($conn, $sqlupout, $params);
if ($sqlcheckout === false) {
    die( print_r( sqlsrv_errors(), true));
}

?>