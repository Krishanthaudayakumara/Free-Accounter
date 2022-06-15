<?php include "php/returnread.php"; ?>
<?php
include "../include/functions.php";
 include "../include/header.inc.php"; ?>

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

	<div class="container">

		<div class="box">
			<h4 class="display-4 text-center">Add Return</h4><br>

			<?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>





			



			<form action="php/returncreate.php" method="post">

				    <div class="row" style="padding-bottom:25px ;">

				    <div class="col-md-2">
						<label for="inputDate" class="form-label">Credit Note No</label>
						<input type="number" class="form-control" id="id" name="id">
					</div>

				    </div>

				
					<div class="row" style="padding-bottom:25px ;"> 

					

					<div class="col-md-3">
						<label for="inputDate" class="form-label">Date</label>
						<input type="date" class="form-control" id="inputDate" name="date">
					</div>

					<div class="col-md-6">
						<label for="inputCustomerName" class="form-label">Customer Name</label>
						<input type="text" class="form-control" id="inputCustomerName" name="cusname">
					</div>

					<div class="col-md-3">
						<label for="inputDate" class="form-label">Customer ID</label>
						<input type="text" class="form-control" id="inputDate" name="cusid">
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


								

								<td> <input type="text" class="form-control" id="inputItem" name="itemno"></td>

								<td> <input type="text" class="form-control" id="inputItem" name="quantity"></td>

								<td> <input type="text" class="form-control" id="inputItem" name="total"></td>

							</tr>


						</tbody>
					</table>


					<div class="col-md-6">
						<div class="form-floating">
							<label for="floatingTextarea2">Notes</label>
							<textarea class="form-control" placeholder="" id="floatingTextarea2" style="height: 50px"
								name="note"></textarea>
						</div>
					</div>







					




					<div class="col-12">
						<button type="submit" class="btn btn-primary" name="submit">Submit</button>
					</div>
					 <a href="returnread.php" class="link-primary">View</a>
				</div>
			</form>



		</div>

	</div>
<?php include "../include/footer.inc.php"; ?>