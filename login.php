<?php
require_once 'config/config.php';
$message = '';
if(isset($_POST['submit'])){		//when user clicks submit

	//declare credentials
	$email = $_POST["email"];
	$password = $_POST["password"];

	//sql query string
	$sql = "SELECT * FROM user WHERE email LIKE '$email' AND password LIKE '$password' ";

	//run query
	$result = $db->query($sql);
	$row = $result->fetch_assoc();

	//confirm query matches input
	if ($row){
		$message =  "Success"."<br/>";
		include("home.php");
	}else{
		$message =   "Your email or password is incorrect, try again.";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to the Great Database</title>
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
	<h1 class="text-center">Welcome to the Great Databse</h1>
	<form class="login" action="" method="post" id="login">
		<div class="form-group">
			<label for="usr">Email:</label>
			<input type="email" name="email" class="form-control" id="usr">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" name="password" class="form-control" id="pwd">
		</div>
		<p><input class="btn btn-success" type="submit" name="submit" value='Login'/></p>
	</form>
	<div class="text-danger"><?=$message ?></div>
</div>
</div>
</body>