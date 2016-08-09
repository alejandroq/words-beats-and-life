<?php 
header('Content-Type: application/json');

include '../../connection.php';

$db = DB::getInstance();
$sql = "SELECT EventID, EventName, EventType, EventDescription, DATE_FORMAT(EventDateTime, '%b-%d-%y %I:%i %p')EventDateTime, EventLocation, PrimaryContact, PCEmail, PCPhone, EventImage, SponsorEmail, EmailAddress FROM WBLEvent";
$req = $db->query($sql);

$data = array();

foreach ($req->fetchAll() as $rows) {
	$data[] = $rows;
}

print json_encode($data, JSON_PRETTY_PRINT);
?>