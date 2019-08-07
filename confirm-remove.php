<html>

<head>
  <title>IMS Confirm Remove</title>
  <link href="styles/style.css" type="text/css" rel="stylesheet">
</head>

<body onLoad="showUpdate()">

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
      <h2>Removed successfully!</h2>
      <div id="confirmremove"><h3>Confirm Remove</h3></div>
      <script>
        function showUpdate() {
          let xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("confirmremove").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "/PHP/confirm-update.php", true);
          xhttp.send();
        }
      </script>
      <a href="index.html">Return to Home</a>
    </div>

  </div>

</body>

</html>