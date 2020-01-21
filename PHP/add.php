<?php

$file = 'db-connect.php';
include $file;

$upc = $_COOKIE["upc"];

$sqlget = "SELECT item, category, available, owned, bin FROM it_inventory WHERE upc LIKE (?)";
$params = array($upc);
$sqldata = sqlsrv_query($conn, $sqlget, $params) or die( print_r( sqlsrv_errors(), true));
$inventory = sqlsrv_fetch_array($sqldata);

$amountAdded = $_POST['amount'];
$item = $_POST['item'];
$category = $_POST['category'];
$bin = $_POST['bin'];

if ($inventory['item']) {
  $sqladd = "UPDATE it_inventory SET owned = owned + $amountAdded, available = available + $amountAdded WHERE upc LIKE (?)";
} else {
  $sqladd = "INSERT INTO it_inventory (item, category, owned, bin, available, upc) VALUES ('$item', '$category', $amountAdded, '$bin', $amountAdded, (?))";
}

$params = array($upc);
$sqldata = sqlsrv_query($conn, $sqladd, $params);
if ($sqldata === false) {
  header("Location: /../warning.html"); // should not come into play due to automatically detecting if item exists or not, but keep as a failsafe
} else {
  header("Location: /../confirm-add.html");
}

?>