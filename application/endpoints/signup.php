<?php
	include '../../connection.php';	

	$data = json_decode(file_get_contents("php://input"));

	//TEST DATA
	// $data = array(
	// 	"EmailAddress"=> uniqid() ."@test.com",
	// 	"FirstName"=>"Lame",
	// 	"LastName"=>"John",
	// 	"Gender"=>"Female",
	// 	"HomePhone"=>"8009991111",
	// 	"HomeAddress"=>"1234 Address",
	// 	"City"=>"Monastary",
	// 	"State"=>"VA",
	// 	"Zip"=>"22220",
	// 	"DOB"=>"2000/01/01",
	// 	"Password"=>"password",
	// 	"UserType"=>"Cipher", //student. parent, cipher
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
	// 	"AdminEmailAddress" => "Mazi@WBL.org",
	// 	"StaffType"=>"Intern",
	// 	"Specialty"=>"Rapping",
	// 	"LetterCount"=>3,
	// 	"Relationship"=>"Grandfather",
	// 	"BoolPaid"=>1,
	// 	"StudentInfo"=>"This girl is cool."
	// 	);

	// $data = json_encode($data, JSON_PRETTY_PRINT);
	// $data = json_decode($data);
	//END TEST DATA

	$EmailAddress = $data->EmailAddress;
	$FirstName = filter_var($data->FirstName,FILTER_SANITIZE_STRING);
	$LastName = filter_var($data->LastName,FILTER_SANITIZE_STRING);
	$Gender = filter_var($data->Gender,FILTER_SANITIZE_STRING);
	$ZIP = filter_var($data->ZIP,FILTER_SANITIZE_STRING);
	$DOB = $data->DOB;
	$Password = $data->Password;
	$Password = sha1($Password);
	$UserType = filter_var($data->UserType,FILTER_SANITIZE_STRING);
	$ShirtSize = filter_var($data->ShirtSize,FILTER_SANITIZE_STRING);
	$CellPhone = filter_var($data->CellPhone,FILTER_SANITIZE_STRING);
	$JoinDate = date('Y-m-d');

	$token = $token = $EmailAddress . " | " . uniqid() . uniqid() . uniqid();

	$db = DB::getInstance();
	$sql = "INSERT INTO GeneralUser(EmailAddress, FirstName, LastName, Gender, DOB, Password, UserType, ShirtSize, CellPhone, JoinDate, token) VALUES (
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
		"', '" . $token ."')";
		print_r($sql);
	$db->query($sql);

	switch ($UserType) { //Student, Parent, Cipher
		case 'Student': //Student creating their own account creates an Applicant user.
			$UserType="Applicant";
			$RequestedAccountType="Student";
			$Approved=0;
			$DateRequested=date("Y-m-d");
			$DateApproved= null; //pointless data
			// $StudentInfo= $data->StudentInfo;

			$sql = "INSERT INTO Applicant(EmailAddress, RequestedAccountType, Approved, DateRequested) VALUES('$EmailAddress', '$RequestedAccountType', $Approved, '$DateRequested')";
			print_r($sql);
			$db->query($sql);

			$sql = "UPDATE GeneralUser SET ActivatedBool = 0, UserType = 'Applicant' WHERE EmailAddress = '" . $EmailAddress . "'";
			print_r($sql);
			$db->query($sql);
			break;

		case 'Parent':
			$EmailAddress = $data->EmailAddress;
			$LetterCount = filter_var($data->LetterCount,FILTER_SANITIZE_STRING);;
			$Relationship = filter_var($data->Relationship,FILTER_SANITIZE_STRING);;
	
			$sql = "INSERT INTO Parent(EmailAddress, LetterCount, Relationship) VALUES('$EmailAddress', $LetterCount, '$Relationship')";
			$db->query($sql);
			print_r($sql);
			break;

		case 'Cipher':
			$EmailAddress = $data->EmailAddress;
			$BoolPaid = $data->BoolPaid;

			$sql = "INSERT INTO Cipher(EmailAddress, BoolPaid) VALUES ('$EmailAddress', $BoolPaid)";
			$db->query($sql);
			print_r($sql);
			break;
		
		default: break;
	}

	$data = array(
		"token"=>$token,
		"UserType"=>$UserType
		);

	echo json_encode($data, JSON_PRETTY_PRINT);
?>
