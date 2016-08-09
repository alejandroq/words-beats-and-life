<?php
	include '../../connection.php';

	//Delete Event, Hide Event, other features, say you will attend event, etc

	$data = json_decode(file_get_contents("php://input"));

	//TEST DATA
	// $data = array(
	// 	"EventName"=>"Third Test Event",
	// 	"EventType"=>"MCcing",
	// 	"EventDescription"=>"This is a Description for an Awesome Event.",
	// 	"EventDateTime"=>"2001/01/01",
	// 	"EventLocation"=>"DC Metro Station",
	// 	"PrimaryContact"=>"Laura Dawbs",
	// 	"PCEmail"=>"larua@dukes.jmu.edu",
	// 	"PCPhone"=>"7037037030"
	// );

	// $data = json_encode($data, JSON_PRETTY_PRINT);
	// $data = json_decode($data);
	//END TEST DATA

	$EventName = filter_var($data->EventName, FILTER_SANITIZE_STRING);	
	$EventType = filter_var($data->EventType, FILTER_SANITIZE_STRING);
	$EventDescription = filter_var($data->EventDescription, FILTER_SANITIZE_STRING);
	$EventDateTime = $data->EventDateTime;
	$EventLocation = filter_var($data->EventLocation, FILTER_SANITIZE_STRING);
	$PrimaryContact = filter_var($data->PrimaryContact, FILTER_SANITIZE_STRING);
	$PCEmail = $data->PCEmail;
	$PCPhone = filter_var($data->PCPhone, FILTER_SANITIZE_STRING);
		
	$db = DB::getInstance();
	$sql = "INSERT INTO WBLEvent (EventName, EventType, EventDescription, EventDateTime, EventLocation, PrimaryContact, PCEmail, PCPhone) VALUES ('$EventName', '$EventType', '$EventDescription', '$EventDateTime', '$EventLocation', '$PrimaryContact', '$PCEmail', '$PCPhone')";
	print_r($sql);
	$query = $db->query($sql);

	echo json_encode($EventName);
?>
