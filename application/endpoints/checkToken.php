<?php

	include '../../connection.php';
	$data = json_decode(file_get_contents("php://input"));
	$token = $data->token;
	$permissions = $data->permissions;
	$x = 0; $y = -1;

	switch ($permissions) {
		case 'Administrator':$x = 5;break;
		case 'Staff':$x = 4;break;
		case 'Student':$x = 3;break;
		case 'Parent':$x = 2;break;
		case 'Cipher':$x = 1;break;
		case 'Applicant':$x = 1;break;
		default:$x=0;break;
	}

	if ($token != "ERROR") {
		$db = DB::getInstance();
		$sql = "SELECT * FROM GeneralUser WHERE token = '$token'";
		$check = $db->query($sql);
		$check = $check->fetchAll();

		if (count($check) == 1) { //[0]
			switch ($check[0]["UserType"]) {
				case 'Administrator':$y = 5;break;
				case 'Staff':$y = 4;break;
				case 'Student':$y = 3;break;
				case 'Parent':$y = 2;break;
				case 'Cipher':$y = 1;break;
				case 'Applicant':$y = 1;break;
				default:$y=0;break;
			}
			echo $y;
		} else {
			echo 0;
		}
	} else {
		echo 0;
	}
?>