<?php


	
	session_start();
	$_SESSION["goods"] = $_GET['goods'];
	$_SESSION["fileTable"] = $_GET['fileTable'];
	Header('Location:goods.php');
	
	
?>