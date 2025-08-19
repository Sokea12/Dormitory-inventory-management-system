<?php
    session_start();
    include("../../config/connection.php");

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $item_id = $_POST["hiddenItemId"];

        // $sql = "DELETE FROM tbl_category WHERE category_id ='".intval($category_Id)."'";
        $sql = "UPDATE tbl_item SET item_status = '0'  WHERE item_id = $item_id";
        if ($conn->query($sql) === TRUE) {
            $mas = 1;
        } else {
            $mas = 0;
        }
        if($mas == 1){
            $sql = "UPDATE tbl_stock SET stock_status = '0'  WHERE stock_itemid = $item_id";
            if ($conn->query($sql) === TRUE) {
                $mas = 1;
            } else {
                $mas = 0;
            }
        }
        $conn->close();
        header("location:../form_item_list.php?massage=".$mas);

    } else {
        // Handle the case where the form is not submitted
        echo "Form not submitted.";
    }

?>