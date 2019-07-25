
<html>

<head>
  <title>IMS Confirm Check-out</title>
  <link href="styles/style.css" type="text/css" rel="stylesheet">
</head>

<body>

  <div class="header">

    <div class="logo">
      <img src="images/white-rvc-logo.svg" alt="Logo" height="100" width="100">
    </div>

    <div class="name">
      <h1>River Valley Church</h1>
    </div>

  </div>

  <div class="content">

    <div class="ims">
      <h2>IT Inventory Management</h2>
    </div>

    <div class="success">
      <br>
      <h3>Success!</h3>
      
      <?php
      $file = "db_connect.php";
      include $file;

      $sqlget = "SELECT owned, available, item FROM it_inventory WHERE id = 1"; // sample query --eventually use views
      $sqldata = sqlsrv_query($conn, $sqlget) or die( print_r( sqlsrv_errors(), true));
      $inventory = sqlsrv_fetch_array($sqldata);

      echo "<p>"; 
      echo $inventory['item'];
      echo "<br>has been successfully checked-out by <br> ";
      echo $_POST['name']; 
      echo "</p><br>";
      echo "<p>Total Owned: ";
      echo $inventory['owned'];
      echo "</p><br>";
      echo "<p>Total Available: ";
      echo $inventory['available'];
      echo "</p><br>";
      ?>
      <a href="index.html">Return to Home</a>
    </div>

  </div>

</body>

</html>