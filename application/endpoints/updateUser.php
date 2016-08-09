<?php
	include '../../connection.php'; //self update and admin

	$data = json_decode(file_get_contents("php://input"));

	//TEST DATA
	// $data = array(
	// 	"EmailAddress"=> "570d92dcb4824@test.com",
	// 	"FirstName"=>"Hey",
	// 	"LastName"=>"John",
	// 	"Gender"=>"Female",
	// 	"HomePhone"=>"8009991111",
	// 	"HomeAddress"=>"1234 Address",
	// 	"City"=>"Monastary",
	// 	"State"=>"VA",
	// 	"Zip"=>"22220",
	// 	"DOB"=>"2000/01/01",
	// 	"Password"=>"password",
	// 	"UserType"=>"Cipher",
	// 	"PasswordHash"=>"hash",
	// 	"ShirtSize"=>"XL",
	// 	"UserPermission"=>1,
	// 	"LastLogin"=>"2000/01/01",
	// 	"Race"=>"Other",
	// 	"CellPhone"=>"8009991111",
	// 	"JoinDate"=>"2000/01/01",
	// 	"Activated"=>1,
	// 	);

	// $data = json_encode($data, JSON_PRETTY_PRINT);
	// $data = json_decode($data);
	//END TEST DATA

	$EmailAddress = $data->EmailAddress;
	$FirstName = filter_var($data->FirstName,FILTER_SANITIZE_STRING);
	$LastName = filter_var($data->LastName,FILTER_SANITIZE_STRING);
	$Gender = filter_var($data->Gender,FILTER_SANITIZE_STRING);
	$ZIP = filter_var($data->ZIP,FILTER_SANITIZE_STRING);
	$DOB = filter_var($data->DOB,FILTER_SANITIZE_STRING);
	$Password = $data->Password;
	$Password = sha1($Password);
	$UserType = filter_var($data->UserType,FILTER_SANITIZE_STRING);	
	$ShirtSize = filter_var($data->ShirtSize,FILTER_SANITIZE_STRING);
	$CellPhone = filter_var($data->CellPhone,FILTER_SANITIZE_STRING);

	$db = DB::getInstance();

	$sql = "UPDATE GeneralUser SET FirstName='$FirstName', LastName='$LastName', Gender='$Gender', DOB='$DOB', Password='$Password', UserType='$UserType', ShirtSize='$ShirtSize', CellPhone='$CellPhone' WHERE EmailAddress = '$EmailAddress'";
	print_r($sql);
	$query = $db->query($sql);
?>
