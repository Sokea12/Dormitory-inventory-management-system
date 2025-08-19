<?php
// Establish MySQL database connection
include("../../config/connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $manege = $_POST['manege'];
    $location_id = $_POST["location_id"];
    $location_name = $_POST["location_name"];
    $location_dsc = $_POST["location_dsc"];;
    $location_type = $_POST["location_type"];
    $location_status = '1';
    $location_date = date("Y-m-d");

    // Check if location_id is provided (if provided, it's an update operation)
    if (!empty($location_id)) {
        // Prepare SQL statement to update data in tbl_location
        $sql = "UPDATE tbl_location 
                SET location_name='$location_name', location_dsc = '$location_dsc'
                WHERE location_id='$location_id'";
    } else {
        // Prepare SQL statement to insert data into tbl_location
        $sql = "INSERT INTO tbl_location (location_name, location_dsc, location_type, location_status, location_date)
                VALUES ('$location_name', '$location_dsc', '$location_type', '$location_status', '$location_date')";
    }

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
