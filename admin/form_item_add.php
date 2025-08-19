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

<form method="post" action="item/add_item.php" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="modal-header">
                        <h4 class="modal-title" id="titleItem">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 2 24 24"  width="30" height="30" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z" clip-rule="evenodd" />
                            </svg>
                            បន្ថែមសម្ភារៈថ្មី៖
                        </h4>
                    </div>
                    <div class="card-body" >
                        <div class="row">
                            <input type="hidden" name="hiddenItemId" id="hiddenItemId" value="">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ឈ្មោះ​ *</label>
                                    <input type="text" id="textItemName" name="textItemName" min="0" class="form-control"
                                        placeholder="សូមបញ្ចូលឈ្មោះសម្ភារៈ" data-errors="សូមបញ្ចូលឈ្មោះសម្ភារៈ" required style="border: 1px solid #cbcbcb;">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ប្រភេទ​ *</label>
                                    <input type="hidden" name="hiddenslCategoryId" id="hiddenslCategoryId" value="<?php if(isset($_GET['category_id'])){echo $_GET['category_id'];}?>">
                                    <select name="slCategoryItemId" id="slCategoryItemId" class="selectpicker form-control" data-style="py-0" required>
                                        <option value="">ជ្រើសរើសប្រភេទសម្ភារៈ</option>
                                    <?php
                                        $query ="SELECT * FROM tbl_category WHERE category_status = 1";
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
                                    <input type="number" id="item_retailprice" name="item_retailprice" min="0" class="form-control"
                                        placeholder="សូមបញ្ចូលតម្លៃសម្ភារៈ" data-errors="សូមបញ្ចូលតម្លៃសម្ភារៈ" style="border: 1px solid #cbcbcb;">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>តម្លៃដុំ៖</label>
                                    <input type="number" id="item_wholesaleprice" name="item_wholesaleprice" min="0" class="form-control"
                                        placeholder="សូមបញ្ចូលតម្លៃសម្ភារៈ" data-errors="សូមបញ្ចូលតម្លៃសម្ភារៈ" style="border: 1px solid #cbcbcb;">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>រូបភាព៖</label>
                                <div class="form-group custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="fileIcon" name="fileIcon" value="" accept="image/*" style="">
                                    <label class="custom-file-label" for="fileIcon">ជ្រើសរើស​ឯកសារ</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>ទីតាំង​ *</label>
                                    <select id="ilocation_locationid" name="ilocation_locationid[]" class="custom-select form-control choicesjs" placeholder="សូមបញ្ចូលទីតាំងសម្ភារៈ" data-errors="សូមបញ្ចូលទីតាំងសម្ភារៈ" required multiple>
                                        <?php
                                            $query ="SELECT * FROM tbl_location WHERE location_type = 0";
                                            $query_run = mysqli_query($conn, $query);
                                            
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                        ?>
                                                <option value="<?= $row['location_id']; ?>"><?= $row['location_name'];?></option>
                                        <?php
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
                                    <textarea name="textareaDescription" id="textareaDescription" class="form-control" rows="2" placeholder="សូមចូលការពិពណ៌នា" data-errors="សូមចូលការពិពណ៌នា" style="border: 1px solid #cbcbcb;"></textarea>
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






