<?php

$file = 'db-connect.php';
include $file;

$upc = $_COOKIE["upc"];

$amountAdded = $_POST['amount'];
$item = $_POST['item'];
$category = $_POST['category'];
$bin = $_POST['bin'];

// need to figure out how to determine if need to update or insert based on new way of filling out form from UPC
if ($item === "") {
  $sqladd = "INSERT INTO it_inventory (item, category, owned, bin, available, upc) VALUES ('$item', '$category', $amountAdded, '$bin', $amountAdded, (?))";
} else {
  $sqladd = "UPDATE it_inventory SET owned = owned + $amountAdded, available = available + $amountAdded WHERE upc LIKE (?)";
}

$params = array($upc);
$sqldata = sqlsrv_query($conn, $sqladd, $params);
if ($sqldata === false) {
  header("Location: /../warning.html");
} else {
  header("Location: /../confirm-add.html");
}

?>