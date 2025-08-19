<?php
 session_start();
 include("../config/connection.php");
 include("main_header.php");
?>
<style>
    .circle {
      width: 15px;
      height: 15px;
      border-radius: 50%;
      display: inline-block;
      margin-right: 20px;
    }

    .blue-circle {
      background-color: blue;
    }

    .half-circle {
      background: linear-gradient(to right, blue 50%, white 50%);
    }

    .blue-border {
      background-color: white;
      border: 2px solid blue;
    }
  </style>
<!-- <form action="" method="post"></form> -->
<form>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 4 20 20"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                            <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                            </svg>
                            បញ្ជីបញ្ជាទិញទាំងអស់
                        </h4>
                        <!-- <p class="mb-0">Use category list as to describe your overall core business from the provided list. <br>
                        Click the name of the category where you want to add a list item. .</p> -->
                    </div>
                    <!-- <a href="page-add-category.html" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Category</a> -->
                    <a href="form_purchase_add.php" id="btnAddUser" class="btn btn-primary add-list">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 3 20 20"  width="20" height="20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                    បន្ថែមថ្មី
                    </a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-table table mb-0 tbl-server-info" style="background-color: White; border-radius: 10px; width: 230vh;">
                        <thead class="bg-white text-uppercase" id="tableIteme">
                            <tr style="background-color: White;">
                                <th>កាលបរិច្ឆេទ</th>
                                <th>កូដ</th>
                                <th>អ្នកផ្គត់ផ្គង់</th>
                                <th>ក្រុមហ៊ុន</th>
                                <th>អ្នកទិញ</th>
                                <th>ស្ថានភាព</th>
                                <th>ទទួល</th>
                                <th>កាលបរិច្ឆេទរំពឹងទុក</th>
                                <th>សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                        <?php
                            $query ="SELECT * FROM tbl_order WHERE or_status = 1"; 
                            $query_run = mysqli_query($conn, $query);
                                    
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    $spId = $row['or_supplier_id'];
                                    $userId = $row['or_buyer_id'];
                                ?>
                                <tr <?php if($row['or_draft'] != 0){ ?> class="text-success" style="color: rgb(0, 201, 100);" <?php }else{ ?> class='text-warning' <?php } ?>>
                                    <td> <?= $row['or_created_date'];?> </td>
                                    <td> <?= $row['or_code']?> </td>
                                   
                                   <?php
                                        // Construct the SQL query
                                        $sql = "SELECT sp_name, sp_company FROM tbl_suppliers WHERE sp_id = $spId";
                                        $query_run = mysqli_query($conn, $sql);
                                    
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $rows)
                                                {
                                            ?>
                                                <td> <?= $rows['sp_name'];?></td>
                                                <td> <?= $rows['sp_company']; ?></td>
                                            <?php
                                            // Close the result set
                                            // $result->close();
                                                }
                                            }
                                    ?>
                                    <?php
                                       
                                        // Construct the SQL query
                                        $sql = "SELECT us_username FROM tbl_users WHERE us_id = $userId AND us_status = 1";
                                        $query_run = mysqli_query($conn, $sql);
                                    
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $rowu)
                                                {
                                            ?>
                                                <td> <?= $rowu['us_username'];?> </td>
                                            <?php
                                                }
                                            } 
                                    ?>
                                           <td> <?php if($row['or_receive'] == 2){echo "<b>បានបញ្ចប់</b>";}else{echo "<b class='text-warning'>កំពុងរង់ចាំ</b>";} ?> </td>
                                           <td>
                                            <?php 
                                                // $row['or_receive'] = 1;
                                                if($row['or_receive'] == 0){echo '<div class="circle blue-border"></div>';}
                                                else if($row['or_receive'] == 1){echo '<div class="circle half-circle"></div>';}
                                                else{ echo '<div class="circle blue-circle"></div>';}
                                            ?>
                                            </td>
                                           <td><?=$row['or_expected_date'];?></td>
                                           <td>
                                            <div class="card-header-toolbar d-flex align-items-center" data-toggle="modal" data-target="#exampleModal">
                                                    <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton001" data-toggle="dropdown" aria-expanded="true" style="background-color: #bdc4d4; width: 100px; height: inherit; padding: 5px; font-size: 16px;">
                                                        សកម្មភាព
                                                        <svg style="width: 18px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                        </svg>
                                                    </span>
                                                    <div class="dropdown-menu fixed-element" aria-labelledby="dropdownMenuButton001" style="position: fixed; will-change: transform; top: 0px; left: 0px; transform: translate3d(-40px, 36px, 0px);" x-placement="bottom-end">
                                                    <!-- href="form_purchase_email.php?or_id=<?=$row['or_id'];?>&or_code=<?= $row['or_code'];?>&sp_name=<?= $rows['sp_name'];?>" <?php if($row['or_draft'] == 0){ ?><?php }else{ ?> style="display: none; "<?php } ?> -->
                                                    <!-- <button type="button" class="btn btn-primary mt-2 mr-2" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->
                                                        <a class="dropdown-item" onclick="purcheasTosupplier('<?=$row['or_id'];?>')" <?php if($row['or_draft'] == 0){ ?><?php }else{ ?> style="display: none; "<?php } ?>>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  width="20" stroke-width="2" stroke="currentColor" class="svg-icon mr-0 text-secondary">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                            </svg>
                                                            បញ្ចាទិញ
                                                        </a>
                                                        <a class="dropdown-item" href="form_purchase_receive.php?or_id=<?=$row['or_id'];?>&or_code=<?=$row['or_code'];?>&or_supplier_id=<?=$row['or_supplier_id'];?>" <?php if($row['or_draft'] == '0' || $row['or_draft'] == '1' && $row['or_receive'] == 2){ ?> style="display: none; "<?php } ?>>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  width="20" stroke-width="2" stroke="currentColor" class="svg-icon mr-0 text-secondary">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                                                            </svg>
                                                            ទទួល
                                                        </a>
                                                        <a class="dropdown-item" href="form_purchase_received.php?or_id=<?=$row['or_id'];?>&or_code=<?=$row['or_code'];?>&or_supplier_id=<?=$row['or_supplier_id'];?>&or_receive=<?=$row['or_receive']?>&receive=0" <?php if($row['or_draft'] == '0' || $row['or_receive'] == 2){ ?> style="display: none; "<?php } ?> " style="justify-content: flex-end;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  width="20" stroke-width="2" stroke="currentColor" class="svg-icon mr-0 text-secondary">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                                                            </svg>

                                                            បានទទួល
                                                        </a>
                                                        <a class="dropdown-item" href="form_purchase_detaile.php?or_id=<?=$row['or_id'];?>&or_code=<?= $row['or_code'];?>&us_username=<?=$rowu['us_username'];?>&or_supplier_id=<?=$row['or_supplier_id']?>&sp_name=<?= $rows['sp_name'];?>&sp_company=<?=$rows['sp_company'];?>&or_receive=<?=$row['or_receive']?>&or_draft=<?=$row['or_draft']?>" style="justify-content: flex-end;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  width="20" stroke-width="2" stroke="currentColor" class="svg-icon mr-0 text-secondary">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                            </svg>
                                                            មើល
                                                        </a>
                                                        <a class="dropdown-item" href="form_purchase_update.php?or_id=<?=$row['or_id'];?>&or_code=<?= $row['or_code'];?>&us_username=<?=$rowu['us_username'];?>&or_supplier_id=<?=$row['or_supplier_id']?>&sp_name=<?= $rows['sp_name'];?>&sp_company=<?=$rows['sp_company'];?>&or_receive=<?=$row['or_receive']?>&or_draft=<?=$row['or_draft']?>" <?php if($row['or_draft'] == 0){ ?><?php }else{ ?> style="display: none; "<?php } ?>  >
                                                            <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                            </svg>
                                                            ធ្វើបច្ចុប្បន្នភាព
                                                        </a>
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal" onclick="autoClickButton('<?=$row['or_id'];?>', '<?=$row['or_code'];?>')" <?php if($row['or_draft'] == 0){ ?><?php }else{ ?> style="display: none; "<?php } ?>>
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

                 

