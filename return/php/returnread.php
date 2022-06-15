<?php  

include "db_conn.php";

$sql = "SELECT * FROM salesreturn ORDER BY id ASC";
$result = mysqli_query($conn, $sql);