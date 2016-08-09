<?php 
// header('Content-Type: application/json');

// Lesson Plan should be TEXT data type or a link to file for future reference.

include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));

$token = $data->token;

// FIND EMAIL
$db = DB::getInstance();
$sql = "SELECT EmailAddress FROM GeneralUser WHERE token = '$token'";
$req = $db->query($sql);
$EmailAddress = $req->fetchColumn();

// ATTENDANCE COUNT
$sql = "SELECT COUNT(*) FROM Attendance WHERE EmailAddress = '$EmailAddress'";
print_r($sql);
$req = $db->query($sql);
$Attendance = $req->fetchColumn();

// ENROLLMENT COUNT
$sql = "SELECT COUNT(*) FROM Enrollment WHERE EmailAddress = '$EmailAddress'";
print_r($sql);
$req = $db->query($sql);
$Enrollment = $req->fetchColumn();

// FIND LEVEL
$sql = "SELECT UserLevel FROM Student WHERE EmailAddress = '$EmailAddress'";
print_r($sql);
$req = $db->query($sql);
$Level = $req->fetchColumn();

// IMMUTIBLE VARIABLE
$x = .8;

// LOGIC
if ($Attendance > ($x * $Enrollment)) {
	$Level++;
	$sql = "UPDATE Student SET UserLevel = $Level WHERE EmailAddress = '$EmailAddress'";
	$req = $db->query($sql);
} 

return $Level;
?>