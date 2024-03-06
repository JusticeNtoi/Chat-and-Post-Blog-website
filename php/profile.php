<?php 
    session_start();
    include_once "config.php";

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $unique_id = $_SESSION['unique_id'];

    if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) { 
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
                        // Inserting user data into a table
                        $sql = mysqli_query($conn, "UPDATE users 
                        SET first_name = '{$first_name}', last_name = '{$last_name}', email = '{$email}', password = '{$password}', img = '{$new_img_name}'
                        WHERE unique_id = {$unique_id}");

                        if($sql) {
                            echo "success";
                        } else {
                            echo "Something went wrong!";
                        }
                    }
                } else {
                    // Inserting user data into a table
                    $sql = mysqli_query($conn, "UPDATE users 
                    SET first_name = '{$first_name}', last_name = '{$last_name}', email = '{$email}', password = '{$password}'
                    WHERE unique_id = {$unique_id}");

                    if($sql) {
                        echo "success";
                    } else {
                        echo "Something went wrong!";
                    }
                }
            } else {
                echo " Image not selected";
            }
        } else {
            echo "$email - This email format is not valid!";
        }
    } else {
        echo "All input fields are required!";
    }
?>