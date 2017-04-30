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
		$_SESSION['user'] = $row['email'];
		$_SESSION['login'] = 1;
		header("Location: index.php");
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

	<!--add background image-->
	<style>
	body {
		background-image: url(https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwiPsb2pos3TAhVM42MKHfK5C9wQjRwIBw&url=https%3A%2F%2Fwww.pinterest.com%2Fpin%2F350858627198994800%2F&psig=AFQjCNGD5iVshCKyGCnWSWwT9pipvIXrDw&ust=1493679065328467);
	}
	</style>


<<<<<<< Updated upstream
</head>
<body>
<div class="container">
<div class="login">
	<h1 class="text-center">Welcome to the Great Databse</h1>
	<form class="login" action="" method="post" id="login">
		<div class="form-group">
			<label for="usr">Email:</label>
			<input type="email" name="email" class="form-control" id="usr">
=======
		//run query
		$result = $db->query($sql);
		$row = $result->fetch_assoc();

			//confirm query matches input
			if ($row){
				echo "Success"."<br/>";
				include("home.php");
			}else{
				echo "Your email or password is incorrect, try again.";
			}
		}
	?>

<html>
	<head>
		<title>LOGIN</title>
		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<style>
			body {
				text-align: center;
				margin-top: 40%;
			}
		</style>
	</head>
	<body>
		<div id="login">
			<form action="" method="post" id="login">
				<p>email: <input type="text" name="email"/></p>
				<p>password: <input type="password" name="password"/><p>
				<p><input type="submit" name="submit" value='login'/></p>
			</form>
>>>>>>> Stashed changes
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" name="password" class="form-control" id="pwd">
		</div>
		<p><input class="btn btn-success" type="submit" name="submit" value='Login'/></p>
	</form>
	<p>Don't have have an account? click <a href="register.php">Here</a></p>
	<div class="text-danger"><?=$message ?></div>
	<div class="text-success"><?=$_SESSION['MSG'];  $_SESSION['MSG'] = ''; ?></div>
</div>
</div>
</body>