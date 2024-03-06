<?php
    session_start();
    if(isset($_SESSION['unique_id'])) {
        include_once "config.php";
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        if(isset($user_id)) {
            $status = "Offline now";

            // Updating user status to offline
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$user_id}");
            if($sql) {
                session_unset();
                session_destroy();
                header("location: ../index.php");
            }
        } else {
            header("location: ../chats.php");
        }
    } else {
        header("location: ../index.php");
    }
?>