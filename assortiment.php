<?php
require_once('include/include.php');
$tostis = getTosti();
$bestellingen = getbestelling();

echo"  <h3 class='font asspage'>Assortiment</h3>
  <hr class='hr dropdown'>";
  if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
    foreach($tostis as $tosti){
      echo"
      <div class='col-sm-5 assortiment' >
        <div class='thumbmail dropdown-content'>
          <div class='caption font'>
            <form method='POST' action='action/ac_tosti.php?id=".$tosti['tosti_id'].">
              <div class='form__group field'>
                  <input type='input' class='form__field' placeholder='".htmlentities($tosti['tosti_naam'])."' name='txt_tnaam' id='name' required />
                  <label for='name' class='form__label'>Tosti naam</label>
                </div>
                </br>
                <div class='form__group field'>
                  <input type='input' class='form__field' placeholder='".htmlentities($tosti['tosti_beschrijving'])."' name='txt_tbeschrijving' id='name' required />
                  <label for='name' class='form__label'>Beschrijving</label>
                </div>
                </br>
                <div class='form__group field'>
                  <input type='input' class='form__field' placeholder='&#8364;".htmlentities($tosti['tosti_prijs'])."' name='txt_tprijs' id='name' required />
                  <label for='name' class='form__label'>Prijs</label>
                </div>
                </br>
                <input type= 'submit' class='btn btn-primary' name='Delete' value='Delete'>
                <input type= 'submit' class='btn btn-primary' name='Update' value='Wijzig'>
              </div>
            </form>
          </div>
        </div>";
    }
    echo"
      <h1 class='insTosti font'>Voeg hier nieuwe tosti's toe</h1>
      <div class='col-md-4' id='Tosti'>
        <hr class='hr'>
        <div class='thumbmail'>
          <div class='caption font'>
            <form action='action/ac_tosti.php' method='POST'>
              <div class='form__group field'>
                <input type='input' class='form__field' placeholder='Naam' name='txt_tnaam' id='name' required />
                <label for='name' class='form__label'>Naam tosti</label>
              </div>
              </br>
              <div class='form__group field'>
                <input type='input' class='form__field' placeholder='Beschrijving' name='txt_tbeschrijving' id='name' required />
                <label for='name' class='form__label'>Beschrijving Tosti</label>
              </div>
              </br>
              <div class='form__group field'>
                <input type='input' class='form__field' placeholder='Prijs' name='txt_tprijs' id='name' required />
                <label for='name' class='form__label'>Prijs Tosti</label>
              </div>
              </br>
              <input class= 'btn btn-primary font' type='submit' value='Voeg tosti toe' name='Insert'>
            </form>
          </div>
        </div>
      </div>";
  }else{
    foreach($bestellingen as $bestelling){
      foreach($tostis as $tosti){
        echo"
        <div class='col-md-9 assortiment' >
          <div class='thumbmail dropdown-content'>
            <form method='POST' action='action/ac_tosti.php?tosti_id=".$tosti['tosti_id']."&bestelling_id=".$bestelling['bestelling_id']."&id=".$_SESSION['uid']."&prijs=".$tosti['tosti_prijs']."'>
              <div class='caption font'>
                  <p><b>".htmlentities($tosti['tosti_naam'])."</b></p>
                  <p><i>".htmlentities($tosti['tosti_beschrijving'])."</i></p>
                  <p> &#8364; ".htmlentities($tosti['tosti_prijs'])."</p>
              </div>
              <input type='hidden' name='item[".$tosti['tosti_id']."]' />
              <input type= 'submit' class='btn btn-primary' name='Bestel' value='Bestel'>
            </form>
          </div>
        </div>";
     }
     break;
   }
  }
