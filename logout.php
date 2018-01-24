<?php include('inc/header.inc.php'); ?>

<?php

session_start();

//session_destory();
unset($_SESSION['user_login']);
unset($_SESSION['id']);

echo "<script>window.open('index.php','_self')</script>";

?>