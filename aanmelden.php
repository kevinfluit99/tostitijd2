<?php
require_once('include/include.php');
echo"
    <h1 class='font'>Registreren</h1>
    <div class='col-md-4' id='login'>
  				<hr class='hr'>
  				<div class='thumbmail'>
  					<div class='caption font'>
  						<form action='action/ac_user.php' method='POST'>
               <div class='form__group field'>
                  <input type='input' class='form__field' placeholder='Naam Tosti' name='txt_nbedrijf' id='name' required />
                  <label for='name' class='form__label'>Naam bedrijf</label>
                </div>
                <br>
                <div class='form__group field'>
                   <input type='input' class='form__field' placeholder='Naam Tosti' name='txt_email' id='name' required />
                   <label for='name' class='form__label'>Email</label>
                 </div>
              </br>
                <div class='form__group field'>
                   <input type='input' class='form__field' placeholder='Naam Tosti' name='txt_nummer' id='name' required />
                   <label for='name' class='form__label'>Telefoon nummer</label>
                 </div>
              </br>
                <div class='form-row'>
                  <div class-'col'>
                    <div class='form__group field'>
                       <input type='input' class='form__field' placeholder='Naam Tosti' name='txt_voornaam' id='name' required />
                       <label for='name' class='form__label'>Voornaam</label>
                     </div>
                  </div>
                  <div class='col'>
                    <div class='form__group field'>
                       <input type='input' class='form__field' placeholder='Naam Tosti' name='txt_achternaam' id='name' required />
                       <label for='name' class='form__label'>Achternaam</label>
                    </div>
                  </div>
                </div>
              </br>
                <div class='form__group field'>
                   <input type='input' class='form__field' placeholder='Naam Tosti' name='txt_kvk' id='name' required />
                   <label for='name' class='form__label'>Kvk-nummer</label>
                </div>
              </br>
                <div class='form__group field'>
                   <input type='input' class='form__field' placeholder='Naam Tosti' name='txt_adres' id='name' required />
                   <label for='name' class='form__label'>Adres</label>
                </div>
              </br>
                <div class='form__group field'>
                   <input type='input' class='form__field' placeholder='Naam Tosti' name='txt_plaats' id='name' required />
                   <label for='name' class='form__label'>Plaats</label>
                </div>
              </br>
                <div class='form__group field'>
                   <input type='input' class='form__field' placeholder='Naam Tosti' name='txt_postcode' id='name' required />
                   <label for='name' class='form__label'>Postcode</label>
                </div>
              </br>
              <div class='form__group field'>
                 <input type='input' class='form__field' placeholder='Naam Tosti' name='txt_provincie' id='name' required />
                 <label for='name' class='form__label'>Provincie</label>
              </div>
              </br>
                <div class='form__group field'>
                   <input type='password' class='form__field' placeholder='Naam Tosti' name='txt_pwd' id='name' required />
                   <label for='name' class='form__label'>Wachtwoord</label>
                </div>
              </br>
                <input class= 'btn btn-primary' type='submit' value='Meld je aan!' name='Insert'>
  						</form>
  					</div>
  				</div>
  			</div>";
