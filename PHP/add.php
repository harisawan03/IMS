<?php

$file = 'db-connect.php';
include $file;

$upc = $_COOKIE["upc"];

$amountAdded = $_POST['amount'];
$item = $_POST['item'];
$category = $_POST['category'];

if ($_POST['exists'] == 'Yes') {
  $sqladd = "UPDATE it_inventory SET owned = owned + $amountAdded, available = available + $amountAdded WHERE upc LIKE (?)";
} else {
  $sqladd = "INSERT INTO it_inventory (id, item, category, owned, bin, available) VALUES (19, '$item', '$category', $amountAdded, 19, $amountAdded)";
}

$params = array($upc);
$sqldata = sqlsrv_query($conn, $sqladd, $params) or die( print_r( sqlsrv_errors(), true));

header("Location: /../confirm-add.html");

?>