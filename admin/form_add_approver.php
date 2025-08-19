<?php
    session_start();
    include("../config/connection.php");
    include("main_header.php");
?>

    <form>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="modal-header">
                            <h4 class="modal-title" id="titleItem">Material Requst From</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="hiddenItemId" id="hiddenItemId" value="">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name *</label>
                                        <input type="text" id="textFname" name="textFname" min="0" class="form-control"
                                            placeholder="Please enter first name." data-errors="Please enter first name." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name *</label>
                                        <input type="text" id="textLname" name="textLname" min="0" class="form-control"
                                            placeholder="Please enter last name." data-errors="Please enter last name." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number *</label>
                                        <input type="text" id="textPhone" name="textPhone" min="0" class="form-control"
                                            placeholder="Please enter phone number." data-errors="Please enter phone number." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Gender *</label>
                                        <select id="slGender" name="slGender" class="form-control" onchange="showSelectedCategory()" >
                                            <option value="1">Male</option>
                                            <option value="0">Female</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date Of Birth *</label>
                                        <input type="date" id="dateDob" name="dateDob" min="0" class="form-control"
                                            placeholder="Please enter phone number" data-errors="Please enter phone number" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="email" id="email" name="email" min="0" class="form-control"
                                            placeholder="Please enter email." data-errors="Please enter email." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Passwprd *</label>
                                        <input type="text" id="textPassword" name="textPassword" min="0" class="form-control"
                                            placeholder="Please enter password." data-errors="Please enter your password." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Role *</label>
                                        <select id="slRole" name="slRole" class="form-control" disabled>
                                            <option value="1">User</option>
                                            <option value="2">Approver</option>
                                            <option value="3">Supplier</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address Details *</label>
                                        <textarea name="textareaAddress" id="textareaAddress" class="form-control" rows="2" placeholder="Please enter address !!"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                   <div class="checkbox d-inline-block mb-12">
                                       <span class=""> <input type="checkbox" class="checkbox d-inline-block mr-2" id="checkboxSentemailUser" checked="" style="width: 20px;"></span>
                                       <span class="table-add float-right mb-4 mr-4"> <label for="checkbox1">Notify User by Email</label></span>
                                    </div> <br>
                                    <button type="submit" class="btn btn-primary mr-2 disabled">Add New User</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
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
document.addEventListener('DOMContentLoaded', function() {
    // Select the "Add New User" button
    const addButton = document.querySelector('button[type="submit"]');

    // Add event listener to the button
    addButton.addEventListener('click', function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Selecting form inputs by their IDs
        const textFnameValue = document.querySelector('#textFname').value;
        const textLnameValue = document.querySelector('#textLname').value;
        const textPhoneValue = document.querySelector('#textPhone').value;
        const slGenderValue = document.querySelector('#slGender').value;
        const dateDobValue = document.querySelector('#dateDob').value;
        const emailValue = document.querySelector('#email').value;
        const textPasswordValue = document.querySelector('#textPassword').value;
        const slRoleValue = document.querySelector('#slRole').value;
        const textareaAddressValue = document.querySelector('#textareaAddress').value;
        const checkboxSentemailUserChecked = document.querySelector('#checkboxSentemailUser').checked;

        // Alerting the values
        alert("First Name: " + textFnameValue + 
              "\nLast Name: " + textLnameValue + 
              "\nPhone Number: " + textPhoneValue + 
              "\nGender: " + slGenderValue + 
              "\nDate of Birth: " + dateDobValue + 
              "\nEmail: " + emailValue + 
              "\nPassword: " + textPasswordValue + 
              "\nRole: " + slRoleValue +
              "\nAddress: " + textareaAddressValue + 
              "\nNotify User by Email: " + checkboxSentemailUserChecked);
        
        // Execute the POST request
        $.post("user/add_user.php", {
            textFname: textFnameValue,
            textLname: textLnameValue,
            textPhone: textPhoneValue,
            slGender: slGenderValue,
            dateDob: dateDobValue,
            email: emailValue,
            textPassword: textPasswordValue,
            slRole: slRoleValue,
            textareaAddress: textareaAddressValue,
            checkboxSentemailUser: checkboxSentemailUserChecked ? 'checked' : 'unchecked' // Sending checkbox value as a string
        }, function(result) {
            alert(result); // Alerting the result of the POST request
        });
    });
});
</script>

