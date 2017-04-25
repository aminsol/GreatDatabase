<!--connect to database and run query-->
	<?php
		$db = new mysqli("localhost","root","","Project");

		if($db->connect_error){
			echo "False";
		}else{
			echo "True";
		}

		/*$sql = "SELECT user1 FROM Project";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
    		// output data of each row
    		while($row = $result->fetch_assoc()) {
        		echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    		}
		} else {
    		echo "0 results";
		}
		*/
	?>

<html>
	<head>
		<title>LOGIN</title>
		<link href="GreatDatabase/bootstrap.css" type="text/css" rel="stylesheet">
		<style>
			#login {
				margin-left: auto;
				margin-right: auto;
			}
		</style>
	</head>
	<body>
		<div id="login">
			<p>username<input type="textfield"></p><br/>
			<p>password<input type="textfield"></p><br/>
		</div>
		<div id=""
	</body>
</html>