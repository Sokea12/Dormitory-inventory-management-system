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
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        } */

        /* form {
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        } */

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

        .hidden {
            display: none;
        }
        .hidden1 {
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
                            <h4 class="modal-title" id="titleItem"></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="hiddenItemId" id="hiddenItemId" value="">
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <!-- ggggggggg1 -->
                                        <label for="selectOrInput">Select Item:</label>
                                        <div id="selectOrInputContainer">
                                            <select class="select1 selectpicker form-control" id="selectItem" name="selectItem" onchange="checkIfAddNew(this)">
                                                <option value="Nan">Select an item</option>
                                                <option value="addNew">Add New Item</option>
                                            <?php
                                                $query = "SELECT * FROM tbl_item";
                                                $query_run = mysqli_query($conn, $query);

                                                if (mysqli_num_rows($query_run) > 0) {
                                                    foreach ($query_run as $row) {
                                            ?>
                                                
                                                <option value="<?= $row['id']; ?>"><?= $row['item_name']; ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            </select>
                                            <input type="text" id="itemInput" class="hidden selectpicker form-control">
                                            <button type="button" class="cancelButton hidden" onclick="cancelAddNew()">Cancel</button>
                                            <!-- <button type="button" class="saveButton hidden" onclick="saveItem()">Save</button> -->
                                        </div>
                                    
                                        <!-- gggggggggg1 -->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="selectOrInput">Select Category:</label>
                                        <div id="selectOrInput">
                                            <select class="select2 selectpicker form-control" id="category" name="category" onchange="checkIfAddNew(this)">
                                                <option value="Nan">Select an item</option>
                                                <option value="addNew">Add New Item</option>

                                                <?php
                                                $query = "SELECT * FROM tbl_category";
                                                $query_run = mysqli_query($conn, $query);

                                                if (mysqli_num_rows($query_run) > 0) {
                                                    foreach ($query_run as $row) {
                                                ?>
                                                    <option value="<?= $row['id']; ?>"><?= $row['category_name']; ?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                            <input type="text" id="itemInput" class="hidden selectpicker form-control">
                                            <button type="button" class="cancelButton hidden" onclick="cancelAddNew()">Cancel</button>
                                            <!-- <button type="button" class="saveButton hidden" onclick="saveItemCategory()">Save</button> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Unit Price:</label>
                                        <input type="text" id="price" name="price" step="0.01" class="form-control"
                                            placeholder="Enter Price/Unit" data-errors="Please Enter Code." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Quantity:</label>
                                        <input type="number" id="stockQuantity" name="stockQuantity"
                                            class="form-control" placeholder="Enter Quantity"
                                            data-errors="Please Enter Code." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                    <label></label>
                                    <div class="form-group" onclick="cancelAddNew()">
                                        <a href="form_material_requst.php" class="btn btn-secondary add-list" >Backe </a>
                                        <button type="button" onclick="addProduct()"  class="btn btn-primary mr-3"
                                            style="float: right;">Add New</button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>Item Table</h4>
                                        <table id="productTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Item</th>
                                                    <th>Category</th>
                                                    <th>Unit Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th style="width: 200px; text-align: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Product rows will be added dynamically here -->
                                            </tbody>
                                            <tr>
                                                <td colspan="5" style="text-align: right;">សរុប​/Grand Total</td>
                                                <td id="grandTotal"></td>
                                                <td style="text-align: center;">
                                                    <button type="reset" style="padding: 5px 14px; margin: 3px 0px 3px 3px;" class="btn btn-info mr-2" onclick="resetData()">Reset</button>
                                                    <button
                                                        style="padding: 5px 18px; margin: 3px 0px 3px 3px;" type="button"
                                                        class="btn btn-primary mr-2" onclick="saveDataToDatabase()">Save</button>
                                                </td>
                                            </tr>
                                        </table>
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
        function addProduct(cansal) {
            
            // Get form values
            var selectItem = document.getElementById('selectItem').value;
            var category = document.getElementById('category').value;
            var price = parseFloat(document.getElementById('price').value);
            var stockQuantity = parseInt(document.getElementById('stockQuantity').value);

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

            // Fill cells with form values
            cell1.innerHTML = table.rows.length; // Assuming auto-incrementing product_id
            cell2.innerHTML = selectItem;
            cell3.innerHTML = category;
            cell4.innerHTML = 'R' + price.toFixed(2);
            cell5.innerHTML = stockQuantity;
            cell6.innerHTML = 'R' + (price * stockQuantity).toFixed(2);

            // Add Edit and Delete buttons to the row
            cell7.innerHTML = '<button style="padding: 5px 20px; margin: 3px 0px 3px 10px;" type="button" class="btn btn-success mr-2" onclick="editProduct(this)">Edit</button>' +
                '<button style="padding: 5px 10px; margin: 2px;" type="button" class="btn btn-primary mr-2" onclick="deleteProduct(this)">Delete</button>';

            // Update Grand Total
            updateGrandTotal();

            // Clear form fields
            document.getElementById('addProductForm').reset();
        }

        function editProduct(button) {
            var row = button.parentNode.parentNode;
            var cells = row.getElementsByTagName('td');

            // Populate form with row data
            document.getElementById('selectItem').value = cells[1].innerHTML;
            document.getElementById('category').value = cells[2].innerHTML;
            document.getElementById('price').value = parseFloat(cells[3].innerHTML.replace('R', ''));
            document.getElementById('stockQuantity').value = parseInt(cells[4].innerHTML);

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

                if(cells[5].innerHTML == "RNaN"){
                    cells[5].innerHTML = "R0.00";
                }
                grandTotal += parseFloat(cells[5].innerHTML.replace('R', ''));
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

        // function saveDataToDatabase() {
        //     var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
        //     var rows = table.getElementsByTagName('tr');
        //     var data = [];

        //     for (var i = 0; i < rows.length; i++) {
        //         var cells = rows[i].getElementsByTagName('td');

        //         data.push({
        //             selectItem: cells[1].innerHTML,
        //             category: cells[2].innerHTML,
        //             price: parseFloat(cells[3].innerHTML.replace('R', '')),
        //             quantity: parseInt(cells[4].innerHTML),
        //             total: parseFloat(cells[5].innerHTML.replace('R', ''))
        //         });
        //     }

        //     // Use AJAX to send data to the server
        //     var xhr = new XMLHttpRequest();
        //     var url = 'save_data_script.php'; // Change this to the actual server-side script
        //     xhr.open('POST', url, true);
        //     xhr.setRequestHeader('Content-Type', 'application/json');

        //     xhr.onreadystatechange = function () {
        //         if (xhr.readyState == 4 && xhr.status == 200) {
        //             // Handle the response from the server, if needed
        //             console.log(xhr.responseText);
        //         }
        //     };

        //     xhr.send(JSON.stringify(data));

        //     // Optionally, you can reset the form and update the grand total
        //     resetData();
        // }



        function saveDataToDatabase() {
        var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
        var rows = table.getElementsByTagName('tr');
        var data = [];

        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');

            data.push({
                selectItem: cells[1].innerHTML,
                category: cells[2].innerHTML,
                price: parseFloat(cells[3].innerHTML.replace('R', '')),
                quantity: parseInt(cells[4].innerHTML),
                total: parseFloat(cells[5].innerHTML.replace('R', ''))
            });
        }

        // Alert the data before sending it to the server
        alert("Data to be sent to the server:\n" + JSON.stringify(data, null, 2));

        // Use AJAX to send data to the server
        var xhr = new XMLHttpRequest();
        var url = 'save_data_script.php'; // Change this to the actual server-side script
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response from the server, if needed
                console.log(xhr.responseText);
            }
        };

        xhr.send(JSON.stringify(data));

        // Optionally, you can reset the form and update the grand total
        resetData();
    }





    // ៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕
    // Category1
    function checkIfAddNew(selectElement) {
        
            
            var newItemInput = document.getElementById("itemInput");
            var selectedValue = selectElement.value;
            var selectOrInputContainer = document.getElementById("selectOrInputContainer");
            var cancelButton = document.querySelector(".cancelButton");
            var saveButton = document.querySelector(".saveButton");

            if (selectedValue === "addNew") {
                newItemInput.classList.remove("hidden");
                newItemInput.focus();
                selectElement.classList.add("hidden");
                cancelButton.classList.remove("hidden");
                saveButton.classList.remove("hidden");
            }else {
                newItemInput.classList.add("hidden");
                selectElement.classList.remove("hidden");
                cancelButton.classList.add("hidden");
            }
            
            
        }

        function insertItem() {
            var newItemInput = document.getElementById("itemInput");
            var selectItem = document.getElementById("selectItem");
            var cancelButton = document.querySelector(".cancelButton");
            var saveButton = document.querySelector(".saveButton");

            var newItem = newItemInput.value.trim();

            if (newItem !== "") {
                var existingOption = Array.from(selectItem.options).find(option => option.value === newItem);

                if (existingOption) {
                    alert("Item already exists. Selected: " + existingOption.value);
                    selectItem.value = newItem;
                } else {
                    var newOption = document.createElement("option");
                    newOption.value = newItem;
                    newOption.text = newItem;
                    selectItem.add(newOption);
                    selectItem.value = newItem;
                    alert("New item added: " + newItem);
                }
            }

            newItemInput.value = "";
            newItemInput.classList.add("hidden");
            selectItem.value = ""; // Reset the selection after inserting
            selectItem.classList.remove("hidden");
            cancelButton.classList.add("hidden");
            saveButton.classList.add("hidden");
        }

        function cancelAddNew() {
            var newItemInput = document.getElementById("itemInput");
            var selectItem = document.getElementById("selectItem");
            var cancelButton = document.querySelector(".cancelButton");
            var saveButton = document.querySelector(".saveButton");
            selectItem.value = "Nan";
            newItemInput.value = "";
            newItemInput.classList.add("hidden");
            selectItem.classList.remove("hidden");
            cancelButton.classList.add("hidden");
            saveButton.classList.add("hidden");
        }

        function saveItem() {
            var newItemInput = document.getElementById("itemInput");
            var selectItem = document.getElementById("selectItem");
            var cancelButton = document.querySelector(".cancelButton");
            var saveButton = document.querySelector(".saveButton");

            var newItem = newItemInput.value.trim();

            if (newItem !== "") {
                var existingOption = Array.from(selectItem.options).find(option => option.value === newItem);

                if (existingOption) {
                    alert("Item already exists. Selected: " + existingOption.value);
                    selectItem.value = newItem;
                } else {
                    var newOption = document.createElement("option");
                    newOption.value = newItem;
                    newOption.text = newItem;
                    selectItem.add(newOption);
                    selectItem.value = newItem;
                    alert("New item saved: " + newItem);
                }
            } else {
                alert("Please enter an item before saving.");
            }

            newItemInput.value = "";
            newItemInput.classList.add("hidden");
            selectItem.classList.remove("hidden");
            cancelButton.classList.add("hidden");
            saveButton.classList.add("hidden");
        }

    </script>

</body>

</html>
