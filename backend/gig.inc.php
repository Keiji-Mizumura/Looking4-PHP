<?php 

    session_start();

    include_once 'dbh.inc.php';

    if(isset($_POST['submit'])){
        $email = $_SESSION['email'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date = date("d:m:Y");
        $sql = "INSERT INTO `gigs` (`email`, `title`, `description`, `date`) VALUES ('$email', '$title', '$description', '$date');";
        if(mysqli_query($conn, $sql)){
            header("Location: ../index.php?gigs=success");
            exit();
        }
        else{
            header("Location: ../index.php?gigs=failed");
            exit();
        }
    }
    else{
        header("Location: ../index.php?gigs=error");
        exit();
    }


?>

