<?php 
header('Content-Type: application/json');

// 4-18 needs updating to accomodate Sections

include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));

// TEST DATA
// $data = array(
// 	"CourseID"=>"1",
// 	"CourseName"=>"Graffiti Drawing Course",
// 	"CourseElement"=>"Graffiti",
// 	"CourseDescription"=>"asdf",
// 	"LessonPlan"=>"Today's class is about Graffiti"
// 	);
// $data = json_encode($data, JSON_PRETTY_PRINT);
// $data = json_decode($data);
//END TEST DATA



$CourseID=$data->CourseID;
$CourseID=intval($CourseID);
$CourseName=filter_var($data->CourseName, FILTER_SANITIZE_STRING);
$CourseDescription=filter_var($data->CourseDescription, FILTER_SANITIZE_STRING);
$CourseElement=filter_var($data->CourseElement, FILTER_SANITIZE_STRING);
$LessonPlan=filter_var($data->LessonPlan, FILTER_SANITIZE_STRING);

$db= DB::getInstance();
$sql = "UPDATE Course SET CourseName ='$CourseName',CourseElement='$CourseElement',CourseDescription='$CourseDescription',LessonPlan='$LessonPlan' WHERE CourseID = $CourseID";
print_r($sql);
$req = $db->query($sql);
?>