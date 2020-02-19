<?php
// Initialize shopping cart class
include_once 'Cart.class.php';
$cart = new Cart;
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

<!-- jQuery library -->
<script src="js/jquery.min.js"></script>

<script>
function updateCartItem(obj,id){
    $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
        if(data == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>

<div class="container">
    <h1 class='font'>Winkelmandje</h1>
    <div class="row">
        <div class="cart">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class='font'>
                                <th width="45%">Product</th>
                                <th width="10%">Prijs</th>
                                <th width="15%">Aantal</th>
                                <th class="text-right" width="20%">Totaal</th>
                                <th width="10%"> </th>
                            </tr>
                        </thead>
                        <tbody class='font'>
                            <?php
                            if($cart->total_items() > 0){
                                // Get cart items from session
                                $cartItems = $cart->contents();
                                foreach($cartItems as $item){
                            ?>
                            <tr>
                                <td><?php echo $item["name"]; ?></td>
                                <td><?php echo '€'. number_format((float)$item["price"], 2, '.', '').' EUR'; ?></td>
                                <td><input class="form-control aantalt" type="number" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"/></td>
                                <td class="text-right">€<?php echo  number_format((float)$item["subtotal"], 2, '.', ''); ?></td>
                                <td class="text-right"><button class="btn btn-sm btn-danger" onclick="return confirm('Weet je het zeker?')?window.location.href='cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;"><i class="itrash"></i> </button> </td>
                            </tr>
                            <?php } }else{ ?>
                            <tr><td colspan="5"><p>Uw winkelmandje is leeg.....</p></td>
                            <?php } ?>
                            <?php if($cart->total_items() > 0){ ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>Winkelmandje Totaal</strong></td>
                                <td class="text-right"><strong>€<?php echo  number_format((float)$cart->total(), 2, '.', ''); ?></strong></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class=" col-md-6">
                        <a href="bestel.php" class="btn btn-dark">Ga verder winkelen</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <?php if($cart->total_items() > 0){ ?>
                        <a href="checkout.php" class="btn btn-lg btn-block btn-primary">Betalen</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
