

<?php
include_once "../include/functions.php";
include_once "../include/header.inc.php";

unset($_SESSION["userID"]);
unset($_SESSION["email"]);
session_destroy();
if(isset($_SESSION["email"]));
header('location: ../');

?>