<?php
// Establish MySQL database connection
include("../../config/connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $manege = $_POST['manege'];
    $location_id = $_POST["locationId"];
    
    // Prepare SQL statement to insert data into tbl_location
    $sql = "UPDATE tbl_location 
        SET location_status = '0'
        WHERE location_id='$location_id'";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        $massage = 1;
    } else {
        $massage = 0;
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
    if (!empty($manege)) {
        header("location:../form_stocks_manege.php?massage=$massage");
    }else{
        header("location:../form_location.php?massage=$massage");
    }
}
?>
