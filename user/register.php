<?php

include_once "../include/functions.php";

include_once "../include/header.inc.php"
?>

<style>
    .regForm{
        padding: 8vw 20vw;
        
    }

    .regForm button{
        margin-left: 45%;
    }
</style>

<div class="regForm">

    <form method="POST" action="./inc/register.inc.php">
    
    <div class="mb-3">
        <input type="text" name="fname" class="form-control" id="firstName" placeholder="Your First Name" required>
    </div>

    <div class="mb-3">
        <input type="text" name="lname" class="form-control" id="lastName" placeholder="Your Last Name" required>
    </div>

    <div class="mb-3">
        <input type="email" name="email" class="form-control" id="email" placeholder="Your E-mail" required>
    </div>

    <div class="mb-3">
       <input type="tel" name="tpnumber" class="form-control" id="phoneNumber" placeholder="Your Phone Number" required>
    </div>

    <div class="mb-3">
        <label for="birthDay" class="form-label">Your Birthday : </label>
        <input type="date" name="Bday" id="Bday" class="form-control" style="width: 200px;" required>
    </div>

    <div class="mb-3">
        <input type="password" name="password" placeholder="Password" id="password" class="form-control" style="margin-bottom: 10px;" required>
        <input type="password" name="confpassword" placeholder="Confirm Password" id="confpassword" class="form-control" required>
    </div>
    
    <button type="submit" class="btn form-btn" name="submit">Register</button>
    </form>

</div>


<?php
if(isset($_GET["error"])) echo "<p> Error </p>";
include_once "../include/footer.inc.php"
?>