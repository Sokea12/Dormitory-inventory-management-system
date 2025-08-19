<div class="container-fluid">
   <div class="row">
      <div class="col-md-12 mb-4 mt-1">
         <div class="d-flex flex-wrap justify-content-between align-items-center">
             <h4 class="font-weight-bold">ទិដ្ឋភាពទូទៅ</h4>
             <div class="form-group mb-0 vanila-daterangepicker d-flex flex-row">
                  <div class="">
                     <input type="date" name="inputdate" id="inputdate" class="form-control" placeholder="From Date" onchange="selectStock()">
                  </div>                  
            </div>
         </div>
      </div>
      <div class="col-lg-8 col-md-12">
         <div class="row">
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                        <div class="">
                            <a href="form_stocks_available.php"><p class="mb-2 text-secondary">សម្ភារៈក្នុងខ្លាំងសរុប</p></a>
                            <div class="d-flex flex-wrap justify-content-start align-items-center">
                            <?php
                              $num = 0; // Initialize total variable
                              $stock_itemavailable_total = 0; // Initialize total stock item available

                              $query ="SELECT stock_itemavailable FROM tbl_stocks"; 
                              $query_run = mysqli_query($conn, $query);

                              if(mysqli_num_rows($query_run) > 0) {
                                 foreach($query_run as $row) { 
                                    $stock_itemavailable = $row['stock_itemavailable'];
                                    $stock_itemavailable_total += $stock_itemavailable; // Accumulate total
                                    $num++; // Increment count
                                 }
                              }
                              ?>
                              <h5 class="mb-0 font-weight-bold"><?= $stock_itemavailable_total ?></h5>
                              <!-- <p class="mb-0 ml-3 text-success font-weight-bold">+3</p> -->
                            </div>                            
                        </div>
                     </div>
                  </div>
               </div>   
            </div>
            <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                        <div class="d-flex align-items-center">
                              <div class="">
                                 <a href="form_stocks_in.php"><p class="mb-2 text-secondary">សម្ភារៈចូលស្តុក</p></a>
                                 <div class="d-flex flex-wrap justify-content-start align-items-center">
                                    <h5 class="mb-0 font-weight-bold" id="totalstockin"></h5>
                                    <!-- <p class="mb-0 ml-3 text-success font-weight-bold">+2</p> -->
                                 </div>                            
                              </div>
                        </div>
                     </div>
                  </div>   
                  </div>
                  <div class="col-md-4">
                  <div class="card">
                     <div class="card-body">
                        <div class="d-flex align-items-center">
                              <div class="">
                                 <p class="mb-2 text-secondary">សម្ភារៈកាត់ស្តុក</p>
                                 <div class="d-flex flex-wrap justify-content-start align-items-center">
                                    <h5 class="mb-0 font-weight-bold" id="totalstockout">13984</h5>
                                    <!-- <p class="mb-0 ml-3 text-danger font-weight-bold">-9</p> -->
                                 </div>                            
                              </div>
                        </div>
                     </div>
                  </div>   
                  </div>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                  <script>
                      // Get the current date
                      var currentDate = new Date();
                     // Extract the components of the date (year, month, day)
                     var year = currentDate.getFullYear();
                     var month = currentDate.getMonth() + 1; // Note: January is 0, so add 1 to get the actual month number
                     var day = currentDate.getDate();
                     // Format the date as a string
                     var formattedDate = year + "-" + (month < 10 ? "0" + month : month) + "-" + (day < 10 ? "0" + day : day);
                     document.getElementById('inputdate').value = formattedDate;
                     // alert(formattedDate);

                     function selectStock() {
                        var formDate = document.getElementById('inputdate').value;
                        // alert(formDate);
                        // Use jQuery.ajax() for the AJAX request
                        $.ajax({
                              type: 'POST',
                              url: 'managedashboard/managedash.php',
                              data: { dateform: formDate }, // Pass data as an object with key-value pairs
                              success: function(response) {
                                 // Handle the response from the server
                                 var message = response;
                                 // alert(message);
                                 document.getElementById('totalstockin').innerHTML = message;
                                 console.log(response);
                              },
                              error: function(error) {
                                 // Handle errors
                                 alert('Error saving data!');
                                 console.error(error);
                              }
                        });
                     }
                     selectStock();
                  </script>
                  <div class="col-md-12">
                  <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">អ្នកផ្គត់ផ្គង់ដែលសកម្ម</h4>
                     </div>
                     <div class="card-header-toolbar d-flex align-items-center">                  
                        <div class="dropdown">
                              <!-- <a href="#" class="text-muted pl-3" id="dropdownMenuButton-customer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="currentColor" stroke-width="2" aria-hidden="true" focusable="false" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                    <g fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                       <circle cx="12" cy="12" r="1"/>
                                       <circle cx="19" cy="12" r="1"/>
                                       <circle cx="5" cy="12" r="1"/></g>
                                 </svg>
                              <!-- </a> -->
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton-customer">
                                 <a class="dropdown-item" href="#">
                                       <svg class="svg-icon text-secondary" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                       </svg>
                                       Edit
                                 </a>
                                 <a class="dropdown-item" href="#">
                                       <svg class="svg-icon text-secondary" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                       </svg>
                                       View
                                 </a>
                                 <a class="dropdown-item" href="#">
                                       <svg class="svg-icon text-secondary" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                       </svg>
                                       Delete
                                 </a>
                              </div>
                           </div>
                     </div>
                  </div>
                  <div class="card-body p-0">
                     <div class="table-responsive">
                        <table class="table table-hover mb-0">
                           <thead class="table-color-heading">
                              <tr class="text-secondary">
                                 <th scope="col">កាលបរិច្ឆេទ</th>
                                 <th scope="col">អ្នកផ្គត់ផ្គង់</th>
                                 <th scope="col">ស្ថានភាព</th>
                                 <th scope="col" class="text-center">សរុប</th>
                              </tr>
                           </thead>
                           <a href="" id="abtngotoreceive"></a>
                           <tbody class="ligth-body">
                              <?php
                              $query ="SELECT or_id, or_code, or_supplier_id, or_receive, or_created_date FROM tbl_order WHERE or_receive != '2' AND or_draft = '1' AND or_status = '1'"; 
                              $query_run = mysqli_query($conn, $query);
                                       
                              if(mysqli_num_rows($query_run) > 0)
                              {
                                 foreach($query_run as $rowor)
                                 {
                                 ?>
                                 <tr class="white-space-no-wrap" onclick="dataofTable(this)">
                                       <td>
                                          <div hidden class="or_id"><?=$rowor['or_id'];?></div>
                                          <div hidden class="or_code"><?=$rowor['or_code'];?></div>
                                          <div hidden class="or_supplier_id"><?=$rowor['or_supplier_id'];?></div>
                                          <div hidden class="or_receive"><?=$rowor['or_receive'];?></div>
                                          <?=$rowor['or_created_date'];?>
                                       </td>
                                       <?php
                                          $sp_id = $rowor['or_supplier_id'];
                                          $query ="SELECT sp_name, sp_image FROM tbl_suppliers WHERE sp_id = $sp_id"; 
                                          $query_run = mysqli_query($conn, $query);
                                          if(mysqli_num_rows($query_run) > 0)
                                          {
                                             foreach($query_run as $rows)
                                             {
                                                ?>
                                                <td>
                                                   <div class="d-flex align-items-center">
                                                      <div class="avatar-45 mr-2">
                                                         <img src="../assets/images/user/<?=$rows['sp_image'];?>" class="img-fluid rounded-circle"
                                                            alt="image">
                                                      </div>
                                                      <div><?=$rows['sp_name'];?></div>
                                                   </div>
                                                </td>
                                                <?php
                                             }
                                          }
                                       ?>
                                       <td>
                                          <p class="mb-0 text-warning d-flex justify-content-start align-items-center">
                                             <small><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="18" viewBox="0 0 24 24" fill="none">                                                
                                             <circle cx="12" cy="12" r="8" fill="#db7e06"></circle></svg>
                                             </small>កំពុងរង់ចាំ
                                          </p>
                                       </td>
                                       <?php
                                          $ord_orcode = $rowor['or_code'];
                                          $query ="SELECT ord_amount FROM tbl_order_detail WHERE ord_orcode = '$ord_orcode'"; 
                                          $query_run = mysqli_query($conn, $query);
                                          if(mysqli_num_rows($query_run) > 0)
                                          {
                                             foreach($query_run as $roword)
                                             {
                                                
                                                ?>
                                                   <td class="text-right"><?=$roword['ord_amount'];?></td>
                                                <?php
                                                break;
                                             }
                                          }     
                                       ?>
                                 </tr>
                                 <?php
                                 }
                              }
                              ?>
                           </tbody>
                        </table>
                        <!-- <div class="d-flex justify-content-end align-items-center border-top-table p-3">
                                 <button class="btn btn-secondary btn-sm">See All</button>
                              </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4 col-md-8">
         <div class="card card-block card-stretch card-height">
            <div class="card-header card-header-border d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">សម្ភារៈដាក់ឱ្យប្រើថ្វីៗ</h4>
               </div>
            </div>
            <div class="card-body-list">               
               <ul class="list-style-3 mb-0">
                  <li class="p-3 list-item d-flex justify-content-start align-items-center">
                     <div class="avatar">
                        <img class="avatar avatar-img avatar-60 rounded" src="../assets/images/products/img-ចានសម្ល.jpg" alt="1.jpg">                        
                     </div>
                     <div class="list-style-detail ml-3 mr-2">
                        <p class="mb-0">ចានសម្ល</p>
                     </div>
                     <div class="list-style-action d-flex justify-content-end ml-auto">                        
                        <h6 class="font-weight-bold">56</h6>                        
                     </div>
                  </li>
                  <li class="p-3 list-item d-flex justify-content-start align-items-center">
                     <div class="avatar">
                        <img class="avatar avatar-img avatar-60 rounded" src="../assets/images/products/img-ចានបាយ.jpg" alt="2.jpg">                        
                     </div>
                     <div class="list-style-detail ml-3 mr-2">
                        <p class="mb-0">ចានបាយ</p>
                     </div>
                     <div class="list-style-action d-flex justify-content-end ml-auto">                        
                        <h6 class="font-weight-bold">59</h6>                        
                     </div>
                  </li>
                  <li class="p-3 list-item d-flex justify-content-start align-items-center">
                     <div class="avatar">
                        <img class="avatar avatar-img avatar-60 rounded" src="../assets/images/products/img-សម.jpg" alt="3.jpg">                        
                     </div>
                     <div class="list-style-detail ml-3 mr-2">
                        <p class="mb-0">សម</p>
                     </div>
                     <div class="list-style-action d-flex justify-content-end ml-auto">                        
                        <h6 class="font-weight-bold">50</h6>                        
                     </div>
                  </li>
                  <li class="p-3 list-item d-flex justify-content-start align-items-center">
                     <div class="avatar">
                        <img class="avatar avatar-img avatar-60 rounded" src="../assets/images/products/img-ស្លាបព្រាវែង.jpg" alt="4.jpg">                        
                     </div>
                     <div class="list-style-detail ml-3 mr-2">
                        <p class="mb-0">ស្លាបព្រាវែង</p>
                     </div>
                     <div class="list-style-action d-flex justify-content-end ml-auto">                        
                        <h6 class="font-weight-bold">59</h6>                        
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function dataofTable(element) {
      var totals = 0;
      var row = element.closest('tr');
      var or_id = row.querySelector('.or_id').innerText;
      var or_code = row.querySelector('.or_code').innerText;
      var or_supplier_id = row.querySelector('.or_supplier_id').innerText;
      var or_receive = row.querySelector('.or_receive').innerText;
       // Construct the URL with the data
       var url = 'form_purchase_receive.php?' +
            'or_id=' + encodeURIComponent(or_id) +
            '&or_code=' + encodeURIComponent(or_code) +
            '&or_supplier_id=' + encodeURIComponent(or_supplier_id) +
            '&or_receive=' + encodeURIComponent(or_receive);

      // or_id=251&or_code=PO-002&or_supplier_id=20&or_receive=0&receive=0

      // alert(or_id + " " + or_code + " " + or_supplier_id + " " + or_receive + " ");
      document.getElementById('abtngotoreceive').href = url;
      document.getElementById('abtngotoreceive').click();
   }

</script>
    