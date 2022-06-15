<?php
include_once "./include/functions.php";
include_once "./include/header.inc.php";
include_once "./include/db.config.php";
if (!(isset($_SESSION["email"])) && !(isset($_SESSION["userID"])))   header("location: ./user");

?>

	<div class="container">

		 <form action="php/create.php" method="post">

		  <h4 class="display-4 text-center">Add Customer</h4><hr><br>
		  
		  <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>

		   <div class="form-group">
	        <label for="id">ID</label>
	        <input type="number" class="form-control" id="id" name="id" value="<?php if(isset($_GET['id']))
		                           echo($_GET['id']); ?>"   placeholder="Enter ID">
	      </div>

	      <div class="form-group">
	        <label for="name">Name</label>
	        <input type="name" class="form-control" id="name" name="name" value="<?php if(isset($_GET['name']))
		                           echo($_GET['name']); ?>"   placeholder="Enter Name">
	      </div>

	       <div class="form-group">
	        <label for="email">Email</label>
	        <input type="email" class="form-control" id="email" name="email"  value="<?php if(isset($_GET['email']))
		                           echo($_GET['email']); ?>"  placeholder="Enter email">
	      </div>

	  
	      <button type="submit" class="btn btn-primary" name="create" onClick="confirm('Do you want to submit')">Submit</button>
	      <a href="read.php" class="link-primary">View</a>
	     </form>

    </div> 
	<?php include "./include/footer.inc.php"; ?>