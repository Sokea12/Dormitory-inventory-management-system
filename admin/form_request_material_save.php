<?php
    session_start();
    include("../config/connection.php");
    include("main_header.php");
?>

<form id="addProductForm" action="request/update_request_detail.php" method="post">
    <div class="container-fluid" style="width: 100%; margin: 0px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="modal-header">
                        <h4 class="modal-title" id="titleItem">Material Requst From</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="hiddenCodeRqs" id="hiddenCodeRqs" value="
                                <?php
                                    // if(isset($_GET['code'])){
                                    //     $code = $_GET['code'];
                                    //     echo $code;
                                    // } 
                                ?>
                            ">
                            <div class="col-md-12"> 
                                <div id="table" class="table-editable">
                                    <span class="table-add float-left mb-3 mr-2">
                                    <!-- <h6>Receive Request Material form:  <?php if(isset($_GET['code'])){
                                        $code = $_GET['code'];
                                        echo $code;
                                    } ?></h6> -->
                                    </span>
                                    <span class="table-add float-right mb-3 mr-2">
                                    <!-- <button class="btn btn-sm bg-primary"><i
                                        class="ri-add-fill"><span class="pl-1">Add New</span></i>
                                    </button> -->
                                    </span>
                                    <table id="myTable" class="table table-bordered table-responsive-md table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Item</th>
                                                <th>Category</th>
                                                <th>Unit/Price</th>
                                                <th>Quantity</th>
                                                <th>Gets From</th>
                                                <td hidden>Qty</td>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   
                                        $num = 1;    
                                        $grandTotal = 0;
                                        $rmack = "";
                                            $query ="SELECT * FROM tbl_request_detail WHERE rqd_code = '1'";
                                            $query_run = mysqli_query($conn, $query);
                                            
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {

                                                    ?>
                                                <tr>
                                                <td>
                                                    <input type="hidden" name="requestIds[]" value="<?= $row['rqd_id'] ?>">
                                                    <?= $num++; ?>
                                                </td>
                                                    
                                                        <?php
                                                            
                                                           // Construct the SQL query
                                                            $sql = "SELECT item_id, item_name, category_id FROM tbl_item WHERE item_id = $row[item_id]";
                                                            // Execute the query
                                                            $result = $conn->query($sql);
                                                            // Check if the query was successful
                                                            if ($result) {
                                                                // Fetch the result as an associative array
                                                                $itemInrqs = $result->fetch_assoc();

                                                                ?>
                                                                    <td> 
                                                                        <input type="hidden" name="itemIds[]" value="<?= $itemInrqs['item_id']; ?>">
                                                                        <?= $itemInrqs['item_name']; ?> 
                                                                    </td>
                                                                    <?php
                                                                        // Construct the SQL query
                                                                        $sql = "SELECT category_name FROM tbl_category WHERE category_id = $itemInrqs[category_id]";
                                                                        // Execute the query
                                                                        $result = $conn->query($sql);
                                                                        // Check if the query was successful
                                                                        if ($result) {
                                                                            // Fetch the result as an associative array
                                                                            $categoryInrqs = $result->fetch_assoc();
                                                                            ?>
                                                                            <td> 
                                                                                    <?= $categoryInrqs['category_name']; ?> 

                                                                                   
                                                                            </td>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                <?php
                                                            
                                                            }
                                                        ?>
                                                    <td> 
                                                        <div id="unitPriceRqs">៛ <?= $row['rqd_unit_price']; ?> </div>
                                                    </td>
                                                    <td> 
                                                        <input type="number" name="qtyNews[]" class="qtyNews" max="<?= $row['rqd_quantity']; ?>" min="0" onclick="totalRqs(this)" value="<?= $row['rqd_quantity']; ?>">
                                                    </td> 
                                                    
                                                    <td>
                                                        <!-- <div class="totalRqs" data-unit-price="<?= $row['rqd_unit_price']; ?>" data-amount="<?= $row['rqd_amount']; ?>"> -->
                                                        <input type="hidden" class="hiddenQtyold" name="hiddenQtyold[]" data-rqd-gets="<?= $row['rqd_gets']; ?>" value="<?= $row['rqd_gets']; ?>"> 
                                                        <p style="display: inline;" class="hiddenQty"> <?= $row['rqd_gets']; ?> </p>
                                                        <p style="display: inline;"> of <?= $row['rqd_gets'] + $row['rqd_quantity']; ?></p>
                                                    </td> 
                                                    <td hidden>
                                                        <input type="hiddne" name="hiddenQtymax[]" value="<?= $row['rqd_quantity']; ?>">
                                                    </td>                   
                                                    <td style="width: 150px;">
                                                        <div class="totalRqs" data-unit-price="<?= $row['rqd_unit_price']; ?>" data-amount="<?= $row['rqd_amount']; ?>">
                                                            <?= $row['rqd_amount']; ?>
                                                        </div>  
                                                    </td>                   
                                                    <!-- <td>
                                                    <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
                                                    <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
                                                    </td> -->
                                                    
                                                </tr>
                                                <?php
                                                   $grandTotal += $row['rqd_amount'];
                                                }
                                                
                                                $rmack = $row['rqd_remarks']; 
                                            } 
                                        ?>
                                                <tr>
                                                    <td colspan="6" style="text-align: right;">សរុប/grandTotal</td>
                                                    <td hidden></td>
                                                    <td><div id="output"><?= $grandTotal; ?>.00</div></td>
                                                </tr>

                                                
                                        </tbody>
                                    </table>
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description / Product Details</label>
                                    <textarea name="textareaDscItem" id="textareaDscItem" class="form-control" rows="2"><?= $rmack; ?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <!-- <hr> -->
                                <div style="margin: 0 auto; display: flex; justify-content: center; align-items: center;" class="col-lg-4">
                                    <a href="form_request.php" class="btn btn-secondary mr-3 add-list" >Backe</a>
                                    <!-- onclick="saveRequstMaterial(event)" -->
                                    <button type="submit" class="btn btn-primary mr-3 add-list" >Save </button>
                                    <!-- <button type="button" class="btn btn-info mt-2" >Cancel</button>
                                    <button type="submit" class="btn btn-danger mt-2" name="btn_delete_item_id" style="  margin-left: 10px; margin-right: 10px; ">Delete</button>
                                    <button type="button" class="btn btn-success mt-2" >Save</button> -->
                                </div>
                                <!-- <hr> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</form>
