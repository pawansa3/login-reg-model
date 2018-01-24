<?php 
session_start();
if (!isset($_SESSION['user_login']) && !isset($_SESSION['id'])) {
	$user = NULL;
	$uid = NULL;
}
else {
	$user = $_SESSION["user_login"];
	$uid = $_SESSION["id"];
	header("Location: home.php");
} 
 ?>

Welcome to our WebSite...

<a href="logout.php" >Log out</a>