<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Datum | CRM Admin Dashboard Template</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="../assets/images/favicon.ico" />
      
      <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../assets/css/backend.css?v=1.0.0">  
      <link rel="stylesheet" href="../assets/css/mystyle.css">  
      
    </head>
  
      <body class="">
      <!-- category/add_category.php -->
<form method="post" action="category/add_category.php" >
<div class="form-group">
    <label>Category for Supplier *</label>
    <!-- <input type="" name="categories[]" value=""> -->
    <select id="categorySelect" name="categorySelect[]" class="custom-select form-control choicesjs" multiple>
        <option selected="">Open this menu</option>
        <option value="IT">សម្ភារៈផ្ទះបាយ</option>
        <option value="Blade Runner">សម្ភារៈអគា៍</option>
        <option value="Thor Ragnarok">សម្ភារៈកសិកម្ម</option>
    </select>
    <div class="help-block with-errors"></div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Supplier *</label>
        <select id="slSupplier" name="slSupplier" class="form-control" style="border: 1px solid #cbcbcb;">
            <option value="2">User</option>
            <option value="1">Admin</option>
        </select>
        <div class="help-block with-errors"></div>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label>Category for Supplier *</label>
        <select class="custom-select form-control choicesjs" multiple>
            <option selected="">Open this menu</option>
            <option value="IT">សម្ភារៈផ្ទះបាយ</option>
            <option value="Blade Runner">សម្ភារៈអគា៍</option>
            <option value="Thor Ragnarok">សម្ភារៈកសិកម្ម</option>
        </select>
        <div class="help-block with-errors"></div>
    </div>
</div>
<button onclick="submitForm()">Submit</button>

</form>
<script>
function submitForm() {
    // Get the select element
    var selectElement = document.getElementById("categorySelect");
    
    // Get the selected options
    var selectedOptions = [];
    for (var i = 0; i < selectElement.options.length; i++) {
        var option = selectElement.options[i];
        if (option.selected) {
            selectedOptions.push(option.value);
        }
    }
    document.getElementById("categories").value = selectedOptions;
    // Display an alert with the selected options
    if (selectedOptions.length > 0) {
        alert("Selected categories: " + selectedOptions.join(", "));
    } else {
        alert("Please select at least one category.");
    }
}
</script>




<!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>
    
    <script src="../assets/js/sidebar.js"></script>
    
    <!-- Flextree Javascript-->
    <script src="../assets/js/flex-tree.min.js"></script>
    <script src="../assets/js/tree.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="../assets/js/table-treeview.js"></script>
    
    <!-- SweetAlert JavaScript -->
    <script src="../assets/js/sweetalert.js"></script>
    
    <!-- Vectoe Map JavaScript -->
    <script src="../assets/js/vector-map-custom.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/chart-custom.js"></script>
    <script src="../assets/js/charts/01.js"></script>
    <script src="../assets/js/charts/02.js"></script>
    
    <!-- slider JavaScript -->
    <script src="../assets/js/slider.js"></script>
    
    <!-- Emoji picker -->
    <script src="../assets/vendor/emoji-picker-element/index.js" type="module"></script>
    
    
    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>  </body>
</html>





<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["categorySelect"]) && !empty($_POST["categorySelect"])) {
        $selectedCategories = $_POST["categorySelect"];
        
        // Here you can process the selected categories as needed
        // For demonstration purposes, let's just print the selected categories
        $i = 1;
        echo "Selected categories: <br>";
        foreach ($selectedCategories as $category) {
            echo $category  . $i++ .    "<br>";
        }
    } else {
        echo "Error: No categories selected.";
    }
} else {
    echo "Error: Form not submitted.";
}

?>