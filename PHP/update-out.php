<?php
$file = 'db-connect.php';
include $file;

$date = date("Y-m-d H:i:s");

$upc1 = $_COOKIE["upc"];
$upc2 = $_COOKIE["upc"];
$person = $_POST["name"];

$sqlupdate = "UPDATE it_inventory SET available = available - 1 WHERE upc LIKE (?)";
$params1 = array($upc1);

$sqldata = sqlsrv_query($conn, $sqlupdate, $params1);
if ($sqldata === false) {
    die( print_r( sqlsrv_errors(), true));
}

// $sqlemployeeid = "(SELECT id FROM employees WHERE name = '$person')";
// $sqleid = sqlsrv_query($conn, $sqlemployeeid);

// $sqlitemid = "(SELECT id FROM it_inventory WHERE upc LIKE (?))";
// $sqliid = sqlsrv_query($conn, $sqlitemid, $params);

$sqlout = "INSERT INTO checked_out VALUES ('$date', (SELECT id FROM employees WHERE name = (?))), (SELECT id FROM it_inventory WHERE upc LIKE (?)))";
$params2 = array($person, $upc2);
$sqlcheckout = sqlsrv_query($conn, $sqlout, $params);
if ($sqlcheckout === false) {
    die( print_r( sqlsrv_errors(), true));
}

?>