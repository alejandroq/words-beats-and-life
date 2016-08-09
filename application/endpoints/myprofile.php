<?php 
include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));
$token = $data->token;

$db = DB::getInstance();

// Find Email given Token
$db = DB::getInstance();
$sql = "SELECT EmailAddress FROM GeneralUser WHERE token = '$token'";
$req = $db->query($sql);
$EmailAddress=$req->fetchColumn();

$sql = "SELECT * FROM Student LEFT JOIN GeneralUser ON Student.EmailAddress = GeneralUser.EmailAddress WHERE Student.EmailAddress = '$EmailAddress'";
$req = $db->query($sql);

$data = array();
$i = 0;
foreach ($req->fetchAll() as $rows) {
	$data[] = $rows;
}

print json_encode($data, JSON_PRETTY_PRINT);
?>