<?php
    $conn = mysqli_connect("localhost", "root", "", "app_database");
    if(!$conn) {
        echo "Database connected" . mysqli_connect_error();
    }
?>