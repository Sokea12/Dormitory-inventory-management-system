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
    $sp_image = "img-defaultimage.png";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // echo "Image :".$sp_image . "<br>";
    // Prepare data for insertion
    $sp_name = $_POST['textSuppname'];
    $sp_company = $_POST['textCompany'];
    $sp_email = $_POST['email'];
    $sp_phone = $_POST['textPhone'];
    $sp_address = $_POST['textareaAddress'];
    $sp_created_date = date('Y-m-d H:i:s'); // Assuming you want to insert the current date/time

    // Prepare SQL statement
    $sql = "INSERT INTO tbl_suppliers (sp_name, sp_company, sp_email, sp_phone, sp_address, sp_image, sp_created_date)
            VALUES ('$sp_name', '$sp_company', '$sp_email', '$sp_phone', '$sp_address', '$sp_image', '$sp_created_date')";

    if ($conn->query($sql) === TRUE) {
        $mas = 1;
    } else {
        $mas = 0;
    }

    if($mas == 1){
        if (isset($_POST["itemSelect"]) && !empty($_POST["itemSelect"])) {
            $selectedCategories = $_POST["itemSelect"];

            $query ="SELECT * FROM tbl_suppliers";
            $query_run = mysqli_query($conn, $query);
            
            $pro_spid = 0;
            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $row)
                {
                    $pro_spid = $row['sp_id'];
                }
            }
           
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
}

// Close connection
$conn->close();
header("location:../form_supplies_list.php?massage=".$mas);
?>
