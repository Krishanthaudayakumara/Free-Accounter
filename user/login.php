<?php

include_once "../include/functions.php";
include_once "../include/header.inc.php";

?>

<style>
    .loginForm {
        padding: 8vw 20vw;

    }

    .loginForm button {
        margin-left: 45%;
    }
</style>

<div class="loginForm">

    <form method="POST" action="./inc/login.inc.php">


        <div class="mb-3">
            <input type="email" name="email" class="form-control" id="email" placeholder="Your E-mail" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" placeholder="Password" class="form-control" id="password" required>

        </div>
        <div class="mb3">
            <button type="submit" class="btn btn-primary form-btn" name="submit">Login</button>
        </div>

    </form>

</div>


<?php
if (isset($_GET["error"])) echo "<p> Error </p>";
include_once "../include/footer.inc.php"
?>