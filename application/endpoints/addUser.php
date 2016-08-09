<?php
	
	//ADMIN ADDING USER

	include '../../connection.php';	

	$data = json_decode(file_get_contents("php://input"));

	//Email Validation (no multiple emails)

	//TEST DATA
	// $data = array(
	// 	"EmailAddress"=> uniqid() ."@test.com",
	// 	"FirstName"=>"Bob",
	// 	"LastName"=>"Robert",
	// 	"Gender"=>"Male",
	// 	"HomePhone"=>"8009991111",
	// 	"HomeAddress"=>"1234 Address",
	// 	"City"=>"Fairfax",
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
	// 	"ManagerEmail"=>"Mazi@WBL.org",
	// 	"AdminTitle"=>"President of Africa",
	// 	"HireDate"=>"2000/01/01",
	// 	"AdminEmailAddress" => "SUPAHOTFIRE@WBL.org",
	// 	"StaffType"=>"Intern",
	// 	"Specialty"=>"Rapping",
	// 	"LetterCount"=>3,
	// 	"Relationship"=>"Grandfather",
	// 	"BoolPaid"=>1
	// 	);

	// $data = json_encode($data, JSON_PRETTY_PRINT);
	// $data = json_decode($data);
	//END TEST DATA

	$EmailAddress = $data->EmailAddress;
	$FirstName = filter_var($data->FirstName, FILTER_SANITIZE_STRING);
	$LastName = filter_var($data->LastName, FILTER_SANITIZE_STRING);
	$Gender = filter_var($data->Gender, FILTER_SANITIZE_STRING);
	$DOB = filter_var($data->DOB, FILTER_SANITIZE_STRING);
	$Password = $data->Password;
	$Password = sha1($Password);
	$UserType = filter_var($data->UserType, FILTER_SANITIZE_STRING);
	$ShirtSize = filter_var($data->ShirtSize, FILTER_SANITIZE_STRING);
	$CellPhone = filter_var($data->CellPhone, FILTER_SANITIZE_STRING);
	$JoinDate = date("Y/m/d");
	$Activated = 1;
	$token = "LOGGED OUT";

	$db = DB::getInstance();
	$sql = "INSERT INTO GeneralUser(EmailAddress, FirstName, LastName, Gender, DOB, Password, UserType, ShirtSize, CellPhone, JoinDate, ActivatedBool, token) VALUES (
		'" . $EmailAddress .
		"', '" . $FirstName . 
		"', '" . $LastName .
		"', '" . $Gender .
		"', '" . $DOB .
		"', '" . $Password .
		"', '" . $UserType . 
		"', '" . $ShirtSize .
		"', '" . $CellPhone .
		"', '" . $JoinDate . 
		"', " . $Activated .
		", '" . $token ."')";
		print_r($sql);
	$db->query($sql);

	switch ($UserType) {
		case 'Administrator':
			$ManagerEmail = $data->ManagerEmail;
			$AdminTitle = filter_var($data->AdminTitle, FILTER_SANITIZE_STRING);

			$sql = "Insert INTO Administrator(EmailAddress, ManagerEmail, AdminTitle, HireDate) Values('$EmailAddress', '$ManagerEmail', '$AdminTitle')";
			print_r($sql);
			$db->query($sql);
			break;

		case 'Staff':
			$AdminEmailAddress = $data->AdminEmailAddress;
			$StaffType = filter_var($data->StaffType, FILTER_SANITIZE_STRING);

			$sql = "Insert INTO Staff(EmailAddress, AdminEmailAddress, StaffType) Values('$EmailAddress', '$AdminEmailAddress', '$StaffType')";
			print_r($sql);
			$db->query($sql);
			break;

		case 'Student':
			$EmailAddress = $data->EmailAddress;
	
			$sql = "Insert INTO Student(EmailAddress, UserLevel) Values('$EmailAddress', 1)";
			print_r($sql);
			$db->query($sql);
			break;

		case 'Parent':	
			$EmailAddress = $data->EmailAddress;
			$sql = "Insert INTO Parent(EmailAddress) VALUES ('$EmailAddress')";
			print_r($sql);
			$db->query($sql);
			break;

		case 'Cipher':
			$EmailAddress = $data->EmailAddress;
			$sql = "Insert INTO Cipher(EmailAddress) Values('$EmailAddress')";
			print_r($sql);
			$db->query($sql);
			break;

		default: break;
	}
?>
