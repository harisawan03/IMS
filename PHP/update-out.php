<?php
$file = 'db-connect.php';
include $file;

$date = getdate();

$upc = $_COOKIE["upc"];
$person = $_POST["name"];

$sqlupdate = "UPDATE it_inventory SET available = available - 1 WHERE upc LIKE (?)";
$params = array($upc);

$sqlemployeeid = "SELECT id FROM employees WHERE name = $person";
$sqlitemid = "SELECT id FROM it_inventory WHERE upc LIKE '$upc'";
$sqlout = "INSERT INTO checked_out VALUES ('$date', '$sqlemployeeid', '$sqlitemid')";


$sqldata = sqlsrv_query($conn, $sqlupdate, $params);
if ($sqldata === false) {
    die( print_r( sqlsrv_errors(), true));
}
?>