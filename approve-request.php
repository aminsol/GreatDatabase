<?php
require_once 'config/config.php';

if ( isset( $_POST['target'] ) ) {
    $sql = "UPDATE friend SET approved ='1' WHERE (sender like '{$_POST["target"]}' and recipient like '$user')";
    $result = $db->query($sql);
    if($result==TRUE){
        echo "Friend request accepted!"."<br>";
    }
    else {
        echo "There isn't a match or you are already their friend." . "<br>";
    }
}
?>
<html>
<body
    bgcolor="	#C0C0C0"
<h2>Accept Request</h2>
<form action="" method="post">
    E-mail: <input type="text" name="email"><br>
    <p><input type="submit" name="submit" /></p>
</form>

</body>
</html>