<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
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
<body>

    <h2>Manage Products</h2>

    <form id="addProductForm">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required>

        <label for="stockQuantity">Stock Quantity:</label>
        <input type="number" id="stockQuantity" name="stockQuantity" required>

        <label for="manufacturer">Manufacturer:</label>
        <input type="text" id="manufacturer" name="manufacturer" required>

        <button type="button" onclick="addProduct()">Add Product</button>
    </form>

    <h2>Product Table</h2>

    <table id="productTable">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock Quantity</th>
                <th>Manufacturer</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Product rows will be added dynamically here -->
        </tbody>
    </table>

    <script>
        function addProduct() {
            // Get form values
            var productName = document.getElementById('productName').value;
            var category = document.getElementById('category').value;
            var price = parseFloat(document.getElementById('price').value);
            var stockQuantity = parseInt(document.getElementById('stockQuantity').value);
            var manufacturer = document.getElementById('manufacturer').value;

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
            cell2.innerHTML = productName;
            cell3.innerHTML = category;
            cell4.innerHTML = '$' + price.toFixed(2);
            cell5.innerHTML = stockQuantity;
            cell6.innerHTML = manufacturer;

            // Add Edit and Delete buttons to the row
            cell7.innerHTML = '<button onclick="editProduct(this)">Edit</button>' +
                              '<button onclick="deleteProduct(this)">Delete</button>';

            // Clear form fields
            document.getElementById('addProductForm').reset();
        }

        function editProduct(button) {
            var row = button.parentNode.parentNode;
            var cells = row.getElementsByTagName('td');

            // Populate form with row data
            document.getElementById('productName').value = cells[1].innerHTML;
            document.getElementById('category').value = cells[2].innerHTML;
            document.getElementById('price').value = parseFloat(cells[3].innerHTML.replace('$', ''));
            document.getElementById('stockQuantity').value = parseInt(cells[4].innerHTML);
            document.getElementById('manufacturer').value = cells[5].innerHTML;

            // Remove the row from the table
            row.parentNode.removeChild(row);
        }

        function deleteProduct(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    </script>

</body>
</html>
