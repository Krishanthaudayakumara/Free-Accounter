<?php include 'php/returnupdate.php'; ?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Update Return</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.container {
			min-height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
		}


		.container table {
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		}

		.box {
			width: 1200px;
		}

		.link-right {
			display: flex;
			justify-content: flex-end;
		}
	</style>

</head>

<body>

	<div class="container">

		<div class="box">
			<h4 class="display-4 text-center">Update Return</h4><br>

			<?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>





			



			<form action="php/returnupdate.php" method="post">

				    <div class="row" style="padding-bottom:25px ;">

				    <div class="col-md-2">
						<label for="inputDate" class="form-label">Credit Note No</label>
						<input type="number" class="form-control" id="id" name="id" value="<?=$row['id'] ?>">
					</div>

				    </div>

				
					<div class="row" style="padding-bottom:25px ;"> 

					

					<div class="col-md-3">
						<label for="inputDate" class="form-label">Date</label>
						<input type="date" class="form-control" id="inputDate" name="date" value="<?=$row['day'] ?>">
					</div>

					<div class="col-md-6">
						<label for="inputCustomerName" class="form-label">Customer Name</label>
						<input type="text" class="form-control" id="inputCustomerName" name="cusname" value="<?=$row['cusname'] ?>">
					</div>

					<div class="col-md-3">
						<label for="inputDate" class="form-label">Customer ID</label>
						<input type="text" class="form-control" id="inputDate" name="cusid" value="<?=$row['cusid'] ?>">
					</div>

				</div>
				<div class="row g-3">

					<table class="table table-hover" style="padding-top: 20px;">
						<thead>
							<tr>


								
								<th scope="col">Item</th>

								<th scope="col">Quantity</th>

								<th scope="col">Total</th>


							</tr>
						</thead>
						<tbody>

							<tr>


								

								<td> <input type="text" class="form-control" id="inputItem" name="itemno" value="<?=$row['itemno'] ?>"></td>

								<td> <input type="text" class="form-control" id="inputItem" name="quantity" value="<?=$row['quantity'] ?>"></td>

								<td> <input type="text" class="form-control" id="inputItem" name="total" value="<?=$row['total'] ?>"></td>

							</tr>


						</tbody>
					</table>



					
					




					<div class="col-12">
						<button type="submit" class="btn btn-primary" name="update">Update</button>
					</div>
					 
				</div>
			</form>



		</div>

	</div>
	<?php include "../include/footer.inc.php"; ?>