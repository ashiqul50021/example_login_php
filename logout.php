<?php
include('db.php');
unset($_SESSION['IS_LOGIN']);
header('location:index.php');
die();
?>