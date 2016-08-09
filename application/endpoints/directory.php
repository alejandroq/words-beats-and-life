<?php 
header('Content-Type: application/json');

include '../../connection.php';

$db = DB::getInstance();
$sql = 'SELECT CONCAT(LastName , ", " , FirstName) Name, FirstName, Password, LastName, EmailAddress, UserType, CellPhone, Gender, ShirtSize, DOB, ProfilePicture FROM GeneralUser ORDER BY UserType ASC';
$req = $db->query($sql);

$data = array();
$i = 0;
foreach ($req->fetchAll() as $rows) {
	$data[] = $rows;
	// $data[$i]['Password'] = sha1($data[$i++]['Password']);
}
foreach ($data as $rows) {
	$data[$i]['Password'] = sha1($data[$i]['Password']); $i++;
}
print json_encode($data, JSON_PRETTY_PRINT);
?>