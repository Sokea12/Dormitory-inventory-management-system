<?php
// timezone
date_default_timezone_set("Asia/Bangkok");  
// Establish MySQL database connection
$stock_date = date("Y-m-d H:i:s");
include("../config/connection.php");

$location_id = 0;
// Check if the stockid has been sent via POST
if(isset($_POST['location_id'])) {
    // Retrieve the stockid from POST data
    ?>
    <select id="item" name="item" class="form-control choicesjs choices_input is-hidden">
        <?php
        $location_id = $_POST['location_id'];
        if($location_id != ""){
            $query ="SELECT stock_itemid FROM tbl_stocks WHERE stock_locationid = $location_id";
            $query_run = mysqli_query($conn, $query);
            $num = 0;
            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $row)
                {
                    $item_id = $row['stock_itemid'];
                    $query ="SELECT item_id, item_name FROM tbl_item WHERE item_id = $item_id";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $rowi)
                        {
                        ?>
                            <option value="<?= $rowi['item_id'];?>"> <?= $rowi['item_name'];?> </option>
                        <?php
                        }
                    }
                }

            }
        }
        ?>
    </select>
    <?php
    $conn->close();
}
?>