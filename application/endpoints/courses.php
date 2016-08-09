<?php 
header('Content-Type: application/json');

include '../../connection.php';

$db = DB::getInstance();
$sql = 'SELECT Course.CourseID, Section.SectionID, CourseName, CourseElement, (Section.Capacity - (SELECT COUNT(EmailAddress) FROM Enrollment WHERE Enrollment.CourseID = Course.CourseID AND Enrollment.SectionID = Section.SectionID))SeatsLeft, Section.Location, Section.Semester, CourseDescription, LessonPlan FROM Course LEFT JOIN Section ON Course.CourseID=Section.CourseID ORDER BY SeatsLeft DESC';
$req = $db->query($sql);

$data = array();

foreach ($req->fetchAll() as $rows) {
	$data[] = $rows;
}

print json_encode($data, JSON_PRETTY_PRINT);
?>