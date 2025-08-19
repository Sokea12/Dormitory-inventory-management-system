<?php
    session_start();
    include("../../config/connection.php");

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $or_id = $_POST["or_id"];
        echo $or_id;
        // $sql = "DELETE FROM tbl_category WHERE category_id ='".intval($category_Id)."'";
        $sql = "UPDATE tbl_order SET or_status = '0'  WHERE or_id = $or_id";
        if ($conn->query($sql) === TRUE) {
            $mas = 1;
        } else {
            $mas = 0;
        }

        $conn->close();
        header("location:../form_purchease_list.php?massage=".$mas);

    } else {
        // Handle the case where the form is not submitted
        echo "Form not submitted.";
    }

?>