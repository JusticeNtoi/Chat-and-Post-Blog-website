<?php
    session_start();
    include_once "config.php";

    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    if(!empty($email) && !empty($password)) {
        // Check email and password in the database if it exit
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
        if(mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            $status = "Active now";
            // Updating user status to Online
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if($sql2) {
                $_SESSION['unique_id'] = $row['unique_id']; // Using the user unique id to create session
                echo "success";
            }
        } else {
            echo "Email or Password is incorrect!";
        }
    } else {
        echo "All input fields are required!";
    }
?>