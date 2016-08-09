<?php
	include '../../connection.php';
	$db = DB::getInstance();

	$password = 'dukes';
	$password = sha1($password);

	$sql = "UPDATE GeneralUser SET password = '$password'";
	$db->query($sql);
?>