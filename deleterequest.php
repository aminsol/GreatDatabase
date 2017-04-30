<?php
include 'config/config.php';
if ($db->connect_error) {
	
    die("Connection failed: " . $db->connect_error);
}
if ( isset( $_POST['submit'] ) ) {
	$sql = "SELECT user.first,user.last,user.email FROM `friend` inner join user on friend.sender = user.email where (friend.sender = '{$_POST["email"]}' or recipient = '{$_POST["email"]}') and approved = 0 and user.email not like '{$_POST["email"]}' union SELECT user.first,user.last,user.email FROM `friend` inner join user on friend.recipient = user.email where (friend.sender = '{$_POST["email"]}' or recipient = '{$_POST["email"]}') and approved = 0 and user.email not like '{$_POST["email"]}'";
	$result = $db->query($sql)->fetch_assoc();
	if($result){
		$sql = "DELETE FROM friend WHERE (sender like '{$_POST["email"]}' or recipient like '{$_POST["email"]}')";
		$result = $db->query($sql);
		if($result==TRUE){
			echo "Request has been deleted."."<br>";
		}

	}else{
	  echo ' ';
	  echo "The request was not found."."<br>";
	}
}
?>
 <html>
<body
  bgcolor="#C0C0C0"
  <h2>Delete Request</h2>
  <form action="" method="post">
  E-mail: <input type="text" name="email"><br>
   <p><input type="submit" name="submit" /></p>
  </form>

</body>
</html>