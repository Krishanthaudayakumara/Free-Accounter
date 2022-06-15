<?php 
include_once "../include/functions.php";
include_once "../include/header.inc.php";
include_once "../include/db.config.php";
 

	$userID = $_SESSION["userID"];


if (isset($_POST['create'])) {
	include "../include/db.config.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_POST['id']);
	$name = validate($_POST['name']);
	$email = validate($_POST['email']);


	$user_data = 'id='.$id. 'name='.$name. '&email='.$email;

	if (empty($id)) {
		header("Location: ../customer.php?error=ID is required&$user_data");
	}else if (empty($name)) {
		header("Location: ../customer.php?error=Name is required&$user_data");
	}else if (empty($email)) {
		header("Location: ../customer.php?error=Email is required&$user_data");
	}else {

       $sql = "INSERT INTO customer(id, name, email, userID) 
               VALUES('$id','$name', '$email', $userID)";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../read.php?success=successfully added");
       }else {
          header("Location: ../customer.php?error=unknown error occurred&$user_data");
       }
	}

}