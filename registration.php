<?php
include('db.php');
if(isset($_SESSION['IS_LOGIN'])){
	header('location:dashboard.php');
	die();
}
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	if(mysqli_num_rows(mysqli_query($con,"select * from user where username='$username'"))>0){
		echo "Userame already present";
	}else{
		$password=password_hash($password,PASSWORD_DEFAULT);
		mysqli_query($con,"insert into user(name,username,password) values('$name','$username','$password')");
		echo "Thank you";
	}
	
}
?>
<h1>Registration</h1>
<form method="post">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" required/></td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" required/></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" required/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" /></td>
		</tr>
	</table>
</form>	