<?php
 session_start();
 include("../config/connection.php");
 include("main_header.php");
?>


<div class="container-fluid">
   <div class="row">
      
            <div class="col-md-12">
            <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                  <h4 class="card-title">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 4 20 20"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                  </svg>
                    បញ្ជីកាត់ស្តុក
                  </h4>
                </div>
                <a href="form_assign_add.php" id="btnAddUser" class="btn btn-primary add-list">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 3 20 20"  width="20" height="20" fill="currentColor" class="w-5 h-5">
                  <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                  </svg>
                  បន្ថែមថ្មី
                  </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table data-table mb-0">
                      <thead class="table-color-heading" id="mytable">
                        <tr class="text-secondary">
                            <th scope="col">កាលបរិច្ឆេទ</th>
                            <th scope="col">កូដកាត់ស្តុក</th>
                            <th scope="col">អ្នកផ្ដល់ឱ្យ</th>
                            <th scope="col">អ្នកទទួឡ</th>
                            <!-- <th scope="col">ទិញដោយ</th>
                            <th scope="col">ការពិពណ៌នា</th> -->
                            <th scope="col" style="width: 20px;">សកម្មភាព</th>
                        </tr>
                      </thead>
                      <tbody class="table-hover">
                      <?php
                        $num = 1;
                        $query ="SELECT * FROM tbl_stock_out WHERE sou_status = '1'"; 
                        $query_run = mysqli_query($conn, $query);
                                
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $row)
                            { 
                              ?>
                              <tr data-toggle="modal" data-target="#viewstockin" onclick="dataofTable(this)" <?php if($row['sou_drafs'] != 0){ ?> class="white-space-no-wrap text-success" style="color: rgb(0, 201, 100);" <?php }else{ ?> class='white-space-no-wrap text-warning' <?php } ?>>
                              <td><?=$row['sou_created_date'];?></td>
                              <td><?=$row['sou_code'];?></td>
                              
                              <?php
                                $us_id = $row['sou_cutbyid'];
                                $query ="SELECT * FROM tbl_users WHERE us_id = $us_id"; 
                                $query_run = mysqli_query($conn, $query);
                                        
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $rows)
                                    { 
                                        ?>
                                             <td><?=$rows['us_username'];?></td>
                                        <?php
                                        }
                                    }
                                ?>
                              <td><?=$row['sou_user'];?></td>
                              <td>
                              <div class="card-header-toolbar d-flex align-items-center" data-toggle="modal" data-target="#exampleModal">
                                        <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton001" data-toggle="dropdown" aria-expanded="true" style="background-color: #bdc4d4; width: 100px; height: inherit; padding: 5px; font-size: 16px;">
                                        សកម្មភាព
                                            <svg style="width: 18px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </span>
                                        <div class="dropdown-menu fixed-element" aria-labelledby="dropdownMenuButton001" style="position: fixed; will-change: transform; top: 0px; left: 0px; transform: translate3d(-40px, 36px, 0px);" x-placement="bottom-end">
                                            <a class="dropdown-item" href="form_assign_detail.php?sou_id=<?=$row['sou_id'];?>&sou_code=<?=$row['sou_code'];?>&sou_cutbyid=<?=$rows['us_username'];?>&sou_user=<?=$row['sou_user'];?>&sou_created_date=<?=$row['sou_created_date'];?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  width="20" stroke-width="2" stroke="currentColor" class="svg-icon mr-0 text-secondary">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                                មើល
                                            </a>
                                            <a class="dropdown-item" href="#" <?php if($row['sou_drafs'] == 1){ ?> style="display: none; "<?php } ?>>
                                                <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                ធ្វើបច្ចុប្បន្នភាព
                                            </a>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal" <?php if($row['sou_drafs'] == 1){ ?> style="display: none; "<?php } ?>>
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
   </div>
</div>




<style>
    body, form, h4, h5, h6, button, a {
        font-family: 'Khmer OS System';
    }
    #myform{
      font-family: 'Khmer OS System';
    }
</style>
<!-- Modal -->
<!-- Button to trigger modal -->
<button id="autoButtondeleteClick" style="display:none;" data-toggle="modal" data-target="#viewstockin">Delete</button>
<!-- Delete PO -->
<form action="stocks/delete_stocks_location.php" method="post" id="myform">
  <div class="modal fade" id="viewstockin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">
            មើលព័ត៌មានលម្អិត៖
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <h6 class="mb-1">កូដបញ្ជាទិញ៖</h6>
              <p id="pcode"></p>
            </div>
            <div class="col-6">
              <h6 class="mb-1">ទិញដោយ៖</h6>
              <p id="pbayer"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <h6 class="mb-1">សម្ភារៈ៖</h6>
              <p id="pitem">10</p>
            </div>
            <div class="col-6">
              <h6 class="mb-1">ប្រភេទ៖</h6>
              <p id="pcategory"></p>
            </div>
          </div>
          <div class="row">
          <div class="col-6">
              <h6 class="mb-1">បរិមាណ៖</h6>
              <p id="pqty"></p>
            </div>
            <div class="col-6">
              <h6 class="mb-1">ចំនួនទិកប្រាក់៖</h6>
              <p id="pamount"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <h6 class="mb-1">កន្លែងរក្សាទុក៖</h6>
              <p id="plocation"></p>
            </div>
            <div class="col-6">
              <h6 class="mb-1">ការពិពណ៌នា៖</h6>
              <p id="premark"></p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">បិទ</button>
        </div>
      </div>
    </div>
  </div>
</form>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function dataofTable(element) {
      var totals = 0;
      var row = element.closest('tr');
      var date = row.querySelector('.tddate').innerText;
      var code = row.querySelector('.tdcode').innerText;
      var item = row.querySelector('.tditem').innerText;
      var category = row.querySelector('.tdcategory').innerText;
      var bayer = row.querySelector('.tdbayer').innerText;
      var location = row.querySelector('.tdlocation').innerText;
      var qty = row.querySelector('.tdqty').innerText;
      var amount = row.querySelector('.tdamount').innerText;
      var remark = row.querySelector('.tdremark').innerText;
      
    //   var alertMessage = "Date: " + date + "\n" +
    //                     "Code: " + code + "\n" +
    //                     "Item: " + item + "\n" +
    //                     "Category: " + category + "\n" +
    //                     "Bayer: " + bayer + "\n" +
    //                     "Location: " + location + "\n" +
    //                     "Quantity: " + qty + "\n" +
    //                     "Amount: " + amount + "\n" +
    //                     "Remark: " + remark;
    // alert(alertMessage);

    document.getElementById("pcode").innerText = code;
    document.getElementById("pbayer").innerText = bayer;
    document.getElementById("pitem").innerText = item;
    document.getElementById("pcategory").innerText = category;
    document.getElementById("pqty").innerText = qty;
    document.getElementById("pamount").innerText = amount;
    document.getElementById("plocation").innerText = location;
    document.getElementById("premark").innerText = remark;

    // viewStockinOnclicktr(date, code, item, category, bayer, location, qty, amount, remark);
  }
  
</script>

<?php
 include("main_foother.php");
?>


