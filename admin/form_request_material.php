<?php
    session_start();
    include("../config/connection.php");
    include("main_header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<head>
    <style>
       
        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: calc(100% - 18px);
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 16px;
            display: inline-block;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 16px;
        }

        button {
            background-color: #5bc0de;
            color: #fff;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 8px;
        }
        

        /* Hide the ID, Name, and Price columns */
        
        
        th:nth-child(2),
        td:nth-child(2),
        td:nth-child(4),
        th:nth-child(4) {
            display: none;
        } 
    </style>
</head>
<body>

    <form id="addProductForm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="modal-header">
                            <h4 class="modal-title" id="titleItem">Material Requst From</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="hiddenItemId" id="hiddenItemId" value="">
                                <div class="col-md-3">  
                                    <div class="form-group">
                                        <label for="item">Select Item:</label>
                                        <select id="selectItem" name="selectItem" class="form-control" onchange="showSelectedItem()">
                                            <?php
                                                $query = "SELECT * FROM tbl_item";
                                                $query_run = mysqli_query($conn, $query);

                                                if (mysqli_num_rows($query_run) > 0) {
                                                    foreach ($query_run as $row) {

                                                        $query ="SELECT * FROM tbl_category WHERE category_id = '$row[category_id]'";
                                                        $query_run = mysqli_query($conn, $query);
                                                        if(mysqli_num_rows($query_run) > 0)
                                                        {
                                                            foreach($query_run as $rows)
                                                            {
                                                            
                                            ?>
                                                <option value="<?= $row['id'] . ',' . $row['item_name'] . ',' . $row['category_id'] . ',' . $rows['category_name']; ?>"><?= $row['item_name']; ?></option>
                                            <?php
                                                            }
                                                        }
                                                $itemId = $row['item_id'];

                                                    }
                                                }
                                            ?>
                                            <option value="'' , addNewItem">Add New Item</option>
                                            <!-- You can add more existing items or options as needed -->
                                        </select>

                                        <!-- Input field for new item -->
                                        <input type="text" id="newItem" name="newItem" class="form-control" placeholder="Enter new item" style="display: none;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="category">Select Category:</label>
                                        <!-- disabled -->
                                        <select id="category" name="category" class="form-control" onchange="showSelectedCategory()" >
                                            <?php
                                            if(isset($_GET['cagegoryId'])){
                                                $code = $_GET['cagegoryId'];
                                                echo $code;
                                                $query ="SELECT * FROM tbl_category WHERE category_id = '$code'";
                                            }else{
                                                $query = "SELECT * FROM tbl_category";
                                            }
                                            // 
                                            
                                            // $query_run = mysqli_query($conn, $query);

                                            // if (mysqli_num_rows($query_run) > 0) {
                                            //     foreach ($query_run as $row) {
                                            // 

                                            
                                            $query_run = mysqli_query($conn, $query);
                                            
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                                    ?>



                                                <option value="<?= $row['category_id'] . ',' . $row['category_name']; ?>"><?= $row['category_name']; ?></option>
                                            
                                            <?php
                                            $categoryId = $row['category_id'];
                                                    }
                                                }
                                            
                                             ?>
                                            <option value="'' , addNewCategory">Add New Category</option>
                                            <!-- You can add more existing categories or options as needed -->
                                        </select>

                                        <!-- Input field for new category -->
                                        <input type="text" id="newCategory" name="newCategory" class="form-control" placeholder="Enter new category" style="display: none;">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Unit Price:</label>
                                        <input type="number" id="price" name="price" min="0" class="form-control"
                                            placeholder="Enter Price/Unit" data-errors="Please Enter Code." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Quantity:</label>
                                        <input type="number" id="stockQuantity" name="stockQuantity" min="0"
                                            class="form-control" placeholder="Enter Quantity"
                                            data-errors="Please Enter Code." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <!-- <div class="col-md-9"> </div> -->
                                <div class="col-md-2">
                                    <div class="form-group" onclick="cancelAddNew()" style="padding-top: 27px; float: right;">
                                        
                                        <button id="btnAddnew" type="submit" onclick="addProduct(<?= $itemId; ?> , <?= $categoryId; ?>)"  class="btn btn-primary mr-3"
                                            ">Add New</button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group table-editable" id="table">
                                        <h4>Item Table</h4>
                                        <table id="productTable" class="table table-bordered table-responsive-md table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>ItemID</th>
                                                    <th>Item</th>
                                                    <th>CategoryID</th>
                                                    <th>Category</th>
                                                    <th>Unit Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th style="width: 80px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Product rows will be added dynamically here -->
                                            </tbody>
                                            <tr>
                                                
                                                <td colspan="5" style="text-align: right;">សរុប​/Grand Total</td>
                                                <td></td>
                                                <td id="grandTotal"></td>
                                                <td></td>
                                                <td style="text-align: center;">
                                                    <button type="reset" style="padding: 5px 14px; margin: 0 outo; text-align: center;" class="btn btn-info mr-2" onclick="resetData()">Reset</button>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description / Product Details</label>
                                        <textarea name="textareaDscItem" id="textareaDscItem" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" style="text-align: center;">
                                        <a href="form_request.php" class="btn btn-secondary mr-2 add-list" >Cancel</a>
                                        <button style="" type="button" class="btn btn-primary mr-2" onclick="saveDataToDatabase()">Save</button>
                                    </div>
                                </div>
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
        // Update Grand Total
        updateGrandTotal();

        function addProduct(itemId, categoryId) {
            // alert(itemId + " " + categoryId);
            var itemDropdown = document.getElementById("selectItem");
            var newItemInput = document.getElementById("newItem");
            var categoryDropdown = document.getElementById("category");
            var newCategoryInput = document.getElementById("newCategory");


            if (categoryDropdown.value === "'' , addNewCategory") {
                // Get form values
                var selectCategory = categoryId + 1 + ',' + document.getElementById('newCategory').value;
                // alert(selectCategory);
                var selectNameCategoryOnly = selectCategory.split(',')[1]; // Get the second part (item name) // Output: "String"
                // alert("Category Name :" + selectNameCategoryOnly);
                // Use a regular expression to extract numbers
                var numbersOnlyCategory = selectCategory.replace(/\D/g, ''); 
                // Convert the extracted numbers to a new variable
                var extractedNumbersCategory = parseInt(numbersOnlyCategory);
                console.log(extractedNumbersCategory); // Output: 120
                // alert("Category mun :" + extractedNumbersCategory);

                // If any other option is selected, hide the input field
                newCategoryInput.style.display = "none";

                var categoryName = document.getElementById('newCategory').value;
                var txtcategoryname = categoryName;
                var txtcategorycode;
                var txtrcategorydsc = categoryId;
                var slcategorystatus;
                var fileimage;
                
                
                $.post("category/add_category.php",{txtcategoryname:categoryName, txtcategorycode: " ", txtrcategorydsc: " ", fileimage: " ", slcategorystatus: 1},function(result){
                      alert(result);
                //   window.location.href = "item/add_item.php";
                });

            }else{
                // Get form values
                var selectCategory = document.getElementById('category').value;
                alert(selectCategory);
                var numbersOnlyCategory = selectCategory.replace(/\D/g, ''); 
                // Convert the extracted numbers to a new variable
                var extractedNumbersCategory = parseInt(numbersOnlyCategory);
                console.log(extractedNumbersCategory); // Output: 120
                alert("Category ID :" + extractedNumbersCategory);

                var selectNameCategoryOnly = selectCategory.split(',')[1]; // Get the second part (item name) // Output: "String"
                alert("Category Name :" + selectNameCategoryOnly);
                // Use a regular expression to extract numbers
               
            }

            if (itemDropdown.value === "'' , addNewItem") {

                // Get form values
                var selectItem = itemId + 1 + ',' + document.getElementById('newItem').value;
                // alert(selectItem);
                var selectNameItemOnly = selectItem.split(',')[1]; // Get the second part (item name) // Output: "String"
                // alert("ItemName :" + selectNameItemOnly);
                // Use a regular expression to extract numbers
                var numbersOnlyItem = selectItem.replace(/\D/g, ''); 
                // Convert the extracted numbers to a new variable
                var extractedNumbersItem = parseInt(numbersOnlyItem);
                console.log(extractedNumbersItem); // Output: 120
                // alert("Item mun :" + extractedNumbersItem);
               
                // If any other option is selected, hide the input field
                newItemInput.style.display = "none";


                if (categoryDropdown.value === "'' , addNewCategory") {

                // Get form values
                var selectCategoryss = categoryId + 1 + ',' + document.getElementById('newCategory').value;
                var selectCategory = selectCategoryss.replace(/\D/g, ''); 
                // Convert the extracted numbers to a new variable
                var extractedNumbersCategory = parseInt(numbersOnlyCategory);
                console.log(extractedNumbersCategory); // Output: 120
                // alert("Category mun :" + extractedNumbersCategory);

                var slCategoryItemId = selectCategory;

                }else{
                    var selectCategory = document.getElementById('category').value;
                    var slCategoryItemId = selectCategory;
                }
               



                var itemName = document.getElementById('newItem').value;
                var txtItemName = itemName;
                var txtItemCode;
                


                var textareaDscItem;
                var numberPriceItem;
                var availables;
                var slStatusItem;
                $.post("item/add_item.php",{txtItemName:itemName, txtItemCode: " ", slCategoryItemId: selectCategory, textareaDscItem: " ", numberPriceItem: " ", availables: " ",  slStatusItem:1},function(result){
                      alert(result);
                //   window.location.href = "item/add_item.php";
                });
            }else{
                // Get form values
                var selectItem = document.getElementById('selectItem').value;
                var parts = selectItem.split(',');
                var selectNameItemOnly = parts[1].trim(); // Get the second part (item name)
                var extractedNumbersItem = parts[0].trim(); // Get the third part (number)
                
            }
            

            var price = parseFloat(document.getElementById('price').value);
            var stockQuantity = parseInt(document.getElementById('stockQuantity').value);

            


            if(checkdatatable(selectNameItemOnly) != 0){

                // Create a new row
                var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
                var newRow = table.insertRow(table.rows.length);

                // Insert cells with product data
                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                var cell3 = newRow.insertCell(2);
                var cell4 = newRow.insertCell(3);
                var cell5 = newRow.insertCell(4);
                var cell6 = newRow.insertCell(5);
                var cell7 = newRow.insertCell(6);
                var cell8 = newRow.insertCell(7);
                var cell9 = newRow.insertCell(8);

                // Fill cells with form values
                cell1.innerHTML = table.rows.length; // Assuming auto-incrementing product_id
                cell2.innerHTML = extractedNumbersItem;
                cell3.innerHTML = selectNameItemOnly;
                cell4.innerHTML = extractedNumbersCategory;
                cell5.innerHTML = selectNameCategoryOnly;
                cell6.innerHTML = 'R' + price.toFixed(2);
                cell7.innerHTML = stockQuantity;
                cell8.innerHTML = 'R' + (price * stockQuantity).toFixed(2);
                // Add Edit and Delete buttons to the row
                cell9.innerHTML = '<button style="padding: 5px 20px;" type="button" class="btn btn-success mr-0" onclick="toggleVisibility(this)">Edit</button>';
                +
                    // '<button style="padding: 5px 10px; margin: 2px;" type="button" class="btn btn-danger mr-2" onclick="deleteProduct(this)">Delete</button>'

                // Update Grand Total
                updateGrandTotal();
            }else{
                // alert("Dubplicate");
            }
            
            // Clear form fields
            document.getElementById('addProductForm').reset();

        }

        function checkdatatable(selectNameItemOnly){
            var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
            var rows = table.getElementsByTagName('tr');
            
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');
                // alert(cells[2].innerHTML);

                if(cells[2].innerHTML === selectNameItemOnly){
                    // alert("Equle" + cells[2].innerHTML + "B " + selectNameItemOnly);
                    return 0;
                }
            }

            // Alert the data before sending it to the server
            // alert("Data to be sent to the server:\n" + JSON.stringify(data, null, 2));
        }

        function toggleVisibility(button) {
            var table = document.getElementById('productTable');
            var columns = table.querySelectorAll('th:nth-child(2), td:nth-child(2), th:nth-child(4), td:nth-child(4)');
            var hiddenData = [];

            for (var i = 0; i < columns.length; i++) {
                // Save data before hiding
                hiddenData.push(columns[i].textContent.trim());

                // Hide the column
                columns[i].style.display = columns[i].style.display === 'none' ? '' : 'none';
            }
            var itemId = hiddenData[2];
            var categoryId = hiddenData[3]
            // Alert the data of hidden columns
            // alert('Hidden Data:\n' + hiddenData.join('\n'));
            // alert(itemId);
            // alert(categoryId)

            editProduct(button, itemId, categoryId)
        }

        function editProduct(button, itemId, categoryId ) {
            // alert(itemId + categoryId);
            var row = button.parentNode.parentNode;
            var cells = row.getElementsByTagName('td');

            var selectItem = [itemId , cells[2].innerHTML];
            // Populate form with row data
            var categoryId = [categoryId , cells[4].innerHTML];
            // Populate form with row data

            document.getElementById('selectItem').value = selectItem;
            document.getElementById('category').value = categoryId;
            document.getElementById('price').value = parseFloat(cells[5].innerHTML.replace('R', ''));
            document.getElementById('stockQuantity').value = parseInt(cells[6].innerHTML);

            // Remove the row from the table
            row.parentNode.removeChild(row);

            // Update Grand Total
            updateGrandTotal();
        }

        function deleteProduct(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);

            // Update Grand Total
            updateGrandTotal();
        }

        function updateGrandTotal() {
            var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
            var rows = table.getElementsByTagName('tr');
            var grandTotal = 0;

            for (var i = 0; i < rows.length; i++) {

                var cells = rows[i].getElementsByTagName('td');

                if(cells[7].innerHTML == "RNaN"){
                    cells[7].innerHTML = "R0.00";
                }
                grandTotal += parseFloat(cells[7].innerHTML.replace('R', ''));
            }

            document.getElementById('grandTotal').innerHTML = 'R' + grandTotal.toFixed(2);
        }
        function resetData() {
            // Clear form fields
            document.getElementById('addProductForm').reset();

            // Remove dynamically added rows in the table
            var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
            table.innerHTML = '';

            // Update Grand Total
            updateGrandTotal();
        }


        function saveDataToDatabase() {
            var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];

            var rows = table.getElementsByTagName('tr');
            var data = [];
            // var reCode = "re-001";
            var rqdRemark = document.getElementById('textareaDscItem').value;  
            var rqdAmount = document.getElementById('grandTotal').innerHTML.replace('R', '');
            var rqGet = 0;
            var approvalId = 1;
            var rqQuestId = 2;
            // Use JavaScript to get the current date and time
            var currentDate = new Date();
            var rqDatetime = currentDate.toISOString().slice(0, 19).replace("T", " ");

            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName('td');

                data.push({
                    rqdSelectItemId: cells[1].innerHTML,
                    rqdUnitPrice: parseInt(cells[5].innerHTML.replace('R', '')),
                    rqdQuantity: parseInt(cells[6].innerHTML),
                    rqdTotal: parseInt(cells[7].innerHTML.replace('R', '')),
                    rqdAmounts: parseInt(rqdAmount), 
                    rqdRemarks: rqdRemark,
                    rqGets: rqGet,
                    approvalIds: approvalId,

                    });
            }
            alert("Data to be sent to the server:\n" + JSON.stringify(data, null, 2));

            // // Prepare data for sending to the server
            var requestData = {
                requestData: JSON.stringify(data)
            };

            // Make an AJAX request to the PHP script
            $.ajax({
                type: 'POST',
                url: 'request/add_mateial_requst.php',
                data: requestData,
                success: function(response) {
                    
                    // Handle the response from the server
                    var requesCode = response;
                    alert(response);
                    window.location.href = "form_view_material_requst.php?code=" + requesCode;


                    console.log(response);
                },
                error: function(error) {
                    // Handle errors
                    alert('Error saving data!');
                    console.error(error);
                }
            });
            
            
        }


        // Select Item action to category
        function showSelectedItem() {
            event.preventDefault();
            document.getElementById('btnAddnew').disabled = false;

            var itemDropdown = document.getElementById("selectItem");

            var newItemInput = document.getElementById("newItem");

            if (itemDropdown.value === "'' , addNewItem") {
                // If "Add New Item" is selected, show the input field
                newItemInput.style.display = "block";
                // window.location.href = "form_request_material.php?";
            } else {
                // If any other option is selected, hide the input field
                newItemInput.style.display = "none";
            }

            var itemDropdowntocategory = document.getElementById("selectItem").value;
            // alert(itemDropdowntocategory);
            var parts = itemDropdowntocategory.split(',');
            var selectNameCategoryOnly = parts[3].trim(); // Get the second part (item name)
            var numberPart = parts[2].trim(); // Get the third part (number)
            var category = [numberPart, selectNameCategoryOnly];
            document.getElementById('category').value = category;
            
        }
        function showSelectedCategory() {

            var categoryDropdown = document.getElementById("category");
            var newCategoryInput = document.getElementById("newCategory");


            if (categoryDropdown.value === "'' , addNewCategory") {
                // If "Add New Category" is selected, show the input field
                newCategoryInput.style.display = "block";
            } else {
                // If any other option is selected, hide the input field
                newCategoryInput.style.display = "none";
                var categoryDropdown = document.getElementById("category").value;
                var itemDropdowntocategory = document.getElementById("selectItem").value;
                var parts = itemDropdowntocategory.split(',');
                var selectNameCategoryOnly = parts[3].trim(); // Get the second part (item name)
                var numberPart = parts[2].trim(); // Get the third part (number)
                var category = [numberPart, selectNameCategoryOnly];
               
               
                if(categoryDropdown !== category){
                    // document.getElementById('btnAddnew').disabled = true;
                    document.getElementById('btnAddnew').disabled = true;
                }
            }

        }

    </script>

</body>

</html>
