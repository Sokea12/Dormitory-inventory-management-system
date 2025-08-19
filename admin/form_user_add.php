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

    <form method="post" action="user/add_user.php" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="modal-header">
                            <h4 class="modal-title" id="titleItem">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 2 20 20"  width="30" height="30" fill="currentColor" class="w-5 h-5">
                                <path d="M10 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM16.25 5.75a.75.75 0 0 0-1.5 0v2h-2a.75.75 0 0 0 0 1.5h2v2a.75.75 0 0 0 1.5 0v-2h2a.75.75 0 0 0 0-1.5h-2v-2Z" />
                                </svg>
                                បន្ថែមអ្នកប្រើប្រាស់ថ្មី៖
                            </h4>
                        </div>
                        <div class="card-body" >
                            <div class="row">
                                <input type="hidden" name="hiddenItemId" id="hiddenItemId" value="">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>គោត្ដនាម *</label>
                                        <input type="text" id="textFname" name="textFname" min="0" class="form-control"
                                            placeholder="សូមបញ្ចូលគោត្តនាម" data-errors="សូមបញ្ចូលគោត្តនាម" required style="border: 1px solid #cbcbcb;">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>នាម *</label>
                                        <input type="text" id="textLname" name="textLname" min="0" class="form-control"
                                            placeholder="សូមបញ្ចូលនាម" data-errors="សូមបញ្ចូលនាម" required style="border: 1px solid #cbcbcb;">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>ទំនាក់ទំនង *</label>
                                        <input type="text" id="textPhone" name="textPhone" min="0" class="form-control"
                                            placeholder="សូមបញ្ចូលលេខទូរស័ព្ទ" data-errors="សូមបញ្ចូលលេខទូរស័ព្ទ" required style="border: 1px solid #cbcbcb;">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="avatar-wrapper" onclick="document.getElementById('avatarInput').click()">
                                            <div class="" style="text-align: center; width: 100%;">
                                                <i class="avatar">
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
                                        <input type="email" id="email" name="email" min="0" class="form-control"
                                            placeholder="សូមបញ្ចូលអ៊ីមែល" data-errors="សូមបញ្ចូលអ៊ីមែល" required style="border: 1px solid #cbcbcb;">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>ភេទ *</label>
                                        <select id="slGender" name="slGender" class="form-control" style="border: 1px solid #cbcbcb;">
                                            <option value="1">ប្រុស</option>
                                            <option value="0">ស្រី</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>ថ្ងៃខែ​ឆ្នាំ​កំណើត</label>
                                        <input type="date" id="dateDob" name="dateDob" min="0" class="form-control"
                                            placeholder="Please enter phone number" data-errors="Please enter phone number" style="border: 1px solid #cbcbcb;"> 
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ពាក្យសម្ងាត់ *</label>
                                        <input type="text" id="textPassword" name="textPassword" min="0" class="form-control"
                                            placeholder="សូមបញ្ចូលពាក្យសម្ងាត់" data-errors="សូមបញ្ចូលពាក្យសម្ងាត់" required style="border: 1px solid #cbcbcb;">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>តួនាទី *</label>
                                        <select id="slRole" name="slRole" class="form-control" style="border: 1px solid #cbcbcb;">
                                            <option value="2">អ្នក​ប្រើ</option>
                                            <option value="1">អ្នកគ្រប់គ្រង</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>ព័ត៌មានលម្អិតអំពីអាសយដ្ឋាន</label>
                                        <textarea name="textareaAddress" id="textareaAddress" class="form-control" rows="2" placeholder="សូមបញ្ចូលអាសយដ្ឋាន!!" style="border: 1px solid #cbcbcb;"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                   <div class="checkbox d-inline-block mb-12">
                                       <span class=""> <input type="checkbox" class="checkbox d-inline-block mr-2" id="checkboxSentemailUser" name="checkboxSentemailUser" value="1"; checked  style="width: 20px;"></span>
                                       <span class="table-add float-right mb-4 mr-4"> <label for="checkbox1">ជូនដំណឹងដល់អ្នកប្រើប្រាស់តាមអ៊ីមែល</label></span>
                                    </div> <br>
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
// document.addEventListener('DOMContentLoaded', function() {
//     // Select the "Add New User" button
//     const addButton = document.querySelector('button[type="submit"]');

//     // Add event listener to the button
//     addButton.addEventListener('click', function(event) {
//         // Prevent the default form submission behavior
//         event.preventDefault();

//         // Selecting form inputs by their IDs
//         const textFnameValue = document.querySelector('#textFname').value;
//         const textLnameValue = document.querySelector('#textLname').value;
//         const textPhoneValue = document.querySelector('#textPhone').value;  
//         const avatarInputValue = document.querySelector('#avatarInput').value;
//         const slGenderValue = document.querySelector('#slGender').value;
//         const dateDobValue = document.querySelector('#dateDob').value;
//         const emailValue = document.querySelector('#email').value;
//         const textPasswordValue = document.querySelector('#textPassword').value;
//         const slRoleValue = document.querySelector('#slRole').value;
//         const textareaAddressValue = document.querySelector('#textareaAddress').value;
        // const checkboxSentemailUserChecked = document.querySelector('#checkboxSentemailUser').checked;

        // // Alerting the values
        // alert("First Name: " + textFnameValue + 
        //       "\nLast Name: " + textLnameValue + 
        //       "\nPhone Number: " + textPhoneValue + 
        //       "\nAvatar Input: " + avatarInputValue + 
        //       "\nGender: " + slGenderValue + 
        //       "\nDate of Birth: " + dateDobValue + 
        //       "\nEmail: " + emailValue + 
        //       "\nPassword: " + textPasswordValue + 
        //       "\nRole: " + slRoleValue +
        //       "\nAddress: " + textareaAddressValue + 
            //   "\nNotify User by Email: " + checkboxSentemailUserChecked);
        
        // Execute the POST request
//         $.post("user/add_user.php", {
//             textFname: textFnameValue,
//             textLname: textLnameValue,
//             textPhone: textPhoneValue,
//             avatarInput: avatarInputValue,
//             slGender: slGenderValue,
//             dateDob: dateDobValue,
//             email: emailValue,
//             textPassword: textPasswordValue,
//             slRole: slRoleValue,
//             textareaAddress: textareaAddressValue,
            // checkboxSentemailUser: checkboxSentemailUserChecked ? 'checked' : 'unchecked' // Sending checkbox value as a string
//         }, function(result) {
//             alert(result); // Alerting the result of the POST request
//             window.location.href = "form_list_user.php";
//         });
//     });
// });



</script>

<script>
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