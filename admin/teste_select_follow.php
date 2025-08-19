<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item and Category Selection</title>
</head>
<body>

<label for="item">Select Item:</label>
<select id="item" onchange="updateCategory()">
    <option value="laptop">Laptop</option>
    <option value="smartphone">Smartphone</option>
    <option value="camera">Camera</option>
    <option value="shirt">Shirt</option>
    <option value="pants">Pants</option>
    <option value="shoes">Shoes</option>
    <option value="fiction">Fiction</option>
    <option value="non-fiction">Non-fiction</option>
    <option value="mystery">Mystery</option>
</select>

<br>

<label for="category">Selected Category:</label>
<select id="selectedCategory" disabled>
    <!-- The selected category will be dynamically populated here -->
</select>

<script>
    // Define the mapping of items to categories
    const itemToCategory = {
        laptop: "electronics",
        smartphone: "electronics",
        camera: "electronics",
        shirt: "clothing",
        pants: "clothing",
        shoes: "clothing",
        fiction: "books",
        "non-fiction": "books",
        mystery: "books"
    };

    // Function to update the displayed category based on the selected item
    function updateCategory() {
        const itemSelect = document.getElementById("item");
        const selectedCategorySelect = document.getElementById("selectedCategory");

        // Get selected item
        const selectedItem = itemSelect.value;

        // Look up the category for the selected item
        const selectedCategory = itemToCategory[selectedItem];

        // Clear previous options
        selectedCategorySelect.innerHTML = '';

        // Add a new option for the selected category
        const option = document.createElement("option");
        option.value = selectedCategory;
        option.text = selectedCategory;
        selectedCategorySelect.add(option);

        // Disable the dropdown (optional, can be omitted if you want it to remain enabled)
        selectedCategorySelect.disabled = true;
    }

    // Initial call to display the default category for the default item
    updateCategory();
</script>

</body>
</html>
