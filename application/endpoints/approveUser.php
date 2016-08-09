<?php 
	//must drop applicant user. reflect in a specific kind of directory (only for admin.) consider dashboard with myclasses, etc. update data approved

	include '../../connection.php';
	$data = json_decode(file_get_contents("php://input"));

	//TEST DATA
	// $data = array(
	// 	"EmailAddress"=>"DobbsEL@gmail.com",
	// 	);

	// $data = json_encode($data, JSON_PRETTY_PRINT);
	// $data = json_decode($data);
	//END TEST DATA
	$EmailAddress = $data->EmailAddress;
	print_r($EmailAddress);

	$db = DB::getInstance();
	$sql = "UPDATE GeneralUser SET ActivatedBool = 1, UserType = 'Student' WHERE EmailAddress = '" . $EmailAddress . "'";
	print_r('<div>'. $sql .'</div>');
	$db->query($sql);

	$sql = "INSERT INTO Student(EmailAddress, UserLevel) Values('$EmailAddress', 1)";
	print_r($sql);
	$db->query($sql);

	$sql = "DELETE FROM Applicant WHERE EmailAddress = '" . $EmailAddress . "'";
	print_r('<div>'. $sql .'</div>');
	$db->query($sql);

?>
