<?php 
header('Content-Type: application/json');

include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));

//TEST DATA
// $data = array(
// 	"CourseID"=>"1",
// 	);

// $data = json_encode($data, JSON_PRETTY_PRINT);
// $data = json_decode($data);
//END TEST DATA

$CourseID = $data->CourseID;

$db = DB::getInstance();
$sql = 'SELECT * FROM Course WHERE CourseID = ' . $CourseID;
print_r($sql);
$req = $db->query($sql);

$data = array();

foreach ($req->fetchAll() as $rows) {
	$data[] = $rows;
}

print json_encode($data, JSON_PRETTY_PRINT);
?>