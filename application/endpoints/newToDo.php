<?php 
header('Content-Type: application/json');

include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));

$token = $data->token;

// Find Email given Token
$db = DB::getInstance();
$sql = "SELECT EmailAddress FROM GeneralUser WHERE token = '$token'";
$req = $db->query($sql);
$EmailAddress=$req->fetchColumn(0);

// Primary Concern SQL
$sql = "SELECT CourseName, CONCAT(LastName , ', ' , FirstName)Name, (Enrollment.EmailAddress)RespondentEmail, (SectionStaff.EmailAddress)EvaluateeEmail, Enrollment.CourseID FROM Enrollment LEFT JOIN SectionStaff ON Enrollment.SectionID = SectionStaff.SectionID LEFT JOIN Course ON Enrollment.CourseID = Course.CourseID LEFT JOIN GeneralUser ON SectionStaff.EmailAddress = GeneralUser.EmailAddress WHERE EvalBool IS NULL AND Enrollment.EmailAddress = '$EmailAddress'";
$req = $db->query($sql);

$data = array();

foreach ($req->fetchAll() as $rows) {
	$data[] = $rows;
}

print json_encode($data, JSON_PRETTY_PRINT);
?>