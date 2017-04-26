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

      // check if friend doesn't exist.
      if (!$row) {
        echo "Friend does not exist. Can't remove."."<br>";
      }
      else{
        // Add friend
        $sql = "delete from friend where first like ('{$_POST["first_name"]}' and last like '{$_POST["last_name"]}' ";
        if ($db->query($sql) === TRUE) {
            echo "Removed friend successfully"."<br>";
        } else {
            echo "Error - deleting friend: " . $sql . "<br>" . $db->error;
        }
      }
  }

?>


<html>
<body
  bgcolor=#FF69B4
  <h2>Remove Friend</h2>
  <form action="" method="post">
   <p>First name: <input type="text" name="first_name" /></p>
   <p>Last name: <input type="text" name="last_name" /></p>
   <p><input type="submit" name="submit" /></p>
  </form>


</body>
</html>
