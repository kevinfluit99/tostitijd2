<?php
require_once('include/include.php');

$bestellingen = showbestelling($_SESSION['uid']);
echo"<div class='font center'><h3>Bestellingen</h3></br>";
foreach ($bestellingen as $bestelling) {
  echo"  <div class='col-md-9 assortiment' >

      <div class='thumbmail dropdown-content'>
          <div class='caption font bestelling'>
              <p><b>".htmlentities($bestelling['tosti_naam'])."</b></p>
              <p> &#8364; ".htmlentities($bestelling['bestelling_totaal'])."</p>
              <p><i>".htmlentities($bestelling['bestelling_datum'])."</i></p>
          </div>
      </div>
    </div>";
}
echo"</div>";
