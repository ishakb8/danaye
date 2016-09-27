<?php
session_start();
$username=$_SESSION['login_user'];
echo "<h1>Welcome, $username</h1>";
echo "<h1>Payment Canceled</h1>";
?>