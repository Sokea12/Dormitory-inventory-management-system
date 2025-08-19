<?php
// Set the timezone
// date_default_timezone_set("Asia/Bangkok");

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Retrieve data from the AJAX request
//     $requestData = json_decode($_POST['requestData'], true);
    
//     // Perform database insertion using PDO (you may need to adjust this based on your database configuration)
//     try {
//         $pdo = new PDO('mysql:host=localhost;dbname=dms_db', 'root', '');
//         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//         foreach ($requestData as $data) { 
//             // Assuming you have retrieved these values from somewhere in your code
//             $ord_orid = $data['ord_orid'];
//             $ord_item_id = $data['ord_item_id'];
//             $ord_price = $data['ord_price'];
//             $ord_quantity = $data['ord_quantity'];
//             $ord_unit = $data['ord_unit'];
//             $ord_amount = $data['ord_amount'];
//             $ord_gets = 0;
//             $ord_remarks = $data['ord_remarks'];
//             $ord_expected_date = date("Y-m-d");



//             // Prepare SQL statement for deletion
//             $sql = "DELETE FROM tbl_order_detail WHERE sp_id = $ord_orid";

//             if ($conn->query($sql) === TRUE) {
//                 echo "New record created successfully";
//                 $mas = 1;
//                 header("location:../form_supplies_list.php?massage=".$mas);
//             } else {
//                 echo "Error: " . $sql . "<br>" . $conn->error;
//                 $mas = 0;
//                 header("location:../form_supplies_list.php?massage=".$mas);
//             }

    
//             $stmt = $pdo->prepare('UPDATE tbl_order_detail 
//                                    SET ord_price = ?, 
//                                        ord_quantity = ?, 
//                                        ord_unit = ?, 
//                                        ord_amount = ?, 
//                                        ord_remarks = ?, 
//                                        ord_expected_date = ?
//                                    WHERE ord_orid = ? AND ord_item_id = ?');
//             $stmt->execute([$ord_price, 
//                             $ord_quantity, 
//                             $ord_unit, 
//                             $ord_amount, 
//                             $ord_remarks, 
//                             $ord_expected_date, 
//                             $ord_orid, 
//                             $ord_item_id]);
//         }

//         $ord_item_id = "";
//         foreach ($requestData as $data) { 
//             $ord_item_id = $data['ord_item_id'];
//             echo $ord_item_id;
//         }
//         if($ord_item_id != ""){
//             echo "1";
//         }else{
//             echo "0";
//         }
        
//     } catch (PDOException $e) {
//         echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
//     }
// } else {
//     echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
// }
?>




<?php
// Set the timezone
date_default_timezone_set("Asia/Bangkok");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the AJAX request
    $requestData = json_decode($_POST['requestData'], true);
    
        // Perform database deletion using PDO with error handling
        $pdo = new PDO('mysql:host=localhost;dbname=dms_db', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Array to store IDs for deletion
        $ord_orids = [];
        foreach ($requestData as $data) { 
            // Collect IDs for deletion
            $ord_orids[] = $data['ord_orid'];
        }
        if(count($requestData) != 0){
            
        
            // Prepare the IN clause for PDO
            $placeholders = rtrim(str_repeat('?, ', count($ord_orids)), ', ');
            
            // Prepare the DELETE query for tbl_order_detail
            $stmt_detail = $pdo->prepare("DELETE FROM tbl_order_detail WHERE ord_orid IN ($placeholders)");
            // Execute the DELETE query for tbl_order_detail
            $stmt_detail->execute($ord_orids);

            // Determine the length of $requestData array
            $stmt = $pdo->prepare('SELECT MAX(SUBSTRING_INDEX(location_id , "-", -1)) AS locationid FROM tbl_location WHERE location_type = 0 AND location_status = 1');
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $locationid = $result['locationid'];
            $ordraft = 0;
            foreach ($requestData as $data) { 
                // Assuming you have retrieved these values from somewhere in your code
                $ord_orid = $data['ord_orid'];
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
                $or_draft = $data['or_draft'];
                if($or_draft == 1){
                    $ordraft = $or_draft;
                    $or_draft = 0;
                }

                $stmt = $pdo->prepare('INSERT INTO tbl_order_detail (ord_id, ord_orid, ord_item_id, ord_locationid, ord_price, ord_quantity, ord_unit, ord_amount, ord_gets, ord_remarks, ord_created_date, ord_expected_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                $stmt->execute([null, $ord_orid, $ord_item_id, $ord_locationid, $ord_price, $ord_quantity, $ord_unit, $ord_amount, $ord_gets, $ord_remarks, $ord_created_date, $ord_expected_date]);
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
       
        }else{
            echo count($requestData);
        }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

?>
