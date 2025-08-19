<?php
// Establish MySQL database connection
include("connection.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Generate a random ID (for example, a 10-character alphanumeric ID)
    $item_id = substr(str_shuffle("0123456789"), 0, 5);
    $item_code = $_POST["txtitme_code"];
    $item_name = $_POST["txtitme_name"];
    $item_category = "food";
    $item_price = $_POST["txtitme_price"];
    $item_quantity = $_POST["txtitme_quantity"];
    $item_image = "image";
    $item_last_update_time = date("Y-m-d H:i:s");
    

    // Insert data into the "users" table // product_id	product_code	product_name	product_category	product_price	product_quantity	product_iteme	last_update_time	

    $sql = "INSERT INTO product_details (product_id, product_code, product_name, product_category, product_price, product_quantity, product_iteme, last_update_time) 
    VALUES ('$item_id', '$item_code', '$item_name', '$item_category', '$item_price', '$item_quantity', '$item_image', '$item_last_update_time')";

    if ($conn->query($sql) === TRUE) {
        header("location: ../admin/page_list_product.php");
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();

}



?>

