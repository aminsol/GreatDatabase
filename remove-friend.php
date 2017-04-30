<?php
    include 'config/config.php';
    $email_of_sender = "molinab@gmail.com"; // ** Need to change. **

    // When user clicks submit button
    if ( isset( $_POST['submit'] ) ) {
       $sql = "select approved from friend where sender like '$email_of_sender' and recipient like '{$_POST["email"]}' ";
       $result = $db->query($sql)->fetch_assoc();
       // if friend request has been sent to the user
       if($result){
         // if friend request has been approved
         if($result["approved"] == 1){
            // remove user from friends list
            $sql = "delete from friend where sender like '$email_of_sender' and recipient like '{$_POST["email"]}' ";
            if ($db->query($sql) === TRUE) {
              echo "Removed friend successfully"."<br>";
            } else {
              echo "Error while removing friend: " . $sql . "<br>" . $db->error;
            }
         }
         else{
           echo '{"Status":"False", "error":"Friend request has not been accepted yet."}';
         }
       }
       else{
         echo '{"Status":"False", "error":"Not friends with user. Cannot remove."}';
       }
  }
?>

<html>
<body
  bgcolor="#FFC0CB"
  <h2>Remove Friend</h2>
  <form action="" method="post">
   <p>Email: <input type="text" name="email" /></p>
   <p><input type="submit" name="submit" /></p>
  </form>


</body>
</html>
