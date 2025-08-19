
<?php
    session_start();
    include("../config/connection.php");
?>

<?php
    include("../config/connection.php");

$query = "SELECT pro_spid, pro_itemid FROM tbl_produce";
// Execute the query
$result = $conn->query($query);
// Array to store items categorized by category ID
$supplierToItems = array();
$items = array();

// Fetching data and arranging it in the desired format
while ($row = $result->fetch_assoc()) {

    $pro_spid = $row['pro_spid'];
    // echo $pro_spid;
    $pro_itemid = $row['pro_itemid'];
    $sql ="SELECT item_name FROM tbl_item WHERE item_id = $pro_itemid"; 
    $query_run = mysqli_query($conn, $sql);
            
    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $rowsp)
        { 
            $pro_itemName = $rowsp['item_name'];
        }
    }

    // Check if the category ID already exists in the array
    if (!isset($supplierToItems[$pro_spid])) {
        // If not, create a new array for this category ID
        $supplierToItems[$pro_spid] = array();
        
    }
    // Add the item ID to the array of this category ID
    $supplierToItems[$pro_spid][] = $pro_itemName;

    if (!isset($supplierToItems[$pro_itemName])) {
        $items[$pro_itemName] = array();
        $items[$pro_itemName][] = $pro_itemid;
    }

}
// Free result set
$result->free();

// Close connection
// $conn->close();


// Convert the array to a JSON object
$jsonDataSup = json_encode($supplierToItems);

// Output the JSON object
echo $jsonDataSup ."<br><br>";

// Convert the array to a JSON object
$jsonDataItem = json_encode($items);

// Output the JSON object
echo $jsonDataItem;

?>

<br><br><br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier and Item Selection</title>
</head>
<body>
<!-- 
<label for="supplier">Select Supplier:</label>
<select id="supplier" onchange="updateItems()">
    <option value="supplier1">Supplier 1</option>
    <option value="supplier2">Supplier 2</option>
    <option value="supplier3">Supplier 3</option>
</select> -->
<div class="col-md-6">
    <div class="form-group">
<br>

        <label for="slSp">អ្នកផ្គត់ផ្គង់ *</label>
        <select id="slSp" name="slSp" class="form-control choicesjs" onchange="updateItems()" style="border: 1px solid #cbcbcb;" disabled>
            <option value="" placeholder="សូមជ្រើស​រើសអ្នកផ្គត់ផ្គង់" data-errors="សូមជ្រើសរើសអ្នកផ្គត់ផ្គង់" required>សូមជ្រើសរើសអ្នកផ្គត់ផ្គង់</option>
            <?php 
                $query ="SELECT * FROM tbl_suppliers"; 
                $query_run = mysqli_query($conn, $query);
                        
                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $rowsp)
                    { 
                        ?>
                            <option value="<?= $rowsp['sp_id'];?>">  <?php $teste = $rowsp['sp_id']; echo $rowsp['sp_name'];?> </option>
                        <?php 
                    }
                }
            ?>
        </select>
        <div class="help-block with-errors"></div>
    </div>
</div>


<br><br>
<label for="item">Select Item:</label>
<select id="item" disabled>
    <!-- The available items will be dynamically populated here -->
</select>
<br>
<br>

<script>
    // Define the mapping of suppliers to items
   
    // const supplierToItems = {
    //     "<?= $teste; ?>": ["laptop", "smartphone", "camera",], "supplier2": ["shirt", "pants", "shoes",], "supplier3": ["fiction", "non-fiction", "mystery",],
    // }
    const supplierToItems = <?= $jsonDataSup; ?>

    // Define the mapping of items to their data
    const itemData = <?= $jsonDataItem; ?>
    // const itemData = {
    //     laptop: {
    //         price: "$1000",
    //         brand: "Brand X",
    //         model: "Model ABC"
    //     },
    //     smartphone: {
    //         price: "$800",
    //         brand: "Brand Y",
    //         model: "Model DEF"
    //     },
    //     camera: {
    //         price: "$1200",
    //         brand: "Brand Z",
    //         model: "Model GHI"
    //     },
    //     shirt: {
    //         price: "$50",
    //         brand: "Brand A",
    //         size: "Large"
    //     },
    //     pants: {
    //         price: "$60",
    //         brand: "Brand B",
    //         size: "32x34"
    //     },
    //     shoes: {
    //         price: "$80",
    //         brand: "Brand C",
    //         size: "US 10"
    //     },
    //     fiction: {
    //         price: "$20",
    //         author: "Author X",
    //         genre: "Fiction"
    //     },
    //     "non-fiction": {
    //         price: "$25",
    //         author: "Author Y",
    //         genre: "Non-Fiction"
    //     },
    //     mystery: {
    //         price: "$22",
    //         author: "Author Z",
    //         genre: "Mystery"
    //     }
    // };

    // Function to update the available items based on the selected supplier
    function updateItems() {
        document.getElementById("slSp").disabled = false;
        // Enable the item dropdown
        // document.getElementById("slSp").disabled = true;
        // // Enable the item dropdown

        const supplierSelect = document.getElementById("slSp");
        const itemSelect = document.getElementById("item");

        // Get selected supplier
        const selectedSupplier = supplierSelect.value;

        // Get the items corresponding to the selected supplier
        const items = supplierToItems[selectedSupplier];

        // Clear previous options
        itemSelect.innerHTML = '';

        // Add new options for the items
        items.forEach(item => {
            const option = document.createElement("option");
            option.value = item;
            option.text = item;
            itemSelect.add(option);
        });

        // Enable the item dropdown
        itemSelect.disabled = false;
       

        const itemSelectValue = document.getElementById("item");
        const selectedItem = itemSelectValue.value;

        // Get data of the selected item
        const data = itemData[selectedItem];

        // Create a message with the item data
        let message = "Item Data:\n";
        for (const key in data) {
            message += `${key}: ${data[key]}\n`;
        }

        // Display the message in an alert
        alert(message);

    }

    // Initial call to update items based on the default selected supplier
    updateItems();
</script>

</body>
</html>



<br><br>
<div class="col-md-6">
    <div class="form-group">
<br>

        <label>Teste *</label><br>
            <?php 
            $i = 1;
            $categoryOj = "";
                $query ="SELECT * FROM tbl_item"; 
                $query_run = mysqli_query($conn, $query);
                        
                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $rowsp)
                    { 
                        
                           
                          if($i == 1){
                            $itemId = $rowsp['item_categoryid'];
                            echo "$i: ".$rowsp['item_categoryid']."<br>";
                            $i++;
                          }else{
                            if($itemId === $rowsp['item_categoryid']){
                                $categoryOj = $categoryOj.'"'.$rowsp['item_id'].'", ';
                            }
                          } 
                    }
                }

                echo "Category: [". $categoryOj . ']';
            ?>
        <div class="help-block with-errors"></div>
    </div>
</div>
