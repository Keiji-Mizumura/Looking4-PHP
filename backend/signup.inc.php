<?php 

    include_once 'dbh.inc.php';

    if(isset($_POST['submit'])){
        
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);

        if(!empty($email) && !empty($password) && !empty($confirmPassword)){
            if($password == $confirmPassword){
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `profile_image`, `freelancer`, `reg_date`) VALUES ('','', '$email' , '$password', '', false, '')";

                if($result = mysqli_query($conn, $sql) or die(mysqli_error($conn))){
                    header("Location: ../index.php?signup=success");
                    exit();
                }
                else{
                    echo "FAILED";
                }
            }
            else{
                header("Location: ../signup.php?password=not_match");
                exit();
            }
        }

    }