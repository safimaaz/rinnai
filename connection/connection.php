<?php
    // $conn = mysqli_connect("localhost", "root", "", "fadsan");
    // if($conn){
    //     echo "Connection established successfully";
    // }
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "ecom";
    
    
    $servername = "localhost";
    $username = "u593401095_safiullah";
    $password = "@W7jdQTyt";
    $dbname = "u593401095_rinnai";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connectio
    if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_errno());
    }
    else {
        // echo "Connection Established Successfully ";
    }

?>