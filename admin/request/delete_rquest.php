<?php
    session_start();
    include("../../config/connection.php");

    if(isset($_GET['rquestId'])){
        $rqId = $_GET['rquestId'];

        $sql = "DELETE FROM tbl_request WHERE id='".intval($rqId)."'";
        // $conn->query($sql);
        // echo "Record has been deleted.";
        if ($conn->query($sql) === TRUE) {
            echo "<script> alert(Data updated successfully.) </script>";
            header("location:../form_request.php");
            // echo "1";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            // echo "0";
        }

        $conn->close();
    }else {
        // Handle the case where the form is not submitted
        echo "Form not submitted.";
    }



    // if(isset($_POST['btn_delete_category_id']))
    // {
    //     $all_id = $_POST['checkbox_category_delete_id'];
    //     $extract_id = implode(',' , $all_id);
    //     // echo "ID: " . $extract_id;

    //     $query = "DELETE FROM tbl_category WHERE id IN($extract_id) ";
    //     $query_run = mysqli_query($conn, $query);

    //     if($query_run)
    //     {
    //         $_SESSION['category'] = "Data Deleted Successfully";
    //         header("LOCATION: ../form_category.php");
    //     }else{
    //         $_SESSION['category'] = "Data Not Deleted";
    //         header("LOCATION: ../form_category.php");
    //     }
    // }

    // // // Check if the form is submitted
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $categoryId = $_POST["deleteCategortId"];

    //     $sql = "DELETE FROM tbl_category WHERE id='".intval($categoryId)."'";
    //     // $conn->query($sql);
    //     // echo "Record has been deleted.";
    //     if ($conn->query($sql) === TRUE) {
    //         // echo "<script> alert(Data updated successfully.) </script>";
    //         // header("location:form-categoryddd.php");
    //         // echo "1";
    //     } else {
    //         // echo "Error: " . $sql . "<br>" . $conn->error;
    //         // echo "0";
    //     }

    //     $conn->close();

    // } else {
    //     // Handle the case where the form is not submitted
    //     echo "Form not submitted.";
    // }

?>