<?php
require_once 'config/config.php';
$query = "SELECT user.first,user.last,user.email FROM `friend` inner join user on friend.sender = user.email 
 where 
 (friend.sender = '$user' or recipient = '$user') 
 and approved = 1 
 and user.email not like '$user' 
 union SELECT user.first,user.last,user.email FROM `friend` inner join user on friend.recipient = user.email
 where 
 (friend.sender = '$user' or recipient = '$user')
 and approved = 1 and user.email not like '$user'";
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
<!-- Sidebar -->
<div id="sidebar-wrapper" class="left col-lg-3">
	<div class="list-group">
		<h4 class="list-group-item-heading">Pending Request</h4>
		<hr/>
		<div class="row center-block">
			<div class="list-group-item">
				<span class="text-left vcenter">User Carzy</span>
				<div class="pull-right">
					<button class="btn btn-success">
						Add
					</button>
					<button class="btn btn-danger">
						Delete
					</button>
				</div>
			</div>
			<hr/>
			<div class="list-group-item item">
				<span class="text-left vcenter">The Creep</span>
				<div class="pull-right">
					<button class="btn btn-success">
						Add
					</button>
					<button class="btn btn-danger">
						Delete
					</button>
				</div>
			</div>
			<hr/>
			<div class="list-group-item item">
				<span class="text-left vcenter">Your Crazy EX</span>
				<div class="pull-right">
					<button class="btn btn-success">
						Add
					</button>
					<button class="btn btn-danger">
						Delete
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="main" class="col-lg-9">
	<form id="delete-form" method="post" action="deleterequest.php">
	</form>
	<div>
		<h2 class="">List of your real friends</h2>
		<hr/>
	</div>
	<table class="table">
		<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email Address</th>
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
				<td><?=$friend['email'] ?></td>
				<td>
					<button form="delete-form" type="submit" name="target" value="<?=$friend['email'] ?>" class="btn btn-primary btn-danger" >Dump</button>
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
