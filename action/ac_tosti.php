<?php
require_once("../include/include.php");
// hier worden de ingevulde gegevens van de tosti naar de functies gestuurd

    if(isset($_POST['Insert'])){
		$naam = ($_POST['txt_tnaam']);
		$beschrijving = ($_POST['txt_tbeschrijving']);
		$prijs = ($_POST['txt_tprijs']);
		insertTosti($naam,$beschrijving,$prijs);
		header("location: ../assortiment.php");
	}elseif(isset($_POST['Delete'])){
		$id = $_GET['id'];
		deleteTosti($id);
		header("location: ../assortiment.php");
	}elseif(isset($_POST['Update'])){
    $naam = ($_POST['txt_tnaam']);
		$beschrijving = ($_POST['txt_tbeschrijving']);
		$prijs = ($_POST['txt_tprijs']);
		$id = $_GET['id'];
		updateTosti($naam,$beschrijving,$prijs,$id);
		header("location: ../assortiment.php");
	}elseif(isset($_POST['Bestel'])){
		$aantal =  $_SESSION['shopping_cart'][0]['item_quantity'];
    $totaal_prijs = $_SESSION['shopping_cart'][0]['item_price'];
		$bedrijf_id = $_GET['id'];
    $tosti_id = $_GET['tosti_id'];
		updateTosti($naam,$beschrijving,$prijs,$id);
		header("location: ../test.php");
  }
