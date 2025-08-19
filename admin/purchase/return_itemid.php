<?php
   // timezone
   date_default_timezone_set("Asia/Bangkok");
    
   // Establish MySQL database connection
   include("../../config/connection.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemId = $_POST['itemIds'];

    $query ="SELECT item_name, item_retailprice, item_wholesaleprice, item_categoryid FROM tbl_item WHERE item_id = $itemId AND item_status = 1"; 
    $query_run = mysqli_query($conn, $query);
            
    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        { 
            $itemcategoryid = $row['item_categoryid'];
           
            $query ="SELECT category_id, category_name FROM tbl_category WHERE category_id = $itemcategoryid AND category_status = 1"; 
            $query_run = mysqli_query($conn, $query);
                    
            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $rows)
                { 
                    $itemName = $row['item_name'];
                    $item_retailprice = $row['item_retailprice'];
                    $item_wholesaleprice = $row['item_wholesaleprice'];
                    $category_name = $rows['category_name'];

                    echo $itemName . " " . $item_retailprice. " " . $item_wholesaleprice . " " . $category_name;
                    
                }
            }
            
        }
    }

}



?>




