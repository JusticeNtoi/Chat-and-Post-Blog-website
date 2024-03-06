<?php
    session_start();
    if(isset($_SESSION['unique_id'])) {
        include_once "config.php";
        $outgoing_msg_id = mysqli_real_escape_string($conn, $_POST['outgoing_msg_id']);
        $incoming_msg_id = mysqli_real_escape_string($conn, $_POST['incoming_msg_id']);
        $output = "";

        $sql = "SELECT * FROM messages 
                LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_msg_id} AND incoming_msg_id = {$incoming_msg_id})
                OR (outgoing_msg_id = {$incoming_msg_id} AND incoming_msg_id = $outgoing_msg_id) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
                if($row['outgoing_msg_id'] === $outgoing_msg_id) { // if this it true then message was send through this account
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>';
                } else {
                    $output .= '<div class="chat incoming">
                                    <img src="php/images/'. $row['img'] .'" alt="profile">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>';
                }
            }
            echo $output;
        }
    } else {
        header("../login.php");
    }
?>