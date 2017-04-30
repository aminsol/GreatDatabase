<?php
require_once 'config/config.php';

if ( isset( $_POST['target'] ) ) {
    $sql = "UPDATE friend SET approved ='1' WHERE (sender like '{$_POST["target"]}' and recipient like '$user')";
    $result = $db->query($sql);
    if($result==TRUE){
        $message =  "Friend request accepted!"."<br>";
    }
    else {
        $message = "There isn't a match or you are already their friend." . "<br>";
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