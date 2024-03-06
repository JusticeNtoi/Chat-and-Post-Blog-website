<?php
    session_start();
    if(isset($_SESSION['unique_id'])) {
        header("location: chats.php");
    }
?>
<?php include_once "header.php"; ?>

<body class="body1">
    <div class="signup-wrapper">
        <section class="form signup">
            <header>Application Sign up</header>

            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input name="first_name" type="text" placeholder="first name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input name="last_name" type="text" placeholder="last name" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email Address</label>
                    <input name="email" type="text" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input name="password" type="password" placeholder="Enter new password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Select Image</label>
                    <input name="image" type="file" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Sign in">
                </div>
            </form>
            
            <div class="link">Already Signed up? <a href="index.php">Login now</a></div>
        </section>
    </div>


    <script src="js/pass-show-hide.js"></script>
    <script src="js/signup.js"></script>
</body>
</html>