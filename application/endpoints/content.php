<?php

include '../../connection.php';

$data = json_decode(file_get_contents("php://input"));

$token = $data->token;
$location = $data->location;
$StudentEmailAddress = $data->StudentEmailAddress;

// Find Email given Token
$db = DB::getInstance();
$sql = "SELECT EmailAddress, UserType FROM GeneralUser WHERE token = '$token'";
$req = $db->query($sql);
$result = $req->fetch(PDO::FETCH_ASSOC);
$EmailAddress=$result['EmailAddress'];
$UserType=$result['UserType'];

if ($location == "/") { //HOME VIEWS ( WALL )
	$sql = "SELECT * FROM Portfolio LEFT JOIN GeneralUser ON Portfolio.StudentEmailAddress = GeneralUser.EmailAddress WHERE FeaturedBool = 1 ORDER BY PortfolioID DESC";
} else if ($location == "/content") { //CONTENT VIEWS
	
	if ($StudentEmailAddress == "") {
		if ($UserType === "Student") { 
			$sql = "SELECT * FROM Portfolio LEFT JOIN GeneralUser ON Portfolio.StudentEmailAddress = GeneralUser.EmailAddress WHERE ApprovedBool = 1 AND EmailAddress = '$EmailAddress' ORDER BY PortfolioID DESC";


		} else if ($UserType === "Administrator") { 
			$sql = "SELECT * FROM Portfolio LEFT JOIN GeneralUser ON Portfolio.StudentEmailAddress = GeneralUser.EmailAddress ORDER BY PortfolioID DESC";


		} else if ($UserType === "Parent") { 
			$sql = "SELECT StudentEmailAddress, ParentEmailAddress from ParentStudent WHERE ParentEmailAddress = '$EmailAddress'";
			$req = $db->query($sql);
			$result = $req->fetch(PDO::FETCH_ASSOC);
			$StudentEmailAddress=$result['StudentEmailAddress']; //may not account for multiple students to one parent

			$sql = "SELECT * FROM Portfolio LEFT JOIN GeneralUser ON Portfolio.StudentEmailAddress = GeneralUser.EmailAddress WHERE ApprovedBool = 1 AND EmailAddress = '$StudentEmailAddress' ORDER BY PortfolioID DESC";
		}
	} else {
		$sql = "SELECT * FROM Portfolio LEFT JOIN GeneralUser ON Portfolio.StudentEmailAddress = GeneralUser.EmailAddress WHERE ApprovedBool = 1 AND EmailAddress = '$StudentEmailAddress' ORDER BY PortfolioID DESC";

	}

} else if ($location == "/portfolio") { //PORTFOLIO VIEWS
	$sql = "SELECT * FROM Portfolio LEFT JOIN GeneralUser ON Portfolio.StudentEmailAddress = GeneralUser.EmailAddress WHERE ApprovedBool = 1 AND EmailAddress = '$EmailAddress' ORDER BY PortfolioID DESC";
}
$req = $db->query($sql);
$data = array();

foreach ($req->fetchAll() as $rows) {
	$data[] = $rows;
}

print json_encode($data, JSON_PRETTY_PRINT);
?>