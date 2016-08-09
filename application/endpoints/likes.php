<?php

include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));
$token = $data->token;
$portfolioID = $data->PortfolioID;
$action = $data->Action;
$student = $data->StudentEmailAddress;

$db = DB::getInstance();

// Find Email given Token
$sql = "SELECT EmailAddress, UserType FROM GeneralUser WHERE token = '$token'";
$req = $db->query($sql);
$result = $req->fetch(PDO::FETCH_ASSOC);
$EmailAddress=$result['EmailAddress'];
$UserType=$result['UserType'];

// IF LIKED 
if ($action == "like" || $action == "approve") {
	// CHECK TO SEE IF LIKED BEFORE
	$sql="SELECT COUNT(*)Count FROM Likes WHERE Likee = '$EmailAddress' AND PortfolioID = $portfolioID LIMIT 1";
	$req = $db->query($sql);
	$result = $req->fetch(PDO::FETCH_ASSOC);
	$count = $result['Count'];

	// IF NOT LIKED BEFORE, LIKE IT
	if ($count == 0) {
		$sql = "INSERT INTO Likes (PortfolioID, Likee, Liked, Checked) VALUES ($portfolioID, '$EmailAddress', '$student', 0)";
		$db->query($sql);
	} 

	if ($UserType == "Administrator") {
		$sql = "UPDATE Portfolio SET ApprovedBool = 1 WHERE PortfolioID = $portfolioID";
		$db->query($sql);
	}

} else if ($action == "wall") {
	$sql = "UPDATE Portfolio SET FeaturedBool = 1 WHERE PortfolioID = $portfolioID";
	$db->query($sql);
} 

// USER Cancels Notificaiton Upon View
$sql = "UPDATE Likes SET Checked=1 WHERE PortfolioID = $portfolioID AND Liked='$EmailAddress'";
$db->query($sql);
// END DUCTTAPE

$sql = "SELECT (SELECT ApprovedBool FROM Portfolio WHERE PortfolioID = $portfolioID)Approved, (SELECT FeaturedBool FROM Portfolio WHERE PortfolioID = $portfolioID)Featured, (SELECT COUNT(*) FROM Likes WHERE PortfolioID = $portfolioID)Count, (SELECT COUNT(*) FROM Likes WHERE Likee = '$EmailAddress' AND PortfolioID = $portfolioID)Liked FROM Likes WHERE PortfolioID = $portfolioID LIMIT 1";
$req = $db->query($sql);
$data = array();
foreach ($req->fetchAll() as $rows) {
	$data[] = $rows;
}

print json_encode($data, JSON_PRETTY_PRINT);
?>