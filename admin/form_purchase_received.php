<?php
    session_start();
    include("../config/connection.php");
    include("main_header.php");
?>

    <form action="purchase/get_item_of_purchase.php" method="post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card pt-2 pl-3 pr-3 pb-3">

                        <div class="tab-content" id="myTabContent-2">
                           
                        <div class="row">
                            <div class="col-md-12">
                            <h4 class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 4 20 20"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                                <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                                </svg>
                                ទម្រង់បញ្ជាទិញ៖
                            </h4>
                            <hr>
                            </div>
                            <input type="hidden" name="hiddenOr_id" id="hiddenOr_id" value="<?=$_GET['or_id'];?>">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>លេខកូដ *</label>
                                    <input type="text" id="textCode" name="textCode" value="<?=$_GET['or_code'];?>" class="form-control" disabled
                                        placeholder="លេខកូដបញ្ជាទិញ" data-errors="លេខកូដបញ្ជាទិញ" required style="border: 1px solid #cbcbcb;">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slSp">អ្នកផ្គត់ផ្គង់ *</label>
                                    <select id="slSp" name="slSp" class="form-control" value="<?=$_GET['or_supplier_id'];?>" style="border: 1px solid #cbcbcb;" disabled>
                                        <option value="0" placeholder="សូមជ្រើស​រើសអ្នកផ្គត់ផ្គង់" data-errors="សូមជ្រើសរើសអ្នកផ្គត់ផ្គង់" required>សូមជ្រើសរើសអ្នកផ្គត់ផ្គង់</option>
                                        <?php 
                                            $query ="SELECT * FROM tbl_suppliers"; 
                                            $query_run = mysqli_query($conn, $query);
                                                    
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $rowsp)
                                                { 
                                                    ?>
                                                        <option value="<?= $rowsp['sp_id'];?>">  <?php $teste = $rowsp['sp_id']; echo $rowsp['sp_name'];?> </option>
                                                    <?php 
                                                }
                                            }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div id="table" class="table-editable">
                                    <span class="table-add float-left pt-3 mb-2 mr-2">
                                        <h5>សម្ភារៈ៖</h5>
                                    </span>
                                    <table id="productTable" class="table table-bordered table-responsive-md table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>សម្ភារៈ</th>
                                                <th>ប្រភេទ</th>
                                                <th>បានបញ្ជាទិញ</th>
                                                <th>បានទទូល</th>
                                                <th>តម្លៃ</th>
                                                <th>សរុប</th>
                                            </tr>
                                        </thead>
                                        <tbody id="itemTableBody">
                                        <?php
                                            $grandTotal = 0;
                                            $ord_remarks = "";
                                            $ord_orid = $_GET['or_id']; 
                                            $query ="SELECT * FROM tbl_order_detail WHERE ord_orid  = $ord_orid"; 
                                            $query_run = mysqli_query($conn, $query);
                                                    
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                                ?>
                                                <tr>
                                                <?php
                                                    $item_id = $row['ord_item_id']; 
                                                    $query ="SELECT item_name, item_categoryid FROM tbl_item WHERE item_id  = $item_id AND item_status = 1"; 
                                                    $query_run = mysqli_query($conn, $query);
                                                            
                                                    if(mysqli_num_rows($query_run) > 0)
                                                    {
                                                        foreach($query_run as $rowi)
                                                        {
                                                            $category_id  = $rowi['item_categoryid']; 
                                                            $query ="SELECT category_name FROM tbl_category WHERE category_id   = $category_id AND category_status = 1"; 
                                                            $query_run = mysqli_query($conn, $query);
                                                                    
                                                            if(mysqli_num_rows($query_run) > 0)
                                                            {
                                                                foreach($query_run as $rowc)
                                                                {
                                                                 ?>
                                                                    <td> <?= $rowi['item_name'];?> <input type="hidden" name="item_id[]" value="<?=$item_id;?>"></td>
                                                                    <td> <?= $rowc['category_name']?> </td>
                                                                <?php
                                                                }
                                                            }

                                                        }
                                                    }
                                                ?>
                                                    <td> <?= $row['ord_unit'];?></td>
                                                    <td> 
                                                    <?=$row['ord_gets'];?>
                                                        <!-- <input type="hidden" name="ord_quantityald[]" value="<?=$row['ord_quantity'];?>"> -->
                                                        <!-- <input type="hidden" name="getold[]" value="<?=$row['ord_gets'];?>"> -->
                                                        <!-- <input type="number" class="qty" name="qty[]" id="qty" min="0" max="<?= $row['ord_quantity'] - $row['ord_gets'];?>" value="<?= $row['ord_quantity'] - $row['ord_gets'];?>" onclick="totalRqs(this)"> -->
                                                    </td>
                                                    <td class="price"> <?= $row['ord_price'];?> </td>
                                                    <td class="total"> <?= $row['ord_gets'] * $row['ord_price'];?> </td>

                                                </tr>
                                                <?php
                                                    $grandTotal += $row['ord_quantity'] * $row['ord_price'];
                                                    $ord_remarks = $row['ord_remarks'];
                                                }
                                            }
                                            ?>
                                        </tbody>
                                        <tr>
                                            <td colspan= 5 style="text-align: right;">
                                                សរុប
                                            </td>
                                            <td id="grandTotal"><?= $grandTotal?>៛</td>
                                        </tr>
                                        
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <h6 class="mb-1">ការពិពណ៌នា៖</h6>
                                    <label for=""><?= $ord_remarks; ?></label>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <h6 class="mb-1">
                                    <?php 
                                        if($_GET['or_receive'] == 0){echo "មិនទាន់ទទូលបាន";}
                                        else if($_GET['or_receive'] == 1){echo "ទទួលបានដោយផ្នែក";}
                                        else{ echo "ទទួលបានទាំងអស់"; $disabled = "disabled"; }
                                    ?>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkbox d-inline-block mb-12">
                                    <br>
                                    <a type="button" href="" id="btnback" class="btn btn-secondary mr-2">ត្រឡប់</a>
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

<script>
    document.getElementById("slSp").value = <?=$_GET['or_supplier_id'];?>;

    var btnback = <?=$_GET['receive'];?>;
    if(btnback == 1){
    document.getElementById("btnback").href = "form_purchase_receive.php?or_id=<?=$_GET['or_id'];?>&or_code=<?=$_GET['or_code'];?>&or_supplier_id=<?=$_GET['or_supplier_id'];?>&or_receive=<?=$_GET['or_receive'];?>&receive=<?=$_GET['receive'];?>";
    }else{
        document.getElementById("btnback").href = "form_purchease_list.php?";
    }
    


    // function totalRqs(element) {
    //     var totals = 0;
    //     var row = element.closest('tr');
    //     var qty = row.querySelector('.qty').value;
    //     var price = row.querySelector('.price').innerText;
    //     total = parseFloat(qty) * parseFloat(price);
    //     // alert(qty + " " + price);
    //     row.querySelector('.total').innerHTML = total;

    //     updateGrandTotal()
    // }

    function updateGrandTotal() {
        var table = document.getElementById('productTable').getElementsByTagName('tbody')[0];
        var rows = table.getElementsByTagName('tr');
        var grandTotal = 0;
    
        for (var i = 0; i < rows.length; i++) {

            var cells = rows[i].getElementsByTagName('td');
            grandTotal += parseFloat(cells[5].innerHTML);

        }
        document.getElementById('grandTotal').innerHTML = grandTotal + "៛";
    }
    updateGrandTotal();
</script>
