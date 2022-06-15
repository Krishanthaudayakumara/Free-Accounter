<?php  
include_once "./include/functions.php";
include_once "./include/header.inc.php";
include_once "./include/db.config.php";

$userID = $_SESSION["userID"];
include "./include/db.config.php";

$sql = "SELECT * FROM customer WHERE userID = $userID ORDER BY id ASC";
$result = mysqli_query($conn, $sql);