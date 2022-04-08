<?php
session_start(); 
$error=''; 

if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, useV_ID and password as a parameter
require 'connection.php';


// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT username, password FROM CUSTOMER WHERE username=? AND password=? ";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt -> bind_param("ss", $username, $password);
$stmt -> execute();
$stmt -> bind_result($username, $password);
$stmt -> store_result();

if ($stmt->fetch())  
{

	$_SESSION['login_user2']=$username; // Initializing Session
	header("location: glasslist.php"); // Redirecting To Other Page
}

else if ($_POST['username'] == "hina123" && $_POST['password'] == "1234")  
{
	
	header("location: admin.php"); // Redirecting To Other Page
} 
 else {
$error = "Username or Password is invalid";
}
mysqli_close($conn); // Closing Connection
}
}

if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
require 'connection.php';



if ($_POST['username'] == "hina123" && $_POST['password'] == "1234")  
{
	$_SESSION['login_user1']=$username; // Initializing Session
	header("location: admin.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($conn); // Closing Connection
}
}
?>