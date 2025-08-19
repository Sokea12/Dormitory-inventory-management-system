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
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 4 20 20"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        បញ្ជីផ្គត់ផ្គង់ទាំងអស់
                        </h4>
                    </div>
                    <!-- <a href="page-add-category.html" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Category</a> -->
                    <a href="form_supplies_add.php" id="btnAddUser" class="btn btn-primary add-list">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 2 20 20"  width="20" height="20" fill="currentColor" class="w-5 h-5">
                    <path d="M10 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM16.25 5.75a.75.75 0 0 0-1.5 0v2h-2a.75.75 0 0 0 0 1.5h2v2a.75.75 0 0 0 1.5 0v-2h2a.75.75 0 0 0 0-1.5h-2v-2Z" />
                    </svg>
                    បន្ថែមអ្នកផ្គត់ផ្គង់ថ្មី
                    </a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-table table mb-0 tbl-server-info" style="background-color: White; border-radius: 10px; width: 176vh;">
                        <thead class="bg-white text-uppercase" id="tableIteme">
                            <tr class="" style="background-color: White;">
                                <th>រូបភាព</th>   
                                <th>ឈ្មោះ</th>
                                <th>អុីមែល</th>
                                <th>ទំនាក់ទំនង</th>
                                <th>ក្រុមហ៊ុន</th>
                                <th>អាស័យដ្ឋាន</th>
                                <th>សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                        <?php
                            $num = 1;
                            $query ="SELECT * FROM tbl_suppliers"; 
                            $query_run = mysqli_query($conn, $query);
                                    
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                { 
                                ?>
                                 <td>
                                 <img src="../assets/images/user/<?= $row['sp_image']; ?>" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                 </td>
                                 <td><?= $row['sp_name']; ?></td>
                                 <td><?= $row['sp_email']; ?></td>
                                 <td><?= $row['sp_phone']; ?></td>
                                 <td><?= $row['sp_company']; ?></td>
                                 <td><?= $row['sp_address']; ?></td>
                               <td>
                                <div class="card-header-toolbar d-flex align-items-center" data-toggle="modal" data-target="#exampleModal">
                                        <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton001" data-toggle="dropdown" aria-expanded="true" style="background-color: #bdc4d4; width: 100px; height: inherit; padding: 5px; font-size: 16px;">
                                        សកម្មភាព
                                            <svg style="width: 18px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </span>
                                        <div class="dropdown-menu fixed-element" aria-labelledby="dropdownMenuButton001" style="position: fixed; will-change: transform; top: 0px; left: 0px; transform: translate3d(-40px, 36px, 0px);" x-placement="bottom-end">
                                            <a class="dropdown-item" href="form_suppies_detail.php?sp_id=<?=$row['sp_id'];?>&sp_name=<?=$row['sp_name'];?>&sp_company=<?=$row['sp_company'];?>&sp_email=<?=$row['sp_email'];?>&sp_phone=<?=$row['sp_phone'];?>&sp_address=<?=$row['sp_address'];?>&sp_image=<?=$row['sp_image'];?>&sp_created_date=<?= $row['sp_created_date'];?>" style="justify-content: flex-end;  " >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  width="20" stroke-width="2" stroke="currentColor" class="svg-icon mr-0 text-secondary">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                                មើល
                                            </a>
                                            <a class="dropdown-item" href="form_supplies_update.php?sp_id=<?=$row['sp_id'];?>&sp_name=<?=$row['sp_name'];?>&sp_company=<?=$row['sp_company'];?>&sp_phone=<?=$row['sp_phone'];?>&sp_email=<?=$row['sp_email'];?>&sp_address=<?=$row['sp_address'];?>&sp_image=<?=$row['sp_image'];?>">
                                                <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                ធ្វើបច្ចុប្បន្នភាព
                                            </a>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal" onclick="autoClickButton('<?=$row['sp_id'];?>', '<?=$row['sp_name']; ?>' )">
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
<form action="supplier/delete_supplier.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">​បញ្ជាក់ការលុប</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="sp_id" name="sp_id" value="">
        <p>តើ​អ្នក​ប្រាកដ​ជា​ចង់​លុប <span id="deleteUserName"></span> មែនទេ?</p>
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
  function autoClickButton(spId, usName) {
    document.getElementById('autoButtonClick').click();
    document.getElementById('sp_id').value = spId; 
    document.getElementById('deleteUserName').innerText = usName; 
    
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
