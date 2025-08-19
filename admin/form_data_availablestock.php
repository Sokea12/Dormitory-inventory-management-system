<?php
// timezone
date_default_timezone_set("Asia/Bangkok");  
// Establish MySQL database connection
$stock_date = date("Y-m-d H:i:s");
include("../config/connection.php");

$stockid = 0;
// Check if the stockid has been sent via POST
if(isset($_POST['location_id'])) {
    // Retrieve the stockid from POST data
    $location_id = $_POST['location_id'];
        if($stockid != ""){
        $query ="SELECT * FROM tbl_stocks WHERE stock_locationid = $location_id";
        $query_run = mysqli_query($conn, $query);
        $num = 0;
        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $row)
            {
                ?>
                    <tr>
                    <td>
                        <?= $num+= 1; ?>
                    </td>
                    <td><?= $row['stock_date']; ?></td>
                    <?php
                        // Construct the SQL query
                        $sql = "SELECT item_name, item_categoryid FROM tbl_item WHERE item_id = $row[stock_itemid]";
                        // Execute the query
                        $result = $conn->query($sql);
                        // Check if the query was successful
                        if ($result) {
                            // Fetch the result as an associative array
                            $item = $result->fetch_assoc();
                            ?>
                            <td><?= $item['item_name']; ?></td>
                            <?php
                                $category_id = $item['item_categoryid']; 
                                $query ="SELECT category_name FROM tbl_category WHERE category_id = '$category_id'";
                                $query_run = mysqli_query($conn, $query);
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $rowc)
                                    {
                                        ?>
                                        <td><?= $rowc['category_name'];?></td>
                                    <?php
                                    }
                                }
                            ?>
                            <td><?=$row['stock_itemavailable']; ?></td>
                            <?php
                            // Close the result set
                            $result->close();
                        }
                        
                    ?>
                    
                </tr>
                <?php
            }
        }else{
            echo '<tr>
                    <td colspan="5" style="text-align: center;">No data available in table</td>
                  </tr>';
        }
    }else{
        echo '<tr>
                <td colspan="5" style="text-align: center;">No data available in table</td>
              </tr>';
    }
}
?>