<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category and Item Selection</title>
</head>
<body>
    <hr>
    <br><br>
    <label for="category">Select Category:</label>
    <select id="category" onchange="updateItems()">
        <option value="cars">Cars</option>
        <option value="computers">Computers</option>
        <option value="books">Books</option>
    </select>

    <br><br>
    <label for="item">Select Item:</label>
    <select id="item" disabled>
        <!-- The available items will be dynamically populated here -->
    </select>
    <br><br>

    <script>
        // Static dataset for items in different categories
        const categoryToItems = {
            "cars": ["BMW", "Toyota", "Ford", "Honda"],
            "computers": ["Dell", "HP", "Apple", "Lenovo"],
            "books": ["Harry Potter", "Lord of the Rings", "To Kill a Mockingbird"]
        };

        function updateItems() {
            const selectedCategory = document.getElementById("category").value;
            const itemDropdown = document.getElementById("item");
            itemDropdown.innerHTML = ""; // Clear previous options

            // Get the items for the selected category
            const items = categoryToItems[selectedCategory];
            if (items) {
                items.forEach((item) => {
                    const option = document.createElement("option");
                    option.value = item;
                    option.textContent = item;
                    itemDropdown.appendChild(option);
                });
                itemDropdown.disabled = false; // Enable the item dropdown
            } else {
                itemDropdown.disabled
