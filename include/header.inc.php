<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LMS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href=<?php url("/css/header.css") ?>>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href=<?php url("/") ?>><img src=<?php url("/img/logo.png") ?> class="logo" width="100px" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
          
        <?php if (isset($_SESSION["email"])) { ?>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">


              <li class="nav-item" id="myDropdown myMenu">
                <a class="nav-link" href=<?php url("/read.php") ?>> Customers</a>
              </li>

              <li class="nav-item" id="myDropdown myMenu">
                <a class="nav-link" href=<?php url("/item") ?>> Items </a>
              </li>
              <li class="nav-item" id="myDropdown myMenu">
                <a class="nav-link" href=<?php url("/sales") ?>> Sales </a>
              </li>

              <li class="nav-item" id="myDropdown myMenu">
                <a class="nav-link" href=<?php url("/return/returnread.php") ?>> Return </a>
              </li>
  
        



          </ul>
          <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn srBtn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form> -->

          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            Journals
            </button>
            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownMenuButton2">
              <li><a class="dropdown-item active" href=<?php url("/sales") ?>>Sales Journal</a></li>
              <li><a class="dropdown-item" href=<?php url("/return/returnread.php") ?>>Sales Return Journal</a></li>
              <li><a class="dropdown-item" href=<?php url("/sales/cash-reciept.php") ?>>Cash Reciept Journal</a></li>
              <!-- <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Separated link</a></li> -->
            </ul>
          </div>
          <?php } ?>
          <div class="d-flex signSection">
            <a class="nav-link" href=<?php url("/about.php") ?>> About </a>
            <?php if (isset($_SESSION["email"])) { ?>
              <a href=<?php url("/user") ?> class="btn btn-primary userBtn navbtn"><i class="fa-solid fa-user"></i></a>
              <a href=<?php url("/user/logout.php") ?> class="btn btn-primary regbtn navbtn">Log Out</a>

            <?php } else { ?>
              <a href=<?php url("/user/login.php") ?> class="btn btn-light loginbtn navbtn">Login</a>
              <a href=<?php url("/user/register.php") ?> class="btn btn-primary regbtn navbtn">Sign Up</a>
            <?php } ?>
          </div>
        </div>
      </div>
    </nav>



  </header>

  <script src=<?php url("/js/header.js") ?>></script>