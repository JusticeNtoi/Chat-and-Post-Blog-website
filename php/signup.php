<?php
    session_start();
    include_once "config.php";
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)) {
        // Check email format
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Check email in the database if it exit
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0) {
                echo "$email - This email already exist!";
            } else {
                // Check if user upload file or not
                if(isset($_FILES['image'])) {
                    $img_name = $_FILES['image']['name']; // Getting img name
                    $tmp_name = $_FILES['image']['tmp_name']; // temporary name used to save/move file in our folder

                    $img_explode = explode('.', $img_name); //  breaking a string name and extension into an array
                    $img_ext = end($img_explode); // Getting the img file extension

                    $extensions = ['png', 'jpeg', 'jpg', 'webp','gif','heif','svg']; // valid img extensions
                    if(in_array($img_ext, $extensions) === true) {
                        $time = time(); // Getting current time
                        $new_img_name = $time.$img_name;
                        
                        if(move_uploaded_file($tmp_name, "images/".$new_img_name)) {
                            $random_id = rand(time(), 10000000); // Creating random id for user
                            $status = "Active now"; // User signed up status

                            // Inserting user data into a table
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, first_name, last_name, email, password, img, status)
                                                VALUES ({$random_id},'{$first_name}', '{$last_name}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            if($sql2) {
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; // Using the user unique id to create session
                                    echo "success";
                                } else {
                                    echo "";
                                }
                            } else {
                                echo "Something went wrong!";
                            }
                        }
                    } else {
                        echo "Please select an Image file - jpeg, png, jpg!";
                    }
                }
            }
        } else {
            echo "$email - This email format is not valid!";
        }
    } else {
        echo "All input fields are required!";
    }
?>