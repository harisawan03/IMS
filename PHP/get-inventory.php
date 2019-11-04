<?php

$file = 'db-connect.php';
include $file;

$upc = 1;
// <script>sessionStorage.getItem('upc');</script>;

$sqlget = "SELECT item, owned, available FROM it_inventory WHERE id = `$upc`";
$sqldata = sqlsrv_query($conn, $sqlget) or die( print_r( sqlsrv_errors(), true));
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