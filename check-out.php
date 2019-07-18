
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
      echo "<p>this displays 1</p>"; //test
      // $file = 'db_connect.php';
      echo "<p>this displays 2</p>"; //test
      // include '$file';

      /******************************* will eventually be in separte file *******************************/
      $serverName = "RVC-INVENTORY"; // proper server name?
      echo "<p>this displays 3</p>"; // test
      $connectionInfo = array( "Database"=>"rvc-inventory"); // proper connection info?
      echo "<p>this displays 4</p>"; // test
      $conn = sqlsrv_connect( $serverName, $connectionInfo);
      echo "<p>this does not display 5</p>"; // test

      if( $conn ) {
        echo "Connection established.<br />";
      }else{
        echo "Connection could not be established.<br />";
        die( print_r( sqlsrv_errors(), true));
      }
      /**************************************************************************************************/

      echo "<p>this does not display 6</p>"; // test
      $sqlget = "SELECT owned, available, item FROM it_inventory WHERE id = 1"; // sample query
      echo "<p>this does not display 7</p>"; // test
      $sqldata = sqlsrv_query($conn, $sqlget) or die('error getting data from database');
      echo "<p>this does not display 8</p>"; // test
      $inventory = sqlsrv_fetch_array($sqldata);
      
      echo "<p>Item #1</p>";
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
        <input type="submit" value="Confirm">
      </form>
    </div>

  </div>

</body>

</html>