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
                                <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                                </svg>
                                ទម្រង់បញ្ជាទិញ៖
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
                                    <input type="number" id="numinUnit" name="numinUnit" min="0" class="form-control" required
                                    placeholder="សូមបញ្ចូលចំនួនក្នុងមួយឯកតា" data-errors="សូមបញ្ចូលចំនួនក្នុងមួយឯកតា" style="border: 1px solid #cbcbcb;">
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
                                                <!-- <th>ឯកតា</th> -->
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
                                    <button type="button" class="btn btn-primary mr-2 disabled" onclick="saveDataToDatabase()">បន្ថែមថ្មី</button>
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
                                        var spValue = document.getElementById("slSp").value;
                                        
                                        if(spValue == 0){
                                            document.getElementById("item").disabled = true;
                                            document.getElementById("unit").disabled = true;
                                            document.getElementById("numQty").disabled = true;

                                        }else{
                                            document.getElementById("item").disabled = false;
                                            document.getElementById("unit").disabled = false;
                                            document.getElementById("numQty").disabled = false;
                                        }
                                        document.getElementById("slSp").disabled = false;
                                        // disabledSp();
                                        
                                        var supplierSelect = document.getElementById("slSp").value;
                                        // alert(supplierSelect);
                                        // Get the items corresponding to the selected supplier
                                        var items = supplierToItems[supplierSelect];
                                        // alert(supplierSelect + " " + items);
                                        if(items == undefined){
                                            // document.getElementById("item").disabled = true;
                                            document.getElementById("unit").disabled = true;
                                            document.getElementById("numinUnit").disabled = true;
                                            document.getElementById("numQty").disabled = true;
                                        }else{
                                            // document.getElementById("item").disabled = false;
                                            document.getElementById("unit").disabled = false;
                                            document.getElementById("numQty").disabled = false;
                                        }

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

                                    function disabledSp(){
                                        
                                        document.getElementById("slSp").disabled = true;

                                        //  Enable the item dropdown
                                        var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
                                        var rows = table.getElementsByTagName('tr');
                                        // alert(rows.length);
                                        if(rows.length <= 0){
                                            document.getElementById("slSp").disabled = false;
                                            // var supplierSelect = document.getElementById("slSp");
                                            
                                        }
                                    }
                                    
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
        // var units = valueUnit.replace(/\D/g, ''); 
       
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
                $.post("purchase/return_itemid.php", { itemIds: itemId }, function(result) {
                
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
                document.getElementById('itemForm').reset();
                document.getElementById("slSp").value = spplier;
            }
            
        }
        
    }
   
    function deleteProduct(button) {
        
        var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        updateGrandTotal();
        disabledSp();
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
            url: 'purchase/add_purchase.php',
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
