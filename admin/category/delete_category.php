<?php
    session_start();
    include("../../config/connection.php");

    if(isset($_POST['btn_delete_category_id']))
    {
        $all_id = $_POST['checkbox_category_delete_id'];
        $extract_id = implode(',' , $all_id);
        // echo "ID: " . $extract_id;

        $query = "DELETE FROM tbl_category WHERE id IN($extract_id) ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            $_SESSION['category'] = "Data Deleted Successfully";
            header("LOCATION: ../form_category.php");
        }else{
            $_SESSION['category'] = "Data Not Deleted";
            header("LOCATION: ../form_category.php");
        }
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $category_Id = $_POST["category_id"];

        // $sql = "DELETE FROM tbl_category WHERE category_id ='".intval($category_Id)."'";
        $sql = "UPDATE tbl_category SET category_status = '0'  WHERE category_id = $category_Id";
        if ($conn->query($sql) === TRUE) {
            $mas = 1;
        } else {
            $mas = 0;
        }

        if ($mas == 1) {
            $sql = "DELETE FROM tbl_produce WHERE pro_categoryid = $category_Id";
        
            if ($conn->query($sql) === TRUE) {
                // Deletion successful
                $mas = 1;
            } else {
                // Deletion failed
                $mas = 0;
            }
        }
        

        $conn->close();
        header("location:../form_category_list.php?massage=".$mas);

    } else {
        // Handle the case where the form is not submitted
        echo "Form not submitted.";
    }

?>