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
    echo "<br>      
        <br>
        <form method='post' action='confirm-out.php'>
        Who's checking it out?<br><br>
        <input type='text' name='name'><br><br><br>
        <a href='index.html'>Cancel</a>
        <input type='submit' onClick='checkout()' value='Confirm'>
        </form>";
} else {
    echo "Item not found.";
    echo "<a href='index.html'>Cancel</a>";
    
}

?>