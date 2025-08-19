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
                        <h4 class="modal-title" id="titleItem">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 4 20 20"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                            ព័ត៌មានលម្អិតអំពីអ្នកផ្គត់ផ្គង់
                        </h4>
                    </div>
                    <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <br>
                                            <div class="media mb-3">
                                                <div class="media-body ml-3">
                                                    <h5 class="mt-0 mb-1">ឈ្មោះ</h5>
                                                    <?=$_GET['sp_name'];?>
                                                </div>
                                            </div>
                                            <div class="media mb-3 ml-3">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-1">ទំនាក់ទំនង</h5>
                                                    <?=$_GET['sp_phone'];?>
                                                </div>
                                            </div>
                                            <div class="media mb-3 ml-3">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-1">អុីមែល</h5>
                                                    <?=$_GET['sp_email'];?> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <br>
                                            <div class="media mb-3">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-1">ឈ្មោះក្រុមហ៊ុន</h5>
                                                    <?=$_GET['sp_company'];?>
                                                </div>
                                            </div>
                                            <div class="media mb-3">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-1">អាស័យដ្ឋាន</h5>
                                                    <?=$_GET['sp_address'];?>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="media-body">
                                                    <h5 class="mt-2 mb-1">កាលបរិច្ឆេទបង្កើត</h5>
                                                    <?= $_GET['sp_created_date'];?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <br>
                                                <ul class="list-unstyled p-0 m-0 row">
                                                <li class="col-lg-5 col-md-6 col-sm-6 mt-2"><img src="../assets/images/user/<?=$_GET['sp_image'];?>" class="rounded w-100" alt="Responsive image" style="width: 190px; height: 190px;"></li>
                                                </ul>
                                                 <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="modal-header">
                                    <h4 class="modal-title" id="titleItem">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 3 24 24"  width="30" height="30" fill="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                    </svg>
                                        បញ្ជីសម្ភារ៖
                                    </h4>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div id="table" class="table-editable" style="background-color: White; border-radius: 10px;" >
                                        <table class="table table-bordered table-responsive-md table-striped text-center" style="border-radius: 10px;">
                                            <thead>
                                                <tr>
                                                    <th>កាលបរិច្ឆេទបង្កើត</th>
                                                    <th>ឈ្មោះ</th>
                                                    <td>ប្រភេទ</td>
                                                    <td>តម្លៃរាយ</td>
                                                    <td>តម្លៃដុំ</td>
                                                    <th>ការពិពណ៌នា</th>
                                                    <th>រូបភាព</th> 
                                                </tr>
                                            </thead>
                                            <tbody class="ligth-body">
                                            <?php
                                                $pro_spid = $_GET['sp_id'];
                                                $query ="SELECT * FROM tbl_produce WHERE pro_spid = $pro_spid"; 
                                                $query_run = mysqli_query($conn, $query);
                                                        
                                                if(mysqli_num_rows($query_run) > 0)
                                                {
                                                    foreach($query_run as $row)
                                                    { 
                                                    ?>
                                                    <td><?=$row['pro_created_date'];?></td>
                                                    <?php
                                                        $itemId = $row['pro_itemid'];
                                                        $query ="SELECT * FROM tbl_item WHERE item_id = $itemId AND item_status = '1'"; 
                                                        $query_run = mysqli_query($conn, $query);
                                                                
                                                        if(mysqli_num_rows($query_run) > 0)
                                                        {
                                                            foreach($query_run as $rows)
                                                            { 
                                                            ?>
                                                            <td><?=$rows['item_name'];?></td>
                                                            <?php
                                                                $item_categoryid = $rows['item_categoryid'];
                                                                $query ="SELECT category_name FROM tbl_category WHERE category_id = $item_categoryid"; 
                                                                $query_run = mysqli_query($conn, $query);
                                                                        
                                                                if(mysqli_num_rows($query_run) > 0)
                                                                {
                                                                    foreach($query_run as $row)
                                                                    { 
                                                            ?>
                                                            <td><?=$row['category_name'];?></td>
                                                            <?php
                                                                    }
                                                                }
                                                            ?>
                                                            <td><?=$rows['item_retailprice'];?></td>
                                                            <td><?=$rows['item_wholesaleprice'];?></td>
                                                            <td><?=$rows['item_dsc'];?></td>
                                                            <td>
                                                                <img src="../assets/images/categorys/<?=$rows['item_image'];?>" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                            </td>
                                                            <?php
                                                            }
                                                        }
                                                    ?>
                                                    
                                                    </tr>
                                                    <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <tr>
                                                        <td colspan="8">No data available in table</td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5 pb-3">
                                <a type="button" href="form_supplies_list.php" class="btn btn-secondary mr-2">ត្រឡប់</a>
                                <a class="btn btn-primary mr-2" href="form_supplies_additem.php?sp_id=<?=$_GET['sp_id'];?>&sp_name=<?=$_GET['sp_name'];?>&sp_company=<?=$_GET['sp_company'];?>&sp_phone=<?=$_GET['sp_phone'];?>&sp_email=<?=$_GET['sp_email'];?>&sp_address=<?=$_GET['sp_address'];?>&sp_image=<?=$_GET  ['sp_image'];?>&sp_created_date=<?= $_GET['sp_created_date'];?>">បន្ថែមសម្ភារៈថ្មី</a>
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
