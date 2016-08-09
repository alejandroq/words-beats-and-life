<?php

include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));

$EmailAddress = $data->RespondentEmail;
$CourseID = $data->CourseID;

// Read Self-Evaluations 
$db = DB::getInstance();
$sql = "SELECT * FROM Response LEFT JOIN Question ON (Response.QuestionID+11) = Question.QuestionID LEFT JOIN EvalResponse ON Response.EvalResponseID = EvalResponse.EvalResponseID LEFT JOIN Course ON EvalResponse.CourseID = Course.CourseID WHERE Response.RespondentEmail = '$EmailAddress' AND Course.CourseID = $CourseID";
$req = $db->query($sql);

$data = array();

foreach ($req->fetchAll() as $rows) {
	$data[] = $rows;
}

print json_encode($data, JSON_PRETTY_PRINT);
?>