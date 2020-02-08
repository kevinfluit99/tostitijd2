<?php
require_once("../include/include.php");
	// hier wordt de input meegenomen naar de functie
    if(isset($_POST['Insert'])){
		$bedrijf = ($_POST['txt_nbedrijf']);
		$email = ($_POST['txt_email']);
		$nummer = ($_POST['txt_nummer']);
		$voornaam = ($_POST['txt_voornaam']);
    $achternaam = ($_POST['txt_achternaam']);
    $kvk = ($_POST['txt_kvk']);
    $adres = ($_POST['txt_adres']);
    $plaats = ($_POST['txt_plaats']);
    $postcode = ($_POST['txt_postcode']);
    $provincie = ($_POST['txt_provincie']);
    $wachtwoord = ($_POST['txt_pwd']);
		// dit is de functie en die wordt uit het bestand functions.php gehaald
		insertUser($bedrijf,$email,$nummer,$voornaam,$achternaam,$kvk,$adres,$plaats,$postcode,$provincie,password_hash($wachtwoord, PASSWORD_DEFAULT));
		header("location: ../contact.php");
	}
