<?php
    session_start();
    if(isset($_SESSION['unique_id'])) {
        header("location: chats.php");
    }
?>
<?php include_once "header.php"; ?>

<body class="body1">
    <div class="login-wrapper">
        <section class="form login">
            <header>Application Login</header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="field input">
                    <label name="email">Email Address</label>
                    <input name="email" type="text" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input name="password" type="password" placeholder="Enter your password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Login">
                </div>
            </form>
            <div class="link">Not yet Signed up? <a href="signup.php">Sign up</a></div>
        </section>
    </div>

    <script src="js/pass-show-hide.js"></script>
    <script src="js/login.js"></script>
</body>
</html>