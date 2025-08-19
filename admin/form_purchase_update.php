<?php
    session_start();
    include("../config/connection.php");
    include("main_header.php");
?>

    <form id="itemForm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card pt-2 pl-3 pr-3 pb-3">

                        <div class="tab-content" id="myTabContent-2">
                           
                        <div class="row">
                            <div class="col-md-12">
                            <h4 class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 4 20 20"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                </svg>
                                ធ្វើបច្ចុប្បន្នភាពនៃការបញ្ជាទិញ៖
                            </h4>
                            <hr>
                            </div>
                            <input type="hidden" name="hiddenItemId" id="hiddenItemId" value="">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slSp">អ្នកផ្គត់ផ្គង់ *</label>
                                    <select id="slSp" name="slSp" class="form-control" onchange="updateItems()" style="border: 1px solid #cbcbcb;" disabled>
                                        <option value="0" placeholder="សូមជ្រើស​រើសអ្នកផ្គត់ផ្គង់" data-errors="សូមជ្រើសរើសអ្នកផ្គត់ផ្គង់" required>សូមជ្រើសរើសអ្នកផ្គត់ផ្គង់</option>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item">សម្ភារៈ *</label>
                                    <div style="border: 1px solid #cbcbcb; border-radius: 5px;">
                                        <select id="item" name="item" class="form-control" onchange="updateUnit()" disabled>
                                            <!-- The available items will be dynamically populated here -->
                                        </select>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>បរិមាណ *</label>
                                    <input type="number" id="numQty" name="numQty" min="0" class="form-control"
                                    placeholder="សូមបញ្ចូលបរិមាណសម្ភារៈ" data-errors="សូមបញ្ចូលបរិមាណសម្ភារៈ" required style="border: 1px solid #cbcbcb;">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="unit">ឯកតា *</label>
                                    <input type="hidden" id="hiddenunit" name="hiddenunit" min="0" class="form-control">
                                    <select id="unit" name="unit" class="form-control" onchange="unitValues()" style="border: 1px solid #cbcbcb;" disabled>
                                        <option value="0" placeholder="សូមជ្រើស​រើសអ្នកផ្គត់ផ្គង់" data-errors="សូមជ្រើសរើសអ្នកផ្គត់ផ្គង់" required>សូមជ្រើសរើសអ្នកផ្គត់ផ្គង់</option>
                                        <?php 
                                            $query ="SELECT * FROM tbl_unit"; 
                                            $query_run = mysqli_query($conn, $query);
                                                    
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                { 
                                                    ?>
                                                        <option value="<?= $row['unit_code']." ".$row['unit_name'];?>"> <?= $row['unit_name'];?> </option>
                                                    <?php 
                                                }
                                            }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ចំនួនសម្ភារៈ/ឯកតា </label>
                                    <input type="number" id="numinUnit" name="numinUnit" min="0" class="form-control"
                                    placeholder="សូមបញ្ចូលឯកតានៃសម្ភារៈ" data-errors="សូមបញ្ចូលឯកតានៃសម្ភារៈ" required style="border: 1px solid #cbcbcb;">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div id="table" class="table-editable">
                                    <span class="table-add float-right mb-3 mr-2">
                                        <button type="submit" class="btn btn-sm bg-primary" onclick="addItemToTable()">បន្ថែមថ្មី</button>
                                    </span>
                                    <span class="table-add float-left pt-3 mb-0 mr-2">
                                        <h6>សម្ភារៈ៖</h6>
                                    </span>
                                    <table id="productTable" class="table table-bordered table-responsive-md table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>សកម្មភាព</th>
                                                <th hidden>ItemId</th>
                                                <th>សម្ភារៈ</th>
                                                <th>ប្រភេទ</th>
                                                <th>បរិមាណ</th>
                                                <th>តម្លៃ</th>
                                                <th>សរុប</th>
                                            </tr>
                                        </thead>
                                        <tbody id="itemTableBody"></tbody>
                                        <tr>
                                            <td colspan= 5 style="text-align: right;">
                                                សរុប
                                            </td>
                                            <td id="grandTotal">0៛</td>
                                        </tr>
                                        
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>ការពិពណ៌នា៖</label>
                                    <textarea name="textareaDsc" id="textareaDsc" class="form-control" rows="2" placeholder="សូមបញ្ចូលការពិពណ៌នា" data-errors="សូមបញ្ចូលការពិពណ៌នា" style="border: 1px solid #cbcbcb;"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkbox d-inline-block mb-12">
                                    <span class=""> <input type="checkbox" class="checkbox d-inline-block mr-2" id="checkboxDraft" style="width: 20px;"></span>
                                    <span class="table-add float-right mb-4 mr-4"> <label for="checkbox1">ជូនដំណឹងដល់អ្នកផ្គត់ផ្គង់តាមអ៊ីមែល</label></span>
                                    </div> <br>
                                    <a type="button" href="form_purchease_list.php" class="btn btn-secondary mr-2">បោះបង់</a>
                                    <button type="button" class="btn btn-primary mr-2 disabled" onclick="saveDataToDatabase()">រក្សាទុក</button>
                                    <button type="reset" class="btn btn-danger">កំណត់ឡើងវិញ</button>
                                </div>
                            </div> 
                            <div class="col-md-12">

                                <?php
                                    include("../config/connection.php");

                                $query = "SELECT pro_spid, pro_itemid FROM tbl_produce";
                                // Execute the query
                                $result = $conn->query($query);
                                // Array to store items categorized by category ID
                                $supplierToItems = array();
                                $items = array();
                                $i = 0;
                                $j = 0;           
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
                                // echo $jsonDataSup ."<br><br>";

                                // Convert the array to a JSON object
                                $jsonDataItem = json_encode($items);

                                // Output the JSON object
                                // echo $jsonDataItem;

                                ?>
                               
                                <script>
                                    
                                    var supplierToItems = <?= $jsonDataSup; ?>
                                    // Define the mapping of items to their data
                                    var itemData = <?= $jsonDataItem; ?>
                                    

                                    // Function to update the available items based on the selected supplier
                                    function updateItems() {
                                       
                                        document.getElementById("item").disabled = false;
                                        document.getElementById("slSp").value ="<?=$_GET['or_supplier_id']?>";
                                        document.getElementById("numinUnit").disabled = true;
                                        document.getElementById("numQty").disabled = false;
                                        document.getElementById("unit").disabled = false;
                                        
                                        
                                        var supplierSelect = document.getElementById("slSp").value;
                                        var items = supplierToItems[supplierSelect];
                                        var itemSelect = document.getElementById("item");
                                        // Clear previous options
                                        itemSelect.innerHTML = '';

                                        // Add new options for the items
                                        items.forEach(item => {
                                            var option = document.createElement("option");
                                            option.value = item;
                                            option.text = item;
                                            itemSelect.add(option);
                                        });

                                        // itemSelect.disabled = false;

                                    }
                                    // Initial call to update items based on the default selected supplier
                                    updateItems();
                                    
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Wrapper End-->
    </div>

    <?php
    include("main_foother.php");
    ?>

