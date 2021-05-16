<?php
    session_start();

    include_once 'dbh.inc.php';

    if(isset($_POST['submit'])){
        $email = $_SESSION['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $profile_picture = $_POST['image'];
        $account_type = $_POST['account_type'];
        $freelancer = true;
        if($account_type == "client"){
            $freelancer = false;
        }
        $sql = "UPDATE users SET firstname='$firstname', lastname='$lastname', freelancer='$freelancer' WHERE email='$email';";
        if(mysqli_query($conn, $sql)){
            header("Location: ../index.php?update=success");
            exit();
        }
        else{
            header("Location: ../index.php?update=failed");
            exit();
        }
    }
    else{
        header("Location: ../index.php?url=invalid");
        exit();
    }