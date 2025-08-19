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
                            <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                            </svg>
                            ទីតាំងប្រើប្រាស់៖
                        </h4>
                        <!-- <p class="mb-0">Use category list as to describe your overall core business from the provided list. <br>
                        Click the name of the category where you want to add a list item. .</p> -->
                    </div>
                    <!-- <a href="page-add-category.html" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Category</a> -->
                    <a href="#" id="btnAddUser" class="btn btn-primary add-list" data-toggle="modal" data-target=".exampleModal" onclick="addStocks(1)">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 2 24 24"  width="24" height="24" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                    បន្ថែទីតាំងថ្មី
                    </a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-table table mb-0 tbl-server-info" style="background-color: White; border-radius: 10px; width: 176vh;">
                        <thead class="bg-white text-uppercase" id="tableIteme">
                            <tr class="" style="background-color: White;">
                                <th>#</th>
                                <th>កាលបរិច្ឆេទ </th>
                                <th>ឈ្មោះទីតាំង</th>
                                <th>ការពិពណ៌នា</th>
                                <th>សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                        <?php
                            $num = 0;
                            $query ="SELECT * FROM tbl_location WHERE location_type = '1' AND location_status = '1'"; 
                            $query_run = mysqli_query($conn, $query);
                                    
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {   
                                ?>
                                <tr>
                                    <td><?=$num+=1;?></td>
                                    <td><?=$row['location_date'];?></td>
                                    <td><?=$row['location_name'];?></td>
                                    <td><?=$row['location_dsc'];?></td>
                                    <td>
                                        <div class="card-header-toolbar d-flex align-items-center" data-toggle="modal" data-target="#exampleModal">
                                            <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton001" data-toggle="dropdown" aria-expanded="true" style="background-color: #bdc4d4; width: 100px; height: inherit; padding: 5px; font-size: 16px;">
                                            សកម្មភាព
                                                <svg style="width: 18px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </span>
                                            <div class="dropdown-menu fixed-element" aria-labelledby="dropdownMenuButton001" style="position: fixed; will-change: transform; top: 0px; left: 0px; transform: translate3d(-40px, 36px, 0px);" x-placement="bottom-end">
                                                <a type="button" class="dropdown-item" onclick="locationUpdate('<?=$row['location_id'];?>', '<?=$row['location_name'];?>', '<?=$row['location_dsc'];?>')">
                                                    <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                    ធ្វើបច្ចុប្បន្នភាព
                                                </a>
                                                <a type="button" class="dropdown-item" onclick="locationDelete('<?=$row['location_id'];?>', '<?=$row['location_name'];?>')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  width="20" stroke-width="2" stroke="currentColor" class="svg-icon mr-0 text-secondary">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                    លុប
                                                </a>
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

<!-- Modal -->

<!-- Delete PO -->
<button id="autoButtonClick" style="display:none;" data-toggle="modal" data-target=".exampleModal">Delete</button>
<form action="" method="post" id="deleteForm">
<div class="modal fade exampleModal" id="exampleModal" name="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 2 25 25"  width="26" height="28" fill="currentColor" class="w-5 h-5">
        <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 0 1 1.5 10.875v-3.75Zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 0 1-1.875-1.875v-8.25ZM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 0 1 3 18.375v-2.25Z" clip-rule="evenodd" />
        </svg>
        <b><span id="deletePocode">បង្កើតឃ្លាំងថ្វី</span></b>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="location_name">ឈ្មោះ៖</label>
        <input type="hidden" name="manege" id="manege" value="">
        <input type="hidden" name="location_id" id="location_id" value="">
        <input type="text" name="location_name" id="location_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះ" data-errors="សូមបញ្ចូលឈ្មោះ" required style="border: 1px solid #cbcbcb;">
        <input type="hidden" name="location_type" id="location_type" class="form-control">
        <label for="location_name" class="mt-3">ការពិពណ៌នា៖</label>
        <input type="text" name="location_dsc" id="location_dsc" class="form-control">
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">បោះបង់</button>
        <button type="submit" class="btn btn-primary" id="confirmDeleteButton">រក្សាទុក</button>
      </div>
    </div>
  </div>
</div>
</form>

<script>

    function addStocks(type){
        document.getElementById("deleteForm").action = "stocks/add_update_stocks_location.php";
        document.getElementById("location_type").value = type;
        document.getElementById("deletePocode").innerText = "បង្កើតទីតាំង";
        document.getElementById('deleteForm').reset();
        // alert(id);

    }
    function locationUpdate(id, name, dsc){
        document.getElementById("deleteForm").action = "stocks/add_update_stocks_location.php";
        document.getElementById("autoButtonClick").click();
        document.getElementById("deletePocode").innerText = "ធ្វើបច្ចុប្បន្នភាពទីតាំង";
        document.getElementById("location_id").value = id;
        document.getElementById("location_name").value = name;
        document.getElementById("location_dsc").value = dsc;
        // alert(id + " " + name + " " + dsc);

    }
    
</script>


<!-- Button to trigger modal -->
<button id="autoButtondeleteClick" style="display:none;" data-toggle="modal" data-target="#locationDelete" data-delete-modal-values="<?= $row['us_id']; ?>|<?= $user_profile['usf_firstname']; ?>">Delete</button>
<!-- Modal -->
<form action="stocks/delete_stocks_location.php" method="post">
<div class="modal fade" id="locationDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
         បញ្ជាក់ការលុប​ !
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="locationId" id="locationId" value="">
        <input type="hidden" name="manege" id="manege" value="">
        <p>តើអ្នកប្រាកដថាចង់លុប <b><span id="locationName"></span></b> មែនទេ?</p>
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

    // Delete funtion
    function locationDelete(id, name){
        document.getElementById("deleteForm").action = "stocks/add_update_stocks_location.php";
        document.getElementById("autoButtondeleteClick").click();
        document.getElementById("locationId").value = id;
        document.getElementById("locationName").innerText = name;
    }

</script>

<?php
 include("main_foother.php");
?>




