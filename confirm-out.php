
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
      <p>Item_Name <br>has been successfully checked-out by </p><br>
      <?= $_POST['name'];?>
      <p>Total Owned: X</p><br>
      <p>Total Available: Y-1</p><br>
      <a href="index.html">Return to Home</a>
    </div>

  </div>

</body>

</html>