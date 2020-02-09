<?php
	require_once("include/include.php");
	// hier wordt het profiel van de ingelogde gebruiker getoont
	if(isset($_SESSION['email'])){
		$gebruiker = getProfile($_SESSION['uid']);
		echo"<div class='col-md-3 font' id='login'>
				<h3 class='font' >Profiel van ".htmlentities($gebruiker['bedrijf_naam'])."</h3>
				<hr class='hr'>
				<div class='thumbmail'>
					<form method='POST' action='action/ac_user.php'>
						<div class='caption loginText'>
							<label>Bedrijfsnaam</label>
							<input class='form__field' name='txt_nbedrijf' value='".htmlentities($gebruiker['bedrijf_naam'])."' >
							</br>
							<label>Email</label>
							<input class='form__field' name='txt_email' value='".htmlentities($gebruiker['bedrijf_email'])."'>
							</br>
							<label>Telefoonnummer</label>
							<input class='form__field' name='txt_nummer' value='".htmlentities($gebruiker['bedrijf_telefoonnummer'])."'>
							</br>
							<label>Voornaam</label>
							<input class='form__field' name='txt_voornaam' value='".htmlentities($gebruiker['bedrijf_vnaam'])."'>
							</br>
							<label>Achternaam</label>
							<input class='form__field' name='txt_achternaam' value='".htmlentities($gebruiker['bedrijf_anaam'])."'>
							</br>
							<label>Kvk-nummer</label>
							<input class='form__field' name='txt_kvk' value='".htmlentities($gebruiker['bedrijf_kvknummer'])."'>
							</br>
							<label>Adres</label>
							<input class='form__field' name='txt_adres' value='".htmlentities($gebruiker['bedrijf_adres'])."'>
							</br>
              <label>Plaats</label>
							<input class='form__field' name='txt_plaats' value='".htmlentities($gebruiker['bedrijf_plaats'])."'>
							</br>
              <label>Postcode</label>
							<input class='form__field' name='txt_postcode' value='".htmlentities($gebruiker['bedrijf_postcode'])."'>
							</br>
              <label>Provincie</label>
							<input class='form__field' name='txt_provincie' value='".htmlentities($gebruiker['bedrijf_provincie'])."'>
							</br>
							<input type='submit' value='Wijzig' class= 'btn btn-primary' name='Update'>
						</div>
					</form>
				</div>
			</div>";
	}else{
		echo"<h3 class='loginText'><a class='loginText' href='login.php'>Log-in</a> or <a class='loginText' href='aanmelden.php'>sign-up</a></h3>";
	}
