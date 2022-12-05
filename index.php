<?php
include('db.php');
if(isset($_SESSION['IS_LOGIN'])){
	header('location:dashboard.php');
	die();
}
if(isset($_POST['submit'])){
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	
	$res=mysqli_query($con,"select * from user where username='$username'");
	
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res);
		$verify=password_verify($password,$row['password']);
		if($verify==1){
			$_SESSION['IS_LOGIN']=true;
			$_SESSION['UNAME']=$row['name'];
			header('location:dashboard.php');
			die();
		}else{
			echo "Please enter correct password";
		}
	}else{
		echo "Please enter correct username";
	}
	
}
?>
<h1>Login</h1>
<form method="post">
	<table>
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