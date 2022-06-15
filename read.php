<?php include "php/read.php";
include_once "./include/functions.php";
include_once "./include/header.inc.php";
include_once "./include/db.config.php";

if (!(isset($_SESSION["email"])) && !(isset($_SESSION["userID"]))) header("location: ./user");

 ?>


	<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<a href="./customer.php" class="btn btn-success">Add Customer</a>
		</div>
	</div>

		<div class="box">
			<h4 class="display-4 text-center">Registered Customer</h4><br>
			<?php if (isset($_GET['success'])) { ?>
		   <div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		   <?php } ?>
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-striped">
						  <thead>
						    <tr>
						      
						      <th scope="col">ID</th>
						      <th scope="col">Name</th>
						      <th scope="col">Email</th>
						      <th scope="col">Action</th>
						      
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  		while($rows = mysqli_fetch_assoc($result)){

						  			
						  			
			  			  	?>
						    <tr>
						      
						      <td><?=$rows['id']?></td>
						      <td><?=$rows['name']?></td>
						      <td><?php echo $rows['email']; ?></td>
						      <td><a href="update.php?id=<?=$rows['id']?>"class="btn btn-success" onClick="confirm('Do you want to update')">Update</a></td>	
						      <td><a href="php/delete.php?id=<?=$rows['id']?>"class="btn btn-danger" onClick="confirm('Do you want to delete')">Delete</a></td>
						      
						    </tr>
						    <?php } ?>
						    
						  </tbody>
            </table>
            <?php } ?>
            
    </div> 
<?php include "./include/footer.inc.php"; ?>