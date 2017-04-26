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
			echo "There were fields missing, try again.";
		}else{
			
			//run query
			$db->query($sql);
			echo "You have successfully registered!";
		}
	}
	?>

<html>
	<head>
		<title>REGISTER</title>
		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<style>
			body {
				margin-top: 40%;
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
				<p><input type="submit" name="register" value="Register"/></p>
			</form>
		</div>
	</body>
</html>