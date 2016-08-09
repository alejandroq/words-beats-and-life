<?php 
include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));

$SectionID = $data->SectionID;
$CourseID = $data->CourseID;
$token = $data->token;

// Find Email given Token
$db = DB::getInstance();
$sql = "SELECT EmailAddress FROM GeneralUser WHERE token = '$token'";
$req = $db->query($sql);
$EmailAddress=$req->fetchColumn(0);

//Enrollment 
$sql = "INSERT INTO Enrollment (SectionID,CourseID,EmailAddress) VALUES ($SectionID,$CourseID,'$EmailAddress')";
$db->query($sql);

?>