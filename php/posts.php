<?php
    session_start();
    include_once "config.php";
    $sql = mysqli_query($conn, "SELECT * FROM posts ORDER BY post_id DESC");
    $output = "";

    if (mysqli_num_rows($sql) == 0){
        $output .= "No posts available!";
    } elseif (mysqli_num_rows($sql) > 0) {
        include "posts.data.php";
    }
    echo $output;
?>