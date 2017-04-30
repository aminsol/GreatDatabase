<?php
require_once 'config/config.php';
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
	<div class="group-name col-lg-3"><h1>The Great Database</h1></div>
	<div class="nav col-lg-9">
		<div class="search col-lg-9"><input PLACEHOLDER=" Search a user" /></div>
		<a id="logout" class="pull-right">Logout</a>
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

	<table class="table">
		<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Actions</th>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>Abby</td>
			<td>Barrett</td>
			<td>
				<button class="btn btn-danger"><i class="fa fa-times"></i></button>
			</td>
		</tr>

		</tbody>
	</table>
</div>
<!-- /#sidebar-wrapper -->
<script src="js/jquery-3.2.1.min.js" ></script>
<script src="js/bootstrap.min.js" ></script>
</body>
</html>
