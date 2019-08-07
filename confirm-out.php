<html>

<head>
  <title>IMS Confirm Check-out</title>
  <link href="styles/style.css" type="text/css" rel="stylesheet">
  <script src="script/multi-use.js"></script>
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
      <h3>Success!</h3>
      <p>Check-out has been completed by </p>
      <p><?php echo $_POST['name']?></p>
      <div id="confirm"><h3>Confirm Out</h3></div>
      <a href="index.html">Return to Home</a>
    </div>

  </div>

</body>

</html>