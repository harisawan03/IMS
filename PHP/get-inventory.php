<?php

$file = 'db-connect.php';
include $file;

$upc = $_COOKIE["upc"];

$sqlget = "SELECT item, owned, available FROM it_inventory WHERE upc = ?";
$params = $upc;

// $sqldata = sqlsrv_query($conn, $sqlget, $params) or die( print_r( sqlsrv_errors(), true));
// $inventory = sqlsrv_fetch_array($sqldata);

$sqldata = sqlsrv_prepare($conn, $sqlget, $params);
if(!$sqldata) {
    die(print_r(sqlsrv_errors(), true));
}

$inventory = sqlsrv_fetch_array($sqldata);
if(sqlsrv_execute($sqldata) === false) {
    die( print_r( sqlsrv_errors(), true));
}

echo "<p>test2</p>";
echo "<p>";
echo $inventory['item'];
echo "</p>";
echo "<p>Total Owned: ";
echo $inventory['owned'];
echo "</p>";
echo "<p>Total Available: ";
echo $inventory['available'];
echo "</p>";

?>