<?php
// Set timezone
date_default_timezone_set("Asia/Bangkok");

// Include database connection
include("../../config/connection.php");

function uploadImage($file, $uploadDir)
{
    $uploadedFile = $uploadDir . "img-" . $_FILES["fileImage"]["name"];

    $imageFileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
    $allowedImageTypes = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $allowedImageTypes)) {
        if (move_uploaded_file($file["tmp_name"], $uploadedFile)) {
            return  "img-" . $_FILES["fileImage"]["name"];
        } else {
            return "Error uploading file.";
        }
    } else {
        echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        return false; // Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.
    }
}

// Handle file upload
$uploadDir = "../../assets/images/categorys/";
$item_image = uploadImage($_FILES["fileImage"], $uploadDir);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $item_id = $_POST["hiddenItemId"]; // Assuming you have a field for the item ID in your form
    $slCategoryItemId = $_POST["slCategoryItemId"];
    $item_name = $_POST["textItemName"];
    $item_retailprice = $_POST['item_retailprice'];
    $item_wholesaleprice = $_POST['item_wholesaleprice'];
    $item_dsc = $_POST["textareaDescription"];
    $item_image = $item_image;
    $hiddenfileImage = $_POST['hiddenfileImage'];
    $mas = 0;
    if ($item_image == false) {
        $item_image = $hiddenfileImage;
    }

    // Prepare and execute the SQL query
    

    if (isset($_POST["ilocation_locationid"]) && !empty($_POST["ilocation_locationid"])) {
        $stock_itemid = $item_id;
        $stock_locationid = $_POST["ilocation_locationid"];
        $stock_date = date("Y-m-d");
        $stock_itemavailable = 0;

        $sql = "UPDATE tbl_item SET 
            item_categoryid = '$slCategoryItemId',
            item_name = '$item_name',
            item_retailprice = '$item_retailprice',
            item_wholesaleprice = '$item_wholesaleprice',
            item_dsc = '$item_dsc',
            item_image = '$item_image'
            WHERE item_id = $item_id";
            if ($conn->query($sql) === TRUE) {
                $mas = 1;
            } else {
                $mas = 0;
            }

        // Execute SQL statement
        if ($conn->query($sql) === TRUE) {
            
           
            foreach ($stock_locationid as $ilocationid) {
                $stock_locationid = $ilocationid;

                $sql = "INSERT INTO tbl_stocks(stock_id, stock_itemid, stock_locationid, stock_itemavailable, stock_date)
                    VALUES (null, '$stock_itemid', '$stock_locationid', '$stock_itemavailable', '$stock_date')";
                if ($conn->query($sql) === TRUE) {
                    $mas = 1;
                } else {
                    $mas = 0;
                }
            }

        } else{
            $mas = 0;
        }
    }
    // Close the database connection
    $conn->close();
    header("location:../form_item_list.php?massage=".$mas);


}
?>
