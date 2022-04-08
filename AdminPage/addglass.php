<?php
include '../connection.php';

session_start();
if(!isset($_SESSION['login_user1'])){
header("location: ../customerlogin.php"); 
}


// if($_SESSION['$login_user1']){



//}


//image upload
include '../connection.php';
$statusMsg = '';

// File upload path
$targetDir = "../uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
        	$name = $conn->real_escape_string($_POST['name']);
				$price = $conn->real_escape_string($_POST['price']);
				$description = $conn->real_escape_string($_POST['description']);
				$images_path = $conn->real_escape_string($_POST['file']);
$query = "INSERT INTO glass(name,price,description,images_path) VALUES('" . $name . "','" . $price . "','" . $description . "','".$fileName."')";
				$success = $conn->query($query);


				if($success){
				header("location:add-glass-item.php");

				}
				else
				{
					echo 'not added';

				}
            // Insert image file name into database
            
            if($query){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;

?>
