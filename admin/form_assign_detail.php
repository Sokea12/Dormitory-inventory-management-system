<?php
    session_start();
    include("../config/connection.php");
    include("main_header.php");
?>

    <form id="itemForm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card pt-2 pl-3 pr-3 pb-3">

                        <div class="tab-content" id="myTabContent-2">
                           
                        <div class="row">
                            <div class="col-md-12">
                            <h4 class="mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 4 20 20"  width="26" height="28" fill="currentColor" class="w-5 h-5">
                                <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                                </svg>
                                ទម្រង់បញ្ជាទិញ៖
                            </h4>
                            <hr>
                            </div>
                            <input type="hidden" name="hiddenItemId" id="hiddenItemId" value="">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h6 class="mb-2">លេខកូដ៖</h6>
                                    <label class="mb-3"><?= $_GET['sou_code'];?></label>
                                    <h6 class="mb-2">អ្នកផ្ដល់ឱ្យ៖</h6>
                                    <label><?= $_GET['sou_cutbyid'];?></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <h6 class="mb-2">អ្នកទទួល៖</h6>
                                <label for="" class="mb-3"><?= $_GET['sou_user'];?></label> 
                                <h6 class="mb-2">កាលបរិច្ឆេទ៖</h6>
                                <label for=""><?= $_GET['sou_created_date'];?></label> 
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div id="table" class="table-editable">
                                    <span class="table-add float-left pt-3 mb-2 mr-2">
                                        <h5>សម្ភារៈ៖</h5>
                                    </span>
                                    <table id="productTable" class="table table-bordered table-responsive-md table-striped text-center">
                                        <thead class="table-color-heading">
                                            <tr>
                                                <th>សម្ភារៈ</th>
                                                <th>ប្រភេទ</th>
                                                <th>បរិមាណ</th>
                                                <th>តម្លៃ</th>
                                                <th>សរុប</th>
                                            </tr>
                                        </thead>
                                        <tbody id="itemTableBody">
                                        <?php
                                            $grandTotal = 0;
                                            $soud_remarks = "";
                                            $soud_souid = $_GET['sou_id']; 
                                            $query ="SELECT * FROM tbl_stock_out_detail WHERE soud_souid = $soud_souid"; 
                                            $query_run = mysqli_query($conn, $query);
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                                ?>
                                                <tr>

                                                <?php
                                                    $soud_id = $row['soud_itemid']; 
                                                    $query ="SELECT item_categoryid, item_name FROM tbl_item WHERE item_id = $soud_id"; 
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
                                                                <td><?=$rowi['item_name'];?></td>
                                                                <td><?=$rowc['category_name'];?></td>
                                                                <?php
                                                                }
                                                            }
                                                        }
                                                    }
                                                ?>
                                                    <td><?=$row['soud_quantity'];?></td>
                                                    <td><?=$row['soud_price'];?></td>
                                                    <td><?=$row['soud_quantity'] * $row['soud_price'];?></td>
                                                </tr>
                                                <?php
                                                 $grandTotal = $row['soud_amount']; 
                                                 $soud_remarks = $row['soud_remarks'];
                                                }
                                            }
                                        ?>
                                        </tbody>
                                        <tr>
                                            <td colspan= 4 style="text-align: right;">
                                                សរុប
                                            </td>
                                            <td id="grandTotal"><?=$grandTotal;?> ៛</td>
                                        </tr>
                                        
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <h6 class="mb-1">ការពិពណ៌នា៖</h6>
                                    <label for=""><?=$soud_remarks;?></label>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <h6 class="mb-1">
                                    <?php 
                                        // if($_GET['or_receive'] == 0){echo "មិនទាន់ទទូលបាន";}
                                        // else if($_GET['or_receive'] == 1){echo "ទទួលបានដោយផ្នែក";}
                                        // else{ echo "ទទួលបានទាំងអស់"; }
                                        // if($_GET['or_draft'] == 1){ $disabled = "disabled"; }
                                    ?>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!-- <div class="checkbox d-inline-block mb-12">
                                    <span class=""> <input type="checkbox" class="checkbox d-inline-block mr-2" id="checkboxSentemailUser" checked="" style="width: 20px;"></span>
                                    <span class="table-add float-right mb-4 mr-4"> <label for="checkbox1">ជូនដំណឹងដល់អ្នកផ្គត់ផ្គង់តាមអ៊ីមែល</label></span>
                                </div> <br> -->
                                <div>
                                    <a type="button" href="form_assign_list.php" class="btn btn-secondary mr-2">ត្រឡប់</a>
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
