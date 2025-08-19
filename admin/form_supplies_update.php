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

    <form method="post" action="supplier/update_supplier.php" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="modal-header">
                            <h4 class="modal-title" id="titleItem">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 3 20 20"  width="30" height="30" fill="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                                កែសម្រួលព័ត៌មានរបស់អ្នកលក់
                            </h4>
                        </div>
                        <div class="card-body" >
                            <div class="row">
                                <input type="hidden" name="hiddenItemId" id="hiddenItemId" value="<?= $_GET['sp_id']; ?>">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ឈ្នោះ *</label>
                                        <input type="text" id="textSuppname" name="textSuppname" min="0" class="form-control" value="<?=$_GET['sp_name'];?>"
                                            placeholder="សូមបញ្ចូលឈ្មោះអ្នកផ្គត់ផ្គង់" data-errors="សូមបញ្ចូលឈ្មោះអ្នកផ្គត់ផ្គង់" required style="border: 1px solid #cbcbcb;">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                    <label>ក្រុមហ៊ុន៖</label>
                                        <input type="text" id="textCompany" name="textCompany" min="0" class="form-control" value="<?=$_GET['sp_company'];?>"
                                            placeholder="សូមចូលឈ្មោះក្រុមហ៊ុន" data-errors="សូមចូលឈ្មោះក្រុមហ៊ុន" style="border: 1px solid #cbcbcb;">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>លេខទូរស័ព្ទៈ</label>
                                        <input type="text" id="textPhone" name="textPhone" min="0" class="form-control" value="<?=$_GET['sp_phone'];?>"
                                            placeholder="សូមបញ្ចូលលេខទូរស័ព្ទ" data-errors="សូមបញ្ចូលលេខទូរស័ព្ទ" style="border: 1px solid #cbcbcb;">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <div class="avatar-wrapper" onclick="document.getElementById('avatarInput').click()">
                                            <div class="" style="text-align: center; width: 100%;">
                                                <i class="avatar">
                                                <input type="hidden" id="sp_image" name="sp_image" value="<?=$_GET['sp_image'];?>">
                                                <img src="../assets/images/user/<?=$_GET['sp_image'];?>" class="img-fluid rounded mr-3">
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>អុីមែល៖ *</label>
                                        <input type="email" id="email" name="email" min="0" class="form-control" value="<?=$_GET['sp_email'];?>" required
                                            placeholder="សូមបញ្ចូលអ៊ីមែល" data-errors="សូមបញ្ចូលអ៊ីមែល" style="border: 1px solid #cbcbcb;">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>សម្ភារៈ *</label>
                                        <div style="border: 1px solid #cbcbcb; border-radius: 6px;">
                                        <select id="itemSelect" name="itemSelect[]" class="custom-select form-control choicesjs" placeholder="សូមបញ្ចូលសម្ភារៈ" data-errors="សូមបញ្ចូលសម្ភារៈ" multiple>
                                            <?php
                                            // Assuming you already have a database connection stored in $conn

                                            // Get the product's category ID from the URL parameter
                                            $pro_spid = $_GET['sp_id'];

                                            // Query to fetch the category IDs of the specified product
                                            $query ="SELECT * FROM tbl_produce WHERE pro_spid = $pro_spid"; 
                                            $query_run = mysqli_query($conn, $query);

                                            // Initialize an empty array to store category IDs
                                            $item_ids = array();

                                            // Check if the query returned any rows
                                            if(mysqli_num_rows($query_run) > 0) {
                                                // Loop through the results
                                                foreach($query_run as $row) { 
                                                    // Add each category ID to the $item_ids array
                                                    $item_ids[] = $row['pro_itemid'];
                                                }
                                            }

                                            // Query to fetch all active categories
                                            $query ="SELECT * FROM tbl_item WHERE item_status = 1"; 
                                            $query_run = mysqli_query($conn, $query);

                                            // Check if the query returned any rows
                                            if(mysqli_num_rows($query_run) > 0) {
                                                // Loop through the results
                                                foreach($query_run as $rows) { 
                                                    // Check if the current category ID is not in the array of $item_ids
                                                    if(!in_array($rows['item_id'], $item_ids)) {
                                                        ?>
                                                        <!-- Output the option tag for each category -->
                                                        <option value="<?= $rows['item_id']; ?>"><?= $rows['item_name']; ?></option>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                         </select>
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>អាសយដ្ឋានៈ</label>
                                        <textarea name="textareaAddress" id="textareaAddress" class="form-control" rows="2" placeholder="សូមបញ្ចូលអាសយដ្ឋាន!!" style="border: 1px solid #cbcbcb;"><?=$_GET['sp_address'];?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a type="button" href="form_supplies_list.php" class="btn btn-secondary mr-2">បោះបង់</a>
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