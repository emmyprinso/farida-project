<?php
include "configuration.php";


//ini_set('display_errors', false);				//REMEMBER TO RE ACTIVATE ERROR WHEN NECESSARY


$username = NULL;
$password = NULL;
echo "after include";
session_start();
/*echo "<br><br>";
echo $_SESSION["username"];

echo "<br><br>";
echo $_SESSION["password"];
*/
try {
	if ($_SESSION["username"] == NULL or $_SESSION["password"] == NULL){
		throw new Exception("there is no password");
	}else{
		$username = $_SESSION["username"];
		$password = $_SESSION["password"];	
	}

	//echo "<br>No error";
}
catch(Exception $e){
	$username = NULL;
	$password = NULL;
	//echo "<br>Exception caught: ".$e->getMessage();
}



/////////////////////////////////////////////////////////////VARIABLES TO UPDATE ITEMS/////////////////////////////
$id;
$item;
$model;
$displaySize;
$screenRes;
$processorType;
$clockSpeed;
$ram;
$storage;
$operatingSystem;
$description;
$price;
$orderStatus;
$reg_date;

$index = 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>faridaCOM</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet" type="text/css" href="products.css"> 
<link rel="stylesheet" type="text/css" href="template.css">
<script src="action.js"></script>
<script src="products.js"></script>


</head>

<body onload="myMove()" style="background-color:#e6faff;">

  <div id="headPlusNav" class="sticky">
	<div id="headerSection">


	<div id="headerAlign">
		<img id="logo" src="Logo.png" alt="logo" width="168px" height="61">

		
		
		<div id="search" style="border:0px solid gray;border-radius:10px;width:62%;height:37px;float:left;margin-bottom:1px;margin-right:1px;">
			
			<form id="searchForm" method="post" action="searchEngine.php">
			
			
			<select name="options" class="searchCollection">
					<option value="General">General</option>
					<option value="Laptops">Laptops</option> 
					<option value="Desktop PC">Desktop PC</option>	
					<option value="Accessories">Accessories</option>	
			</select>
			
			
		      	<input type="text" id="searchInput" name="search" size="25" class="searchCollection">
		      	<input type="submit" value="SEARCH" id="searchButton" class="searchCollection">
			</form>
		</div> <!--End search div -->
	<div id="regButtonDiv" style="height:37px;margin:10px;float:left;">

<?php
	if ($username != NULL || $password != NULL){
		echo '<a href="logout.php"><button	class="searchCollection">Logout</button></a>';
	}else{
		echo '<a href="login.php"><button	class="searchCollection">Login</button></a>';
	}
?>

	
	
	<a href="registration.php"><button	class="searchCollection">Register</button></a>
	
	<?php
	if ($username != NULL || $password != NULL){
		echo "<br>".$username;
	}
	?>
	</div><!--button div-->
	

	
	<div id="slogan">
	
	


	
<a href="cart.php">

	<?php
	$cart = 0;
	if ($username != NULL || $password != NULL){
	$conn = $conn = mysqli_connect($GLOBALS["servername"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["dbname"]);
	if(!$conn){
		die("Connection Failed ".mysqli_connect_error);
	}else{
		$sql = "SELECT cartItem FROM $username";
		$result = mysqli_query($conn, $sql);
		//$cart = count($result);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
					++$cart;
					}
			}
	}
	mysqli_close($conn);
		
	}
	
	echo '<span id="cartQuantity" style="color:red;">' . $cart . '</span>';
	?>	
	
	

	
	
	
	
	
	
	
	
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 612.322 612.322" style="enable-background:new 0 0 612.322 612.322;" xml:space="preserve" width="25px" height="25px">
			<g><g><g>
				<path d="M187.57,359.458h360.895l63.856-227.934h-93.973l-33.74-104.22L343.9,72.916l19.244,58.608h-6.623l-34.74-104.22     L181.072,72.916l19.244,58.608h-75.228l-15.62-62.482c-7.873-31.241-35.115-53.359-66.481-53.359H0V41.8h42.987     c19.494,0,36.489,12.996,41.738,32.616l69.105,270.421c-14.246,10.247-23.618,26.992-23.618,46.112     c0,31.241,26.117,57.358,57.358,57.358h351.773V422.19H187.57c-16.995,0-31.241-14.371-31.241-31.241     C156.33,373.829,170.7,359.458,187.57,359.458L187.57,359.458z M467.739,59.795l23.493,70.355H389.637l-14.371-40.363     L467.739,59.795z M304.911,59.795l23.493,70.355H226.809l-14.371-40.363L304.911,59.795z M578.457,156.267l-49.486,177.199     H177.198l-45.612-177.198L578.457,156.267L578.457,156.267z" fill="#dc4e04"/>
				<path d="M424.751,487.171c-29.991,0-54.734,24.743-54.734,54.734c0,29.991,24.743,54.734,54.734,54.734     c31.241,0,54.734-24.743,54.734-54.734C479.486,511.914,454.743,487.171,424.751,487.171z M424.751,571.896     c-16.995,0-29.991-14.371-29.991-29.991c0-16.995,14.371-29.991,29.991-29.991c16.995,0,29.991,12.996,29.991,29.991     C454.743,558.9,440.372,571.896,424.751,571.896z" fill="#dc4e04"/>
				<path d="M224.06,487.171c-29.991,0-54.734,24.743-54.734,54.734c0,29.991,24.743,54.734,54.734,54.734     s54.734-24.743,54.734-54.734C278.794,511.914,254.051,487.171,224.06,487.171z M224.06,571.896     c-16.995,0-29.991-14.371-29.991-29.991c0-16.995,14.371-29.991,29.991-29.991s29.991,12.996,29.991,29.991     C254.051,558.9,239.68,571.896,224.06,571.896z" fill="#dc4e04"/>
			</g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
		</svg>
		
		
