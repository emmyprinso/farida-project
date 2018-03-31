<?php

	session_start();
	$_SESSION["username"] = NULL;
	$_SESSION["password"] = NULL;	
	Header('Location:index.php');
	

?>