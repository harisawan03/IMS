<?php

$file = 'db-connect.php';
include $file;

$amountAdded = $_POST['amount'];
$item = $_POST['item'];
$category = 'Other';

if ($_POST['exists'] == 'Yes') {
  $sqladd = "UPDATE it_inventory SET owned = owned + $amountAdded, available = available + $amountAdded WHERE id = 1";
} else {
  $sqladd = "INSERT INTO it_inventory (id, item, category, owned, bin, available) VALUES (14, $item, $category, $amountAdded, 14, $amountAdded)";
}

$sqldata = sqlsrv_query($conn, $sqladd) or die( print_r( sqlsrv_errors(), true));

header("Location: /../confirm-add.php");

?>