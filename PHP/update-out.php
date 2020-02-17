<?php
$file = 'db-connect.php';
include $file;

$date = date("Y-m-d H:i:s");

$upc = $_COOKIE["upc"];
$person = $_POST["name"];

$sqlupdate = "UPDATE it_inventory SET available = available - 1 WHERE upc LIKE (?)";
$params = array($upc);

$sqlemployeeid = "SELECT id FROM employees WHERE name = 'Haris'";
$sqlitemid = "SELECT id FROM it_inventory WHERE upc LIKE '123456789012'";
$sqlout = "INSERT INTO checked_out VALUES ('$sqlemployeeid', '$sqlitemid')";


$sqldata = sqlsrv_query($conn, $sqlupdate, $params);
if ($sqldata === false) {
    die( print_r( sqlsrv_errors(), true));
}
?>