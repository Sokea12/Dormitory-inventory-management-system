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

<form method="post" action="category/add_category.php" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="modal-header">
                        <h4 class="modal-title" id="titleItem">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 2 20 20"  width="30" height="30" fill="currentColor" class="w-5 h-5">
                            <path d="M2 4.25A2.25 2.25 0 0 1 4.25 2h6.5A2.25 2.25 0 0 1 13 4.25V5.5H9.25A3.75 3.75 0 0 0 5.5 9.25V13H4.25A2.25 2.25 0 0 1 2 10.75v-6.5Z" />
                            <path d="M9.25 7A2.25 2.25 0 0 0 7 9.25v6.5A2.25 2.25 0 0 0 9.25 18h6.5A2.25 2.25 0 0 0 18 15.75v-6.5A2.25 2.25 0 0 0 15.75 7h-6.5Z" />
                            </svg>
                            បន្ថែមប្រភេទថ្មី
                        </h4>
                    </div>
                    <div class="card-body" >
                        <div class="row">
                            <input type="hidden" name="hiddenItemId" id="hiddenItemId" value="">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ឈ្មោះ​ *</label>
                                    <input type="text" id="textCategoryName" name="textCategoryName" min="0" class="form-control"
                                        placeholder="សូមបញ្ចូលឈ្មោះប្រភេទ។" data-errors="សូមបញ្ចូលឈ្មោះប្រភេទ។" required style="border: 1px solid #cbcbcb;">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>លេខកូដប្រភេទសម្ភារៈ</label>
                                    <input type="text" id="textCategoryCode" name="textCategoryCode" min="0" class="form-control" disabled
                                        placeholder="សូមបញ្ចូលលេខកូដប្រភេទ។" data-errors="សូមបញ្ចូលលេខកូដប្រភេទ។" style="border: 1px solid #cbcbcb;">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>រូបតំណាងៈ</label>
                                <div class="form-group custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="fileIcon" name="fileIcon" value="" accept="image/*" style="">
                                    <label class="custom-file-label" for="fileIcon">ជ្រើសរើស​ឯកសារ</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>ការពិពណ៌នាៈ</label>
                                    <textarea name="textareaDescription" id="textareaDescription" class="form-control" rows="2" placeholder="សូមចូលការពិពណ៌នា​។" data-errors="សូមចូលការពិពណ៌នា​។" style="border: 1px solid #cbcbcb;"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a type="button" href="form_category_list.php" class="btn btn-light mr-2">បោះបង់</a>
                                <button type="submit" class="btn btn-primary mr-2">បន្ថែមឥឡូវនេះ</button>
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






