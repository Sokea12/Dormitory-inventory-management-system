<?php
    session_start();
    include("../config/connection.php");
    include("main_header.php");
?>
<style>
   /* input[type="file"] {
    display: none;
  } */
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

  .form-control.image-file {
    width: 100%;
    height: inherit;
    line-height: 25px;
    padding: 7px 10px;
    margin: 5px 0;
}
</style>

<form method="post" action="item/update_item.php" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="modal-header">
                        <h4 class="modal-title" id="titleItem">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 2 24 24"  width="30" height="30" fill="currentColor" class="w-5 h-5">
                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                            <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                            </svg>
                            ធ្វើបច្ចុប្បន្នភាពសម្ភារៈ៖
                        </h4>
                    </div>
                    <div class="card-body" >
                        <div class="row">
                            <input type="hidden" name="hiddenItemId" id="hiddenItemId" value="<?=$_GET['item_id'];?>">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ឈ្មោះ *</label>
                                    <input type="text" id="textItemName" name="textItemName" min="0" class="form-control" value="<?=$_GET['item_name'];?>"
                                    placeholder="សូមបញ្ចូលឈ្មោះសម្ភារៈ" data-errors="សូមបញ្ចូលឈ្មោះសម្ភារៈ" required style="border: 1px solid #cbcbcb;">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ប្រភេទ *</label>
                                    <input type="hidden" name="hiddenCategoryItemId" id="hiddenCategoryItemId" value="<?=$_GET['item_categoryid'];?>">
                                    <select name="slCategoryItemId" id="slCategoryItemId" class="selectpicker form-control" data-style="py-0" required>
                                    <option value="">ជ្រើសរើសប្រភេទសម្ភារៈ</option>
                                    <?php
                                        $query ="SELECT * FROM tbl_category";
                                        $query_run = mysqli_query($conn, $query);
                                        
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                            ?>
                                                <option value="<?= $row['category_id']; ?>"> <?= $row['category_name']; ?> </option>
                                            <?php
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>តម្លៃរាយ៖</label>
                                    <input type="number" id="item_retailprice" name="item_retailprice" min="0" class="form-control" value="<?=$_GET['item_retailprice'];?>"
                                        placeholder="សូមបញ្ចូលតម្លៃសម្ភារៈ" data-errors="សូមបញ្ចូលតម្លៃសម្ភារៈ" style="border: 1px solid #cbcbcb;">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>តម្លៃដុំ៖</label>
                                    <input type="number" id="item_wholesaleprice" name="item_wholesaleprice" min="0" class="form-control" value="<?=$_GET['item_wholesaleprice'];?>"
                                        placeholder="សូមបញ្ចូលតម្លៃសម្ភារៈ" data-errors="សូមបញ្ចូលតម្លៃសម្ភារៈ" style="border: 1px solid #cbcbcb;">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>រូបភាព :</label>
                                <div class="form-group custom-file mb-3">
                                    <input type="hidden" name="hiddenfileImage" id="hiddenfileImage" value="<?=$_GET['item_image'];?>">
                                    <input type="file" class="custom-file-input" id="fileImage" name="fileImage" value="" accept="image/*" style="">
                                    <label class="custom-file-label" for="fileImage">ជ្រើសរើស​ឯកសារ</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>បញ្ចូលទីតាំងបន្ថែម *</label>
                                    <select id="ilocation_locationid" name="ilocation_locationid[]" class="custom-select form-control choicesjs" placeholder="សូមបញ្ចូលទីតាំងសម្ភារៈ" data-errors="សូមបញ្ចូលទីតាំងសម្ភារៈ" multiple>
                                        <?php
                                           
                                            // Get the product's category ID from the URL parameter
                                            $stock_itemid = $_GET['item_id'];

                                            // Query to fetch the category IDs of the specified product
                                            $query ="SELECT * FROM tbl_stocks WHERE stock_itemid = $stock_itemid"; 
                                            $query_run = mysqli_query($conn, $query);

                                            // Initialize an empty array to store category IDs
                                            $ilocation_itemids = array();

                                            // Check if the query returned any rows
                                            if(mysqli_num_rows($query_run) > 0) {
                                                // Loop through the results
                                                foreach($query_run as $row) { 
                                                    // Add each category ID to the $item_ids array
                                                    $ilocation_itemids[] = $row['stock_locationid'];
                                                }
                                            }
                                           
                                           $query ="SELECT * FROM tbl_location WHERE location_type = 0";
                                            $query_run = mysqli_query($conn, $query);
                                            
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $rowl)
                                                {
                                                    // Check if the current category ID is not in the array of $item_ids
                                                    if(!in_array($rowl['location_id'], $ilocation_itemids)) {
                                                    ?>
                                                    <option value="<?= $rowl['location_id']; ?>"><?= $rowl['location_name'];?></option>
                                                    <?php
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>ការពិពណ៌នា៖</label>
                                    <textarea name="textareaDescription" id="textareaDescription" class="form-control" rows="2" placeholder="សូមបញ្ចូលចូលការពិពណ៌នា" data-errors="សូមបញ្ចូលចូលការពិពណ៌នា" style="border: 1px solid #cbcbcb;"><?=$_GET['item_dsc'];?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a type="button" href="form_item_list.php" class="btn btn-secondary mr-2">បោះបង់</a>
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

var slCategoryItemId = document.getElementById('hiddenCategoryItemId').value;

document.getElementById('slCategoryItemId').value = slCategoryItemId;

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
//   alert(formDataString);
});
</script>






