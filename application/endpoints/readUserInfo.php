<?php 
include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));

$token = $data->token;
// $token = 'A.E57239640d241157239640d242c57239640d2438';

$data = array(); //initiliaze variables

// Find Email given Token
$db = DB::getInstance();
$sql = "SELECT EmailAddress FROM GeneralUser WHERE token = '$token'";
$req = $db->query($sql);
$EmailAddress=$req->fetchColumn(0);

// Get Basic User Info
$sql = "SELECT FirstName, UserType FROM GeneralUser WHERE EmailAddress = '$EmailAddress'";
$req = $db->query($sql);
$result = $req->fetch(PDO::FETCH_ASSOC);
$UserType=$result['UserType']; //may not account for multiple students to one parent

if ($UserType == "Student") {
	$sql = "SELECT FirstName, UserType, UserLevel FROM GeneralUser LEFT JOIN Student ON Student.EmailAddress = '$EmailAddress' WHERE GeneralUser.EmailAddress = '$EmailAddress'";
	$req = $db->query($sql);
	$result = $req->fetch(PDO::FETCH_ASSOC);
	$UserLevel=$result['UserLevel']; 
	switch ($UserLevel) {
		case 1:
			$UserLevel = "Soujourner";
			break;
		case 2: 
			$UserLevel = "Apprentice";
	}
	$data[]=$result;
	$data[0]['UserLevel']=$UserLevel;

} else {
	$sql = "SELECT FirstName, UserType FROM GeneralUser WHERE EmailAddress = '$EmailAddress'";
	$req = $db->query($sql);

	foreach ($req->fetchAll() as $rows) {
		$data[] = $rows;
	}
}

print json_encode($data, JSON_PRETTY_PRINT);
?>