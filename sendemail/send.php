<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../sendemail/phpmailer/src/Exception.php';
require '../sendemail/phpmailer/src/PHPMailer.php';
require '../sendemail/phpmailer/src/SMTP.php';

$mas = 0;
if(isset($_POST["send"])){
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'keacoding@gmail.com'; // Your gmail
$mail->Password = 'cdvwvkrutcqwmweu'; // Your gmail app password
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('keacoding@gmail.com'); // Your gmail
$mail->addAddress($_POST["email"]);
$mail->isHTML(true);
$mail->Subject = $_POST["subject"];
$mail->Body = $_POST["message"];
$mail->send();
$mas = 1;


include("../config/connection.php");
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input to prevent SQL injection
    $or_id = mysqli_real_escape_string($conn, $_POST["hiddenOrid"]);
    if($or_id == ""){
        $or_id = $_GET['or_id'];
    };
    // Update query
    $sql = "UPDATE tbl_order SET or_draft = '1' WHERE or_id = $or_id";

    // Execute the query and handle errors
    if ($conn->query($sql) === TRUE) {
        $mas = 1; // Success
    } else {
        $mas = 0; // Failure
    }
}

$conn->close();

// Redirect with message parameter
header("location:../admin/form_purchease_list.php?massage=".$mas);


}
?>

<!-- // alert('Sent Successfully'); -->


