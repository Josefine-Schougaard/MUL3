<?php
    //connect to database
    $conn = new mysqli("localhost:3306", "root", "", "tilegame");

    if($conn->connect_error){
        echo "Failed to connect to MySQL: ".$conn->connect_error." (".$conn->connect_error.")";
        exit();
    }
    //set character set to utf8
    $conn->set_charset("utf8");
?>