<?php

	include '../../connection.php';

	$data = json_decode(file_get_contents("php://input"));

	//TEST DATA
	// $data = array(
	// 	"EventID"=>1,
	// 	"EventName"=>"Test Event",
	// 	"EventType"=>"Visual Art",
	// 	"EventDateTime"=>"2001/01/01",
	// 	"EventDescription"=>"This is a Description for an Awesome Evet.",
	// 	"EventLocation"=>"Down in the DM",
	// 	"PrimaryContact"=>"Sierra Van",
	// 	"PCEmail"=>"sierra@dukes.jmu.edu",
	// 	"PCPhone"=>"7037037030"
	// );
	// $data = json_encode($data, JSON_PRETTY_PRINT);
	// $data = json_decode($data);
	//END TEST DATA

	$EventID = filter_var($data->EventID,FILTER_SANITIZE_STRING);
	$EventName = filter_var($data->EventName,FILTER_SANITIZE_STRING);	
	$EventType = filter_var($data->EventType,FILTER_SANITIZE_STRING);
	$EventDescription = filter_var($data->EventDescription,FILTER_SANITIZE_STRING);
	$EventDateTime = filter_var($data->EventDateTime,FILTER_SANITIZE_STRING);
	$EventLocation = filter_var($data->EventLocation,FILTER_SANITIZE_STRING);
	$PrimaryContact = filter_var($data->PrimaryContact,FILTER_SANITIZE_STRING);
	$PCEmail = filter_var($data->PCEmail,FILTER_SANITIZE_STRING);
	$PCPhone = filter_var($data->PCPhone,FILTER_SANITIZE_STRING);
		
	$db = DB::getInstance();

	if ($EventDateTime != "") {
		$sql = "UPDATE WBLEvent SET EventName='$EventName', EventType='$EventType', EventDescription='$EventDescription', EventDateTime='$EventDateTime', EventLocation='$EventLocation', PrimaryContact='$PrimaryContact', PCEmail='$PCEmail', PCPhone='$PCPhone' WHERE EventID = " .  $EventID;
		print_r($sql);
		$query = $db->query($sql);
	} else {
		$sql = "UPDATE WBLEvent SET EventName='$EventName', EventType='$EventType', EventDescription='$EventDescription', EventLocation='$EventLocation', PrimaryContact='$PrimaryContact', PCEmail='$PCEmail', PCPhone='$PCPhone' WHERE EventID = " .  $EventID;
		print_r($sql);
		$query = $db->query($sql);
	}
	print_r($sql);

?>
