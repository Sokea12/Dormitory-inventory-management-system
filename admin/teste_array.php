<?php 
// include 'ConnectDB.php'; 
if(isset($_POST['submit'])){ 
    $monthData = $_POST['month']; 
    $Show_Month =implode(', ', $monthData); 
    //$Show_Month=  នេះជាFunction ដែលបង្ហាញ Data ជាArray : implode 
    echo $Show_Month; 
} 
 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title> 
</head> 
<body> 
<form action="" method="POST"> 
    <?php 
      $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']; 
 
      foreach ($months as $month) { 
        echo "<label><input type='checkbox' name='month[]' value='$month' class='monthCheckbox'> $month</label>"; 
      } 
    ?> 
    <button type="submit" name="submit">Submit</button> 
  </form> 
</body> 
</html>
