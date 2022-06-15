<?php 

if (isset($_POST['submit'])) {
	include "../db_conn.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_POST['id']);
	$day = validate($_POST['date']);
	$cusname = validate($_POST['cusname']);
	$cusid = validate($_POST['cusid']);
	$itemno = validate($_POST['itemno']);
	$quantity = validate($_POST['quantity']);
	$total = validate($_POST['total']);
	$note = validate($_POST['note']);

	
	$user_data = 'id='.$id. 'date='.$day. 'cusname='.$cusname. 'cusid='.$cusid. 'itemno='.$itemno. 'quantity='.$quantity. 'total='.$total. '&note='.$note;

	if (empty($id)) {
		header("Location: ../addreturn.php?error=Credit Note No is required&$user_data");
	}else if (empty($day)) {
		header("Location: ../addreturn.php?error=Date is required&$user_data");
	}else if (empty($cusname)) {
		header("Location: ../addreturn.php?error=Customer Name is required&$user_data");
	}
	else if (empty($cusid)) {
		header("Location: ../addreturn.php?error=Customer ID is required&$user_data");
	}
	else if (empty($itemno)) {
		header("Location: ../addreturn.php?error=Item No is required&$user_data");
	}
	else if (empty($quantity)) {
		header("Location: ../addreturn.php?error=Quantity is required&$user_data");
	}
	else if (empty($total)) {
		header("Location: ../addreturn.php?error=Total is required&$user_data");
	}
	else if (empty($note)) {
		header("Location: ../addreturn.php?error=Note is required&$user_data");
	}
	else {

       $sql = "INSERT INTO salesreturn(id, day, cusname, cusid, itemno, quantity, total, note) 
               VALUES('$id','$day', '$cusname','$cusid', '$itemno', '$quantity','$total','$note')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../returnread.php?success=successfully added");
       }else {
          header("Location: ../addreturn.php?error=unknown error occurred&$user_data");
       }
	}

}
	



	