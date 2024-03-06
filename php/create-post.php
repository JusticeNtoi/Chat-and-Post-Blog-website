<?php
    session_start();
    include_once "config.php";

    $post_owner_id = $_SESSION['unique_id'];
    $msg = isset($_POST['post_message']) ? trim($_POST['post_message']) : '';
    $post_msg = mysqli_real_escape_string($conn, $msg);
    

    // Check if user upload file or not
    if(isset($_FILES['post-media']) && $_FILES['post-media']['error'] == 0) {
        $media_name = $_FILES['post-media']['name']; // Getting media name
        $tmp_name = $_FILES['post-media']['tmp_name']; // temporary name used to save/move file in our folder

        $media_explode = explode('.', $media_name); //  breaking a string name and extension into an array
        $media_ext = end($media_explode); // Getting the media file extension

        $extensions = ['png', 'jpeg', 'jpg', 'webp','gif','heif','svg', 'mp4', 'avi', 'webm', 'mkv']; // valid media extensions
        if(in_array($media_ext, $extensions) === true) {
            $post_time = date('d F Y H:i:s'); // Getting date and time
            $time = time(); // Getting current time
            $post_media = $time.$media_name;

            if(move_uploaded_file($tmp_name, "post_media/".$post_media)) {
                $post_unique_id = rand(time(), 10000000); // Creating random id for post

                // Inserting post data into a table
                $sql = mysqli_query($conn, "INSERT INTO posts (post_unique_id, post_owner_id, post_msg, post_media, post_time)
                                    VALUES ({$post_unique_id}, {$post_owner_id}, '{$post_msg}', '{$post_media}', '{$post_time}')");
                if($sql) {
                    echo "success";
                } else {
                    echo "Something went wrong, check your internet!";
                }
            }
        } else {
            echo "Please select an media file - jpeg, png, jpg, mp4, avi, webm!";
        }
    } elseif ($post_msg !== '') {
        $post_time = date('d F Y H:i:s'); // Getting date and time
        $post_unique_id = rand(time(), 10000000); // Creating random id for post

        // Inserting post data into a table
        $sql = mysqli_query($conn, "INSERT INTO posts (post_unique_id, post_owner_id, post_msg,	post_time)
        VALUES ({$post_unique_id}, {$post_owner_id}, '{$post_msg}', '{$post_time}')");
        if($sql) {
            echo "success";
        } else {
            echo "Something went wrong, check your internet!";
        }
    } else {
        echo "Please write a message or choose a media file to post";
    }
    
?>