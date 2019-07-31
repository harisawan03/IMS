<?php

$file = 'db-connect.php';
include $file;

$sqlget = "SELECT owned, available, item FROM it_inventory WHERE id = 1"; // sample query --eventually use views
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