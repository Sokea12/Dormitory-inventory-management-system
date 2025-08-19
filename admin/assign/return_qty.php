<?php
// Establish MySQL database connection
include("../../config/connection.php");


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $item_name = $_POST['item_name'];
    $stock_locationid = $_POST['stock_locationid'];
    // echo $item_name . " " . $stock_locationid;
    $sql ="SELECT item_id FROM tbl_item WHERE item_name = '$item_name'"; 
    $query_run = mysqli_query($conn, $sql);
            
    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        { 
            $stock_itemid = $row['item_id'];
            $sql ="SELECT stock_itemavailable FROM tbl_stocks WHERE stock_itemid = $stock_itemid AND stock_locationid = $stock_locationid"; 
            $query_run = mysqli_query($conn, $sql);
                    
            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $rows)
                { 
                    $stock_itemavailable = $rows['stock_itemavailable'];
                    echo $stock_itemavailable;
                }
            }
        }
    }
}
?>