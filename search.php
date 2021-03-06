<?php
require_once 'config/config.php';

$target = isset($_GET['target'])?$_GET['target']:'';
$taget = $db->real_escape_string($_GET['target']);
$query = "SELECT first, last, email FROM user where (first like '%$taget%' or last like '%$taget%') and email not like '$user' ";
$result = $db->query($query);

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
<header id="top-bar">
    <div class="group-name col-lg-3"><h1>The Great Database</h1>
        <span class="">Friendship is a realtionship between two users</span>
    </div>
    <div class="nav navbar-nav col-lg-9">
        <div class="search col-lg-9"><form method="get" action="search.php"> <input PLACEHOLDER=" Search a user" name="target" /><button class="btn glyphicon glyphicon-search"> Search</button></form></div>
        <ul class="nav white-text nav-tabs-justified navbar-nav">
            <li id="home" class="white-text"><a class="ligh-blue-bg" href="index.php"> Home </a></li>
            <li id="logout" class="white-text"><a class="ligh-blue-bg white-text" href="logout.php"> Logout </a></li>
        </ul>
    </div>
</header>
<form id="delete-form" method="post" action="deleterequest.php">
</form>
<form id="approve-form" method="post" action="approve-request.php">
</form>
<!-- Sidebar -->
<div id="sidebar-wrapper" class="left col-lg-3">
    <div class="list-group">
        <h4 class="list-group-item-heading">Pending Request</h4>
        <hr/>
        <div class="row center-block">
            <?php
            $query = "SELECT user.first,user.last,user.email FROM `friend` inner join user on friend.sender = user.email 
 where 
 (recipient = '$user') 
 and approved = 0 
 and user.email not like '$user' 
 union SELECT user.first,user.last,user.email FROM `friend` inner join user on friend.recipient = user.email
 where 
 (recipient = '$user')
 and approved = 0 and user.email not like '$user'";
            $result_side = $db->query($query);

            ?>
            <?php while ($request = $result_side->fetch_array()): ?>
                <div class="list-group-item">
                    <span class="text-left vcenter"><?= $request['first']." ".$request['last'] ?></span>
                    <div class="pull-right">
                        <button form="approve-form" type="submit" name="target" value="<?=$request['email'] ?>" class="btn btn-primary btn-success" >
                            Add
                        </button>
                        <button form="delete-form" type="submit" name="target" value="<?=$request['email'] ?>" class="btn btn-primary btn-danger" >
                            Delete
                        </button>
                    </div>
                    </div>
                </div>
                <hr/>
                <?php
            endwhile;
            ?>
        </div>
    </div>
</div>
<div id="main" class="col-lg-9">
    <form id="add-form" method="post" action="add-friend.php">
    </form>
    <div>
        <h2 class="">Search Result</h2>
        <hr/>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while($friend = $result->fetch_array()):
            ?>
            <tr>
                <td><?=$friend['first'] ?></td>
                <td><?=$friend['last'] ?></td>
                <td>
                    <button form="add-form" type="submit" name="target" value="<?=$friend['email'] ?>" class="btn btn-primary btn-success" >Add</button>
                </td>
            </tr>
            <?php
        endwhile;
        ?>
        </tbody>
    </table>
</div>
<!-- /#sidebar-wrapper -->
<script src="js/jquery-3.2.1.min.js" ></script>
<script src="js/bootstrap.min.js" ></script>
</body>
</html>