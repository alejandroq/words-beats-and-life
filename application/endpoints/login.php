<?php
	include '../../connection.php';
	$db = DB::getInstance();

	$data = json_decode(file_get_contents("php://input"));

	$username = $data->username;
	$password = $data->password;
	$password = sha1($password);

	$sql = "SELECT EmailAddress FROM GeneralUser WHERE LOWER(EmailAddress) = LOWER('$username') AND password = '$password'";
	$userInfo = $db->query($sql);

	$token;

	if(count($userInfo) == 1) {
		// user is logged in and given a token
		$token =  substr($username,0,3) . uniqid() . uniqid() . uniqid();
		$sql = "UPDATE GeneralUser SET token = '$token' WHERE LOWER(EmailAddress) = LOWER('$username') AND password = '$password'";
		$db->query($sql);
		echo json_encode($token);
	} else {
		echo "ERROR";
	}
	// token has been added to the GeneralUser table 
?>