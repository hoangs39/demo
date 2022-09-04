<?php session_start(); /* Starts the session */

if(!isset($_SESSION['userdata']['username'])){
	header("location:login.php");
	exit;
}
?>

