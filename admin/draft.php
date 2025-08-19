<div class="col-sm-12">
    <div id="table" class="table-editable">
        <span class="table-add float-right mb-3 mr-2">
            <button type="submit" class="btn btn-sm bg-primary" onclick="addItemToTable()">បន្ថែមថ្មី</button>
        </span>
        <span class="table-add float-left pt-3 mb-3 mr-2">
            <h5>សម្ភារៈ៖</h5>
        </span>
        <table id="productTable" class="table table-bordered table-responsive-md table-striped text-center">
            <thead>
                <tr>
                    <th>ដកចេញ</th>
                    <th>សម្ភារៈ</th>
                    <th>ប្រភេទ</th>
                    <th>ឯកតា</th>
                    <th>បរិមាណ</th>
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
                                        <td>
                                            <button type="button" class="btn delete-button bg-danger-light btn-sm my-0" onclick="deleteProduct(this)">ដកចេញ</button>
                                        </td>
                                        <td> <?= $rowi['item_name'];?> </td>
                                        <td> <?= $rowc['category_name']?> </td>
                                    <?php
                                    }
                                }

                            }
                        }
                    ?>
                        
                        <td> <?= $row['ord_unit'];?></td>
                        <td> <?= $row['ord_quantity']?> </td>
                        <td> <?= $row['ord_price'];?> </td>
                        <td> <?= $row['ord_quantity'] * $row['ord_price'];?> </td>
                    <tr>

                    </tr>
                    <?php
                        
                        $grandTotal += $row['ord_quantity'] * $row['ord_price'];
                        $ord_remarks = $row['ord_remarks'];
                    }
                }
                ?>
            </tbody>
            <tbody id="itemTableBody"></tbody>
            <tr>
                <td colspan= 5 style="text-align: right;">
                    សរុប
                </td>
                <td id="grandTotal"><?= $grandTotal?>៛</td>
            </tr>
            
        </table>
    </div>
</div>