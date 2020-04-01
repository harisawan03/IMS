<?php

$file = 'db-connect.php';
include $file;

$upc = $_COOKIE["upc"];

// get current data from server
$sqlget = "SELECT item, owned, available FROM it_inventory WHERE upc LIKE (?)";
$params = array($upc);
$sqldata = sqlsrv_query($conn, $sqlget, $params);
if ($sqldata === false) {
    die( print_r( sqlsrv_errors(), true));
}

$inventory = sqlsrv_fetch_array($sqldata);

// displays fetched data, this is used on confirmation pages ie confirm-xxxx.html
echo "<br><p>Item: ";
echo $inventory['item']; 
echo "</p><br>";
echo "<p>Total Owned: ";
echo $inventory['owned'];
echo "</p><br>";
echo "<p>Total Available: ";
echo $inventory['available'];
echo "</p><br>";

?>