<?php

$file = 'db-connect.php';
include $file;

$upc = $_COOKIE["upc"];

$sqlcategory = "SELECT category FROM it_inventory WHERE upc LIKE (?)";

$params = array($upc);

$sqlcheck = sqlsrv_query($conn, $sqlcategory, $params);

if ($sqlcategory === "computer" || "tablet" || "phone") {
    echo 'Who is checking it out?<br>
    (Required for Computers, Tablets, and Phones)<br><br>
    <input type="text" name="name" required><br><br><br>
    <a href="index.html">Cancel</a>
    <input type="submit" onClick="checkout()" value="Confirm">';
} else {
    echo 'Who is checking it out?<br>
    (Required for Computers, Tablets, and Phones)<br><br>
    <input type="text" name="name"><br><br><br>
    <a href="index.html">Cancel</a>
    <input type="submit" onClick="checkout()" value="Confirm">';
}

?>