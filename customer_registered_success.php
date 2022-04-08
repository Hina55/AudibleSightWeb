<?php

include 'connection.php';

// $fullname = $_POST['fullname'];
// $username = $_POST['username'];
// $email = $_POST['email'];
// $contact = $_POST['contact'];
// $address = $_POST['address'];
// $password = $_POST['password'];

// $query = "INSERT into CUSTOMER(fullname,username,email,contact,address,password) VALUES('" . $fullname . "','" . $username . "','" . $email . "','" . $contact . "','" . $address ."','" . $password ."')";

// $success = $conn->query($query);
// if (!$success){
//   die("Couldnt enter data: ".$conn->error);
// }
// header("location: customerlogin.php");
// $conn->close();



$fullname=$username=$password=$email=$contact=$address="";
$fullnameErr=$usernameErr=$passwordErr=$emailErr=$contactErr="";
$msgErr="";
$msgSucc="";



// $fullname = $_POST['fullname'];
// $username = $_POST['username'];
// $email = $_POST['email'];
// $phonenumber = $_POST['contact'];
//$address = $_POST['address'];
// $password = $_POST['password'];



/////
if($_SERVER['REQUEST_METHOD']=="POST")
{


	if(empty($_POST['fullname']))
	{
		$fullnameErr="*Full name is required";
	}
	else
	{
		$fullname=test_input($_POST['fullname']);
		if(!preg_match("/^[a-zA-Z ]+$/",$fullname))
		{
			$fullnameErr.="Full name should have only alphabets<br>";
		}
		else
		{
		$c_fullname=$fullname;
		}
	}


	if(empty($_POST['username']))
	{
		$usernameErr="*Username is required";
	}
	else
	{
		$username=test_input($_POST['username']);
		if(!preg_match("/^[a-zA-Z ]+$/",$username))
		{
			$usernameErr.="Username should have only alphabets<br>";
		}
		else
		{
		$c_username=$username;
		}
	}

	if(empty($_POST['password']))
	{
		$passwordErr.="*Password is required";
	}
	else{
		$password=test_input($_POST['password']);
		if(strlen($password)!=8)
		{
			$passwordErr.="Passwrod should be of 8 digits,<br>";
		}
		if(!preg_match("#[a-z]+#",$password))
		{
			$passwordErr.="1 upercase letter,<br>";
		}
		if(!preg_match("#[a-z]+#",$password))
		{
			$passwordErr.="1 lower case letter,<br>";
		}
		if(!preg_match("#[0-9]+#",$password))
		{
			$passwordErr.="atleast 1 digit,<br>";
		}
		if(!preg_match("#\W+#",$password))
		{
			$passwordErr.="1 special character.<br>";
		}
		else
		{

			$c_password=$password;
		}
	}
	if(empty($_POST['email']))
	{
		$emailErr="*Email is required";
	}
	else
	{
		$email=test_input($_POST['email']);
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$emailErr="Email is incorrect";
		}
		else
		{
			$c_email=$email;
		}
	}
	if(empty($_POST['contact']))
	{
		$contactErr="*Phonenumber is required";
	}
	else
	{
		$contact=test_input($_POST['contact']);
		if(!preg_match("/^[0-9]+$/",$contact))
		{
			$contactErr.="Phonenumber should have only digits<br>";
		}
		if(strlen($contact)!=11)
		{
			$contactErr.="Phonenumber should be of 11 digits<br>";
		}
		else
		{
		$c_contact=$contact;
		}
	}
	if($fullnameErr!="" OR $usernameErr!="" OR $passwordErr!="" OR $emailErr!="" OR $contactErr!="" OR $address!="")
	{
		$msgErr="Submission failed";
	}
	else
	{
		$bool=true;
		include "connection.php";
  		$query=mysqli_query($conn,"SELECT * from customer"); 
		while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) 
     {
      $user_table = $row['username'];
      if($username == $user_table)
      {
        $bool = false;
        print "<script>alert('Username has been taken!');</script>";
        print "<script>window.location.assign('customersignup.php')</script>";

      }
     
     }
     if($bool){

   $success= mysqli_query($conn,"INSERT into customer(fullname,username,email,contact,address,password) VALUES('$c_fullname','$c_username','$c_email','$c_contact','$address','$c_password')");

	//print ("<script>alert('Successfully Registered!');</script>");
     print ("<script>window.location.assign('customerlogin.php')</script>");
      
      $msgSucc="Submission Successfull.";

     }
  }
}
function test_input($data)
{
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
?>




