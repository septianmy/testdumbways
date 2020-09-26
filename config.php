<?php 
    $conn = new mysqli("localhost","root","","db_sepeda");

    if($conn->connect_error){
        die("Could not connect to the database!".$conn->connect_error);
    }
?>