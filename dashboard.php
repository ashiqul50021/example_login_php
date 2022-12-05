<?php
include('db.php');

if(!isset($_SESSION['IS_LOGIN'])){
	header('location:index.php');
	die();
}
echo "Welcome ".$_SESSION['UNAME'];
?>
<br/>
<a href="logout.php">Logout</a>