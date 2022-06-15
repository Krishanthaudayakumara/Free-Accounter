<?php

include_once "../../include/db.config.php";
include_once "./functions.inc.php";

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $passwd = $_POST["password"];

    if(empty($email) || empty($passwd)){
        header("location: ../login.php?error = emptyInputs");
    } 
    else {
        loginUser($conn,$email,$passwd);
    }
}

?>