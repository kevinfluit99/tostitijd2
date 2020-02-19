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
function updateUser($bedrijf,$email,$nummer,$voornaam,$achternaam,$kvk,$adres,$plaats,$postcode,$provincie,$id){
	$con = getDbConnection();
	$sql = "UPDATE bedrijf SET bedrijf_naam = ?, bedrijf_email= ?, bedrijf_telefoonnummer = ?,bedrijf_vnaam = ?,bedrijf_anaam = ?,bedrijf_kvknummer = ?,bedrijf_adres = ?,bedrijf_plaats = ?,bedrijf_postcode = ?,bedrijf_provincie = ? WHERE  bedrijf_id=? ";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($bedrijf,$email,$nummer,$voornaam,$achternaam,$kvk,$adres,$plaats,$postcode,$provincie,$id));
}
// Hier worden de tosti's uit de database opgehaald
function getProfile($id = null){
	$input_parameters = array();

	$con = getDbConnection();
	$sql = "SELECT * FROM bedrijf";
	if($id != null ){
		$sql .= " WHERE bedrijf_id=? ";
		array_push($input_parameters , $id);
	}
	$stmt = $con->prepare($sql);
	$stmt->execute($input_parameters);
	return $id != null ?  $stmt->fetch() :  $stmt->fetchAll();
}
function getTosti($id = null){
	$input_parameters = array();

	$con = getDbConnection();
	$sql = "SELECT * FROM products";
	if($id != null ){
		$sql .= " WHERE id=? ";
		array_push($input_parameters , $id);
	}
	$stmt = $con->prepare($sql);
	$stmt->execute($input_parameters);
	return $id != null ?  $stmt->fetch() :  $stmt->fetchAll();
}
// Hier worden tosti's toegevoegd aan de database
function insertTosti($naam,$beschrijving,$prijs){
	$con = getDbConnection();
	$sql = "INSERT INTO products (name,description,price) VALUES (?,?,?)";
	$stmt = $con->prepare($sql);
  $stmt->execute(array($naam,$beschrijving,$prijs));
}
// hier wordt de geselecteerde tosti verwijderd uit de database
function deleteTosti($id){
	$con = getDbConnection();
	$sql = "DELETE FROM products WHERE id=?";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($id));
}
// Hier worden de tosti's gewijzigd in de database
function updateTosti($naam,$beschrijving,$prijs,$id){
	$con = getDbConnection();
	$sql = "UPDATE products SET name = ?, description = ?, price = ? WHERE  id=? ";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($naam,$beschrijving,$prijs,$id));
}
function showBestelling($bestelling_id){
 	$con = getDbConnection();
	$sql = "SELECT i.*, p.name, o.grand_total, o.created FROM order_items as i LEFT JOIN products as p ON p.id = i.product_id LEFT JOIN orders as o ON o.id = i.order_id WHERE o.customer_id =? GROUP BY i.order_id";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($bestelling_id));
	return $stmt->fetchAll();
}
function showProduct($bestelling_id,$order_id){
 	$con = getDbConnection();
	$sql = "SELECT i.*, p.name,p.price, o.grand_total, o.created FROM order_items as i LEFT JOIN products as p ON p.id = i.product_id LEFT JOIN orders as o ON o.id = i.order_id WHERE o.customer_id =? AND i.order_id =?";
	$stmt = $con->prepare($sql);
	$stmt->execute(array($bestelling_id,$order_id));
	return $stmt->fetchAll();
}