<?php
include("main_foother.php");
?>


<script>
    
    totalRqs(element);
    // scrapeAndDisplayTable();
    function totalRqs(element) {
        // Find the closest parent row of the clicked input
        var row = element.closest('tr');

        // Get the unit price and quantity for the specific row
        var unitPrice = parseInt(row.querySelector('.totalRqs').getAttribute('data-unit-price'));
        var hiddenQtyold = parseInt(row.querySelector('.hiddenQtyold').getAttribute('data-rqd-gets'));
        var qty = parseInt(element.value);

        // Calculate the total for the specific row
        var total = unitPrice * qty;
        
        // Set the total in the corresponding totalRqs element for the specific row
        // .toFixed(2) hiddenQtyold

        row.querySelector('.hiddenQty').innerText = qty + hiddenQtyold;

        row.querySelector('.totalRqs').innerHTML = total.toFixed(2);
        


        scrapeAndDisplayTable();
        
    }
    // Function to scrape data from the table and display it
    function scrapeAndDisplayTable() {
        
        // Get the table element by its ID
        var table = document.getElementById('myTable');
        
        // Get all rows from the table
        var rows = table.getElementsByTagName('tr');
        
        // Create an output element
        var outputElement = document.getElementById('output');
        var sum = 0;
        // Loop through the rows
        for (var i = 0; i < rows.length; i++) {
            // Get the cells in the current row
            var cells = rows[i].getElementsByTagName('td');
            
            // Display the data in the output element
            for (var j = 7; j < cells.length; j++) {    
                // 
                // alert(cells[5].innerText);
                var cellValue = parseInt(cells[7].innerText);
                sum += cellValue;
                    
                document.getElementById('output').innerText = '៛' + sum.toFixed(2);

            }
            
        }
    }

}

    
    
</script>