<script>
    
    function unitValues(){
        var valueUnit = document.getElementById("unit").value;
        var valueUnit = valueUnit.replace(/\D/g, ''); 
        // alert(valueUnit);

        if(valueUnit != 0){
            document.getElementById("numinUnit").disabled = false;
        }else{
            document.getElementById("numinUnit").value = "";
            document.getElementById("numinUnit").disabled = true;
        }
        
    }
    function addItemToTable() {

        event.preventDefault();

        var itemSelectValue = document.getElementById("item");
        var selectedItem = itemSelectValue.value;
        // Get data of the selected item
        var data = itemData[selectedItem];
        // Create a message with the item data
        var item_Id;
        for (const key in data) {
            item_Id = `${data[key]}`;
        }
        
        // Display the message in an alert
        // alert(" " + item_Id);

        // Retrieve form data
        var supplierId = document.getElementById("slSp").value;
        var itemId = item_Id;
        
        
        var unit = document.getElementById("unit").value;
        var numinunit = document.getElementById("numinUnit").value;
        var quantity = document.getElementById("numQty").value;
        var description = document.getElementById("textareaDsc").value;

        // alert(itemId + " " + unit + " " + numinunit + " " + quantity + " " + description);

        if(supplierId != "" && itemId != 0 && itemId != undefined  && quantity != "" && unit != ""){
           
            var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
            var rows = table.getElementsByTagName('tr');
            var cheackItemIdi = true;

            for (var i = 0; i < rows.length; i++) {

                var cells = rows[i].getElementsByTagName('td');
                var itemIdinrow = parseFloat(cells[1].innerHTML);
                if(itemIdinrow == itemId){
                    cheackItemIdi = false;
                    break;
                }
            }
            if(cheackItemIdi == true){
                // alert(item);
                // Use AJAX to fetch the item name asynchronously
                $.post("purchase/add_to_purchase.php", { itemIds: itemId }, function(result) {
                
                    // alert(result);

                    // Get form values
                    var selectItem = result;
                    // alert(selectItem);
                    var selectNameItem = selectItem.split(' ')[0]; // Get the second part (item name) // Output: "String"
                    // alert("ItemName :" + selectNameItem);
                    var item_retailprice = selectItem.split(' ')[1]; // Get the second part (item name) // Output: "String"
                    // alert("itemPrice :" + itemPrice);
                    var item_wholesaleprice = selectItem.split(' ')[2]; // Get the second part (item name) // Output: "String"
                    // alert("itemPrice :" + itemPrice);
                    var selectNameCategory = selectItem.split(' ')[3]; // Get the second part (item name) // Output: "String"
                    // alert("CategoryName :" + selectNameCategory);
                    var slunit = unit.split(' ')[1];
                    if(slunit == undefined){slunit = ""; }
                    var itemPrice = 0;

                    // alert(itemId + " " + slunit + " " + numinunit + " " + quantity + " " + description);

                    if(numinunit != ""){
                        // numinunit => ចំនួនសម្ភារៈសម្រាប់យកទុកក្នងឃ្ឡាំង
                        // alert("numinunit: "+ numinunit);
                        var amount = quantity * item_wholesaleprice;
                        itemPrice = item_wholesaleprice;
                    }else{
                        var amount = quantity * item_retailprice;
                        itemPrice = item_retailprice;
                    }

                    // Create a new row for the table
                    var newRow = document.createElement("tr");

                    // Add cells to the row
                    newRow.innerHTML = `
                        <td>
                        <button type="button" class="btn delete-button bg-danger-light btn-sm my-0" onclick="deleteProduct(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                        </td>
                        <td hidden>${itemId}</td>
                        <td>${selectNameItem}</td> 
                        <td>${selectNameCategory}</td>
                        <td>${quantity + " " + slunit}</td>
                        <td hidden>${quantity}</td>
                        <td>${itemPrice}</td>
                        <td>${amount}</td>
                        
                    `;

                    // Append the new row to the table body
                    document.getElementById("itemTableBody").appendChild(newRow);
                    updateGrandTotal();
                    disabledSp();
                });

                var spplier = document.getElementById("slSp").value;
                // Clear form fields
                var description = document.getElementById("textareaDsc").value;
                document.getElementById('itemForm').reset();
                document.getElementById("slSp").value = spplier;
                document.getElementById("textareaDsc").value = description;

            }
            
        }
        
    }
   
    function deleteProduct(button) {
        
        var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        updateGrandTotal();
    }
    
    function updateGrandTotal() {
        var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
        var rows = table.getElementsByTagName('tr');
        var grandTotal = 0;

        for (var i = 0; i < rows.length; i++) {

            var cells = rows[i].getElementsByTagName('td');
            grandTotal += parseFloat(cells[7].innerHTML);
        }

        document.getElementById('grandTotal').innerHTML = grandTotal + "៛";
    }



    function saveDataToDatabase() {

        var ordorid = '<?= $_GET['or_id']; ?>';
        var orbuyer = document.getElementById("hiddenuserfrofile").value;
        var orsupplierId = document.getElementById("slSp").value;
        var orAmounts = document.getElementById('grandTotal').innerHTML;
         // Use a regular expression to extract numbers
        var Amount = orAmounts.replace(/\D/g, ''); 
        // Convert the extracted numbers to a new variable
        var orAmount = parseInt(Amount);
        console.log(orAmount); // Output: 120
        // alert("Item mun :" + orAmount);
        var orRemark = document.getElementById('textareaDsc').value;  
        const or_draft = document.querySelector('#checkboxDraft').checked;
        // alert(or_draft);

        // alert(orbuyer + " " + orsupplierId + " " + orAmount + " " + orRemark);

        var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
        var rows = table.getElementsByTagName('tr');
        var data = [];

       
        // Use JavaScript to get the current date and time
        var currentDate = new Date();
        var rqDatetime = currentDate.toISOString().slice(0, 19).replace("T", " ");

        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');

            // alert(cells[1].innerHTML + " " + cells[2].innerHTML + " " + cells[3].innerHTML + " " + cells[4].innerHTML + " " + cells[5].innerHTML + " " + cells[6].innerHTML + " " + cells[7].innerHTML + " " + cells[8].innerHTML);

            data.push({
                ord_orid: parseInt(ordorid),
                or_buyer_id: parseInt(orbuyer),
                or_supplier_id: parseInt(orsupplierId),
                ord_item_id: parseInt(cells[1].innerHTML),
                ord_unit: cells[4].innerText,
                ord_quantity: parseInt(cells[5].innerHTML),
                ord_price: parseInt(cells[6].innerHTML), 
                ord_amount: parseInt(orAmount),
                ord_remarks: orRemark,
                or_draft: or_draft,
                });
        }
        // alert("Data to be sent to the server:\n" + JSON.stringify(data, null, 2));

        // Prepare data for sending to the server
        var requestData = {
            requestData: JSON.stringify(data)
        };

        // Make an AJAX request to the PHP script
        $.ajax({
            type: 'POST',
            url: 'purchase/update_purchase.php',
            data: requestData, 
            success: function(response) {
                
                // Handle the response from the server
                var message = response;
                // alert(message);
                if(message == 0 || message == 1){
                    window.location.href = "form_purchease_list.php?message=" + message;
                }else{
                    window.location.href = "form_purchase_email.php?or_id=" + message;
                }
                
                console.log(response);
            },
            error: function(error) {
                // Handle errors
                alert('Error saving data!');
                console.error(error);
            }
        });

    }

    </script>

