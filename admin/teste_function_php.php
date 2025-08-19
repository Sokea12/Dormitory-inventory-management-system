<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<select name="" id="">
    <option value="">Item1</option>
    <option value="">Item2</option>
</select>

<br><br>
</body>
</html>

<?php
  // timezone
    function teateFunction($i){
?>
    <select name="" id="">
<?php
        include("../config/connection.php");
        $query ="SELECT * FROM tbl_produce WHERE pro_spid = $i AND pro_status = '1'"; 
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            foreach($query_run as $row)
            { 
                ?>
                    <option value=""><?php $id = $row['pro_categoryid']; echo $row['pro_categoryid']; return $id;?></option>
                <?php
            }
        } 

        
    }
?>  
</select>



<?php
  $a = teateFunction(21);

  echo "A :" . $a;
?>



<div class="col-md-6">
                                    <div class="form-group">
                                        <label>អ្នកផ្គត់ផ្គង់ *</label>
                                        <select id="slSp" name="slSp" class="form-control choicesjs" style="border: 1px solid #cbcbcb;">
                                            <option value="" placeholder="សូមជ្រើស​រើសអ្នកផ្គត់ផ្គង់" data-errors="សូមជ្រើសរើសអ្នកផ្គត់ផ្គង់" required>សូមជ្រើសរើសអ្នកផ្គត់ផ្គង់</option>
                                            <?php
                                                $query ="SELECT * FROM tbl_suppliers";
                                                $query_run = mysqli_query($conn, $query);
                                                
                                                if(mysqli_num_rows($query_run) > 0)
                                                {
                                                    foreach($query_run as $row)
                                                    {
                                            ?>
                                                    <option value="<?= $row['sp_id']; ?>"> <?php $pro_spid = $row['sp_id']; echo $row['sp_name']; ?> </option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>