<html>
<body
  bgcolor="#E6E6FA"

<?php
    $db = new mysqli("localhost", "root", "", "project");
?>

  <h2>Add Friend</h2>
  <form action="" method="post">
   <p>Your name: <input type="text" name="name" /></p>
   <p>Your age: <input type="text" name="email" /></p>
   <p><input type="submit" name="submit" /></p>
  </form>


</body>
</html>
