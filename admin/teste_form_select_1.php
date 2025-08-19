<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category and Item Selection Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
        }

        .form-group {
            flex: 1;
            box-sizing: border-box;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 16px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <form action="" method="post" id="categoryForm">
        <div class="form-group">
            <label for="category">Select Category:</label>
            <select id="category" name="category" onchange="showSelectedCategory()">
                <option value="option1">Category 1</option>
                <option value="option2">Category 2</option>
                <option value="option3">Category 3</option>
                <option value="addNewCategory">Add New Category</option>
                <!-- You can add more existing categories or options as needed -->
            </select>

            <!-- Input field for new category -->
            <input type="text" id="newCategory" name="newCategory" placeholder="Enter new category" style="display: none;">
        </div>

        <div class="form-group">
            <label for="item">Select or Add Item:</label>
            <select id="item" name="item" onchange="showSelectedItem()">
                <option value="item1">Item 1</option>
                <option value="item2">Item 2</option>
                <option value="item3">Item 3</option>
                <option value="addNewItem">Add New Item</option>
                <!-- You can add more existing items or options as needed -->
            </select>

            <!-- Input field for new item -->
            <input type="text" id="newItem" name="newItem" placeholder="Enter new item" style="display: none;">
        </div>

        <!-- Add other form fields as needed -->

        <br>

        <input type="submit" value="Submit">
    </form>

    <script>
        function showSelectedCategory() {
            var categoryDropdown = document.getElementById("category");
            var newCategoryInput = document.getElementById("newCategory");

            if (categoryDropdown.value === "addNewCategory") {
                // If "Add New Category" is selected, show the input field
                newCategoryInput.style.display = "block";
            } else {
                // If any other option is selected, hide the input field
                newCategoryInput.style.display = "none";
            }
        }

        function showSelectedItem() {
            var itemDropdown = document.getElementById("item");
            var newItemInput = document.getElementById("newItem");

            if (itemDropdown.value === "addNewItem") {
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
