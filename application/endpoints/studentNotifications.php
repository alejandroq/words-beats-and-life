<?php 
header('Content-Type: application/json');

include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));

$token = $data->token;

// Find Email given Token
$db = DB::getInstance();
$sql = "SELECT EmailAddress FROM GeneralUser WHERE token = '$token'";
$req = $db->query($sql);
$EmailAddress=$req->fetchColumn(0);

// Primary Concern SQL
$sql = "SELECT * FROM Likes LEFT JOIN Portfolio ON Likes.PortfolioID = Portfolio.PortfolioID  WHERE Checked = 0 AND Liked = '$EmailAddress' ORDER BY Likes.PortfolioID DESC";
$req = $db->query($sql);

$data = array();

foreach ($req->fetchAll() as $rows) {
	$data[] = $rows;
}

// Add a Check to the Notifications
// $sql = "UPDATE Likes SET Checked = 1 WHERE Liked = '$EmailAddress'";
// $db->query($sql);

print json_encode($data, JSON_PRETTY_PRINT);
?>