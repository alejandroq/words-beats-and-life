<?php //instructor can view responses from students / vice versa (going to have to make it duble)

include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));

$token = $data->token;

// Find Email given Token
$db = DB::getInstance();
$sql = "SELECT EmailAddress, UserType FROM GeneralUser WHERE token = '$token'";
$req = $db->query($sql);
$result = $req->fetch(PDO::FETCH_ASSOC);
$EmailAddress=$result['EmailAddress'];
$UserType=$result['UserType'];


if ($UserType === "Student") {
	// Read Self-Evaluations 
	$sql = "SELECT CourseName, CONCAT(LastName , ', ' , FirstName)Name, (Enrollment.EmailAddress)RespondentEmail, (SectionStaff.EmailAddress)EvaluateeEmail, Enrollment.CourseID FROM Enrollment LEFT JOIN SectionStaff ON Enrollment.SectionID = SectionStaff.SectionID LEFT JOIN Course ON Enrollment.CourseID = Course.CourseID LEFT JOIN GeneralUser ON SectionStaff.EmailAddress = GeneralUser.EmailAddress WHERE EvalBool = 1 AND Enrollment.EmailAddress = '$EmailAddress'";

} else if ($UserType === "Administrator") {
	$sql = "SELECT CourseName, CONCAT(LastName , ', ' , FirstName)Name, (Enrollment.EmailAddress)RespondentEmail, (SectionStaff.EmailAddress)EvaluateeEmail, Enrollment.CourseID FROM Enrollment LEFT JOIN SectionStaff ON Enrollment.SectionID = SectionStaff.SectionID LEFT JOIN Course ON Enrollment.CourseID = Course.CourseID LEFT JOIN GeneralUser ON SectionStaff.EmailAddress = GeneralUser.EmailAddress WHERE EvalBool = 1";

} else if ($UserType === "Parent") { 

	$sql = "SELECT StudentEmailAddress, ParentEmailAddress from ParentStudent WHERE ParentEmailAddress = '$EmailAddress'";
	$req = $db->query($sql);
	$result = $req->fetch(PDO::FETCH_ASSOC);
	$StudentEmailAddress=$result['StudentEmailAddress']; //may not account for multiple students to one parent

	$sql = "SELECT CourseName, CONCAT(LastName , ', ' , FirstName)Name, (Enrollment.EmailAddress)RespondentEmail, (SectionStaff.EmailAddress)EvaluateeEmail, Enrollment.CourseID FROM Enrollment LEFT JOIN SectionStaff ON Enrollment.SectionID = SectionStaff.SectionID LEFT JOIN Course ON Enrollment.CourseID = Course.CourseID LEFT JOIN GeneralUser ON SectionStaff.EmailAddress = GeneralUser.EmailAddress WHERE EvalBool = 1 AND Enrollment.EmailAddress = '$StudentEmailAddress'";
}

$req = $db->query($sql);

$data = array();

foreach ($req->fetchAll() as $rows) {
	$data[] = $rows;
}

print json_encode($data, JSON_PRETTY_PRINT);
?>