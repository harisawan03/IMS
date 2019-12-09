<?php

$file = 'db-connect.php';
include $file;

$upc = $_COOKIE["upc"];
echo $upc . ' var ';
echo $_COOKIE["upc"] . ' cookie ';


$sqlget = "SELECT item, owned, available FROM it_inventory WHERE upc LIKE (?)";
$params = ('123456789012');
$sqldata = sqlsrv_query($conn, $sqlget, $params) or die( print_r( sqlsrv_errors(), true));
$inventory = sqlsrv_fetch_array($sqldata);

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