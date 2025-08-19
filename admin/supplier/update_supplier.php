<?php
// timezone
date_default_timezone_set("Asia/Bangkok");
// Establish MySQL database connection
include("../../config/connection.php");

function uploadImage($file, $uploadDir)
{
    $uploadedFile = $uploadDir . "img-" . $_FILES["avatarInput"]["name"];

    $imageFileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
    $allowedImageTypes = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $allowedImageTypes)) {
        if (move_uploaded_file($file["tmp_name"], $uploadedFile)) {
            return  "img-" . $_FILES["avatarInput"]["name"];
        } else {
            return "Error uploading file.";
        }
    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        return false; // Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.
    }
}

// Handle file upload
$uploadDir = "../../assets/images/user/";
$sp_image = uploadImage($_FILES["avatarInput"], $uploadDir);

if ($sp_image == false) {
    $sp_image = $_POST['sp_image'];
}
// Prepare data for update
$sp_id = $_POST['hiddenItemId']; // Assuming you're passing the supplier's ID via hidden field in the form
$sp_name = $_POST['textSuppname'];
$sp_company = $_POST['textCompany'];
$sp_email = $_POST['email'];
$sp_phone = $_POST['textPhone'];
$sp_address = $_POST['textareaAddress'];
$sp_created_date = date('Y-m-d H:i:s');
$pro_spid = $sp_id;
$pro_status = 1;
// Prepare SQL statement for update
$sql = "UPDATE tbl_suppliers SET 
        sp_name = '$sp_name', 
        sp_company = '$sp_company', 
        sp_email = '$sp_email', 
        sp_phone = '$sp_phone', 
        sp_address = '$sp_address',
        sp_image = '$sp_image'
        WHERE sp_id = $sp_id";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $mas = 1;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $mas = 0;
}


if($mas == 1){
    if (isset($_POST["itemSelect"]) && !empty($_POST["itemSelect"])) {
        $selectedCategories = $_POST["itemSelect"];
       
        foreach ($selectedCategories as $category) {
            $pro_categoryid = $category;

            $sql = "INSERT INTO tbl_produce (pro_spid, pro_itemid, pro_created_date)
            VALUES ('$pro_spid', '$pro_categoryid', '$sp_created_date')";
            if ($conn->query($sql) === TRUE) {
                $mas = 1;
            } else {
                $mas = 0;
            }
        }
    }
}
// Close connection
$conn->close();
header("location:../form_supplies_list.php?massage=".$mas);

?>
