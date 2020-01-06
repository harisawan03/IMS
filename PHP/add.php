<?php

$file = 'db-connect.php';
include $file;

$upc = $_COOKIE["upc"];

$amountAdded = $_POST['amount'];
$item = $_POST['item'];
$category = $_POST['category'];
$bin = $_POST['bin'];

if ($_POST['exists'] == 'Yes') {
  $sqladd = "UPDATE it_inventory SET owned = owned + $amountAdded, available = available + $amountAdded WHERE upc LIKE (?)";
} else {
  $sqladd = "INSERT INTO it_inventory (item, category, owned, bin, available, upc) VALUES ('$item', '$category', $amountAdded, '$bin', $amountAdded, (?))";
}

$params = array($upc);
// $sqldata = sqlsrv_query($conn, $sqladd, $params) or die(sqlsrv_errors());

if ($sqldata === false) {
  echo "UPC already exists in database. Item not added, please select 'yes' to add to an existing item's data.";
}

header("Location: /../confirm-add.html");

?>