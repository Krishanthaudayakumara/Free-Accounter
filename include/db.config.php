<?php

$host = "localhost";
$DBuser = "root";
$DBpassword = "";
$DBname = "accounter";

$conn = mysqli_connect($host, $DBuser, $DBpassword, $DBname);

if(!$conn) {
    die("DB connection failed".mysqli_connect_error());
}

?>