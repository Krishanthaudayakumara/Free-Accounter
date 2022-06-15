<?php
include_once "./include/functions.php";
include_once "./include/header.inc.php";
include_once "./include/db.config.php";
?>
<link rel="stylesheet" href="./css/home.css">
<main>
   <div class="main-up">
       <div class="main-txt">
           <h3>Welcome to</h3>
           <h1>Free Accounter</h1>
           <a href=<?php url("/user/register.php") ?> class="btn btn-light loginbtn navbtn mainbtn">Register Now</a>

       </div>

   </div>
</main>

<?php include "./include/footer.inc.php" ?>