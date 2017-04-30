<?php
    include 'config/config.php';
    $email_of_sender = "molinab@gmail.com"; // ** Need to change. **

    // When user clicks submit button
    if ( isset( $_POST['submit'] ) ) {

      // check whether user exists or not
      $sql = "select * from user where email like '{$_POST["email"]}' ";
      $result = $db->query($sql)->fetch_assoc();
      if ($result) {

        // User does exist. Now check to see if a friend request has already been sent to the user.
        $sql = "select approved from friend where sender like '$email_of_sender' and recipient like '{$_POST["email"]}' ";
        $result = $db->query($sql)->fetch_assoc();
        if(!$result){
            $sql = "insert into friend (sender, recipient, approved) values ('$email_of_sender', '{$_POST["email"]}', 0) ";
            if ($db->query($sql) === TRUE) {
              echo "Added new friend successfully"."<br>";
            } else {
              echo "Error while adding friend: " . $sql . "<br>" . $db->error;
            }
        }
        // friend is already friends with user
        else{
          if($result["approved"] == 0){
            echo '{"Status":"False", "error":"Friend request is still pending"}';
          }
          else{
            echo '{"Status":"False", "error":"Already friends with user."}';
          }
        }
      }
      else{
        // User doesn't exist
        echo '{"Status":"False", "error":"User does not exist"}';
      }
  }
?>

<html>
<body
  bgcolor="#FFC0CB"
  <h2>Add Friend</h2>
  <form action="" method="post">
   <p>Email: <input type="text" name="email" /></p>
   <p><input type="submit" name="submit" /></p>
  </form>


</body>
</html>
