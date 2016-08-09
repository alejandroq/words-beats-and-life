<?php 
header('Content-Type: application/json');

include '../../connection.php';

// $data = json_decode(file_get_contents("php://input"));

$CourseID = $data->CourseID;

$db = DB::getInstance();
$sql = 'SELECT CONCAT(LastName , ", " , FirstName)StaffName, Staff.EmailAddress FROM GeneralUser INNER JOIN Staff ON GeneralUser.EmailAddress = Staff.EmailAddress';
// print_r($sql);
$req = $db->query($sql);

$data = array();

foreach ($req->fetchAll() as $rows) {
	$data[] = $rows;
}

print json_encode($data, JSON_PRETTY_PRINT);
?>