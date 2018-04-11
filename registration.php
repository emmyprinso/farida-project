<?php
$GLOBALS["servername"] = "localhost";
$GLOBALS["serverUserName"] = "root";
$GLOBALS["serverPassword"] = NULL;
$GLOBALS["dbname"] = "farida";

$firstnameErr = $lastnameErr = $usernameErr = $passwordErr = $addressErr = $phonenumberErr = $emailErr = "";
$firstname = $lastname = $username = $password = $address = $phonenumber = $email = $concern = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["firstname"])) {
		$firstnameErr = "First Name is required";
	}else{
		$firstname = test_input($_POST["firstname"]);
		}
		

	if (empty($_POST["lastname"])) {
		$lastnameErr = "Last Name is required";
	}else{
		$lastname = test_input($_POST["lastname"]);
		}
		
		
	if (empty($_POST["username"])) {
		$usernameErr = "username is required";
	}else{
		$username = test_input($_POST["username"]);
		}		

	if (empty($_POST["password"])) {
		$passwordErr = "password is required";
	}else{
		$password = test_input($_POST["password"]);
		}
	
	if (empty($_POST["address"])) {
		$addressErr = "address is required";
	}else{
		$address = test_input($_POST["address"]);
		}	

	if (empty($_POST["phonenumber"])) {
		$phonenumberErr = "phone number is required";
	}else{
		$phonenumber = test_input($_POST["phonenumber"]);
		}	

	if (empty($_POST["email"])) {
		$emailErr = "email is required";
	}else{
		$email = test_input($_POST["email"]);
		}	

