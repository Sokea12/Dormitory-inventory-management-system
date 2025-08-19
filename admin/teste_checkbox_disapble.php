<select id="slRole" name="slRole" class="form-control" style="border: 1px solid #cbcbcb;" onchange="toggleCheckboxes()">
    <option value="2">User</option>
    <option value="1">Admin</option>
</select>

<label>Permission :</label><br>
<div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
    <input type="checkbox" class="custom-control-input bg-primary" id="checkPurchase" name="checkPurchase" value="1">
    <label class="custom-control-label" for="checkPurchase">Purchase</label>
</div>
<div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
    <input type="checkbox" class="custom-control-input bg-primary" id="checkAssign" name="checkAssign" value="1">
    <label class="custom-control-label" for="checkAssign">Assign inventory</label>
</div>
<div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
    <input type="checkbox" class="custom-control-input bg-primary" id="checkAppro" name="checkAppro" value="1">
    <label class="custom-control-label" for="checkAppro">Approver</label>
</div>
<div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
    <input type="checkbox" class="custom-control-input bg-primary" id="checkUser" name="checkUser" value="1">
    <label class="custom-control-label" for="checkUser">Users</label>
</div>

<button onclick="submitForm()">Submit</button>

<script>
    // Function to toggle checkboxes based on selected role
    function toggleCheckboxes() {
        var roleSelect = document.getElementById("slRole");
        var isAdmin = roleSelect.value === "1";

        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.disabled = isAdmin;
            if (isAdmin) {
                checkbox.checked = true;
            }
        });
    }

    // Function to handle form submission
    function submitForm() {
        var roleSelect = document.getElementById("slRole");
        var selectedRole = roleSelect.options[roleSelect.selectedIndex].value;

        var selectedPermissions = [];
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        checkboxes.forEach(function(checkbox) {
            selectedPermissions.push(checkbox.value);
        });

        var message = "Selected Role: " + selectedRole + "\n";
        message += "Selected Permissions: " + selectedPermissions.join(", ");

        alert(message);
    }

    // Call toggleCheckboxes on page load to initialize checkbox states
    window.onload = toggleCheckboxes;
</script>
