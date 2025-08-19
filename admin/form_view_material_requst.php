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
</head>
<body>

    <form id="addProductForm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="modal-header">
                            <h4 class="modal-title" id="titleItem">Material Request Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <div id="table" class="table-editable">
                                        <span class="table-add float-left mb-3 mr-2">
                                            <h6 class="table-add float-left mb-3 mr-2">M.R Code</h6>
                                            <p>
                                                <?php if(isset($_GET['code'])){
                                                    $code = $_GET['code'];
                                                    echo $code;
                                                } ?>
                                            </p>
                                            <br>
                                        </span>
                                        
                                        <div class="float-left">
                                            <h5 class="float-rigth">Request</h5>
                                        </div>
                                        <table class="table table-bordered table-responsive-md table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Item</th>
                                                    <th>Category</th>
                                                    <th>Unit/Price</th>
                                                    <th>Qeuest</th>
                                                    <th>Total</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php  
                                            $remark = 0;
                                            $grandTotal = 0; 
                                            $num = 0;
                                            $query ="SELECT * FROM tbl_request_detail WHERE rqd_code = '$code'";
                                            $query_run = mysqli_query($conn, $query);
                                            
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                                    $num++;
                                                    ?>
                                                <tr>
                                                    <td><?= $num; ?></td>
                                                    <?php
                                                            
                                                    // Construct the SQL query
                                                        $sql = "SELECT id, item_name, category_id FROM tbl_item WHERE id = $row[item_id]";
                                                        // Execute the query
                                                        $result = $conn->query($sql);
                                                        // Check if the query was successful
                                                        if ($result) {
                                                            // Fetch the result as an associative array
                                                            $itemInrqs = $result->fetch_assoc();

                                                            ?>
                                                                <td> 
                                                                    <input type="hidden" name="itemIds[]" value="<?= $itemInrqs['id']; ?>">
                                                                    <?= $itemInrqs['item_name']; ?> 
                                                                </td>
                                                                <?php
                                                                    // Construct the SQL query
                                                                    $sql = "SELECT category_name FROM tbl_category WHERE id = $itemInrqs[category_id]";
                                                                    // Execute the query
                                                                    $result = $conn->query($sql);
                                                                    // Check if the query was successful
                                                                    if ($result) {
                                                                        // Fetch the result as an associative array
                                                                        $categoryInrqs = $result->fetch_assoc();
                                                                        ?>
                                                                        <td> 
                                                                          <?= $categoryInrqs['category_name']; ?> 
                                                                        </td>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            <?php
                                                        
                                                        }
                                                    ?>
                                                    <td><?= $row['rqd_unit_price']; ?></td>
                                                    <td><?= $row['rqd_quantity'] + $row['rqd_gets']; ?></td>
                                                    <td><?= $row['rqd_amount']; ?></td>
                                                </tr>
                                                    <?php
                                                    $grandTotal += $row['rqd_amount'];
                                                    $remark = $row['rqd_remarks'];
                                                }
                                            } 
                                            ?>
                                                <tr>
                                                    <td colspan="5" style="text-align: right;">សរុប/grandTotal</td>
                                                    <td hidden></td>
                                                    <td><div id="output"><?= $grandTotal; ?>.00</div></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h6>Remarks</h6>
                                        <div><?= $remark; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div style="margin: 0 auto; display: flex; justify-content: center; align-items: center;" class="col-lg-4">
                                        <a href="form_request.php" class="btn btn-secondary mr-3 add-list" >Backe</a>
                                        <a href="form_request.php" class="btn btn-success mr-3 add-list" >Edit</a>
                                        <button href="" type="submit" class="btn btn-primary mr-3 add-list" >Save </button>
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
                var itemName = document.getElementById('newItem').value;
                var txtItemName = itemName;
                var txtItemCode;
                var slCategoryItemId = categoryId;
                var textareaDscItem;
                var numberPriceItem;
                var slStatusItem;
                $.post("item/add_item.php",{txtItemName:itemName, txtItemCode: " ", slCategoryItemId: categoryId, textareaDscItem: " ", numberPriceItem: " ", slStatusItem:1},function(result){
                      alert(result);
                //   window.location.href = "item/add_item.php";
                });
            }else{
                // Get form values
                var selectItem = document.getElementById('selectItem').value;
                // alert(selectItem);
                var selectNameItemOnly = selectItem.split(',')[1]; // Get the second part (item name) // Output: "String"
                // alert("ItemName :" + selectNameItemOnly);
                // Use a regular expression to extract numbers
                var numbersOnlyItem = selectItem.replace(/\D/g, ''); 
                // Convert the extracted numbers to a new variable
                var extractedNumbersItem = parseInt(numbersOnlyItem);
                console.log(extractedNumbersItem); // Output: 120
                // alert("Item mun :" + extractedNumbersItem);
            }
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
                // alert(selectCategory);
                var selectNameCategoryOnly = selectCategory.split(',')[1]; // Get the second part (item name) // Output: "String"
                // alert("Category Name :" + selectNameCategoryOnly);
                // Use a regular expression to extract numbers
                var numbersOnlyCategory = selectCategory.replace(/\D/g, ''); 
                // Convert the extracted numbers to a new variable
                var extractedNumbersCategory = parseInt(numbersOnlyCategory);
                console.log(extractedNumbersCategory); // Output: 120
                // alert("Category mun :" + extractedNumbersCategory);
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
                cell9.innerHTML = '<button style="padding: 5px 20px; margin: 3px 0px 3px 10px;" type="button" class="btn btn-success mr-2" onclick="toggleVisibility(this)">Edit</button>' +
                    '<button style="padding: 5px 10px; margin: 2px;" type="button" class="btn btn-danger mr-2" onclick="deleteProduct(this)">Delete</button>';

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
                url: 'mateial_requst/add_mateial_requst.php',
                data: requestData,
                success: function(response) {
                    // Handle the response from the server
                    alert(response);
                    console.log(response);
                },
                error: function(error) {
                    // Handle errors
                    alert('Error saving data!');
                    console.error(error);
                }
            });
            
            // resetData();
            
        }

        // // Call the function
        // saveDataToDatabase();




    // ៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕៕
        function showSelectedCategory() {
            var categoryDropdown = document.getElementById("category");
            var newCategoryInput = document.getElementById("newCategory");

            if (categoryDropdown.value === "'' , addNewCategory") {
                // If "Add New Category" is selected, show the input field
                newCategoryInput.style.display = "block";
            } else {
                // If any other option is selected, hide the input field
                newCategoryInput.style.display = "none";
            }
        }

        function showSelectedItem() {
            var itemDropdown = document.getElementById("selectItem");
            var newItemInput = document.getElementById("newItem");

            if (itemDropdown.value === "'' , addNewItem") {
                // If "Add New Item" is selected, show the input field
                newItemInput.style.display = "block";
            } else {
                // If any other option is selected, hide the input field
                newItemInput.style.display = "none";
            }
        }


    </script>

</body>

</html>
