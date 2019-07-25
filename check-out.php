
<html>

<head>
  <title>IMS Check-out</title> <!-- routes from home now, will ultimately route from scan page -->
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

    <div class="update">
      <br>
      <br>

      <?php
      $file = 'db_connect.php';
      include $file;

      $sqlget = "SELECT owned, available, item FROM it_inventory WHERE id = 1"; // sample query --eventually use views
      $sqldata = sqlsrv_query($conn, $sqlget) or die( print_r( sqlsrv_errors(), true));
      $inventory = sqlsrv_fetch_array($sqldata);
      
      echo "<p>";
      echo $inventory['item'];
      echo "</p>";
      echo "<p>Total Owned:";
      echo $inventory['owned'];
      echo "</p>";
      echo "<p>Total Available:";
      echo $inventory['available'];
      echo "</p>";
      ?>
      
      <br>
      <form method="post" action="confirm-out.php">
        Who's checking it out?<br><br>
        <input type="text" name="name"><br><br><br>
        <a href="index.html">Cancel</a>
        <script>
          function update() {
            <?php
            $sqlupdate = "UPDATE it_inventory SET available = available - 1 WHERE id = 1";
            $sqldata = sqlsrv_query($conn, $sqlupdate) or die( print_r( sqlsrv_errors(), true));
            ?>
          }
        </script>
        <input type="submit" onclick="update()" value="Confirm">
      </form>
    </div>

  </div>

</body>

</html>