<html>

<head>
  <title>IMS Confirm Check-out</title>
  <link href="styles/style.css" type="text/css" rel="stylesheet">
  <script src="script/multi-use.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script> 
    $(function(){
      $(".header").load("header.html");
    });
    </script>
</head>

<body onLoad="showUpdate()">

  <div class="header"></div>

  <div class="content">

    <div class="ims">
      <h2>IT Inventory Management</h2>
    </div>

    <div class="success">
      <br>
      <h3>Success!</h3>
      <p>Check-out has been completed</p>
      <p><?php echo $_POST['name']?></p>
      <div id="confirm"><h3>Confirm Out</h3></div>
      <a href="index.html">Return to Home</a>
    </div>

  </div>

</body>

</html>