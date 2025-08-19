
<?php
//     session_start();
//     include("../config/connection.php");


// // Query to select item_id and item_categoryid
// $query = "SELECT item_id, item_categoryid FROM tbl_item";

// // Execute the query
// $result = $conn->query($query);

// // Array to store items categorized by category ID
// $supplierToItems = array();

// // Fetching data and arranging it in the desired format
// while ($row = $result->fetch_assoc()) {
//     $categoryId = $row['item_categoryid'];
//     $itemId = $row['item_id'];
    
//     // Check if the category ID already exists in the array
//     if (!isset($supplierToItems[$categoryId])) {
//         // If not, create a new array for this category ID
//         $supplierToItems[$categoryId] = array();
//     }
    
//     // Add the item ID to the array of this category ID
//     $supplierToItems[$categoryId][] = $itemId;
// }



// // Query to select item_id and item_categoryid
// $query = "SELECT pro_spid, pro_categoryid FROM tbl_produce";

// // Execute the query
// $result = $conn->query($query);

// // Array to store items categorized by category ID
// $supplierTocCategory = array();

// // Fetching data and arranging it in the desired format
// while ($row = $result->fetch_assoc()) {
//     $spId = $row['pro_spid'];

//     // If not, create a new array for this category ID
//     $supplierTocCategory[$spId] = array();
//     $supplierTocCategory[$spId][] = $supplierToItems;
   
// }

// // Free result set
// $result->free();

// // Close connection
// $conn->close();

// // Now $supplierToItems contains the desired data structure
// // You can use var_dump($supplierToItems) to see the contents



// // Assuming $supplierToItems array contains the desired data structure
// // Convert the array to a JSON object
// $jsonData = json_encode($supplierTocCategory);

// // Output the JSON object
// echo $jsonData."<br><br>";

// // Convert the array to a JSON object
// $jsonData = json_encode($supplierToItems);

// // Output the JSON object
// echo $jsonData;

?>








<?php
    session_start();
    include("../config/connection.php");

$query = "SELECT pro_spid, pro_itemid FROM tbl_produce";
// Execute the query
$result = $conn->query($query);
// Array to store items categorized by category ID
$supplierToItems = array();

// Fetching data and arranging it in the desired format
while ($row = $result->fetch_assoc()) {

    $categoryId = $row['pro_spid'];
    $itemId = $row['pro_itemid'];
    
    // Check if the category ID already exists in the array
    if (!isset($supplierToItems[$categoryId])) {
        // If not, create a new array for this category ID
        $supplierToItems[$categoryId] = array();
    }
    // Add the item ID to the array of this category ID
    $supplierToItems[$categoryId][] = $itemId;
}

?>


<?php

// Query to select item_id and item_categoryid
$query = "SELECT pro_spid, pro_itemid FROM tbl_produce";

// Execute the query
$result = $conn->query($query);

// Array to store items categorized by category ID
$supplierTocCategory = array();

// Fetching data and arranging it in the desired format
while ($row = $result->fetch_assoc()) {
    $spId = $row['pro_spid'];

    // If not, create a new array for this category ID
    $supplierTocCategory[$spId] = array();
    $supplierTocCategory[$spId][] = $supplierToItems;
   
}

// Free result set
$result->free();

// Close connection
$conn->close();

// Now $supplierToItems contains the desired data structure
// You can use var_dump($supplierToItems) to see the contents

?>





<?php

// Assuming $supplierToItems array contains the desired data structure
// Convert the array to a JSON object
$jsonData = json_encode($supplierTocCategory);

// Output the JSON object
echo $jsonData."<br><br>";

// Convert the array to a JSON object
$jsonData = json_encode($supplierToItems);

// Output the JSON object
echo $jsonData;

?>








