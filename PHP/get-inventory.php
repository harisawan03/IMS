<?php

$file = 'db-connect.php';
include $file;

$upc = $_COOKIE["upc"];

// get data from server
$sqlget = "SELECT item, owned, available FROM it_inventory WHERE upc LIKE (?)";
$params = array($upc);
$sqldata = sqlsrv_query($conn, $sqlget, $params);
if ($sqldata === false) {
    die( print_r( sqlsrv_errors(), true));
}

$inventory = sqlsrv_fetch_array($sqldata);

// determine if item is in inventory and displays to action.html
if ($inventory) { // if item exists, display current quantities
    echo "<p>";
    echo $inventory['item'];
    echo "</p><br>";
    echo "<p>Total Owned: ";
    echo $inventory['owned'];
    echo "</p><br>";
    echo "<p>Total Available: ";
    echo $inventory['available'];
    echo "</p>";
} else { // if item does not exist, inform user and prevent displaying of all actions except for adding to inventory
    echo "<p>";
    echo "Item not in inventory.";
    echo "</p>";
    echo "<br><h3><a href='add-inventory.html'>Add to Inventory</a></h3>";
    echo "<h3><a href='index.html'>Cancel</a></h3>";
    echo "<style>form {display: none;}</style>";
    echo "<style>.buttons {display: none;}</style>";
}

?>