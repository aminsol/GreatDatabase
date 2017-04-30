<?php
include 'config/config.php';

// When user clicks submit button
$messsage = "Your friend request is been sent";
if ( isset( $_POST['target'] ) ) {

    // check whether user exists or not
    $sql = "select * from user where email like '{$_POST["target"]}' ";
    $result = $db->query($sql)->fetch_assoc();
    if ($result) {

        // User does exist. Now check to see if a friend request has already been sent to the user.
        $sql = "select approved from friend where sender like '$user' and recipient like '{$_POST["target"]}' ";
        $result = $db->query($sql)->fetch_assoc();
        if(!$result){
            $sql = "insert into friend (sender, recipient, approved) values ('$user', '{$_POST["target"]}', 0) ";
            if ($db->query($sql) === TRUE) {
                $messsage = "Added new friend successfully";
            } else {
                $messsage = "Error while adding friend: " . $sql . "<br>" . $db->error;
            }
        }
        // friend is already friends with user
        else{
            if($result["approved"] == 0){
                $messsage = 'Error: Friend request is still pending';
            }
            else{
                $messsage = 'Error: Already friends with user';
            }
        }
    }
    else{
        // User doesn't exist
        $messsage = 'Error: User does not exist';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to the Great Database</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<div class="container">
    <div class="text-center text-info">
        <?=$messsage ?>
    </div>
    <div class="text-info text-center white-text">
        <a class="btn btn-primary btn-success" href="index.php"> GO BACK to Home </a>
    </div>
</div>


</body>
</html>
