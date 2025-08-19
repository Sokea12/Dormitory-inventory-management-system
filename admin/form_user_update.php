<?php
    session_start();
    include("../config/connection.php");
    include("main_header.php");
?>
<style>
  input[type="file"] {
    display: none; /* Hide the file input */
  }
  .avatar-wrapper {
    position: relative;
    width: 170px;
    height: 170px;
    margin-top: 35px;
    margin-bottom: 10px;
    cursor: pointer;
  }
  .avatar {
    border-radius: 50%;
    overflow: hidden;
    width: 100%;
    height: 100%;
    background-color: #e0e0e0;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 60px; /* Adjust the size of the icon */
    position: relative;
  }
  .avatar img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
</style>

    <form method="post" action="user/update_user.php" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="modal-header">
                            <h4 class="modal-title" id="titleItem">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 2 20 20"  width="30" height="30" fill="currentColor" class="w-5 h-5">
                            <path d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                            <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                            </svg>
                            ធ្វើបច្ចុប្បន្នភាពអ្នកប្រើប្រាស់៖
                            </h4>
                        </div>
                        <div class="card-body" >
                            <div class="row">
                                <input type="hidden" name="hiddenUsf_id" id="hiddenUsf_id" value="<?=$_GET['usf_id'];?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>គោត្តនាម *</label>
                                        <input type="text" id="textFname" name="textFname" min="0" class="form-control" value=" <?= $_GET['us_firstName']; ?> "
                                            placeholder="Please enter first name." data-errors="Please enter first name." required style="border: 1px solid #cbcbcb;">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>នាម *</label>
                                        <input type="text" id="textLname" name="textLname" min="0" class="form-control" value=" <?= $_GET['us_lastName']; ?> "
                                            placeholder="Please enter last name." data-errors="Please enter last name." required style="border: 1px solid #cbcbcb;">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>ទំនាក់ទំនង *</label>
                                        <input type="text" id="textPhone" name="textPhone" min="0" class="form-control" value=" <?= $_GET['us_phone']; ?>"
                                            placeholder="Please enter phone number." data-errors="Please enter phone number." required style="border: 1px solid #cbcbcb;">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="avatar-wrapper" onclick="document.getElementById('avatarInput').click()">
                                            <div class="" style="text-align: center; width: 100%;">
                                                <i class="avatar">
                                                    <input type="hidden" id="usf_image" name="usf_image" value="<?=$_GET['us_image'];?>">
                                                <img src="../assets/images/user/<?=$_GET['us_image'];?>" class="img-fluid rounded mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                                                </svg>
                                                </i> <!-- Font Awesome icon -->
                                                
                                            </div>
                                        </div>
                                        <label for="avatar" style="text-align: center;  width: 170px;">អាប់ឡូតប្រវត្តិរូប</label><br>
                                        <input type="file" id="avatarInput" name="avatarInput" accept="image/*" onchange="previewAvatar(event)"><br>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>អុីមែល *</label>
                                        <input type="email" id="email" name="email" min="0" class="form-control" disabled
                                            placeholder="សូមបញ្ចូលអ៊ីមែល" data-errors="សូមបញ្ចូលអ៊ីមែល" required style="border: 1px solid #cbcbcb;">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>ភេទ *</label>
                                        <input type="hidden" id="hiddenslGender" name="hiddenslGender" value=" <?= $_GET['us_gender'] ?>">
                                        <select id="slGender" name="slGender" class="form-control" style="border: 1px solid #cbcbcb;">
                                            <option value='1'>ប្រុស</option>
                                            <option value='0'>ស្រី</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>ថ្ងៃខែ​ឆ្នាំ​កំណើត</label>
                                        <input type="hidden" id="hiddenslDob" name="hiddenslDob" value="<?=$_GET['us_dob']?>">
                                        <input type="date" id="dateDob" name="dateDob" min="0" class="form-control" 
                                            placeholder="សូមបញ្ចូលលេខទូរស័ព្ទ" data-errors="សូមបញ្ចូលលេខទូរស័ព្ទ" style="border: 1px solid #cbcbcb;"> 
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ពាក្យសម្ងាត់ *</label>
                                        <input type="text" id="textPassword" name="textPassword" min="0" class="form-control" disabled
                                            placeholder="សូមបញ្ចូលពាក្យសម្ងាត់" data-errors="សូមបញ្ចូលពាក្យសម្ងាត់" required style="border: 1px solid #cbcbcb;">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>តួនាទី *</label>
                                        <input type="hidden" id="hiddenSlRole" name="hiddenSlRole" value="<?=$_GET['us_role'];?>">
                                        <select id="slRole" name="slRole" class="form-control" style="border: 1px solid #cbcbcb;" onchange="toggleCheckboxes()">
                                            <option value="2">អ្នក​ប្រើ</option>
                                            <option value="1">អ្នកគ្រប់គ្រង</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>ការអនុញ្ញាត៖</label><br>
                                    <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                    <input type="checkbox" class="custom-control-input bg-primary" id="checkPurchase" name="checkPurchase" value="1" >
                                    <label class="custom-control-label" for="checkPurchase">ទិញ</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                    <input type="checkbox" class="custom-control-input bg-primary" id="checkAssign" name="checkAssign" value="1">
                                    <label class="custom-control-label" for="checkAssign">កំណត់សារពើភ័ណ្ឌទៅឱ្យអ្នកប្រើប្រាស់</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                    <input type="checkbox" class="custom-control-input bg-primary" id="checkAppro" name="checkAppro" value="1">
                                    <label class="custom-control-label" for="checkAppro">អ្នកអនុម័ត</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                    <input type="checkbox" class="custom-control-input bg-primary" id="checkUser" name="checkUser" value="1">
                                    <label class="custom-control-label" for="checkUser">គ្រប់គ្រងអ្នកប្រើប្រាស់</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <div class="form-group">
                                        <label>Address Details</label>
                                        <textarea name="textareaAddress" id="textareaAddress" class="form-control" rows="2" placeholder="Please enter address !!" style="border: 1px solid #cbcbcb;"><?=$_GET['us_address'];?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                        <input type="checkbox" class="custom-control-input bg-primary mr-2" id="checkboxSentemailUser" name="checkboxSentemailUser" value="1"; checked>
                                        <label class="custom-control-label" for="checkboxSentemailUser"> ជូនដំណឹងដល់អ្នកប្រើប្រាស់តាមអ៊ីមែល</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <a type="button" href="form_user_list.php" class="btn btn-light mr-2">បោះបង់</a>
                                    <button type="submit" class="btn btn-primary mr-2">រក្សាទុក</button>
                                    <button type="reset" class="btn btn-danger">កំណត់ឡើងវិញ</button>
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
    // Function to toggle checkboxes based on selected role
    function toggleCheckboxes() {
        var roleSelect = document.getElementById("slRole");
        var isAdmin = roleSelect.value === "1";

        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.disabled = isAdmin;
            if (isAdmin) {
                checkbox.checked = true;
            }else{
                checkbox.checked = false;
                var checkboxa = document.getElementById('checkboxSentemailUser');
                // Toggle the checked state of the checkbox
                checkbox.checked = !checkboxa.checked;
            }
        });

    }
    // Call toggleCheckboxes on page load to initialize checkbox states
    window.onload = toggleCheckboxes;
