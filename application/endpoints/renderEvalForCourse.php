<?php 
// header('Content-Type: application/json');

include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));

$db = DB::getInstance();
$sql = "SELECT * FROM `QuestionOrder` JOIN Question ON QuestionOrder.QuestionID = Question.QuestionID WHERE EvalID = 2";
$req = $db->query($sql);

$data = array();

foreach ($req->fetchAll() as $rows) {
	$data[] = $rows;
}

print json_encode($data, JSON_PRETTY_PRINT);
?>