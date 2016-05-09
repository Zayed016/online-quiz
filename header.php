<!DOCTYPE html>
<html>

<head>
<?php require_once 'db_con.php'; ?>
	<meta charset="utf-8">
		<title>Time to play the game</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="bootstrap/css/style.css" rel="stylesheet">
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
</head>
  <div class="container" >
  <div class="row">
  <div class="col-md-8">
  
<nav    class="navbar navbar-responsive"  role="navigation" >
<ul   class="nav nav-pills">
<li><a href="home.php">Home</a></li>

<li><a href="registration.php">Registration</a></li>
<?php session_start();
if($_SESSION!=NULL) {
 ?>
<li><a  href="userpage.php">My quiz</a></li>

<li><a href="rank.php">Ranking</a></li>


<li><a  href="logout.php">Logout</a></li>
<?php } else { ?>
<li><a href="sign_in.php">Sign in</a></li>
<?php } ?>
</ul>
</nav>
</div>
</div>
</div>

<body >


