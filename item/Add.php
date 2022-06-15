<?php 

include_once "../include/functions.php";
include_once "../include/db.config.php";

if(!(isset($_SESSION["userID"]))) session_start();

if(isset($_POST["submit"])){
   print_r($_POST);
   $itemName = $_POST["item-name"];
   $brand = $_POST["brand"];
   $price = $_POST["item-price"];
   $stock = $_POST["stock"];
   $desc = $_POST["item-description"];
   $userID = $_SESSION["userID"];

   
$target_dir = path."item/upload/";
$tempFile = rand(5000,500000). basename($_FILES["product-image"]["name"]);
$target_file = $target_dir .$tempFile;
$img_link = urlreturn("/item/upload/".$tempFile);
$uploadOk = 1;
$imageFileType = 
  strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["product-image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";

      $uploadOk = 1;
  } else {
    echo "File is not an image.";

      $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {

    echo "Sorry, file already exists.";
  $uploadOk = 0;
}


 // Check file size
if ($_FILES["product-image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;

 }

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

    if (move_uploaded_file($_FILES["product-image"]["tmp_name"], $target_file)) {

      echo "The file ". htmlspecialchars( basename( $_FILES["product-image"]["name"])). 
  " has been uploaded.";
  var_dump($target_dir, $target_file, $img_link);

    } else {
    echo "Sorry, there was an error uploading your file.";
    }
}


   $sql = "INSERT INTO item (name, brand, price, stock, description, imageURL, userID)
   VALUES (?,?,?,?,?,?,?); ";
   $stmt = mysqli_stmt_init($conn); 
   if (!mysqli_stmt_prepare($stmt, $sql)) {
       header("location: ./index.php?error=stmtfailed");
       exit();
   } else {
       mysqli_stmt_bind_param($stmt, "sssssss", $itemName, $brand, $price, $stock, $desc, $img_link, $userID);
       mysqli_stmt_execute($stmt);
       header("location: ./index.php?updated");
       exit();
   }
   

}




?>
