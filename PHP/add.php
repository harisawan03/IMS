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
  $sqlcheck = "SELECT id FROM it_inventory WHERE upc LIKE (?)";
  if ($sqlcheck) {
    echo "<h3>You are attempting to add a duplicate UPC. Please select 'yes' or regenerate UPC.</h3>";
  } else {
    $sqladd = "INSERT INTO it_inventory (item, category, owned, bin, available, upc) VALUES ('$item', '$category', $amountAdded, '$bin', $amountAdded, (?))";
  }
}

$params = array($upc);
$sqldata = sqlsrv_query($conn, $sqladd, $params) or die(sqlsrv_errors());

header("Location: /../confirm-add.html");

?>