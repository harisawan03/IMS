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
  $sqlid = "SELECT MAX(id) AS currentID FROM it_inventory";
  $sqlid = "SELECT MAX(bin) AS currentBin FROM it_inventory";
  $sqladd = "INSERT INTO it_inventory (id, item, category, owned, bin, available, upc) VALUES ((currentID+1), '$item', '$category', $amountAdded, (currentBin+1), $amountAdded, (?))";
}

$params = array($upc);
$sqldata = sqlsrv_query($conn, $sqladd, $params) or die( print_r( sqlsrv_errors(), true));

header("Location: /../confirm-add.html");

?>