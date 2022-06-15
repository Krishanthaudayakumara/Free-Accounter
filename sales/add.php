<?php

include_once "../include/functions.php";
include_once "../include/header.inc.php";
include_once "../include/db.config.php";
if (!(isset($_SESSION["email"])) && !(isset($_SESSION["userID"]))) header("location: ../user");


?>



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


<?php
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if (!(isset($_SESSION))) session_start();

$userID = $_SESSION["userID"];


$sql = "SELECT * FROM customer WHERE userID = $userID;";
$result = $conn->query($sql);
$data = array();

$count = 0;

if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		$data[$count] = $row;
		$count++;
	}
} else {
	echo "0 results";
}

$sql = "SELECT * FROM item WHERE userID = $userID;";
$result_item = $conn->query($sql);
$data_item = array();

$count_item = 0;

if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result_item->fetch_assoc()) {
		$data_item[$count_item] = $row;
		$count_item++;
	}
} else {
	echo "0 results";
}


$conn->close();

?>

<body>

	<div class="container">

		<div class="box">
			<h4 class="display-4 text-center">Invoice</h4><br>


		</div>



		<form action="./add.inc.php" method="POST">

			<div class="row" style="padding-bottom:25px ;">

				<div class="col-md-2">
					<label for="inputDate" class="form-label">Invoice No</label>
					<input type="text" class="form-control" id="inputDate" name="invo">
				</div>

			</div>


			<div class="row" style="padding-bottom:25px ;">



				<div class="col-md-3">
					<label for="inputDate" class="form-label">Date</label>
					<input type="date" class="form-control" id="inputDate" name="date">
				</div>

				<div class="col-md-6">
					<label for="inputCustomerName" class="form-label">Customer Name</label>
					<input list="cust" type="text" class="form-control" id="inputCustomerName" name="custname" onchange=matchID();>
					<datalist id="cust">
						<?php for ($i = 0; $i < $count; $i++) { ?>

							<option value=<?php echo '"' . $data[$i]["name"] . '"' ?>>
							<?php } ?>
					</datalist>
				</div>

				<div class="col-md-3">
					<label for="inputDate" class="form-label">Customer ID</label>
					<input list="custid" type="text" class="form-control" id="custid-in" name="custid" onchange=matchName();>
					<datalist id="custid">
						<?php for ($i = 0; $i < $count; $i++) { ?>

							<option value=<?php echo $data[$i]["id"] ?>>
							<?php } ?>

					</datalist>
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
					<tbody id="tableBody">

						<div class="tableRow" id="tableRow">
							<tr>




								<td> <input list="items" type="text" class="form-control itemname" id="itemname" name="itemName[]">
									<datalist id="items">
										<?php for ($i = 0; $i < $count_item; $i++) { ?>

											<option value=<?php echo '"' . $data_item[$i]["name"] . '"' ?>>
											<?php } ?>

									</datalist>
								</td>

								<td> <input type="number" class="form-control itemquantity" id="itemquantity" name="quantity[]" onchange=calcTotal(0);></td>

								<td> <input type="number" step="0.01" class="form-control totalval" id="totalval" name="total[]"></td>

							</tr>
						</div>



					</tbody>
				</table>
				<div>
					<input type="button" onclick="newRow();" class="btn btn-success" style="width:fit-content;" value="Add Another Row"></input>

				</div>


				<div class="col-md-6">
					<div class="form-floating">
						<label for="floatingTextarea2" style="">Notes : </label>
						<textarea class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px; padding-top:50px;" name="note"></textarea>
					</div>
				</div>







				<div class="col-md-2">
					<label for="inputPayment" class="form-label">Payment Type</label><br>
					<select id="inputPayment" class="form-select" name="payment">
						<option selected>Choose...</option>
						<option>On Credit</option>
						<option>In Cash</option>
					</select>
				</div>




				<div class="col-12">
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>



	</div>

	</div>

	<script>
		let rowCount = 1;

		const customer = {
			<?php
			$j = 1;

			for ($i = 0; $i < $count; $i++) {
				echo $data[$i]["id"] . ':"' . $data[$i]["name"] . '"';
				if ($j < $count) echo ",";
				$j++;
			}
			?>
		};

		const itemName = {
			<?php
			$j = 1;

			for ($i = 0; $i < $count_item; $i++) {
				echo $data_item[$i]["id"] . ':"' . $data_item[$i]["name"] . '"';
				if ($j < $count_item) echo ",";
				$j++;
			}
			?>
		};

		const itemPrice = {
			<?php
			$j = 1;

			for ($i = 0; $i < $count_item; $i++) {
				echo $data_item[$i]["id"] . ':' . $data_item[$i]["price"];
				if ($j < $count_item) echo ",";
				$j++;
			}
			?>
		};



		function matchID() {
			let custname = document.getElementById("inputCustomerName").value;
			document.getElementById("custid-in").value = getKeyByValue(customer, custname);

		}

		function matchName() {
			let custID = document.getElementById("custid-in").value;
			document.getElementById("inputCustomerName").value = customer[custID];

		}

		function getKeyByValue(object, value) {
			return Object.keys(object).find(key => object[key] === value);
		}

		function calcTotal(num) {
			let quant = document.getElementsByClassName("itemquantity")[num].value;

			let item = document.getElementsByClassName("itemname")[num].value;

			let ID = getKeyByValue(itemName, item);
			let price = itemPrice[ID];
			console.log(item,itemName,ID,price, quant);
			document.getElementsByClassName("totalval")[num].value = price * quant;

		}

		function newRow() {
			let row = `
						<div class="tableRow" id="tableRow">
							<tr>




								<td> <input list="items" type="text" class="form-control itemname" id="itemname" name="itemName[]">
									<datalist id="items">
										<?php for ($i = 0; $i < $count_item; $i++) { ?>

											<option value=<?php echo '"' . $data_item[$i]["name"] . '"' ?>>
											<?php } ?>

									</datalist>
								</td>

								<td> <input type="number" class="form-control itemquantity" id="itemquantity" name="quantity[]" onchange=calcTotal(${rowCount});></td>

								<td> <input type="number" step="0.01" class="form-control totalval" id="totalval" name="total[]"></td>

							</tr>
						</div>`;

			rowCount++;
			document.getElementById("tableBody").innerHTML += (row);
		}
	</script>
<?php include "../include/footer.inc.php"; ?>