<?php
    while ($row = mysqli_fetch_assoc($sql)) {
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                 OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_msg_id}
                 OR incoming_msg_id = {$outgoing_msg_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);

        $you = "";
        if(mysqli_num_rows($query2) > 0) {
            $result = $row2['msg'];
            // Adding You: text before message if login id is the one that sent message
            ($outgoing_msg_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        } else {
            $result = "No messages available";
        }

        // Trimming the message if words are more than 28
        (strlen($result) > 28) ? $msg = substr($result, 0, 26). "..." : $msg = $result;

        // Check user status online or offline
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";

        $output .= '<a href="inbox.php?user_id='.$row['unique_id'].'">
                        <div class="content">
                            <img src="php/images/'. $row['img'] .'" alt="profile picture">
                            <div class="details">
                                <span>'. $row['first_name'] . " " .  $row['last_name'] .'</span>
                                <p>'. $you . $msg .'</p>
                            </div>
                        </div>
                        <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>