<?php

$file = 'db-connect.php';
include $file;

$sqlget = "SELECT item, owned, available FROM it_inventory WHERE id = 18"; // sample query --eventually use views
$sqldata = sqlsrv_query($conn, $sqlget) or die( print_r( sqlsrv_errors(), true));
$inventory = sqlsrv_fetch_array($sqldata);

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