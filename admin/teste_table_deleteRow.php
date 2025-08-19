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
                                                        <th>ដកចេញ</th>
                                                        <th>ItemId</th>
                                                        <th>សម្ភារៈ</th>
                                                        <th>ប្រភេទ</th>
                                                        <th>អ្នកផ្គត់ផ្គង់</th>
                                                        <th>បរិមាណ</th>
                                                        <th>តម្លៃ</th>
                                                        <th>សរុប</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="itemTableBody"></tbody>
                                                <tr>
                                                    <td colspan= 7 style="text-align: right;">
                                                        សរុប
                                                    </td>
                                                    <td id="grandTotal">0</td>
                                                </tr>
                                                
                                            </table>
                                        </div>
                                    </div>
<td><button class="delete-button">Delete</button></td>




<script>
    // Get a reference to the table
var table = document.getElementById("productTable");

// Function to delete a row
function deleteRow(row) {
    var rowIndex = row.rowIndex;
    table.deleteRow(rowIndex);
    updateGrandTotal();
}

// Attach event listener to each delete button
var deleteButtons = document.querySelectorAll('.delete-button');
deleteButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var row = this.closest('tr');
        deleteRow(row);
    });
});

// Function to update grand total
function updateGrandTotal() {
    var grandTotalCell = document.getElementById("grandTotal");
    var total = 0;
    var rows = table.rows;
    for (var i = 1; i < rows.length - 1; i++) { // start from 1 to skip header and end before the total row
        var priceCell = rows[i].querySelector('td:nth-child(7)');
        var price = parseFloat(priceCell.textContent);
        total += price;
    }
    grandTotalCell.textContent = total;
}

</script>