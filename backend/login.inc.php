<?php 

    session_start();

    include_once 'dbh.inc.php';

    if(isset($_POST['submit'])){
        
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $loggedEmail = "";
        $hashedPassword = "";

        if(!empty($email) && !empty($password)){
            $searchEmail = "SELECT * FROM users WHERE email='$email';";
            if($result = mysqli_query($conn, $searchEmail) or die(mysqli_error($conn))){
                if(mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_array($result)) {
                        $loggedEmail = $row['email'];
                        $hashedPassword = $row['password'];
                    } 
                }
                else{
                    header("Location: ../login.php?user=not_found");
                    exit();
                }
            }
            else{
                header("Location: ../login.php?login=error");
                exit();
            }
            if($password == $hashedPassword){
                $_SESSION['email'] = $loggedEmail;
                header("Location: ../index.php?login=success");
                exit();
            }
            else{
                header("../index.php?login=error");
                exit();
            }
        }
        else{
            header("../index.php?login=empty");
            exit();
        }

    }