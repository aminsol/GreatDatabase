<?php

require_once "config/config.php";

$message = '';
if(isset($_POST['register'])){		//when user clicks submit

	//declare credentials
	$email = $_POST["email"];
	$password = $_POST["password"];
	$first = $_POST["first"];
	$last = $_POST["last"];

	//sql query string
	$sql = "INSERT INTO user (email,password,first,last) VALUES ('$email','$password','$first','$last')";

	if(!isset($email) || empty($email) || !isset($password) || empty($password) || !isset($first) || empty($first) || !isset($last) || empty($last)){

		//user forgot to fill out some areas on form
		$message = "There were fields missing, try again.";
	}else{

		//run query
		$db->query($sql);
		$message = "You have successfully registered. You can login now!";
		$_SESSION['MSG'] = $message;
		header("location: login.php");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>REGISTER</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >

	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<div class="container">
	<div class="login">
		<h1 class="text-center">Register</h1>
		<form class="login" action="" method="post" id="login">
			<div class="form-group">
				<label for="usr">Email:</label>
				<input type="email" name="email" class="form-control" id="usr">
			</div>
			<div class="form-group">
				<label for="first">Name:</label>
				<input type="text" name="first" class="form-control" id="first">
			</div>
			<div class="form-group">
				<label for="last">Last:</label>
				<input type="text" name="last" class="form-control" id="last">
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" name="password" class="form-control" id="pwd">
			</div>
			<p><input class="btn btn-success" type="submit" name="register" value='Register'/></p>
		</form>
		<p>Already have an account? click <a href="login.php">Here</a></p>
		<div class="text-danger"><?=$message ?></div>
	</div>
</div>
</body>