</script>

<script>
// Retrieve the value from the hidden input element
var us_gender = document.getElementById('hiddenslGender').value;
us_gender = parseInt(us_gender);
// Set the value of the select element
document.getElementById('slGender').value = us_gender;

var Dob = document.getElementById("hiddenslDob").value; 
// var Dob = "2024-01-29 ";
document.getElementById("dateDob").value = Dob; // Set the value of the date input element

var Role = document.getElementById("hiddenSlRole").value;
// alert(Role);
document.getElementById("slRole").value = Role;

// // Assuming dateValue is already defined
// var dateValue = "2024-01-29"; // Or whatever date value you want to assign

// // Set the value of the input element
// document.getElementById('dateDob').value = dateValue;


function previewAvatar(event) {
  const file = event.target.files[0];
  const reader = new FileReader();

  reader.onload = function(event) {
    const imgElement = document.querySelector('.avatar img');
    if (imgElement) {
      imgElement.src = event.target.result;
    } else {
      const newImgElement = document.createElement('img');
      newImgElement.src = event.target.result;
      newImgElement.alt = 'Avatar';
      document.querySelector('.avatar').appendChild(newImgElement);
    }
  };

  reader.readAsDataURL(file);
}

document.getElementById('profileForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the form from submitting normally

  // Gather form data
  const formData = new FormData(this);
  
  // Display form data
  let formDataString = '';
  for (const [key, value] of formData.entries()) {
    formDataString += `${key}: ${value}\n`;
  }
  alert(formDataString);
});
</script>