if(empty($firstnameErr) and empty($lastnameErr) and empty($usernameErr) and empty($passwordErr) and empty($addressErr) and empty($phonenumberErr) and empty($emailErr)){
	$checking = checkForUser($username, $email);
	
	//for($i=0;$i<10;++$i){	echo $checking . "<br>";	}
	
	if($checking == "empty" or $checking == "noexist"){
		$conn = $conn = mysqli_connect($GLOBALS["servername"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["dbname"]);
		$sql = "INSERT INTO Customers (firstname, lastname, username, password, address, phonenumber, email)
		VALUES ('$firstname', '$lastname', '$username', '$password', '$address', '$phonenumber', '$email')";
		if(mysqli_query($conn,$sql)){
			

			//CREATE A TABLE FOR THE CUSTOMER
			$sql = "CREATE TABLE ".$username."(
			id INT(6) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
			cartItem VARCHAR(30) NOT NULL,
			model VARCHAR(30) NOT NULL,
			displaySize VARCHAR(30) NOT NULL,
			screenRes VARCHAR(30) NOT NULL,
			processorType VARCHAR(30) NOT NULL,
			clockSpeed VARCHAR(30) NOT NULL,
			ram VARCHAR(30) NOT NULL,
			storage VARCHAR(30) NOT NULL,
			operatingSystem VARCHAR(30) NOT NULL,
			description VARCHAR(120) NOT NULL,
			price VARCHAR(10) NOT NULL,
			orderStatus VARCHAR(10) NOT NULL,
			reg_date TIMESTAMP
			)";
			if(mysqli_query($conn, $sql)){
			//table was successfully created 
			//for($i=0;$i<10;++$i){	echo "table" . "<br>";	}
			}else{
			echo "<br> Customers table was not created";
				}
			
			
			
			
			//echo "record successfully updated ";
			session_start();
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			Header('Location:index.php');
		}else{
			echo "error occured while trying to insert" . mysqli_error($conn);
		}

		mysqli_close($conn);
	}else{
		$concern = "Try another User Name and Email";
	}
}

		

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////CHECK IF USER IS IN THE TABLE
function checkForUser($user, $mail){
	$check = "noexist";		//returns noexist if there is nomatch and the table exist
	$conn = $conn = mysqli_connect($GLOBALS["servername"], $GLOBALS["serverUserName"], $GLOBALS["serverPassword"], $GLOBALS["dbname"]);
	if(!$conn){
		die("Connection Failed ".mysqli_connect_error);
	}else{
		$sql = "SELECT username, email FROM Customers";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
					if(strtolower($row["username"]) == strtolower($user) and strtolower($row["email"]) == strtolower($mail)){
						$check = "exist";
						break;
						}  //if the user exist check is exist
				}
			}else{
				$check = "empty";		//if the table is empty the check returns empty
				}
	}
	mysqli_close($conn);
	return $check;
}
	


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>faridaCOM</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="template.css">
<script src="action.js"></script>
<style>
.formElement{
	margin-bootom:2%;
	height:30px;
	width:200px;
}
.namespan{
	margin-right:3px;
	width:12%;
}
.error {color: #FF0000;}
</style>
</head>

<body onload="myMove()" style="background-color:#e6faff;">




  <div id="headPlusNav" class="sticky">
	<div id="headerSection">


	<div id="headerAlign">
		<img id="logo" src="Logo.png" alt="logo" width="168px" height="61">
		<div id="search" style="border:0px solid gray;border-radius:10px;width:62%;height:37px;float:left;margin-bottom:1px;margin-right:1px;">
			
			<form id="searchForm" method="get" action="http://www.google.com">
			
			
			<select class="searchCollection">
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
	<span id="cartQuantity" style="color:red;">0</span>
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 612.322 612.322" style="enable-background:new 0 0 612.322 612.322;" xml:space="preserve" width="25px" height="25px">
			<g><g><g>
				<path d="M187.57,359.458h360.895l63.856-227.934h-93.973l-33.74-104.22L343.9,72.916l19.244,58.608h-6.623l-34.74-104.22     L181.072,72.916l19.244,58.608h-75.228l-15.62-62.482c-7.873-31.241-35.115-53.359-66.481-53.359H0V41.8h42.987     c19.494,0,36.489,12.996,41.738,32.616l69.105,270.421c-14.246,10.247-23.618,26.992-23.618,46.112     c0,31.241,26.117,57.358,57.358,57.358h351.773V422.19H187.57c-16.995,0-31.241-14.371-31.241-31.241     C156.33,373.829,170.7,359.458,187.57,359.458L187.57,359.458z M467.739,59.795l23.493,70.355H389.637l-14.371-40.363     L467.739,59.795z M304.911,59.795l23.493,70.355H226.809l-14.371-40.363L304.911,59.795z M578.457,156.267l-49.486,177.199     H177.198l-45.612-177.198L578.457,156.267L578.457,156.267z" fill="#dc4e04"/>
				<path d="M424.751,487.171c-29.991,0-54.734,24.743-54.734,54.734c0,29.991,24.743,54.734,54.734,54.734     c31.241,0,54.734-24.743,54.734-54.734C479.486,511.914,454.743,487.171,424.751,487.171z M424.751,571.896     c-16.995,0-29.991-14.371-29.991-29.991c0-16.995,14.371-29.991,29.991-29.991c16.995,0,29.991,12.996,29.991,29.991     C454.743,558.9,440.372,571.896,424.751,571.896z" fill="#dc4e04"/>
				<path d="M224.06,487.171c-29.991,0-54.734,24.743-54.734,54.734c0,29.991,24.743,54.734,54.734,54.734     s54.734-24.743,54.734-54.734C278.794,511.914,254.051,487.171,224.06,487.171z M224.06,571.896     c-16.995,0-29.991-14.371-29.991-29.991c0-16.995,14.371-29.991,29.991-29.991s29.991,12.996,29.991,29.991     C254.051,558.9,239.68,571.896,224.06,571.896z" fill="#dc4e04"/>
			</g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
		</svg>
	
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

<div id="mainBody" style="background-color:#e6faff;color:black;padding-left:12%;padding-top:5%;text-size:25px;height:800px">

<div style="width:40%;height:100%;float:left;background-image:url(pcImage.jpg);background-repeat:repeat-y;margin-right:5%;">

</div>


<form style="float:left;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
First Name<br>
<input type="text" name="firstname" class="formElement">
<span class="error">* <?php echo $firstnameErr;?></span>
<br><br>

Last Name<br>
<input type="text" name="lastname" class="formElement">
<span class="error">* <?php echo $lastnameErr;?></span>
<br><br>

User Name<br>
<input type="text" name="username" class="formElement">
<span class="error">* <?php echo $usernameErr;?></span>
<br><br>

Password<br>
<input type="password" name="password" class="formElement">
<span class="error">* <?php echo $passwordErr;?></span>
<br><br>

Address<br>
<input type="text" name="address" class="formElement">
<span class="error">* <?php echo $addressErr;?></span>
<br><br>

Phone Number<br>
<input type="text" name="phonenumber" class="formElement">
<span class="error">* <?php echo $phonenumberErr;?></span>
<br><br>

email<br>
<input type="text" name="email" class="formElement">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>

<input type="submit" name="submit" value="Submit" class="formElement"> 
</form>
<?php
	echo "<br><br>".'<span class="error">'.$concern."</span>";
?>


</div>







<div class="navbar" style="clear:left;background-color:black; height:45px;margin-left:0%;padding-left:45%;">
   <a href="#home">Home</a>
  <a href="#news">About</a>
</div>

</body>
</html>
