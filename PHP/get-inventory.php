<?php

$file = 'db-connect.php';
include $file;

$upc = $_COOKIE["upc"];

$sqlget = "SELECT item, owned, available FROM it_inventory WHERE upc LIKE (?)";
$params = array($upc);
$sqldata = sqlsrv_query($conn, $sqlget, $params);
if ($sqldata === false) {
    die( print_r( sqlsrv_errors(), true));
}

$inventory = sqlsrv_fetch_array($sqldata);

if ($inventory) {
    echo "<p>";
    echo $inventory['item'];
    echo "</p>";
    echo "<p>Total Owned: ";
    echo $inventory['owned'];
    echo "</p>";
    echo "<p>Total Available: ";
    echo $inventory['available'];
    echo "</p>";
} else {
    echo "Item not found.";
    echo "<br><br><br><a href='index.html'>Cancel</a>";
    echo "<script>window.stop()</script>";
    
}

?>