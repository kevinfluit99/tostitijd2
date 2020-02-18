<?php
// Initialize shopping cart class
include_once 'Cart.class.php';
$cart = new Cart;

// Include the database config file
?>

<!DOCTYPE html>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
  </head>
  <body class='background'>

    <!--Navbar-->
    <nav class="navbar navbar-dark  indigo darken-2">

      <!-- Navbar brand -->
      <a class="navbar-brand" href="index.php">Tostitijd</a>

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
            <a class="nav-link" href="index.php">Home</a>
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
  								echo"
                  <li class='nav-item'>
                    <a class='nav-link font' href='mijnaccount.php'>Mijn Account</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link font' href='mijnbestelling.php'>Mijn Bestellingen</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link font' href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout ".$_SESSION['email']."</a>
                  </li>";

  							}else{
  								echo"
                  <li class='nav-item'>
                    <a class='nav-link font' href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a>
                  </li>";
  							}
  						?>
        </ul>
        <!-- Links -->

      </div>
      <!-- Collapsible content -->

    </nav>
<div class="container">
    <h1>PRODUCTS</h1>

    <!-- Cart basket -->
    <div class="cart-view">
        <a href="viewCart.php" title="View Cart"><i class="icart"></i> (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':'Empty'; ?>)</a>
    </div>

    <!-- Product list -->
    <div class="row col-lg-12">
        <?php
        // Get products from database
        $result = $db->query("SELECT * FROM products ORDER BY id DESC LIMIT 10");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
        ?>
        <div class="card col-lg-4">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Price: <?php echo '$'.$row["price"].' USD'; ?></h6>
                <p class="card-text"><?php echo $row["description"]; ?></p>
                <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
        <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
    </div>
</div>
<!-- jQuery library -->
<script src="js/jquery.min.js"></script>
</body>
</html>
