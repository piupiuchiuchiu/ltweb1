<?php
	require_once("function.php");
	session_start();
try
{
	$db = new PDO('mysql:host=localhost;dbname=tbh;charset=utf8','root','');
}
catch (PDOException $e)
{
	echo "error".$e->getMessage();
}
$currentUser=null;
if (isset($_SESSION['userID']))
{
	$user=FindUserbyID($_SESSION['userID']);
	if ($user)
	{
		$currentUser=$user;
	}
}
?>