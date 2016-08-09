<?php 
include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));

//TEST DATA
// $data = array(
// 	"SectionID"=>1,
// 	"CourseID"=>1,
// 	"token"=>'5705716f5afc13035716f5afc131a5716f5afc1342'
// 	);

// $data = json_encode($data, JSON_PRETTY_PRINT);
// $data = json_decode($data);
//END TEST DATA

$SectionID = $data->SectionID;
$CourseID = $data->CourseID;
$token = $data->token;

// Find Email given Token
$db = DB::getInstance();
$sql = "SELECT EmailAddress FROM GeneralUser WHERE token = '$token'";
$req = $db->query($sql);
$EmailAddress = $req->fetchColumn();

//Enrollment 
$sql = "SELECT COUNT(*) FROM Enrollment WHERE SectionID = $SectionID AND CourseID = $CourseID AND EmailAddress = '$EmailAddress'";
$req = $db->query($sql);
$x=$req->fetchColumn(0);


if ($x == 1) {
	echo 'Enrolled'; //If Enrolled
} else {
	$sql = "SELECT COUNT(*) FROM Enrollment WHERE EmailAddress = '$EmailAddress' AND EvalBool IS NULL";
	$req = $db->query($sql);
	$y=$req->fetchColumn(0);

	if ($y > 1) {
		echo 'Evaluation'; //If Eval not filled
	} else {
		echo 'notEnrolled'; //If Not Enrolled
	}
}
?>