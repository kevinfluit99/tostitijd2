<?php
require_once('include/include.php');

$bestellingen = showbestelling($_SESSION['uid']);
echo"<div class='font center'><h3>Bestellingen</h3></br>";
foreach ($bestellingen as $bestelling) {
  echo" <div class='panel-group'>
      <div class='panel panel-default'>
        <div class='panel-heading'>
          <h4 class='panel-title'>
          <a href='factuur.php?order_id=".$bestelling['order_id']."'>
            <input type='submit' name='factuur' value='Bestelling van ".htmlentities($bestelling['created'])."'/>
            </a>
          </h4>
        </div>
      </div>
    </div>";
}
echo"</div>";
