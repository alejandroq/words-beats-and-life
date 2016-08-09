<?php

	include '../../connection.php';
	$data = json_decode(file_get_contents("php://input"));

	$token = $data->token;
	// $token = "5705710ca791546f5710ca79154935710ca79154a5";

	$db = DB::getInstance();
	$sql = "UPDATE GeneralUser SET token = 'LOGGED OUT' WHERE token='$token'";
	$db->query($sql); 
	
?>