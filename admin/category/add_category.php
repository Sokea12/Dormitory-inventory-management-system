<?php
    // timezone
    date_default_timezone_set("Asia/Bangkok");
    
    // Establish MySQL database connection
    include("../../config/connection.php");

    function uploadImage($file, $uploadDir)
    {
        $uploadedFile = $uploadDir . "img-" . $_FILES["fileIcon"]["name"];

        $imageFileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
        $allowedImageTypes = array("jpg", "jpeg", "png", "gif");

        if (in_array($imageFileType, $allowedImageTypes)) {
            if (move_uploaded_file($file["tmp_name"], $uploadedFile)) {
                return  "img-" . $_FILES["fileIcon"]["name"];
            } else {
                return "Error uploading file.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
            return false; // Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.
        }
    }
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        // Get form data
        $category_name = $_POST["textCategoryName"];
        // $category_code = $_POST["txtcategorycode"];
        $category_dsc = $_POST["textareaDescription"];
        $category_image = "img-" . $_FILES["fileIcon"]["name"];
        $category_status = 1;
        $category_create = date("Y-m-d H:i:s");
        // Handle file upload
        $uploadDir = "../../assets/images/categorys/";
        $category_image = uploadImage($_FILES["fileIcon"], $uploadDir);
        if ($category_image == false) {
            $category_image = "img-defaultimage.png";
        }
         

        $maxCode = 0;
        $query ="SELECT * FROM tbl_category";
        $query_run = mysqli_query($conn, $query);
        
        $categoryCodes = 0;
        $mas = 1;
        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $row)
            {
                $categoryCodes = $row['category_id'];
                if($category_name == $row['category_name']){
                    $mas = 0;
                    break;
                }
            }
        }
        $categoryCodes++;
        $maxCode+= $categoryCodes;
        $categoryCode = 'C-' . str_pad($maxCode, 5, '0', STR_PAD_LEFT);

        
        

        $query ="SELECT * FROM tbl_category WHERE category_status = 1"; 
        $query_run = mysqli_query($conn, $query);
                
        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $row)
            { 

            }
        }

    if($mas != 0){
        // Assuming $category_id is the ID of the category you want to update
        $sql = "INSERT INTO tbl_category (
                category_id, 
                category_name,
                category_code,
                category_dsc,
                category_image,
                category_status,
                category_created_date
            ) VALUES (
                null,
                '$category_name',
                '$categoryCode',
                '$category_dsc',
                '$category_image',
                '$category_status',
                '$category_create'
            )";

            if ($conn->query($sql) === TRUE) {
                $mas = 1;
            } else {
                $mas = 0;
                
            }
        }
    }
    // $conn->query($sql);
    $conn->close();
    header("location:../form_category_list.php?massage=".$mas);
?>
