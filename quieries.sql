
-- mine
SELECT * FROM Response LEFT JOIN EvalResponse ON Response.EvalResponseID = EvalResponse.EvalResponseID WHERE Response.RespondentEmail = 'Cole@wbl.org' AND EvalResponse.CourseID = 3

-- yours
$sql = "SELECT ResponseText, QuestionID FROM Response WHERE Response.EvalResponseID = (Select EvalResponseID from EvalResponse where EvaluateeEmail = $userEmail and CourseID = $CourseID)";


-- mine
$sql = "SELECT ResponseText, QuestionID FROM Response WHERE Response.EvalResponseID = '$userEmail'";


--for list of evaluaions
select EvalResponseID, RespondentEmail, CourseID, EvalResponseDate from EvalResponse where EvaluateeEmail = $userEmail;

--Questions and answers from selected Evaluation
Select Question.QuestionText, Response.ResponseText from Response Left Join Question on Response.QuestionID = Question.QuestionID Where Reponse.EvalResponseID = EvalResponseWhereClicked