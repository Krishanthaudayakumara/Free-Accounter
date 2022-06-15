<?php include 'php/update.php';
include_once "./include/functions.php";
include_once "./include/header.inc.php";
include_once "./include/db.config.php";
if (!(isset($_SESSION["email"])) && !(isset($_SESSION["userID"])))   header("location: ./user");

?>


	<div class="container">

		 <form action="php/update.php" method="post">

		  <h4 class="display-4 text-center">Update Customer</h4><hr><br>
		  
		  <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>

		   <div class="form-group">
	        <label for="id">ID</label>
	        <input type="id" class="form-control" id="id" name="id" value="<?=$row['id'] ?>"   >
	      </div>

	      <div class="form-group">
	        <label for="name">Name</label>
	        <input type="name" class="form-control" id="name" name="name" value="<?=$row['name'] ?>"   >
	      </div>

	       <div class="form-group">
	        <label for="email">Email</label>
	        <input type="email" class="form-control" id="email" name="email"  value="<?=$row['email']  ?>"  >
	      </div>

	      <input type="text" name="id" value="<?=$row['id']?>"hidden>

	  
	      <button type="submit" class="btn btn-primary" name="update" onClick="confirm('Do you want to update')">Update</button>
	      <a href="read.php" class="link-primary">View</a>
	     </form>

    </div> 

</body>
</html>