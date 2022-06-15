<?php

include_once "../include/functions.php";
include_once "../include/header.inc.php";
include_once "./inc/functions.inc.php";
include_once "../include/db.config.php";


?>

<?php

if ((isset($_SESSION["email"])) && (isset($_SESSION["userID"]))) {

  $user = emailExists($conn, $_SESSION["email"]);
  if ($user) {
    $fname = $user["firstName"];
    $lname = $user["lastName"];
    $email = $user["email"];
    $phoneNumber = $user["phoneNumber"];
    $Bday = $user["birthDay"];
    $address = $user["address"];
    $headline = $user["headline"];
    $dpLink = $user["dpLink"];
    $fbLink = $user["fbLink"];
    $waNumber = $user["waNumber"];
    $ytLink = $user["ytLink"];
    $webLink = $user["webLink"];
    $dpLink = $user["dpLink"];
    $dpLink = editImage($dpLink,"s");
  } else {
    header("location: ./login.php?error=userDoesntExist");
    exit();
  }

?>

  <link rel="stylesheet" href=<?php url("/css/user.css") ?>>
  <div class="container">
    <div class="main-body">

      <!-- Breadcrumb -->
      <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="../">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
              </nav> -->
      <!-- /Breadcrumb -->

      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <!-- <div class="dpedit" data-bs-toggle="modal" data-bs-target=".profile-pic-modal">
                  <img src= <?php echo '"'.$dpLink.'"'; ?> alt="Display Picture" class="rounded-circle" width="150"><br>
                  <i class="fa-solid fa-pen-to-square dpedit"></i>
                </div> -->

                <div class="mt-3">
                  <h4>
                    <?php
                    echo $fname . " " . $lname;
                    ?>
                  </h4>
                  <p class="text-secondary mb-1">
                    <?php
                    echo $headline;
                    ?>
                  </p>
                  <!-- <button class="btn btn-primary">Follow</button>
                  <button class="btn btn-outline-primary">Message</button> -->
                </div>
              </div>
            </div>
          </div>
          <div class="card mt-3">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><i class="fa-solid fa-globe"></i> Website</h6>
                <span class="text-secondary"><a target="_BLANK" href=<?php
                                                                      echo "" . $webLink . "";
                                                                      ?>>
                    <?php
                    echo $webLink;
                    ?>
                  </a></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><i style="color:red;" class="fa-brands fa-youtube"></i> Youtube</h6>
                <span class="text-secondary"><a target="_BLANK" href=<?php
                                                                      echo "" . $ytLink . "";
                                                                      ?>>
                    <?php
                    echo $ytLink;
                    ?>
                  </a></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0">
                  <i style="color: green;" class="fa-brands fa-whatsapp"></i> Whatsapp
                </h6>
                <span class="text-secondary"><a target="_BLANK" href=<?php
                                                                      echo "https://wa.me/" . $waNumber . "";
                                                                      ?>>
                    <?php
                    echo $waNumber;
                    ?>
                  </a></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <h6 class="mb-0"><i style="color: blue;" class="fa-brands fa-facebook"></i> Facebook</h6>
                <span class="text-secondary"><a target="_BLANK" href=<?php
                                                                      echo "" . $fbLink . "";
                                                                      ?>>
                    <?php
                    echo $fbLink;
                    ?>
                  </a></span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">First Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php
                  echo $fname;
                  ?>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Last Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php
                  echo $lname;
                  ?>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php
                  echo $email;
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php
                  echo $phoneNumber;
                  ?>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">BirthDay</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php
                  echo $Bday;
                  ?>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php
                  echo $address;
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".profile-edit-modal">Edit</button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

  <div class="modal fade profile-pic-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <form action= <?php echo '"'.url("/upload.php").'"' ?> method="POST" enctype="multipart/form-data">
          <!-- Upload Area -->
          <div id="uploadArea" class="upload-area">
            <!-- Header -->
            <div class="upload-area__header">
              <h1 class="upload-area__title">Upload your file</h1>
              <p class="upload-area__paragraph">
                File should be an image
                <strong class="upload-area__tooltip">
                  Like
                  <span class="upload-area__tooltip-data"></span> <!-- Data Will be Comes From Js -->
                </strong>
              </p>
            </div>
            <!-- End Header -->

            <!-- Drop Zoon -->
            <div id="dropZoon" class="upload-area__drop-zoon drop-zoon">
              <span class="drop-zoon__icon">
                <i class='bx bxs-file-image'></i>
              </span>
              <p class="drop-zoon__paragraph">Drop your file here or Click to browse</p>
              <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
              <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
              <input type="file" id="fileInput" name="file" class="drop-zoon__file-input" accept="image/*">
            </div>
            <!-- End Drop Zoon -->

            <!-- File Details -->
            <div id="fileDetails" class="upload-area__file-details file-details">
              <h3 class="file-details__title">Uploaded File</h3>

              <div id="uploadedFile" class="uploaded-file">
                <div class="uploaded-file__icon-container">
                  <i class='bx bxs-file-blank uploaded-file__icon'></i>
                  <span class="uploaded-file__icon-text"></span> <!-- Data Will be Comes From Js -->
                </div>

                <div id="uploadedFileInfo" class="uploaded-file__info">
                  <span class="uploaded-file__name">Proejct 1</span>
                  <span class="uploaded-file__counter">0%</span>
                </div>
              </div>
            </div>
            <!-- End File Details -->
          </div>
          <!-- End Upload Area -->
          <button type="submit" name="dpupdate" class="btn regbtn">Update</button>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade profile-edit-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <form method="POST" action="./inc/profile.inc.php">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="first-name">First Name</label>
              <input type="text" class="form-control" id="first-name" name="fname" placeholder="First Name" value=<?php echo '"' . $fname . '"' ?>>
              <label for="last-name">Last Name</label>
              <input type="text" class="form-control" id="last-name" name="lname" placeholder="First Name" value=<?php echo '"' . $lname . '"' ?>>

            </div>
            <div class="mb-3">
              <label for="birthDay" class="form-label">Your Birthday : </label>
              <input type="date" name="Bday" id="Bday" class="form-control" style="width: 200px;" value=<?php echo '"' . $Bday . '"' ?> required>
            </div>

            <div class="form-group">
              <label for="headline">Headline</label>
              <textarea name="headline" id="headline" class="form-control" cols="20" rows="3" placeholder="Short description about you!"><?php echo $headline ?></textarea>
            </div>

            <div class="form-group col-md-6">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value=<?php echo '"' . $phoneNumber . '"' ?>>
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <textarea name="address" id="inputAddress" class="form-control" cols="20" rows="3" placeholder="1234 Main St, Apartment, Sri Lanka"><?php echo $address ?></textarea>
          </div>
          <div class="form-group">
            <label for="website">Website Link</label>
            <input type="text" id="website" name="webLink" class="form-control" placeholder="https://yoursite.com" value=<?php echo '"' . $webLink . '"' ?>>
          </div>
          <div class="form-group">
            <label for="ytLink">Youtube Link</label>
            <input type="text" id="ytLink" name="ytLink" class="form-control" placeholder="https://www.youtube.com/channel/UCq2jtQr0YwRKyMkTckNyBrQ" value=<?php echo '"' . $ytLink . '"' ?>>
          </div>
          <div class="form-group">
            <label for="fbLink">Facebook Link</label>
            <input type="text" id="fbLink" name="fbLink" class="form-control" placeholder="https://www.facebook.com/intigrataLK" value=<?php echo '"' . $fbLink . '"' ?>>
          </div>
          <div class="form-group">
            <label for="waNumber">Whatsapp Number</label>
            <input type="text" id="waNumber" name="waNumber" class="form-control" placeholder="+94783425229" value=<?php echo '"' . $waNumber . '"' ?>>
          </div>


          <button type="submit" class="btn btn-primary" style="margin-top: 15px; margin-left: 40%;" name="updateProfile">Update</button>
        </form>


      </div>
    </div>
  </div>

  <script src=<?php url("/js/user.js"); ?>></script>

<?php

} else {
  header("location: ./login.php");
  exit();
}
if (isset($_GET["error"])) echo "<p> Error </p>";
include_once "../include/footer.inc.php"
?>