<?php 
include('connect.inc.php'); 
session_start();
if (!isset($_SESSION['user_login']) && !isset($_SESSION['id'])) {
	$user = NULL;
	$uid = NULL;
	//header("Location: index.php");
	//exit;
}
else {
	$user = $_SESSION["user_login"];
	$uid = $_SESSION["id"];
	header("Location: home.php");
}
?>