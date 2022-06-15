<?php
include_once "../../include/functions.php";
include_once "../../include/header.inc.php";
include_once "../../include/db.config.php";
include_once "./functions.inc.php";


if (isset($_POST["updateProfile"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $phoneNumber = $_POST["phone"];
    $Bday = $_POST["Bday"];
    $address = $_POST["address"];
    $headline = $_POST["headline"];
    $fbLink = $_POST["fbLink"];
    $waNumber = $_POST["waNumber"];
    $ytLink = $_POST["ytLink"];
    $webLink = $_POST["webLink"];

    updateUser($conn, $_SESSION["userID"], $fname, $lname, $Bday, $phoneNumber, $address, $fbLink, $waNumber, $ytLink, $webLink, $headline);
}
