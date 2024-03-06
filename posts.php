<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])) {
        header("location: index.php");
    }
?>

<?php include_once "header.php"; ?>

<body class="body2">
    <div class="sections-container">
        <section class="section1">
            <div class="nav-bar">
                <?php include "navigation.php"; ?>
            </div>
        </section>
        
        <section class="section2">
            <div class="posts-wrapper">
                <section class="posts" >
                    <header>
                        <div class="content">
                            <img src="php/images/<?php echo $row['img'] ?>" alt="profile picture">
                            <div class="details">
                                
                            </div>
                        </div>
                        <div class="post-header">
                            <button class="create-post">Create a post</button>
                            <div class="error-txt"></div>
                            <div class="success-txt"></div>

                            <form action="" method="" class="post-form" enctype="multipart/form-data">
                                <textarea name="post_message" id="" cols="30" rows="10" class="post-message" placeholder="Write a message"></textarea>
                                <div class="post-media">
                                    <label class="file-label">Select Image or Video</label>
                                    <input onchange="chech_type(this.files[0])" name="post-media" type="file" accept="image/*, video/*" id="media-upload">
                                </div>
                                <input type="submit" class="post-btn" value="Post">

                                <script>
									
									function chech_type(file)
									{
										let allowed = ['image/jpeg','image/png','image/webp','image/jpg','image/gif','image/heif','image/svg', 
                                        'video/mp4', 'video/avi', 'video/webm', 'video/mkv'];

										if(!allowed.includes(file.type)){
											alert("This file type is not allowed!");
											return;
										}
									}
								</script>
                            </form>

                        </div>
                    </header>

                    <div class="posts-list" id="section-start">

                        <div class="title-button" >
                            <h1 class="posts-title" >
                                Posts
                            </h1>
                            <button class="loadMoreButton"><i class="fa-solid fa-arrows-rotate"></i></button>
                        </div>

                        <div class="list" >
                            
                        </div>
                        <br>
                        <a href="#section-start" class="loadMoreButton"><i class="fa-solid fa-arrow-up"></i></a>

                    </div>

                </section>
            </div>
        </section>
    </div>


    <script src="js/send-post.js"></script>
    <script src="js/get-posts.js"></script>
</body>
</html>