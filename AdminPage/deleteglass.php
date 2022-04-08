<?php




include('../session_m.php');
if(!isset($_SESSION['login_user1'])){
header("location: ../customerlogin.php"); 
}


/*if(!isset($login_session)){
header('Location: customerlogin.php'); 
}*/


$cheks = implode("','", $_POST['checkbox']);
$sql = "DELETE FROM glass WHERE G_ID in ('$cheks')";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

header('Location: delete-glass-item.php');
$conn->close();


?>