<!--register.php-->

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
			echo "Register to the Great Database!"."<br/>";
		}

		//declare credentials 
		$email = $_POST["email"];
		$password = $_POST["password"];
		$first = $_POST["first"];
		$last = $_POST["last"];

		//sql queries to register new user
		$email_query = $db->query("INSERT INTO user email VALUES '$email' ");
		$pw_query = $db->query("INSERT INTO user password VALUES '$password' ");
		$first_query = $db->query("INSERT INTO user first VALUES '$first'");
		$last_query = $db->query("INSERT INTO user first VALUES '$last'");

		//handle registry
		
	?>

<html>
	<head>
		<title>REGISTER</title>
		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<style>
			body {
				background-color: SeaGreen;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<div id="register">
			<form action="" method="post" id="login">
				<p>email: <input type="text" name="email"/></p>
				<p>password: <input type="text" name="password"/></p>
				<p>first name: <input type="text" name="first"/></p>
				<p>last name: <input type="text" name="last"/></p>
				<p><input type="submit" name="register"/></p>
			</form>
		</div>
	</body>
</html>