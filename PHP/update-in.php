<?php
$file = 'db-connect.php';
include $file;

$upc = $_COOKIE["upc"];

$sqlupdate = "UPDATE it_inventory SET available = available + 1 WHERE upc LIKE (?)";
$params = array($upc);
$sqldata = sqlsrv_query($conn, $sqlupdate, $params);
if ($sqldata === false) {
    die( print_r( sqlsrv_errors(), true));
}
?>