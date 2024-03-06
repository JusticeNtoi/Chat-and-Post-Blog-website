<?php
    session_start();
    include_once "config.php";

    $post_unique_id = mysqli_real_escape_string($conn, $_POST['post_unique_id']);
    $commenter_id = mysqli_real_escape_string($conn, $_POST['commenter_id']);
    $commenter_msg = mysqli_real_escape_string($conn, $_POST['comment_message']);

    if(!empty($commenter_msg)) {
        $comment_time = date('d F Y H:i:s');

        $sqlComment = mysqli_query($conn, "INSERT INTO comments (post_unique_id, commenter_id, comment_msg, comment_time)
                                VALUES ({$post_unique_id}, {$commenter_id}, '{$commenter_msg}', '{$comment_time}')") or die();
        echo "success";
    }
?>