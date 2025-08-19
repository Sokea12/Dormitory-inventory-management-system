<?php
// timezone
date_default_timezone_set("Asia/Bangkok");
// Establish MySQL database connection
include("../../config/connection.php");


// Retrieve the supplier ID to be deleted
$sp_id = $_POST['sp_id']; // Assuming you're passing the supplier's ID via POST method

// Prepare SQL statement for deletion
$sql = "DELETE FROM tbl_suppliers WHERE sp_id = $sp_id";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $mas = 1;
    header("location:../form_supplies_list.php?massage=".$mas);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $mas = 0;
    header("location:../form_supplies_list.php?massage=".$mas);
}

// Close connection
$conn->close();
?>
