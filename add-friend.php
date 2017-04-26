<?php

  define("DB_HOST", "45.55.5.95");
  define("DB_NAME", "thegreatdatabase");
  define("DB_USER", "thegreatdatabase");
  define("DB_PASS", "WeAreAwesome");
  $db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    // When user clicks submit button
    if ( isset( $_POST['submit'] ) ) {

      $sql = "select * from user where first like '{$_POST["first_name"]}' and last like '{$_POST["last_name"]}' ";
      $result = $db->query($sql);
      $row = $result->fetch_assoc();

      // check if friend doesn't exist
      if (!$row) {
        // Add friend
        $sql = "insert into friend (sender, recipient, approved) values ('{$_POST["first_name"]}', '{$_POST["last_name"]}', 0)";
        if ($db->query($sql) === TRUE) {
            echo "Added new friend successfully"."<br>";
        } else {
            echo "Error - adding friend: " . $sql . "<br>" . $db->error;
        }
      }
      else{
        // Don't add friend
        echo "Friend already exists"."<br>";
      }
  }

?>

<html>
<body
  bgcolor="#FFC0CB"
  <h2>Add Friend</h2>
  <form action="" method="post">
   <p>First name: <input type="text" name="first_name" /></p>
   <p>Last name: <input type="text" name="last_name" /></p>
   <p><input type="submit" name="submit" /></p>
  </form>


</body>
</html>
