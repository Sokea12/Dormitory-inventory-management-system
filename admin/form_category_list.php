<?php
 session_start();
 include("../config/connection.php");
 include("main_header.php");
?>
<!-- <form action="" method="post"></form> -->
<form>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 4 24 24"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                        <path d="M16.5 6a3 3 0 0 0-3-3H6a3 3 0 0 0-3 3v7.5a3 3 0 0 0 3 3v-6A4.5 4.5 0 0 1 10.5 6h6Z" />
                        <path d="M18 7.5a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-7.5a3 3 0 0 1-3-3v-7.5a3 3 0 0 1 3-3H18Z" />
                        </svg>
                        បញ្ជីប្រភេទសម្ភារៈ
                        </h4>
                    </div>
                    <!-- <a href="page-add-category.html" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Category</a> -->
                    <a href="form_category_add.php" id="btnAddUser" class="btn btn-primary add-list">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 2 24 24"  width="20" height="20" fill="none" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    បន្ថែមប្រភេទថ្មី
                    </a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-table table mb-0 tbl-server-info" style="background-color: White; border-radius: 10px;">
                        <thead class="bg-white text-uppercase" id="tableIteme">
                            <tr class="" style="background-color: White;">
                                <th>កាលបរិច្ឆេទបង្កើត</th>
                                <th>ឈ្មោះ</th>
                                <th>លេខកូដ</th>
                                <th>ការពិពណ៌នា</th>
                                <th>រូបតំណាង</th>  
                                <th>សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                        <?php
                            $num = 1;
                            $query ="SELECT * FROM tbl_category WHERE category_status = 1"; 
                            $query_run = mysqli_query($conn, $query);
                                    
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                { 
                                ?>
                                 <td><?= $row['category_created_date']; ?></td>
                                 <td><?= $row['category_name']; ?></td>
                                 <td><?= $row['category_code']; ?></td>
                                 <td><?= $row['category_dsc']; ?></td>
                                 <td>
                                    <img src="../assets/images/categorys/<?= $row['category_image']; ?>" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                </td>
                               <td>
                                <div class="card-header-toolbar d-flex align-items-center" data-toggle="modal" data-target="#exampleModal">
                                        <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton001" data-toggle="dropdown" aria-expanded="true" style="background-color: #bdc4d4; width: 100px; height: inherit; padding: 5px; font-size: 16px;">
                                        សកម្មភាព
                                            <svg style="width: 18px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </span>
                                        <div class="dropdown-menu fixed-element" aria-labelledby="dropdownMenuButton001" style="position: fixed; will-change: transform; top: 0px; left: 0px; transform: translate3d(-40px, 36px, 0px);" x-placement="bottom-end">
                                            <a class="dropdown-item" href="form_category_detail.php?category_id=<?=$row['category_id'];?>&category_name=<?=$row['category_name'];?>&category_code=<?=$row['category_code'];?>&category_dsc=<?=$row['category_dsc'];?>&category_created_date=<?=$row['category_created_date']; ?>&category_image=<?= $row['category_image'];?>" style="justify-content: flex-end;  " >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  width="20" stroke-width="2" stroke="currentColor" class="svg-icon mr-0 text-secondary">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                                មើល
                                            </a>
                                            <a class="dropdown-item" href="form_category_update.php?category_id=<?=$row['category_id'];?>&category_name=<?=$row['category_name'];?>&category_dsc=<?=$row['category_dsc'];?>&category_image=<?=$row['category_image'];?>">
                                                <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                ធ្វើបច្ចុប្បន្នភាព
                                            </a>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal" onclick="autoClickButton('<?=$row['category_id'];?>', '<?=$row['category_name'];?>')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  width="20" stroke-width="2" stroke="currentColor" class="svg-icon mr-0 text-secondary">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                                លុប
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                </td>
                                </tr>
                                <?php
                                }
                            }
                        ?>
                        </tbody>
                    </table>
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
<form action="category/delete_category.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">សូមបញ្ជាក់ការលុប​ !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="category_id" name="category_id" value="">
        <p>តើអ្នកប្រាកដថាចង់លុប <b><span id="deleteCategoryName"></span></b> មែនទេ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">បោះបង់</button>
        <button type="submit" class="btn btn-danger" id="confirmDeleteButton">លុប</button>
      </div>
    </div>
  </div>
</div>
</form>
<script>
  // Function to auto click the button with ID 'autoButtonClick'
  function autoClickButton(categoryId, categoryName) {
    document.getElementById('autoButtonClick').click();
    document.getElementById('category_id').value = categoryId; 
    document.getElementById('deleteCategoryName').innerText = categoryName; 
    
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
