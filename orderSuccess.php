<?php
if(!isset($_REQUEST['id'])){
    header("Location: bestel.php");
}
if(!session_id()){
    session_start();
}

// Include the database config file
require_once 'dbConfig.php';

// Fetch order details from database
$result = $db->query("SELECT r.*, b.bedrijf_naam, b.bedrijf_telefoonnummer, b.bedrijf_email FROM orders as r LEFT JOIN bedrijf as b ON b.bedrijf_id = r.customer_id WHERE r.customer_id = ".$_SESSION['uid']);

if($result->num_rows > 0){
    $orderInfo = $result->fetch_assoc();
}else{
    header("Location: bestel.php");
}
?>

<!DOCTYPE html>
<html lang="en">
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
  							if(isset($_SESSION['uid'])){
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
<div class="container font">
    <h1>ORDER STATUS</h1>
    <div class="col-12 font">
        <?php if(!empty($orderInfo)){ ?>
            <div class="col-md-12">
                <div class="alert alert-success"> Uw bestelling is geplaatst.</div>
            </div>

            <!-- Order items -->
            <div class="row col-lg-12">
                <table class="table table-hover">
                    <thead>
                        <tr class='font'>
                            <th>Product</th>
                            <th>Prijs</th>
                            <th>Aantal</th>
                            <th>Sub Totaal</th>
                            <th>Totaal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Get order items from the database
                        $result = $db->query("SELECT i.*, p.name,o.grand_total, p.price FROM order_items as i LEFT JOIN products as p ON p.id = i.product_id LEFT JOIN orders as o ON o.id = i.order_id WHERE i.order_id = ".$_GET['id']);
                        if($result->num_rows > 0){
                            while($item = $result->fetch_assoc()){
                                $price = $item["price"];
                                $quantity = $item["quantity"];
                                $sub_total = ($price*$quantity);
                                $total = $item['grand_total'];
                        ?>
                        <tr class='font'>
                            <td><?php echo $item["name"]; ?></td>
                            <td><?php echo '€'.$price.' EUR'; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo '€'.number_format((float)$sub_total, 2, '.', '').' EUR'; ?></td>

                        <?php }
                        } ?>
                        <td><?php echo '€'.$total.' EUR'; ?></td>
  </tr>
                    </tbody>
                </table>
            </div>
        <?php } else{ ?>
        <div class="col-md-12">
            <div class="alert alert-danger">Uw bestelling is mislukt.</div>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