<?php
    $grandTotal = 0;
    $ord_remarks = "";
    $ord_orid = $_GET['or_id']; 
    $query ="SELECT * FROM tbl_order_detail WHERE ord_orid  = $ord_orid"; 
    $query_run = mysqli_query($conn, $query);
    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
        ?>
        <tr>
        <?php
            $amount = 0;
            $item_id = $row['ord_item_id']; 
            $query ="SELECT item_name, item_categoryid FROM tbl_item WHERE item_id  = $item_id AND item_status = 1"; 
            $query_run = mysqli_query($conn, $query);
                    
            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $rowi)
                {
                    $category_id  = $rowi['item_categoryid']; 
                    $query ="SELECT category_name FROM tbl_category WHERE category_id   = $category_id AND category_status = 1"; 
                    $query_run = mysqli_query($conn, $query);
                            
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $rowc)
                        {
                            ?>
                                <!-- data -->
                        <?php

                        }
                    }

                }
                
            }
            $itemId = $row['ord_item_id']; 
            $selectNameItem = $rowi['item_name'];
            $selectNameCategory = $rowc['category_name'];
            $quantity = $row['ord_quantity'];
            $ord_price = $row['ord_price'];
            $unit = $row['ord_unit'];
            $amount += $row['ord_quantity'] * $row['ord_price'];
            $itemprice = $row['ord_remarks'];

        ?>

        <script>
            
            var dcs = '<?=$itemprice?>';
            document.getElementById("textareaDsc").value = dcs;

            // alert(dcs);
            addDataTobale('<?=$itemId;?>', '<?=$selectNameItem;?>', '<?=$selectNameCategory;?>', '<?=$unit;?>', '<?=$quantity;?>', '<?= $ord_price;?>', '<?=$amount;?>');
            
            function addDataTobale(itemId, selectNameItem, selectNameCategory, unit, quantity, itemprice, amount){
                    // Create a new row for the table
                    var newRow = document.createElement("tr");

                    // Add cells to the row
                    newRow.innerHTML = `
                        <td>
                        <button type="button" class="btn delete-button bg-danger-light btn-sm my-0" onclick="deleteProduct(this)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                        </td>
                        <td hidden>${itemId}</td>
                        <td>${selectNameItem}</td> 
                        <td>${selectNameCategory}</td>
                        <td>${unit}</td>
                        <td hidden>${quantity}</td>
                        <td>${itemprice}</td>
                        <td>${amount}</td>
                        
                    `;

                    // Append the new row to the table body
                    document.getElementById("itemTableBody").appendChild(newRow);
                    updateGrandTotal();

                var spplier = document.getElementById("slSp").value;
                // Clear form fields
                var description = document.getElementById("textareaDsc").value;
                document.getElementById('itemForm').reset();
                document.getElementById("slSp").value = spplier;
                document.getElementById("textareaDsc").value = description;

            }
        </script>
            
        <?php
        }
    }
?>
