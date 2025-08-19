<?php
    // Set the timezone
    date_default_timezone_set("Asia/Bangkok");
    include("../../config/connection.php");
    $or_expected_date = date("Y-m-d");

    // Check if data is received via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $textCode = $_POST['textCode'];
        $slSp = $_POST['slSp'];
        $textareaDsc = $_POST['textareaDsc'];
        $hiddenOr_id = $_POST['hiddenOr_id'];
        $i = 0;
        $j = 0;
        $or_receive = 0;
        $cgeackqty = true;
        $cgeackQty1 = 1;
        $cgeackQty2 = 1;

        // Loop through each item and update ord_gets
        foreach($_POST['qty'] as $key => $qty) {
            $j++;
            $ord_quantity = (int)$qty; // Cast to integer for safety
            $item_id = $_POST['item_id'][$key]; // Assuming you have item_id in the form
            $getold = $_POST['getold'][$key];
            $ord_quantityald = $_POST['ord_quantityald'][$key];
            $stock_locationid = $_POST['location_id'][$key];
            $get = $ord_quantity + $getold;
            if($get == $ord_quantityald){ $i++; }
            $get = $getold + $ord_quantity;


            // varayble to in stocks 
            $sin_codepo = $textCode;
            $sin_buyerid = $_POST['sin_buyerid'];
            $sin_itemid = $item_id;
            $sin_locationid = $stock_locationid;
            $sin_quantity = $ord_quantity;
            $sin_amount = $_POST['ord_price'][$key];
            $sin_remarks = $textareaDsc;
            $sin_date = date("Y-m-d");

            // Prepare SQL statement for update
            $sql = "UPDATE tbl_order_detail SET 
            ord_locationid = '$stock_locationid',
            ord_gets = '$get',
            ord_remarks = '$textareaDsc',
            ord_expected_date = '$or_expected_date'
            WHERE ord_orid = $hiddenOr_id AND ord_item_id = $item_id";
            if ($conn->query($sql) === TRUE) {
                $mas = 1;
            } else {
                $mas = 0;
            }


            // echo "<br>";
            // Construct the SQL query
            if($mas == 1){

                $sql = "SELECT stock_itemavailable FROM tbl_stocks WHERE stock_itemid = $item_id AND stock_locationid = $stock_locationid";
                $query_run = mysqli_query($conn, $sql);
                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                    {
                        $stock_itemavailable = $row['stock_itemavailable'];
                        $getostock = $stock_itemavailable + $ord_quantity;

                        $sqls = "UPDATE tbl_stocks 
                        SET stock_itemavailable = $getostock
                        WHERE stock_itemid = $item_id AND stock_locationid = $stock_locationid";
                        $conn->query($sqls);
                    }
                }
                echo $ord_quantity;
                if($ord_quantity != 0){
                    $sql = "INSERT INTO tbl_stock_in (sin_codepo, sin_buyerid, sin_itemid, sin_locationid, sin_quantity, sin_amount, sin_remarks, sin_date)
                    VALUES ('$sin_codepo', '$sin_buyerid', '$sin_itemid', '$sin_locationid', '$sin_quantity', '$sin_amount', '$sin_remarks', '$sin_date')";
                    // Execute SQL statement
                    $conn->query($sql);
                }

                if($i == $j ){
                    $or_receive = 2;
                } else if($i > 0 || $ord_quantity > 0){
                    $or_receive = 1;
                }else{
                    $or_receive = 0;
                }
        
                // Prepare SQL statement for update
                $sql = "UPDATE tbl_order SET 
                or_receive = '$or_receive'
                WHERE or_id = $hiddenOr_id";
                $conn->query($sql);

            }
        }
    } 
    $conn->close();
    // Redirect or output success message
    header("Location: ../form_purchase_received.php?or_id=$hiddenOr_id&or_code=$textCode&or_supplier_id=$slSp&or_receive=$or_receive&receive=1");

?>
