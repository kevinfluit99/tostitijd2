<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Tostitijd</title>
<!-- MDB icon -->
<link rel="shortcut icon" href="img/tostitijd_zwart.png" type="image/png">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
<!-- Google Fonts Roboto -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Material Design Bootstrap -->
<link rel="stylesheet" href="css/mdb.min.css">
<!-- Your custom styles (optional) -->
<link rel="stylesheet" href="css/style.css">
  </head>
  <body class='background'>

    <!--Navbar-->
    <nav class="navbar navbar-dark  indigo darken-2">

      <!-- Navbar brand -->
      <a class="navbar-brand" href="#">Tostitijd</a>

      <!-- Collapse button -->
      <button class="navbar-toggler third-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent22"
        aria-controls="navbarSupportedContent22" aria-expanded="false" aria-label="Toggle navigation">
        <div class="animated-icon3"><span></span><span></span><span></span></div>
      </button>

      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent22">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="assortiment.php">Assortiment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aanmelden.php">Registreren</a>
          </li>
          <?php
  						// als je ingelogt bent staat er log out + username. // als je nog niet bent ingelogt staat er log in
  							if(isset($_SESSION['email'])){
  								echo"<a class='font' href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout ".$_SESSION['email']."</a>";
  							}else{
  								echo"<a class='font' href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a>";
  							}
  						?>
        </ul>
        <!-- Links -->

      </div>
      <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->
<!-- jQuery -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript"></script>
