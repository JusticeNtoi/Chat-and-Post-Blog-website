<?php
    include_once "config.php";

    $sql = mysqli_query($conn, "SELECT * FROM posts WHERE post_unique_id = {$post_id}");
    $output = "";

    if (mysqli_num_rows($sql) == 0){
        $output .= "Post No longer Available!";
    } elseif (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);

        if (isset($row['post_media'])) {
            $mediaPath = 'php/post_media/' . $row['post_media'];
    
            // Get the file extension
            $extension = pathinfo($mediaPath, PATHINFO_EXTENSION);
            
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp','gif','heif','svg'])) {
                // It's an image
                $media = '<img src="' . $mediaPath . '" class="comment-media-image">';
            } elseif (in_array($extension, ['mp4', 'avi', 'webm', 'mkv'])) {
                // It's a video
                $media = '<video width="640" height="360" controls ><source src="' . $mediaPath . '" type="video/' . $extension . '"></video>';
            } else {
                // Handle other file types or display an error message
                $media = 'Unsupported media type';
            }
        } else {
            $media ='';
        }

        $output .='<div class="post-details2" >
                        <h4 class="post-time2"  >
                            <span>'. $row['post_time'] .'</span>   
                        </h4>
                        <div class="comment-media-display">
                            '. $media .'
                        </div>
                        <div class="post-message-box2"  >
                            <span>'. $row['post_msg'] .'</span>
                        </div>
                    </div>';
    }
    echo $output;
?>