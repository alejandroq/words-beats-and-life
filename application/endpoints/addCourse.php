<?php 
header('Content-Type: application/json');

// Lesson Plan should be TEXT data type or a link to file for future reference.

include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));

//TEST DATA
// $data = array(
// 	"CourseName"=>"TestCourse",
// 	"CourseElement"=>"Graffiti",
// 	"CourseDescription"=>null,
// 	"LessonPlan"=>"Sylabi Here",
//  "Capacity"=>30,
//  "CourseTime"=>"2016/4/18 4:00:00",
//  "Semester"=>"Fall 2016",
//  "Location"=>"DC Metro Area",
//  "StaffEmail"=>"Matam.Pages@gmail.com"
// 	);

// $data = json_encode($data, JSON_PRETTY_PRINT);
// $data = json_decode($data);
//END TEST DATA

$CourseName=filter_var($data->CourseName,FILTER_SANITIZE_STRING);
$CourseDescription=filter_var($data->CourseDescription,FILTER_SANITIZE_STRING);
$CourseElement=filter_var($data->CourseElement,FILTER_SANITIZE_STRING);
$LessonPlan=filter_var($data->LessonPlan,FILTER_SANITIZE_STRING);
$Capacity=$data->Capacity;
$CourseTime=$data->CourseTime;
$Semester=$data->Semester;
$Location=$data->Location;
$StaffEmail=$data->StaffEmail;

//COURSE COUNT
$db = DB::getInstance();
$sql = "SELECT COUNT(*)Count FROM Course";
print_r($sql);
$req = $db->query($sql);

$CourseCount=$req->fetchColumn(0);
$CourseCount++; //fake Auto_Increment

// INSERT COURSE
$sql = "INSERT INTO Course (CourseID,CourseName,CourseElement,CourseDescription,LessonPlan) VALUES ($CourseCount,'$CourseName','$CourseElement','$CourseDescription','$LessonPlan')";
print_r($sql);
$req = $db->query($sql);

// ADD Section 
$sql = "INSERT INTO Section (CourseID, Capacity, CourseTime, Semester, Location) VALUES ($CourseCount, $Capacity, '$CourseTime', $Semester, '$Location')";
print_r($sql);
$db->query($sql);

// GRAB SECTION COUNT
$db = DB::getInstance();
$sql = "SELECT COUNT(*)Count FROM Section";
print_r($sql);
$req = $db->query($sql);

$SectionCount=$req->fetchColumn(0);
$SectionCount++;

// ADD Section Staff to Section
$sql = "INSERT INTO SectionStaff (EmailAddress, SectionID, CourseID) VALUES ('$StaffEmail', $SectionCount, $CourseCount)";
print_r($sql);
$db->query($sql);
?>