<?php

	include '../../connection.php';	

	$data = json_decode(file_get_contents("php://input"));

	$EmailAddress = $data->EmailAddress;

	$db = DB::getInstance();
	$sql =  "SELECT FirstName, LastName, EmailAddress, CellPhone, HomePhone, DOB, ShirtSize, Gender, Race, HomeAddress, City, State, Zip FROM GeneralUser WHERE EmailAddress= '" . $EmailAddress . "'";
	$req = $db->query($sql);

	$data = array();

	foreach ($req->fetchAll() as $rows) {
		$data[] = $rows;
	}
	$data[0]['Password'] = sha1($data[$i]['Password']);

	print json_encode($data, JSON_PRETTY_PRINT);

?>