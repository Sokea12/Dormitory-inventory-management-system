<?php
// Set the timezone
date_default_timezone_set("Asia/Bangkok");

// Get the current date and time
$rqDatetimes = date("Y-m-d H:i:s");
// Establish MySQL database connection
// include("../../config/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the AJAX request
    $requestData = json_decode($_POST['requestData'], true);

    // Perform database insertion using PDO (you may need to adjust this based on your database configuration)
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=spidms_db', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get the current highest code from the database
        $stmt = $pdo->prepare('SELECT MAX(SUBSTRING_INDEX(rq_code, "-", -1)) AS max_code FROM tbl_request');
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $maxCode = $result['max_code'];
        $maxCode+= 1;
        
        $i = 0;
        $nItems = 0;
        foreach ($requestData as $data) {
            $nItems++;
        }
        foreach ($requestData as $data) { 
            $i++;
             // Generate the new code
             $newCode = 'R-' . str_pad($maxCode, 5, '0', STR_PAD_LEFT);
             $rqId = str_pad($maxCode, 5, '0', STR_PAD_LEFT);

            if($i === 1){
                // $sql = "INSERT INTO tbl_request ( id, rq_code, items, rq_datetime) VALUES ( 74, '$newCode', '$rqDatetimes')";
                $stmt = $pdo->prepare('INSERT INTO tbl_request (rq_id, rq_code, rq_items, rq_status, rq_datetime) VALUES (?, ?, ?, ?, ?)');
                $stmt->execute([null, $newCode, $nItems, $data['rqGets'], $rqDatetimes]);
            }
                                                                                                                                                                           
            $stmt = $pdo->prepare('INSERT INTO tbl_request_detail (rqd_code, item_id, rqd_unit_price, rqd_quantity, rqd_gets, rqd_amount, rqd_remarks, approval_id, rqd_datetime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$newCode, $data['rqdSelectItemId'], $data['rqdUnitPrice'], $data['rqdQuantity'], $data['rqGets'], $data['rqdTotal'], $data['rqdRemarks'], $data['approvalIds'], $rqDatetimes]);
            
        }
        
        // Return success status
        echo $newCode;
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
