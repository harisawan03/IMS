
<html>

<head>
  <title>IMS Confirm Check-in</title>
  <link href="styles/style.css" type="text/css" rel="stylesheet">
</head>

<body onLoad="showInventory()">

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
      <p>Check-in has been completed by</p>
      <p><?php echo $_POST['name']?></p>
      <div id="confirmin"><h3>Confirm In</h3></div>

      <script>
        function showInventory() {
          let xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("confirmin").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "/PHP/confirm-inventory.php", true);
          xhttp.send();
        }
      </script>

      <a href="index.html">Return to Home</a>
    </div>

  </div>

</body>

</html>