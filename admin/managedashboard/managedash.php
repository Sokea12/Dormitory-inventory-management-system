<?php
// $date = "2024-03-01";
// // Extract year
// $year = date("Y-m", strtotime($date));
// // Extract month
// $month = date("m", strtotime($date));
// // echo "Year: $year, Month: $month";
// Set the timezone
date_default_timezone_set("Asia/Bangkok");
// Get the current date and time
$rqDatetimes = date("Y-m");
// Establish MySQL database connection
include("../../config/connection.php");

// data form $_POST
if(isset($_POST['dateform'])){
    $fromDate = $_POST['dateform'];
    $yearmonth = date("Y-m", strtotime($fromDate));
    $rqDatetimes = $yearmonth;
}

$stockin_total = 0;
// $stockin_quantity = 0; // Initialize total stock item available
$query ="SELECT sin_quantity, sin_date FROM tbl_stock_in"; 
$query_run = mysqli_query($conn, $query);

if(mysqli_num_rows($query_run) > 0) {
    foreach($query_run as $row) { 
        $date = $row['sin_date'];
        $yearanddate = date("Y-m", strtotime($date));
        if($yearanddate == $rqDatetimes){

            $stockin_quantity = $row['sin_quantity'];
            $stockin_total += $stockin_quantity; // Accumulate total
        }
    }
}
// echo $date;
echo $stockin_total;


// $num = 0; // Initialize total variable
// $stockin_quantity_total = 0; // Initialize total stock item available

// $query ="SELECT sin_quantity FROM tbl_stock_in"; 
// $query_run = mysqli_query($conn, $query);

// if(mysqli_num_rows($query_run) > 0) {
// foreach($query_run as $row) { 
// $sin_quantity = $row['sin_quantity'];
// $stockin_quantity_total += $sin_quantity; // Accumulate total
// $num++; // Increment count
// }
// }


?>