<?php

function validEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
    else return false;
}

function emailExists($conn, $email)
{
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) return $row;
    else return false;

    mysqli_stmt_close($stmt);
}

function tpExists($conn, $tpNumber)
{
    $sql = "SELECT * FROM users WHERE phoneNumber = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $tpNumber);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) return $row;
    else return false;

    mysqli_stmt_close($stmt);
}

function createUser($conn, $fname, $lname, $Bday, $tpNumber, $email, $passwd)
{
    $sql = "INSERT INTO users(firstName, lastName, birthDay, email, phoneNumber, password) VALUES(?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    } else {
        $hashedPwd = password_hash($passwd, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $Bday, $email, $tpNumber, $hashedPwd);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        header("location: ../login.php?error=none");
        exit();
    }
}

function updateUser($conn, $id, $fname, $lname, $Bday, $tpNumber, $address, $fbLink, $waNumber, $ytLink, $webLink, $headline)
{
    $sql = "UPDATE users SET firstName = ? , lastName = ? , phoneNumber = ? , birthDay = ? , address = ? , fbLink = ? , waNumber = ? , ytLink = ? , webLink = ? , headline = ?
    WHERE userID = ? ; ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "sssssssssss", $fname, $lname, $tpNumber, $Bday, $address, $fbLink, $waNumber, $ytLink, $webLink, $headline, $id);
        mysqli_stmt_execute($stmt);
       
    
        header("location: ../index.php?updated");
        exit();
    }
    
}

function loginUser($conn, $email, $passwd)
{
    $userExist = emailExists($conn, $email);

    if (!$userExist) {
        header("location: ../login.php?error=wrongLogin");
        exit();
    } else {
        $pwdHashed = $userExist["password"];
        $checkPwd = password_verify($passwd, $pwdHashed);

        if ($checkPwd === false) {
            header("location: ../login.php?error=wrongPassword");
            exit();
        } else if ($checkPwd === true) {
            session_start();
            $_SESSION["email"] = $userExist["email"];
            $_SESSION["userID"] = $userExist["userID"];
            setcookie("email", $userExist["email"], time() + 3600);
            header("location: ../index.php");
            exit();
        }
    }
}

?>