<!-- molad -->


<style>
    .quill-toolbar{
        overflow: hidden;
        height: 190px;
        min-height: 190px;
        max-height:190px;
    }

</style>
<!--  -->
<button id="autoButtonClickPO" style="display:none;" data-toggle="modal" data-target=".bd-example-modal-xl">Delete</button>
<form action="../sendemail/send.php?or_id=" method="post" id="myEmail">
<div class="modal fade fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
            <div class="modal-header">
                <h4 class="">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 4 20 20"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    </svg>
                    សរសេ់សារ៖
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">ប្រធានបទ៖</label>
                        <input type="hidden" id="hiddenOrid" name="hiddenOrid">
                        <input type="text" name="subject" class="form-control" value="" placeholder="សូមបញ្ចូលប្រធានបទ" data-errors="សូមបញ្ចូលប្រធានបទ" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">ទៅ៖</label>
                        <input type="email" name="email" class="form-control" value="" placeholder="សូមបញ្ចូលអុីមែល" data-errors="សូមបញ្ចូលអុីមែល" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">សរសេសារ៖</label>
                        <input type="hidden" id="message" name="message" required>
                        <div id="content-container">
                            <div id="quill-tool">
                                <button class="ql-bold" data-toggle="tooltip" data-placement="bottom" title="Bold"></button>
                                <button class="ql-underline" data-toggle="tooltip" data-placement="bottom" title="Underline"></button>
                                <button class="ql-italic" data-toggle="tooltip" data-placement="bottom" title="Add italic text <cmd+i>"></button>
                                <button class="ql-image" data-toggle="tooltip" data-placement="bottom" title="Upload image"></button>
                                <button class="ql-code-block" data-toggle="tooltip" data-placement="bottom" title="Show code"></button>
                            </div>
                            <div class="quill-toolbar" id="quill-toolbar" name="quill-toolbar" oninput="messageTosupplies()">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mb-2">
            <button type="submit" name="send" id="send" class="btn btn-primary mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 1 24 24"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                </svg>
                ផ្ញើ
            </button>
        </div>
    </div>
  </div>
