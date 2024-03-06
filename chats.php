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
            <div class="chats-wrapper">
                <section class="chats">
                    <div class="search">
                        <span class="text">Select a user to chat</span>
                        <input type="text" placeholder="Search by name...">
                        <button><i class="fas fa-search"></i></button>
                    </div>

                    <div class="chats-list">
                        
                    </div>

                </section>
            </div>
        </section>
    </div>

    <script src="js/chats.js"></script>
</body>
</html>