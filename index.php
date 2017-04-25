
	<?php 
		//connect to database
		$db = new mysqli("localhost","root","","Project");

		//
		$email = $_POST["email"];
		$password = $_POST["password"];

		$email_query = $db->query("SELECT * FROM user where email like '$email' ");
		$pw_query = $db->query("SELECT * FROM user where password like '$password' ");

		if(
			$email_query->fetch_assoc() and $pw_query->fetch_assoc()
		){
			echo "Success";
		}else{
			echo "Your email or password is incorrect, try again.";
		}
		
	?>

<html>
	<head>
		<title>LOGIN</title>
		<link href="bootstrap.css" type="text/css" rel="stylesheet">
		<style>
			#login {
				margin-left: auto;
				margin-right: auto;
			}
		</style>
	</head>
	<body>
		<div id="login">
			<form action="" method="post">
				<p>email: <input type="text" name="email"/></p>
				<p>password: <input type="text" name="password"/><p>
				<p><input type="submit" name="login"/></p>
			</form>
		</div>
	</body>
</html>