<?php
// Hier worden de vragen naar de database gestuurd
function insertQuestion($naam,$bedrijf,$email,$vraag){
	$con = getDbConnection();
	$sql = "INSERT INTO vraag (naam,bedrijfsnaam,email,vraag) VALUES (?,?,?,?)";
	$stmt = $con->prepare($sql);
  $stmt->execute(array($naam,$bedrijf,$email,$vraag));
}
// Hier wordt een account in de database aangemaakt
function insertUser($bedrijf,$email,$nummer,$voornaam,$achternaam,$kvk,$adres,$plaats,$postcode,$provincie,$password){
	$con = getDbConnection();
	$sql = "INSERT INTO bedrijf
  (bedrijf_naam,bedrijf_email,bedrijf_telefoonnummer,bedrijf_vnaam,bedrijf_anaam,bedrijf_kvknummer,bedrijf_adres,bedrijf_plaats,bedrijf_postcode,bedrijf_provincie,bedrijf_wachtwoord)
   VALUES (?,?,?,?,?,?,?,?,?,?,?)";
	$stmt = $con->prepare($sql);
  $stmt->execute(array($bedrijf,$email,$nummer,$voornaam,$achternaam,$kvk,$adres,$plaats,$postcode,$provincie,$password));
}
// Hier worden de tosti's uit de database opgehaald
function getTosti($id = null){
	$input_parameters = array();

	$con = getDbConnection();
	$sql = "SELECT * FROM tosti";
	if($id != null ){
		$sql .= " WHERE tosti_id=? ";
		array_push($input_parameters , $id);
	}
	$stmt = $con->prepare($sql);
	$stmt->execute($input_parameters);
	return $id != null ?  $stmt->fetch() :  $stmt->fetchAll();
}
// Hier worden tosti's toegevoegd aan de database
function insertTosti($naam,$beschrijving,$prijs){
	$con = getDbConnection();
	$sql = "INSERT INTO tosti (tosti_naam,tosti_beschrijving,tosti_prijs) VALUES (?,?,?)";
	$stmt = $con->prepare($sql);
  $stmt->execute(array($naam,$beschrijving,$prijs));
}
// hier wordt de geselecteerde tosti verwijderd uit de database
function deleteTosti($id){
	$con = getDbConnection();
	$sql = "DELETE FROM tosti WHERE tosti_id=?";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($id));
}
// Hier worden de tosti's gewijzigd in de database
function updateTosti($naam,$beschrijving,$prijs,$id){
	$con = getDbConnection();
	$sql = "UPDATE tosti SET tosti_naam = ?, tosti_beschrijving = ?, tosti_prijs = ? WHERE  tosti_id=? ";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($naam,$beschrijving,$prijs,$id));
}
// Hier worden bestellingen geplaatst in de database
function insertBestelling($bedrijf_id,$tosti_id){
	$prijs=getTosti();
	$con = getDbConnection();
	$sql = "INSERT INTO bestelling (bedrijf_bedrijf_id,tosti_tosti_id) VALUES (?,?)";
	$stmt = $con->prepare($sql);
  $stmt->execute(array($bedrijf_id,$tosti_id));
}
// hier worden de bestellingen opgehaald uit de database
function getBestelling($id = null,$bestelling_id = null,$bedrijf_id=null){
	$input_parameters = array();

	$con = getDbConnection();
	$sql = "SELECT * FROM bestelling";
	if($id != null ){
		$sql .= " WHERE bestelling_id=? AND tosti_tosti_id=? AND bedrijf_bedrijf_id=?";
		array_push($input_parameters , $id,$bestelling_id,$bedrijf_id);
	}
	$stmt = $con->prepare($sql);
	$stmt->execute($input_parameters);
	return $id != null ?  $stmt->fetch() :  $stmt->fetchAll();
}