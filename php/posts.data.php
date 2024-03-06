<?php 
    while ($row = mysqli_fetch_assoc($sql)) {
        $post_owner_id = $row['post_owner_id'];

        $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$post_owner_id}");
        $row2 = mysqli_fetch_assoc($sql2);

        if (isset($row['post_media'])) {
            $mediaPath = 'php/post_media/' . $row['post_media'];
    
            // Get the file extension
            $extension = pathinfo($mediaPath, PATHINFO_EXTENSION);
            
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp','gif','heif','svg'])) {
                // It's an image
                $media = '<img src="' . $mediaPath . '" class="media-image">';
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

        $first_name = $row2['first_name'] ;
        $last_name = $row2['last_name'];
        (strlen($first_name) > 8) ? $first_name = substr($first_name, 0, 8). "..." : $first_name = $first_name;
        (strlen($last_name) > 8) ? $last_name = substr($last_name, 0, 8). "..." : $last_name = $last_name;

        $output .= '<div class="post-body">
                    <div class="post" >
                        <img src="php/images/'. $row2['img'] .'" class="post-image" >
                        <h2 class="post-names"  >
                            <span>'. $first_name . " " .  $last_name .'</span>
                        </h2>
                    </div>
                    <div class="post-details" >
                        <h4 class="post-time"  >
                            <span>'. $row['post_time'] .'</span>    
                        </h4>
                        <div class="media-display">
                            '. $media .'
                        </div>
                        <div class="post-message-box"  >
                            <span>'. $row['post_msg'] .'</span>
                        </div>
                        <div class="post-comments" >
                            <a href="comments.php?post_id='.$row['post_unique_id'].'">
                                <i class="fa-regular fa-comment-dots"></i>
                                </i>
                                <div class="post-comments-text"  >
                                    <span>Comments</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                ';
    }
?>