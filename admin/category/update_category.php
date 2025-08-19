<?php
// timezone
date_default_timezone_set("Asia/Bangkok");

// connection to database
include("../../config/connection.php");
// session_start();
function uploadImage($file, $uploadDir)
{
    $uploadedFile = $uploadDir . "img-" . $_FILES["fileIcon"]["name"];

    $imageFileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
    $allowedImageTypes = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $allowedImageTypes)) {
        if (move_uploaded_file($file["tmp_name"], $uploadedFile)) {
            return "img-" . $_FILES["fileIcon"]["name"];
        } else {
            return "Error uploading file.";
        }
    } else {
        return false; // Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $category_id = $_POST["hiddenCategoryId"];
    $category_name = $_POST["textCategoryName"];
    $category_dsc = $_POST["textareaDescription"];

    // Handle file upload
    $uploadDir = "../../assets/images/categorys/";
    $category_image = uploadImage($_FILES["fileIcon"], $uploadDir);
    echo "img: " . $category_image . "<br>";
    if ($category_image == false) {
        $category_image = $_POST["hiddenfileIcon"];
    }

   // Prepare SQL statement for update
    $sql = "UPDATE tbl_category 
    SET category_name = '$category_name', 
        category_dsc = '$category_dsc', 
        category_image = '$category_image'
    WHERE category_id = $category_id";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $mas = 1;
    header("location:../form_category_list.php?massage=".$mas);
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $mas = 0;
    header("location:../form_category_list.php?massage=".$mas);
    }

    // Close connection
    $conn->close();
}
?>
