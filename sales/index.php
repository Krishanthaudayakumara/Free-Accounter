<?php

include_once "../include/functions.php";
include_once "../include/header.inc.php";
include_once "../include/db.config.php";
if (!(isset($_SESSION["email"])) && !(isset($_SESSION["userID"]))) header("location: ../user");


?>

<?php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!(isset($_SESSION))) session_start();

$userID = $_SESSION["userID"];


$sql = "SELECT * FROM sales WHERE userID = $userID AND payment_type = 'On Credit' ORDER BY inv_date;";
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


<?php if ($count) { ?>

    <?php for ($i = 0; $i < $count; $i++) { ?>


<?php }
} else echo "No Records Available"; ?>

<style>
    .table thead {
        background-color: rgb(242, 243, 235);
    }

    .srj {
        padding: 20px 50px;
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

<div class="sd" >
    <div class="row" style="margin-left:5vw;">
        <div class="col-sm-12">
            <a href="./add.php" class="btn btn-success">Add Record</a>
        </div>
    </div>
    <h3 class="headline">Sales Journal</h3>

    <div class="srj">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Invoice No</th>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Desc.</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Value</th>
                    <th scope="col">Total Value</th>


                </tr>
            </thead>
            <tbody>
                <?php if ($count) { ?>

                    <?php for ($i = 0; $i < $count; $i++) { ?>
                        <tr>
                            <th scope="row"><?php echo $i + 1 ?></th>
                            <td><?php echo $data[$i]["inv_date"] ?></td>
                            <td><?php echo $data[$i]["invoiceNo"] ?></td>
                            <td><?php echo $data[$i]["customer_ID"] ?></td>
                            <td><?php echo $data[$i]["customer_name"] ?></td>
                            <td><?php echo $data[$i]["item_name"] ?></td>
                            <td><?php echo $data[$i]["quantity"] ?></td>
                            <td><?php echo ($data[$i]["total"] / $data[$i]["quantity"]) ?></td>
                            <td><?php echo $data[$i]["total"] ?></td>
                            <td><?php echo $data[$i]["total"] ?></td>
                        </tr>

                <?php }
                } else echo "No Records Available"; ?>

                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php include "../include/footer.inc.php"; ?>