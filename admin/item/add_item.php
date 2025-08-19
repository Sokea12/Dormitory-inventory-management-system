<?php
    // timezone
    date_default_timezone_set("Asia/Bangkok");

    // Establish MySQL database connection
    include("../../config/connection.php");

    function uploadImage($file, $uploadDir)
    {
        $uploadedFile = $uploadDir . "img-" . basename($_FILES["fileIcon"]["name"]);

        $imageFileType = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
        $allowedImageTypes = array("jpg", "jpeg", "png", "gif");

        if (in_array($imageFileType, $allowedImageTypes)) {
            if (move_uploaded_file($file["tmp_name"], $uploadedFile)) {
                return "img-" . basename($_FILES["fileIcon"]["name"]);
            } else {
                return "Error uploading file.";
            }
        } else {
            return "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from the form
        $item_categoryid = mysqli_real_escape_string($conn, $_POST['slCategoryItemId']);
        $item_name = mysqli_real_escape_string($conn, $_POST['textItemName']);
        $item_dsc = mysqli_real_escape_string($conn, $_POST['textareaDescription']);
        $item_retailprice = mysqli_real_escape_string($conn, $_POST['item_retailprice']);
        $item_wholesaleprice = mysqli_real_escape_string($conn, $_POST['item_wholesaleprice']);
        $mas = 0;
        $itemname = "";
        $query ="SELECT item_name FROM tbl_item WHERE item_status = '1'"; 
            $query_run = mysqli_query($conn, $query);
                    
            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $rowi)
                { 
                    $itemname = $rowi['item_name'];
                    if($item_name == $itemname){
                        break;
                    }
                }
            }

        if($item_name != $itemname){
            // Generate item code
            $query = "SELECT MAX(item_id) AS max_id FROM tbl_item";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $maxCode = $row['max_id'] + 1;
            $itemCode = 'I-' . str_pad($maxCode, 5, '0', STR_PAD_LEFT);

            // Handle file upload
            $uploadDir = "../../assets/images/categorys/";
            $item_image = uploadImage($_FILES["fileIcon"], $uploadDir);
            if ($item_image === false) {
                $item_image = "img-defaultimage.png"; // Default image if upload fails
            }

            if (isset($_POST["ilocation_locationid"]) && !empty($_POST["ilocation_locationid"])) {
                $stock_locationid = $_POST["ilocation_locationid"];
                
                $item_status = 1;
                $ilocation_id = 1;
                $item_created_date = date("Y-m-d");
                $stock_itemid = 0;
                $stock_itemavailable = 0;


                $sql = "INSERT INTO tbl_item (item_id, item_categoryid, item_name, item_code, item_retailprice, item_wholesaleprice, item_dsc, item_image, item_status, item_created_date)
                    VALUES (null, '$item_categoryid', '$item_name', '$itemCode', '$item_retailprice', '$item_wholesaleprice', '$item_dsc', '$item_image', '$item_status', '$item_created_date')";

                // Execute SQL statement
                if ($conn->query($sql) === TRUE) {
                    
                    $stock_itemid = mysqli_insert_id($conn);

                    foreach ($stock_locationid as $ilocationid) {
                        $stock_locationid = $ilocationid;

                        // echo "ilocation_itemid :" . $ilocation_itemid." ilocation_locationid: " .$ilocation_locationid."<br>";

                        $sql = "INSERT INTO tbl_stocks(stock_id, stock_itemid, stock_locationid, stock_itemavailable, stock_date)
                            VALUES (null, '$stock_itemid', '$stock_locationid', '$stock_itemavailable', '$item_created_date')";
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

            // Redirect after processing
            if(isset($_GET['category_id'])) {
                $category_id = $item_categoryid;
                $query ="SELECT * FROM tbl_category WHERE category_id = $category_id AND category_status = '1'"; 
                $query_run = mysqli_query($conn, $query);
                        
                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                    { 
                        $category_name = $row['category_name'];
                        $category_code = $row['category_code'];
                        $category_dsc = $row['category_dsc'];
                        $category_created_date = $row['category_created_date'];
                        $category_image = $row['category_image'];
                    }
                }
                $massage = urlencode($mas);
            
                header("location:../form_category_detail.php?category_id=$category_id&category_name=$category_name&category_code=$category_code&category_dsc=$category_dsc&category_created_date=$category_created_date&category_image=$category_image&massage=$massage");
            } else {
                $massage = urlencode($mas);
                header("location:../form_item_list.php?massage=$massage");
            }
            
        }else{
            $massage = urlencode($mas);
            // echo "Equle";
            header("location:../form_item_list.php?massage=$massage");
        }
        exit(); // Ensure no further execution after redirection

        // Close connection
        $conn->close();


    }
?>