</a>		
		<div id ="myAnimation">BUY BEST QUALITY</div>
	</div> <!--End slogan div -->
	
	
	</div><!--End of header headerAlign div-->


</div><!--End of headerSection div-->







<div id="navDiv" style="background-color:black;">

<div class="navbar" style="height:45px;background-color:black;">
  <a href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="contact.php">Contact</a>
  <div class="dropdown">
    <button class="dropbtn">Categories 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="dell.php">Dell</a>
      <a href="lenovo.php">lenovo</a>
      <a href="acer.php">acer</a>
      <a href="hp.php">hp</a>
    </div>
  </div> 
  
  
  <div class="dropdown">
    <button class="dropbtn">Computer Accessories
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
        <a href="mouse.php">mouse</a>
      <a href="board.php">keyboard</a>
      <a href="charger.php">charger</a>
    </div>
  </div>   

</div>

</div><!--End of navDiv div-->


</div><!--END OF HEAD PLUS NAV SECTION-->



<div id="mainBody">







<div class="productContainer">

<?php


//$_SERVER["REQUEST_METHOD"] == "GET"
/*	
$requestValue = $_GET['goods'];
if (is_numeric($requestValue)){
	for($i=0; $i<10; ++$i){
		echo "there is a get request : " . $requestValue. "<br>";
	}
}

else{*/
	
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$level = $_POST["options"];
		$searchq = $_POST["search"];
		
		
		$conn = mysqli_connect($GLOBALS["servername"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["dbname"]);
		if(!$conn){
			die("Connection Failed ".mysqli_connect_error);
		}else{
			if($level == "General"){	//search every every I have added //dell
				$index = 0;
				
				//dell
				$query = mysqli_query($conn, "SELECT * FROM dell WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
				$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
					//hp
					$query = mysqli_query($conn, "SELECT * FROM hp WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
					//acer
					$query = mysqli_query($conn, "SELECT * FROM acer WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
					//lenovo
					$query = mysqli_query($conn, "SELECT * FROM lenovo WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
					//mouse
					$query = mysqli_query($conn, "SELECT * FROM mouse WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
					
					//keyboard
					$query = mysqli_query($conn, "SELECT * FROM keyboard WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
					//charger
					$query = mysqli_query($conn, "SELECT * FROM charger WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
					
					//desktop
					$query = mysqli_query($conn, "SELECT * FROM desktop WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
					
					
					
			
			
					
			}//END OF GENERAL
			
			else if($level == "Laptops"){	//search every every I have added //dell
				$index = 0;
				
				//dell
				$query = mysqli_query($conn, "SELECT * FROM dell WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
				$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
					//hp
					$query = mysqli_query($conn, "SELECT * FROM hp WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
					//acer
					$query = mysqli_query($conn, "SELECT * FROM acer WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
					//lenovo
					$query = mysqli_query($conn, "SELECT * FROM lenovo WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
						}
						} //END OF Laptops
						
						
			else if($level == "Desktop PC"){	//search every every I have added //dell
				$index = 0;
				
				//dell
				$query = mysqli_query($conn, "SELECT * FROM desktop WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
				$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
					} //END OF Desktop PC
						
						
				else if($level == "Accessories"){	//search every every I have added //dell
				$index = 0;
				
					//mouse
					$query = mysqli_query($conn, "SELECT * FROM mouse WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
					
					//keyboard
					$query = mysqli_query($conn, "SELECT * FROM keyboard WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
					//charger
					$query = mysqli_query($conn, "SELECT * FROM charger WHERE item LIKE '%$searchq%' OR model LIKE '%$searchq%' OR displaySize LIKE '%$searchq%' OR screenRes LIKE '%$searchq%' OR processorType LIKE '%$searchq%' OR clockSpeed LIKE '%$searchq%' OR ram LIKE '%$searchq%' OR storage LIKE '%$searchq%' OR operatingSystem LIKE '%$searchq%' OR description LIKE '%$searchq%' OR price LIKE '%$searchq%'") or die(mysqli_error($conn));
					$count = mysqli_num_rows($query);
					if ($count == 0){
		
					}else {
					while($row = mysqli_fetch_array($query)){
	
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					
						}
					}
					
			}//END OF Accessories



		}
	mysqli_close($conn);		
		
		

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*
	
	$fileName = $_SERVER['PHP_SELF'];
	$lastToken = "";
	$tok = strtok($fileName, "/");
	while($tok !== false){
		if($tok !== false){
			$lastToken = $tok;
		}
		$tok = strtok("/");
	}
	$theFile = str_replace(".php", "", $lastToken);
	
	

	
	
	
	$conn = $conn = mysqli_connect($GLOBALS["servername"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["dbname"]);
	if(!$conn){
		die("Connection Failed ".mysqli_connect_error);
	}else{
		$sql = "SELECT * FROM $theFile";
		$result = mysqli_query($conn, $sql);
		//$cart = count($result);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
					$id[$index] = $row["id"];
					$item[$index] = $row["item"];
					$model[$index] = $row["model"];
					$displaySize[$index] = $row["displaySize"];
					$screenRes[$index] = $row["screenRes"];
					$processorType[$index] = $row["processorType"];
					$clockSpeed[$index] = $row["clockSpeed"];
					$ram[$index] = $row["ram"];
					$storage[$index] = $row["storage"];
					$operatingSystem[$index] = $row["operatingSystem"];
					$description[$index] = $row["description"];
					$price[$index] = $row["price"];
					$orderStatus[$index] = $row["orderStatus"];
					$reg_date[$index] = $row["reg_date"];
					++$index;
					}
			}
	}
	mysqli_close($conn);

*/

	
	for($i=0; $i<$index; ++$i){
		//$displayHTML = '<a href="itemConnect.php?goods=' .$i. '&fileTable='. $theFile. '">';
		//$displayHTML = '<a href="itemConnect.php?goods=' .$i. '&fileTable='. 'file'. '">';
		$displayHTML = '<a href="goods.php?id=' .$id[$i]. '&item='.	$item[$i]. '&model='. $model[$i]. '&displaySize='. $displaySize[$i]. '&screenRes='. $screenRes[$i]. '&processorType='. $processorType[$i]. '&clockSpeed='. $clockSpeed[$i]. '&ram='. $ram[$i]. '&storage='.	$storage[$i]. '&operatingSystem='. $operatingSystem[$i].'&description='. $description[$i].'&price='. $price[$i]. '&orderStatus='. '1'.'">';
		$displayHTML .= '<div class="itemBox" onmouseover="illusion(this)" onmouseout="illusionOut(this)">
							<div class="itemImageBox">
							<img src="' .$item[$i]. '" class="image">
									</div>
									<div class="itemDescription" align="middle">
									' .$description[$i]. '<br>
									<h4 style="color:red;">' .$price[$i]. '</h4>
									</div>
									</div> </a>';

		echo $displayHTML;							
		}

//	} //End of the items section

?>


<!--
<div class="itemBox" onmouseover="illusion(this)" onmouseout="illusionOut(this)">
	<div class="itemImageBox">
		<img src="dell\\dell6.jpg" class="image">
	</div>
	
	<div class="itemDescription" align="middle">
	<h5>the description of the pc or accessory will appear hear</h5>
	<h3 style="color:red;">$400</h3>

	</div>
</div>



<div class="itemBox" onmouseover="illusion(this)" onmouseout="illusionOut(this)">
	<div class="itemImageBox">
		<img src="dell\\dell1.jpg" class="image">
	</div>
	
	<div class="itemDescription">

	</div>
</div>




<div class="itemBox">
fgfdgdf
</div>



<div class="itemBox">
dfgdfgfdh
</div>


<div class="itemBox">
dgdfgfdg
</div>

-->












</div><!--END OF PRODUCT CONTAINER-->


</div><!--END OF MAINBODY-->







<div class="navbar" style="background-color:black; height:45px;margin-left:0%;padding-left:45%;">
   <a href="#home">Home</a>
  <a href="#news">About</a>

</div>




















</body>
</html>

