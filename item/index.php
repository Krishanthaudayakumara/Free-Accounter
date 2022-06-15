<?php
include_once "../include/functions.php";
include_once "../include/header.inc.php";
include_once "../include/db.config.php";
?>

<link rel="stylesheet" href=<?php url("/css/item.css") ?>>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/css/uikit.min.css">


<?php
if (!(isset($_SESSION["email"])) && !(isset($_SESSION["userID"])))   header("location: ../user");

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if(!(isset($_SESSION))) session_start();

$userID = $_SESSION["userID"];


$sql = "SELECT * FROM item WHERE userID = $userID;";
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
$conn->close();

?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target=".item-add-modal">Add Product</button>
		</div>
	</div>

	<div class="modal fade item-add-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" style="padding:40px 10px;">


				<form action="./Add.php" method="POST" enctype="multipart/form-data">
					<div class="uk-container">
						<div uk-grid>
							<div class="uk-width-1-2">
								<div class="uploadOuter">
									<label for="uploadFile" class="btn btn-primary">Upload Image</label>
									<strong>OR</strong>
									<span class="dragBox">
										Darg and Drop image here
										<input type="file" name="product-image" onChange="dragNdrop(event)" ondragover="drag()" ondrop="drop()" id="uploadFile" />
									</span>
								</div>
								<div id="preview"></div>


							</div>
							<div class="uk-width-1-2">
								<div class='uk-width-1-1@s'>
									<h2 class="uk-text-center">Product Details</h2>
									<hr />
									<div class="uk-width-1-1@s">
										<label class="uk-form-label" for="txtModel">Item Name</label>
										<div class="uk-form-controls">
											<input class="uk-input" id="txtModel" type="text" name="item-name" placeholder="P40 Warhawk">
										</div>
									</div>
									<div class="uk-margin">
										<label class="uk-form-label" for="txtBrand">Brand</label>
										<div class="uk-form-controls">
											<input class="uk-input" id="txtBrand" type="text" placeholder="Curtiss" name="brand">
										</div>
									</div>

									<div class="uk-margin">
										<label class="uk-form-label" for="txtPrice">Price</label>
										<div class="uk-form-controls">
											<input class="uk-input" id="txtPrice" type="text" placeholder="2,000,000" name="item-price">
										</div>
									</div>

									<div class="uk-margin">
										<label class="uk-form-label" for="txtBrand">Stock</label>
										<div class="uk-form-controls">
											<input class="uk-input" id="txtBrand" type="number" placeholder="Stock" name="stock">
										</div>
									</div>

									<div class="uk-margin">
										<label class="uk-form-label" for="txtDescription">Description</label>
										<div class="uk-form-controls">
											<textarea class="uk-textarea" id="txtDescription" name="item-description"></textarea>
										</div>
									</div>

									<button class="btn btn-primary" type="submit" name="submit">Add Product</button>

								</div>
							</div>
						</div>
					</div>
				</form>


			</div>
		</div>
	</div>

<?php if($count) {?>
	<div class="row" style="margin-top:50px;">
		<?php for ($i = 0; $i < $count; $i++) { ?>
			<div class="col-sm" style="margin-bottom: 20px;">
				<div class="card" style="width: 18rem; margin-left:2.5rem; text-align:center;">
					<img class="card-img-top" src=<?php echo $data[$i]["imageURL"] ?> alt="Card image cap">
					<div class="card-body">
						<h5 style="font-weight: bold;" class="card-title"><?php echo $data[$i]["name"] ?></h5>
						<p style="font-size:small; font-style:italic; ">Price: <?php echo $data[$i]["price"] ?> | stock: <?php echo $data[$i]["stock"] ?> | Brand: <?php echo $data[$i]["brand"] ?></p>
						<p class="card-text"><?php echo $data[$i]["description"] ?></p>
						<span style="display: inline-block;">
						<form action="./delete.php" method="POST">
						    <a href="#" class="btn btn-primary">More</a>

							<input style="display:none;" type="number" name="item-id" value= <?php echo $data[$i]["id"] ?> >
							<button name="delete" type="submit" class="btn btn-danger">Delete</a>
						</form>
						</span>
					</div>
				</div>
			</div>

		<?php } 
	} else echo "No products Available"; ?>
	</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.3.7/dist/js/uikit-icons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script>
<script src=<?php url("/js/item.js"); ?>></script>

<?php include_once "../include/footer.inc.php" ?>