<?php
// timezone
date_default_timezone_set("Asia/Bangkok");
// Establish MySQL database connection
$us_created_date = date("Y-m-d H:i:s");
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
$usf_image = uploadImage($_FILES["avatarInput"], $uploadDir);



// Retrieve form data
$usfId = $_POST['hiddenUsf_id'];
$textFname = $_POST['textFname'];
$textLname = $_POST['textLname'];
$textPhone = $_POST['textPhone'];
$slGender = $_POST['slGender'];
$dateDob = $_POST['dateDob'];
$textareaAddress = $_POST['textareaAddress'];
// $checkboxSentemailUser = $_POST['checkboxSentemailUser']; // This will be 'checked' or 'unchecked'
$slRole = $_POST['slRole'];
$hidden_image = $_POST['usf_image'];
// Prepare data for insertion
$usf_firstname = $textFname; 
$usf_lastname = $textLname;
$usf_gender = $slGender;
$usf_dob = $dateDob;
$usf_phone = $textPhone; 
$usf_image = $usf_image;
$usf_address = $textareaAddress;
$usf_role = $slRole;
$usf_img = $hidden_image;

echo $usf_role;

$pms_userid = $usfId;
$pms_purchases = isset($_POST['checkPurchase']) ? $_POST['checkPurchase'] : 0;
$pms_assign = isset($_POST['checkAssign']) ? $_POST['checkAssign'] : 0;
$pms_approver = isset($_POST['checkAppro']) ? $_POST['checkAppro'] : 0;
$pms_user = isset($_POST['checkUser']) ? $_POST['checkUser'] : 0;
// $pms_supplies = isset($_POST['checkSupplies']) ? $_POST['checkSupplies'] : 0;
if($usf_role == 1){
    $pms_purchases = 1;
    $pms_assign = 1;
    $pms_approver = 1;
    $pms_user = 1;
}

// // Echoing the collected data
// echo "User ID: " . $pms_userid . "<br>";
// echo "Purchases: " . $pms_purchases . "<br>";
// echo "Assign: " . $pms_assign . "<br>";
// echo "Approver: " . $pms_approver . "<br>";
// echo "User: " . $pms_user . "<br>";





if ($usf_image == false) {
    $usf_image = $usf_img;
}




$sql = "UPDATE tbl_users SET 
        us_type = '$usf_role'
        WHERE us_id = $usfId";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data updated successfully.');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// Prepare and execute the SQL query
$sql = "UPDATE tbl_userprofiles SET 
        usf_firstname = '$usf_firstname', 
        usf_lastname = '$usf_lastname',
        usf_gender = '$usf_gender',
        usf_dob = '$usf_dob',
        usf_phone = '$usf_phone', 
        usf_image = '$usf_image',
        usf_address = '$usf_address'
        WHERE usf_us_id = $usfId";

if ($conn->query($sql) === TRUE) {
    $mas = 1;
    echo "<script>alert('Data updated successfully.');</script>";
    // header("location:../form_user_list.php?massage=".$mas);
} else {
    $mas = 0;
    echo "Error: " . $sql . "<br>" . $conn->error;
    // header("location:../form_user_list.php?massage=".$mas);
}
// Close the database connection

// if($mas == 1){
    $sql = "UPDATE tbl_permission SET 
        pms_purchases = '$pms_purchases', 
        pms_assign = '$pms_assign',	
        pms_approver = '$pms_approver',	
        pms_user = '$pms_user'
        WHERE pms_userid = $pms_userid";

    if ($conn->query($sql) === TRUE) {
        $mas = 1;
        echo "<script>alert('Data updated successfully.');</script>";
        header("location:../form_user_list.php?massage=".$mas);
    } else {
        $mas = 0;
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("location:../form_user_list.php?massage=".$mas);
    }
// }


$conn->close();
?>
