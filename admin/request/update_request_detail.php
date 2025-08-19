<?php
// Set timezone
date_default_timezone_set("Asia/Bangkok");
$requsetCreateDate = date("Y-m-d H:i:s");
include("../../config/connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

     
    $itemID = $_POST['itemIds'];
    $all_id = $_POST['requestIds'];
    $codeRqs = $_POST['hiddenCodeRqs'];
    $qtyNews = $_POST['qtyNews'];
    $qtyOld = $_POST['hiddenQtyold'];
    $qtyMax = $_POST['hiddenQtymax'];
    $remarks = $_POST['textareaDscItem'];

    // Update tbl_request_detail
    for ($i = 0; $i < count($all_id); $i++) {
        $id = $all_id[$i];
        $qtyNew = $qtyNews[$i];
        $qtyold = $qtyOld[$i];
        $qtymax = $qtyMax[$i];
        if($qtyNew !== 0){
            
            $getNew = $qtyold + $qtyNew;
            $qtyNew = $qtymax - $qtyNew;

            $sqlUpdateDetail = "UPDATE tbl_request_detail 
                            SET rqd_quantity =  $qtyNew, rqd_gets = $getNew, rqd_remarks = '$remarks'
                            WHERE id = $id";
        }
        if (!$conn->query($sqlUpdateDetail)) {
            echo "Error updating tbl_request_detail row with ID $id: " . $conn->error;
            // Handle errors more gracefully (e.g., log the error).
        }
    }
    echo "Hi Qty :" . $qtyNew;

    echo "<script>alert('tbl_request_detail updated successfully.');</script>";


    $pdo = new PDO('mysql:host=localhost;dbname=spidms_db', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the current highest code from the database
    $stmt = $pdo->prepare('SELECT MAX(SUBSTRING_INDEX(rv_code, "-", -1)) AS max_code FROM tbl_receiving');
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $maxCode = $result['max_code'];
    $maxCode+= 1;
    
    // Insert into tbl_receiving
    $rvnum =  0;
    for ($i = 0; $i < count($all_id); $i++) {
        $id = $all_id[$i];
        $qtynew = $qtyNews[$i];

        // Generate the new code
        $newCoderv = 'RV-' . str_pad($maxCode, 5, '0', STR_PAD_LEFT);
        if($qtynew != '0'){
            $rvnum++;
        }
    }
    if($qtynew != '0'){
        $sqlInsertReceiving = "INSERT INTO tbl_receiving (id, rv_code, rq_code, rv_items, rv_datetime)
                            VALUES (null, '$newCoderv', '$codeRqs', '$rvnum', '$requsetCreateDate')";
        if (!$conn->query($sqlInsertReceiving)) {
            echo "Error inserting into tbl_receiving with request_detail_id $id: " . $conn->error;
            // Handle errors more gracefully (e.g., log the error).
        }
    }
   
    for ($i = 0; $i < count($all_id); $i++) {
        $id = $all_id[$i];
        $qtynew = $qtyNews[$i];
        // Generate the new code
        $newCoderv = 'RV-' . str_pad($maxCode, 5, '0', STR_PAD_LEFT);

        if($qtynew != '0'){
            $sqlInsertReceiving = "INSERT INTO tbl_receiving_detail (id, rvd_code, rqd_detail_id, rvd_gets, rvd_datetime)
                               VALUES (null, '$newCoderv', '$id', '$qtynew', '$requsetCreateDate')";
            if (!$conn->query($sqlInsertReceiving)) {
                echo "Error inserting into tbl_receiving with request_detail_id $id: " . $conn->error;
                // Handle errors more gracefully (e.g., log the error).
            }
        }
    }
    echo "<script>alert('tbl_receiving updated successfully.');</script>";



    for ($i = 0; $i < count($all_id); $i++) {
        $id = $all_id[$i];
        $qtynew = $qtyNews[$i];
        $itemIds = $itemID[$i];

        $sqlCheckStock = "SELECT item_available FROM tbl_item WHERE id = $itemIds";
        $resultCheckStock = $conn->query($sqlCheckStock);

        if ($resultCheckStock) {
            $availableItem = $resultCheckStock->fetch_assoc();

            $availableItemStock = $availableItem['item_available'];

            $grandaVis = $availableItemStock + $qtynew;

            $sqlUpdateDetail = "UPDATE tbl_item 
            SET item_available = $grandaVis
            WHERE id = $itemIds";

            if (!$conn->query($sqlUpdateDetail)) {
            echo "Error updating tbl_request_detail row with ID $id: " . $conn->error;
            // Handle errors more gracefully (e.g., log the error).
            }
        }

        if (!$resultCheckStock) {
            echo "Error checking tbl_request_detail with ID $id: " . $conn->error;
            // Handle errors more gracefully (e.g., log the error).
        }
    }


    // Update tbl_request
    $j = 0;
    $rq_cod = 0;

    for ($i = 0; $i < count($all_id); $i++) {
        $id = $all_id[$i];
        // $qtyold = $qtyOld[$i];
        $sqlCheckRequest = "SELECT rqd_code, rqd_quantity FROM tbl_request_detail WHERE id = $id";
        $resultCheckRequest = $conn->query($sqlCheckRequest);

        if ($resultCheckRequest) {
            $qtyRqd = $resultCheckRequest->fetch_assoc();

            $rq_cod = $qtyRqd['rqd_code'];

            if ($qtyRqd['rqd_quantity'] === '0') {
                $j++;
            }
        }

        if (!$resultCheckRequest) {
            echo "Error checking tbl_request_detail with ID $id: " . $conn->error;
            // Handle errors more gracefully (e.g., log the error).
        }
    }

    if ($j === count($all_id) && !empty($rq_cod)) {
       
            echo "Equal : " . $j;

            $sqlUpdateRequest = "UPDATE tbl_request 
                                SET rq_status = 1
                                WHERE rq_code = '$rq_cod'";
        if (!$conn->query($sqlUpdateRequest)) {
            echo "Error updating tbl_request row with rq_code $rq_cod: " . $conn->error;
            // Handle errors more gracefully (e.g., log the error).
        }
    }

    echo "<script>alert('tbl_request updated successfully.');</script>";

    // Close the database connection
    $conn->close();

    header("LOCATION: ../form_receiving.php?code=$rq_cod");

} else {
    // Handle the case where the form is not submitted
    echo "Form not submitted.";
}
?>
