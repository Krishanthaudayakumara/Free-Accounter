<?php include "php/returnread.php"; ?>
<?php
include "../include/functions.php";
 include "../include/header.inc.php";
 if (!(isset($_SESSION["email"])) && !(isset($_SESSION["userID"])))   header("location: ../user");
 ?>
  <style>
    .table thead {
      background-color: rgb(242, 243, 235);
    }

    .srj {
      padding: 20px 0px;
    }
    

@media (min-width: 1200px){}
.container, .container-lg, .container-md, .container-sm, .container-xl {
    max-width: 1233px;
}
    .headline {
      padding: 8px 8px;
      font-family: Verdana, Geneva, Tahoma, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font-weight: 200;
      text-decoration: none;
      color: rgb(24, 24, 59);
      text-align: center;
    }
  </style>
  <h3 class="headline">Sales Return Journal</h3>

  <?php if (isset($_GET['success'])) { ?>
    <div class="alert alert-success" role="alert">
      <?php echo $_GET['success']; ?>
    </div>
  <?php } ?>

    <div class="container">
    <div class="row">
    <div class="col-sm-12">
      <a href="addreturn.php"  class="btn btn-success">Add Return</a>
    </div>
  </div>
  <div class="srj">
    <?php if (mysqli_num_rows($result)) { ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Credit Note No</th>
            <th scope="col">Date</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer ID</th>
            <th scope="col">Item</th>
            <th scope="col">Qty</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>

          <?php
          while ($rows = mysqli_fetch_assoc($result)) {



          ?>
            <tr>


              <td><?= $rows['id'] ?></td>
              <td><?= $rows['day'] ?></td>
              <td><?= $rows['cusname'] ?></td>
              <td><?= $rows['cusid'] ?></td>
              <td><?= $rows['itemno'] ?></td>
              <td><?= $rows['quantity'] ?></td>
              <td><?= $rows['total'] ?></td>
              <td><a href="returnupdate.php?id=<?= $rows['id'] ?>" class="btn btn-success" onClick="confirm('Do you want to update')">Update</a></td>
              <td><a href="php/returndelete.php?id=<?= $rows['id'] ?>" class="btn btn-danger" onClick="confirm('Do you want to delete')">Delete</a></td>
            </tr>

          <?php } ?>

        </tbody>
      </table>
    <?php } ?>
    <!-- <div class="link-right">
      <a href="addreturn.php" class="link-primary">Add</a>
    </div> -->
  </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  <?php include "../include/footer.inc.php"; ?>