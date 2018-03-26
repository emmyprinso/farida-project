<?php
$GLOBALS["servername"] = "localhost";
$GLOBALS["serverUserName"] = "root";
$GLOBALS["serverPassword"] = NULL;
$GLOBALS["dbname"] = "farida";



//try to connect to the database
$conn = mysqli_connect($GLOBALS["servername"], $GLOBALS["serverUserName], $GLOBALS["serverPassword"], $GLOBALS["dbname"]);

if(!$conn){		//connecting to the database failed
	$conn = mysqli_connect($GLOBALS["servername"], $GLOBALS["serverUserName"], GLOBALS["serverPassword"]);
	if(!$conn){
		die("Unable to connect to the server" . mysqli_connect_error($conn));
	}else{		//creating the database on the server
		$sql = "CREATE DATABASE " . $dbname;
		if(mysqli_query($sql)){
			echo "Successfully Created the Database " . $dbname;
		}else{
			echo "Unable to craete the database " . $dbname;
		}
	}
}


//successfully connected to the farida database
//test to see if the Customers table is available
$sql = "SELECT username, password FROM Customers";
$result = mysqli_query($conn, $sql);
if(!(mysqli_num_rows($results) > 0)){		//where the table does not exist
	//create the table with customers informations 
	$sql = "CREATE TABLE Customers(
			id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
			firstname VARCHAR(20) NOT NULL,
			lastname VARCHAR(20) NOT NULL,
			username VARCHAR(20) NOT NULL,
			password VARCHAR(20) NOT NULL,
			address VARCHAR(60) NOT NULL,
			phonenumber VARCHAR(20) NOT NULL,
			email VARCHAR(50),
			reg_date TIMESTAMP
			)";
	if(mysqli_query($conn, $sql)){
		//table was successfully created 
	}else{
		echo "<br> Customers table was not created";
	}
}


//validate if there is a session already running on
//if there is none start a session

if(empty($_SESSION["username"])){		//section not started
	session_start();		//start session
}




?>