<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])) {
        header("location: index.php");
    }
?>

<?php include_once "header.php"; ?>

<body class="body2">
    <section class="section1">
        <div class="nav-bar">
            <?php include "navigation.php"; ?>
        </div>
    </section>
    <section class="section2">
        <div class="inbox-wrapper">
            <section class="chat-area">
                <header>
                    <?php
                        include_once "php/config.php";

                        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$user_id}'");
                        if(mysqli_num_rows($sql) > 0) {
                            $row = mysqli_fetch_assoc($sql);
                        }
                    ?>
                    <a href="chats.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                    <img src="php/images/<?php echo $row['img'] ?>" alt="profile">
                    <div class="details">
                        <span><?php echo $row['first_name'] . " " .  $row['last_name']?></span>
                        <p><?php echo $row['status']?></p>
                    </div>
                </header>
                
                <div class="chat-box">

                </div>

                <form action="#" class="typing-area">
                    <input type="text" name="outgoing_msg_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                    <input type="text" name="incoming_msg_id" value="<?php echo $user_id; ?>" hidden>
                    
                    <input type="text" class="input-field" name="message" id="" placeholder="Type Message" value="">
                    <button><i class="fa-solid fa-paper-plane"></i></button>
                </form>
            </section>
        </div>
    </section>

    <script src="js/messages.js"></script>

</body>
</html>