</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
document.getElementById('message').value = " ";
if (jQuery("#quill-toolbar").length) {
var quill = new Quill('#quill-toolbar', {
    modules: {
        toolbar: '#quill-tool'
    },
    placeholder: 'Compose an epic...',
    theme: 'snow'
});
}
function messageTosupplies(){
    var message = document.getElementById('content-container').innerHTML; 
    document.getElementById('message').value = message;
    // alert(message);
}
</script>



<!-- Delete PO -->
<button id="autoButtonClick" style="display:none;" data-toggle="modal" data-target=".exampleModal">Delete</button>
<form action="purchase/delete_purchase.php" method="post">
<div class="modal fade exampleModal" id="exampleModal" name="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <h5 class="modal-title" id="exampleModalLabel">បញ្ជាក់ការលុប​​ !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="or_id" name="or_id" value="">
        <p>តើអ្នកប្រាកដថាចង់លុប <b><span id="deletePocode"></span></b> មែនទេ?</p>
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
    function purcheasTosupplier(or_id){
        document.getElementById('autoButtonClickPO').click();
        document.getElementById('hiddenOrid').value = or_id;
        // alert(or_id);
    }
  // Function to auto click the button with ID 'autoButtonClick'
  function autoClickButton(poid, pocode) {
    document.getElementById('autoButtonClick').click();
    document.getElementById('or_id').value = poid; 
    document.getElementById('deletePocode').innerText = pocode; 
    
    // alert(usName);
  }

//   // Check if the 'massage' parameter is set in the URL
//   var urlParams = new URLSearchParams(window.location.search);
//   if (urlParams.has('massage')) {
//     document.getElementById('autoButtonClick').click();
//   }
</script>
