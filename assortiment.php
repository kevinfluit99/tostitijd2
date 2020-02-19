<?php
require_once('include/include.php');
$tostis = getTosti();

echo"  <h3 class='font asspage'>Assortiment</h3>
  <hr class='hr dropdown'>";
  if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){
    foreach($tostis as $tosti){
      echo"
      <div class='col-sm-5 assortiment' >
        <div class='thumbmail dropdown-content'>
          <div class='caption font'>
            <form method='POST' action='action/ac_tosti.php?id=".$tosti['id'].">
              <div class='form__group field'>
                  <input type='input' class='form__field' placeholder='".htmlentities($tosti['name'])."' name='txt_tnaam' id='name' required />
                  <label for='name' class='form__label'>Tosti naam</label>
                </div>
                </br>
                <div class='form__group field'>
                  <input type='input' class='form__field' placeholder='".htmlentities($tosti['description'])."' name='txt_tbeschrijving' id='name' required />
                  <label for='name' class='form__label'>Beschrijving</label>
                </div>
                </br>
                <div class='form__group field'>
                  <input type='input' class='form__field' placeholder='&#8364;".htmlentities($tosti['price'])."' name='txt_tprijs' id='name' required />
                  <label for='name' class='form__label'>Prijs</label>
                </div>
                </br>
                <input type= 'submit' class='btn btn-danger' name='Delete' value='Delete'>
                <input type= 'submit' class='btn btn-primary' name='Update' value='Wijzig'>
                  </form>
              </div>
          </div>
        </div>";
    }
    echo"

      <div class='col-md-4 bottom' id='Tosti'>
        <h1 class='insTosti font'>Voeg hier nieuwe tosti's toe</h1>
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
    foreach($tostis as $tosti){
      echo"
      <div class='col-md-7 center assortiment bestelling' >
        <div class='thumbmail dropdown-content'>
          <div class='caption font '>
            <p><b>".htmlentities($tosti['name'])."</b></p>
            <p><i>".htmlentities($tosti['description'])."</i></p>
            <p> &#8364; ".htmlentities($tosti['price'])."</p>
          </div>
        </div>
      </div>";
    }

  }
