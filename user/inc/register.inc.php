<?php

include_once "../../include/db.config.php";
include_once "./functions.inc.php";

var_dump($conn);

if(isset($_POST["submit"])){
    
    
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $tel = $_POST["tpnumber"];
    $bday = $_POST["Bday"];
    $passwd = $_POST["password"];
    $confpasswd = $_POST["confpassword"];

    echo "<h1>". $email ."</h1>";

    if(empty($email) || empty($fname) || empty($lname) || empty($tel) || empty($bday) || empty($passwd) || empty($confpasswd)){
        header("location: ../register.php?error=empty fields");
        exit();
    }

    else if(!validEmail($email)){
        header("location: ../register.php?error=invalid email");
        exit();
    }

    else if(!($passwd == $confpasswd)){
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }

    else if(emailExists($conn, $email)){
        header("location: ../register.php?error=emailAlreadyExists");
        exit();
    
    }

    else if(tpExists($conn, $tel)){
        header("location: ../register.php?error=PhoneNumberAlreadyExists");
        exit();
    
    }

    else
    createUser($conn, $fname, $lname, $bday, $tel, $email, $confpasswd);


} else echo "no";

?>