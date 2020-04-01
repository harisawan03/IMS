<?php

$file = 'db-connect.php';
include $file;

$date = date("Y-m-d H:i");

// two upc cookies due to how php handles parameters for sql
$upc1 = $_COOKIE["upc"];
$upc2 = $_COOKIE["upc"];

// get data from server
$sqlget = "SELECT item, category, available, owned, bin FROM it_inventory WHERE upc LIKE (?)";
$params1 = array($upc1);
$sqldata = sqlsrv_query($conn, $sqlget, $params1) or die( print_r( sqlsrv_errors(), true));
$inventory = sqlsrv_fetch_array($sqldata);

$amountAdded = $_POST['amount'];
$item = $_POST['item'];
$category = $_POST['category'];
$bin = $_POST['bin'];

// check if item exists currently or if new row needs to be added
if ($inventory['item']) { // if item exists, update owned and available
  $sqladd = "UPDATE it_inventory SET owned = owned + $amountAdded, available = available + $amountAdded WHERE upc LIKE (?)";
} else { // if not in inventory, create new row with entered data
  $sqladd = "INSERT INTO it_inventory (item, category, owned, bin, available, upc) VALUES ('$item', '$category', $amountAdded, '$bin', $amountAdded, (?))";
}

$params1 = array($upc1); // probably don't need this
$sqldata = sqlsrv_query($conn, $sqladd, $params1);

// writes added item to log on the server
if ($sqldata === false) {
  header("Location: /../warning.html"); // should not come into play due to automatically detecting if item exists or not, but keep as a failsafe
} else {
  $sqlalog = "INSERT INTO add_remove_log VALUES ('added', '$date', (SELECT id FROM it_inventory WHERE upc LIKE (?)), $amountAdded, 'NA')";
  $params2 = array($upc2);
  $sqllog = sqlsrv_query($conn, $sqlalog, $params2);
  if ($sqllog === false) {
    die( print_r( sqlsrv_errors(), true));
  }
  header("Location: /../confirm-add.html");
}

?>