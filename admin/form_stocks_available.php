<?php
 session_start();
 include("../config/connection.php");
 include("main_header.php");
?>
<!-- <form action="" method="post"></form> -->
<form action="item/delete_item.php" method="post">
    
        <!-- <div>
            <button type="button">Add Categorys</button>
        </div> -->
        <!-- <div class="content-page"> -->
    
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div class="col-lg-3">
                    
                    <h4 class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 4 20 20"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 0 1 1.5 10.875v-3.75Zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 0 1-1.875-1.875v-8.25ZM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 0 1 3 18.375v-2.25Z" clip-rule="evenodd" />
                    </svg>    
                    សម្ភារៈក្នុងឃ្លាំង៖
                    </h4>
                    <!-- <p class="mb-0">Use category list as to describe your overall core business from the provided list. <br>
                    Click the name of the category where you want to add a list item. .</p> -->
                </div>
                <div class="col-lg-4 mb-3 form-group">
                <select id="location_id" name="location_id" id="location_id" class="form-control choicesjs choices_input is-hidden" onchange="selectStock()" style="border: 1px solid #cbcbcb;">
                    <?php 
                        $query ="SELECT * FROM tbl_location WHERE location_type = '0' AND location_status = '1'"; 
                        $query_run = mysqli_query($conn, $query);
                                
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $rowloc)
                            { 
                                ?>
                                    <option value="<?= $rowloc['location_id'];?>"> <?= $rowloc['location_name'];?> </option>
                                <?php 
                            }
                        }
                    ?>
                </select>
                </div>
                <!-- <div class="col-lg-4 pr-4 ml-0"> -->
                <!-- <span class="table-add float-right mb-3 ml-3"> -->
                    <!-- <a href="form_stocks_manege.php" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                    បង្កើតឃ្លាំងបន្ថែម
                    </a> -->
                    <!-- <a href="#" class="btn btn-primary ml-2" data-toggle="modal" data-target=".exampleModal" onclick="addLocation(1)">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                        បង្កើតទីតាំងដែលត្រូវប្រើ
                    </a> -->
                <!-- </span> -->
                <!-- </div> -->
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
                <table class="data-table table mb-0 tbl-server-info" style="background-color: White; border-radius: 10px;">
                    <thead class="bg-white text-uppercase" id="tableIteme">
                        <tr class="ligth ligth-data">
                            <th>
                               #
                            </th>
                            <th>កាលបរិច្ឆេទ</th>
                            <th>សម្ភារៈ</th>
                            <th>ប្រភេទ</th>
                            <th>មានស្ដុក</th>
                        </tr>
                    </thead>
                    <tbody id="itemTableBody" class="ligth-body"></tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>    
    
</form>
    
<!-- Wrapper End-->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    function selectStock() {
        var locationid = document.getElementById('location_id').value;
        // alert(stockid);
        // Use jQuery.ajax() for the AJAX request
        $.ajax({
            type: 'POST',
            url: 'form_data_availablestock.php',
            data: { location_id: locationid }, // Pass data as an object with key-value pairs
            success: function(response) {
                // Handle the response from the server
                var message = response;
                // alert(message);
                document.getElementById('itemTableBody').innerHTML = message;
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



<script>

    function addStocks(type){
        document.getElementById("deleteForm").action = "stocks/add_update_stocks_location.php";
        document.getElementById("location_type").value = type;
    }
    function addLocation(type){
        document.getElementById("deleteForm").action = "stocks/add_update_stocks_location.php";
        document.getElementById("location_type").value = type;
    }
</script>

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
        <input type="text" name="location_name" id="location_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះ" data-errors="សូមបញ្ចូលឈ្មោះ" required style="border: 1px solid #cbcbcb;">
        <input type="hidden" name="location_type" id="location_type" class="form-control">
        <input type="hidden" name="location_id" id="location_id" class="form-control">
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">បោះបង់</button>
        <button type="submit" class="btn btn-primary" id="confirmDeleteButton">រក្សាទុក</button>
      </div>
    </div>
  </div>
</div>
</form>


<?php
include("main_foother.php");
?>