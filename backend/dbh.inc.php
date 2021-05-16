<?php
    $host = "localhost";
    $name = "root";
    $password = "";
    $dbName = "looking4";

    $conn = mysqli_connect($host, $name, $password, $dbName);

    if(mysqli_connect_error()){
        die("ERROR ".mysqli_connect_error());
    }