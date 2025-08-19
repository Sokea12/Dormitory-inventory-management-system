<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Basic styling for the table */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Initially hide the ID, Name, and Price columns */
        th:first-child,
        td:first-child,
        th:nth-child(2),
        td:nth-child(2),
        th:nth-child(3),
        td:nth-child(3) {
            display: none;
        }

        /* Button styling */
        button {
            margin-top: 10px;
            padding: 8px;
        }
    </style>
    <title>Item Table</title>
</head>
<body>

    <h2>Item Table</h2>

    <table id="itemTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Item 1</td>
                <td>$10.00</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Item 2</td>
                <td>$15.00</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>

    <button onclick="toggleVisibility()">Toggle Visibility</button>

    <script>
        function toggleVisibility() {
            var table = document.getElementById('itemTable');
            var columns = table.querySelectorAll('th:first-child, td:first-child, th:nth-child(2), td:nth-child(2), th:nth-child(3), td:nth-child(3)');
            var hiddenData = [];

            for (var i = 0; i < columns.length; i++) {
                // Save data before hiding
                hiddenData.push(columns[i].textContent.trim());

                // Hide the column
                columns[i].style.display = columns[i].style.display === 'none' ? '' : 'none';
            }

            // Alert the data of hidden columns
            // alert('Hidden Data:\n' + hiddenData.join('\n'));
            alert(hiddenData[3]);
        }
    </script>

</body>
</html>
