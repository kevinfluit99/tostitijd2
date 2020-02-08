<?php
function getDbConnection() {


	$host = 'localhost';
	$user = 'root';
	$pdw = '';
	$db = 'tostitijd';

	static $con;

	if ($con) return $con;

	try{
		$con = new PDO ('mysql:host ='.$host.';charset=utf8;dbname='.$db, $user, $pdw);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}
	catch (Exception $e)
	{
		die('Caught exception: '. $e->getMessage());
	}

	return $con;


}
