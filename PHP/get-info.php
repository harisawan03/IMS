<?php

$upc = $_COOKIE["upc"];

$file = 'db-connect.php';
include $file;

$sqlget = "SELECT item, category, available, owned, bin FROM it_inventory WHERE upc LIKE (?)";
$params = array($upc);
$sqldata = sqlsrv_query($conn, $sqlget, $params) or die( print_r( sqlsrv_errors(), true));
$inventory = sqlsrv_fetch_array($sqldata);

echo 'UPC: ' . $upc;
echo '<br><br>';

if ($inventory["item"] == "") {
    echo '<form method="post" action="/PHP/add.php">
        <div id="required">
        Amount being added<br><input type="number" name="amount" min="1" step="1" value="1" required><br><br>
        <div id="info">
            Item Name<br><input type="text" name="item" required><br><br>
            Category<br>
            <select class="select" name="category" required style="background-color: #fff;>
            <option selected value=""></option>
            <option value="cord">cord</option>
            <option value="computer">computer</option>
            <option value="adapter">adapter</option>
            <option value="peripheral">peripheral</option>
            <option value="other">other</option>
            </select><br><br>
            Bin<br><input type="number" name="bin" min="1" step="1" required><br><br>
            <!-- Description<br><input type="text" name="description"><br><br> -->
        </div>
        </div>
        <div id="add"></div>
        <div id="buttons">
        <a href="index.html">Cancel</a>
        
        <input type="submit" onClick="add()" value="Add">
        </div>

        </form>';
} else {
    echo '<form method="post" action="/PHP/add.php">
        <div id="required">
        Amount being added<br><input type="number" name="amount" min="1" step="1" value="1" required><br><br>
        <div id="readonly">
            Item Name<br><input type="text" name="item" value="'.$inventory["item"].'" required readonly style="background-color: #ccc;"><br><br>
            Category<br>
            <select class="select" name="category" required readonly style="background-color: #ccc;">
            <option value="'.$inventory["category"].'">'.$inventory["category"].'</option>
            <option value="cord" disabled>cord</option>
            <option value="computer" disabled>computer</option>
            <option value="adapter" disabled>adapter</option>
            <option value="peripheral" disabled>peripheral</option>
            <option value="other" disabled>other</option>
            </select><br><br>
            Bin<br><input type="number" name="bin" min="1" step="1" value="'.$inventory["bin"].'" required readonly style="background-color: #ccc;"><br><br>
            <!-- Description<br><input type="text" name="description"><br><br> -->
        </div>
        </div>
        <div id="add"></div>
        <div id="buttons">
        <a href="index.html">Cancel</a>
        
        <input type="submit" onClick="add()" value="Add">
        </div>

        </form>';
}

?>