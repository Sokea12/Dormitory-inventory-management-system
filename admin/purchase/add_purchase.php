<?php
// Set the timezone
date_default_timezone_set("Asia/Bangkok");

// Get the current date and time
// $rqDatetimes = date("Y-m-d H:i:s");
// Establish MySQL database connection
// include("../../config/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the AJAX request
    $requestData = json_decode($_POST['requestData'], true);
    
    // Perform database insertion using PDO (you may need to adjust this based on your database configuration)
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=dms_db', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get the current highest code from the database
        $stmt = $pdo->prepare('SELECT MAX(SUBSTRING_INDEX(or_code, "-", -1)) AS max_code FROM tbl_order');
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $maxCode = $result['max_code'];
        $maxCode+= 1;
        
        $i = 0;
        $or_receive = 0;
        $or_status = 1;
        $ordraft = 0;
        $or_created_date = date("Y-m-d");
        $or_expected_date = date("Y-m-d");
        $or_code = 'PO-00' . str_pad($maxCode, '0', STR_PAD_LEFT);
        
        foreach ($requestData as $data) { 
            $i++;
            // Generate the new code
            $ord_orcode = $or_code;
            $or_supplier_id = $data['or_supplier_id'];
            $or_buyer_id = $data['or_buyer_id']; 
            $or_draft = $data['or_draft'];
           
            if($or_draft == 1){
                $ordraft = $or_draft;
                $or_draft = 0;
            }
            
            if($i === 1){
                $stmt = $pdo->prepare('INSERT INTO tbl_order (or_id, or_code, or_supplier_id, or_buyer_id, or_receive, or_status, or_draft, or_created_date, or_expected_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
                $stmt->execute([null, $or_code, $or_supplier_id, $or_buyer_id, $or_receive, $or_status, $or_draft, $or_created_date, $or_expected_date]);
            }

            // Assuming you have retrieved these values from somewhere in your code
            // Get the current highest code from the database
            $stmt = $pdo->prepare('SELECT MAX(SUBSTRING_INDEX(or_id, "-", -1)) AS max_code FROM tbl_order');
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $maxCode = $result['max_code'];

            $stmt = $pdo->prepare('SELECT MAX(SUBSTRING_INDEX(location_id , "-", -1)) AS locationid FROM tbl_location WHERE location_type = 0 AND location_status = 1');
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $locationid = $result['locationid'];

            // Assuming you have retrieved these values from somewhere in your code
            $ord_orid = $maxCode;
            $ord_item_id = $data['ord_item_id'];
            $ord_locationid = $locationid;
            $ord_price = $data['ord_price'];
            $ord_quantity = $data['ord_quantity'];
            $ord_unit = $data['ord_unit'];
            $ord_amount = $data['ord_amount'];
            $ord_gets = 0;
            $ord_remarks = $data['ord_remarks'];
            $ord_created_date = date("Y-m-d");
            $ord_expected_date = date("Y-m-d");

            $stmt = $pdo->prepare('INSERT INTO tbl_order_detail (ord_id, ord_orid, ord_orcode, ord_item_id, ord_locationid, ord_price, ord_quantity, ord_unit, ord_amount, ord_gets, ord_remarks, ord_created_date, ord_expected_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([null, $ord_orid, $ord_orcode, $ord_item_id, $ord_locationid, $ord_price, $ord_quantity, $ord_unit, $ord_amount, $ord_gets, $ord_remarks, $ord_created_date, $ord_expected_date]);
        }


        $ord_item_id = "";
        foreach ($requestData as $data) { 
            $ord_item_id = $data['ord_item_id'];
        }
        if($ord_item_id != ""){
            if($ordraft == 1){
                echo "$ord_orid";
            }else{
                echo "1"; 
            }
        }else{
            echo "0";
        }
        
       
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

?>
