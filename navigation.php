
<nav>
    <div class="logo-box">
        <img src="assets/Red.jpg" class="logo-image" >
    </div>
    <div class="navbar">
        <?php
            // Define an array of navigation links
            $navLinks = array(
                "Home" => "profile.php",
                "Chats" => "chats.php",
                "Posts" => "posts.php"
            );

            // Loop through the array to generate navigation links
            foreach ($navLinks as $label => $url) {
                echo '<a href="' . $url . '">' . $label . '</a>';
            }
        ?>
        <?php
            include_once "php/config.php";
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}'");
            if(mysqli_num_rows($sql) > 0) {
                $row = mysqli_fetch_assoc($sql);

                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                (strlen($first_name) > 16) ? $first_name = substr($first_name, 0, 8). "..." : $first_name = $first_name;
                (strlen($last_name) > 16) ? $last_name = substr($last_name, 0, 8). "..." : $last_name = $last_name;
            }
        ?>
        <a href="php/logout.php?user_id=<?php echo $row['unique_id'] ?>" class="logout">
            Logout
        </a>
    </div>
    <a href="profile.php" class="profile-box" >
        <div class="profile-names">
            <span><?php echo $first_name . " " .  $last_name ?></span>
        </div>
        <img src="php/images/<?php echo $row['img'] ?>" alt="profile picture" class="profile-image">
    </a>
</nav>
