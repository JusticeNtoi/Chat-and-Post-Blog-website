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
    <div class="comments-wrapper">
        <section class="comments">
            <div class="post-view">
                <?php
                    include_once "php/config.php";

                    $post_id = mysqli_real_escape_string($conn, $_GET['post_id']);

                    echo '<script>var post_id = ' . json_encode($post_id) . ';</script>';

                    $sqlPoster = "SELECT * FROM users 
                                JOIN posts ON posts.post_owner_id = users.unique_id 
                                WHERE post_unique_id = '{$post_id}'";
                    $queryPoster = mysqli_query($conn, $sqlPoster);

                    if(mysqli_num_rows($queryPoster) > 0) {
                        $owner = mysqli_fetch_assoc($queryPoster);
                    }
                ?>
                
                <a href="posts.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $owner['img'] ?>" alt="profile">
                <div class="details">
                    <span><?php echo $owner['first_name'] . " " .  $owner['last_name']?></span>
                    <p><?php echo $owner['status']?></p>
                </div>
            </div>
            <div class="post-and-commets">
                <div class="post-body2">
                    <?php include "php/comments.post.php"; ?>
                </div>
                
                <h1 class="comments-title" >
                    Comments
                </h1>
                <div class="comments-list">

                </div>
            </div>
            <?php
                    include_once "php/config.php";
            ?>
            <form action="" method="" class="comment-area">
                <input type="text" name="post_unique_id" value="<?php echo $post_id; ?>" hidden>
                <input type="text" name="commenter_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                
                <input type="text" class="input-comment" name="comment_message" id="" placeholder="Type Message" value="">
                <input type="submit" class="comment-btn" value="Send">
            </form>

        </section>
    </div>
</section>


    <script src="js/get-comments.js"></script>
    <script src="js/send-comment.js"></script>
</body>
</html>