<?php 

if(isset($_POST["delete"])){
    include "../include/db.config.php";

    $id = $_POST["item-id"];
    $sql = "DELETE FROM item 
            WHERE id=$id";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ./index.php?success=successfully deleted");
       }else {
          header("Location: ../index.php?error=unknown error occurred&$user_data");
       }
}

?>