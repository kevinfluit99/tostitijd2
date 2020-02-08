<?php
require_once("../include/include.php");
	// hier wordt de input meegenomen naar de functie
    if(isset($_POST['Insert'])){
		$naam = ($_POST['txt_naam']);
		$bedrijf = ($_POST['txt_bedrijf']);
		$email = ($_POST['txt_email']);
		$vraag = ($_POST['txt_vraag']);
		// dit is de functie en die wordt uit het bestand functions.php gehaald
		insertQuestion($naam,$bedrijf,$email,$vraag);
		header("location: ../contact.php");
	}
