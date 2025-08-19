<?php
    // Establish MySQL database connection
    
    include("connection.php");


    // Retrieve form data
    $email = $_POST['emailLogin'];
    $password = $_POST['txtpassword'];
    
    if($email =="" && $passworl == ""){
        header("location:../form_login.php");
    }else{
        // echo $email.$password;
        $sql = "SELECT us_id, us_type, us_username, us_email, us_password FROM tbl_users"; // Replace "users" with your table name

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if there are any records
        if (mysqli_num_rows($result) > 0) {
            // Fetch and display user data
            $check = true;
            while ($row = mysqli_fetch_assoc($result)) {

                $value = $row['us_type'];

                switch ($value) {
                    case 0:
                        if($row['us_email'] == $email && $row['us_password'] == $password){
                            session_start();
                            $_SESSION['USER']= $row['us_username'];
                            $_SESSION['ROLE']= $row['us_type'];
                            $_SESSION['PROFILEID']= $row['us_id'];
                            header("location:../admin/");
                            $check = false;
                        }else{
                            header("location:../form_login.php");
                        }
                        break;
                    case 1:
                        if($row['us_email'] == $email && $row['us_password'] == $password){
                            session_start();
                            $_SESSION['USER']= $row['us_username'];
                            $_SESSION['ROLE']= $row['us_type'];
                            $_SESSION['PROFILEID'] = $row['us_id'];
                            header("location:../admin/");
                            $check = false;
                        }else{
                            header("location:../form_login.php");
                        }
                        break;
                    case 2:
                        if($row['us_email'] == $email && $row['us_password'] == $password){
                            session_start();
                            $_SESSION['USER']= $row['us_username'];
                            $_SESSION['ROLE']= $row['us_type'];
                            $_SESSION['PROFILEID']= $row['us_id'];
                            header("location:../admin/");
                            $check = false;
                        }else{
                            header("location:../form_login.php");
                        }
                        break;
                    default:
                        header("location:../form_login.php");
                        break;
                }

                if($check == false){
                    break;
                }
                
            }
        } else{
            echo  "  មិនមានគណនី" ;
            // header("location:../sign_in.php");
        }
        // Close the database connection
        mysqli_close($conn);
    }
    
?>

            