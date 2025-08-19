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

if ($usf_image == false) {
    $usf_image = "img-defaultimage.png";
}


// Retrieve form data
$textFname = $_POST['textFname'];
$textLname = $_POST['textLname'];
$textPhone = $_POST['textPhone'];
$slGender = $_POST['slGender'];
$dateDob = $_POST['dateDob'];
$email = $_POST['email'];
$textPassword = $_POST['textPassword'];
$slRole = $_POST['slRole'];
$textareaAddress = $_POST['textareaAddress'];
$checkboxSentemailUser = $_POST['checkboxSentemailUser']; // This will be 'checked' or 'unchecked'

// Prepare data for insertion
$usf_firstname = $textFname; 
$usf_lastname = $textLname;
$usf_gender = $slGender;
$usf_dob = $dateDob;
$usf_phone = $textPhone; 
$usf_image = $usf_image;
$usf_address = $textareaAddress;
$usf_created_date = $us_created_date;

// Prepare data for insertion
$us_username = $textFname." ".$textLname; // Assuming email will be the username
$us_email = $email;
$us_password = $textPassword;
$us_type = $slRole;
$us_status = 1;

$pdo = new PDO('mysql:host=localhost;dbname=dms_db', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get the current highest code from the database
$stmt = $pdo->prepare('SELECT MAX(SUBSTRING_INDEX(us_id, "-", -1)) AS max_code FROM tbl_users');
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$maxCode = $result['max_code'];
$maxCode+= 1;
// Generate the new code
// $newCode = 'R-' . str_pad($maxCode, 5, '0', STR_PAD_LEFT);
$usf_id = str_pad($maxCode, 5, '0', STR_PAD_LEFT);


$check = true;
$session = false;
$i = 0;
$query ="SELECT * FROM tbl_users"; 
    $query_run = mysqli_query($conn, $query);
            
    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
            if($us_email == $row['us_email'] || $us_password == $row['us_password']){
                $check = false;
                break;
            }
        }
    }

if($check != false){

    // SQL query to insert data into tbl_user table
    $sql = "INSERT INTO tbl_users (us_id, us_username, us_email, us_password, us_type, us_status, us_created_date)
    VALUES (null, '$us_username', '$us_email', '$us_password', '$us_type', '$us_status', '$us_created_date')";

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        $session = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $mas = 0;
        header("location:../form_user_list.php?massage=".$mas);
    }


}else{
    echo "Duplicate Email or Password !";
    $mas = 0;
    header("location:../form_user_list.php?massage=".$mas);
}

if($session != false){
    $sqly = "INSERT INTO tbl_userprofiles (usf_id, usf_us_id, usf_firstname, usf_lastname, usf_gender, usf_dob, usf_phone, usf_image, usf_address, usf_created_date)
        VALUES (null, '$usf_id', '$usf_firstname', '$usf_lastname', '$usf_gender', '$usf_dob', '$usf_phone', '$usf_image', '$usf_address', '$usf_created_date')";
        // Execute SQL query
        if ($conn->query($sqly) === TRUE) {
            echo "New record created successfully";
            $session = true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}
if($session != false){
    $sqly = "INSERT INTO tbl_permission (pms_id, pms_userid, pms_purchases, pms_request, pms_stocks, pms_assign, pms_reprts, pms_category, pms_item, pms_approver, pms_user, pms_supplies, souto_created_date)
        VALUES (null, '$usf_id', '1', '0', '1', '0', '0', '1', '1', '1', '0', '1', '$usf_created_date')";
    if ($conn->query($sqly) === TRUE) {
        echo "New record created successfully";
        $mas = 1;
        header("location:../form_user_list.php?massage=".$mas);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// Close connection
$conn->close();

?>
