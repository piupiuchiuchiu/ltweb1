<?php 
	require_once("init.php");
	require_once("function.php");
	//Xử lý Logic
	unset($_SESSION['userID']);
	header('Location: index');
 ?>