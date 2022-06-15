<?php

if (isset($_GET['id'])){
    include "db_conn.php";

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "SELECT * FROM salesreturn WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

    }else{
        header("Location: returnread.php");
    }

}else if(isset($_POST['update'])){
    include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_POST['id']);
    $day = validate($_POST['date']);
    $cusname = validate($_POST['cusname']);
    $cusid = validate($_POST['cusid']);
    $itemno = validate($_POST['itemno']);
    $quantity = validate($_POST['quantity']);
    $total = validate($_POST['total']);

        
    if (empty($id)) {
        header("Location: ../addreturn.php?error=Credit Note No is required&$user_data");
    }else if (empty($day)) {
        header("Location: ../addreturn.php?error=Date is required&$user_data");
    }else if (empty($cusname)) {
        header("Location: ../addreturn.php?error=Customer Name is required&$user_data");
    }
    else if (empty($cusid)) {
        header("Location: ../addreturn.php?error=Customer ID is required&$user_data");
    }
    else if (empty($itemno)) {
        header("Location: ../addreturn.php?error=Item No is required&$user_data");
    }
    else if (empty($quantity)) {
        header("Location: ../addreturn.php?error=Quantity is required&$user_data");
    }
    else if (empty($total)) {
        header("Location: ../addreturn.php?error=Total is required&$user_data");
    }
    
    else {

       $sql = "UPDATE salesreturn
               SET id='$id', day='$day', cusname='$cusname', cusid='$cusid', itemno='$itemno', quantity='$quantity', total='$total'
               WHERE id=$id; ";
       $result = mysqli_query($conn, $sql);
       if ($result) {
          header("Location: ../returnread.php?success=successfully updated");
       }else {
          header("Location: ../returnupdate.php?id=$id$error=unknown error occurred&$user_data");
       }
    }

}
else{
    header("Location: returnread.php");
}