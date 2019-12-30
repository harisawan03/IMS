<?php

$file = 'db-connect.php';
include $file;

$upc = $_COOKIE["upc"];

$sqlget = "SELECT item, category, available, owned, bin FROM it_inventory WHERE upc LIKE (?)";
$params = array($upc);
$sqldata = sqlsrv_query($conn, $sqlget, $params) or die( print_r( sqlsrv_errors(), true));
$inventory = sqlsrv_fetch_array($sqldata);

echo "Item Name:<br>";
echo $inventory['item'];
echo "<br><br>";
echo "Category:<br>";
echo $inventory['category'];
echo "<br><br>";
echo "Total Owned: ";
echo $inventory['owned'];
echo "<br><br>";
echo "Total Available: ";
echo $inventory['available'];
echo "<br><br>";
echo "Bin ";
echo $inventory['bin'];
echo "<br><br>";

?>