<?php
    session_start();
    // $_SESSION['category'] = "";

    include("../../config/connection.php");

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $usId = $_POST["us_id"];
        
        $sql = "UPDATE tbl_users SET us_status = '0'  WHERE us_id = $usId";
        
        if ($conn->query($sql) === TRUE) {
            $mas = 1;
            echo "<script>alert('Data updated successfully.');</script>";
            header("location:../form_user_list.php?massage=".$mas);
        } else {
            $mas = 0;
            echo "Error: " . $sql . "<br>" . $conn->error;
            header("location:../form_user_list.php?massage=".$mas);
        }
        $conn->close();

    } else {
        // Handle the case where the form is not submitted
        echo "Form not submitted.";
    }

?>