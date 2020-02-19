<?php
// Include the database config file
require_once 'dbConfig.php';

// Initialize shopping cart class
include_once 'Cart.class.php';
$cart = new Cart;

// If the cart is empty, redirect to the products page
if($cart->total_items() <= 0){
    header("Location: bestel.php");
}

// Get posted data from session
$postData = !empty($_SESSION['postData'])?$_SESSION['postData']:array();
unset($_SESSION['postData']);

// Get status message from session
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
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
        <ul class="navbar-nav mr-auto font">
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
                    <a class='nav-link font' href='bestel.php'>Bestel</a>
                  </li>
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

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom style -->
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class='font'>CHECKOUT</h1>
    <div class="col-12">
        <div class="checkout">
            <div class="row">
                <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
                <div class="col-md-12">
                    <div class="alert alert-success"><?php echo $statusMsg; ?></div>
                </div>
              <?php }elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
                <div class="col-md-12">
                    <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
                </div>
                <?php } ?>

                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Uw Winkelmandje</span>
                        <span class="badge badge-secondary badge-pill"><?php echo $cart->total_items(); ?></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php
                        if($cart->total_items() > 0){
                            //get cart items from session
                            $cartItems = $cart->contents();
                            foreach($cartItems as $item){
                        ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?php echo $item["name"]; ?></h6>
                                <small class="text-muted">€<?php echo number_format((float)$item["price"], 2, '.', '') ?>(<?php echo $item["qty"]; ?>)</small>
                            </div>
                            <span class="text-muted"><?php echo '€'.number_format((float)$item["subtotal"], 2, '.', ''); ?></span>
                        </li>
                        <?php } } ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Totaal (EUR)</span>
                            <strong>€<?php echo number_format((float)'€'.$cart->total(), 2, '.', ''); ?></strong>
                        </li>
                    </ul>
                    <a href="bestel.php" class="btn btn-block btn-info">Voeg andere producten toe</a>
                </div>
                <div class="col-md-8 order-md-1 ">
                    <h4 class="mb-3 Contacten">Contact Details</h4>
                    <form method="post" action="cartAction.php">
                        <div class="row Contacten">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">First Name</label>
                                <input type="hidden" class="form-control" name="first_name" value="<?php echo !empty($postData['first_name'])?$postData['first_name']:'test'; ?>" >
                            </div>
                            <div class="col-md-6 mb-3 Contacten">
                                <label for="last_name">Last Name</label>
                                <input type="hidden" class="form-control" name="last_name" value="<?php echo !empty($postData['last_name'])?$postData['last_name']:'test'; ?>" >
                            </div>
                        </div>
                        <div class="mb-3 Contacten">
                            <label for="email">Email</label>
                            <input type="hidden" class="form-control" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:'test@gmail.com'; ?>" >
                        </div>
                        <div class="mb-3 Contacten">
                            <label for="phone">Phone</label>
                            <input type="hidden" class="form-control" name="phone" value="<?php echo !empty($postData['phone'])?$postData['phone']:'0612345678'; ?>" >
                        </div>
                        <div class="mb-3 Contacten">
                            <label for="last_name">Address</label>
                            <input type="hidden" class="form-control" name="address" value="<?php echo !empty($postData['address'])?$postData['address']:'test'; ?>" >
                        </div>
                        <input type="hidden" name="action" value="placeOrder"/>
                        <input class="btn btn-success btn-lg btn-block bottom" type="submit" name="checkoutSubmit" value="Plaats bestelling">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
