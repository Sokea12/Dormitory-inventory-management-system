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
                    កត់ត្រាសម្ភារៈកាត់ស្តុក៖  
                  </h4>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table data-table table-hover mb-0">
                      <thead class="table-color-heading" id="mytable">
                        <tr class="text-secondary">
                            <th hidden>កូដកាត់ស្តុក</th>
                            <th scope="col">កាលបរិច្ឆេទ</th>
                            <th scope="col">សម្ភារៈ</th>
                            <th scope="col">ប្រភេទ</th>
                            <th scope="col">កាត់ដោយ</th>
                            <th scope="col">ផ្ដល់ទៅឱ្យ</th>
                            <th scope="col">បរិមាណ</th>
                            <th hidden scope="col">amount</th>
                            <th scope="col">ការពិពណ៌នា</th>
                        </tr>
                      </thead>
                      <tbody class="table-hover">
                      <?php
                        $num = 1;
                        $query ="SELECT * FROM tbl_stock_out_detail"; 
                        $query_run = mysqli_query($conn, $query);
                                
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $row)
                            { 
                              ?>
                              <tr class="white-space-no-wrap" data-toggle="modal" data-target="#viewstockin" onclick="dataofTable(this)">

                                  <td class="tddate"><?=$row['soud_created_date'];?></td>
                                  <td hidden class="tdcode"><?=$row['soud_code'];?></td>
                                  <?php
                                    $item_id = $row['soud_itemid'];
                                    $query ="SELECT item_categoryid, item_name FROM tbl_item WHERE item_id = $item_id"; 
                                    $query_run = mysqli_query($conn, $query);
                                            
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $rowi)
                                        { 
                                          $category_id = $rowi['item_categoryid'];
                                          $query ="SELECT category_name FROM tbl_category WHERE category_id = $category_id"; 
                                          $query_run = mysqli_query($conn, $query);
                                                  
                                          if(mysqli_num_rows($query_run) > 0)
                                          {
                                              foreach($query_run as $rowc)
                                              { 
                                            ?>
                                              <td class="tditem"><?=$rowi['item_name'];?></td>
                                              <td class="tdcategory"><?=$rowc['category_name'];?></td>
                                            <?php
                                            }
                                          }
                                      }
                                    }
                                  ?>
                                  <?php
                                    $sou_id = $row['soud_souid'];
                                    $query ="SELECT sou_cutbyid FROM tbl_stock_out WHERE sou_id = $sou_id AND sou_status = '1'"; 
                                    $query_run = mysqli_query($conn, $query);
                                            
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $rowu)
                                        { 
                                          $us_id = $rowu['sou_cutbyid'];
                                          $query ="SELECT us_username FROM tbl_users WHERE us_id = $us_id AND us_status = '1'"; 
                                          $query_run = mysqli_query($conn, $query);
                                                  
                                          if(mysqli_num_rows($query_run) > 0)
                                          {
                                              foreach($query_run as $rowus)
                                              { 
                                            ?>
                                              <td class="tdcutby"><?=$rowus['us_username'];?></td>
                                            <?php
                                            }
                                          }
                                        }
                                      }
                                    ?>
                                  <td class="tdlocationuse"><?=$row['soud_uselocation'];?></td>
                                  <td class="tdqty"><?=$row['soud_quantity'];?></td>
                                  <td hidden class="tdamount"><?=$row['soud_amount'];?></td>
                                  <td class="tdremark text-left"><?=$row['soud_remarks'];?></td>
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
        <div class="modal-header bg-primary-light text-white">
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
              <h6 class="mb-1">កាលបរិច្ឆេទ៖</h6>
              <p id="pdate"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <h6 class="mb-1">កាត់ដោយ៖</h6>
              <p id="pcutby"></p>
            </div>
            <div class="col-6">
              <h6 class="mb-1">ផ្ដល់ទៅឱ្យ៖</h6>
              <p id="plocationuse"></p>
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
            <div class="col-12">
              <h6 class="mb-1">ការពិពណ៌នា៖</h6>
              <p id="premark"></p>
            </div>
            <!-- <div class="col-6">
              <h6 class="mb-1">ការពិពណ៌នា៖</h6>
              <p id="premark"></p>
            </div> -->
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
      var row = element.closest('tr');
      
      var code = row.querySelector('.tdcode').innerText;
      var date = row.querySelector('.tddate').innerText;
      var cutby = row.querySelector('.tdcutby').innerText;
      var locationuse = row.querySelector('.tdlocationuse').innerText;
      var item = row.querySelector('.tditem').innerText;
      var category = row.querySelector('.tdcategory').innerText;
      var qty = row.querySelector('.tdqty').innerText;
      var amount = row.querySelector('.tdamount').innerText;
      var remark = row.querySelector('.tdremark').innerText;
      document.getElementById("pdate").innerText = date;
      document.getElementById("pcode").innerText = code;
      document.getElementById("pcutby").innerText = cutby;
      document.getElementById("plocationuse").innerText = locationuse;
      document.getElementById("pitem").innerText = item;
      document.getElementById("pcategory").innerText = category;
      document.getElementById("pqty").innerText = qty;
      document.getElementById("pamount").innerText = amount;
      document.getElementById("premark").innerText = remark;

    // viewStockinOnclicktr(date, code, item, category, bayer, location, qty, amount, remark);
  }
  
</script>

<?php
 include("main_foother.php");
?>


