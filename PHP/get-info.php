<?php

$file = 'db-connect.php';
include $file;

$upc = $_COOKIE["upc"];

$sqlget = "SELECT item, category, available, owned, bin FROM it_inventory WHERE upc LIKE (?)";
$params = array($upc);
$sqldata = sqlsrv_query($conn, $sqlget, $params) or die( print_r( sqlsrv_errors(), true));
$inventory = sqlsrv_fetch_array($sqldata);

echo 'UPC: ' . $upc;
echo '<form method="post" action="/PHP/add.php">
        <div id="required">
        Amount being added<br><input type="number" name="amount" min="1" step="1" value="1" required><br><br>
        <div id="info">
            Item Name<br><input type="text" name="item" value="'.$inventory["item"].'" required><br><br>
            Category<br>
            <select class="select" name="category" required>
            <option value="'.$inventory["category"].'"></option>
            <option value="cord">Cord</option>
            <option value="computer">Computer</option>
            <option value="adapter">Adapter</option>
            <option value="peripheral">Peripheral</option>
            <option value="other">Other</option>
            </select><br><br>
            Bin<br><input type="number" name="bin" min="1" step="1" value="'.$inventory["bin"].'" required><br><br>
            <!-- Description<br><input type="text" name="description"><br><br> -->
        </div>
        </div>
        <div id="add"></div>
        <div id="buttons">
        <a href="index.html">Cancel</a>
        
        <input type="submit" onClick="add()" value="Add">
        </div>

        </form>'

?>