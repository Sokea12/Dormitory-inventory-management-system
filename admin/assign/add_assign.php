<?php
// Establish MySQL database connection
include("../../config/connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the AJAX request
    $requestData = json_decode($_POST['requestData'], true);
    $sou_id = "";
    $i = 0;
    $massage = 0;

    $pdo = new PDO('mysql:host=localhost;dbname=dms_db', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Get the current highest code from the database
    $stmt = $pdo->prepare('SELECT MAX(SUBSTRING_INDEX(sou_code, "-", -1)) AS max_code FROM tbl_stock_out');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $maxCode = $result['max_code'];
    $maxCode+= 1;
    $sou_code = 'CS-' . str_pad($maxCode, '0', STR_PAD_LEFT);
    // echo $sou_code;

    foreach ($requestData as $data) { 
        // Retrieve data from the form
        $sou_cutbyid = $data['sou_cutbyid'];
        $soud_fromlocation = $data['soud_fromlocation'];
        // echo $soud_fromlocation;
        $sou_user = $data['sou_user'];
        $as_itemid = $data['as_itemid'];
        $soud_quantity = $data['soud_quantity'];
        $soud_price = $data['soud_price'];
        $soud_amount = $data['soud_amount'];
        $soud_remarks = $data['soud_remarks'];
        $sou_drafs = $data['sou_drafs'];
        $soud_status = '1';
        $soud_created_date = date("Y-m-d");
        

        if($i < '1'){      
            // Prepare SQL statement to insert data into tbl_location
            $sql = "INSERT INTO tbl_stock_out (sou_code, sou_cutbyid, sou_user, sou_drafs, sou_status, sou_created_date)
                    VALUES ('$sou_code', '$sou_cutbyid', '$sou_user', '$sou_drafs', '$soud_status', '$soud_created_date')";
            // Execute SQL statement
            if ($conn->query($sql) === TRUE) {
                $massage = '1';
            }
            $i++;
        }
        // $massage == '1'
        if($massage == '1'){
            // Your SQL query
            $sql = "SELECT sou_id FROM tbl_stock_out";
            // Execute SQL statement
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
             $soud_souid =  $row['sou_id'];
            }
            // echo $soud_souid;
             // Prepare SQL statement to insert data into tbl_location
             $sql = "INSERT INTO tbl_stock_out_detail (soud_souid, soud_code, soud_fromlocation, soud_uselocation, soud_itemid, soud_quantity, soud_price, soud_amount, soud_remarks, soud_created_date)
             VALUES ('$soud_souid', '$sou_code', '$soud_fromlocation', '$sou_user', '$as_itemid', '$soud_quantity', '$soud_price', '$soud_amount', '$soud_remarks', '$soud_created_date')";
             $conn->query($sql);

            $stock_itemid = $as_itemid;
            $stock_locationid = $soud_fromlocation;
            // echo $stock_locationid. " ";
            $sql ="SELECT stock_itemavailable FROM tbl_stocks WHERE stock_itemid = $stock_itemid AND stock_locationid = $stock_locationid"; 
            $query_run = mysqli_query($conn, $sql);
                    
            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $rowsp)
                { 
                    $stock_itemavailable = $rowsp['stock_itemavailable'];
                    $stock_itemavailable = $stock_itemavailable - $soud_quantity;

                     $sql = "UPDATE tbl_stocks 
                     SET stock_itemavailable='$stock_itemavailable'
                     WHERE stock_itemid = $stock_itemid AND stock_locationid ='$stock_locationid'";
                    $conn->query($sql);

                }
            }
        }
    }
    
    echo $massage;
    $conn->close();
   
}
?>
