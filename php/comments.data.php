<?php
    session_start();
    include_once "config.php";
    $post_id = mysqli_real_escape_string($conn, $_GET['post_id']);
    $sqlGetComments = mysqli_query($conn, "SELECT * FROM comments WHERE post_unique_id = {$post_id} ORDER BY comment_id ASC");
    $output = "";

    if (mysqli_num_rows($sqlGetComments) == 0){
        $output .= "";
    } elseif (mysqli_num_rows($sqlGetComments) > 0) {
        while ($rowComment = mysqli_fetch_assoc($sqlGetComments)) {
            $commenter_id = $rowComment['commenter_id'];

            $sqlDetails = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$commenter_id}");
            $rowDetails = mysqli_fetch_assoc($sqlDetails);

            // Trimming the message if words are more than 28
            $first_name = $rowDetails['first_name'];
            $last_name = $rowDetails['last_name'];
            (strlen($first_name) > 8) ? $first_name = substr($first_name, 0, 8). "..." : $first_name = $first_name;
            (strlen($last_name) > 8) ? $last_name = substr($last_name, 0, 8). "..." : $last_name = $last_name;

            $output .= '<div class="comment-body">
                            <div class="comment" >
                                <img src="php/images/'. $rowDetails['img'] .'" class="comment-image" >
                                <h2 class="comment-names"  >
                                    <span>'. $first_name . " " .  $last_name .'</span>
                                </h2>
                            </div>
                            <div class="comment-details" >
                                <h4 class="comment-time"  >
                                    <span>'. $rowComment['comment_time'] .'</span>     
                                </h4>
                                <div class="comment-message-box"  >
                                    <span>'. $rowComment['comment_msg'] .'</span>
                                </div>
                            </div>
                        </div>';
        }
    }
    echo $output;
?>