<?php
include("../config/connection.php");

if(isset($_POST['value'])){
    $value = $_POST['value'];
    echo helloWorld($value, $conn);
}
?>
