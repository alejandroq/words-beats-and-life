<?php

include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));
$token = $data->token;
$portfolioID = $data->PortfolioID;
$action = $data->Action;

$db = DB::getInstance();

// Find Email given Token
$sql = "SELECT EmailAddress, UserType FROM GeneralUser WHERE token = '$token'";
$req = $db->query($sql);
$result = $req->fetch(PDO::FETCH_ASSOC);
$EmailAddress=$result['EmailAddress'];	

// IF LIKED 
if ($action == "wall") {
	$sql = "UPDATE Portfolio SET FeaturedBool = 1 WHERE PortfolioID = $portfolioID";
	$db->query($sql);
}

$sql = "SELECT FeaturedBool FROM Portfolio WHERE PortfolioID = $portfolioID";
$req = $db->query($sql);
$data = array();
foreach ($req->fetchAll() as $rows) {
	$data[] = $rows;
}

print json_encode($data, JSON_PRETTY_PRINT);
?>