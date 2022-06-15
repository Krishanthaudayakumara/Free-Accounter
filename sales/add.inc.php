<?php

include_once "../include/functions.php";
include_once "../include/db.config.php";

if (!(isset($_SESSION["userID"]))) session_start();

if (isset($_POST["submit"])) {
    $invoiceNo = $_POST["invo"];
    $inv_date = $_POST["date"];
    $customer_name = $_POST["custname"];
    $customer_ID = $_POST["custid"];
    $note = $_POST["note"];
    $payment_type = $_POST["payment"];
    $userID = $_SESSION["userID"];

    var_dump($_POST);


    for ($i = 0; $i < count($_POST["itemName"]); $i++) {
        $sql = "INSERT INTO sales (invoiceNo, inv_date, customer_name, customer_ID	, item_name, quantity, total, note, payment_type, userID)
VALUES (?,?,?,?,?,?,?,?,?,?); ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ./index.php?error=stmtfailed");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ssssssssss", $invoiceNo, $inv_date, $customer_name, $customer_ID, $_POST["itemName"][$i], $_POST["quantity"][$i], $_POST["total"][$i], $note, $payment_type, $userID);
            mysqli_stmt_execute($stmt);
        }
    }
    header("location: ./index.php?updated");
    exit();


}
