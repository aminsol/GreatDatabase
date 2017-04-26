<!--login.php-->

	<?php 
		//connect to database
		define("DB_HOST", "45.55.5.95");
		define("DB_NAME", "thegreatdatabase");
		define("DB_USER", "thegreatdatabase");
		define("DB_PASS", "WeAreAwesome");
		$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

		//check if successfully connected to database
		if ($db->connect_error){
			echo "ERROR"."<br/>";
		}else{
			echo "Welcome to the Great Database!"."<br/>";
		}

		//declare credentials 
		$email = $_POST["email"];
		$password = $_POST["password"];

		//sql queries to confirm login credentials
		$email_query = $db->query("SELECT * FROM user where email like '$email' ");
		$pw_query = $db->query("SELECT * FROM user where password like '$password' ");

		//handle login
		if (
			$email_query->fetch_assoc() and $pw_query->fetch_assoc()
		){
			echo "Success"."<br/>";
			include("home.php");
		}else{
			echo "Your email or password is incorrect, try again.";
		}
		
	?>

<html>
	<head>
		<title>LOGIN</title>
		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<style>
			body {
				background-color: SeaGreen;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<div id="login">
			<form action="" method="post" id="login">
				<p>email: <input type="text" name="email"/></p>
				<p>password: <input type="text" name="password"/><p>
				<p><input type="submit" name="login"/></p>
			</form>
		</div>
		<div id="register_link">
			<p>Don't have an account? Register <a href="register.php">here.</a></p>
		</div>
	</body>
</html>