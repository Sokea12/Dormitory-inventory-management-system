<?php
 session_start();
 include("../config/connection.php");
 include("main_header.php");
?>
<!-- <form action="" method="post"></form> -->
<form>
    <div class="container-fluid" style="margin-bottom: 30px;">
        <div class="row">
            <div class="col-lg-12">
                    <div id="table" class="table-editable" style="background-color: White; border-radius: 10px;">
                    <div class="modal-header">
                    <h4 class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 3 24 24"  width="30" height="30" fill="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                        </svg>
                        ព័ត៌មានលម្អិតអំពីសម្ភារៈ៖
                        </h4>
                        <div class="header-title" style="float: right;">
                            <div class="profile-icon bg-primary-light svg-primary text-center"> 
                            <a href="form_item_list.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m15 15 6-6m0 0-6-6m6 6H9a6 6 0 0 0 0 12h3" />
                                </svg>
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-3">
                                    <br><br><br>
                                        <div class="media ml-3 mb-3">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">ឈ្មោះសម្ភារ៖</h5>
                                                <?=$_GET['item_name'];?> 
                                            </div>
                                        </div>
                                        <div class="media ml-3 mb-3">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">ប្រភេទ៖</h5>
                                                <?=$_GET['category_name'];?>
                                            </div>
                                        </div>
                                        <div class="media ml-3 mb-3">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">ការពិពណ៌នា៖</h5>
                                                <?=$_GET['item_dsc'];?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 pb-5">
                                        <br><br><br>
                                        <div class="media mb-3">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">តម្លៃរាយ​​​​៖</h5>
                                                <?=$_GET['item_retailprice'];?>
                                            </div>
                                        </div>
                                        <div class="media mb-3">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">តម្លៃដុំ៖</h5>
                                                <?=$_GET['item_wholesaleprice'];?>
                                            </div>
                                        </div>
                                        <div class="media mb-3">
                                            <div class="media-body">
                                                <h5 class="mt-2 mb-1">កាលបរិច្ឆេទបង្កើត</h5>
                                                <?=$_GET['item_created_date'];?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                    <div class="col-lg-6 pb-5">
                                        <div class="form-group">
                                            <br><br><br>
                                            <ul class="list-unstyled p-0 m-0 row">
                                            <li class="col-lg-7 col-md-6 col-sm-6 mt-2"><img src="../assets/images/categorys/<?=$_GET['item_image'];?>" class="rounded w-100" alt="Responsive image" style="width: 190px; height: 270px;"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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


<!-- Modal -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auto Button Click</title>
</head>
<body>
<!-- Button to trigger modal -->
<button id="autoButtonClick" style="display:none;" data-toggle="modal" data-target="#exampleModal" data-delete-modal-values="<?= $row['us_id']; ?>|<?= $user_profile['usf_firstname']; ?>">Delete</button>

<!-- Modal -->
<form action="item/delete_item.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="hiddenItemId" name="hiddenItemId" value="">
        <p>Are you sure you want to delete <span id="deleteItemName"></span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
      </div>
    </div>
  </div>
</div>
</form>
<script>
  // Function to auto click the button with ID 'autoButtonClick'
  function autoClickButton(itemId, itemName) {
    document.getElementById('autoButtonClick').click();
    document.getElementById('hiddenItemId').value = itemId; 
    document.getElementById('deleteItemName').innerText = itemName; 
    
    // alert(usName);
  }

  // Check if the 'massage' parameter is set in the URL
  var urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has('massage')) {
    // document.getElementById('autoButtonClick').click();
  }
</script>

</body>
</html>
