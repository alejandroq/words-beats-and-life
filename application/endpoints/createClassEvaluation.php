<?php

include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));

$RespondentEmail = $data->RespondentEmail;
$EvaluateeEmail= $data->EvaluateeEmail;
$EvalID = 2;
$ResponseDate = date('Y/m/d');
$CourseID = filter_var($data->CourseID,FILTER_SANITIZE_STRING);
$Results = filter_var($data->Results,FILTER_SANITIZE_STRING)/**/;

$db = DB::getInstance();

// CHECK/CREATE RESPONDENT
$sql = "SELECT COUNT(*) FROM Respondent WHERE RespondentEmail = '$RespondentEmail'";
$req = $db->query($sql);
$x=$req->fetchColumn(0);

if ($x==0) {
	$sql = "INSERT INTO Respondent (RespondentEmail, StudentEmailAddress) VALUES ('$RespondentEmail', '$RespondentEmail')";
	$db->query($sql);
}

// CHECK/CREATE RESPONDENT
$sql = "SELECT COUNT(*) FROM Evaluatee WHERE EvaluateeEmail = '$EvaluateeEmail'";
$req = $db->query($sql);
$x=$req->fetchColumn(0);

if ($x==0) {
	$sql = "INSERT INTO Evaluatee (EvaluateeEmail, StaffEmailAddress) VALUES ('$EvaluateeEmail', '$EvaluateeEmail')";
	$db->query($sql);
}

// CREATE EVAL RESPONSE
$sql = "INSERT INTO EvalResponse (RespondentEmail, EvalID, EvaluateeEmail, ResponseDate, CourseID) VALUES ('$RespondentEmail', $EvalID, '$EvaluateeEmail', '$ResponseDate', $CourseID)";
$db->query($sql);

$EvalResponseID = $db->lastInsertId('EvalResponseID'); // FIND EvalResponseID FROM LAST INSERT

// FILL FIELDS FROM FILLED FORM
for ($i = 0; $i < 39; $i++) {
	$ResponseText = $Results[$i]->Response;	
	$QuestionID = intval($Results[$i]->QuestionNumber);
	$sql = "INSERT INTO Response (RespondentEmail, EvalResponseID, ResponseText, QuestionID) VALUES('$RespondentEmail', '$EvalResponseID', '$ResponseText', '$QuestionID')";
	$db->query($sql);
}

// UPDATE EVAL COMPLETION
$sql = "UPDATE Enrollment SET EvalBool = 1 WHERE EmailAddress = '$RespondentEmail' AND CourseID = $CourseID";
$db->query($sql);
?>