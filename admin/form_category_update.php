<?php
    session_start();
    include("../config/connection.php");
    include("main_header.php");
?>
<style>
  /* input[type="file"] {
    display: none; /* Hide the file input */
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

<form method="post" action="category/update_category.php" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="modal-header">
                        <h4 class="modal-title" id="titleItem">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 3 24 24"  width="30" height="30" fill="currentColor" class="w-5 h-5">
                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                            <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                            </svg>
                            ធ្វើបច្ចុប្បន្នភាព​ប្រភេទសម្ភារ៖
                        </h4>
                    </div>
                    <div class="card-body" >
                        <div class="row">
                            <input type="hidden" name="hiddenCategoryId" id="hiddenCategoryId" value="<?=$_GET['category_id'];?>">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ឈ្មោះ​ *</label>
                                    <input type="text" id="textCategoryName" name="textCategoryName" min="0" class="form-control" value="<?=$_GET['category_name'];?>"
                                        placeholder="សូមបញ្ចូលឈ្មោះប្រភេទ។" data-errors="សូមបញ្ចូលឈ្មោះប្រភេទ។" required style="border: 1px solid #cbcbcb;">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>លេខកូដ៖</label>
                                    <input type="text" id="textCategoryCode" name="textCategoryCode" min="0" class="form-control" disabled
                                        placeholder="សូមបញ្ចូលលេខកូដប្រភេទ។" data-errors="សូមបញ្ចូលលេខកូដប្រភេទ។" style="border: 1px solid #cbcbcb;">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>រូបតំណាង៖</label>
                                <div class="form-group custom-file mb-3">
                                    <input type="hidden" name="hiddenfileIcon" id="hiddenfileIcon" value="<?=$_GET['category_image'];?>">
                                    <input type="file" class="custom-file-input" id="fileIcon" name="fileIcon" value="" accept="image/*" style="">
                                    <label class="custom-file-label" for="fileIcon">ជ្រើសរើស​ឯកសារ</label>
                                 </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>ការពិពណ៌នា៖</label>
                                    <textarea name="textareaDescription" id="textareaDescription" class="form-control" rows="2" placeholder="សូមចូលការពិពណ៌នា។" data-errors="សូមចូលការពិពណ៌នា។" style="border: 1px solid #cbcbcb;"><?=$_GET['category_dsc'];?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a type="button" href="form_category_list.php" class="btn btn-light mr-2">បោះបង់</a>
                                <button type="submit" class="btn btn-primary mr-2">ធ្វើបច្ចុប្បន្នភាព</button>
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
<!-- 
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
</script> -->






